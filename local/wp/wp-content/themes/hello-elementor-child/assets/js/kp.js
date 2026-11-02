/* Site shell JS: theme toggle (kpts), currency (kpcur), mobile panel, event filters, reading progress, live clock. */
(function () {
  var d = document, html = d.documentElement;
  /* Theme toggle: same storage key as kohphangan.com */
  var t = d.getElementById('kph-theme');
  if (t) t.addEventListener('click', function () { var dark = !html.classList.contains('kpts-dark'); html.classList.toggle('kpts-dark', dark); try { localStorage.setItem('kp-theme', dark ? 'dark' : 'light'); } catch (e) {} });
  /* "Your booking" link in the header while the cart has something in it (Woo's cookie, so it also works on cached pages). */
  var bag = d.getElementById('kph-bag');
  if (bag && /(?:^|;\s*)woocommerce_items_in_cart=1/.test(d.cookie) && !d.body.classList.contains('woocommerce-checkout')) bag.hidden = false;
  /* Currency: display-only conversion of elements carrying data-thb */
  var sel = d.getElementById('kph-cur-s');
  function applyCur(cur) {
    if (!window.KPCUR) return; window.KPCUR.cur = cur;
    d.querySelectorAll('[data-thb]').forEach(function (el) {
      var thb = parseFloat(el.dataset.thb); if (isNaN(thb)) return;
      el.textContent = cur === 'THB' || !KPCUR.r[cur] ? Math.round(thb).toLocaleString('en-GB') + ' THB' : '≈ ' + Math.round(thb * KPCUR.r[cur]).toLocaleString('en-GB') + ' ' + cur;
    });
    d.dispatchEvent(new CustomEvent('kp:currency', { detail: cur }));
  }
  if (sel) { var saved = 'THB'; try { saved = localStorage.getItem('kp-cur') || 'THB'; } catch (e) {} sel.value = saved; applyCur(saved); sel.addEventListener('change', function () { try { localStorage.setItem('kp-cur', sel.value); } catch (e) {} applyCur(sel.value); }); }
  /* Mobile panel */
  var b = d.getElementById('kph-burger'), p = d.getElementById('kph-panel'), c = d.getElementById('kph-close');
  function open(o) { if (!p) return; p.hidden = false; requestAnimationFrame(function () { p.classList.toggle('is-open', o); }); b && b.setAttribute('aria-expanded', o ? 'true' : 'false'); d.body.style.overflow = o ? 'hidden' : ''; if (!o) setTimeout(function () { p.hidden = true; }, 260); }
  b && b.addEventListener('click', function () { open(true); }); c && c.addEventListener('click', function () { open(false); });
  d.addEventListener('keydown', function (e) { if (e.key === 'Escape' && p && p.classList.contains('is-open')) open(false); });
  /* Event filter chips */
  d.querySelectorAll('.kp-ev-filters').forEach(function (bar) {
    var grid = bar.nextElementSibling;
    bar.addEventListener('click', function (e) {
      var chip = e.target.closest('.kp-ev-chip'); if (!chip) return;
      bar.querySelectorAll('.kp-ev-chip').forEach(function (x) { x.classList.toggle('is-on', x === chip); });
      var f = chip.dataset.f;
      grid.querySelectorAll('[data-tags]').forEach(function (card) { var tags = (card.dataset.tags || '').split(' '); card.classList.toggle('is-hidden', f !== 'all' && tags.indexOf(f) < 0); });
    });
  });
  /* Deep link to a filter chip: /koh-samui-tours/#yachts */
  function chipFromHash() { var h = (location.hash || '').slice(1); if (!h) return; var c = d.querySelector('.kp-ev-chip[data-f="' + h.replace(/[^a-z0-9-]/g, '') + '"]'); if (c) { c.click(); var bar = c.closest('.kp-ev-filters'); bar && bar.scrollIntoView({ block: 'start' }); } }
  chipFromHash(); window.addEventListener('hashchange', chipFromHash);
  /* Reading progress */
  var prog = d.getElementById('kpa-prog');
  if (prog) window.addEventListener('scroll', function () { var h = d.documentElement; var pct = h.scrollTop / Math.max(1, h.scrollHeight - h.clientHeight) * 100; prog.style.width = pct + '%'; }, { passive: true });
  /* Live Samui clock */
  d.querySelectorAll('.kp-time').forEach(function (el) {
    function tick() { try { el.textContent = new Date().toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit', timeZone: 'Asia/Bangkok' }) + ' ICT'; } catch (e) {} }
    tick(); setInterval(tick, 30000);
  });
})();

/* Carousels: arrows + dots for [data-rail] */
(function () {
  document.querySelectorAll('.kp-rail[data-rail]').forEach(function (rail) {
    if (rail.parentNode.classList.contains('kp-rail-wrap')) return;
    var wrap = document.createElement('div'); wrap.className = 'kp-rail-wrap'; rail.parentNode.insertBefore(wrap, rail); wrap.appendChild(rail);
    var mk = function (dir, label, path) { var b = document.createElement('button'); b.type = 'button'; b.className = 'kp-rail-btn kp-rail-' + dir; b.setAttribute('aria-label', label); b.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="' + path + '"/></svg>'; wrap.appendChild(b); return b; };
    var prev = mk('prev', 'Previous', 'M15 18l-6-6 6-6'), next = mk('next', 'Next', 'M9 18l6-6-6-6');
    var dots = document.createElement('div'); dots.className = 'kp-rail-dots'; dots.setAttribute('aria-hidden', 'true'); wrap.appendChild(dots);
    var step = function () { var c = rail.firstElementChild; return c ? c.getBoundingClientRect().width + parseFloat(getComputedStyle(rail).columnGap || 16) : rail.clientWidth; };
    prev.addEventListener('click', function () { rail.scrollBy({ left: -step() * Math.max(1, Math.floor(rail.clientWidth / step())), behavior: 'smooth' }); });
    next.addEventListener('click', function () { rail.scrollBy({ left: step() * Math.max(1, Math.floor(rail.clientWidth / step())), behavior: 'smooth' }); });
    var pages = 0;
    var update = function () {
      var max = rail.scrollWidth - rail.clientWidth; wrap.classList.toggle('is-scrollable', max > 4);
      prev.disabled = rail.scrollLeft <= 4; next.disabled = rail.scrollLeft >= max - 4;
      var n = max > 4 ? Math.ceil(rail.scrollWidth / rail.clientWidth) : 0;
      if (n !== pages) { pages = n; dots.innerHTML = n > 1 ? new Array(n + 1).join('<i></i>') : ''; }
      var i = max > 0 ? Math.round(rail.scrollLeft / max * (n - 1)) : 0; Array.prototype.forEach.call(dots.children, function (d, k) { d.classList.toggle('is-on', k === i); });
    };
    rail.addEventListener('scroll', function () { window.requestAnimationFrame(update); }, { passive: true }); window.addEventListener('resize', update); update();
  });
})();

/* Photo lightbox for hero strips and galleries ([data-kpv-lb] links to full-size local images) */
(function () {
  var links = Array.prototype.slice.call(document.querySelectorAll('a[data-kpv-lb]')); if (!links.length) return;
  var urls = []; links.forEach(function (a) { if (urls.indexOf(a.href) < 0) urls.push(a.href); });
  var alts = urls.map(function (u) { var a = links.filter(function (l) { return l.href === u; })[0]; var im = a && a.querySelector('img'); return im ? im.alt : ''; });
  var box, img, cap, i = 0;
  function build() {
    box = document.createElement('div'); box.className = 'kp-lb'; box.setAttribute('role', 'dialog'); box.setAttribute('aria-modal', 'true'); box.setAttribute('aria-label', 'Photos');
    box.innerHTML = '<button type="button" class="kp-lb-x" aria-label="Close">×</button><button type="button" class="kp-lb-p" aria-label="Previous photo">‹</button><figure><img alt=""><figcaption></figcaption></figure><button type="button" class="kp-lb-n" aria-label="Next photo">›</button>';
    document.body.appendChild(box); img = box.querySelector('img'); cap = box.querySelector('figcaption');
    box.querySelector('.kp-lb-x').onclick = close; box.querySelector('.kp-lb-p').onclick = function () { show(i - 1); }; box.querySelector('.kp-lb-n').onclick = function () { show(i + 1); };
    box.addEventListener('click', function (e) { if (e.target === box) close(); });
    var x0 = null; box.addEventListener('touchstart', function (e) { x0 = e.touches[0].clientX; }, { passive: true }); box.addEventListener('touchend', function (e) { if (x0 === null) return; var dx = e.changedTouches[0].clientX - x0; if (Math.abs(dx) > 40) show(i + (dx < 0 ? 1 : -1)); x0 = null; });
    document.addEventListener('keydown', function (e) { if (!box.classList.contains('is-open')) return; if (e.key === 'Escape') close(); if (e.key === 'ArrowRight') show(i + 1); if (e.key === 'ArrowLeft') show(i - 1); });
  }
  function show(k) { i = (k + urls.length) % urls.length; img.src = urls[i]; img.alt = alts[i]; cap.textContent = (i + 1) + ' / ' + urls.length + (alts[i] ? ' · ' + alts[i] : ''); [i + 1, i - 1].forEach(function (n) { var p = new Image(); p.src = urls[(n + urls.length) % urls.length]; }); }
  function open(u) { if (!box) build(); box.classList.add('is-open'); document.documentElement.style.overflow = 'hidden'; show(Math.max(0, urls.indexOf(u))); box.querySelector('.kp-lb-x').focus(); }
  function close() { box.classList.remove('is-open'); document.documentElement.style.overflow = ''; }
  links.forEach(function (a) { a.addEventListener('click', function (e) { e.preventDefault(); open(a.href); }); });
})();

/* Tables: give text-heavy columns more width so rows stay short (numbers stay compact) */
(function () {
  document.querySelectorAll('.kp-tbl table').forEach(function (t) {
    var rows = t.rows; if (!rows.length || rows[0].cells.length < 4) return;
    var n = rows[0].cells.length, len = new Array(n).fill(0), cnt = new Array(n).fill(0);
    for (var r = 0; r < rows.length; r++) for (var c = 0; c < rows[r].cells.length && c < n; c++) { len[c] += rows[r].cells[c].textContent.trim().length; cnt[c]++; }
    for (var c2 = 0; c2 < n; c2++) { var avg = len[c2] / Math.max(1, cnt[c2]); var w = avg > 70 ? '22em' : avg > 40 ? '16em' : avg > 22 ? '11em' : ''; if (!w) continue; for (var r2 = 0; r2 < rows.length; r2++) if (rows[r2].cells[c2]) rows[r2].cells[c2].style.minWidth = w; }
  });
})();

/* Live labels on cached pages: relabel Today / Tonight / Tomorrow in Samui time, drop events that are over, let spare offers fill in. */
(function () {
  var TZ = 'Asia/Bangkok', now = Date.now() / 1000;
  function ymd(t) { return new Intl.DateTimeFormat('en-CA', { timeZone: TZ, year: 'numeric', month: '2-digit', day: '2-digit' }).format(new Date(t * 1000)); }
  function hm(t) { return new Intl.DateTimeFormat('en-GB', { timeZone: TZ, hour: '2-digit', minute: '2-digit', hour12: false }).format(new Date(t * 1000)); }
  function hour(t) { return +hm(t).slice(0, 2); }
  function dmy(t, wd) { var p = new Intl.DateTimeFormat('en-GB', { timeZone: TZ, weekday: 'short', day: 'numeric', month: 'short' }).formatToParts(new Date(t * 1000)), o = {}; p.forEach(function (x) { o[x.type] = x.value; }); return (wd ? o.weekday + ' ' : '') + o.day + ' ' + o.month; }
  var today = ymd(now), tom = ymd(now + 86400);
  document.querySelectorAll('[data-kp-today]').forEach(function (el) { el.textContent = dmy(now, true); });
  document.querySelectorAll('[data-kp-start]').forEach(function (el) {
    var s = +el.getAttribute('data-kp-start'), e = +el.getAttribute('data-kp-end') || s;
    if (now > e) { el.classList.add('is-gone'); el.setAttribute('hidden', ''); return; }
    var w = el.querySelector('[data-kp-when]'); if (!w) return;
    var mode = w.getAttribute('data-kp-when'), d = ymd(s), t = hm(s), live = s <= now && now <= e;
    if (mode === 'ticker') w.textContent = live ? 'Live now' : (d === today ? (hour(s) >= 18 ? 'Tonight ' : 'Today ') + t : (d === tom ? 'Tomorrow ' : dmy(s, true).split(' ')[0] + ' ') + t);
    else w.textContent = d === today ? (hour(s) >= 18 ? 'Tonight' : 'Today') : (d === tom ? 'Tomorrow' : dmy(s, true)) + (mode === 'time' && (d === today || d === tom) ? ' ' + t : '');
  });
  document.querySelectorAll('[data-kp-offers]').forEach(function (box) {
    var max = +box.getAttribute('data-max') || 4, shown = 0;
    Array.prototype.forEach.call(box.children, function (c) { if (c.classList.contains('is-gone')) return; c.classList.toggle('is-spare', shown >= max); shown++; });
  });
})();

/* Cookie choice bar: necessary always on; analytics (order attribution, GA if added) only after "Accept". Choice kept 12 months in cookie kp_consent. */
(function () {
  var bar = document.getElementById('kpc'); if (!bar) return;
  var set = document.getElementById('kpc-set'), box = document.getElementById('kpc-a');
  function read() { var m = document.cookie.match(/(?:^|; )kp_consent=([^;]*)/); return m ? m[1] : ''; }
  function loadAttr() {
    var el = document.getElementById('kp-deferred-attr'); if (!el || el.dataset.done) return; el.dataset.done = 1;
    try { var cfg = JSON.parse(el.textContent); var s0 = document.createElement('script'); s0.text = cfg.data || ''; document.body.appendChild(s0);
      (function next(i) { if (i >= cfg.srcs.length) return; var s = document.createElement('script'); s.src = cfg.srcs[i]; s.onload = function () { next(i + 1); }; document.body.appendChild(s); })(0);
    } catch (e) {}
  }
  function apply(a, save) {
    if (save) { document.cookie = 'kp_consent=v1' + (a ? 'a1' : 'a0') + ';path=/;max-age=' + (365 * 864e2) + ';SameSite=Lax' + (location.protocol === 'https:' ? ';Secure' : ''); }
    window.kpConsent = { set: true, analytics: !!a };
    if (window.gtag) gtag('consent', 'update', { analytics_storage: a ? 'granted' : 'denied' });
    try { document.dispatchEvent(new CustomEvent('wp_listen_for_consent_change', { detail: { statistics: a ? 'allow' : 'deny', marketing: a ? 'allow' : 'deny' } })); document.dispatchEvent(new CustomEvent('kp:consent', { detail: { analytics: !!a } })); } catch (e) {}
    if (a) loadAttr();
  }
  function open(withSettings) { bar.hidden = false; document.documentElement.classList.add('kpc-on'); if (withSettings) showSet(); }
  function close() { bar.hidden = true; document.documentElement.classList.remove('kpc-on'); }
  function showSet() { set.hidden = false; box.checked = !!(window.kpConsent && window.kpConsent.analytics); bar.querySelector('[data-kpc="settings"]').hidden = true; bar.querySelector('[data-kpc="save"]').hidden = false; }
  bar.addEventListener('click', function (e) {
    var b = e.target.closest('[data-kpc]'); if (!b) return; var k = b.getAttribute('data-kpc');
    if (k === 'settings') { showSet(); return; }
    apply(k === 'accept' ? 1 : k === 'reject' ? 0 : (box.checked ? 1 : 0), true); close();
  });
  document.addEventListener('click', function (e) { var t = e.target.closest('[data-kpc-open]'); if (t) { e.preventDefault(); open(true); } });
  var c = read();
  if (c) { if (c.indexOf('a1') > -1) apply(1, false); } else { open(false); }
})();

/* Galleries: swipe/arrow/keyboard stage, thumbnail strip, counter; hero thumbnails open the gallery at that photo. */
(function () {
  var gal = document.querySelector('.kpv-gal'); if (!gal) return;
  var track = gal.querySelector('.kpv-gal-track'), figs = track.querySelectorAll('figure'), strip = gal.querySelectorAll('.kpv-gal-strip button'), num = gal.querySelector('[data-kpg-i]'), hero = document.querySelectorAll('.kpv-thumbs [data-kpg]');
  var cur = 0;
  function mark(i) {
    cur = i; if (num) num.textContent = i + 1;
    strip.forEach(function (b, k) { b.classList.toggle('on', k === i); if (k === i && b.scrollIntoView && b.parentNode.scrollWidth > b.parentNode.clientWidth) { var p = b.parentNode; p.scrollTo({ left: b.offsetLeft - p.clientWidth / 2 + b.clientWidth / 2, behavior: 'smooth' }); } });
    hero.forEach(function (b) { b.classList.toggle('on', +b.getAttribute('data-kpg') === i); });
  }
  function go(i, smooth) { i = (i + figs.length) % figs.length; track.scrollTo({ left: i * track.clientWidth, behavior: smooth === false ? 'auto' : 'smooth' }); mark(i); }
  var t; track.addEventListener('scroll', function () { clearTimeout(t); t = setTimeout(function () { var i = Math.round(track.scrollLeft / track.clientWidth); if (i !== cur) mark(i); }, 60); }, { passive: true });
  gal.addEventListener('click', function (e) { var b = e.target.closest('[data-kpg-d],[data-kpg]'); if (!b) return; if (b.hasAttribute('data-kpg-d')) go(cur + +b.getAttribute('data-kpg-d')); else go(+b.getAttribute('data-kpg')); });
  track.addEventListener('keydown', function (e) { if (e.key === 'ArrowRight') { e.preventDefault(); go(cur + 1); } else if (e.key === 'ArrowLeft') { e.preventDefault(); go(cur - 1); } });
  document.addEventListener('click', function (e) {
    var b = e.target.closest('.kpv-thumbs [data-kpg]'); if (!b) return; e.preventDefault();
    var i = +b.getAttribute('data-kpg'); gal.scrollIntoView({ behavior: 'smooth', block: 'start' }); setTimeout(function () { go(i, false); }, 350);
  });
  window.addEventListener('resize', function () { go(cur, false); });
})();

/* Checkout progress: step 2 (details) → step 3 (payment) once the guest reaches the payment card. */
(function () {
  var prog = document.querySelector('.kpc-prog'), pay = document.querySelector('.kpc-pay');
  if (!prog || !pay) return;
  var li = function (n) { return prog.querySelector('li[data-step="' + n + '"]'); };
  function set(step) {
    [1, 2, 3, 4].forEach(function (n) {
      var el = li(n); if (!el) return; var dot = el.querySelector('.kpc-dot');
      el.classList.toggle('done', n < step); el.classList.toggle('on', n === step);
      if (n === step) el.setAttribute('aria-current', 'step'); else el.removeAttribute('aria-current');
      if (dot) dot.textContent = n < step ? '✓' : n;
    });
  }
  pay.addEventListener('focusin', function () { set(3); });
  pay.addEventListener('pointerdown', function () { set(3); });
  if ('IntersectionObserver' in window) new IntersectionObserver(function (es) { es.forEach(function (e) { if (e.isIntersecting && e.intersectionRatio > 0.6) set(3); }); }, { threshold: [0.6] }).observe(pay);
})();
