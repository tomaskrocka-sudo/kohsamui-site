/* KP checkout hotel picker. Google Places (New) suggestions when a key is set (Bookings → Settings),
   otherwise the OpenStreetMap hotel list from /wp-json/kp/v1/hotels. Free text always allowed. */
(function () {
  var input = document.getElementById('kpb_hotel');
  if (!input || !window.KPBH) return;
  var form = input.form || document.querySelector('form.checkout');
  var row = input.closest('.form-row') || input.parentNode;
  var wrap = document.createElement('div'); wrap.className = 'kpb-hl-wrap';
  input.parentNode.insertBefore(wrap, input); wrap.appendChild(input);
  input.setAttribute('role', 'combobox'); input.setAttribute('aria-autocomplete', 'list'); input.setAttribute('aria-expanded', 'false'); input.setAttribute('aria-controls', 'kpb-hl');
  var list = document.createElement('ul'); list.id = 'kpb-hl'; list.className = 'kpb-hl'; list.setAttribute('role', 'listbox'); list.hidden = true; wrap.appendChild(list);
  var found = document.createElement('p'); found.className = 'kpb-hl-found'; found.hidden = true; row.appendChild(found);
  function hidden(name) { var h = form.querySelector('input[name="' + name + '"]'); if (!h) { h = document.createElement('input'); h.type = 'hidden'; h.name = name; form.appendChild(h); } return h; }
  var hLat = hidden('kpb_hotel_lat'), hLng = hidden('kpb_hotel_lng'), hPid = hidden('kpb_hotel_pid');
  var items = [], active = -1, timer = null, useG = !!KPBH.gkey, gLib = null, gToken = null, osm = null, seq = 0;
  var BOUNDS = { south: 9.39, west: 99.90, north: 9.61, east: 100.11 };

  function clearPick() { hLat.value = ''; hLng.value = ''; hPid.value = ''; found.hidden = true; }
  function close() { list.hidden = true; input.setAttribute('aria-expanded', 'false'); active = -1; }
  function esc(s) { return String(s).replace(/[&<>"]/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;' }[c]; }); }
  function render(note) {
    list.innerHTML = '';
    items.forEach(function (it, i) {
      var li = document.createElement('li'); li.id = 'kpb-hl-' + i; li.setAttribute('role', 'option'); li.className = i === active ? 'on' : '';
      li.innerHTML = '<strong>' + esc(it.name) + '</strong>' + (it.sub ? '<span>' + esc(it.sub) + '</span>' : '');
      li.addEventListener('mousedown', function (e) { e.preventDefault(); pick(i); });
      list.appendChild(li);
    });
    var foot = document.createElement('li'); foot.className = 'kpb-hl-foot'; foot.setAttribute('aria-hidden', 'true');
    foot.innerHTML = (note ? esc(note) + ' · ' : '') + (useG ? 'powered by Google' : 'Hotel list © OpenStreetMap contributors');
    list.appendChild(foot);
    list.hidden = false; input.setAttribute('aria-expanded', 'true');
    if (active >= 0) input.setAttribute('aria-activedescendant', 'kpb-hl-' + active); else input.removeAttribute('aria-activedescendant');
  }
  function showFound(name, area) { found.innerHTML = '📍 ' + esc(name) + (area ? ' · ' + esc(area) : '') + ' <a href="' + mapUrl() + '" target="_blank" rel="noopener">check on Google Maps</a>'; found.hidden = false; }
  function mapUrl() {
    if (hPid.value) return 'https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent(input.value) + '&query_place_id=' + encodeURIComponent(hPid.value);
    return 'https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent(hLat.value + ',' + hLng.value);
  }
  function pick(i) {
    var it = items[i]; if (!it) return; close(); input.value = it.name;
    if (it.osm) { hLat.value = it.lat; hLng.value = it.lng; hPid.value = ''; showFound(it.name, it.sub); return; }
    hPid.value = it.pid; hLat.value = ''; hLng.value = '';
    var my = ++seq;
    it.pred.toPlace().fetchFields({ fields: ['location', 'formattedAddress'] }).then(function (r) {
      if (my !== seq) return; var p = r.place || it.pred.toPlace();
      if (p.location) { hLat.value = p.location.lat().toFixed(5); hLng.value = p.location.lng().toFixed(5); }
      showFound(it.name, it.sub);
    }).catch(function () { showFound(it.name, it.sub); });
    gToken = null; // fetchFields ends the billing session
  }

  /* OpenStreetMap list */
  function osmLoad() { if (osm) return Promise.resolve(osm); return fetch(KPBH.url).then(function (r) { return r.json(); }).then(function (j) { osm = (j.rows || []).map(function (r) { return { name: r[0], sub: r[1], lat: r[2], lng: r[3], osm: 1, k: norm(r[0] + ' ' + r[1]) }; }); return osm; }); }
  function norm(s) { return String(s).toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '').replace(/[^a-z0-9 ]+/g, ' '); }
  function osmSearch(q) {
    return osmLoad().then(function (rows) {
      var t = norm(q).split(' ').filter(Boolean); if (!t.length) return [];
      return rows.filter(function (r) { return t.every(function (w) { return r.k.indexOf(w) >= 0; }); })
        .sort(function (a, b) { return (norm(a.name).indexOf(t[0]) === 0 ? 0 : 1) - (norm(b.name).indexOf(t[0]) === 0 ? 0 : 1); }).slice(0, 8);
    });
  }
  /* Google Places (New) */
  function gLoad() {
    if (gLib) return Promise.resolve(gLib);
    return new Promise(function (ok, fail) {
      if (window.google && window.google.maps && window.google.maps.importLibrary) return ok();
      window.__kpbGmaps = ok;
      var s = document.createElement('script'); s.async = true; s.onerror = fail;
      s.src = 'https://maps.googleapis.com/maps/api/js?key=' + encodeURIComponent(KPBH.gkey) + '&v=weekly&loading=async&callback=__kpbGmaps&language=en&region=TH';
      document.head.appendChild(s);
    }).then(function () { return window.google.maps.importLibrary('places'); }).then(function (lib) { gLib = lib; return lib; });
  }
  function gSearch(q) {
    return gLoad().then(function (lib) {
      if (!gToken) gToken = new lib.AutocompleteSessionToken();
      return lib.AutocompleteSuggestion.fetchAutocompleteSuggestions({ input: q, sessionToken: gToken, locationRestriction: BOUNDS, includedPrimaryTypes: ['lodging'], language: 'en', region: 'th' });
    }).then(function (r) {
      return (r.suggestions || []).filter(function (s) { return s.placePrediction; }).slice(0, 6).map(function (s) {
        var p = s.placePrediction; return { name: p.mainText ? p.mainText.text : p.text.text, sub: p.secondaryText ? p.secondaryText.text.replace(/, Thailand$/, '') : '', pid: p.placeId, pred: p };
      });
    });
  }
  function search() {
    var q = input.value.trim(); if (q.length < 2) { close(); return; }
    var my = ++seq;
    (useG ? gSearch(q).catch(function (e) { if (window.console) console.warn('KP hotel picker: Google search failed, using the OpenStreetMap list.', e); useG = false; return osmSearch(q); }) : osmSearch(q)).then(function (res) {
      if (my !== seq) return; items = res; active = -1;
      render(res.length ? '' : 'Not on the list? Keep typing, the name is enough');
    }).catch(function () { close(); });
  }
  input.addEventListener('input', function () { clearPick(); clearTimeout(timer); timer = setTimeout(search, useG ? 300 : 120); });
  input.addEventListener('focus', function () { if (useG) gLoad().catch(function () {}); else osmLoad(); });
  input.addEventListener('keydown', function (e) {
    if (list.hidden) return;
    if (e.key === 'ArrowDown') { e.preventDefault(); active = Math.min(active + 1, items.length - 1); render(); }
    else if (e.key === 'ArrowUp') { e.preventDefault(); active = Math.max(active - 1, 0); render(); }
    else if (e.key === 'Enter' && active >= 0) { e.preventDefault(); pick(active); }
    else if (e.key === 'Escape') close();
  });
  input.addEventListener('blur', function () { setTimeout(close, 150); });
})();
