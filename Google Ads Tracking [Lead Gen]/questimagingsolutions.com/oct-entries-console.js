// Paste into Firefox DevTools console (F12 > Console) while on any wp-admin page of questimagingsolutions.com.
// One read-only request: October 2026 Gravity Forms entries, tracking fields only (no names/emails/phones).
(async () => {
  const nonce = window.wpApiSettings?.nonce
    || (await fetch('/wp-admin/admin-ajax.php?action=rest-nonce', { credentials: 'include' }).then(r => r.text())).trim();
  const s = encodeURIComponent(JSON.stringify({ start_date: '2026-10-01', end_date: '2026-10-31' }));
  const r = await fetch(`/wp-json/gf/v2/entries?search=${s}&paging[page_size]=100&_labels=1`,
    { credentials: 'include', headers: { 'X-WP-Nonce': nonce } });
  if (!r.ok) return console.log('HTTP', r.status);
  const j = await r.json(), L = j._labels || {};
  const label = (f, k) => { const l = (L[f] || {})[k.split('.')[0]]; return typeof l === 'object' ? (l[k] || Object.values(l)[0]) : l; };
  const rows = j.entries.map(e => {
    const o = { id: e.id, form: e.form_id, date: e.date_created, url: (e.source_url || '').replace(location.origin, '') };
    for (const [k, v] of Object.entries(e)) {
      const n = /^\d/.test(k) && label(e.form_id, k);
      if (v && n && /gclid|utm|lead type|hear/i.test(n)) o[n] = String(v).slice(0, 25);
      // fallback when labels are missing: keep values that look like tracking data only
      else if (v && /^\d/.test(k) && /^(google|bing|facebook|meta|cpc|ppc|organic|referral|direct|\(not set\)|undefined|Cj[\w-]{10,}|EAIa[\w-]{6,}|PMAX|.*Phrase|.*Exact)$/i.test(String(v)))
        o['f' + k] = String(v).slice(0, 25);
    }
    return o;
  }).sort((a, b) => a.id - b.id);
  const out = JSON.stringify({ total: j.total_count, rows }, null, 1);
  copy(out); console.log(out); console.log('Copied to clipboard');
})();
