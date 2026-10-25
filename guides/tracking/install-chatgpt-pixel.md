# Install the ChatGPT (OpenAI Ads) pixel and a booking/purchase goal

Use when a PM sends an OpenAI / ChatGPT Ads Pixel ID and setup snippet, and asks for the pixel plus a conversion goal with value.

Docs: [JavaScript Pixel](https://developers.openai.com/ads/measurement-pixel) · [Supported events](https://developers.openai.com/ads/supported-events) · [Conversions API](https://developers.openai.com/ads/conversions-api) · Ads Manager: https://ads.openai.com (Conversions tab).

## How it works
- **Base snippet** (the PM's code) loads the SDK and runs `oaiq("init", {pixelId})`. It belongs in `<head>`, near the top, **once per page**. It reads the `oppref` click ID from the ad landing URL and stores it in a first-party cookie (`__oppref`, 30 days).
- **Goal** = an `oaiq("measure", "<event>", {...})` call at the moment of conversion. In Ads Manager there's nothing to "create" for it: an event appears in the Conversions tab once the pixel sends it, and the PM picks it as the campaign goal.
- Only **standard** events can be campaign optimization goals. Don't use `custom` for the main goal.

## Pick the event
| Conversion | Event | Data `type` |
|---|---|---|
| Paid order / paid booking / ticket purchase | `order_created` | `contents` |
| Free booking, consultation, demo | `appointment_scheduled` | `customer_action` |
| Lead form | `lead_created` | `customer_action` |
| Account / event sign-up | `registration_completed` | `customer_action` |

Value rules: `amount` is an **integer in minor units** (cents for USD): $129.99 → `12999`. `currency` (ISO code, e.g. `USD`) is required whenever `amount` is sent. Everything except `type` is optional.

## Access to have before starting
1. **Where the base snippet goes** (in priority order):
   - a) Site code / CMS `<head>`. This is what the PM's instructions say. Needs CMS/theme access, or the client's developer adds it.
   - b) GTM, if there's no code access. Needs **Publish** on every container on the pages involved (main site + booking/checkout subdomain). Edit-only means the client publishes our version.
2. **GTM access** for the goal tag (the goal needs the conversion trigger and value from the dataLayer), same container rules as above.
3. **OpenAI Ads Manager** (recommended): a user for web@smartsites.com on the client's ad account, to confirm events and values arrive. Otherwise the PM confirms.
4. **Test conversion approval**: a test product or coupon, or the PM's OK for a real order/booking that the client cancels or refunds.
5. **Consent / CSP**: the CMP the site uses (if any), and whether it sends a Content-Security-Policy header.

## Steps

### A. Find the setup
1. Check which GTM containers load on the landing pages **and** on the conversion page (see [find-installed-tags.md](find-installed-tags.md)). Cookies are per domain, so the base snippet must load on both if the conversion happens on a subdomain.
2. In GTM, find the trigger used by the existing Google Ads purchase/booking conversion (often Custom Event `purchase`) and the dataLayer variables for value and transaction ID (e.g. `dlv - ecommerce.value`, `dlv - ecommerce.transaction_id`). Open Preview, make a test conversion if allowed, and check the `purchase` push for the real key names.
3. Search the page source for `oaiq` to make sure the client hasn't already added the snippet. **One base snippet per page.**

### B. Base snippet
- **Code route**: paste the PM's snippet as-is, right after `<head>` (before other scripts), on every page of every domain involved.
- **GTM route**: Tags → New → **Custom HTML**, `SS - ChatGPT Pixel - Base`. Paste the snippet as-is.
  - Trigger: **Initialization - All Pages**. This fires before Page View, which is the closest GTM gets to "top of head".
  - Advanced Settings → Tag firing options: **Once per page**.

Keep `debug:true` while testing. Before publishing, change it to `debug:false` (or remove it).

### C. Goal with value (GTM)
1. Variables → New → **Custom JavaScript**, `cjs - oaiq amount (cents)`:
   ```js
   function () {
     var v = parseFloat({{dlv - ecommerce.value}});
     return isNaN(v) ? undefined : Math.round(v * 100);
   }
   ```
2. Tags → New → **Custom HTML**, `SS - ChatGPT Pixel - Booking`:
   ```html
   <script>
   (function () {
     var data = { type: "contents", currency: "USD" };
     var amount = {{cjs - oaiq amount (cents)}};
     if (amount) data.amount = amount; else delete data.currency;
     var opts = {};
     var tid = {{dlv - ecommerce.transaction_id}};
     if (tid) opts.event_id = String(tid);
     oaiq("measure", "order_created", data, opts);
   })();
   </script>
   ```
   - Trigger: **the same trigger the Google Ads booking/purchase conversion uses**, so the counts match.
   - Advanced Settings → Tag Sequencing: set "Fire a tag before" to `SS - ChatGPT Pixel - Base` (GTM route only).
   - With the code route, `oaiq` already exists on the page, so no sequencing is needed.
   - Use the site's real currency if it isn't USD.
   - `event_id` is only added when a transaction ID exists. A string `"undefined"` would dedupe every booking into one.

### D. Test
1. GTM **Preview** on the main site, then on the booking site. Check that the Base tag fired on both.
2. Open DevTools Console (debug on). You should see `oaiq` logs. In the Network tab, filter `bzr.openai.com` for requests.
3. Make the test conversion. Check that the Booking tag **Fired once**, and that the console/network shows `order_created` with `amount` (in cents) and `currency`.
4. Screenshots with red boxes: the tags, the trigger, Preview "Fired", the console/network event, and the confirmation page.

### E. Go live
1. Set `debug:false` in the base tag.
2. **Submit**: version name `SS - ChatGPT pixel + booking goal (order_created)`, description with the task link. Publish, or ask the client to publish if we only have edit access.
3. In Ads Manager → Conversions, the pixel should show activity and `order_created` should show with value. It can take some time to appear. The PM sets it as the campaign goal.
4. Log the GTM version number and the screenshot links in the task log.

## Notes
- **Consent**: the pixel assumes consent unless `oaiq("consent", false)` runs before init. If the site's CMP blocks marketing tags, add the same consent condition to the Base tag trigger. You can also call `oaiq("consent", true|false)` from the CMP callback. Ask the PM/client first.
- **CSP**: allow `script-src https://bzrcdn.openai.com`, `connect-src https://bzr.openai.com https://bzrcdn.openai.com`, `img-src https://bzr.openai.com`.
- `app_installed` / `app_opened` aren't supported by the pixel (they're server-only).
- A community GTM template ("OpenAI Ads Pixel", `gtm-openai-ads-pixel`) exists, but Custom HTML is simpler and needs no import.

## Platform notes
- WordPress: a header-scripts plugin (WPCode / Insert Headers and Footers) or the theme's `header.php` right after `<head>`.
- Shopify: `theme.liquid` right after `<head>`. For purchases, use Customer Events (custom pixel), because checkout doesn't run theme code.
- Duda: Site Settings → Head HTML.
- Custom/JS apps (e.g. Vue booking engines): the client's developer adds the snippet to the app's `index.html` `<head>`.

## Seen on
- [qcny.com — ChatGPT Tracking #35 (508304)](../../ChatGPT%20Tracking/qcny.com/10-25-2026-508304-log.md)
