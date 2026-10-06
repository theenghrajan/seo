# 10-02-2026 — Solutions (comment #2)

1. Ask the PM whether to create a new GTM container + GA4 property from our end, and request admin-level WordPress access or hosting access (current WP user is not admin; needed to install GTM).
2. Once confirmed:
   - **New GTM:** create the container, install it on the WordPress site, and add the GA4 Configuration tag.
   - **Existing GA4 tag in Site Kit:** disable Site Kit's tag placement (Site Kit > Settings > Analytics > "Place Google Analytics code" off) so GA4 doesn't fire twice.
3. Then follow the SOP:
   - LeadTracker / form events
   - referral exclusions (dev site, AC, own domain)
   - bot filtering
   - Google signals / demographics
   - IP exclusion
   - Enhanced Measurement
   - "Daily Visits - 0 traffic" alert only

Draft reply: [10-02-2026-comment.txt](10-02-2026-comment.txt)
