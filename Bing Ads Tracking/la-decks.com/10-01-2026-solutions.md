# Solutions — la-decks.com (10-01-2026)

- **Task:** #49 Bing Tracking — https://login.smartsites.com/projects/7490/tasks/500090
- **Replying to:** comments #5 + #6, Connor O'Hanlon
- **Log:** [10-01-2026-log.md](10-01-2026-log.md) · **Comment:** [10-01-2026-comment.txt](10-01-2026-comment.txt)

## Summary
Connor's CallRail change fixed it. Bing ad visitors now see **(323) 433-5744** on the main site and both landing pages. Direct visitors still get the normal pool numbers. **No change needed on our end.**

## Steps before posting
1. Retest in a fresh incognito window (close all incognito windows between tests — they share one session):
   - https://la-decks.com/decks-builders/?utm_source=bing&utm_medium=cpc&msclkid=test123
   - https://la-decks.com/la-deck-builder/?utm_source=bing&utm_medium=cpc&msclkid=test123
   - https://la-decks.com/?utm_source=bing&utm_medium=cpc&msclkid=test123
   - Expect (323) 433-5744 in header/buttons/footer → screenshot each.
2. Direct visit (separate private browser, no `?…`) → pool number, not 433-5744 → 1 screenshot.
3. Firefox private: turn off Enhanced Tracking Protection (shield) or CallRail won't swap.

## Notes (internal)
- (323) 510-7228 still in schema (JSON-LD) — expected, not an issue.
- Optional for PM: a real test call to 323-433-5744 should appear in CallRail under the Bing tracker (PM/client side).
