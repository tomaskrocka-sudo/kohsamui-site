#!/usr/bin/env python3
"""Import kp-data/hero-photos.json: download, convert to WebP (max 2000 px), import with alt + credit, set as featured image."""
import json, os, re, subprocess, sys, hashlib
WP = '/home/claude/kohsamui-site/local/wp.sh'
DATA = os.environ.get('KP_HERO_DATA', '/home/claude/kohsamui-site/local/wp/wp-content/kp-data/hero-photos.json')
WORK = sys.argv[1] if len(sys.argv) > 1 else '/tmp/kp-hero-import'
os.makedirs(WORK, exist_ok=True)
def wp(*a): return subprocess.run([WP, *a], capture_output=True, text=True).stdout.strip()
done = {}
for it in json.load(open(DATA)):
    pid = wp('post', 'list', '--post_type=' + it.get('post_type', 'page'), '--name=' + it['slug'], '--field=ID', '--post_status=publish').splitlines()
    if not pid or not pid[0].isdigit(): print('skip (no post)', it['slug']); continue
    pid = pid[0]
    if it['src_url'] in done: aid = done[it['src_url']]
    else:
        h = hashlib.md5(it['src_url'].encode()).hexdigest()[:8]
        raw = f"{WORK}/{h}.src"; out = f"{WORK}/{re.sub(r'[^a-z0-9]+','-',it['alt'].lower()).strip('-')[:60]}-{h}.webp"
        import time; time.sleep(float(os.environ.get('KP_SLEEP', '0')))
        if subprocess.run(['curl', '-sfL', '-m', '120', '-A', 'KohSamuiGuide/1.0 (photo import; info@safariboat.info)', '-o', raw, it['src_url']]).returncode: print('download failed', it['slug']); continue
        subprocess.run(['convert', raw + '[0]', '-auto-orient', '-resize', '2400x2400>', '-strip', '-quality', '84', '-define', 'webp:method=6', out], check=True)
        cap = ('Photo: ' + it['credit'] + (', ' + it['licence'] if it.get('licence') else '')) if it.get('credit') else 'Photo: KohSamui team'
        aid = wp('media', 'import', out, '--title=' + it['alt'], '--alt=' + it['alt'], '--caption=' + cap, '--porcelain').splitlines()[-1]
        for k in ('credit', 'licence', 'source_page'):
            if it.get(k): wp('post', 'meta', 'update', aid, 'kp_' + k, it[k])
        done[it['src_url']] = aid
    wp('post', 'meta', 'update', pid, '_thumbnail_id', str(aid))
    print('ok', it['slug'], aid)
