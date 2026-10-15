"""Crawl lfelectricalservice.com URL lists, extract CTA links/buttons and forms -> ctas.json"""
import json, sys, re, urllib.request, concurrent.futures as cf
from html.parser import HTMLParser
from pathlib import Path

d = Path(sys.argv[1])
urls = [u.strip() for f in ("pages.txt", "crb_service.txt", "our_work.txt") for u in (d / f).read_text().split() if u.strip()]
VOID = {"br", "img", "input", "meta", "link", "hr", "source", "wbr"}

class P(HTMLParser):
    def __init__(s):
        super().__init__(); s.stack = []; s.ctas = []; s.forms = []; s.cur = None; s.skip = 0
    def region(s):
        for t, a in reversed(s.stack):
            if t in ("header", "footer", "nav"): return t
            c = a.get("class", "") + " " + a.get("id", "")
            if re.search(r"\b(header|footer|popup|modal|sticky)\b", c, re.I): return re.search(r"header|footer|popup|modal|sticky", c, re.I).group(0).lower()
        return "main"
    def handle_starttag(s, t, attrs):
        a = {k: v or "" for k, v in attrs}
        if t in ("script", "style", "noscript"): s.skip += 1
        if t == "form":
            s.forms.append({"id": a.get("id", ""), "class": a.get("class", ""), "action": a.get("action", ""), "region": s.region()})
        if t in ("a", "button") and s.cur is None:
            s.cur = {"tag": t, "href": a.get("href", ""), "class": a.get("class", ""), "onclick": a.get("onclick", ""), "region": s.region(), "text": ""}
        if t not in VOID: s.stack.append((t, a))
    def handle_endtag(s, t):
        if t in ("script", "style", "noscript"): s.skip = max(0, s.skip - 1)
        if s.cur and t == s.cur["tag"]:
            s.cur["text"] = " ".join(s.cur["text"].split()); s.ctas.append(s.cur); s.cur = None
        for i in range(len(s.stack) - 1, -1, -1):
            if s.stack[i][0] == t: del s.stack[i:]; break
    def handle_data(s, data):
        if s.cur is not None and not s.skip: s.cur["text"] += data

def get(u):
    try:
        r = urllib.request.urlopen(urllib.request.Request(u, headers={"User-Agent": "Mozilla/5.0"}), timeout=30)
        p = P(); p.feed(r.read().decode("utf-8", "replace")); return u, {"ctas": p.ctas, "forms": p.forms}
    except Exception as e:
        return u, {"error": str(e)}

with cf.ThreadPoolExecutor(8) as ex:
    out = dict(ex.map(get, urls))
(d / "ctas.json").write_text(json.dumps(out, indent=1))
print(len(out), "pages;", sum("error" in v for v in out.values()), "errors")
