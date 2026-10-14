// node probe.js <url> [--mobile] : logs GA4/Ads hits, dataLayer events, tel numbers after load
const { spawn } = require('child_process'); const fs=require('fs'),os=require('os'),path=require('path');
const [url, ...rest]=process.argv.slice(2); const mobile=rest.includes('--mobile'); const gi=rest.indexOf('--geo'); const geo=gi<0?null:rest[gi+1];
const CHROME='C:/Program Files/Google/Chrome/Application/chrome.exe';
const profile=fs.mkdtempSync(path.join(os.tmpdir(),'probe-'));
const chrome=spawn(CHROME,['--headless=new','--remote-debugging-port=0',`--user-data-dir=${profile}`,'--no-first-run','about:blank'],{stdio:'ignore'});
const sleep=ms=>new Promise(r=>setTimeout(r,ms)); const t0=Date.now(); const T=()=>((Date.now()-t0)/1000).toFixed(1)+'s';
(async()=>{let port;for(let i=0;i<100&&!port;i++){try{port=fs.readFileSync(path.join(profile,'DevToolsActivePort'),'utf8').split('\n')[0]}catch{await sleep(100)}}
const page=(await (await fetch(`http://127.0.0.1:${port}/json/list`)).json()).find(t=>t.type==='page');
const ws=new WebSocket(page.webSocketDebuggerUrl); await new Promise(r=>ws.addEventListener('open',r));
let id=0;const pend={};
ws.addEventListener('message',e=>{const m=JSON.parse(e.data);if(m.id&&pend[m.id]){pend[m.id](m);delete pend[m.id];return}
 if(m.method==='Fetch.requestPaused'){(async()=>{const rid=m.params.requestId;const r=await send('Fetch.getResponseBody',{requestId:rid});
  let body=r.base64Encoded?Buffer.from(r.body,'base64').toString('utf8'):r.body;
  body=body.replace(/const __TERMLY_CLIENT_INFO__ = \{[^}]*\}/,'const __TERMLY_CLIENT_INFO__ = '+JSON.stringify({continent_code:'NA',country_code2:'US',state:geo}));
  await send('Fetch.fulfillRequest',{requestId:rid,responseCode:200,responseHeaders:[{name:'Content-Type',value:'application/javascript'}],body:Buffer.from(body).toString('base64')});console.log(T(),'GEO spoofed',geo)})();return}
 if(m.method==='Network.requestWillBeSent'){const u=m.params.request.url;
  if(/g\/collect|\/wcm\?|pagead\/conversion|pagead\/1p-conversion|viewthroughconversion|leadtracker|gtm\.js|gtag\/js/.test(u)){
   let s=u; const q=new URL(u).searchParams; if(/g\/collect/.test(u)) s=`GA4 tid=${q.get('tid')} en=${q.get('en')}`;
   console.log(T(),s.slice(0,220))}}
 if(m.method==='Runtime.consoleAPICalled'){const c=String(m.params.args[0]&&m.params.args[0].value);if(/Termly/.test(c)&&!/Region|consent|Blocking|block/i.test(c))return;console.log(T(),'console:',m.params.args.map(a=>a.value===undefined?(a.description||a.type):JSON.stringify(a.value)).join(' ').slice(0,300))}});
const send=(method,params={})=>new Promise(r=>{pend[++id]=r;ws.send(JSON.stringify({id,method,params}))}).then(m=>m.result);
await send('Network.enable'); if(geo) await send('Fetch.enable',{patterns:[{urlPattern:'*app.termly.io/resource-blocker/*',requestStage:'Response'}]});await send('Runtime.enable');
if(mobile){await send('Emulation.setDeviceMetricsOverride',{width:390,height:844,deviceScaleFactor:3,mobile:true});
 await send('Network.setUserAgentOverride',{userAgent:'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.0 Mobile/15E148 Safari/604.1'});}
await send('Page.navigate',{url}); await sleep(15000);
const r=await send('Runtime.evaluate',{returnByValue:true,expression:`(()=>{try{return JSON.stringify({tel:[...document.querySelectorAll('a[href^="tel:"]')].map(a=>a.getAttribute('href')+' | '+a.textContent.trim().slice(0,40)),
 nums:[...new Set((document.body.innerText.match(/[(]?[0-9]{3}[)]?[-. ]?[0-9]{3}[-. ][0-9]{4}/g)||[]))],
 dl:dataLayer.map(x=>x.event||(x[0]?'gtag:'+x[0]+':'+x[1]:'')).filter(Boolean),
 consent:JSON.stringify([...dataLayer].filter(x=>x[0]==="consent").map(x=>[...x])),wcc:(document.body.innerText.match(/.*(replace|Updated|callback|Attempting).*/gi)||[]).slice(0,12),forms:document.querySelectorAll('.dmform').length, cookies:document.cookie.split('; ').map(c=>c.split('=')[0]).join(',')})}catch(e){return JSON.stringify({err:String(e)})}})()`});
console.log(r.result.value||JSON.stringify(r).slice(0,800)); chrome.kill(); process.exit(0)})();
