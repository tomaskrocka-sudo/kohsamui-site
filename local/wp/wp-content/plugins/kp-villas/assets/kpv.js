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
  f.addEventListener('submit', function (e) {
    e.preventDefault(); var b = f.querySelector('button[type=submit]'); b.disabled = true; msg.textContent = '';
    var data = {}; new FormData(f).forEach(function (v, k) { data[k] = v; }); data.villa = KPV.villa;
    fetch(KPV.rest + 'villa-enquiry', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) }).then(function (r) { return r.json(); }).then(function (j) {
      msg.textContent = j.message || 'Sent.'; msg.className = 'kpv-msg ' + (j.ok ? 'is-ok' : 'is-no'); if (j.ok) f.reset(); b.disabled = false;
    }).catch(function () { msg.textContent = 'Could not send. Please message us on WhatsApp.'; b.disabled = false; });
  });
  var wa = box.querySelector('.kpv-wa'); if (wa) wa.addEventListener('click', function () { var txt = 'Hi, I am interested in ' + d.title.split(' | ')[0] + (val('from') ? ' from ' + val('from') + ' to ' + val('to') : '') + ' for ' + (val('guests') || 2) + ' guests.'; wa.href = 'https://wa.me/' + KPV.wa + '?text=' + encodeURIComponent(txt); });
})();
