# Solutions — grovedentalaz.com (10-01-2026)

- **Project:** The Grove Family Dental [PPC] (AC project 7454)
- **Task:** #8 Google Ads Tracking [Lead Gen] — https://login.smartsites.com/projects/7454/tasks/391958
- **Replying to:** comment #62 (2617166) — "Can you check the submission forms to make sure they are tracking."
- **Log:** [10-01-2026-log.md](10-01-2026-log.md) · **Final comment:** [10-01-2026-comment.txt](10-01-2026-comment.txt)

## Solutions (do in this order)

### 1. Check if anyone actually submitted in September ✅ DONE
WP Admin → Forminator → Submissions → Contact Form (60 total):

| ID | Date | Note |
|---|---|---|
| 80 | Sep 30, 2026 9:09 AM | real lead |
| 79 | Sep 14, 2026 3:26 PM | real lead |
| 78 / 77 | Aug 19 / Aug 15 | real leads |
| 76 | Jul 29 | real lead |
| 75 / 74 | Jul 14 | John Doe — our tests |
| 73 / 72 | May 29 / May 14 | real leads |

**Result:** the form works, and 2/month is the site's normal volume (no drop in September).
So the question is **whether these 2 visitors came from Google Ads**. Google Ads only counts a form conversion when the person clicked an ad first; organic/SEO/direct visitors who submit **will never show in Google Ads**.

#### 1a. Check GA4 (G-7QSVYJ9053) for these 2 submissions
GA4 → Explore → Free form, date **Sep 1–30 2026**:
- Rows: `Event name` (filter = `form_submission`), `Date`, `Session source / medium`, `Session campaign`
- Value: `Event count`

| GA4 shows | Meaning | Next |
|---|---|---|
| Sep 14 + Sep 30 `form_submission` with source **not** `google / cpc` | Tracking works; leads weren't from ads | Tell PM (draft below). No fix needed. |
| `google / cpc` but no Google Ads conversion | Ads conversion tag issue | Step 3 test in GTM Preview, check `k3Fl…` fires; check Google Ads by "conv. time" column |
| No `form_submission` on those dates | Tracking missed real users | Step 3 + step 4 (fix trigger) |

Also open each entry (▾ "+3 other fields") — if one field stores referrer/source, it answers the same question faster. LeadTracker (`form_data` in GA4) shows source too.

> Don't put patient names in the AC comment — use entry dates/IDs only.

### 2. "Checking your browser" gate on admin-ajax.php (lower priority now)
Submissions do come through, so it isn't blocking everyone. Still worth checking — it may block some visitors (seen once on our first request).
Find where `hc_js_gate` comes from:
```bash
grep -ri "hc_js_gate" wp-content/plugins wp-content/mu-plugins wp-content/themes .htaccess
```
Also check the hosting panel (LiteSpeed / bot protection / "JS challenge" / ModSecurity / Imunify settings).

- **Fix:** whitelist `/wp-admin/admin-ajax.php` (and `/wp-json/`) from the challenge, or turn the challenge off.
- If it's hosting-level and we can't change it → ask hosting support (logins in Passbolt).
- **Verify:** incognito / different network → `/contact/` → form shows → DevTools Network: `admin-ajax.php` (`forminator_load_form`) returns JSON `{"success":true…}`, not "Checking your browser".

### 3. Test submission in GTM Preview on https://grovedentalaz.com/contact/?id=ppc ✅ DONE — SS - Contact Form fired
Mark name/message as **TEST** — it emails the clinic; ask PM to give the clinic a heads-up.

Expect:
- `form_success` → **SS - Contact Form** (`k3FlCJuAt5AbELDHk59B`) + user-provided data fires
- LeadTracker sends to `G-7QSVYJ9053`
- Forminator success message shows

Take screenshots for the reply.

### 4. (Recommended) Make the form trigger fire only on real success
Current T15 pushes `form_success` on the browser `submit` event = counts failed/invalid attempts, and only once per page (a failed first try blocks counting the real one).

Replace with Forminator's success event:
```html
<script>
jQuery(document).on('forminator:form:submit:success', function (e) {
  var f = e.target, em = f.querySelector('input[type="email"]');
  window.dataLayer.push({event: 'form_success', formId: f.id, email: em ? em.value.trim().toLowerCase() : null});
});
</script>
```
Keep the same event name so existing triggers (R3) and enhanced conversions keep working. Publish + retest.

### 5. Comprehensive Dental Form conversion (`M90uCKSYt5AbELDHk59B`) — asked PM in final comment
Form no longer exists on the homepage → it will never fire. Asked in July (#57), no answer.
Ask PM again; if OK → pause the GTM tag and PM sets the conversion action to Removed/Secondary (otherwise it keeps showing "No recent conversions" in Google Ads).

## Already OK (no action)
- SSL renewed (valid to Feb 14 2027).
- GTM on all pages; Contact Form trigger still matches the current Forminator form on `/contact/`.
- Call / ZocDoc / Email click / flexbook tags still in the container.

## Final comment
Final AC comment is in [10-01-2026-comment.txt](10-01-2026-comment.txt) (paste that file as-is).
It covers: test submission → **SS - Contact Form** (`17513636784` / `k3FlCJuAt5AbELDHk59B`) tracking properly + screenshots, and the step 5 question (remove Comprehensive Dental Form conversion).
