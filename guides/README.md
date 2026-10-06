# Guides

Reusable how-tos, organized by topic. Task notes (`MM-DD-YYYY-log.md`) record what happened on one site. Guides record **how to do it** on any site.

## Layout
```
guides/
  README.md            ← this index
  <topic>/<how-to>.md  ← one task per file, kebab-case, starts with a verb
```

Topics: `tracking/` (GTM, GA4, Google Ads, Meta, Bing), `gsc/` (Search Console, indexing, 404/410), `security/` (malware, bots, Cloudflare), `cms/` (WordPress, Magento, DealerOn, Lovable). Create a topic folder when its first guide is written.

## Index
| Topic | Guide | Use when |
|---|---|---|
| cms | [make-wordpress-user-admin.md](cms/make-wordpress-user-admin.md) | Our WordPress login isn't an Administrator; steps for the client's developer (dashboard, WP-CLI or phpMyAdmin) |
| tracking | [find-installed-tags.md](tracking/find-installed-tags.md) | Finding which GTM, GA4, Google Ads or Meta Pixel IDs a site loads, and where they were added |
| tracking | [test-google-call-forwarding.md](tracking/test-google-call-forwarding.md) | Checking that the Google Ads forwarding number swaps on the site, and finding unswapped numbers |

## Guide format
- `# Title`, then one line on when to use it.
- Numbered steps, with exact menu paths and filter strings.
- A **Platform notes** section for CMS-specific locations.
- A **Seen on** list linking the task notes where the guide was used.
