/* Places map: Leaflet split view (map + numbered list), type chips, list ↔ marker sync. Lazy-inits when the map scrolls into view. */
(function () {
  if (!window.L) return;
  var COLORS = { beach: '#0EA5B7', temple: '#C2410C', viewpoint: '#7C3AED', waterfall: '#2563EB', island: '#16A34A', area: '#0B1F33', market: '#DB2777', pier: '#475569', service: '#64748B' };
  function icon(n, type) {
    return L.divIcon({ className: 'kpg-pin', html: '<span style="background:' + (COLORS[type] || '#0B1F33') + '">' + n + '</span>', iconSize: [26, 26], iconAnchor: [13, 13] });
  }
  function init(split) {
    var mapEl = split.querySelector('.kpg-map'), rows = [].slice.call(split.querySelectorAll('.kpg-row')); if (!mapEl || !rows.length) return;
    var map = L.map(mapEl, { scrollWheelZoom: false, tap: true }).setView([9.5, 100.0], 11);
    L.tileLayer(split.dataset.tiles || 'https://tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 18, attribution: '&copy; OpenStreetMap contributors' }).addTo(map);
    var markers = [], bounds = [];
    rows.forEach(function (r, i) {
      var ll = [parseFloat(r.dataset.lat), parseFloat(r.dataset.lng)]; bounds.push(ll);
      var m = L.marker(ll, { icon: icon(i + 1, r.dataset.type), title: r.dataset.name, keyboard: true }).addTo(map);
      m.bindPopup('<strong><a href="' + r.dataset.url + '">' + r.dataset.name + '</a></strong><br><a href="https://www.google.com/maps/dir/?api=1&destination=' + ll.join(',') + '" rel="noopener" target="_blank">Directions</a>');
      m.on('click', function () { rows.forEach(function (x) { x.classList.toggle('is-active', x === r); }); r.scrollIntoView({ block: 'nearest', behavior: 'smooth' }); });
      r.addEventListener('click', function (e) { if (e.target.closest('a')) return; map.setView(ll, 14); m.openPopup(); rows.forEach(function (x) { x.classList.toggle('is-active', x === r); }); });
      markers.push(m);
    });
    if (bounds.length > 1) map.fitBounds(bounds, { padding: [24, 24] }); else map.setView(bounds[0], 14);
    split.querySelectorAll('.kpg-chip').forEach(function (chip) {
      chip.addEventListener('click', function () {
        chip.classList.toggle('is-on'); chip.setAttribute('aria-pressed', chip.classList.contains('is-on'));
        var on = [].slice.call(split.querySelectorAll('.kpg-chip.is-on')).map(function (c) { return c.dataset.type; });
        rows.forEach(function (r, i) { var show = on.indexOf(r.dataset.type) > -1; r.classList.toggle('is-hidden', !show); if (show) markers[i].addTo(map); else map.removeLayer(markers[i]); });
      });
    });
  }
  var splits = document.querySelectorAll('.kpg-split');
  if (!('IntersectionObserver' in window)) { splits.forEach(init); return; }
  var io = new IntersectionObserver(function (es) { es.forEach(function (e) { if (e.isIntersecting) { io.unobserve(e.target); init(e.target); } }); }, { rootMargin: '300px' });
  splits.forEach(function (s) { io.observe(s); });
})();
