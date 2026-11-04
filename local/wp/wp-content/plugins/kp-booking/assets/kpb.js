/* KP Tour Booking — booking card: custom calendar (closed dates, cut-off, weekdays), live total, currency display, server-side quote. */
(function () {
  if (!window.KPB) return;
  var cfg = KPB.cfg, root = document.getElementById('kpb'); if (!root) return;
  var dateIn = root.querySelector('#kpb_date'), cal = root.querySelector('#kpb_cal'), totalEl = root.querySelector('#kpb_total'), errEl = root.querySelector('#kpb_errors'), form = root.querySelector('.kpb-form');
  var closed = {}; (cfg.closed || []).forEach(function (d) { closed[d] = 1; });
  var weekdays = cfg.weekdays || [];
  var DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  function pad(n) { return (n < 10 ? '0' : '') + n; }
  function ymd(d) { return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()); }
  var open = cfg.open_dates || [];
  function isOpen(s, d) { if (s < cfg.first_date) return false; if (open.length && open.indexOf(s) < 0) return false; if (closed[s]) return false; if (weekdays.length && weekdays.indexOf(DAYS[d.getDay()]) < 0) return false; var os = root.querySelector('#kpb_option'), oc = (cfg.opt_closed || [])[os ? +os.value || 0 : 0]; if (oc && s.slice(5) >= oc[0] && s.slice(5) <= oc[1]) return false; return true; }

  /* Calendar: two months, keyboard accessible */
  var firstOpen = open.filter(function (x) { return x >= cfg.first_date; })[0] || cfg.first_date;
  // Seasonal closures (e.g. Ang Thong 1 Nov–15 Dec) and weekday rules: start the calendar on the first month with a bookable day.
  (function () { var d = new Date(firstOpen + 'T00:00:00'); for (var i = 0; i < 400; i++) { var s = ymd(d); if (isOpen(s, d)) { firstOpen = s; return; } d.setDate(d.getDate() + 1); } })();
  var view = new Date(firstOpen + 'T00:00:00'); view.setDate(1);
  function render() {
    var html = '';
    for (var m = 0; m < 1; m++) {
      var first = new Date(view.getFullYear(), view.getMonth() + m, 1);
      var label = first.toLocaleDateString('en-GB', { month: 'long', year: 'numeric' });
      html += '<div class="kpb-month"><div class="kpb-mhead">' + (m === 0 ? '<button type="button" class="kpb-nav" data-nav="-1" aria-label="Previous month"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg></button>' : '<span></span>') + '<strong>' + label + '</strong>' + '<button type="button" class="kpb-nav" data-nav="1" aria-label="Next month"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg></button>' + '</div><div class="kpb-grid" role="grid">';
      ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'].forEach(function (d) { html += '<span class="kpb-dow">' + d + '</span>'; });
      var offset = (first.getDay() + 6) % 7; for (var i = 0; i < offset; i++) html += '<span></span>';
      var days = new Date(first.getFullYear(), first.getMonth() + 1, 0).getDate();
      for (var d = 1; d <= days; d++) {
        var dt = new Date(first.getFullYear(), first.getMonth(), d), s = ymd(dt), open = isOpen(s, dt), sel = dateIn.value === s;
        html += '<button type="button" class="kpb-day' + (open ? '' : ' is-off') + (sel ? ' is-sel' : '') + (s === KPB.today ? ' is-today' : '') + '" data-d="' + s + '"' + (open ? '' : ' disabled aria-disabled="true"') + ' aria-label="' + dt.toDateString() + (open ? '' : ' (not available)') + '">' + d + '</button>';
      }
      html += '</div></div>';
    }
    cal.innerHTML = html;
  }
  cal.addEventListener('click', function (e) {
    var b = e.target.closest('button'); if (!b) return;
    if (b.dataset.nav) { view.setMonth(view.getMonth() + parseInt(b.dataset.nav, 10)); render(); return; }
    if (b.dataset.d && !b.disabled) { dateIn.value = b.dataset.d; touched = true; render(); label(); closeCal(true); quote(); }
  });
  /* One calendar, opened from the date field */
  var dateBtn = root.querySelector('#kpb_datebtn'), touched = false;
  function label() { if (!dateBtn) return; var v = dateBtn.querySelector('.kpb-datev'); if (dateIn.value) { v.textContent = new Date(dateIn.value + 'T00:00:00').toLocaleDateString('en-GB', { weekday: 'short', day: 'numeric', month: 'long', year: 'numeric' }); dateBtn.classList.add('has-v'); } else { v.textContent = 'Choose a date'; dateBtn.classList.remove('has-v'); } }
  function openCal() { if (dateIn.value) { view = new Date(dateIn.value + 'T00:00:00'); view.setDate(1); } render(); cal.hidden = false; dateBtn.setAttribute('aria-expanded', 'true'); var f = cal.querySelector('.is-sel') || cal.querySelector('.kpb-day:not([disabled])'); if (f) f.focus({ preventScroll: true }); }
  function closeCal(focusBtn) { if (cal.hidden) return; cal.hidden = true; dateBtn.setAttribute('aria-expanded', 'false'); if (focusBtn) dateBtn.focus({ preventScroll: true }); }
  if (dateBtn) {
    dateBtn.addEventListener('click', function () { cal.hidden ? openCal() : closeCal(); });
    document.addEventListener('click', function (e) { if (!cal.hidden && !cal.contains(e.target) && !dateBtn.contains(e.target)) closeCal(); });
    cal.addEventListener('keydown', function (e) { if (e.key === 'Escape') { e.preventDefault(); closeCal(true); } });
  }

  /* Currency display (kpcur) */
  function fmt(thb) {
    var out = Math.round(thb).toLocaleString('en-GB') + ' THB';
    var cur = (window.KPCUR && window.KPCUR.cur) || localStorage.getItem('kp-cur');
    if (window.KPCUR && cur && cur !== 'THB' && KPCUR.r && KPCUR.r[cur]) out += ' <small>(≈ ' + Math.round(thb * KPCUR.r[cur]).toLocaleString('en-GB') + ' ' + cur + ')</small>';
    return out;
  }

  /* Live total: instant local estimate, then authoritative server quote */
  function sel() {
    var g = function (n) { var el = form.querySelector('[name="' + n + '"]'); return el ? el.value : ''; };
    var r = { date: g('kpb_date'), adults: parseInt(g('kpb_adults') || 0, 10), children: parseInt(g('kpb_children') || 0, 10), infants: parseInt(g('kpb_infants') || 0, 10), pickup: g('kpb_pickup'), option: parseInt(g('kpb_option') || 0, 10) };
    var gs = form.querySelector('#kpb_guests');
    if (gs) { var n = parseInt(gs.value || 1, 10), ex = exFor(r.option); if (!ex || n <= ex.incl) { r.children = 0; r.infants = 0; } r.children = Math.min(r.children, n); r.infants = Math.min(r.infants, n - r.children); r.adults = n - r.children - r.infants; var a = form.querySelector('#kpb_adults'); if (a) a.value = r.adults; }
    return r;
  }
  function local(s) {
    var t = 0, lines = [], adult = (cfg.date_prices && cfg.date_prices[s.date]) || cfg.adult, child = cfg.child, o = cfg.options && cfg.options[s.option];
    if (o) { adult = o.price; if (o.child !== null) child = o.child; }
    if (cfg.per === 'boat') { t = adult; lines.push([o ? o.label : 'Private boat', 1, adult]);
      var ex = exFor(s.option), n = s.adults + s.children + s.infants;
      if (ex && n > ex.incl) { var extra = n - ex.incl, fr = ex.free_band ? Math.min(s.infants, extra) : 0, rest = extra - fr, ch = ex.child !== null ? Math.min(s.children, rest) : 0, ad = rest - ch;
        if (ad) { t += ad * ex.adult; lines.push(['Extra guests (' + (ex.incl + 1) + '–' + n + ')', ad, ex.adult]); }
        if (ch) { t += ch * ex.child; lines.push(['Extra children' + (ex.child_band ? ' ' + ex.child_band : ''), ch, ex.child]); }
        if (fr) lines.push(['Extra children ' + ex.free_band, fr, 0]); } }
    else { t += s.adults * adult; lines.push([cfg.adult_label, s.adults, adult]); if (s.children && child !== null) { t += s.children * child; lines.push([cfg.child_label, s.children, child]); } if (s.infants) lines.push([cfg.infant_label, s.infants, 0]); }
    var fee = cfg.pickup && cfg.pickup.surcharge && cfg.pickup.surcharge[s.pickup];
    if (fee) { var n = cfg.per === 'boat' ? 1 : (s.adults + s.children); t += n * fee; lines.push(['Remote-area transfer: ' + s.pickup, n, fee]); }
    return { total: t, lines: lines };
  }
  function show(q) {
    totalEl.innerHTML = q.lines.map(function (l) { return '<div class="kpb-line"><span>' + l[0] + (l[1] > 1 || l[2] ? ' × ' + l[1] : '') + '</span><span>' + (l[2] ? Math.round(l[1] * l[2]).toLocaleString('en-GB') + ' THB' : 'free') + '</span></div>'; }).join('') + '<div class="kpb-sum"><span>Total</span><strong>' + fmt(q.total) + '</strong></div>';
  }
  var timer;
  function quote() {
    var s = sel(); show(local(s)); errEl.textContent = '';
    clearTimeout(timer);
    timer = setTimeout(function () {
      fetch((KPB.rest || '/wp-json/') + 'kp/v1/quote', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(Object.assign({ product: cfg.product_id }, s)) })
        .then(function (r) { return r.json(); }).then(function (j) {
          var errs = (j.errors || []).filter(function (e) { return !/^Please choose/i.test(e); }); // missing-field prompts wait for the Book button
          if (touched && errs.length) { errEl.innerHTML = errs.map(function (e) { return '<p>' + e + '</p>'; }).join(''); }
          if (typeof j.total_thb === 'number') show({ total: j.total_thb, lines: j.lines.map(function (l) { return [l.label, l.qty, l.unit]; }) });
        }).catch(function () {});
    }, 250);
  }
  /* Private boats: group size up to the boat's capacity; extra guests above the included number pay the boat's fee */
  function exFor(i) { var e = cfg.extra || []; return (cfg.options && cfg.options.length ? e[i || 0] : e[0]) || null; }
  function fill(sel, from, to, keep) { if (!sel || sel.tagName !== 'SELECT') return; var v = Math.min(parseInt(keep != null ? keep : sel.value || from, 10), to); var h = ''; for (var i = from; i <= to; i++) h += '<option value="' + i + '"' + (i === v ? ' selected' : '') + '>' + i + '</option>'; sel.innerHTML = h; }
  function boatUi() {
    var gs = form.querySelector('#kpb_guests'); if (!gs) return;
    var oi = parseInt((form.querySelector('#kpb_option') || {}).value || 0, 10), o = cfg.options && cfg.options[oi], ex = exFor(oi);
    var cap = ex ? ex.cap : (o && o.max_guests) || cfg.max_guests || parseInt(gs.dataset.capmax, 10) || 12;
    fill(gs, 1, cap); var n = parseInt(gs.value, 10), lab = root.querySelector('#kpb_glab');
    if (lab) lab.textContent = ex ? 'price for ' + ex.incl + ', up to ' + ex.cap + ' (+' + Math.round(ex.adult).toLocaleString('en-GB') + ' THB per extra guest)' : 'up to ' + cap;
    var showX = ex && n > ex.incl, chw = root.querySelector('.kpb-exch'), frw = root.querySelector('.kpb-exfree');
    if (chw) { chw.hidden = !(showX && ex.child !== null); fill(chw.querySelector('select'), 0, n); root.querySelector('#kpb_chlab').textContent = ex && ex.child !== null ? ' ' + (ex.child_band ? ex.child_band + ' ' : '') + '(+' + Math.round(ex.child).toLocaleString('en-GB') + ' THB if extra)' : ''; }
    if (frw) { frw.hidden = !(showX && ex.free_band); fill(frw.querySelector('select'), 0, n); root.querySelector('#kpb_frlab').textContent = ex && ex.free_band ? ' ' + ex.free_band + ' (free)' : ''; }
  }
  form.querySelectorAll('select').forEach(function (el) { el.addEventListener('change', function () { touched = true; if (el.id === 'kpb_option' || el.id === 'kpb_guests') boatUi(); if (el.id === 'kpb_option') render(); quote(); }); });
  boatUi();
  document.addEventListener('kp:currency', quote);
  form.addEventListener('submit', function (e) {
    var s = sel(); if (!s.date) { e.preventDefault(); errEl.innerHTML = '<p>Please choose a ' + ((document.getElementById('kpb_date_l') || {}).textContent || 'departure date').toLowerCase() + '.</p>'; if (dateBtn) { dateBtn.scrollIntoView({ behavior: 'smooth', block: 'center' }); openCal(); } return; }
    if (cfg.pickup && cfg.pickup.enabled && !s.pickup) { e.preventDefault(); errEl.innerHTML = '<p>Please choose your pickup area.</p>'; return; }
    var btn = root.querySelector('#kpb_submit'); btn.disabled = true; btn.textContent = KPB.i18n.adding;
  });
  render(); label(); quote();
})();
