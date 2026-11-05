# Fix a Forminator form that disappears with ?id=ppc

Use when a Forminator form shows on `/page/` but is blank on `/page/?id=ppc`, and PPC form conversions drop to zero.

## Why
When "Load form using AJAX" is on, Forminator's loader (`front.multi.min.js`, `forminatorLoader.init`) copies every URL query param into the `forminator_load_form` request. `?id=ppc` replaces the form ID, the server answers `{"success":false,"data":[{"code":"invalid_id"}]}`, and the form never renders. Seen on Forminator 1.58.4.

## Check
1. Open `https://<site>/<form-page>/?id=ppc` and the same URL without the param.
2. DevTools console: `document.querySelector('[id^=forminator-module-]').querySelectorAll('input:not([type=hidden]),textarea').length`. A result of `0` with the param and `>0` without it confirms the problem.
3. Optional proof, run in the console:
   `fetch('/wp-admin/admin-ajax.php',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'action=forminator_load_form&type=forminator_forms&id=ppc'}).then(r=>r.text())` → `invalid_id`.

## Fix
1. WP Admin → Forminator → Forms → the form → Edit → **Behavior → Rendering → turn off "Load form using AJAX"** → Update.
2. Clear the caches (WP Rocket, Hummingbird, LiteSpeed, host cache).
3. Retest `/<form-page>/?id=ppc`: the form shows. Then submit a TEST entry in GTM Preview and check that the form conversion tag fires.

## Platform notes
- Only AJAX-loaded Forminator forms are affected (`data-forminator-render` form with an empty body in the page HTML).
- `gclid` / `utm_*` don't break it. Only params whose names match load fields do: `id`, `type`, `action`, `nonce`, `render_id`.

## Seen on
- [grovedentalaz.com 11-04-2026](../../Google%20Ads%20Tracking%20[Lead%20Gen]/grovedentalaz.com/11-04-2026-391958-log.md)
