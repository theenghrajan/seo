# 10-02-2026 — Solutions (comment #1)

Can do now (Ads / GA4 / public site):
1. **Calls from ads (219284833):**
   - Check that each enabled campaign has an active call asset, and that "Call conversion action" in the asset/account settings points to this action.
   - Check that call reporting is on and the action is enabled, and Primary if it should bid.
2. **Website calls (185313808):**
   - Match the action's tag label to `MPFLCJDUrlgQ17mA_wM`, and check the call length threshold (60s is standard).
   - Test the swap with `#google-wcc-debug` on home, LP, contact and a location page.
   - Report the two configs (gtag `(929) 593-2438` vs legacy WCM `866-646-4338`) and the unswapped `(718) 742-2222`.
3. **Forms:** form #2 (Contact Us) is the only lead form. Map its confirmation to a thank-you page, or track it with a GF submit event.
   - Confirm "storage_estimate_thank_you" (6552842610) fires on the page form #2 actually lands on.
   - Do a test submit only after the PM OKs it, because a test is a real lead email.
4. **GA4:** find which of `G-FT8P2Q7ZM6` / `G-74QBNG7ZB3` / `G-T6EGQW89RE` is property 332140794. Flag the duplicates and the dead UA tags.
5. **benhur:** confirm from the Ads conversion source that none of those actions can fire here, then hand them back to Joel to remove.

After access (CMS / hosting / GTM):
6. GTM: get access to `GTM-TDJJHHKZ` (existing, purchase tags) or create ours. Move the hard-coded gtag/WCM into GTM, and remove the UA and duplicate tags.
7. LeadTracker / GF event for form #2, an Ads form conversion, and enhanced conversions.
8. Google Tag Gateway (needs hosting/CDN).

Draft reply: [10-02-2026-comment.txt](10-02-2026-comment.txt)
