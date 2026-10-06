# Find installed tags (GTM, GA4, Google Ads, Meta Pixel)

Use this to check which tracking IDs a site loads and where they were added.

## ID patterns
| Tag | ID looks like | Loaded from |
|---|---|---|
| Google Tag Manager | `GTM-XXXXXXX` | `googletagmanager.com/gtm.js?id=` |
| GA4 / Google tag | `G-XXXXXXXXXX` | `googletagmanager.com/gtag/js?id=` |
| Google Ads | `AW-XXXXXXXXX` | `googletagmanager.com/gtag/js?id=` |
| Meta Pixel | 15–16 digit number | `connect.facebook.net/.../fbevents.js`, hits to `facebook.com/tr?id=` |

## 1. Quick check: Tag Assistant
1. Go to https://tagassistant.google.com, then **Add domain**, enter the URL and click **Connect**.
2. It lists every GTM container and Google tag ID that fires. For Meta, use the **Meta Pixel Helper** Chrome extension.

## 2. View Page Source (only finds hard-coded tags)
1. Press **Ctrl+U**, then **Ctrl+F** and search for `GTM-`, `G-`, `AW-`, `googletagmanager`, `fbevents`.
2. **No match doesn't mean no tag.** Many CMSs (DealerOn, Lovable/React, some plugins) add tags with JavaScript after the page loads. In that case, go to step 3.

## 3. DevTools (finds everything the browser actually loads)
1. Press **F12**, open the **Network** tab, then reload with **Ctrl+R**. DevTools only records requests while it's open.
2. Type one of these in the filter box:
   - `gtm.js?id=`: one row per GTM container
   - `gtag/js?id=`: GA4 (`G-`) and Google Ads (`AW-`) tags
   - `collect`: GA4 hits as they're sent
   - `facebook.com/tr`: Meta Pixel hits (`id=` is the pixel, `ev=` is the event)
3. Open the **Elements** tab and press **Ctrl+F**. This searches the page after scripts have run, so it finds IDs that View Page Source misses.
4. Open the **Console** tab and run `google_tag_manager` to list loaded containers, or `dataLayer` to see pushed events.

## 4. Find where it was added (needs access)
- **Through GTM:** if a `G-` or `AW-` ID only appears after `gtm.js` loads, it lives inside a container. Open tagmanager.google.com, then the container, then **Tags**.
- **Otherwise:** check the CMS (see Platform notes below).

## Platform notes
- **WordPress:**
  - Plugins: Site Kit, GTM4WP, WPCode / Insert Headers and Footers, Rank Math / Yoast.
  - Theme code: Appearance > Theme File Editor > `header.php`.
- **Magento:** Stores > Configuration > Sales > Google API, or Content > Design > Configuration > HTML Head > Scripts and Style Sheets.
- **DealerOn:** GTM is added with JS, so it's not in the raw HTML. Use DevTools. The site loads many containers (vendors + ours).
- **Lovable:** the project's `index.html`. Ask in the Lovable chat, or check the code view.
- **Cloudflare Zaraz:** tags can be added at the CDN, under Cloudflare > Zaraz.

## Seen on
- ddmotors.com (DealerOn): `GTM-K39MXFMK` is ours, and it's only visible through DevTools or Tag Assistant. See [09-30-2026-dd-ford.txt](../../Facebook%20Ads%20Tracking/09-30-2026-dd-ford.txt).
- blindsanddesignsofflorida.com (WordPress + Site Kit): no GTM. Site Kit's Google tag `GT-TQT95LDD` sends to two GA4 IDs. To list a `GT-` tag's destinations, open `https://www.googletagmanager.com/gtag/js?id=GT-XXXX` and search for `"G-`. See [10-02-2026-log.md](../../Website%20Tracking%20-%20GA4/blindsanddesignsofflorida.com/10-02-2026-log.md).
