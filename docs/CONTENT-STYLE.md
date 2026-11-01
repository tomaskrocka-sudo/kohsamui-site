# Content writing rules for the Koh Samui guide (for every writer/agent)

Goal: the most detailed, most current, most useful guide to Koh Samui on the web — better than any competitor page for the same query. Today is November 2026; every fact must be true for late 2026 / 2027.

## Files you produce
For each page write TWO files in `/home/claude/kohsamui-site/content/`:
1. `<slug>.html` — front matter + body HTML.
2. `<slug>.faq.txt` — the FAQ, one Q&A per line: `Question? | Answer.` (no HTML, no line breaks inside an answer; 8–12 lines for pillars/hubs, at least 6 for other pages; questions must be unique to this page — don't reuse generic questions word-for-word across pages; prefix a line with `~` if it should show on the page but stay out of FAQ schema because the same question is marked up elsewhere).

Front matter (exact keys; omit what doesn't apply):
```
---
type: page            # or kp_place for place pages (beaches/areas/sights listed in places.json)
slug: koh-samui-weather
title: Koh Samui Weather by Month (2026): Rain, Sea and Best Time to Visit   # this is the visible H1
seo_title: Koh Samui Weather by Month 2026: Rain, Sea & Best Time            # ≤ 60 chars
meta: One sentence, 140–158 characters, answer-first, with a number.
excerpt: One or two plain sentences summarising the page (used in cards and llms.txt).
kind: guide           # hub | guide | pillar | utility
status: publish
updated: 2026-11-01
author: KohSamui team
---
```
Body: starts directly with the answer-first lead paragraph `<p class="kp-lead">…</p>` (2–4 sentences that fully answer the main query with concrete numbers). Do NOT include an `<h1>` (the template prints the title as H1) and do NOT include the FAQ in the body (the template renders it from the .faq.txt file).

## Page brief
Your page's brief is in `/home/claude/kohsamui-site/BUILD-PROMPT-PAGE-BRIEFS.md` (search for the slug in backticks, e.g. "#### `/koh-samui-weather/`"). Follow its H1, section outline (every H2/H3), data blocks, FAQ questions, word target and internal links. Sitewide rules are in `/home/claude/kohsamui-site/BUILD-PROMPT.md` (Parts A–C are the most important). Research already gathered: `/home/claude/kohsamui-site/docs/research/practical.md`, `events.md`, `tours-places.md` — use them, but RE-VERIFY anything that changes (prices, fees, schedules, opening hours, closures, laws, visa rules, ferry timetables, flight routes, hospital phone numbers) with WebSearch/WebFetch now. If a fact cannot be confirmed from a current source, either leave it out or mark it inline `[check]` (the site strips `[check]` items from the live page, so the sentence must still read well without it — better: put the uncertain fact in its own sentence ending with ` [check]`).

## HTML you may use (site CSS already styles these)
- `<h2>`, `<h3>`, `<p>`, `<ul>/<ol>/<li>`, `<strong>`, `<em>`, `<a href="/slug/">`
- Lead: `<p class="kp-lead">`
- Fact table: `<table class="kp-glance"><thead><tr><th>…</th></tr></thead><tbody>…</tbody></table>` (use for every comparison, prices, timetables, month tables, at-a-glance boxes). Wrap wide tables in `<div class="kp-tbl">…</div>`.
- Callout: `<p class="kp-note"><strong>Good to know:</strong> …</p>`
- Included / not included lists: `<ul class="kp-inc">` / `<ul class="kp-notinc">`
- Timeline/itinerary: `<ol class="kp-itin"><li><b>08:00</b> Pickup …</li></ol>`
- Card grid of internal links: `<div class="kp-grid-3"><a class="kp-card" href="/slug/"><strong>Title</strong><span>one line</span></a>…</div>`
- Shortcodes that render live data (use where the brief asks): `[kp_weather_now]`, `[kp_sea_now]`, `[kp_tide_now]`, `[kp_time]`, `[kp_year]`, `[kp_updated]`, `[kp_cxl policy="day"]` / `[kp_cxl policy="angthong"]`, `[kp_wa]` (WhatsApp button), `[kp_tours limit="4"]` (tour cards), `[kp_events limit="6"]`, `[kp_next_party]`, `[kp_places_map]`.
- No images in the body yet (photos are added later). No inline styles, no scripts, no iframes, no emojis.

## Links (strict)
- Internal links: use root-relative URLs from the page list in BUILD-PROMPT-PAGE-BRIEFS.md (e.g. `/ang-thong-marine-park/`, `/product/pig-island-speedboat-tour/`, `/koh-samui-tours/`). Link generously (8–25 internal links per page) with descriptive anchor text.
- External links ONLY to: kohphangan.com, angthongmarinepark.com, pigislandkohsamui.com, speedboatsamui.com, wa.me, Google Maps (`https://www.google.com/maps/search/?api=1&query=<lat>,<lng>` or place name), windy.com, open-meteo.com, tmd.go.th, and official Thai government pages (immigration.go.th, tdac.immigration.go.th, mfa.go.th, thaiembassy.org, dnp.go.th, thailand.go.th). NEVER link to other tour operators, OTAs, hotels, restaurants, airlines, ferry companies, Wikipedia, blogs or news. Name businesses in plain text without links.
- Do not cite sources in the body; keep a list of the sources you used in `/home/claude/kohsamui-site/docs/research/sources-<your-batch>.md` (slug → URLs) for our fact-check.

## Business facts (use exactly)
- Brand: we are a local Australian-Thai team, on the islands since 2006, TAT licence 43/01467, WhatsApp +66 63 704 0888. Sister sites: kohphangan.com, angthongmarinepark.com, pigislandkohsamui.com, speedboatsamui.com.
- Our tours and prices (THB, 2026, adult / child 3–11; infants 0–2 free): Ang Thong speedboat 1,800/1,400 · Ang Thong big boat 1,500/1,100 · Ang Thong VIP 4,500/4,200 ("only 15 guests on a big speedboat") · Ang Thong overnight tent 3,600/3,400 · overnight bungalow 4,200/3,900 · Ang Thong private speedboat 33,000 per boat · Pig Island speedboat 1,450/1,250 · Pig Island longtail 1,750/1,550 · Pig Island sunset 1,550/1,350 · Pink Dolphins & Pig Island 2,250 · private longtail Pig Island 5,950/boat · private speedboat Pig Island 11,950/boat · Koh Madsum–Koh Tan–Koh Rap private 8,450/boat · Koh Rap full day private 9,950/boat · Jet Ski Safari 9,950 · Koh Tao & Koh Nang Yuan 2,200/1,600 · Full Moon Party speedboat 1,400 · Half Moon Festival package from 2,700.
- Product URLs: `/product/<slug>/` with slugs ang-thong-marine-park-day-tour-koh-samui, ang-thong-big-boat-tour-koh-samui, ang-thong-vip-tour-koh-samui, ang-thong-overnight-camping-koh-samui, ang-thong-overnight-bungalow-koh-samui, ang-thong-private-speedboat-koh-samui, pig-island-speedboat-tour, pig-island-longtail-tour, pig-island-sunset-tour, pink-dolphins-pig-island-tour, pig-island-private-longtail, pig-island-private-speedboat, koh-madsum-koh-tan-koh-rap-private-boat, koh-rap-full-day-private-boat, jet-ski-safari-pig-island, koh-tao-koh-nang-yuan-day-trip-koh-samui, full-moon-party-speedboat-koh-samui, full-moon-party-private-speedboat-koh-samui, half-moon-festival-package-koh-samui.
- Ang Thong National Marine Park closes 1 November–15 December every year (reopens 16 December). Park fee (cash, not included): 300 THB foreign adult, 150 THB child — re-verify. Pig Island runs all year.
- Never write "hotel pickup included" without qualifying it: hotel transfers are included from the main areas; remote areas (Nathon, Lipa Noi, Taling Ngam, Bang Kao, Thong Krut, Laem Yai and similar) +400 THB per person return.
- Never state guest numbers for Ang Thong or Koh Tao shared tours (only the VIP line above).
- Cancellation: day tours full refund 48 h+ before departure, 50 % at 24–48 h, none under 24 h or no-show; Ang Thong tours full refund 48 h+, none under 48 h; if we cancel for weather: full refund or a new date. Online booking for tomorrow closes at midnight Thai time; no same-day online booking. Prices charged in THB only. Confirmation by email or WhatsApp after payment.
- We don't sell Full Moon Party entry tickets (entry ~200 THB at the gate).
- Don't invent reviews, testimonials, guest quotes, staff names, awards or "we visited on <date>" claims. Write from the perspective of a knowledgeable local team, but no fake first-hand anecdotes.

## Writing style
- British English, plain and direct, short sentences, active voice. Numbers as digits; prices like "1,450 THB"; times 24 h ("08:30"); distances in km; temperatures °C.
- Answer first, then detail. Every section must contain specific, checkable facts (prices, times, distances, phone numbers of public services, GPS-able place names, opening hours, dates for 2026–2027). No filler, no clichés ("paradise", "hidden gem", "nestled", "breathtaking", "tropical paradise", "look no further", "whether you're…"), no rhetorical questions as headers except FAQ.
- Be honest: say what's bad, closed, overpriced or risky (scams, rip currents, road deaths, jellyfish season, monsoon months).
- Meet or exceed the word target in the brief; depth over padding. Use tables wherever data compares.
- Keep [ask Mea] items out entirely unless the sentence reads fine with the tag stripped.
