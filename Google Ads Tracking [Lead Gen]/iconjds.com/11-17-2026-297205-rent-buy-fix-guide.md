# iconjds.com/lp/ — Rent/Buy fix guide (AC 297205, 11-17-2026)

**Problem:** the 3 quote forms on /lp/ (top `form-id-0`, footer `form-id-1`, Request A Quote pop-up `form-id-2`) all use `id="rent"` / `id="buy"`. A label's `for="buy"` points to the first match on the page, so clicking Buy in the footer or pop-up ticks Buy in the top form. The footer/pop-up form keeps Rent and sends Rent.

**Fix:** give the footer and pop-up radios their own ids and point their labels at them. Top form unchanged. `name="interest-option"` and the values `Rent`/`Buy` stay, so the mailer, emails and GTM (`formEntries`) are unaffected. Checked 11-17: no CSS or JS on the page uses `#rent` / `#buy`.

## File
- SiteGround → Site Tools → Site → File Manager → `public_html/lp/index.php` (the /lp/ folder is static, not WordPress). Or SFTP, same path.
- **Download a backup copy first** (e.g. `index-backup-11-17-2026.php` — keep it outside `/lp/` or delete it after, so it isn't publicly reachable).

## Edits (4 lines in each of 2 forms)
Line numbers are from the rendered page and may be off slightly in the PHP file; search instead. Each search string appears **3 times** — leave the 1st (top form) alone, change the 2nd (footer) and 3rd (pop-up).

Search: `id="rent"` / `for="rent"` / `id="buy"` / `for="buy"`

### 2nd occurrence — footer form (`id="form-id-1"`, rendered ~lines 1214–1220)
Before:
```html
<input id="rent" name="interest-option" type="radio" value="Rent" checked>
<label for="rent" class="form-label radio-element-label">Rent</label>
...
<input id="buy" name="interest-option" type="radio" value="Buy">
<label for="buy" class="form-label radio-element-label">Buy</label>
```
After:
```html
<input id="rent-footer" name="interest-option" type="radio" value="Rent" checked>
<label for="rent-footer" class="form-label radio-element-label">Rent</label>
...
<input id="buy-footer" name="interest-option" type="radio" value="Buy">
<label for="buy-footer" class="form-label radio-element-label">Buy</label>
```

### 3rd occurrence — pop-up form (`id="form-id-2"`, rendered ~lines 1411–1417)
Same 4 lines, with `-popup`:
```html
<input id="rent-popup" name="interest-option" type="radio" value="Rent" checked>
<label for="rent-popup" class="form-label radio-element-label">Rent</label>
...
<input id="buy-popup" name="interest-option" type="radio" value="Buy">
<label for="buy-popup" class="form-label radio-element-label">Buy</label>
```
Only change what's between the quotes in `id="..."` and `for="..."`. Leave the lines in between (`...`) as they are.

## After saving
1. SiteGround → Speed → Caching → **Flush cache** (Dynamic + Memcached if on). Hard-refresh /lp/ (Ctrl+F5).
2. Quick check, no submit:
   - Footer form: click **Buy** → Buy is selected in the footer; the top form still shows Rent.
   - Request A Quote pop-up: click **Buy** → Buy selected in the pop-up; top form unchanged.
   - Click **Rent** again in each → switches back.
   - Top form: Buy/Rent still work.
3. Console check (optional): `document.querySelectorAll('#rent,#buy,#rent-footer,#buy-footer,#rent-popup,#buy-popup').length` → `6`.
4. Then run the Preview test in [11-17-2026-297205-test-guide.md](11-17-2026-297205-test-guide.md) (one marked Buy submission from footer and pop-up; dataLayer and email must say Buy).
5. Screenshots for the comment (Awesome Screenshot, red box on the selected Buy): footer form, pop-up form.

## Rollback
Re-upload the backup `index.php` and flush cache.
