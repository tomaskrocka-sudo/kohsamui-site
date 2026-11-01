# Adding partner tours (from the kohsanuk.com catalogue) as bookable products

Mea decided (1 Nov 2026): add every Koh Samui tour from kohsanuk.com that does NOT compete with our own Ang Thong / Pig Island / Koh Tan / Koh Tao / Full Moon / Half Moon / Pink Dolphin trips (those 31 are skipped). Charters and yachts are booked and paid online at a fixed price per boat. Cancellation for these tours: the partner policy (`"cxl": "partner"` → 4+ days full refund minus bank fee, 1–3 days 50 %, under 24 h none).

## Rules
- Read `/home/claude/kohsamui-site/docs/CONTENT-STYLE.md` first (style, links, banned phrases, no fake reviews). Never mention kohsanuk.com or any operator/boat-company name; never link to them. Boat names (e.g. "Kia Ora", "Blue Dragon") may be used as the product's boat name. Venue names for activities (elephant sanctuary, rum distillery, zipline park) may be named in plain text only if it is needed to identify the experience; prefer descriptive titles.
- Facts come from your chunk file (crawled from the product pages). If a price or detail is unclear or the notes flag a listing/page mismatch, WebFetch the `src_url` (and `alt_urls`) to read the product page itself; always use the product-page price, never the listing "from" price. Do not copy their sentences — write original copy.
- If a product cannot be priced reliably (e.g. only "on request", or tiers are contradictory), still include it with `"bookable": false` and a `"notice"` like "Price on request — message us on WhatsApp" (it will be shown as enquiry-only).
- Prices in THB numbers. Our booking card sells EITHER per person (adult price + optional child price; infants 0–2 free) OR per boat (one price for the whole group, max guests). Durations/boat sizes/packages become `options`.

## Output: one JSON array per chunk → `/home/claude/kohsamui-site/local/wp/wp-content/kp-data/products-partner-<N>.json`
Each product object (keys exactly; omit keys you don't need):
```json
{
  "slug": "koh-samui-zipline-tour",                 // our own SEO slug, lowercase, hyphens, unique, ends in -koh-samui where natural
  "name": "Zipline Adventure in the Koh Samui Jungle", // H1, ≤ 70 chars, descriptive (what + where)
  "price": 1900,                                     // base price = lowest option price (adult price for per-person, boat price for per-boat)
  "child": 1500,                                     // child 3–11 price or null (only per-person)
  "per": "person",                                   // "person" | "boat"
  "options": [ {"label": "Half day (4 h)", "price": 24000, "max_guests": 12}, {"label": "Full day (8 h)", "price": 32000, "max_guests": 12} ],  // optional; for per-person options add "child": n
  "max_guests": 12,                                  // per-boat only
  "max_pax": 20,                                     // per-person group size cap if stated
  "min_age": "8+ to ride, 18+ to drive",            // optional
  "cat": ["Island tours"],                           // 1–2 of: Boat trips, Island tours, Water sports, Parties, Private charter, Yachts, Transfers, Fishing
  "duration": "About 3 hours",
  "boat": "54 ft sailing catamaran \"Kia Ora\"",    // boat/vehicle, if any
  "pier": "Bang Rak pier (Big Buddha)",              // departure point if known
  "pickup_window": "08:00–08:30",
  "return": "About 17:00",
  "season": "Daily, all year",
  "weekdays": "Mon,Wed,Fri",                         // only if it runs on set days
  "pickup_enabled": true,                            // true only if hotel transfer from the standard areas is included in the price
  "pickup_note": "Hotel transfer included from Chaweng, Lamai, Bophut, Maenam and Choeng Mon; other areas on request.",  // one sentence, honest; never "hotel pickup included" without the areas
  "cxl": "partner",
  "park_fee": "Ang Thong park fee 300 THB adult / 150 THB child, cash",   // fees NOT included, if any
  "notice": "",                                      // short line shown on the booking card if needed
  "bookable": true,
  "partner": "1",
  "short": "One or two sentences, answer-first, with the price and the key fact.",
  "included": ["…"], "not_included": ["…"],
  "itinerary": ["08:00 | Hotel pickup", "09:00 | …"],   // "time | text"; omit if unknown
  "what_to_bring": ["Swimwear", "…"],
  "faq": ["Question? | Answer.", "…"]                // exactly 8 unique Q&As specific to THIS product (price, children, pickup, what's included, duration, weather, cancellation (partner policy), what to bring/age limits). No question text may be identical to another product's.
}
```

Also write, per product, the editorial body file `/home/claude/kohsamui-site/content/product-<slug>.html`:
```
---
type: product
slug: <slug>
status: publish
updated: 2026-11-01
---
<h2>Why go: …</h2> … (300–600 words total: why go / what you'll do, who it suits and who should choose something else, good to know (safety, weather, ethics where relevant), combine it with (2–4 internal links to our guide pages from the page list in BUILD-PROMPT-PAGE-BRIEFS.md, e.g. /activities/, /koh-samui-boat-charter/, /koh-samui-yacht-charter/, /koh-samui-sunset-cruise/, /koh-samui-diving/, /koh-samui-fishing/, /koh-samui-beaches/, /chaweng-koh-samui/ …)).
```
Don't repeat the at-a-glance facts, itinerary, included/not included, prices or FAQ in the body — the template renders those from the JSON.

Ethics: elephant experiences only if no riding and no bathing-with-elephants shows; if the product includes riding, skip it (list it in your report). Same for any animal show.

Validate your JSON with `python3 -c "import json;json.load(open(PATH))"` and check slugs are unique within your file. Report back (≤ 200 words): count added, count enquiry-only, skipped (and why), and any price you could not settle.
