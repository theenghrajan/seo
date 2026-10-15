# Add a Google Ads "Calls from website" tag in GTM

Use this when the PM sends a new website-call conversion action (Conversion ID + Label + phone number) that isn't in GTM yet.

## Before you start
1. Get from the AC comment: conversion action name, **Conversion ID**, **Conversion Label**, the **phone number exactly as shown on the site**.
2. Find where that number shows on the site: Ctrl+F the number on the pages (or scan the sitemap). The number on the page must match the tag's number digit for digit.
3. Check it isn't already in GTM: Tags → search the last 4 digits and the label.

## 1. Note the live version (your undo)
1. GTM → container → **Versions**. Write the current **Live** version number in the task log.
2. **Overview** → check "Workspace Changes". If there are changes you didn't make, stop and ask. Don't publish someone else's draft.

## 2. Copy an existing call tag
Copying keeps the team's naming style, trigger and settings.
1. **Tags** → open an existing **Google Ads Calls from Website Conversion** tag (e.g. the "original number" one).
2. Top right **⋮ → Copy**.
3. Rename it in the same style, ending with the number, e.g. `SS - Google Ads Conversion (Calls From Website (845) 321-7206 - Alternate)`.
4. Replace **Conversion Label** and **Phone number**. Keep Conversion ID, unless the PM gave a different one.
5. Trigger:
   - Number written in the page itself → keep **All Pages** (same as the copied tag).
   - Number put in by LeadTracker (`?id=ppc` swap) → use **Window Loaded**, because the swap finishes after page load.
6. **Save**.

## 3. Test in Preview
1. **Preview** → enter a page that shows the number, adding `?gclid=abc.123#google-wcc-debug` at the end, e.g. `https://www.site.com/contact?gclid=abc.123#google-wcc-debug`.
2. In Tag Assistant: click **Container Loaded** (or **Window Loaded**). The new tag is under **Tags Fired**.
3. On the site tab, Google's debug box should list the number. "Updated N element(s)" = swap works. From outside the US it can stay at "Attempting to auto-replace"; then the tag firing is the proof.
4. Awesome Screenshot: Tag Assistant with the tag under Tags Fired + the tag's settings (label, number), red boxes on both.

## 4. Publish
1. **Submit** → Publish and Create Version.
2. Version name: `Add <number> call tag (AC <taskId>)`; description: conversion action name + label.
3. Write the new live version number in the task log.

## 5. After publishing
- Open the page normally with Tag Assistant connected: the tag fires on the live site.
- In Google Ads → Goals → Conversions the action changes from "Inactive" to "No recent conversions" / "Active" only after real ad visitors call. That can take days. Tell the PM.
- Share the screenshots (Drive, anyone/reader) and put the links under the comment point.

## Gotchas
- Two call tags can't share one number. Each number gets its own conversion action and tag.
- If the number appears in different formats on different pages, Google still matches it in most cases, but test each page.
- Undo: Versions → the previous live version → **⋮ → Publish**.

## Seen on
- jcrocklandpaving.com: (845) 321-7206 Alternate, Contact page only. See [10-15-2026-435765-log.md](../../Google%20Ads%20Tracking%20[Lead%20Gen]/jcrocklandpaving.com/10-15-2026-435765-log.md).
