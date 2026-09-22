<#
.SYNOPSIS
  Bulk-checks live Google index status for a list of URLs using the
  official Search Console "URL Inspection" API. Scales to large lists
  (23k+) by respecting Google's daily quota and being fully resumable -
  safe to stop, re-run later, or re-run daily until the whole list is
  covered.

.NOTES
  Google enforces a hard ~2,000 URL Inspection requests/day per property
  (not something you can raise). This script defaults to a 1,900/day
  safety margin, writes results incrementally, and skips URLs it already
  checked recently on the next run - so for a 23k-URL list, just re-run
  the same command once a day (or schedule it) until "Needing check"
  reaches 0.

.PARAMETER CredentialsPath
  Path to the Google service account JSON key file.

.PARAMETER SiteUrl
  The exact Search Console property string, e.g.
  "https://www.parcelmanagement.com/" (URL-prefix property) or
  "sc-domain:parcelmanagement.com" (domain property) - must match
  exactly what's shown in the GSC property switcher.

.PARAMETER InputPath
  A .csv file with a "URL" column, or a plain .txt file with one URL
  per line.

.PARAMETER OutputPath
  Results file (created if missing, appended to on every run).

.PARAMETER DailyLimit
  Max requests to make in a single run. Default 1900 (under Google's
  ~2000/day cap).

.PARAMETER RefreshAfterHours
  Re-check a URL only if it was last checked longer ago than this.
  Default 168 (1 week) - so re-running daily won't re-burn quota on
  URLs already confirmed recently.

.EXAMPLE
  .\inspect-urls.ps1 -CredentialsPath ".\service-account.json" `
    -SiteUrl "https://www.parcelmanagement.com/" `
    -InputPath ".\urls.txt" -OutputPath ".\url-inspection-results.csv"
#>

param(
    [Parameter(Mandatory=$true)][string]$CredentialsPath,
    [Parameter(Mandatory=$true)][string]$SiteUrl,
    [Parameter(Mandatory=$true)][string]$InputPath,
    [string]$OutputPath = "url-inspection-results.csv",
    [int]$DailyLimit = 1900,
    [double]$DelaySeconds = 1.2,
    [int]$RefreshAfterHours = 168
)

function ConvertTo-Base64Url {
    param([byte[]]$Bytes)
    [Convert]::ToBase64String($Bytes).TrimEnd('=').Replace('+','-').Replace('/','_')
}

function Get-GoogleAccessToken {
    param(
        [string]$KeyPath,
        [string]$Scope = "https://www.googleapis.com/auth/webmasters.readonly"
    )

    $key = Get-Content $KeyPath -Raw | ConvertFrom-Json
    $now = [DateTimeOffset]::UtcNow.ToUnixTimeSeconds()
    $exp = $now + 3600

    $header = @{ alg = "RS256"; typ = "JWT" } | ConvertTo-Json -Compress
    $claim = @{
        iss   = $key.client_email
        scope = $Scope
        aud   = $key.token_uri
        iat   = $now
        exp   = $exp
    } | ConvertTo-Json -Compress

    $headerB64 = ConvertTo-Base64Url ([Text.Encoding]::UTF8.GetBytes($header))
    $claimB64  = ConvertTo-Base64Url ([Text.Encoding]::UTF8.GetBytes($claim))
    $signingInput = "$headerB64.$claimB64"

    $rsa = [Security.Cryptography.RSA]::Create()
    $rsa.ImportFromPem($key.private_key)

    $signature = $rsa.SignData(
        [Text.Encoding]::UTF8.GetBytes($signingInput),
        [Security.Cryptography.HashAlgorithmName]::SHA256,
        [Security.Cryptography.RSASignaturePadding]::Pkcs1
    )
    $jwt = "$signingInput.$(ConvertTo-Base64Url $signature)"

    $tokenResp = Invoke-RestMethod -Method Post -Uri $key.token_uri -Body @{
        grant_type = "urn:ietf:params:oauth:grant-type:jwt-bearer"
        assertion  = $jwt
    } -ContentType "application/x-www-form-urlencoded"

    return $tokenResp.access_token
}

