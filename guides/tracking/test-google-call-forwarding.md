# Test Google Ads website call forwarding (number swap)

Use this to check whether the Google forwarding number replaces the site's phone number for ad visitors.

## 1. Find the setup in the page source
Press **Ctrl+U**, then **Ctrl+F**:
- **gtag (current method):** `gtag('config', 'AW-XXXX/LABEL', { 'phone_conversion_number': '(xxx) xxx-xxxx' })`. The number in quotes is the one that gets swapped.
- **Legacy WCM snippet:** `gstatic.com/wcm/loader.js` with `ak:"<id>", cl:"<label>", autoreplace:"xxx-xxx-xxxx"`.
- The `AW-` ID and label must match the "Website calls" conversion action: Google Ads > Goals > Conversions > the action > Tag setup.

## 2. Force the swap without an ad click
1. Open the page with `#google-wcc-debug` appended, e.g. `https://example.com/contact/#google-wcc-debug`.
2. A debug panel appears. The number on the page should change to a Google forwarding number (usually a different area code).
3. Check every page that shows the number (header, footer, landing pages), and both the `tel:` link and the visible text.

## 3. List the numbers that aren't swapped
Every number on the site that differs from `phone_conversion_number` / `autoreplace` is **not tracked**. To find them, scan the sitemap pages for `tel:` links and visible numbers.

## Gotchas
- The swap only works when the number on the page is written **exactly** as configured (same digits; formatting is usually tolerated).
- Having both gtag and the legacy WCM snippet with different numbers means one config is probably stale.
- The call length threshold is set on the conversion action (60s by default).

## Seen on
- nycministorage.com: gtag `(929) 593-2438`, legacy WCM `866-646-4338`, and `(718) 742-2222` not swapped. See [10-02-2026-log.md](../../Google%20Ads%20Tracking%20%5BLead%20Gen%5D/nycministorage.com/10-02-2026-log.md).
