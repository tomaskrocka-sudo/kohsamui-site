#!/usr/bin/env python3
"""Export a static preview of the local site (rendered HTML + our CSS/JS/fonts) for a private claude.ai artifact."""
import re, os, shutil, urllib.request, html as H
BASE='http://localhost:8080'; OUT='/home/claude/kohsamui-site/preview'
THEME='/home/claude/kohsamui-site/local/wp/wp-content/themes/hello-elementor-child/assets'
PLUG='/home/claude/kohsamui-site/local/wp/wp-content/plugins/kp-booking/assets'
PAGES={ '/':'index.html',
  '/product/ang-thong-marine-park-day-tour-koh-samui/':'ang-thong-speedboat.html',
  '/product/pig-island-speedboat-tour/':'pig-island-speedboat.html',
  '/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/':'koh-tao-day-trip.html',
  '/product/full-moon-party-speedboat-koh-samui/':'full-moon-party-boat.html',
  '/chaweng-koh-samui/':'chaweng.html',
  '/koh-samui-events/event/full-moon-party-2026-11-24/':'event-full-moon-24-nov.html' }
for d in ('assets/css','assets/js','assets/fonts'): os.makedirs(f'{OUT}/{d}',exist_ok=True)
for f in ('tokens.css','kp.css'): shutil.copy(f'{THEME}/css/{f}',f'{OUT}/assets/css/{f}')
shutil.copy(f'{PLUG}/kpb.css',f'{OUT}/assets/css/kpb.css'); shutil.copy(f'{THEME}/js/kp.js',f'{OUT}/assets/js/kp.js'); shutil.copy(f'{PLUG}/kpb.js',f'{OUT}/assets/js/kpb.js')
for f in os.listdir(f'{THEME}/fonts'): shutil.copy(f'{THEME}/fonts/{f}',f'{OUT}/assets/fonts/{f}')
BANNER='<div style="position:fixed;left:0;right:0;bottom:0;z-index:3000;background:#C1DF0F;color:#14202E;font:600 13px Inter,system-ui,sans-serif;text-align:center;padding:8px max(16px,env(safe-area-inset-left,0px)) calc(8px + env(safe-area-inset-bottom,0px))">Local build preview: static copy. Booking, payments and live data work on the local WordPress, not in this preview.</div>'
STATIC_JS='<script>document.addEventListener("submit",function(e){e.preventDefault();var b=e.target.querySelector("button[type=submit]");if(b){b.textContent="Booking works on the live site";b.disabled=true;}},true);</script>'
def link(m):
    url=m.group(2); path=re.sub(r'^'+re.escape(BASE),'',url).split('?')[0]
    pathnoh=path.split('#')[0]
    if pathnoh in PAGES: return m.group(1)+PAGES[pathnoh]+('#'+path.split('#')[1] if '#' in path else '')+m.group(3)
    if url.startswith(BASE): return m.group(1)+'#'+m.group(3)
    return m.group(0)
for path,fn in PAGES.items():
    h=urllib.request.urlopen(BASE+path).read().decode()
    # drop all stylesheet links + scripts with src, keep our own via fresh tags
    h=re.sub(r'<link[^>]+rel=[\'"](stylesheet|preload|preconnect|dns-prefetch|https://api.w.org/|alternate|EditURI|shortlink|profile|icon|apple-touch-icon|modulepreload|prefetch)[\'"][^>]*>','',h)
    h=re.sub(r'<link[^>]*>','',h)
    h=re.sub(r'<script[^>]+src=[^>]*></script>','',h)
    h=re.sub(r'<script type="speculationrules">.*?</script>','',h,flags=re.S)
    h=re.sub(r'<script[^>]*id="wp-[^"]*"[^>]*>.*?</script>','',h,flags=re.S)
    h=re.sub(r'<style[^>]*id="(wp|global|classic|woocommerce|core)[^"]*"[^>]*>.*?</style>','',h,flags=re.S)
    h=re.sub(r'(href=")([^"]+)(")',link,h)
    h=re.sub(r'(action=")([^"]+)(")',lambda m:m.group(1)+'#'+m.group(3),h)
    assets='<link rel="stylesheet" href="assets/css/tokens.css"><link rel="stylesheet" href="assets/css/kp.css">'+('<link rel="stylesheet" href="assets/css/kpb.css">' if 'id="kpb"' in h else '')
    scripts='<script defer src="assets/js/kp.js"></script>'+('<script defer src="assets/js/kpb.js"></script>' if 'id="kpb"' in h else '')+STATIC_JS
    title=re.search(r'<title>(.*?)</title>',h,re.S).group(1)
    if fn=='index.html':
        body=re.search(r'<body[^>]*>(.*)</body>',h,re.S).group(1)
        head_inline=''.join(re.findall(r'(<script id="kpts-init">.*?</script>|<script id="kpcur-cfg">.*?</script>)',h,re.S))
        cls=re.search(r'<body([^>]*)>',h).group(1)
        out=f'<title>Koh Samui Site Preview</title>\n{assets}\n<style>body{{background:var(--kp-bg)}}</style>\n{head_inline}\n<div {cls.strip()}>'+body+'</div>'+BANNER+scripts
    else:
        h=h.replace('</head>',assets+'</head>').replace('</body>',BANNER+scripts+'</body>')
        out=h
    open(f'{OUT}/{fn}','w').write(out)
    print(fn, len(out)//1024,'KB', '|', H.unescape(title)[:70])
