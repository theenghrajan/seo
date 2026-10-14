import re,json,sys
s=open(sys.argv[1],encoding='utf8').read()
i=s.index('var data = ')+len('var data = ')
dec=json.JSONDecoder(); d,_=dec.raw_decode(s[i:])
r=d['resource']
print('version',r.get('version'))
macros=r['macros']
def v(x):
    if isinstance(x,list):
        if x and x[0]=='macro': return '{{m%d:%s}}'%(x[1],macros[x[1]].get('function'))
        if x and x[0]=='escape': return v(x[1])
        if x and x[0]=='list': return [v(y) for y in x[1:]]
        if x and x[0]=='map': return {v(x[k]):v(x[k+1]) for k in range(1,len(x),2)}
        if x and x[0]=='template': return ''.join(str(v(y)) for y in x[1:])
        return [v(y) for y in x]
    return x
for n,t in enumerate(r['tags']):
    t2={k:(v(val) if k!='vtp_html' else str(v(val))[:400]) for k,val in t.items() if k not in('tag_id','priority','vtp_metadata')}
    print('TAG',n,t.get('tag_id'),json.dumps(t2)[:1500])
for n,p in enumerate(r['predicates']): print('PRED',n,json.dumps({k:v(x) for k,x in p.items()}))
for rule in r['rules']: print('RULE',rule)
for n,m in enumerate(macros): print('MAC',n,json.dumps({k:v(x) for k,x in m.items() if k!='vtp_javascript'})[:300])