function Write-ResultRow {
    param([string]$OutputPath, [string[]]$Fields)
    $escaped = $Fields | ForEach-Object { '"' + ($_ -replace '"','""') + '"' }
    Add-Content -Path $OutputPath -Value ($escaped -join ',')
}

# --- Load input URLs ---
if ($InputPath -like "*.csv") {
    $urls = (Import-Csv $InputPath).URL | Where-Object { $_ } | Select-Object -Unique
} else {
    $urls = Get-Content $InputPath | ForEach-Object { $_.Trim() } | Where-Object { $_ -ne "" } | Select-Object -Unique
}

# --- Load existing results for resume/skip logic ---
$existing = @{}
if (Test-Path $OutputPath) {
    Import-Csv $OutputPath | ForEach-Object { $existing[$_.URL] = $_ }
} else {
    Write-ResultRow -OutputPath $OutputPath -Fields @(
        "URL","CheckedAt","CoverageState","IndexingState","RobotsTxtState","PageFetchState","Verdict","LastCrawlTime","Error"
    )
}

$toCheck = $urls | Where-Object {
    if (-not $existing.ContainsKey($_)) { return $true }
    $last = $existing[$_].CheckedAt
    if ([string]::IsNullOrEmpty($last)) { return $true }
    return ((Get-Date) - [datetime]$last).TotalHours -gt $RefreshAfterHours
}

Write-Output "Total URLs in input: $($urls.Count). Already checked recently: $($urls.Count - $toCheck.Count). Needing check this run: $($toCheck.Count)."

if ($toCheck.Count -eq 0) {
    Write-Output "Nothing to do - all URLs checked within the last $RefreshAfterHours hours."
    return
}

$token = Get-GoogleAccessToken -KeyPath $CredentialsPath
$tokenIssued = Get-Date
$uri = "https://searchconsole.googleapis.com/v1/urlInspection/index:inspect"

$count = 0
$quotaHit = $false

foreach ($url in $toCheck) {
    if ($count -ge $DailyLimit) {
        Write-Output "Reached this run's limit of $DailyLimit requests. Re-run the same command later (today's Google quota resets at midnight Pacific time) to continue with the remaining $($toCheck.Count - $count) URLs."
        break
    }

    if (((Get-Date) - $tokenIssued).TotalMinutes -gt 50) {
        $token = Get-GoogleAccessToken -KeyPath $CredentialsPath
        $tokenIssued = Get-Date
    }

    $body = @{ inspectionUrl = $url; siteUrl = $SiteUrl } | ConvertTo-Json

    $attempt = 0
    $maxAttempts = 5
    $done = $false

    while (-not $done -and $attempt -lt $maxAttempts) {
        $attempt++
        try {
            $resp = Invoke-RestMethod -Method Post -Uri $uri -Headers @{ Authorization = "Bearer $token" } -Body $body -ContentType "application/json"
            $r = $resp.inspectionResult.indexStatusResult
            Write-ResultRow -OutputPath $OutputPath -Fields @(
                $url, (Get-Date -Format "o"), $r.coverageState, $r.indexingState,
                $r.robotsTxtState, $r.pageFetchState, $r.verdict, $r.lastCrawlTime, ""
            )
            $done = $true
            $count++
        } catch {
            $statusCode = $null
            if ($_.Exception.Response) { $statusCode = [int]$_.Exception.Response.StatusCode }

            if ($statusCode -eq 429 -or $statusCode -eq 403) {
                Write-Output "Quota/rate limit hit on '$url' (HTTP $statusCode). Stopping this run - re-run later to continue."
                $quotaHit = $true
                $done = $true
            } elseif ($statusCode -ge 500 -and $attempt -lt $maxAttempts) {
                Start-Sleep -Seconds ([math]::Pow(2, $attempt))
            } else {
                Write-ResultRow -OutputPath $OutputPath -Fields @(
                    $url, (Get-Date -Format "o"), "", "", "", "", "", "", $_.Exception.Message
                )
                $done = $true
                $count++
            }
        }
    }

    if ($quotaHit) { break }

    if ($count % 100 -eq 0) {
        Write-Output "Progress: $count / $($toCheck.Count) checked this run."
    }

    Start-Sleep -Seconds $DelaySeconds
}

Write-Output "Run complete. Checked $count URL(s) this run. Remaining unchecked: $($toCheck.Count - $count)."
