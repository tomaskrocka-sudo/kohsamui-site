/* Site shell JS: theme toggle (kpts), currency (kpcur), mobile panel, event filters, reading progress, live clock. */
(function () {
  var d = document, html = d.documentElement;
  /* Theme toggle: same storage key as kohphangan.com */
  var t = d.getElementById('kph-theme');
  if (t) t.addEventListener('click', function () { var dark = !html.classList.contains('kpts-dark'); html.classList.toggle('kpts-dark', dark); try { localStorage.setItem('kp-theme', dark ? 'dark' : 'light'); } catch (e) {} });
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
