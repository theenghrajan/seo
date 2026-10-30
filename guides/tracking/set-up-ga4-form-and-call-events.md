# Set up GA4 form_submission + click_to_call events in GTM

Use for the "Website Tracking - GA4" task once GTM + the BED template + `SS - GA4 Page View` are in the container. Follows the SEO Tracking Implementation Manual (sections 6–7): https://docs.google.com/document/d/13TLFZSFAGJpW2iRMDux5KWWI-pCzgE9tZNKBThFFjZY/edit?tab=t.0

## 1. Pick the form method (manual 6.1)
Open the form page, view source, find the `<form>`:
- Redirects to a thank-you URL → **A** (Page View trigger, URL contains `thank-you`).
- Plain HTML post (CF7 without AJAX, custom forms) → **B** (GTM Form Submission trigger, Wait for Tags + Check Validation on).
- AJAX / JS forms (Fluent Forms, Gravity, HubSpot, Divi) → **C** (listener tag pushes a dataLayer event, Custom Event trigger). See Platform notes.

## 2. Build (import or by hand)
Import a JSON instead of clicking: GTM → **Admin → Import Container** → choose the JSON → **Existing workspace** (the one with the template) → **Merge → Rename conflicting** → Confirm. Check the preview says only *new* items get added (nothing modified or deleted).

Items (manual naming):
| Type | Name | Setting |
|---|---|---|
| Variable (Constant) | `SS - GA4 ID` | `G-XXXXXXXX` |
| Built-in variables | Click URL, Page Path, Form ID | enabled |
| Trigger | `SS - Form Submission` | per method |
| Trigger (Just Links) | `SS - Click To Call` | Some Link Clicks, `Click URL` contains `tel:` |
| Tag (GA4 Event) | `SS - GA4 Event (Form Submission)` | event `form_submission`, params `form_name`, `form_id` |
| Tag (GA4 Event) | `SS - GA4 Event (Click To Call)` | event `click_to_call`, param `click_url = {{Click URL}}` |

## 3. Test (manual 7) — never publish before both checks
1. GTM → **Preview** → enter the site URL → Connect. Keep the Tag Assistant tab open.
2. In GA4 → **Admin → DebugView** (same Google login, property of the GA4 ID).
3. **Form:** on the form page submit a real test (Name "SS Test", your email, Message "Test - please ignore").
   - Tag Assistant left list: event `fluentform_submission_success` (or your custom event) appears **once**, and `SS - GA4 Event (Form Submission)` is under **Tags Fired**.
   - Submit once with a required field empty → no event, no tag (fires on success only).
   - DebugView: `form_submission` appears with `form_name` / `form_id`.
4. **Call:** click every phone link (header, footer, body) on desktop, and once in mobile view (DevTools device toolbar).
   - Tag Assistant: a `Link Click` event, `SS - GA4 Event (Click To Call)` fired, `Click URL` = `tel:...`.
   - DebugView: `click_to_call` with `click_url`.
   - **No phone link on the site?** In the previewed tab's DevTools console run:
     `document.body.insertAdjacentHTML('afterbegin','<a id="ss-test-tel" href="tel:+10000000000" style="position:fixed;top:0;left:0;z-index:99999;background:red;color:#fff;padding:8px">SS test call</a>')`
     then click it. The red link exists only in your tab and disappears on reload. Tell the PM the site has no clickable number (manual 6.2).
5. Screenshot each Tag Assistant "Tags Fired" view and the DebugView event (red box on the event name) for the AC comment.
6. Publish only when the user says so: **Submit** → version name e.g. `Added form_submission + click_to_call` → Publish. Then spot-check the live site in GA4 Realtime.

## Platform notes
- **Fluent Forms** (WordPress, `<form class="frm-fluent-form" id="fluentform_N">`): AJAX submit, so the GTM Form trigger doesn't fire. On success the plugin runs `jQuery(document.body).trigger("fluentform_submission_success", {form, config, response})` (`config.id` = form ID). Listener tag (Custom HTML, fires on DOM Ready):
  ```html
  <script>
  (function () {
    if (!window.jQuery) return;
    jQuery(document.body).on('fluentform_submission_success', function (e, data) {
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({ event: 'fluentform_submission_success', formId: data && data.config ? data.config.id : undefined });
    });
  })();
  </script>
  ```
  Trigger: Custom Event `fluentform_submission_success`; Data Layer Variable `DLV - formId` = `formId`. A form set to "redirect to URL" still fires this event before the redirect, but the hit can be lost on the page unload. For those forms use method A.
- **LeadTracker** (SS standard, all forms): Custom HTML tag `SS - LeadTracker` on All Pages, script from the "Anil Notes for Tracking - GA4" doc (https://docs.google.com/document/d/1RgYdzidICicV3PXqn7yRA7zD5ZoV6X4jvteBq77ffM8/edit?tab=t.0, tab "LeadTracker"); replace the `sendTo` G- ID with the site's GA4 ID. It hooks `form` submit; with AJAX forms that preventDefault (Fluent Forms) it only sends data, no resubmit. Its GA4 event `ss_lt_form_submission` (param `form_data`) needs a global `gtag` on the page: in Preview run `typeof gtag` in the console.
- **Gravity Forms**: see screenshots in `tracking/gravity-form-gtm-tag-references/`.

## Seen on
- [catalystluxuryresidential.com #79 (504272)](../../Website%20Tracking%20-%20GA4/catalystluxuryresidential.com/10-29-2026-504272-log.md) — Fluent Forms #3 on /contact/, no phone numbers on site.

Full task procedure (GTM + GA4 admin + LeadTracker + comment): skill `website-tracking-ga4` (`D:/work/claude/website-tracking-ga4/SKILL.md`).
