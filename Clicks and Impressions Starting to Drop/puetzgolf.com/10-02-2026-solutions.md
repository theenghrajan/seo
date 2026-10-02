# 10-02-2026 — Solutions (comment #7)

1. **301 redirects for active products whose URL changed.** Add them in Marketing > SEO & Search > URL Rewrites (Custom, Permanent 301). Start with the sample URLs once approved. Build the full list from IBM's GSC 403 export by matching old URLs to current ones.
2. **Discontinued products.** 301 them to the new model or main category.
   - Option A: IBM or the client sends a replacement list, and we add it through URL Rewrites.
   - Option B: BED writes a module that 301s disabled products to their category. The client's developer installs it, and we confirm the install.
3. **Amasty Advanced Search.** Set "Enable Redirect from 404 to Search Results" = No so nonexistent URLs return a real 404. Also turn off "Redirect to Product Page" for a single search result. Needs approval. Downside: old links show a 404 page instead of search results.
4. **robots.txt.** The client's developer removes the empty `Googlebot` and `Googlebot-image` groups (from #94).
5. **Ask the client** what changes the URL keys, so this stops recurring.
6. **Validate.** After 1–3, IBM runs Validate Fix on "Blocked due to access forbidden (403)" in GSC. URLs should move to "Page with redirect" or "Not found (404)".

Draft reply: [10-02-2026-comment.txt](10-02-2026-comment.txt)
