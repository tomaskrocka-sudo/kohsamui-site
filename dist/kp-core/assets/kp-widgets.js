/* Live tide, forecast and sun widgets (kohphangan.com layout). Data: Open-Meteo (free, CORS), rendered in the visitor's browser so cached pages stay current. */
(function () {
  'use strict';
  var TZ = 'Asia/Bangkok';
  function nowBkk() { var s = new Date().toLocaleString('sv-SE', { timeZone: TZ }).replace(' ', 'T'); return s.slice(0, 16); }
  function ms(t) { return Date.parse(t + ':00Z'); } // treat local Bangkok strings as a uniform timeline
  function hm(t) { return t.slice(11, 16); }
  function day(t, long) { var d = new Date(ms(t.slice(0, 10) + 'T12:00')); return d.toLocaleDateString('en-GB', { timeZone: 'UTC', weekday: 'short', day: 'numeric', month: 'short' }); }
  function esc(s) { return String(s).replace(/[&<>"]/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;' }[c]; }); }
  function f1(n) { return (Math.round(n * 10) / 10).toFixed(1); }
  function inHM(mins) { mins = Math.max(0, Math.round(mins)); var h = Math.floor(mins / 60), m = mins % 60; return (h ? h + ' h ' : '') + m + ' min'; }
  function addMin(t, m) { var d = new Date(ms(t) + m * 60000); return d.toISOString().slice(0, 16); }

  /* Moon phase (age in days from a known new moon) */
  var SYN = 29.530588853, NEW = Date.UTC(2000, 0, 6, 18, 14);
  function moon(dateStr) { var age = ((Date.parse(dateStr + 'T12:00:00+07:00') - NEW) / 864e5) % SYN; if (age < 0) age += SYN;
    var f = age / SYN, names = ['New moon', 'Waxing crescent', 'First quarter', 'Waxing gibbous', 'Full moon', 'Waning gibbous', 'Last quarter', 'Waning crescent'];
    return { f: f, name: names[Math.round(f * 8) % 8] }; }
  function moonSvg(f) { // lit part drawn with two arcs
    var r = 7, c = 8, k = Math.cos(f * 2 * Math.PI), rx = Math.abs(k) * r, waxing = f < 0.5;
    var lit = 'M' + c + ',' + (c - r) + ' A' + r + ',' + r + ' 0 0 ' + (waxing ? 1 : 0) + ' ' + c + ',' + (c + r) + ' A' + rx + ',' + r + ' 0 0 ' + ((waxing ? k > 0 : k < 0) ? 0 : 1) + ' ' + c + ',' + (c - r) + 'Z';
    return '<svg class="kpw-moon" viewBox="0 0 16 16" width="16" height="16" aria-hidden="true"><circle cx="8" cy="8" r="7" class="kpw-moon-d"/><path d="' + lit + '" class="kpw-moon-l"/></svg>'; }

  /* ---------- Tides ---------- */
  function extremes(times, lv) { // local max/min over ±2 h on 15-min data, refined by a parabola through the neighbours
    var out = [], W = 8, i, j, isMax, isMin;
    for (i = W; i < lv.length - W; i++) { if (lv[i] == null) continue; isMax = isMin = true;
      for (j = i - W; j <= i + W; j++) { if (j === i || lv[j] == null) continue; if (lv[j] > lv[i] || (lv[j] === lv[i] && j < i)) isMax = false; if (lv[j] < lv[i] || (lv[j] === lv[i] && j < i)) isMin = false; }
      if (!isMax && !isMin) continue;
      var a = lv[i - 1], b = lv[i], c = lv[i + 1], den = a - 2 * b + c, off = den ? 0.5 * (a - c) / den : 0; off = Math.max(-1, Math.min(1, off));
      out.push({ type: isMax ? 'high' : 'low', time: addMin(times[i], Math.round(off * 15)), h: b - 0.25 * (a - c) * off }); }
    // drop tiny wiggles (< 8 cm against the previous turn)
    var f = []; out.forEach(function (e) { var p = f[f.length - 1]; if (p && p.type === e.type) { if ((e.type === 'high') === (e.h > p.h)) f[f.length - 1] = e; return; } if (p && Math.abs(e.h - p.h) < 0.08) { f.pop(); return; } f.push(e); });
    return f; }
  function tideClass(r) { return r >= 1.5 ? 'Spring tide' : r >= 0.8 ? 'Medium tide' : 'Neap tide'; }
  function chart(times, lv, ex, today, now, W) {
    W = Math.max(330, Math.min(720, Math.round(W || 640))); var step = W < 480 ? 2 : 1,  H = 190, L = 8, R = 8, T = 30, B = 26, pts = [], i, min = Infinity, max = -Infinity;
    for (i = 0; i < times.length; i++) if (times[i].slice(0, 10) === today || times[i] === addMin(today + 'T00:00', 1440)) { if (lv[i] == null) continue; pts.push([times[i], lv[i]]); min = Math.min(min, lv[i]); max = Math.max(max, lv[i]); }
    if (pts.length < 10) return '';
    min = Math.min(0, Math.floor(min * 5) / 5); max = Math.ceil((max + 0.15) * 5) / 5;
    var t0 = ms(today + 'T00:00'), X = function (t) { return L + (ms(t) - t0) / 864e5 * (W - L - R); }, Y = function (v) { return T + (1 - (v - min) / (max - min)) * (H - T - B); };
    var d = pts.map(function (p, k) { return (k ? 'L' : 'M') + X(p[0]).toFixed(1) + ',' + Y(p[1]).toFixed(1); }).join('');
    var s = '<svg class="kpw-chart" viewBox="0 0 ' + W + ' ' + H + '" role="img" aria-label="Tide curve for today">';
    for (i = 0; i <= 8; i += step) { var x = L + i / 8 * (W - L - R); s += '<line x1="' + x + '" x2="' + x + '" y1="' + T + '" y2="' + (H - B) + '" class="kpw-grid"/><text x="' + x + '" y="' + (H - 6) + '" class="kpw-ax" text-anchor="' + (i === 0 ? 'start' : i === 8 ? 'end' : 'middle') + '">' + ('0' + i * 3).slice(-2) + ':00</text>'; }
    s += '<path d="' + d + 'L' + X(pts[pts.length - 1][0]).toFixed(1) + ',' + (H - B) + 'L' + L + ',' + (H - B) + 'Z" class="kpw-area"/><path d="' + d + '" class="kpw-line"/>';
    ex.forEach(function (e) { if (e.time.slice(0, 10) !== today) return; var x = X(e.time), y = Y(e.h), lab = (e.type === 'high' ? 'High ' : 'Low ') + hm(e.time) + ' · ' + f1(e.h) + ' m', anc = x < 70 ? 'start' : x > W - 70 ? 'end' : 'middle';
      s += '<circle cx="' + x.toFixed(1) + '" cy="' + y.toFixed(1) + '" r="4.5" class="kpw-pt kpw-' + e.type + '"/><text x="' + x.toFixed(1) + '" y="' + (e.type === 'high' ? y - 10 : Math.min(y + 18, H - B - 4)).toFixed(1) + '" class="kpw-lab" text-anchor="' + anc + '">' + lab + '</text>'; });
    if (now.slice(0, 10) === today) { var nv = interp(times, lv, now), nx = X(now); if (nv != null) s += '<line x1="' + nx + '" x2="' + nx + '" y1="' + (T - 8) + '" y2="' + (H - B) + '" class="kpw-now"/><text x="' + nx + '" y="' + (T - 12) + '" class="kpw-ax kpw-nowt" text-anchor="middle">now</text><circle cx="' + nx.toFixed(1) + '" cy="' + Y(nv).toFixed(1) + '" r="5.5" class="kpw-nowpt"/>'; }
    return s + '</svg>'; }
  function interp(times, lv, t) { var x = ms(t); for (var i = 0; i < times.length - 1; i++) { var a = ms(times[i]), b = ms(times[i + 1]); if (x >= a && x <= b && lv[i] != null && lv[i + 1] != null) return lv[i] + (lv[i + 1] - lv[i]) * (x - a) / (b - a); } return null; }

  function renderTides(el, j) {
    var m = j.minutely_15 && j.minutely_15.sea_level_height_msl && j.minutely_15.sea_level_height_msl.some(function (v) { return v != null; }) ? j.minutely_15 : null;
    var times = m ? m.time : j.hourly.time, lv = m ? m.sea_level_height_msl : j.hourly.sea_level_height_msl;
    var ex = extremes(times, lv), now = nowBkk(), today = now.slice(0, 10), nv = interp(times, lv, now), rising = interp(times, lv, addMin(now, 15)) > nv;
    var days = [], byDay = {}; ex.forEach(function (e) { var d = e.time.slice(0, 10); (byDay[d] = byDay[d] || []).push(e); });
    var nDays = +(el.getAttribute('data-days') || 8);
    Object.keys(byDay).sort().forEach(function (d) { if (d >= today && days.length < nDays) days.push(d); });
    var nextLow = ex.filter(function (e) { return e.type === 'low' && e.time > now; })[0], nextHigh = ex.filter(function (e) { return e.type === 'high' && e.time > now; })[0];
    var range = function (d) { var hs = byDay[d].map(function (e) { return e.h; }); return Math.max.apply(null, hs) - Math.min.apply(null, hs); };
    var big = days.slice(0, 7).reduce(function (b, d) { var r = byDay[d].length > 1 ? range(d) : 0; return r > b.r ? { d: d, r: r } : b; }, { d: null, r: 0 });
    var h = '<div class="kpw-stats"><div><span>Tide now (' + hm(now) + ')</span><b>' + (nv != null ? f1(nv) + ' m' : '–') + '</b><small>' + (rising ? '↑ Rising' : '↓ Falling') + (nextHigh && rising ? ' · high at ' + hm(nextHigh.time) : nextLow && !rising ? ' · low at ' + hm(nextLow.time) : '') + '</small></div>';
    if (nextLow) h += '<div><span>Next low tide</span><b>' + (nextLow.time.slice(0, 10) === today ? 'Today ' : day(nextLow.time) + ' ') + hm(nextLow.time) + '</b><small>' + f1(nextLow.h) + ' m · in ' + inHM((ms(nextLow.time) - ms(now)) / 60000) + '</small></div>';
    if (big.d) h += '<div><span>Biggest tide this week</span><b>' + (big.d === today ? 'Today' : day(big.d)) + '</b><small>range ' + f1(big.r) + ' m · ' + tideClass(big.r).toLowerCase() + '</small></div>';
    h += '</div>' + (el.hasAttribute('data-nochart') ? '' : '<div class="kpw-chartw">' + chart(times, lv, ex, today, now, el.clientWidth - 30) + '</div>') + '<div class="kpw-days">';
    days.forEach(function (d) { var mo = moon(d), r = byDay[d].length > 1 ? range(d) : 0;
      h += '<div class="kpw-day' + (d === today ? ' is-today' : '') + '"><div class="kpw-dd"><b>' + (d === today ? 'Today ' + day(d).replace(/^\w+,?\s/, '') : day(d)) + '</b><span>' + moonSvg(mo.f) + mo.name + '</span></div><div class="kpw-ex">';
      byDay[d].forEach(function (e) { var hh = +hm(e.time).slice(0, 2) + (+hm(e.time).slice(3)) / 60, dl = e.type === 'low' && hh >= 6.5 && hh <= 18;
        h += '<span class="kpw-chip kpw-' + e.type + (e.time < now ? ' is-past' : '') + '">' + (e.type === 'high' ? 'High ' : 'Low ') + '<b>' + hm(e.time) + '</b> <small>' + f1(e.h) + ' m</small>' + (dl ? '<em>daylight</em>' : '') + '</span>'; });
      h += '</div><div class="kpw-cls"><b>' + (r ? tideClass(r) : '') + '</b>' + (r ? '<span>range ' + f1(r) + ' m</span>' : '') + '</div></div>'; });
    h += '</div><p class="kpw-src">Predicted heights for ' + esc(el.getAttribute('data-name') || 'Koh Samui') + ' from the Open-Meteo tide model, local time (ICT). For beach planning, not navigation.</p>';
    el.querySelector('.kpw-body').innerHTML = h; el.classList.remove('is-loading'); }

  /* ---------- Forecast (weather + sea) ---------- */
  var WX = { 0: ['Sunny', 'sun'], 1: ['Mostly sunny', 'sun'], 2: ['Partly cloudy', 'part'], 3: ['Cloudy', 'cloud'], 45: ['Fog', 'cloud'], 48: ['Fog', 'cloud'], 51: ['Drizzle', 'rain'], 53: ['Drizzle', 'rain'], 55: ['Drizzle', 'rain'], 61: ['Light rain', 'rain'], 63: ['Rain', 'rain'], 65: ['Heavy rain', 'rain'], 80: ['Showers', 'shower'], 81: ['Showers', 'shower'], 82: ['Heavy showers', 'rain'], 95: ['Thunderstorms', 'storm'], 96: ['Thunderstorms', 'storm'], 99: ['Thunderstorms', 'storm'] };
  var ICON = { sun: '<circle cx="12" cy="12" r="5" class="i-sun"/><g class="i-ray"><path d="M12 1.5v3M12 19.5v3M1.5 12h3M19.5 12h3M4.6 4.6l2.1 2.1M17.3 17.3l2.1 2.1M4.6 19.4l2.1-2.1M17.3 6.7l2.1-2.1"/></g>',
    part: '<circle cx="9" cy="9" r="4.5" class="i-sun"/><path d="M8 20h10a4 4 0 0 0 0-8 5.5 5.5 0 0 0-10.4 1.6A3.2 3.2 0 0 0 8 20z" class="i-cloud"/>',
    cloud: '<path d="M6.5 19h11a4.5 4.5 0 0 0 0-9 6 6 0 0 0-11.4 1.8A3.6 3.6 0 0 0 6.5 19z" class="i-cloud"/>',
    rain: '<path d="M6.5 15h11a4.5 4.5 0 0 0 0-9 6 6 0 0 0-11.4 1.8A3.6 3.6 0 0 0 6.5 15z" class="i-cloud"/><path d="M8 17.5l-1 3M12 17.5l-1 3M16 17.5l-1 3" class="i-drop"/>',
    shower: '<circle cx="8" cy="7" r="3.5" class="i-sun"/><path d="M7.5 15h10a4.2 4.2 0 0 0 0-8.4 5.6 5.6 0 0 0-10.6 1.7A3.4 3.4 0 0 0 7.5 15z" class="i-cloud"/><path d="M10 17.5l-1 3M14 17.5l-1 3" class="i-drop"/>',
    storm: '<path d="M6.5 14h11a4.5 4.5 0 0 0 0-9 6 6 0 0 0-11.4 1.8A3.6 3.6 0 0 0 6.5 14z" class="i-cloud"/><path d="M12.5 14.5l-2.5 4h3l-2 4" class="i-bolt"/>' };
  function icon(k) { return '<svg class="kpw-ico" viewBox="0 0 24 24" width="28" height="28" aria-hidden="true">' + (ICON[k] || ICON.cloud) + '</svg>'; }
  function seaVerdict(w) { return w == null ? null : w < 0.5 ? ['Calm', 'calm', 'All boat trips run'] : w < 1.25 ? ['Choppy', 'choppy', 'Trips run, bumpy crossings'] : ['Rough', 'rough', 'Exposed routes may be cancelled']; }
  function renderForecast(el, wx, mar) {
    var d = wx.daily, sea = el.getAttribute('data-mode') === 'sea', n = Math.min(+(el.getAttribute('data-days') || 7), d.time.length), today = nowBkk().slice(0, 10);
    var wmax = {}; if (mar && mar.hourly) mar.hourly.time.forEach(function (t, i) { var k = t.slice(0, 10), v = mar.hourly.wave_height[i], h = +t.slice(11, 13); if (v == null || h < 7 || h > 18) return; wmax[k] = Math.max(wmax[k] || 0, v); });
    var tmin = Math.min.apply(null, d.temperature_2m_min.slice(0, n)), tmax = Math.max.apply(null, d.temperature_2m_max.slice(0, n));
    var h = '<div class="kpw-fc' + (sea ? ' is-sea' : '') + '">';
    for (var i = 0; i < n; i++) { var k = d.time[i], w = WX[d.weather_code[i]] || ['–', 'cloud'], wv = wmax[k], sv = seaVerdict(wv), lo = d.temperature_2m_min[i], hi = d.temperature_2m_max[i];
      var bar = '<span class="kpw-tbar"><i style="left:' + ((lo - tmin) / Math.max(1, tmax - tmin) * 100).toFixed(0) + '%;right:' + ((tmax - hi) / Math.max(1, tmax - tmin) * 100).toFixed(0) + '%"></i></span>';
      h += '<div class="kpw-fr' + (k === today ? ' is-today' : '') + '"><div class="kpw-fd"><b>' + (k === today ? 'Today' : day(k).split(' ')[0].replace(',', '')) + '</b><span>' + (k === today ? day(k).replace(/^\w+,?\s/, '') : day(k).replace(/^\w+,?\s/, '')) + '</span></div>' +
        '<div class="kpw-fw">' + icon(w[1]) + '<span>' + w[0] + '</span></div>' +
        (sea ? '' : '<div class="kpw-ft"><span class="kpw-lo">' + Math.round(lo) + '°</span>' + bar + '<span class="kpw-hi">' + Math.round(hi) + '°</span></div>') +
        '<div class="kpw-fx"><span title="Chance of rain">☂ ' + d.precipitation_probability_max[i] + '%' + (d.precipitation_sum[i] >= 0.5 ? ' · ' + Math.round(d.precipitation_sum[i]) + ' mm' : '') + '</span><span title="Max wind">' + Math.round(d.wind_speed_10m_max[i]) + ' km/h</span></div>' +
        '<div class="kpw-fs">' + (sv ? '<span class="kpw-sea kpw-' + sv[1] + '">' + sv[0] + ' · ' + f1(wv) + ' m</span>' + (sea ? '<small>' + sv[2] + '</small>' : '') : '') + '</div></div>'; }
    h += '</div><p class="kpw-src">Open-Meteo forecast for the island centre; sea = highest daytime wave (07:00–18:00) off Chaweng. Updated ' + hm(nowBkk()) + ' Samui time.</p>';
    el.querySelector('.kpw-body').innerHTML = h; el.classList.remove('is-loading'); }

  /* ---------- Sun ---------- */
  function renderSun(el, wx) { var d = wx.daily, n = Math.min(+(el.getAttribute('data-days') || 7), d.time.length), today = nowBkk().slice(0, 10), now = nowBkk();
    var ss = d.sunset[0], sr = d.sunrise[0], next = now < sr ? ['Sunrise', sr] : now < ss ? ['Sunset', ss] : ['Sunrise', d.sunrise[1]];
    var h = '<div class="kpw-stats"><div><span>Sunset today</span><b>' + hm(ss) + '</b><small>golden hour from ' + hm(addMin(ss, -45)) + '</small></div><div><span>Sunrise today</span><b>' + hm(sr) + '</b><small>blue hour from ' + hm(addMin(sr, -25)) + '</small></div><div><span>Next ' + next[0].toLowerCase() + '</span><b>' + hm(next[1]) + '</b><small>in ' + inHM((ms(next[1]) - ms(now)) / 60000) + '</small></div></div><div class="kpw-days">';
    for (var i = 0; i < n; i++) { var k = d.time[i], w = WX[d.weather_code[i]] || ['–', 'cloud'];
      h += '<div class="kpw-day' + (k === today ? ' is-today' : '') + '"><div class="kpw-dd"><b>' + (k === today ? 'Today' : day(k)) + '</b><span>' + icon(w[1]) + w[0] + '</span></div><div class="kpw-ex"><span class="kpw-chip kpw-low">Sunrise <b>' + hm(d.sunrise[i]) + '</b></span><span class="kpw-chip kpw-high">Sunset <b>' + hm(d.sunset[i]) + '</b></span></div><div class="kpw-cls"><b>Golden hour</b><span>' + hm(addMin(d.sunset[i], -45)) + '–' + hm(d.sunset[i]) + '</span></div></div>'; }
    el.querySelector('.kpw-body').innerHTML = h + '</div><p class="kpw-src">Times for Koh Samui (ICT) from Open-Meteo. Cloud on the western horizon decides the colour more than the clock.</p>'; el.classList.remove('is-loading'); }

  function fail(el) { el.classList.remove('is-loading'); el.querySelector('.kpw-body').innerHTML = '<p class="kpw-src">Live data is loading slowly. Try again in a minute, or see the forecast on <a href="https://www.windy.com/9.512/100.013?9.512,100.013,9" target="_blank" rel="noopener">Windy</a>.</p>'; }
  var cache = {};
  function get(url) { return cache[url] || (cache[url] = fetch(url).then(function (r) { if (!r.ok) throw r; return r.json(); })); }
  function marine(la, lo) { return get('https://marine-api.open-meteo.com/v1/marine?latitude=' + la + '&longitude=' + lo + '&timezone=Asia%2FBangkok&hourly=sea_level_height_msl,wave_height&minutely_15=sea_level_height_msl&forecast_days=9'); }
  function forecast(la, lo) { return get('https://api.open-meteo.com/v1/forecast?latitude=' + la + '&longitude=' + lo + '&timezone=Asia%2FBangkok&daily=weather_code,temperature_2m_max,temperature_2m_min,precipitation_sum,precipitation_probability_max,wind_speed_10m_max,sunrise,sunset&forecast_days=8'); }
  function load(el) { var k = el.getAttribute('data-kpw'), la = el.getAttribute('data-lat'), lo = el.getAttribute('data-lng');
    el.classList.add('is-loading');
    if (k === 'tides') marine(la, lo).then(function (j) { renderTides(el, j); }).catch(function () { fail(el); });
    else if (k === 'forecast') Promise.all([forecast(9.512, 100.013), marine(9.53, 100.06).catch(function () { return null; })]).then(function (r) { renderForecast(el, r[0], r[1]); }).catch(function () { fail(el); });
    else if (k === 'sun') forecast(9.512, 100.013).then(function (j) { renderSun(el, j); }).catch(function () { fail(el); }); }
  function init() {
    document.querySelectorAll('[data-kpw]').forEach(function (el) { load(el);
      el.querySelectorAll('[data-kpw-pt]').forEach(function (b) { b.addEventListener('click', function () {
        el.querySelectorAll('[data-kpw-pt]').forEach(function (x) { x.setAttribute('aria-pressed', x === b ? 'true' : 'false'); });
        el.setAttribute('data-lat', b.getAttribute('data-lat')); el.setAttribute('data-lng', b.getAttribute('data-lng')); el.setAttribute('data-name', b.textContent); load(el); }); }); });
  }
  if (document.readyState !== 'loading') init(); else document.addEventListener('DOMContentLoaded', init);
})();
