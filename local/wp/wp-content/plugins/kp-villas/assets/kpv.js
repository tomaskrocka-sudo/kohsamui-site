/* KP Villas: grid filters + live quote and booking request on villa pages. */
(function () {
  var d = document;
  /* Grid filters */
  d.querySelectorAll('[data-kpv-filters]').forEach(function (bar) {
    var grid = bar.nextElementSibling, cnt = bar.querySelector('[data-kpv-count]');
    function apply() {
      var v = {}; bar.querySelectorAll('[data-f]').forEach(function (el) { v[el.dataset.f] = el.type === 'checkbox' ? el.checked : el.value; });
      var n = 0;
      grid.querySelectorAll('.kpv-card').forEach(function (c) {
        var ok = (!v.area || c.dataset.area === v.area) && (!v.beds || +c.dataset.beds >= +v.beds) && (!v.max || (+c.dataset.price && +c.dataset.price <= +v.max)) && (!v.sea || c.dataset.sea === '1') && (!v.avail || c.dataset.avail === '1');
        c.hidden = !ok; if (ok) n++;
      });
      if (cnt) cnt.textContent = n + ' villas';
    }
    bar.addEventListener('change', apply); apply();
  });
  /* Villa page: quote + request */
  var box = d.getElementById('kpv-book'); if (!box || !window.KPV) return;
  var f = box.querySelector('form'), out = box.querySelector('.kpv-quote'), msg = box.querySelector('.kpv-msg');
  function val(n) { var e = f.querySelector('[name="' + n + '"]'); return e ? e.value : ''; }
  function fmt(n) { return Math.round(n).toLocaleString('en-GB') + ' THB'; }
  var t;
  function quote() {
    clearTimeout(t); var from = val('from'), to = val('to'); if (!from || !to) return;
    out.textContent = 'Checking…';
    t = setTimeout(function () {
      fetch(KPV.rest + 'villa-quote?villa=' + KPV.villa + '&from=' + from + '&to=' + to + '&guests=' + (val('guests') || 2)).then(function (r) { return r.json(); }).then(function (j) {
        if (j.code) { out.textContent = j.message; return; }
        out.innerHTML = (j.total_thb ? '<strong>' + fmt(j.total_thb) + '</strong> for ' + j.nights + ' nights' + (j.per_night_thb ? ' (' + fmt(j.per_night_thb) + ' / night)' : '') + '<br>' : '') + '<small>' + j.message + '</small>';
        out.className = 'kpv-quote ' + (j.ok === true ? 'is-ok' : j.ok === false ? 'is-no' : 'is-est');
      }).catch(function () { out.textContent = 'Could not check right now. Send the request and we confirm.'; });
    }, 300);
  }
  f.addEventListener('change', quote);
  /* One date-range calendar, opened from the Dates field */
  var btn = f.querySelector('[data-kpv-dates]'), cal = f.querySelector('[data-kpv-cal]');
  if (btn && cal) {
    var inF = f.querySelector('[name="from"]'), inT = f.querySelector('[name="to"]'), min = btn.dataset.min;
    var p2 = function (n) { return (n < 10 ? '0' : '') + n; }, ymd = function (x) { return x.getFullYear() + '-' + p2(x.getMonth() + 1) + '-' + p2(x.getDate()); };
    var nice = function (s) { return new Date(s + 'T00:00:00').toLocaleDateString('en-GB', { day: 'numeric', month: 'short' }); };
    var view = new Date(min + 'T00:00:00'); view.setDate(1);
    var draw = function () {
      var first = new Date(view.getFullYear(), view.getMonth(), 1), h = '<div class="kpb-month"><div class="kpb-mhead"><button type="button" class="kpb-nav" data-nav="-1" aria-label="Previous month">‹</button><strong>' + first.toLocaleDateString('en-GB', { month: 'long', year: 'numeric' }) + '</strong><button type="button" class="kpb-nav" data-nav="1" aria-label="Next month">›</button></div><div class="kpb-grid">';
      ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'].forEach(function (x) { h += '<span class="kpb-dow">' + x + '</span>'; });
      for (var i = 0, o = (first.getDay() + 6) % 7; i < o; i++) h += '<span></span>';
      for (var dd = 1, n = new Date(first.getFullYear(), first.getMonth() + 1, 0).getDate(); dd <= n; dd++) {
        var s = ymd(new Date(first.getFullYear(), first.getMonth(), dd)), off = s < min || (inF.value && !inT.value && s <= inF.value);
        var cls = (s === inF.value || s === inT.value) ? ' is-sel' : (inF.value && inT.value && s > inF.value && s < inT.value ? ' is-in' : '');
        h += '<button type="button" class="kpb-day' + (off ? ' is-off' : '') + cls + '" data-d="' + s + '"' + (off ? ' disabled' : '') + '>' + dd + '</button>';
      }
      cal.innerHTML = h + '</div><p class="kpb-calhint">' + (inF.value && !inT.value ? 'Now choose your check-out day.' : 'Choose your check-in day.') + '</p></div>';
    };
    var label = function () { var v = btn.querySelector('.kpb-datev'); if (inF.value && inT.value) { v.textContent = nice(inF.value) + ' → ' + nice(inT.value) + ' · ' + Math.round((new Date(inT.value) - new Date(inF.value)) / 864e5) + ' nights'; btn.classList.add('has-v'); } else if (inF.value) { v.textContent = nice(inF.value) + ' → check-out?'; btn.classList.add('has-v'); } else { v.textContent = 'Check-in → check-out'; btn.classList.remove('has-v'); } };
    var openC = function () { draw(); cal.hidden = false; btn.setAttribute('aria-expanded', 'true'); };
    var closeC = function () { cal.hidden = true; btn.setAttribute('aria-expanded', 'false'); };
    btn.addEventListener('click', function () { cal.hidden ? openC() : closeC(); });
    cal.addEventListener('click', function (e) {
      var b = e.target.closest('button'); if (!b) return; e.stopPropagation();
      if (b.dataset.nav) { view.setMonth(view.getMonth() + +b.dataset.nav); draw(); return; }
      if (b.disabled) return; var s = b.dataset.d;
      if (!inF.value || inT.value) { inF.value = s; inT.value = ''; draw(); label(); return; }
      inT.value = s; label(); closeC(); btn.focus({ preventScroll: true }); quote();
    });
    cal.addEventListener('keydown', function (e) { if (e.key === 'Escape') { closeC(); btn.focus(); } });
    d.addEventListener('click', function (e) { if (!cal.hidden && !cal.contains(e.target) && !btn.contains(e.target)) closeC(); });
    f.addEventListener('reset', function () { setTimeout(function () { inF.value = ''; inT.value = ''; label(); }, 0); });
  }
  f.addEventListener('submit', function (e) {
    e.preventDefault(); var b = f.querySelector('button[type=submit]'); b.disabled = true; msg.textContent = '';
    var data = {}; new FormData(f).forEach(function (v, k) { data[k] = v; }); data.villa = KPV.villa;
    fetch(KPV.rest + 'villa-enquiry', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) }).then(function (r) { return r.json(); }).then(function (j) {
      msg.textContent = j.message || 'Sent.'; msg.className = 'kpv-msg ' + (j.ok ? 'is-ok' : 'is-no'); if (j.ok) f.reset(); b.disabled = false;
    }).catch(function () { msg.textContent = 'Could not send. Please message us on WhatsApp.'; b.disabled = false; });
  });
  var wa = box.querySelector('.kpv-wa'); if (wa) wa.addEventListener('click', function () { var txt = 'Hi, I am interested in ' + d.title.split(' | ')[0] + (val('from') ? ' from ' + val('from') + ' to ' + val('to') : '') + ' for ' + (val('guests') || 2) + ' guests.'; wa.href = 'https://wa.me/' + KPV.wa + '?text=' + encodeURIComponent(txt); });
})();
