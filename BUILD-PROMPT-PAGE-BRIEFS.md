# KOH SAMUI SITE: PART P, PAGE-BY-PAGE CONTENT BRIEFS
> Companion to `BUILD-PROMPT.md` (Parts A–O, Q). Give the builder **both files**. Read `BUILD-PROMPT.md` first; it holds the rules (Part A), design (B), templates (D), SEO (F), widgets (G), products (I), writing rules (K) and the fact sheet (O). This file holds **one brief per page**. Before building or writing a page, find its brief here (search for its slug) and follow it.
>
> **Precedence:**
> 1. Part A rules override everything.
> 2. The measured twin numbers in **P0.2** override any twin numbers quoted inside a brief. Some briefs quote approximate twin counts read through a summarising tool; P0.2 was measured from the full HTML.
> 3. Facts in Part O and the research files override facts in a brief.
> 4. Anything tagged **[check]** or **[ask Mea]** stays off the live page until verified.
> 5. **Targets:** a brief's own H2 outline, FAQ list and data blocks are binding. Word counts (in the brief, in P0.2, in P1.0/P2.0/P3.0 tables and in K1) are **references only**: a page passes parity when every H2 topic, table and fact block in its brief is present and it has at least as many H2s, FAQs and tables as its measured twin. Never pad. For the five shared slugs, the P2/P3 guide brief's outline applies and the P1 brief adds the money blocks.
> 6. **Launch waves (K1):** only Wave-1 pages are indexable at launch; the rest publish at ≤ 10 a week after Mea reads them, each with a first-hand element.
> 7. **FAQ strings are unique sitewide (R2).** Where a brief lists a generic question that other briefs also list ("Is lunch included?"), write it with the product or place name in the question and answer it with that page's own facts; general questions have one owner page and other pages ask the specific variant or link to the owner.
> 8. **Dates, prices and counts in titles, metas and leads are rendered from data** (events CPT, product price, `kp_year`), never hard-coded in copy. Where a brief shows a specific date or a [check] price in a meta, treat it as an example of the pattern.
>
> **Slugs:** the slug in a brief's heading is canonical. Where Part C and a brief differ, use the brief's slug, and add every new slug to the menus and sitemap. Where two briefs share a slug (`/koh-samui-travel-guide/`, `/koh-samui-golf/`, `/koh-samui-spa/`, `/koh-samui-diving/`, `/koh-samui-snorkeling/`), build **one** page: the guide brief supplies the content outline and the P1 brief adds the money blocks (product grid, booking cards, prices). Merge their FAQs without duplicates.

---

## PART P: PAGE-BY-PAGE CONTENT BRIEFS AND THE PARITY RULE

### P0. The parity rule (this is what "as detailed as kohphangan.com" means, in numbers)
Every Samui page has a **twin** on kohphangan.com (the same slug with `koh-phangan` → `koh-samui`, or the nearest equivalent named in its brief). Before you publish a Samui page, open its twin and check:
| Metric | Rule |
|---|---|
| Words in main content | **≥ the twin's count** (table P0.2); never below the floor for its group (K1) |
| H2 sections | **≥ the twin's** |
| FAQ questions (FAQPage schema) | **≥ the twin's**, minimum 5 on any guide, product or hub |
| Interactive map | if the twin has one, the Samui page has one; most guide and place pages need one anyway (owner rule) |
| Tables | **≥ the twin's**; any page with prices, times, distances or months needs at least one |
| Images | **≥ the twin's**, **100% WebP and 100% with alt text** (the twin often isn't; you must be) |
| Title / meta description | 50–60 / 140–160 characters |
| H1 | exactly one |
| Schema | the same types as the twin, plus anything the brief adds |

Measure with the same method used for this brief (main content minus header, footer, nav, sidebar and related rails). Log each page's metrics in `/docs/parity.csv` (samui_url, twin_url, words, twin_words, h2, twin_h2, faq, twin_faq, imgs, webp, alt_ok, map, tables, pass). **A page is not done until the row says `pass`.**

### P0.1 How the briefs work
P1–P3 below give a brief for **every page in the Part C sitemap**: primary and secondary keywords, title, meta, H1, answer-first lead, full H2/H3 outline with the facts each section must contain, data blocks (map, tables, widgets), the exact FAQ questions, internal money links, images and the word target. Follow the outline. You may **add** sections when real research shows something useful, but you may not drop one without noting why in the worklog. Facts tagged **[check]** or **[ask Mea]** stay off the live page until they are verified.

### P0.2 Measured twin metrics: kohphangan.com, 31 Oct 2026 (main content only)
Site totals: **78 pages + 37 posts + 129 products** in the sitemaps. Guide pages and posts average **2,504 words, 12 H2s, 7 FAQs and 2 tables**. Products average **1,283 words, 13 H2s and 24 images**. Only **817 of 1,780 images (46%) are WebP**; the Samui site must reach 100%.

Columns: twin slug (`KP` = koh-phangan) → Samui slug · words · H2 · FAQ · images · tables. **The Samui page must meet or beat every number.**
| kohphangan.com twin | Samui page | Words | H2 | FAQ | Img | Tbl |
|---|---|---|---|---|---|---|
| `/` | `/` | 3,201 | 19 | 6 | 94 | 0 |
| `/koh-phangan-tours/` | `/koh-samui-tours/` | 6,729 | 24 | 10 | 94 | 2 |
| `/activities/` | `/activities/` | 3,613 | 15 | 10 | 18 | 2 |
| `/koh-phangan-travel-guide/` | `/koh-samui-travel-guide/` | 4,327 | 17 | 9 | 12 | 6 |
| `/how-to-get-to-koh-phangan/` | `/how-to-get-to-koh-samui/` | 1,598 | 10 | 6 | 4 | 2 |
| `/bangkok-to-koh-phangan/` | `/bangkok-to-koh-samui/` | 1,255 | 9 | 5 | 5 | 1 |
| `/koh-samui-to-koh-phangan/` | `/koh-samui-to-koh-phangan/` (reverse view: from Samui) | 1,358 | 8 | 6 | 5 | 1 |
| `/koh-tao-to-koh-phangan/` | `/koh-samui-to-koh-tao/` | 1,126 | 6 | 5 | 6 | 1 |
| `/koh-phangan-airport/` | `/koh-samui-airport/` | 2,400 | 12 | 12 | 7 | 2 |
| `/private-speedboat-koh-samui-to-koh-phangan/` | same | 1,888 | 11 | 9 | 3 | 5 |
| `/where-to-stay-koh-phangan/` | `/where-to-stay-koh-samui/` | 2,149 | 9 | 5 | 26 | 1 |
| `/koh-phangan-itinerary/` | `/koh-samui-itinerary/` | 3,137 | 20 | 4 | 5 | 0 |
| `/koh-phangan-weather/` | `/koh-samui-weather/` | 2,264 | 13 | 9 | 7 | 2 |
| `/koh-phangan-tides/` | `/koh-samui-tides/` | 2,566 | 8 | 7 | 3 | 2 |
| `/koh-phangan-sea-conditions/` | `/koh-samui-sea-conditions/` | 2,536 | 9 | 8 | 4 | 1 |
| `/getting-around-koh-phangan/` | `/getting-around-koh-samui/` | 2,674 | 17 | 9 | 4 | 5 |
| `/koh-phangan-roads/` | `/koh-samui-roads/` | 2,768 | 16 | 8 | 4 | 2 |
| `/koh-phangan-motorbike-rental/` | `/koh-samui-motorbike-rental/` | 2,781 | 15 | 8 | 7 | 4 |
| `/koh-phangan-car-rental/` | `/koh-samui-car-rental/` | 2,441 | 14 | 8 | 6 | 3 |
| `/koh-phangan-bicycle-rental/` | `/koh-samui-bicycle-rental/` | 2,141 | 12 | 8 | 7 | 4 |
| `/thailand-visa-guide/` | same (updated to 30 days) | 3,307 | 14 | 7 | 1 | 5 |
| `/koh-phangan-visa-run/` | `/koh-samui-visa-extension/` | 2,367 | 13 | 12 | 4 | 2 |
| `/koh-phangan-immigration-office/` | `/koh-samui-immigration-office/` | 2,130 | 13 | 8 | 1 | 3 |
| `/koh-phangan-travel-insurance/` | `/koh-samui-travel-insurance/` | 3,115 | 13 | 8 | 1 | 6 |
| `/koh-phangan-sim-card-wifi/` | `/koh-samui-sim-card-wifi/` | 2,799 | 12 | 12 | 5 | 3 |
| `/koh-phangan-banks-money/` | `/koh-samui-banks-money/` | 3,040 | 13 | 8 | 4 | 3 |
| `/koh-phangan-vs-koh-samui-vs-koh-tao/` | `/koh-samui-vs-koh-phangan-vs-koh-tao/` | 3,066 | 17 | 5 | 7 | 1 |
| `/ang-thong-overnight-camping-vs-day-tour/` | same + `/ang-thong-speedboat-vs-big-boat/` | 3,102 | 27 | 5 | 7 | 1 |
| `/koh-phangan-beaches/` | `/koh-samui-beaches/` | 3,541 | 12 | 0 | 6 | 1 |
| `/koh-phangan-snorkeling/` | `/koh-samui-snorkeling/` | 3,628 | 11 | 0 | 10 | 2 |
| `/koh-phangan-diving/` | `/koh-samui-diving/` | 3,202 | 13 | 8 | 24 | 3 |
| `/koh-phangan-freediving/` | `/koh-samui-freediving/` | 2,441 | 11 | 8 | 11 | 4 |
| `/koh-phangan-kitesurfing/` | `/koh-samui-kitesurfing/` | 2,706 | 9 | 9 | 17 | 2 |
| `/koh-phangan-wakeboarding/` | `/koh-samui-jet-ski/` + `/koh-samui-kayak-sup/` | 1,893 | 10 | 7 | 7 | 4 |
| `/koh-phangan-water-sports/` | `/koh-samui-water-sports/` | 3,419 | 14 | 9 | 7 | 3 |
| `/koh-phangan-waterfalls/` | `/koh-samui-waterfalls/` | 3,488 | 15 | 8 | 9 | 2 |
| `/koh-phangan-hiking/` | `/koh-samui-hiking/` | 2,709 | 13 | 8 | 4 | 1 |
| `/koh-phangan-sunset-spots/` | `/koh-samui-sunset-spots/` | 3,008 | 26 | 5 | 6 | 1 |
| `/koh-phangan-temples/` | `/koh-samui-temples/` | 3,647 | 13 | 9 | 9 | 3 |
| `/koh-phangan-wildlife/` | `/koh-samui-wildlife/` | 3,318 | 11 | 9 | 6 | 1 |
| `/islands-near-koh-phangan/` | `/islands-near-koh-samui/` | 3,087 | 15 | 13 | 8 | 6 |
| `/phangan-elephant-sanctuary/` | `/koh-samui-elephant-sanctuary/` | 3,057 | 28 | 5 | 7 | 1 |
| `/than-sadet-koh-phangan/` | `/na-muang-waterfall-koh-samui/` | 2,944 | 12 | 12 | 7 | 4 |
| `/than-sadet-ko-pha-ngan-national-park/` | `/ang-thong-marine-park/` | 2,194 | 15 | 9 | 7 | 3 |
| `/thong-sala-koh-phangan/` | `/nathon-koh-samui/`, `/chaweng-koh-samui/` | 2,737 | 14 | 12 | 13 | 2 |
| `/zen-beach-koh-phangan/` · `/bottle-beach-koh-phangan/` · `/thong-nai-pan-koh-phangan/` · `/koh-ma-koh-phangan/` | every beach/area place page | 2,512–2,995 | 12–13 | 12–13 | 4–6 | 3–4 |
| `/chinese-temple-koh-phangan/` · `/wat-khao-tham-koh-phangan/` · `/wat-phu-khao-noi-koh-phangan/` | every temple place page | 1,954–2,701 | 11–12 | 10–12 | 5–8 | 0–3 |
| `/domsila-viewpoint-koh-phangan/` | `/lad-koh-viewpoint-koh-samui/`, `/overlap-stone-koh-samui/` | 1,878 | 11 | 7 | 7 | 0 |
| `/koh-phangan-nightlife/` | `/koh-samui-nightlife/` | 1,906 | 13 | 5 | 12 | 1 |
| `/koh-phangan-parties/` | `/koh-samui-parties/` | 3,909 | 18 | 0 | 11 | 1 |
| `/koh-phangan-events/` | `/koh-samui-events/` | 1,992 | 5 | 5 | 66 | 0 |
| `/full-moon-party-dates/` | same | 2,253 | 14 | 0 | 25 | 0 |
| `/koh-phangan-party-calendar-2026-2027/` | `/koh-samui-party-calendar-2026-2027/` | 862 | 4 | 0 | 1 | 2 |
| `/koh-phangan-songkran/` · `/loy-krathong/` · `/koh-phangan-christmas/` | Samui equivalents | 2,122–2,510 | 10–13 | 7–8 | 2–9 | 2 |
| `/koh-phangan-muay-thai/` | `/koh-samui-muay-thai/` | 2,999 | 13 | 8 | 4 | 4 |
| `/salsa-koh-phangan/`, `/lighthouse-party-koh-phangan/`, `/happy-saturday-zen-beach/` | recurring Samui nights (e.g. `/fishermans-village-walking-street/`) | 1,023–1,587 | 8–10 | 0–7 | 2–17 | 0–2 |
| `/koh-phangan-restaurants/` | `/koh-samui-restaurants/` | 2,657 | 14 | 8 | 5 | 3 |
| `/koh-phangan-markets/` | `/koh-samui-markets/` | 2,291 | 11 | 7 | 2 | 2 |
| `/koh-phangan-art-fashion/` | `/koh-samui-shopping-malls/` | 2,344 | 14 | 8 | 7 | 2 |
| `/koh-phangan-beauty-salons/` | `/koh-samui-beauty-salons/` | 2,032 | 12 | 6 | 2 | 2 |
| `/koh-phangan-history/` | `/history-of-koh-samui/` | 2,089 | 11 | 6 | 5 | 1 |
| `/thai-culture-and-traditions/` | same | 3,766 | 17 | 14 | 7 | 6 |
| `/koh-phangan-yoga/` | `/koh-samui-yoga/` | 3,401 | 12 | 0 | 8 | 2 |
| `/koh-phangan-meditation/` | `/koh-samui-meditation/` | 2,116 | 12 | 8 | 7 | 3 |
| `/koh-phangan-retreats/` | `/koh-samui-retreats/` | 2,555 | 10 | 0 | 32 | 1 |
| `/koh-phangan-spa/` | `/koh-samui-spa/` | 3,212 | 13 | 10 | 7 | 2 |
| `/koh-phangan-gyms/` | `/koh-samui-gyms/` | 2,177 | 10 | 10 | 5 | 1 |
| `/koh-phangan-sports/` | `/koh-samui-sports/` (brief: see P4, "Golf, tennis and padel" under wellness; if the wellness brief covers it, 301 is not needed, just use that slug) | 1,955 | 12 | 10 | 6 | 3 |
| `/koh-phangan-with-kids/` | `/koh-samui-with-kids/` | 3,565 | 12 | 9 | 10 | 3 |
| `/koh-phangan-honeymoon/` | `/koh-samui-honeymoon/` | 3,463 | 11 | 9 | 7 | 2 |
| `/koh-phangan-wedding/` | `/koh-samui-wedding/` | 3,378 | 12 | 0 | 7 | 2 |
| `/koh-phangan-boat-charter/` · `/koh-phangan-yacht-charter/` | `/koh-samui-boat-charter/` · `/koh-samui-yacht-charter/` | 3,478 · 3,792 | 12 · 11 | 9 · 12 | 7 · 31 | 2 · 10 |
| `/koh-phangan-hospital/` | `/koh-samui-hospital/` | 4,018 | 17 | 8 | 2 | 2 |
| `/koh-phangan-pharmacies/` · `/koh-phangan-dentist/` | Samui equivalents | 2,125 · 2,197 | 10 | 8 | 1 | 3–4 |
| `/koh-phangan-tourist-police/` · `/koh-phangan-police-station/` | Samui equivalents | 1,951 · 2,077 | 11 | 6–7 | 1 | 2 |
| `/koh-phangan-drugs-alcohol-law/` | `/koh-samui-drugs-alcohol-law/` | 2,477 | 14 | 8 | 1 | 4 |
| `/precautions-safety/` | same (**twin is thin: write ≥ 2,000 words**) | 729 | 1 | 0 | 1 | 0 |
| `/koh-phangan-coworking/` · `/working-on-koh-phangan/` · `/opening-business-koh-phangan/` | Samui equivalents | 2,369 · 2,379 · 2,724 | 11–13 | 7–8 | 1–4 | 3–5 |
| `/koh-phangan-real-estate/` · `/building-koh-phangan/` · `/koh-phangan-lawyers/` | Samui equivalents | 3,541 · 3,052 · 2,404 | 12–16 | 7–9 | 1–2 | 4–5 |
| `/koh-phangan-schools/` · `/koh-phangan-local-government/` | Samui equivalents | 2,693 · 2,511 | 11–13 | 8 | 1 | 7 |
| `/koh-phangan-villas/` | `/koh-samui-villas/` | 1,237 | 5 | 5 | 21 | 0 |
| `/faq/` | `/faq/` (**Samui: ≥ 40 FAQs**) | 1,432 | 2 | 16 | 5 | 0 |
| `/about-us/` | `/about-us/` (**twin is thin: write ≥ 1,200 words for E-E-A-T**) | 758 | 5 | 0 | 2 | 0 |
| `/koh-phangan-news/` | `/koh-samui-news/` | 692 | 2 | 0 | 1 | 0 |
| `/destinations/` + posts (Bangkok 2,608 · Khao Sok 3,274 · Koh Samui 3,373 · Angkor Wat 1,867 · Bali 1,720 · Andaman Islands 1,689) | `/destinations/` + Bangkok, Khao Sok, **Koh Phangan**, Koh Tao, Krabi, Surat Thani posts | 1,689–3,373 | — | 0–9 | — | — |
| Product: `/product/daytour-ang-thong-marine-park/` · `/product/koh-tao-koh-nang-yuan-day-trip/` | every Samui boat-tour product | ~1,900 | 15 | 8 | 29 | 0+ |
| Products (partner activities, courses, retreats, events, villas) | every other Samui product | 1,100–2,000 | 9–16 | ≥ 5 (twin has 0, so beat it) | 14–40 | ≥ 1 price table |

**Twin weaknesses to beat, not copy:** FAQ schema is missing on beaches, snorkelling, yoga, retreats, parties, wedding and most products; `/precautions-safety/`, `/about-us/` and `/koh-phangan-news/` are thin; `/koh-phangan-markets/` and `/koh-phangan-night-market/` duplicate each other (2,291 words each), which is cannibalisation, so keep **one** markets page on Samui; less than half the images are WebP; products have 0 tables (add a price table on every product).


### P1. Money pages, hubs, events and company pages

> **Scope.** Page-by-page content briefs for the homepage, all hubs, every product/money page in menu 1 "Tours & Activities", the event-type evergreen pages, the FAQ and the company/legal pages. Each brief is the writer's spec: facts come from Part I2 (our prices) and Part O (fact sheet). Tags: **[check]** = re-verify at writing time before publishing; **[ask Mea]** = owner input needed; keep the item off the live page until it is answered. Every page also carries the global layout from B4 (ticker, header, footer, WhatsApp float, mobile bar) and a visible "Updated {Month YYYY}" stamp.

#### P1.0 Shared conventions (apply to every brief below; referenced by code)

**Standard strings (use word for word, sitewide):**
- **[PICKUP]** "Hotel pickup included from most areas of Koh Samui. Nathon, Lipa Noi, Taling Ngam, Bang Kao and Thong Krut (and other remote areas) add 400 THB per person, return." Every product has a "Pickup areas" H2 or H3 with this text plus the select list from D3.
- **[THB]** "Charged in THB; EUR/USD shown for reference." Placed under every price and every total.
- **[CUTOFF]** "Online booking for tomorrow closes at midnight Thailand time (ICT). For same-day requests, message us on WhatsApp."
- **[CONFIRM]** "After payment we confirm your booking by email or WhatsApp, and send your pickup time the evening before." Never "instant confirmation".
- **[AGES]** "Adult 12+ · Child 3–11 · Infant 0–2 free. Children's life jackets are provided and must be worn on the boat."
- **[CXL-DAY]** "Full refund if you cancel 48 hours or more before departure. 50% refund 24–48 hours before. No refund under 24 hours or for a no-show. If we cancel for weather or sea safety, you choose a full refund or a new date." + link "Full terms" → `/terms-and-conditions/#cancellation`.
- **[CXL-AT]** (all Ang Thong day and overnight tours) "Full refund if you cancel 48 hours or more before departure. No refund under 48 hours or for a no-show. If we cancel for weather or sea safety, you choose a full refund or a new date." + same link.
- **[CLOSURE]** (all Ang Thong products and guides, auto-shown 1 Nov–15 Dec, date picker starts 16 Dec) "Ang Thong Marine Park is closed every year from 1 November to 15 December. Season reopens 16 December. Book now for later dates." followed by a cross-sell block: Pig Island Speedboat (1,450 THB) + Koh Tao & Nang Yuan (2,200 THB).
- **[TRUST]** ticks: "Local team since 2006 · TAT licence 43/01467 · Secure card payment · Full refund 48 h+ before departure". The licence appears only in the booking sidebar/trust row, About, Terms and footer.
- **[PARK FEE]** "Ang Thong National Park fee, paid in cash at the park: 300 THB per foreign adult, 150 THB per child [check age band: the park counts children as 3–14, our booking band is 3–11]."
- **Buttons:** **Book now** (payable online) · **Get a quote** / **Enquire on WhatsApp** (charters, groups 10+, villas, activities without a confirmed partner) · **Get directions** (places). WhatsApp prefill: "Hi, I'm interested in {page title} ({URL})".

**Banned in copy:** guest numbers on Ang Thong or Koh Tao shared tours (VIP only: "only 15 guests on a big speedboat"); "small group" on Ang Thong/Koh Tao shared tours; "not affiliated with the national park"; unqualified "hotel pickup included"; "instant confirmation"; any competitor, OTA or partner-operator name or link in a booking flow; "hidden gem", "paradise", "nestled", "boasts"; one-way island hopping on tour boats. FAQ questions may ask "Is hotel pickup included?", but every answer must use the [PICKUP] wording.

**Product page skeleton (D3), used by every `/product/` brief:** breadcrumbs → H1 (product name; never repeated as an H2) → gallery + sticky booking card (date picker, Adult/Child/Infant, pickup-area select with auto +400 THB line, live total, [THB], Book now, "Questions? WhatsApp us", [TRUST]) → the H2s listed in each brief → reviews (real WooCommerce reviews only; no `aggregateRating` until real ones exist) → "More trips from Koh Samui" rail → mobile sticky bar (price + Book now). Small live cards on every boat product: **sea state** (Open-Meteo Marine wave height + verdict "Calm / Choppy / Rough: boats may be rescheduled") and **tide now** at the nearest point (Nathon 9.53, 99.93 for Ang Thong and the west; Thong Krut 9.41, 99.95 for Pig Island; Chaweng 9.53, 100.06 for the east and the Phangan crossing).

**Schema sets:**
- **S-PRODUCT** = `Product` (offers in THB, `availability`, `priceValidUntil` = 12 months ahead, `aggregateRating` only from real reviews) + `TouristTrip` (`itinerary` as `ItemList` of `TouristAttraction`, `touristType`, `provider` = sitewide TravelAgency, `offers`) + `BreadcrumbList` + `FAQPage` + `ItemPage`.
- **S-ENQUIRY** (charters, activities sold by quote) = `Service` (or `Product` without `offers` until bookable) + `Offer` with `priceSpecification` "from" where a published price exists + `BreadcrumbList` + `FAQPage` + `WebPage`.
- **S-HUB** = `CollectionPage` + `ItemList` (children with URL, name, image, price where relevant) + `BreadcrumbList` + `FAQPage`.
- **S-GUIDE** = `Article` (author `Person` + publisher `Organization`, `dateModified`) + `BreadcrumbList` + `FAQPage` + `ImageObject`; place-heavy pages add `ItemList` of `TouristAttraction` with `geo`.
- **S-EVENTPAGE** = S-GUIDE + `ItemList` of `Event` (each `Event` lives on its single-event URL with `startDate` +07:00, `eventStatus`, `location` with `geo`, `offers` when we sell transfers).

**Images (all pages):** WebP, max 2400 px wide, quality 78–82, `srcset`, explicit width/height, hero `fetchpriority="high"` and not lazy, everything else lazy. Alt pattern: "{what} at {where}, Koh Samui" (or "…, Ang Thong Marine Park", "…, Koh Phangan" where true). Owner photos first (sister sites, Mea's Google Drive), then licensed stock, then partner photos with permission. No watermarks, no public figures, no photo on more than two pages. OG image 1200×630 per page.

**Twin depth benchmark (kohphangan.com, measured 31 Oct 2026) vs these briefs:**
| Twin page | Twin H2s / FAQs / words (body) | Samui brief target |
|---|---|---|
| `/` | 6 content H2s · 0 FAQ · ~2,000 | 11 H2s · 10 FAQ · 2,200 |
| `/koh-phangan-tours/` | ~21 content H2s · 10 FAQ · ~2,900 | 22 H2s · 12 FAQ · 3,200 |
| `/product/daytour-ang-thong-marine-park/` | 1 H2 + 7 H3 · 0 FAQ · ~900 (no at-a-glance, no "good to know", repeated H1) | 14 H2s · 10 FAQ · 1,600 |
| `/koh-phangan-events/` | 5 H2s · 5 FAQ · ~700 editorial | 10 H2s · 10 FAQ · 1,600 editorial |
| `/full-moon-party-dates/` | 14 H2s · 5 FAQ · ~1,500 | 15 H2s · 10 FAQ · 2,000 |
| `/koh-phangan-villas/` | 5 H2s (4+4 H3) · 5 FAQ · ~1,000 | 8 H2s (6+6 H3) · 8 FAQ · 1,500 |
| `/koh-phangan-retreats/` | 10 H2s · FAQ (truncated) · ~2,300 | 12 H2s · 9 FAQ · 2,400 |
| `/faq/` | 1 group · 11 Q · ~460 | 9 groups · 52 Q · ~3,400 |

---

#### `/` · D1 · HUB
- **Primary keyword:** koh samui (brand + island; the tours hub owns "koh samui tours") · **Secondary:** koh samui island guide · things to do in koh samui · koh samui boat trips · full moon party from koh samui · koh samui villas · {{BRAND}}
- **Title tag:** Koh Samui Tours 2026: Ang Thong, Pig Island & Boats · **Meta description:** Koh Samui tours from a local team since 2006: Pig Island from 1,450 THB, Ang Thong from 1,500 THB, private boats and Full Moon boats. Book online or WhatsApp.
- **H1:** Koh Samui tours, boats, villas & events (visible Playfair headline; eyebrow `<p class="kpa-k">` "Koh Samui tours, boats, villas & events · local since 2006"; fixes defect E5)
- **Answer-first lead (what it must say in 2–3 sentences):** We are a Koh Samui team running boat trips since 2006: Ang Thong Marine Park, Pig Island and Koh Tao day trips, private speedboats and catamarans, and Full Moon Party boats, all bookable online in THB. Supporting line under the H1 changes by date: 1 Nov–15 Dec "Ang Thong reopens 16 December. Pig Island and Koh Tao run daily."; otherwise "Speedboat trips to Ang Thong, Pig Island and Koh Tao, with hotel pickup from most areas."
- **Section outline (H2 → H3):**
  1. Hero (H1) + 4 price tiles: **Ang Thong from 1,500 THB** (subtext "speedboat 1,800"; 1 Nov–15 Dec reads "Ang Thong reopens 16 Dec") · **Pig Island from 1,450 THB** · **Private speedboat from 19,000 THB** (→ `/koh-samui-private-speedboat/`) · **Tonight on Samui** (count of tonight's events, hourly). Trust strip [TRUST] under the buttons.
  2. **H2 Coming up on Koh Samui** → "Next party" pill; 8 event/party cards from the events CPT (date, "IN 3 DAYS", "from X THB per person", **Book tickets**/**Book your seat**). Seed Nov–Dec 2026: Waterfall Party Wed 11, Sun 22, Thu 26 Nov · Jungle Experience Mon 23 Nov · **Full Moon Party + Loy Krathong Tue 24 Nov** · Half Moon Magic Forest Thu 3 Dec, Thu 17 Dec · FMP Christmas Eve Thu 24 Dec · NYE FMP Thu 31 Dec. "See all events →".
  3. **FMP promo block `kpg-fmp`** (H2 rendered from data: "Full Moon Party on Tuesday 24 November on Haad Rin"), auto-visible from 2 days before the party until online booking closes (midnight ICT the night before). Facts: shared return speedboat **1,400 THB pp**, departures in an 18:00–23:00 window [ask Mea for return times], hotel pickup from most areas; party entry ~200 THB paid at the party (we don't sell entry); private boat price [ask Mea: 35,800 return vs 19,500 one way], up to 10 guests; boats run only in safe sea conditions; weather cancellation = full refund or new date. Buttons **Book your seat** · **Book a private boat**; WhatsApp only for 10+.
  4. **H2 Party boats from Koh Samui** → Half Moon Festival packages (Magic Forest nights Thu 3 Dec, Thu 17 Dec 2026; from 2,700 THB [check vs 2,500 THB forest ticket]); Jungle Experience and Waterfall Party → private speedboat enquiry; NYE shared boat [ask Mea price].
  5. **H2 Boat trips from Koh Samui** → 6 cards (from-price, duration, **See the trip**): Ang Thong speedboat 1,800 · Ang Thong big boat 1,500 · Ang Thong VIP 4,500 ("only 15 guests on a big speedboat") · Ang Thong overnight from 3,600 · Pig Island speedboat 1,450 · Koh Tao & Nang Yuan 2,200. Rule: 1 Nov–15 Dec Pig Island and Koh Tao move first; Ang Thong cards show "Reopens 16 Dec".
  6. **H2 Our most-booked trips** → 12 cards (rating only when real reviews exist): Pig Island speedboat · Ang Thong speedboat · Koh Tao & Nang Yuan · Pig Island sunset 1,550 · Pig Island longtail 1,750 · Pink Dolphins & Pig Island 2,250 · Ang Thong VIP · Ang Thong overnight bungalow 4,200 · FMP shared 1,400 · Ang Thong private 33,000/boat · Private longtail 5,950/boat · Boutique yachting day 4,500.
  7. **H2 What's on in Koh Samui** → 10 live event cards + recurring nights from O10 cheat sheet (Fisherman's Village Walking Street Fri; Chaweng Walking Street Thu–Sat; Muay Thai: Phetchbuncha Mon/Wed/Sat, Samui International Tue/Fri/Sun). Buttons **See all events** · **Full Moon Party dates**.
  8. **H2 Charter your own boat** → 8 fleet cards (per boat, from, max guests, **Get a quote**): PP Speed Boat 30 ft 19,000 (8) · PP Speed Boat 35 ft 29,000 (28) · MN Speed Boat 46,000 (37) · Victoria Sailing catamaran 20,000 (13) · Blue Coco catamaran 36,000 (25) · Coco Paradise catamaran 45,000 (45) · Red Baron junk 41,000 (70) · Casablanca motor yacht 50,000 (12). Flow line: "Tell us the date and group → we send a quote → pay by secure link."
  9. **H2 Stay in a Koh Samui villa** → tabs Holiday / Long-term; 8 holiday cards (nightly price, **Book this villa**) + 8 long-term ("Monthly rent on request · min. 6 months", **Enquire**). [ask Mea: villa partners]; hide the section until ≥4 villas are live.
  10. **H2 Retreats on Koh Samui** → up to 10 cards, sellable/enquirable only [ask Mea]; hide if none.
  11. **H2 Explore Koh Samui** → 18 guide cards: itinerary · how to get here · weather by month · where to stay · getting around · beaches · waterfalls · temples · viewpoints · diving · restaurants · nightlife · markets · wellness · families · honeymoon · Pig Island guide · Ang Thong guide.
  12. **H2 Koh Samui right now** → live strip: Samui time (ICT) · weather now + today's high/low · tide now and next high/low (Chaweng point) · sea state · THB→EUR/USD rate.
  13. **H2 Koh Samui FAQ** → 10 Q&As (below).
- **Data blocks:** 4 price tiles (THB with currency switch); FMP promo with countdown and date logic (`kp_promo_until`); event rail (CPT, ICT); 6 + 12 product cards; fleet cards (8); villa tabs; live strip (time/weather/tide/sea/FX with server-side fallbacks); FAQ accordion. Alcohol-ban banner auto-shows on holy days (first: Sun 21 Feb 2027).
- **FAQ (exact questions):** 1 What is the best thing to do on Koh Samui this week? · 2 What can I do from Koh Samui while Ang Thong is closed? · 3 How do I get from Koh Samui to the Full Moon Party? · 4 When is the best time to visit Koh Samui? · 5 Which areas of Koh Samui does hotel pickup cover, and which cost extra? · 6 How far ahead should I book a boat trip? · 7 What happens if the weather is bad on my tour day? · 8 Do I need cash on Koh Samui? · 9 Can children join the boat trips? · 10 How do I book a private boat for my group?
- **Money links (internal):** all 6 boat-trip products, FMP shared + private, Half Moon package, `/koh-samui-private-speedboat/`, `/koh-samui-catamaran-charter/`, `/koh-samui-yacht-charter/`, `/koh-samui-villas/` · **Supporting guide links:** `/koh-samui-travel-guide/`, `/koh-samui-weather/`, `/how-to-get-to-koh-samui/`, `/full-moon-party-dates/`, `/koh-samui-events/` · **Sister-site link:** none in the body (footer "Our other sites" only).
- **Images needed:** hero: Ang Thong viewpoint over the islands or Pig Island beach at Koh Madsum (16:9, 2000 px); 6 boat-trip card images (Ang Thong lagoon, big boat deck, VIP speedboat, park bungalow, pigs on Koh Madsum beach, Koh Nang Yuan sandbar); FMP block: Haad Rin party beach at night; fleet: 8 boat photos from the speedboatsamui.com library; 18 guide-card thumbnails (reuse guide heroes). Alt e.g. "Pigs on the beach at Koh Madsum (Pig Island), Koh Samui".
- **Word target:** 2,200 (excluding cards and ticker)
- **Schema:** sitewide `@graph` (Place Koh Samui 9.512, 100.013 → TravelAgency/Organization → WebSite + SearchAction) + `WebPage` + `ItemList` (most-booked products) + `FAQPage`.

#### `/koh-samui-tours/` · D2 · HUB
- **Primary keyword:** koh samui tours · **Secondary:** koh samui day trips · boat tours koh samui · island hopping koh samui · koh samui excursions · best tours in koh samui
- **Title tag:** Koh Samui Tours & Day Trips 2026: Prices & Booking · **Meta description:** Compare every Koh Samui tour we run: Ang Thong from 1,500 THB, Pig Island from 1,450 THB, Koh Tao 2,200 THB and private boats. 48 h free cancellation.
- **H1:** Koh Samui Tours & Day Trips
- **Answer-first lead:** The best day trips from Koh Samui are Ang Thong Marine Park (speedboat 1,800 THB, big boat 1,500 THB, VIP 4,500 THB), Pig Island and Koh Tan from Thong Krut (from 1,450 THB) and Koh Tao with Koh Nang Yuan (2,200 THB). Ang Thong closes 1 November–15 December; Pig Island runs every day of the year. All tours are booked and paid online in THB, with a full refund 48 hours or more before departure.
- **Section outline (H2 → H3):** (twin has ~21 content H2s; keep all 22 here)
  1. **Our Koh Samui tours** → filter chips (Boat trips · Island tours · Water sports · Parties · Private) + product grid (image, title, duration, rating if real, from-price in selected currency, **See the trip**); trust row [TRUST].
  2. **Koh Samui tours: compare and choose** → comparison table (see data blocks), one-line verdict above it: "First visit and calm sea: Ang Thong speedboat; with small kids or in November: Pig Island; clear water and a famous viewpoint: Koh Tao & Nang Yuan."
  3. **Ang Thong Marine Park tours** → H3 Speedboat day tour (1,800, ~8 h) · H3 Big boat (1,500, ~10 h) · H3 VIP (4,500, "only 15 guests on a big speedboat") · H3 Overnight: tent 3,600 / bungalow 4,200 · H3 Private speedboat 33,000/boat. 42 islands, Emerald Lake (Thale Nai), Wua Talab viewpoint; [PARK FEE]; [CLOSURE].
  4. **Pig Island (Koh Madsum) and Koh Tan tours** → H3 shared speedboat 1,450 (4–5 h) · H3 sunset 1,550 (5–6 h, dinner) · H3 longtail 1,750 (~6 h, lunch on Koh Tan) · H3 Pink Dolphins 2,250 (~6 h) · H3 private boats (longtail 5,950 up to 8; speedboat 11,950 up to 10; 3 Islands 8,450; Koh Rap full day 9,950) · H3 Jet Ski Safari 9,950/jet ski. Departs Thong Krut pier (south-west), ~30 min crossing; Madsum fee ~50 THB cash where not included.
  5. **Koh Tao and Koh Nang Yuan day trip** → 2,200 THB speedboat; Nang Yuan fee 250 THB cash; island rules (no plastic bottles, no fins on the island [check]).
  6. **Full Moon and Half Moon party boats** → shared FMP 1,400; private FMP [ask Mea]; Half Moon from 2,700 (Magic Forest nights only); next 3 dates pulled from CPT.
  7. **Private boats and charters** → speedboats from 19,000, catamarans from 20,000, yachts 41,000–255,000 per boat; enquiry → quote → pay link.
  8. **Island activities on Koh Samui** → cards: jungle safari, elephant sanctuary (no riding), zipline, ATV, cooking class, Muay Thai, diving, golf, spa; status "Enquire" until partners are confirmed.
  9. **How to choose the right Koh Samui tour** → 7 bullets pairing traveller type → tour (families with toddlers, non-swimmers, seasickness-prone, couples, groups, photographers, rainy-season visitors).
  10. **Best time of year for boat tours from Koh Samui** → month table summary from O7: Feb–Apr calmest; May–Sep good (Samui sheltered from the SW monsoon); Oct mixed; Nov wettest (445 mm) and Ang Thong closed; Dec improving, Ang Thong reopens 16 Dec; Dec–Feb peak, park quotas, book early.
  11. **Ang Thong closed? What to do 1 November–15 December** → Pig Island (south-west, sheltered from the NE monsoon [check per day]), Koh Tao, private west-coast boats, island activities.
  12. **What's included in our tours** → transfers [PICKUP], boat, guide, snorkel gear, lunch where stated, accident insurance [ask Mea per product], children's life jackets; not included: park fee (300/150), Nang Yuan fee (250), Madsum fee (~50), FMP entry (~200).
  13. **Koh Samui tour prices explained** → adult/child/infant bands [AGES]; child prices [ask Mea]; remote pickup +400 pp return; private boats priced per boat; all prices 2026, charged in THB.
  14. **Why book with us** → 6 bold points: local since 2006 · TAT licence 43/01467 · our own boats and crews where true [ask Mea which tours use own boats] · we cancel when the sea isn't safe · one clear refund policy · WhatsApp support 08:00–20:00 [check].
  15. **Sample tour plans for 3, 5 and 7 days** → H3 3 days · H3 5 days · H3 7 days (each a bulleted plan linking products; one sea day, one rest day, one island activity).
  16. **Tips for boat tours from Koh Samui** → 7 bullets: seasickness tablets 30–60 min before, reef-safe sunscreen, water shoes for coral sand, dry bag, cash for island fees, no drones on Nang Yuan, morning departures calmer.
  17. **Responsible tours** → no feeding junk food to the Pig Island pigs [check wording with Mea], reef etiquette, no touching coral, refill bottles.
  18. **Piers and pickup** → Thong Krut (Pig Island), Ang Thong departure pier [ask Mea], Koh Tao departure pier [ask Mea], FMP pier [ask Mea]; pickup windows; Google Maps "Get directions" for each pier.
  19. **Packing checklist** → 8 items.
  20. **How booking works** → 3-step strip: choose date and guests → pay securely in THB → confirmation by email/WhatsApp + pickup time the evening before; [CUTOFF].
  21. **Staying on Koh Phangan?** → one line + sister-site link to kohphangan.com tours (Phangan departures).
  22. **Koh Samui tours FAQ** → 12 Q&As.
- **Data blocks:** product grid with chips; comparison table (columns: Tour · Duration · Boat · From price (THB) · Not included (cash) · Best for · Runs in Nov?) covering Ang Thong speedboat / big boat / VIP / overnight / private, Pig Island speedboat / longtail / sunset / private, Koh Tao; month-by-month sea table (Jan–Dec: sea verdict, Ang Thong open?, best trip); sea-state card; "How booking works" 3 steps; related guides rail.
- **FAQ (exact questions):** 1 What are the best tours from Koh Samui? · 2 How much do Koh Samui tours cost in 2026? · 3 Do your tours include hotel pickup? · 4 Which tours run in November and early December? · 5 Ang Thong speedboat or big boat: which is better? · 6 Are the boat trips suitable for children and toddlers? · 7 Can I join a snorkelling tour if I can't swim? · 8 What happens if the sea is too rough on my tour day? · 9 How do I cancel and how much do I get back? · 10 Can I book a tour for tomorrow? · 11 Do you offer private tours for families and groups? · 12 What cash do I need to bring on the day?
- **Money links (internal):** every product in menu 1 + charter hubs · **Supporting guide links:** `/ang-thong-speedboat-vs-big-boat/`, `/ang-thong-marine-park/`, `/pig-island-koh-samui/`, `/koh-samui-sea-conditions/`, `/koh-samui-weather/` · **Sister-site link:** kohphangan.com `/koh-phangan-tours/` (for guests based on Phangan).
- **Images needed:** hero (speedboat in Ang Thong archipelago); one image per product family (Ang Thong lagoon, Pig Island pigs, Koh Tao sandbar, FMP boat at night, private speedboat, catamaran); Thong Krut pier; kayakers in Ang Thong; family with life jackets on board (no identifiable faces without consent). 10 images.
- **Word target:** 3,200 (twin ~2,900)
- **Schema:** S-HUB (`ItemList` of `Product`/`TouristTrip` with offers in THB) + `FAQPage`.

#### `/activities/` · D4 (hub-pillar) · HUB
- **Primary keyword:** things to do in koh samui · **Secondary:** koh samui activities · koh samui attractions · what to do in koh samui · koh samui rainy day activities · koh samui with kids
- **Title tag:** Things to Do in Koh Samui: 45 Ideas by Type (2026) · **Meta description:** 45 things to do on Koh Samui, checked in 2026: boat trips, beaches, waterfalls, temples, viewpoints, markets and ethical animal visits, with prices and a map.
- **H1:** Things to Do in Koh Samui (2026): 45 Ideas by Type, Area and Season
- **Answer-first lead:** The top things to do on Koh Samui are a boat day to Ang Thong Marine Park (Dec–Oct) or Pig Island (all year), the Big Buddha and Wat Plai Laem, Na Muang Waterfall, Hin Ta & Hin Yai, the Friday Fisherman's Village Walking Street and a Muay Thai night in Chaweng. Most sights are free; boat trips start at 1,450 THB. Keep the final count to what is verified at writing time [check "45"].
- **Section outline (H2 → H3):**
  1. **Map of things to do on Koh Samui** → Leaflet split view, chips: On the water · Beaches · Temples · Waterfalls · Viewpoints · Adventure · Food & markets · Nightlife · Wellness · Kids.
  2. **Top 10 at a glance** → table (see data blocks).
  3. **Boat trips and islands** → H3 Ang Thong · H3 Pig Island & Koh Tan · H3 Koh Tao & Nang Yuan · H3 private boats & sunset cruises (→ products).
  4. **Beaches worth the trip** → H3 Choeng Mon · Chaweng North · Silver Beach · Lamai · Lipa Noi (toddlers) · Taling Ngam (sunset) (facts from O14; → `/koh-samui-beaches/`).
  5. **Temples and culture** → H3 Big Buddha (free, 07:00–18:30) · Wat Plai Laem (18-armed Guanyin) · Wat Khunaram mummified monk (dress code) · Laem Sor Pagoda · Red Temple (Wat Ratchathammaram) · Guan Yu shrine (16 m bronze).
  6. **Waterfalls and viewpoints** → H3 Na Muang 1 (pool, free, parking 20/60) · Na Muang 2 (20–40 min climb) · Hin Lad (~2 h round trip) · Lad Koh viewpoint (wave warning, Nov 2024 incident) · Overlap Stone (~300 THB [check]) · Secret Buddha Garden (80–100 THB [check]; 4x4 road). Note: falls thin Feb–Apr.
  7. **Adventure on land** → H3 4x4 jungle safari (~1,700 market) · zipline (~1,590) · ATV (~1,490) · hiking to Khao Pom area [check trail].
  8. **Animals: ethical choices only** → no-riding/no-bathing elephant visits; never elephant riding; skip chained-elephant feeding at Overlap Stone; legacy zoos/aquarium/snake farm/butterfly garden not listed as open (O11 list).
  9. **Water sports** → diving (Sail Rock from ~4,650), snorkelling, kayak/SUP (Coral Cove ~300/h), kitesurfing [check season], jet ski (rules and scams), fishing.
  10. **Food, markets and cooking** → Fisherman's Village Fri (~17:00–23:00), Chaweng Walking Street Thu–Sat, Lamai and Nathon night markets daily, Hua Thanon fish market mornings; wai khua; Baan Suan Lung Khai (Bib Gourmand 2026, booking needed); cooking classes.
  11. **Nightlife and shows** → Muay Thai stadium nights (1,500/2,000/2,500), beach-club fire shows, Full Moon Party trip from Samui.
  12. **Wellness** → Thai massage 300–500 THB/h (Chaweng 400–600), resort spas, yoga and retreats, golf (Santiburi 5,600 / 18 holes).
  13. **Things to do with kids** → Choeng Mon, Lipa Noi, Pig Island, Na Muang 1, Big Buddha, life jackets provided on our boats.
  14. **Rainy-day and November ideas** → cooking class, spa, Muay Thai training, temples, Central Samui; Pig Island when sea allows; markets "weather permitting".
  15. **Free things to do** → 10 bullets (temples, viewpoints, beaches, markets).
  16. **What to skip (and what has closed)** → elephant riding; unverified attractions (Aquarium & Tiger Zoo, Butterfly Garden, Coco Splash, Snake Farm, Namuang Safari Park, Overlap Stone 2: "not listed until we confirm they are open"); jet ski rental scams.
  17. **Koh Samui things to do FAQ** → 10 Q&As.
- **Data blocks:** Leaflet map (≥45 POIs from `samui-poi.json`); top-10 table (columns: Thing to do · Area · Cost (2026) · Time needed · Best time · Kids?); "By season" mini-table (Feb–Apr / May–Sep / Oct–Dec: best activities); weather widget in sidebar; sidebar booking card (Pig Island, Ang Thong, Koh Tao).
- **FAQ (exact questions):** 1 What is Koh Samui best known for? · 2 What can I do on Koh Samui for free? · 3 What are the best things to do on Koh Samui with kids? · 4 What can I do on Koh Samui when it rains? · 5 Is Ang Thong worth it from Koh Samui? · 6 Are there ethical elephant experiences on Koh Samui? · 7 How many days do I need to see Koh Samui? · 8 What is there to do at night on Koh Samui? · 9 Can I do a day trip from Koh Samui to Khao Sok? · 10 Do I need a scooter to see the island?
- **Money links (internal):** Ang Thong speedboat, Pig Island speedboat, Koh Tao day trip, `/koh-samui-private-speedboat/`, `/koh-samui-jungle-safari/` · **Supporting guide links:** `/places/`, `/koh-samui-beaches/`, `/koh-samui-waterfalls/`, `/koh-samui-temples/`, `/koh-samui-itinerary/` · **Sister-site link:** none.
- **Images needed:** Big Buddha; Wat Plai Laem Guanyin; Na Muang 1 pool; Hin Ta rock; Fisherman's Village Friday market; Ang Thong viewpoint; Pig Island; Muay Thai ring (no identifiable fighter close-ups without permission); Lad Koh viewpoint; Thai massage on the beach; Choeng Mon bay; cooking class ingredients. 12 images.
- **Word target:** 4,000 (pillar)
- **Schema:** S-GUIDE + `ItemList` of `TouristAttraction` with `geo`.

#### `/places/` · D4 (map hub) · HUB
- **Primary keyword:** places to visit in koh samui · **Secondary:** koh samui map · koh samui sightseeing · koh samui areas · koh samui landmarks · koh samui attractions map
- **Title tag:** Places to Visit in Koh Samui: Map of 120+ Spots (2026) · **Meta description:** Interactive Koh Samui map with 120+ beaches, temples, waterfalls, viewpoints, piers and areas, each with GPS, opening hours, entry fees and directions.
- **H1:** Places to Visit on Koh Samui: Interactive Map and Area Guide (2026)
- **Answer-first lead:** Koh Samui is 228.7 km² with a ~51 km ring road (Route 4169) that takes about 90 minutes to drive non-stop, so you can reach any sight in under an hour from Chaweng. The north and east (Chaweng, Bophut, Choeng Mon) hold the busy beaches and the Big Buddha; the south has Hin Ta & Hin Yai and Thong Krut pier for Pig Island; the west has the quiet sunset coast and Nathon.
- **Section outline (H2 → H3):**
  1. **Koh Samui map: every place on one page** → full map, chips by type and by coast; list rows link to each place page.
  2. **How the island is laid out** → ring road 4169, connectors 4170 (SW, steep) and 4171 (NE); 7 tambons; drive times from Chaweng (table).
  3. **Areas and beaches by coast** → H3 East: Chaweng, Chaweng Noi, Lamai, Silver Beach, Coral Cove · H3 North-east: Choeng Mon, Tongson Bay, Plai Laem, Bang Rak · H3 North: Bophut/Fisherman's Village, Maenam · H3 West: Nathon, Lipa Noi, Taling Ngam · H3 South: Bang Kao, Thong Krut, Hua Thanon (one card each → place page).
  4. **Temples and shrines** → cards: Big Buddha, Wat Plai Laem, Wat Khunaram, Red Temple, Laem Sor, Guan Yu, Chinese Temple of Guanyin (Taling Ngam), Wat Samret; dress code line.
  5. **Waterfalls and nature** → Na Muang 1 & 2, Hin Lad, Secret Buddha Garden.
  6. **Viewpoints** → Lad Koh, Overlap Stone, Khao Hua Jook Chedi, Chaweng Lake viewpoint [check GPS].
  7. **Islands off Koh Samui** → Koh Madsum (Pig Island), Koh Tan, Koh Rap, Ang Thong, Koh Phangan, Koh Tao (→ products).
  8. **Piers and getting on the water** → Nathon, Lipa Noi (Raja), Bangrak piers (Lomprayah, Seatran, Petcherat Marina: "several piers share the name; check your ticket"), Big Buddha pier (Haad Rin Queen), Maenam (Pralarn), Thong Krut, Bophut [GPS check each].
  9. **Practical places** → airport (USM), hospitals (5), Tourist Police (1155), immigration office (Maenam, moved from Nathon in 2016), Central Samui.
  10. **Places that have closed or are unverified** → O11 list; "we list them again only after a phone check".
  11. **Getting between places** → Grab coverage thin west; songthaews 30–80 THB local fares, stop ~20:00–22:00; scooters 150–350/day, IDP motorcycle category, helmet fine up to 2,000 THB.
  12. **Places FAQ** → 8 Q&As.
- **Data blocks:** Leaflet map ≥120 POIs, clustering >25, numbered list, category colours, popups (photo, one line, **Get directions**, "See guide →"); drive-time table from Chaweng (columns: Place · km · minutes · Grab/taxi range [check]); place cards grid (photo, area, entry fee, hours).
- **FAQ (exact questions):** 1 How long does it take to drive around Koh Samui? · 2 Which part of Koh Samui is best to visit? · 3 What are the must-see places on Koh Samui? · 4 Where is the Big Buddha and is it free? · 5 Which beaches are best for swimming? · 6 Where do Pig Island boats leave from? · 7 What should I wear to visit temples? · 8 Are the waterfalls worth visiting in the dry season?
- **Money links (internal):** Pig Island speedboat, Ang Thong speedboat, `/koh-samui-jungle-safari/`, `/koh-samui-private-speedboat/` · **Supporting guide links:** `/activities/`, `/koh-samui-beaches/`, `/getting-around-koh-samui/`, `/where-to-stay-koh-samui/` · **Sister-site link:** none.
- **Images needed:** aerial of the island coastline [licensed]; one thumbnail per area (13); Big Buddha; Na Muang; Lad Koh; Thong Krut pier. Reuse place-page heroes (max two uses each).
- **Word target:** 2,500
- **Schema:** S-HUB + `ItemList` of `TouristAttraction`/`Beach`/`PlaceOfWorship` with `geo`.

#### `/koh-samui-travel-guide/` · D4 (index hub) · HUB
- **Primary keyword:** koh samui travel guide · **Secondary:** koh samui guide 2026 · koh samui travel tips · plan a trip to koh samui · koh samui information · first time in koh samui
- **Title tag:** Koh Samui Travel Guide 2026: Plan Your Trip · **Meta description:** Local Koh Samui travel guide, updated for 2026: getting here, weather by month, where to stay, visas (30 days visa-free), money, safety, beaches and tours.
- **H1:** Koh Samui Travel Guide (2026): Everything You Need to Plan Your Trip
- **Answer-first lead:** Koh Samui is Thailand's second-largest island (228.7 km², Surat Thani province), reached by ~1h05 flights from Bangkok (Bangkok Airways, 2,800–6,800 THB one way) or by ferry from Donsak (~1.5 h). The best weather and calmest sea are February–April; the rainy season is October–December, peaking in November. Most visitors get 30 days visa-free since 15 September 2026.
- **Section outline (H2 → H3):** (index hub; the deep content lives in each child guide)
  1. **Koh Samui at a glance** → fact box: area, population ~70,000 registered, highest point Khao Pom 635 m, ring road ~51 km, airport USM, currency THB, time ICT (UTC+7), emergency numbers 1155/191/1669/199, plugs [check type], tap water not drinkable [check].
  2. **What's changed in 2026** → 30-day visa exemption from 15 Sep 2026; TDAC still mandatory (free, tdac.immigration.go.th); entry fee proposed (450 THB) but not collected as of {date}; alcohol sales 11:00–24:00 since 29 May 2026; helmet fine up to 2,000 THB; cannabis prescription-only, no public smoking; vapes illegal.
  3. **Plan your trip** → H3 cards: getting here · airport · Bangkok · Surat Thani · Phangan · Koh Tao · Phuket/Krabi · where to stay · itinerary · weather · budget.
  4. **Getting around** → cards: taxis & Grab · roads · scooters · car rental · bicycles.
  5. **Beaches and nature** → cards: beaches · snorkelling · diving · waterfalls · hiking · sunset spots · temples · islands nearby · tides · sea conditions.
  6. **Places to go** → area cards (Chaweng, Lamai, Bophut, Maenam, Choeng Mon, Nathon …) → `/places/`.
  7. **Nightlife and festivals** → cards: nightlife, beach clubs, FMP from Samui, FMP dates, party calendar, Songkran, Loy Krathong, CNY, Christmas & NYE, Regatta, Muay Thai nights.
  8. **Food, shopping and culture** → restaurants, markets, walking streets, Central Samui, culture.
  9. **Wellness** → yoga, retreats, spa, golf.
  10. **Health and safety** → hospitals, Tourist Police, sea safety (rip currents Oct–Dec east coast; box jellyfish: 9 of Thailand's 10 recorded deaths since 2002 off Samui/Phangan; vinegar 30 s+), precautions.
  11. **Visas, money and connectivity** → visa guide, extensions (TM.7, 1,900 THB, Maenam office), insurance, ATMs (220–250 THB fee; decline DCC), SIM (AIS/True; 8 d 499 · 15 d 699 · 30 d 1,199 THB).
  12. **Living and working** → phase-2 cards [ask Mea: launch or phase 2].
  13. **Koh Samui vs Koh Phangan vs Koh Tao** → 3-line verdict + link to D11 page.
  14. **Travel guide FAQ** → 8 Q&As.
- **Data blocks:** at-a-glance fact box; "what's changed" callout with dated stamps; guide card grids (kpa-rel style) by group; month strip (12 mini tiles: rain mm, sea verdict, Ang Thong open?); weather + time widget; sidebar booking card.
- **FAQ (exact questions):** 1 Is Koh Samui worth visiting in 2026? · 2 How many days should I spend on Koh Samui? · 3 What is the best month to visit Koh Samui? · 4 How do I get to Koh Samui from Bangkok? · 5 Do I need a visa for Koh Samui? · 6 Is Koh Samui expensive? · 7 Is Koh Samui safe? · 8 Which is better, Koh Samui or Koh Phangan?
- **Money links (internal):** `/koh-samui-tours/`, Pig Island speedboat, Ang Thong speedboat, `/koh-samui-villas/` · **Supporting guide links:** every child guide (hub links to all children) · **Sister-site link:** kohphangan.com (in the "Koh Samui vs Koh Phangan" section only).
- **Images needed:** hero (Chaweng Bay from Lad Koh or the north coast at sunset); 12 group thumbnails; map thumbnail of the island. 14 images.
- **Word target:** 2,500 (index hub; the full pillar text lives in the child guides)
- **Schema:** `CollectionPage` + `ItemList` (child guides) + `BreadcrumbList` + `FAQPage`.

#### `/koh-samui-events/` · D6 · HUB
- **Primary keyword:** koh samui events · **Secondary:** koh samui events this week · what's on koh samui · koh samui parties · koh samui festivals 2026 · koh samui night markets
- **Title tag:** Koh Samui Events & Parties This Week (2026–2027) · **Meta description:** What's on in Koh Samui: parties, markets, Muay Thai nights, festivals and Full Moon boats, updated weekly. Filter by today, tomorrow or this weekend.
- **H1:** Koh Samui Events and Parties: What's On (2026–2027)
- **Answer-first lead:** This page lists what's on in Koh Samui today, tomorrow and this weekend, from the Friday Fisherman's Village Walking Street to Muay Thai nights (no fights on Thursdays) and party boats to Koh Phangan. The next big dates are Loy Krathong and the Full Moon Party on Tuesday 24 November 2026, Christmas Eve FMP on 24 December and New Year's Eve on 31 December. Listings are checked every Monday.
- **Section outline (H2 → H3):** (sticky anchor nav: What's on · Big events · Party boats · Party tips · FAQ)
  1. **What's on in Koh Samui** → chips All · Live now · Today · Tomorrow · This weekend · Party · Market · Live Music · Festival · Community (+ Sport · Muay Thai · Culture from the CPT); `kp-ev-card` list; **Show more events**.
  2. **Every week on Koh Samui** → 7-day table from O10 (Mon–Sun) with markets, Muay Thai and beach-club nights; "weather permitting" in Nov–Dec.
  3. **The big Koh Samui events** → H3 Full Moon Party from Samui · H3 Loy Krathong (24 Nov 2026) · H3 Christmas & NYE · H3 Chinese New Year (6 Feb 2027) · H3 Songkran (13–15 Apr 2027) · H3 Samui Regatta (22–29 May 2027) · H3 Muay Thai fight nights (each 80–120 words + link to evergreen page).
  4. **Party boats from Koh Samui** → FMP shared 1,400 / private [ask Mea] / Half Moon from 2,700; next dates; **Book your seat**.
  5. **Koh Phangan parties you can reach from Samui** → Half Moon (Ban Tai), Jungle Experience (night before FMP; 20+ with ID), Waterfall Party; we sell boats, not entry (except Half Moon packages, at the organiser's price).
  6. **Holy days and alcohol rules** → sales 11:00–24:00 since 29 May 2026; ban days 2027: 21 Feb, 20 May, 18–19 Jul [check], ~15 Oct [check]; hotels and licensed bars may still serve; 7-Eleven can't; drinking age 20.
  7. **Party tips** → H3 Getting there and back · H3 Stay safe (drink spiking, unlicensed transport; FCDO warnings; never swim drunk; red flags) · H3 Where to stay · H3 The day after (Pig Island sunset trip).
  8. **Sports and community events** → Neon Run (~late May [check]), Samui Half Marathon (~Jun [check]), Beach Volleyball (~late Mar [check]), Samui Trail (~Nov [check]), Santa Run (~mid-Dec [check]), Red Cross Fair (~Feb [check]); marked "Provisional – confirm locally".
  9. **Koh Samui events FAQ** → 10 Q&As.
  10. **Party at night, the sea by day** → CTA block: Pig Island, Ang Thong (Dec–Oct), private speedboat.
- **Data blocks:** events feed with ICT filters and auto-expiry; weekly table; big-events timeline (Nov 2026–Dec 2027); alcohol-ban banner; "Add to calendar" per card; FMP countdown chip.
- **FAQ (exact questions):** 1 What's on in Koh Samui this weekend? · 2 When is the next Full Moon Party and how do I get there from Samui? · 3 Which night is the Fisherman's Village Walking Street? · 4 Which nights are Muay Thai fights on Koh Samui? · 5 Are there parties on Koh Samui itself? · 6 Is alcohol sold on Buddhist holidays? · 7 Can I release a sky lantern at Loy Krathong on Samui? · 8 Do I need to buy party tickets in advance? · 9 Are markets on in the rainy season? · 10 Where do these listings come from and how often are they checked?
- **Money links (internal):** FMP shared, FMP private, Half Moon package, Pig Island sunset, `/koh-samui-private-speedboat/` · **Supporting guide links:** `/full-moon-party-dates/`, `/koh-samui-party-calendar-2026-2027/`, `/koh-samui-nightlife/`, `/koh-samui-markets/` · **Sister-site link:** kohphangan.com `/koh-phangan-events/` (Phangan-side listings).
- **Images needed:** hero (Fisherman's Village Walking Street at dusk); Loy Krathong krathong on water (banana-leaf); Songkran on Chaweng Beach Road; NYE fireworks over Chaweng; Regatta yachts off Chaweng; Muay Thai ring; Haad Rin FMP beach; CNY lion dance in Maenam. 8 images + CPT posters.
- **Word target:** 2,000 (parity floor, P0.2; was 1,600 editorial (twin ~700) + listings)
- **Schema:** `CollectionPage` + `ItemList` of `Event` + `BreadcrumbList` + `FAQPage`.

#### `/koh-samui-villas/` · D7 · HUB
- **Primary keyword:** koh samui villas · **Secondary:** villas for rent koh samui · pool villa koh samui · koh samui long term rental · private villa koh samui · koh samui villa with chef [check demand]
- **Title tag:** Koh Samui Villas for Rent 2026: Holiday & Long-Term · **Meta description:** Pool villas for rent on Koh Samui: holiday stays with nightly prices and long-term villas from 6 months. Map by area, honest road tips and a local team.
- **H1:** Villas for rent in Koh Samui
- **Answer-first lead:** We list holiday pool villas you can book by the night and long-term villas from six months, in Chaweng Noi, Choeng Mon, Bophut, Plai Laem, Maenam, Lamai and the sunset west coast. Peak season (mid-December to mid-January, plus July–August) books out early; steep concrete roads up to hillside villas are common, so check access before you book.
- **Section outline (H2 → H3):**
  1. **Villas for rent, holiday and long-term** → tabs All stays · Holiday · Long-term; filters (area, bedrooms 2+/3+/4+, sort); map with Map/Satellite toggle and price pins; cards [ask Mea: villa list, photos, prices, availability source].
  2. **What a Koh Samui villa costs** → indicative ranges only once our listings exist; mark market context [check]: pool villas from ~1,200–2,500 THB budget (Maenam) to 7,000–20,000+ luxury; peak +30–80%.
  3. **Best areas for a villa on Koh Samui** → H3 Chaweng Noi & Choeng Mon (calm bay, 5–10 min to airport) · H3 Bophut & Plai Laem (restaurants, Friday market; beach not for swimming) · H3 Maenam (quiet, value) · H3 Lamai (value, sunrise) · H3 Taling Ngam & Lipa Noi (sunsets, 40–50 min to airport) · H3 Bang Kao & the south (quiet, wellness).
  4. **Tips for renting a villa** → H3 Book early for high season · H3 Check the road (steep concrete hills; scooters struggle in rain) · H3 Ask what's included (electricity per unit [ask Mea typical rate], water, cleaning, pool, Wi-Fi, linen) · H3 Check the deposit and cancellation terms · H3 Transport (car often needed on hillsides; Grab thin on the west) · H3 Plan your days out.
  5. **Long-term rentals: how it works** → min. 6 months, monthly rent on request, contract and deposit norms [ask Mea], visa reality (30-day exemption; DTV option; link visa guide).
  6. **How booking works** → holiday: **Book this villa** (dates → pay in THB); long-term: **Enquire** → shortlist on WhatsApp → viewing/video call → contract.
  7. **Koh Samui villas FAQ** → 8 Q&As.
  8. **Staying in a villa? Add a day on the water** → Ang Thong, Pig Island, private speedboat (villa pickup from most areas).
- **Data blocks:** villa map (Leaflet, Map/Satellite toggle, price pins); filter tabs; villa cards (photo, area, bedrooms, pool, sea view, m², price/night or "Monthly rent on request · min. 6 months"); area comparison table (Area · Suits · Airport time · Beach swimming · Honest downside); sidebar "Get a villa shortlist on WhatsApp".
- **FAQ (exact questions):** 1 How do I book a villa on Koh Samui? · 2 Can I rent a villa on Koh Samui by the month? · 3 Which area is best for a villa on Koh Samui? · 4 What is usually included in the villa price? · 5 How much is electricity in a Samui villa? · 6 Do I need a car if I stay in a hillside villa? · 7 When should I book a villa for Christmas and New Year? · 8 Can you arrange tours, boats and airport transfers for my villa stay?
- **Money links (internal):** villa listings, Ang Thong speedboat, Pig Island speedboat, `/koh-samui-private-speedboat/` · **Supporting guide links:** `/where-to-stay-koh-samui/`, `/koh-samui-roads/`, `/koh-samui-car-rental/`, `/thailand-visa-guide/` · **Sister-site link:** kohphangan.com `/koh-phangan-villas/` (for guests comparing islands).
- **Images needed:** hero (pool villa with sea view, owner/partner photo, unwatermarked); 6 area thumbnails (Choeng Mon, Bophut, Maenam, Lamai, Taling Ngam sunset, Bang Kao); steep villa road (honest tip); villa interior. All villa photos need partner permission, no watermarks. 9+ images.
- **Word target:** 1,500 (twin ~1,000)
- **Schema:** `CollectionPage` + `ItemList` of `Accommodation`/`LodgingBusiness` (offers only when bookable) + `BreadcrumbList` + `FAQPage`.

#### `/koh-samui-retreats/` · D8 · HUB
- **Primary keyword:** koh samui retreats · **Secondary:** wellness retreat koh samui · yoga retreat koh samui · detox retreat koh samui · meditation retreat koh samui · yoga teacher training koh samui
- **Title tag:** Koh Samui Retreats 2026: Yoga, Detox & Wellness · **Meta description:** Compare Koh Samui yoga, detox, meditation and wellness retreats by length, price and area. Hand-picked hosts, booked through our local team since 2006.
- **H1:** Koh Samui Retreats: Yoga, Detox, Meditation and Wellness (2026)
- **Answer-first lead:** Koh Samui is best known for full-service wellness resorts on the quiet south-east and north-east coasts, plus cliffside yoga between Chaweng Noi and Coral Cove. Expect 3–7-night programmes priced in the tens of thousands of baht [check per listing]; the best weather is February–April, and October–December is the rainy season. We only list retreats we can book or enquire for.
- **Section outline (H2 → H3):** (anchors #yoga #meditation #detox #healing #ttc)
  1. **Find your Koh Samui retreat** → filter tabs All · Yoga · Meditation · Detox · Healing · Teacher training; cards (area, type · nights, title, one line, rating if real, host, from-price THB, **View retreat**). [ask Mea: which hosts we sell, deposit model].
  2. **Compare retreats side by side** → table (Retreat · Type · Length · Dates · From (THB) · Area · Book/Enquire).
  3. **Yoga retreats** (#yoga) → what to expect, styles, typical day.
  4. **Meditation retreats** (#meditation) → silent vs guided; temple-based options [check].
  5. **Detox and wellness programmes** (#detox) → fasting/juice, medical screening, contraindications line.
  6. **Healing and spa retreats** (#healing) → spa-led programmes; Thai massage training.
  7. **Yoga teacher training** (#ttc) → 200 h formats [check offers]; visa note (DTV "soft power" track covers some courses [check]).
  8. **Where the retreats are** → south-east (Laem Set/Na Mueang), north-east (Choeng Mon/Bophut), cliffside Chaweng Noi–Coral Cove, Lamai hills; airport times.
  9. **When to go** → Feb–Apr driest; Oct–Dec wettest (Nov 445 mm); indoor shalas make retreats work year-round.
  10. **How booking works** → [ask Mea: carry over kohphangan.com's "deposit online, balance at the retreat, free cancellation within 72 h of booking" model? It conflicts with the single 48 h policy in A4.3; decide before launch].
  11. **Getting to your retreat and visas** → USM airport, transfer times; 30-day exemption, extension 30 days (1,900 THB), DTV for long stays.
  12. **Retreat FAQ** → 9 Q&As.
- **Data blocks:** filterable cards; comparison table; location map (retreat pins, no outbound links); sidebar "Help me choose" (WhatsApp); trust points (local since 2006, hand-picked hosts, WhatsApp support).
- **FAQ (exact questions):** 1 Do I need any yoga experience to join a retreat? · 2 How much does a wellness retreat on Koh Samui cost? · 3 What is the best month for a retreat on Koh Samui? · 4 Which area of Koh Samui is best for a retreat? · 5 Are meals and transfers included? · 6 Can I do a detox programme with a medical condition? · 7 How do deposits and cancellations work? · 8 Can I combine a retreat with tours or a boat day? · 9 What visa do I need for a month-long retreat or teacher training?
- **Money links (internal):** retreat listings, Pig Island sunset, `/koh-samui-spa/`, `/koh-samui-villas/` · **Supporting guide links:** `/thailand-visa-guide/`, `/koh-samui-weather/`, `/where-to-stay-koh-samui/` · **Sister-site link:** kohphangan.com `/koh-phangan-retreats/` (Phangan has the larger retreat scene).
- **Images needed:** hero (yoga shala with sea view, host permission); 5 category images; south-east coast; spa treatment room; healthy food plate. 8 images, all with host permission.
- **Word target:** 2,400 (twin ~2,300)
- **Schema:** `CollectionPage` + `ItemList` of `Product`/`Event` (dated retreats as `Event`, open-ended as `Product`) + `BreadcrumbList` + `FAQPage`.

#### `/koh-samui-news/` · D9 · HUB
- **Primary keyword:** koh samui news · **Secondary:** koh samui news today · samui news 2026 · thailand travel news koh samui · koh samui updates
- **Title tag:** Koh Samui News 2026: Travel Updates & Island Stories · **Meta description:** Koh Samui news in plain English: visa rules, ferry and airport changes, weather warnings, Ang Thong closures and events, checked against official sources.
- **H1:** Koh Samui News
- **Answer-first lead:** Short, factual updates for people visiting or living on Koh Samui: entry rules, transport, weather and sea warnings, park closures and events, written in our own words from official or primary reporting. Each story links to the evergreen guide it affects.
- **Section outline (H2 → H3):**
  1. **Latest stories** → news posts, newest first (date, category chip, 1-line summary, "Source checked: {date}" note without outbound link except official government pages).
  2. **Travel rules and visas** → category rail.
  3. **Weather, sea and safety** → category rail (red flags, storms, ferry suspensions).
  4. **Transport** → airport expansion (gates 7 → 11, construction from Q2 2026, completion 2030), ferries, roads.
  5. **Events and festivals** → rail.
  6. **Background guides** → 8 evergreen cards (visa guide, weather, sea conditions, how to get here, safety, tides, events, Ang Thong guide).
  7. **How we report** → editorial policy: official/primary sources, own words, corrections email `info@{{DOMAIN}}`, no third-party feeds.
  8. **News FAQ** → 6 Q&As.
- **Launch backlog (6 posts, 400–800 words, `NewsArticle`):** (1) Thailand cuts visa-free stay to 30 days from 15 Sep 2026 · (2) Ang Thong Marine Park closes 1 Nov–15 Dec 2026: what runs instead · (3) Alcohol sales now 11:00–24:00: what changed on 29 May 2026 · (4) Thailand's 450 THB tourist fee: proposed, not collected (status {date}) · (5) Loy Krathong and the Full Moon Party fall on the same night: 24 Nov 2026 · (6) Samui Airport expansion: what the 2030 timeline means.
- **Data blocks:** post list with category chips; "Updated" stamps; homepage news card feed; no external embeds.
- **FAQ (exact questions):** 1 How often is Koh Samui news updated here? · 2 Where does your news come from? · 3 Is the visa-free stay for Thailand still 60 days? · 4 Is there a tourist entry fee for Thailand now? · 5 When does Ang Thong Marine Park close? · 6 How do I report a correction?
- **Money links (internal):** Pig Island speedboat, Koh Tao day trip, Ang Thong speedboat (in closure stories) · **Supporting guide links:** `/thailand-visa-guide/`, `/koh-samui-sea-conditions/`, `/koh-samui-events/`, `/koh-samui-weather/` · **Sister-site link:** none.
- **Images needed:** hero (Nathon pier/waterfront); category images (airport terminal, ferry at sea, red flag on Chaweng beach, Ang Thong); one licensed image per launch post. 10 images.
- **Word target:** 900 (hub) + 6 × 400–800 posts
- **Schema:** `CollectionPage` + `ItemList` of `NewsArticle` + `BreadcrumbList` + `FAQPage`; each post `NewsArticle` (`datePublished`, `dateModified`, author, publisher).

---

#### P1.1 Boat trips: Ang Thong Marine Park (all carry [CLOSURE], [CXL-AT], [PARK FEE], [PICKUP], [AGES])

#### `/product/ang-thong-marine-park-day-tour-koh-samui/` · D3 · MONEY
- **Primary keyword:** ang thong marine park tour from koh samui · **Secondary:** ang thong speedboat tour · ang thong day trip koh samui · ang thong national park tour · emerald lake ang thong · ang thong snorkelling tour
- **Title tag:** Ang Thong Marine Park Tour from Koh Samui 2026 | 1,800 THB · **Meta description:** Speedboat day tour to Ang Thong Marine Park from Koh Samui: Emerald Lake, Wua Talab viewpoint, kayaking, snorkelling and lunch. 1,800 THB, book online.
- **H1:** Ang Thong Marine Park Day Tour from Koh Samui (Speedboat)
- **Answer-first lead:** A full day (~8 hours) by speedboat to Ang Thong National Marine Park, 42 islands west of Samui: the Emerald Lake on Koh Mae Ko, the viewpoint on Koh Wua Talab, kayaking, snorkelling and lunch. 1,800 THB per adult in 2026, hotel pickup from most areas of Koh Samui; the 300 THB park fee is paid in cash at the park. The park is closed 1 November–15 December; the next departures start 16 December.
- **Section outline (H2 → H3):**
  1. **Ang Thong speedboat tour at a glance** → facts table (data blocks).
  2. **Why go to Ang Thong Marine Park** → 42 islands, park ~102 km² (islands ~18 km²) [check], HQ on Koh Wua Talab; limestone cliffs, enclosed saltwater lagoon (Thale Nai); park quotas Dec–Feb, so book early.
  3. **Itinerary: your day in the park** → timeline: 07:30–08:30 hotel pickup · ~09:00 pier briefing and departure · Koh Mae Ko and the Emerald Lake viewpoint (stairs [check count/time]; no swimming in the lake [check]) · Koh Wua Talab viewpoint (steep stairs ~20–30 min up [check]), beach time · kayaking · snorkelling stop (Koh Wao [ask Mea]) · lunch (location [ask Mea]) · ~16:00–16:30 back at the pier · 16:30–17:00 hotel drop-off. [ask Mea: our exact stop order]
  4. **Speedboat, big boat or VIP?** → mini comparison (speedboat 1,800 / ~8 h; big boat 1,500 / ~10 h, more deck space, slower; VIP 4,500, "only 15 guests on a big speedboat"); link `/ang-thong-speedboat-vs-big-boat/`.
  5. **What's included and not included** → included [ask Mea to confirm list]: transfers (from most areas), speedboat, English-speaking guide, lunch, fruit, water and soft drinks, snorkel gear, kayak, accident insurance, children's life jackets · not included: park fee (cash 300 adult / 150 child), remote-area transfer (+400 pp return), towels [check], tips.
  6. **Pickup areas and departure pier** → [PICKUP]; pickup-area list; departure pier [ask Mea] with **Get directions**; "meet at the pier" option [ask Mea].
  7. **What to bring** → swimwear, towel, reef-safe sunscreen, hat, sunglasses, water shoes or grippy sandals for the viewpoint stairs, dry bag, cash for park fee, seasickness tablets.
  8. **Good to know** → speedboats are fast and bumpy in swell (back pain, pregnancy: not recommended [ask Mea policy]); viewpoints are steep: not suitable for limited mobility; non-swimmers stay on the boat/beach with a life jacket; tours run only in safe sea conditions.
  9. **When to go: seasons and the November closure** → Feb–Apr calmest, May–Sep good, Oct mixed; [CLOSURE]; ad-hoc storm closures possible (e.g. Jan 2019).
  10. **Prices 2026** → table (data blocks).
  11. **Cancellation policy** → [CXL-AT].
  12. **Ang Thong tour FAQ** → 10 Q&As.
  13. **What our guests say** → real reviews + review form.
  14. **More trips from Koh Samui** → rail: Pig Island speedboat, Koh Tao, Ang Thong VIP, Ang Thong overnight.
- **Data blocks:** booking card (date picker blocked 1 Nov–15 Dec + cut-off); at-a-glance table (Duration ~8 h · Boat: speedboat · Pickup 07:30–08:30 · Pier [ask Mea] · Back at pier 16:00–16:30 · Hotel 16:30–17:00 · Park fee 300/150 THB cash · Lunch included · Min. age: none, infants free [ask Mea policy] · Season 16 Dec–31 Oct); price table (Adult 1,800 · Child 3–11 [ask Mea] · Infant 0–2 free · Remote pickup +400 pp return · Park fee 300/150 cash · Private option 33,000/boat); itinerary timeline; Leaflet mini-map (Samui pier → Mae Ko → Wua Talab → snorkel stop); sea-state + tide cards (Nathon point); [CLOSURE] block with Pig Island + Koh Tao.
- **FAQ (exact questions):** 1 Is Ang Thong Marine Park open in November? · 2 Is the park fee included in the price? · 3 How long is the boat ride from Koh Samui to Ang Thong? · 4 Can I swim in the Emerald Lake? · 5 How hard is the climb to the viewpoint? · 6 Can children and non-swimmers join? · 7 Will I get seasick on the speedboat? · 8 Can the boat drop me on Koh Phangan after the tour? · 9 What happens if the tour is cancelled for weather? · 10 Do I need to book in advance in December–February?
- **Money links (internal):** Ang Thong VIP, Ang Thong overnight (tent/bungalow), Ang Thong private speedboat, Pig Island speedboat (closure cross-sell) · **Supporting guide links:** `/ang-thong-marine-park/`, `/ang-thong-speedboat-vs-big-boat/`, `/koh-samui-sea-conditions/` · **Sister-site link:** kohphangan.com `/product/daytour-ang-thong-marine-park/` ("Staying on Koh Phangan? Join from Thong Sala").
- **Images needed (WebP, owner photos first):** hero Emerald Lake (Thale Nai) from the viewpoint; speedboat among limestone islands; Wua Talab viewpoint panorama; kayaks at Koh Wua Talab beach; snorkeller over reef; lunch spread; guide briefing at the pier; children in life jackets on board; Mae Ko stairs; beach on Koh Wua Talab; map graphic of the route. 11 images. Alt e.g. "Emerald Lake on Koh Mae Ko, Ang Thong Marine Park".
- **Word target:** 1,900 (parity floor, P0.2; was 1,600)
- **Schema:** S-PRODUCT (`touristType`: families, couples, nature; `itinerary` with Koh Mae Ko, Koh Wua Talab).

#### `/product/ang-thong-big-boat-tour-koh-samui/` · D3 · MONEY
- **Primary keyword:** ang thong big boat tour · **Secondary:** ang thong cruise koh samui · cheap ang thong tour · ang thong tour by ferry boat · ang thong boat trip for families
- **Title tag:** Ang Thong Big Boat Tour from Koh Samui 2026 | 1,500 THB · **Meta description:** Relaxed big-boat day trip to Ang Thong Marine Park from Koh Samui: shaded decks, Emerald Lake, viewpoint, kayaking and snorkelling. 1,500 THB, book online.
- **H1:** Ang Thong Marine Park Day Tour by Big Boat from Koh Samui
- **Answer-first lead:** The slower, steadier way to Ang Thong: a big boat with shaded decks, about 10 hours door to door, visiting the Emerald Lake, Koh Wua Talab and a snorkelling stop. 1,500 THB per adult in 2026 plus the 300 THB park fee in cash; hotel pickup from most areas. Best for families, older travellers and anyone who gets seasick on speedboats. Closed 1 Nov–15 Dec.
- **Section outline (H2 → H3):**
  1. **Big boat tour at a glance** → facts table.
  2. **Why choose the big boat** → stability in swell, shade and space to move, toilets on board [ask Mea], more time per stop vs longer transit; honest downside: slower (transit time [check, ~1.5–2 h each way]) and busier stops.
  3. **Itinerary** → timeline [ask Mea: pickup window, departure pier, stops, return ~17:30–18:00?].
  4. **Big boat vs speedboat vs VIP** → comparison table (Price · Door-to-door time · Ride comfort · Shade · Best for).
  5. **What's included and not included** → [ask Mea: breakfast/lunch on board, kayak included or extra?]; park fee excluded.
  6. **Pickup areas** → [PICKUP].
  7. **What to bring** → as speedboat list + light jacket for the deck wind.
  8. **Good to know** → mobility (gangways, viewpoint stairs optional), seasickness lower, sun exposure.
  9. **Season and closure** → [CLOSURE].
  10. **Prices 2026** → Adult 1,500 · Child [ask Mea] · Infant free · +400 remote pickup · park fee cash. Positioning note (internal only): market big-boat range 1,100–1,400; justify 1,500 by inclusions [ask Mea which].
  11. **Cancellation policy** → [CXL-AT].
  12. **FAQ** → 8 Q&As.
  13. **Reviews** · 14. **More trips** rail.
- **Data blocks:** booking card; facts table; comparison table; timeline; sea-state card; [CLOSURE] cross-sell.
- **FAQ (exact questions):** 1 How is the big boat different from the speedboat tour? · 2 Is the big boat better if I get seasick? · 3 How long does the big boat take to reach Ang Thong? · 4 Is there a toilet and shade on board? · 5 Is the park fee included? · 6 Can grandparents or people with limited mobility join? · 7 Is Ang Thong open in November? · 8 What if the sea is rough on my date?
- **Money links (internal):** Ang Thong speedboat, Ang Thong VIP, Pig Island speedboat · **Supporting guide links:** `/ang-thong-speedboat-vs-big-boat/`, `/ang-thong-marine-park/`, `/koh-samui-weather/` · **Sister-site link:** none.
- **Images needed:** hero big boat deck with islands behind; shaded seating; Emerald Lake; family at Wua Talab beach; snorkel stop; lunch on board; map. 7 images.
- **Word target:** 1,900 (parity floor, P0.2; was 1,300)
- **Schema:** S-PRODUCT.

#### `/product/ang-thong-vip-tour-koh-samui/` · D3 · MONEY
- **Primary keyword:** ang thong vip tour · **Secondary:** ang thong premium tour koh samui · luxury ang thong tour · ang thong small boat tour [no number in shared copy] · ang thong tour 15 guests
- **Title tag:** Ang Thong VIP Tour from Koh Samui 2026: 15 Guests Only · **Meta description:** Ang Thong VIP day tour from Koh Samui with only 15 guests on a big speedboat: more space, more time at each stop, a personal guide. 4,500 THB, book online.
- **H1:** Ang Thong VIP Day Tour from Koh Samui (Only 15 Guests)
- **Answer-first lead:** The VIP tour takes only 15 guests on a big speedboat, so it is far more comfortable and personal than a standard trip: space to sit, a guide who knows your name and unhurried stops at the Emerald Lake, Wua Talab viewpoint and the snorkelling reefs. 4,500 THB per adult in 2026, park fee 300 THB cash; hotel pickup from most areas of Koh Samui. Closed 1 Nov–15 Dec.
- **Section outline (H2 → H3):**
  1. **VIP tour at a glance** → facts table incl. "Guests: only 15 on a big speedboat".
  2. **What makes it VIP** → 15 guests, big speedboat, upgraded lunch/drinks [ask Mea], quieter timing [ask Mea: e.g. visits stops outside peak times?].
  3. **Itinerary** → timeline [ask Mea].
  4. **VIP vs standard speedboat vs private boat** → table (Price · Guests · Comfort · Flexibility · Best for); private = 33,000/boat.
  5. **Included / not included** → [ask Mea]; park fee excluded.
  6. **Pickup areas** → [PICKUP].
  7. **What to bring** · 8. **Good to know** (ride comfort on a big speedboat; mobility; sea conditions).
  9. **Season and closure** → [CLOSURE]; Dec–Feb seats limited.
  10. **Prices 2026** → Adult 4,500 · Child [ask Mea] · Infant free · +400 remote · park fee cash.
  11. **Cancellation** → [CXL-AT].
  12. **FAQ** → 8 Q&As. 13. Reviews. 14. More trips rail.
- **Data blocks:** booking card with "Only 15 guests" badge; comparison table; timeline; sea card; [CLOSURE].
- **FAQ (exact questions):** 1 How many guests are on the VIP tour? · 2 What is the difference between the VIP and the standard tour? · 3 Is lunch better on the VIP tour? · 4 Is the VIP tour good for a special occasion? · 5 Is the park fee included? · 6 Can I book the whole boat privately instead? · 7 Is the VIP tour suitable for children? · 8 What happens if the sea is too rough?
- **Money links (internal):** Ang Thong private speedboat, Ang Thong speedboat, Ang Thong overnight bungalow · **Supporting guide links:** `/ang-thong-marine-park/`, `/ang-thong-speedboat-vs-big-boat/`, `/koh-samui-sea-conditions/` · **Sister-site link:** none.
- **Images needed:** hero VIP speedboat with spacious seating; couple at the viewpoint; snorkelling; upgraded lunch; Emerald Lake; guide with guests. 6–8 images.
- **Word target:** 1,900 (parity floor, P0.2; was 1,300)
- **Schema:** S-PRODUCT.

#### `/product/ang-thong-overnight-camping-koh-samui/` · D3 · MONEY
- **Primary keyword:** ang thong overnight camping · **Secondary:** ang thong overnight tour koh samui · camping ang thong national park · stay overnight in ang thong · ang thong 2 day trip
- **Title tag:** Ang Thong Overnight Camping from Koh Samui 2026 | 3,600 · **Meta description:** Two days and one night camping in Ang Thong Marine Park from Koh Samui: sunset viewpoint, empty beaches and kayaking after the day boats leave. 3,600 THB.
- **H1:** Ang Thong Overnight Camping Trip from Koh Samui (2 Days, 1 Night)
- **Answer-first lead:** Stay the night on Koh Wua Talab, the park's headquarters island, after the day boats leave: sunset from the viewpoint, a quiet beach, and a second day in the archipelago. 3,600 THB per adult in 2026 with a tent; the park fee (300 THB) is paid in cash. Full refund 48 hours or more before departure. Closed 1 Nov–15 Dec.
- **Section outline (H2 → H3):**
  1. **Overnight camping at a glance** → facts table (2 days/1 night; tent; island Koh Wua Talab; meals [ask Mea]; return day 2 ~16:00–16:30 at the pier).
  2. **Why stay overnight** → sunset and sunrise light, no crowds after ~16:00, night sky.
  3. **Itinerary** → H3 Day 1 (day-tour route, then check-in at camp) · H3 Day 2 (morning free, joins the next day's boat back [ask Mea]).
  4. **Tent or bungalow?** → compare 3,600 tent vs 4,200 bungalow (bungalow: "we take care of everything", very clean bathrooms).
  5. **Where you sleep** → park campground, tent and bedding [ask Mea what's supplied], shared bathrooms (very clean), electricity hours [check].
  6. **Included / not included** → [ask Mea]; park fee cash.
  7. **Pickup areas** → [PICKUP].
  8. **What to pack for the night** → torch, insect repellent, long sleeves, power bank, cash.
  9. **Good to know** → no shops on the island [check], park rules (no alcohol? [check]), wildlife (dusky langurs, monitor lizards [check]).
  10. **Season and closure** → [CLOSURE]; Dec–Feb quotas: book early.
  11. **Prices 2026** → Adult 3,600 · Child [ask Mea] · Infant free · +400 remote.
  12. **Cancellation** → [CXL-AT] (none under 48 h).
  13. **FAQ** → 8 Q&As. 14. Reviews. 15. More trips rail.
- **Data blocks:** booking card (2-day product; date = day 1); 2-day timeline; tent vs bungalow table; facts table; sea card; [CLOSURE].
- **FAQ (exact questions):** 1 Where do we sleep in Ang Thong? · 2 What is provided in the tent? · 3 Are there showers and toilets? · 4 Is food included for dinner and breakfast? · 5 Is there electricity and phone signal? · 6 Can children stay overnight? · 7 What happens if the sea is rough on day 2? · 8 Can I cancel an overnight booking?
- **Money links (internal):** Ang Thong overnight bungalow, Ang Thong speedboat, Ang Thong VIP · **Supporting guide links:** `/ang-thong-marine-park/`, `/koh-samui-weather/`, `/koh-samui-sea-conditions/` · **Sister-site link:** kohphangan.com Ang Thong overnight camping (Phangan departure).
- **Images needed:** hero tents at the Koh Wua Talab campground at dusk; sunset from the viewpoint; empty beach morning; bathroom block (clean); kayak at sunrise; campfire-free dinner table [check rules]. 6–8 images.
- **Word target:** 1,900 (parity floor, P0.2; was 1,400)
- **Schema:** S-PRODUCT (`TouristTrip` with 2-day itinerary).

#### `/product/ang-thong-overnight-bungalow-koh-samui/` · D3 · MONEY
- **Primary keyword:** ang thong bungalow overnight · **Secondary:** ang thong national park bungalow · ang thong overnight tour with accommodation · stay in ang thong marine park · ang thong 2 day 1 night
- **Title tag:** Ang Thong Overnight Bungalow Tour from Samui 2026 | 4,200 · **Meta description:** Spend a night in a park bungalow in Ang Thong Marine Park: two days of viewpoints, lagoons and quiet beaches from Koh Samui. Bungalow included, 4,200 THB.
- **H1:** Ang Thong Overnight Bungalow Trip from Koh Samui (2 Days, 1 Night)
- **Answer-first lead:** Two days in Ang Thong with a park bungalow on Koh Wua Talab included: we take care of everything, from the boat to the room, and the bathrooms are very clean. 4,200 THB per adult in 2026 plus the 300 THB park fee in cash. Full refund 48 hours or more before departure; closed 1 Nov–15 Dec.
- **Section outline (H2 → H3):**
  1. **At a glance** → facts table.
  2. **Why the bungalow option** → a proper bed, fan/air-con [check], private or shared bathroom [ask Mea], no booking hassle (the park booking system has been unreliable [check; don't overstate]).
  3. **Itinerary** → H3 Day 1 · H3 Day 2 [ask Mea].
  4. **Bungalow vs tent** → table.
  5. **Your bungalow** → what's inside [ask Mea], bedding, electricity hours [check].
  6. **Included / not included** → bungalow included; meals [ask Mea]; park fee cash.
  7. **Pickup areas** → [PICKUP].
  8. **What to pack** · 9. **Good to know** (quiet hours, wildlife, no shops).
  10. **Season and closure** → [CLOSURE]; peak quotas.
  11. **Prices 2026** → Adult 4,200 · Child [ask Mea] · Infant free · +400 remote.
  12. **Cancellation** → [CXL-AT].
  13. **FAQ** → 8 Q&As. 14. Reviews. 15. More trips.
- **Data blocks:** booking card; timeline; comparison table; facts table; [CLOSURE].
- **FAQ (exact questions):** 1 What is the bungalow like? · 2 Do I need to book the park bungalow myself? · 3 Are the bathrooms clean? · 4 Are meals included? · 5 Is it suitable for families? · 6 Can we stay two nights? [ask Mea] · 7 Is Ang Thong open in December? · 8 What if weather stops the return boat?
- **Money links (internal):** overnight camping, Ang Thong VIP, Ang Thong private speedboat · **Supporting guide links:** `/ang-thong-marine-park/`, `/koh-samui-sea-conditions/`, `/koh-samui-weather/` · **Sister-site link:** none.
- **Images needed:** hero park bungalow exterior on Koh Wua Talab; interior; bathroom; sunset viewpoint; morning beach; dinner [ask Mea]. 6–8 images.
- **Word target:** 1,900 (parity floor, P0.2; was 1,300)
- **Schema:** S-PRODUCT.

#### `/product/ang-thong-private-speedboat-koh-samui/` · D3 · MONEY
- **Primary keyword:** ang thong private speedboat · **Secondary:** private tour ang thong koh samui · ang thong private boat charter · private speedboat to ang thong · ang thong private trip price
- **Title tag:** Ang Thong Private Speedboat from Koh Samui 2026 | 33,000 · **Meta description:** Your own speedboat to Ang Thong Marine Park from Koh Samui: your timing, your stops, optional lunch and transfers. 33,000 THB per boat, book online.
- **H1:** Ang Thong Private Speedboat Tour from Koh Samui
- **Answer-first lead:** Charter a whole speedboat to Ang Thong for your group and set your own pace: start early to beat the day boats, add a restaurant lunch stop, or skip the viewpoint for more snorkelling. 33,000 THB per boat in 2026 (capacity [ask Mea]); lunch and hotel transfers are optional, and you can meet the boat at the pier (we send the location). Park fee 300 THB per adult in cash. Closed 1 Nov–15 Dec.
- **Section outline (H2 → H3):**
  1. **Private speedboat at a glance** → facts table (boat size [ask Mea], max guests [ask Mea], duration ~7–8 h [ask Mea], start time flexible).
  2. **Why go private** → flexibility, families with toddlers, photographers, celebrations; typical market price for a private 35 ft boat to Ang Thong is ~50,000–61,000 THB in 2026 (positioning, no names).
  3. **Sample route** → H3 classic (Mae Ko, Wua Talab, snorkel, beach) · H3 snorkel-heavy · H3 early-start crowd-free.
  4. **Options: lunch, transfers, meeting at the pier** → restaurant stop (guests order and pay); land transfers optional [ask Mea price]; pier pin sent on WhatsApp.
  5. **Included / not included** → captain, crew, fuel, snorkel gear, water/soft drinks [ask Mea]; not included: park fee, lunch unless added, transfers unless added.
  6. **Pickup and pier** → [PICKUP] if transfers added; pier [ask Mea].
  7. **Good to know** → no one-way drop-offs to Koh Phangan in high season (boats return to Samui); sea-state rule.
  8. **Season and closure** → [CLOSURE]; Dec–Feb park quotas.
  9. **Prices 2026** → per boat 33,000 [ask Mea: seasonal pricing low/high/peak?]; extras.
  10. **Cancellation** → [CXL-AT].
  11. **FAQ** → 8 Q&As. 12. Reviews. 13. More private boats rail (Pig Island private speedboat 11,950; charter hub).
- **Data blocks:** booking card per boat (date, guests count for park-fee note, options); route map; comparison (private vs VIP vs shared); sea card; [CLOSURE].
- **FAQ (exact questions):** 1 How many people fit on the private speedboat? · 2 Can we choose our own stops and times? · 3 Is lunch included? · 4 Can we meet the boat at the pier instead of hotel pickup? · 5 Is the park fee included? · 6 Can you drop us on Koh Phangan at the end? · 7 Is the private boat good for young children? · 8 What happens if the sea is unsafe?
- **Money links (internal):** `/koh-samui-private-speedboat/`, Ang Thong VIP, Pig Island private speedboat · **Supporting guide links:** `/ang-thong-marine-park/`, `/koh-samui-sea-conditions/`, `/koh-samui-tides/` · **Sister-site link:** none.
- **Images needed:** hero private speedboat at an empty Ang Thong beach; group snorkelling; boat interior seating; Emerald Lake; restaurant stop [ask Mea]. 6–8 images.
- **Word target:** 1,900 (parity floor, P0.2; was 1,300)
- **Schema:** S-PRODUCT (offer per boat, `eligibleQuantity` [ask Mea]).

---

#### P1.2 Boat trips: Pig Island (Koh Madsum) & Koh Tan (all from Thong Krut; **always bookable**; [CXL-DAY]; [PICKUP] [ask Mea: transfers included on every Pig Island product?])

#### `/product/pig-island-speedboat-tour/` · D3 · MONEY
- **Primary keyword:** pig island tour from koh samui (pigislandkohsamui.com and the Samui guide page `/pig-island-koh-samui/` own "pig island koh samui") · **Secondary:** koh madsum speedboat tour · pig island and koh tan snorkelling trip · pig island half day tour samui
- **Title tag:** Pig Island Tour from Koh Samui 2026: Speedboat | 1,450 THB · **Meta description:** Speedboat to Pig Island (Koh Madsum) and Koh Tan from Thong Krut: swimming pigs' beach, snorkelling and beach time in 4–5 hours. 1,450 THB, runs daily.
- **H1:** Pig Island (Koh Madsum) & Koh Tan Speedboat Tour from Koh Samui
- **Answer-first lead:** Our bestseller: 4–5 hours by speedboat from Thong Krut pier on Samui's south-west coast to Koh Madsum, the beach where the pigs live, and Koh Tan for snorkelling. 1,450 THB per adult in 2026; the ~50 THB Madsum landing fee is paid in cash where not included. It runs every day of the year, including November when Ang Thong is closed.
- **Section outline (H2 → H3):**
  1. **Pig Island tour at a glance** → facts table.
  2. **Why visit Pig Island** → short crossing (~30 min), calm southern waters, pigs on the sand, Koh Tan's clearer snorkelling; honest note: it's a short, easy trip, not a full-day wilderness park.
  3. **Itinerary** → timeline [ask Mea: pickup window, pier time, stops (Madsum, Koh Tan coral, Koh Tan beach), return].
  4. **Meeting the pigs responsibly** → don't feed junk food, don't chase or pick up piglets, give them space in the heat [ask Mea for crew rules].
  5. **Which Pig Island tour?** → table of all 10 Pig Island products (price, duration, best for).
  6. **Included / not included** → [ask Mea]; Madsum fee ~50 THB cash where not included.
  7. **Pickup areas and Thong Krut pier** → [PICKUP]; Thong Krut pin + **Get directions**; self-drive parking [check].
  8. **What to bring** → reef-safe sunscreen, water shoes, cash 50+ THB, dry bag.
  9. **Good to know** → great in Nov–Dec when the east coast is rough (south-west sheltered, but weather can still cancel [check daily]); tide affects beach landings (tide card).
  10. **Prices 2026** → Adult 1,450 · Child [ask Mea] · Infant free · +400 remote pickup.
  11. **Cancellation** → [CXL-DAY].
  12. **FAQ** → 10 Q&As. 13. Reviews. 14. More trips rail (sunset, longtail, Pink Dolphins, private).
- **Data blocks:** booking card (no blocked dates except weather/cut-off); facts table (Duration 4–5 h · Pier Thong Krut · Boat speedboat · Crossing ~30 min · Fee ~50 THB cash · Runs daily, all year); "Which Pig Island tour" comparison table; route mini-map (Thong Krut → Koh Madsum → Koh Tan); tide card (Thong Krut) + sea card.
- **FAQ (exact questions):** 1 Where is Pig Island and how far is it from Koh Samui? · 2 Can you swim with the pigs? · 3 Is the Pig Island tour suitable for young children? · 4 Is there a landing fee on Koh Madsum? · 5 Is the snorkelling good at Koh Tan? · 6 Does the tour run in November and December? · 7 Do you pick up from my hotel? · 8 How long is the boat ride? · 9 Is it better in the morning or afternoon? · 10 What happens if the weather is bad?
- **Money links (internal):** Pig Island sunset, Pig Island longtail, Pink Dolphins & Pig Island, Pig Island private speedboat · **Supporting guide links:** `/pig-island-koh-samui/`, `/islands-near-koh-samui/`, `/koh-samui-tides/` · **Sister-site link:** none (pigislandkohsamui.com stays in the footer row only, to avoid splitting the same sale).
- **Images needed:** hero pigs on the beach at Koh Madsum; speedboat at Thong Krut pier; snorkelling at Koh Tan; Koh Tan beach; family with life jackets; map graphic; piglets in shade (no handling). 7–10 images.
- **Word target:** 1,500
- **Schema:** S-PRODUCT.

#### `/product/pig-island-sunset-tour/` (slug [check] per C1 naming) · D3 · MONEY
- **Primary keyword:** pig island sunset tour · **Secondary:** koh samui sunset boat trip · sunset tour koh samui with dinner · koh madsum sunset · sunset cruise pig island
- **Title tag:** Pig Island Sunset Tour from Koh Samui 2026 | 1,550 THB · **Meta description:** Afternoon boat to Pig Island and Koh Tan, then sunset over the Five Islands with dinner. 5–6 hours from Thong Krut, 1,550 THB per adult, bookable any day.
- **H1:** Pig Island Sunset Tour with Dinner from Koh Samui
- **Answer-first lead:** An afternoon trip from Thong Krut to the pigs on Koh Madsum and the beaches of Koh Tan, timed for sunset over the sea with dinner included. 5–6 hours, 1,550 THB per adult in 2026, bookable on any date.
- **Section outline (H2 → H3):**
  1. At a glance
  2. Why sunset on the south-west coast (sunset times by month ~18:00–18:40 [check])
  3. Itinerary (afternoon pickup [ask Mea], pigs, swim, dinner location [ask Mea], sunset)
  4. Dinner: what's served [ask Mea; vegetarian option?]
  5. Included / not included (Madsum fee)
  6. Pickup areas [PICKUP]
  7. What to bring (light layer, insect repellent)
  8. Good to know (return after dark; children's life jackets)
  9. Prices 2026 (Adult 1,550 · Child [ask Mea])
  10. Cancellation [CXL-DAY]
  11. FAQ
  12. Reviews
  13. More trips rail.
- **Data blocks:** booking card; facts table; sunset-time widget (computed for Thong Krut by date); timeline; tide/sea cards.
- **FAQ (exact questions):** 1 What time does the sunset tour leave? · 2 What is included for dinner? · 3 Will we see the pigs on a sunset trip? · 4 Is it suitable for kids? · 5 What if it's cloudy or rainy? · 6 Is the Madsum fee included?
- **Money links (internal):** Pig Island speedboat, `/koh-samui-sunset-cruise/`, Pig Island private longtail · **Supporting guide links:** `/koh-samui-sunset-spots/`, `/pig-island-koh-samui/` · **Sister-site link:** none.
- **Images needed:** hero boat silhouette at sunset off Koh Tan; pigs in golden light; dinner table; Thong Krut pier at dusk; swimming. 5–7 images.
- **Word target:** 1,200
- **Schema:** S-PRODUCT.

#### `/product/pig-island-longtail-tour/` (slug [check]) · D3 · MONEY
- **Primary keyword:** pig island longtail tour · **Secondary:** koh madsum longtail boat · small group pig island tour · koh tan lunch tour · traditional boat tour koh samui
- **Title tag:** Pig Island Longtail Tour from Koh Samui 2026 | 1,750 THB · **Meta description:** Small-group longtail boat to Pig Island and Koh Tan with lunch on the beach: a slower, traditional day of about 6 hours from Thong Krut. 1,750 THB per adult.
- **H1:** Pig Island Small-Group Longtail Tour with Lunch on Koh Tan
- **Answer-first lead:** A traditional wooden longtail from Thong Krut to Koh Madsum's pigs, snorkelling and a beach lunch on Koh Tan, at a slower pace of about 6 hours. 1,750 THB per adult in 2026, bookable any day.
- **Section outline (H2 → H3):**
  1. At a glance (group size [ask Mea])
  2. Why a longtail (low to the water, traditional, quieter beaches; honest: noisier engine, more spray)
  3. Itinerary [ask Mea]
  4. Lunch on Koh Tan [ask Mea menu]
  5. Longtail vs speedboat table
  6. Included / not included
  7. Pickup areas [PICKUP]
  8. What to bring
  9. Good to know (shade limited on longtails, sun protection)
  10. Prices 2026 (1,750 · child [ask Mea])
  11. Cancellation [CXL-DAY]
  12. FAQ
  13. Reviews/rail.
- **Data blocks:** booking card; comparison table; timeline; tide card.
- **FAQ (exact questions):** 1 How many people are on the longtail? · 2 Is there shade on a longtail boat? · 3 What is served for lunch? · 4 Is it suitable for children? · 5 Longtail or speedboat: which is better? · 6 Does it run every day?
- **Money links (internal):** Pig Island speedboat, Pig Island private longtail, 3 Islands private · **Supporting guide links:** `/pig-island-koh-samui/`, `/islands-near-koh-samui/` · **Sister-site link:** none.
- **Images needed:** longtail at Koh Tan beach; pigs; beach lunch; snorkelling; boatman steering (consent). 5–7 images.
- **Word target:** 1,200
- **Schema:** S-PRODUCT.

#### `/product/pink-dolphins-pig-island-tour/` (slug [check]) · D3 · MONEY
- **Primary keyword:** pink dolphins koh samui · **Secondary:** pink dolphin tour samui · pig island and dolphins · dolphin watching koh samui · koh samui dolphin tour
- **Title tag:** Pink Dolphins & Pig Island Tour from Samui 2026 | 2,250 · **Meta description:** Look for Samui's pink dolphins, then visit the pigs on Koh Madsum and snorkel Koh Tan. About 6 hours from Thong Krut, 2,250 THB, bookable any day.
- **H1:** Pink Dolphins & Pig Island Tour from Koh Samui
- **Answer-first lead:** A ~6-hour boat day that searches for the pink (Indo-Pacific humpback) dolphins in the waters south of Samui [check where], then stops at Koh Madsum and Koh Tan. 2,250 THB per adult in 2026. Dolphins are wild, so sightings are likely but never guaranteed [ask Mea: sighting rate, any refund policy if none seen].
- **Section outline (H2 → H3):**
  1. At a glance
  2. About the pink dolphins (species, why pink, where seen [check against a primary source])
  3. Watching responsibly (no chasing, keep distance, engines low)
  4. Itinerary [ask Mea]
  5. Included / not included
  6. Pickup areas [PICKUP]
  7. What to bring (binoculars, zoom lens)
  8. Good to know (calm sea needed; morning best [check])
  9. Prices 2026 (2,250 · child [ask Mea])
  10. Cancellation [CXL-DAY]
  11. FAQ
  12. Reviews/rail.
- **Data blocks:** booking card; facts table; route map; sea card.
- **FAQ (exact questions):** 1 Are pink dolphins guaranteed? · 2 Where do the pink dolphins live? · 3 Can we swim with the dolphins? · 4 How long is the tour? · 5 Is it suitable for kids? · 6 What happens if the sea is rough?
- **Money links (internal):** Pig Island speedboat, Pig Island private speedboat · **Supporting guide links:** `/pig-island-koh-samui/`, `/islands-near-koh-samui/` · **Sister-site link:** none.
- **Images needed:** pink dolphin surfacing (own or licensed, real Gulf of Thailand photo only); pigs; Koh Tan snorkel; guests watching from the boat. 5–6 images.
- **Word target:** 1,200
- **Schema:** S-PRODUCT.

#### `/product/pig-island-private-longtail/` (slug [check]) · D3 · MONEY
- **Primary keyword:** private longtail pig island · **Secondary:** private boat pig island · private tour koh madsum · private longtail koh samui · family boat trip koh samui
- **Title tag:** Private Longtail to Pig Island 2026 | 5,950 THB per Boat · **Meta description:** Your own longtail boat from Thong Krut to Pig Island and Koh Tan, for up to 8 guests, at your own pace. 5,950 THB per boat, bookable for any date.
- **H1:** Private Longtail Boat to Pig Island and Koh Tan
- **Answer-first lead:** A private longtail for up to 8 guests from Thong Krut: pigs, snorkelling and beaches on your schedule. 5,950 THB per boat in 2026 (market range 3,500–6,250), bookable any day.
- **Section outline (H2 → H3):**
  1. At a glance (up to 8, duration [ask Mea])
  2. Why private
  3. Suggested route and timing (morning vs afternoon)
  4. Included / not included (transfers [ask Mea], Madsum fee)
  5. Pickup / meet at Thong Krut
  6. Good to know (shade, spray)
  7. Prices 2026 (5,950/boat)
  8. Cancellation [CXL-DAY]
  9. FAQ
  10. More private boats rail.
- **Data blocks:** booking card per boat; facts table; private-options comparison (longtail 5,950 · speedboat 11,950 · 3 Islands 8,450 · Koh Rap 9,950); tide card.
- **FAQ (exact questions):** 1 How many people fit on the private longtail? · 2 How long do we get? · 3 Are hotel transfers included? · 4 Can we add Koh Rap? · 5 Is it safe for toddlers? · 6 What if it rains?
- **Money links (internal):** Pig Island private speedboat, 3 Islands private, Pig Island speedboat · **Supporting guide links:** `/pig-island-koh-samui/`, `/koh-samui-tides/` · **Sister-site link:** none.
- **Images needed:** private longtail at Koh Madsum; family on board; Koh Tan reef. 4–5 images.
- **Word target:** 1,200
- **Schema:** S-PRODUCT.

#### `/product/pig-island-private-speedboat/` (slug [check]) · D3 · MONEY
- **Primary keyword:** private speedboat pig island · **Secondary:** pig island private tour koh samui · private speedboat koh madsum · koh tan private speedboat · private island hopping samui south
- **Title tag:** Pig Island Private Speedboat 2026 | 11,950 THB per Boat · **Meta description:** Private speedboat from Thong Krut to Pig Island, Koh Tan and nearby islands for up to 10 guests. Faster, drier and flexible. 11,950 THB per boat, any date.
- **H1:** Private Speedboat to Pig Island and Koh Tan
- **Answer-first lead:** Your own speedboat for up to 10 guests from Thong Krut to Koh Madsum, Koh Tan and, time allowing, Koh Rap [ask Mea]. 11,950 THB per boat in 2026, bookable any day.
- **Section outline (H2 → H3):**
  1. At a glance
  2. Why a private speedboat (speed, dry ride, more islands)
  3. Suggested routes (half day / longer [ask Mea durations])
  4. Included / not included
  5. Pickup / meet at Thong Krut
  6. Good to know
  7. Prices 2026 (11,950/boat)
  8. Cancellation [CXL-DAY]
  9. FAQ
  10. Rail.
- **Data blocks:** booking card; private-options comparison table; route map; tide/sea cards.
- **FAQ (exact questions):** 1 How many guests can join? · 2 How long is the charter? · 3 Can we visit more islands? · 4 Are drinks and snorkel gear included? · 5 Can we start at sunset? · 6 What happens in bad weather?
- **Money links (internal):** Pig Island private longtail, `/koh-samui-private-speedboat/`, Ang Thong private speedboat · **Supporting guide links:** `/pig-island-koh-samui/`, `/islands-near-koh-samui/` · **Sister-site link:** none.
- **Images needed:** speedboat off Koh Madsum; guests snorkelling; Koh Rap aerial [licensed]. 4–5 images.
- **Word target:** 1,200
- **Schema:** S-PRODUCT.

#### `/product/koh-madsum-koh-tan-koh-rap-private-tour/` (slug [check]) · D3 · MONEY
- **Primary keyword:** 3 islands tour koh samui · **Secondary:** koh rap koh tan koh madsum · koh rap tour · private island hopping koh samui · south samui islands tour
- **Title tag:** 3 Islands Private Tour: Madsum, Tan & Rap 2026 | 8,450 · **Meta description:** Private boat to three southern islands from Thong Krut: Pig Island (Koh Madsum), Koh Tan and Koh Rap, for up to 8 guests. 8,450 THB per boat, any date.
- **H1:** Koh Madsum, Koh Tan & Koh Rap Private Island Tour
- **Answer-first lead:** Three islands in one private trip from Thong Krut: the pigs on Koh Madsum, Koh Tan's snorkelling and quiet Koh Rap, for up to 8 guests. 8,450 THB per boat in 2026 (boat type [ask Mea]), bookable any day.
- **Section outline (H2 → H3):**
  1. At a glance
  2. The three islands (H3 each: Madsum, Tan, Rap facts [check Koh Rap details])
  3. Itinerary [ask Mea]
  4. Included / not included
  5. Pickup
  6. Good to know
  7. Prices 2026
  8. Cancellation [CXL-DAY]
  9. FAQ
  10. Rail.
- **Data blocks:** booking card; island map; comparison table.
- **FAQ (exact questions):** 1 What boat is used? · 2 How long does the 3-island trip take? · 3 What is there to do on Koh Rap? · 4 Are there landing fees? · 5 Is lunch included? · 6 Can it run in the rainy season?
- **Money links (internal):** Koh Rap full day, Pig Island private longtail, Pig Island speedboat · **Supporting guide links:** `/islands-near-koh-samui/`, `/pig-island-koh-samui/` · **Sister-site link:** none.
- **Images needed:** Koh Rap beach; Koh Tan reef; pigs; boat. 4–5 images.
- **Word target:** 1,200
- **Schema:** S-PRODUCT.

#### `/product/koh-rap-full-day-private-tour/` (slug [check]) · D3 · MONEY
- **Primary keyword:** koh rap full day tour · **Secondary:** koh rap koh samui · private day trip koh rap · koh rap snorkelling · secluded island koh samui
- **Title tag:** Koh Rap Full-Day Private Boat Trip 2026 | 9,950 THB · **Meta description:** A full private day around Koh Rap and the southern islands from Thong Krut: snorkelling, empty beaches and the pigs on Koh Madsum. 9,950 THB per boat.
- **H1:** Koh Rap Full-Day Private Boat Trip from Koh Samui
- **Answer-first lead:** A full private day built around Koh Rap, with time for Koh Madsum and Koh Tan, from Thong Krut. 9,950 THB per boat in 2026 (capacity and boat type [ask Mea]), bookable any day.
- **Section outline (H2 → H3):**
  1. At a glance
  2. Why a full day
  3. Sample day (timeline [ask Mea])
  4. Lunch options [ask Mea]
  5. Included / not included
  6. Pickup
  7. Good to know
  8. Prices 2026
  9. Cancellation [CXL-DAY]
  10. FAQ
  11. Rail.
- **Data blocks:** booking card; timeline; island map; comparison with 3 Islands tour.
- **FAQ (exact questions):** 1 How is this different from the 3 Islands tour? · 2 How many people can join? · 3 Is lunch included? · 4 What snorkelling is there around Koh Rap? · 5 Can we stay for sunset? · 6 What if the weather turns?
- **Money links (internal):** 3 Islands private, Pig Island private speedboat · **Supporting guide links:** `/islands-near-koh-samui/`, `/koh-samui-snorkeling/` · **Sister-site link:** none.
- **Images needed:** Koh Rap shoreline; snorkeller; boat at anchor; picnic [ask Mea]. 4–5 images.
- **Word target:** 1,200
- **Schema:** S-PRODUCT.

#### `/product/jet-ski-safari-pig-island/` (slug [check]) · D3 · MONEY
- **Primary keyword:** jet ski tour koh samui · **Secondary:** jet ski safari pig island · guided jet ski koh samui · jet ski island tour samui · koh madsum jet ski
- **Title tag:** Jet Ski Safari to Pig Island 2026 | 9,950 THB per Jet Ski · **Meta description:** Guided jet ski safari from Samui's south coast to Pig Island and Koh Tan, with a lead guide and safety briefing. 9,950 THB per jet ski, bookable any day.
- **H1:** Guided Jet Ski Safari to Pig Island
- **Answer-first lead:** A guided jet ski convoy to Koh Madsum and Koh Tan with a safety briefing and lead guide, the safe alternative to renting a jet ski on the beach. 9,950 THB per jet ski in 2026 (riders per ski, licence and age rules [ask Mea]).
- **Section outline (H2 → H3):**
  1. At a glance (duration, start point [ask Mea])
  2. How the safari works (briefing, convoy, stops)
  3. Route (map)
  4. Safety and insurance (life jackets, damage terms in writing [ask Mea], no passport deposit)
  5. Who can ride (min. age, passenger rules, pregnancy)
  6. Included / not included
  7. Pickup
  8. Good to know (sea state; cancel if unsafe)
  9. Prices 2026
  10. Cancellation [CXL-DAY]
  11. FAQ
  12. Rail.
- **Data blocks:** booking card (per jet ski); route map; sea card; safety checklist box.
- **FAQ (exact questions):** 1 Do I need a licence to ride? · 2 How many people per jet ski? · 3 What is the minimum age? · 4 Is there a damage deposit? · 5 How long is the ride? · 6 What if the sea is rough?
- **Money links (internal):** Pig Island speedboat, Pig Island private speedboat · **Supporting guide links:** `/koh-samui-jet-ski/`, `/pig-island-koh-samui/` · **Sister-site link:** none.
- **Images needed:** jet ski convoy at sea; briefing; arrival at Koh Madsum. 4–5 images.
- **Word target:** 1,200
- **Schema:** S-PRODUCT.

---

#### P1.3 Koh Tao, Koh Phangan and party boats

#### `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/` · D3 · MONEY
- **Primary keyword:** koh tao day trip from koh samui · **Secondary:** koh nang yuan tour · koh tao snorkelling tour · koh tao speedboat tour · nang yuan viewpoint · koh samui to koh tao day trip
- **Title tag:** Koh Tao & Nang Yuan Day Trip from Koh Samui 2026 | 2,200 · **Meta description:** Speedboat day trip from Koh Samui to Koh Tao and Koh Nang Yuan: the sandbar viewpoint, snorkelling bays and lunch. 2,200 THB, runs while Ang Thong is closed.
- **H1:** Koh Tao & Koh Nang Yuan Day Trip from Koh Samui
- **Answer-first lead:** A speedboat day to Koh Nang Yuan's three islands joined by a sandbar and the snorkelling bays of Koh Tao, with lunch. 2,200 THB per adult in 2026, the same price from Samui and Phangan; the Nang Yuan island fee of 250 THB is paid in cash on arrival. It runs while Ang Thong is closed (1 Nov–15 Dec), sea conditions permitting.
- **Section outline (H2 → H3):**
  1. **At a glance** → facts table (duration 8–9 h [ask Mea], speedboat, pier [ask Mea], fee 250 cash).
  2. **Why Koh Tao and Nang Yuan** → sandbar + viewpoint, clear water; honest: longest crossing of our day trips, can be bumpy in NE wind.
  3. **Itinerary** → timeline [ask Mea: stops (Nang Yuan viewpoint, Japanese Gardens, Mango Bay?, Shark Bay?), lunch place, return time].
  4. **Koh Nang Yuan rules** → no plastic bottles, no fins on the island, no drones [check current rules]; fee 250 adult, child 100–120 [check].
  5. **Included / not included** → [ask Mea]; Nang Yuan fee excluded.
  6. **Pickup areas** → [PICKUP].
  7. **What to bring** → cash 250+ THB, reusable bottle, sunscreen, seasickness tablets.
  8. **Good to know** → crossing time [check]; seasickness; Nov–Dec sea checks; tours return to Samui (no drop-off on Koh Tao or Phangan).
  9. **Koh Tao vs Ang Thong vs Pig Island** → table.
  10. **Prices 2026** → Adult 2,200 · Child [ask Mea] · Infant free · +400 remote · Nang Yuan fee cash.
  11. **Cancellation** → [CXL-DAY].
  12. **FAQ** → 10 Q&As. 13. Reviews. 14. Rail.
- **Data blocks:** booking card; facts table; comparison table; route map (Samui → Nang Yuan → Koh Tao bays); sea card (Chaweng point / open Gulf).
- **FAQ (exact questions):** 1 How long is the boat ride from Koh Samui to Koh Tao? · 2 How much is the Koh Nang Yuan fee? · 3 Why can't I bring plastic bottles to Nang Yuan? · 4 Is the viewpoint hike difficult? · 5 Does the Koh Tao tour run in November? · 6 Can I stay on Koh Tao and not return with the boat? · 7 Is it suitable for children? · 8 Will it be rough? · 9 Is lunch included? · 10 Can I cancel?
- **Money links (internal):** Pig Island speedboat, Ang Thong speedboat (from 16 Dec), `/koh-samui-diving/` · **Supporting guide links:** `/koh-samui-to-koh-tao/`, `/islands-near-koh-samui/`, `/koh-samui-sea-conditions/` · **Sister-site link:** kohphangan.com Koh Tao & Nang Yuan day trip (Phangan departure).
- **Images needed:** hero Nang Yuan sandbar from the viewpoint; snorkelling; speedboat crossing; lunch; Koh Tao bay. 6–8 images.
- **Word target:** 1,500
- **Schema:** S-PRODUCT.

#### `/private-speedboat-koh-samui-to-koh-phangan/` · D3 variant (enquiry → pay) · MONEY
- **Primary keyword:** private speedboat koh samui to koh phangan · **Secondary:** koh samui to koh phangan private transfer · speedboat transfer samui phangan · koh phangan day trip from koh samui · private boat to haad rin
- **Title tag:** Koh Samui to Koh Phangan Private Speedboat 2026 · **Meta description:** Private speedboat between Koh Samui and Koh Phangan, door to beach when sea and piers allow: day trips, transfers and party nights. Get a quote on WhatsApp.
- **H1:** Private Speedboat Transfer: Koh Samui to Koh Phangan
- **Answer-first lead:** A private speedboat crosses from Samui to Koh Phangan in about 20–40 minutes [check per pier], leaving when you want rather than on a ferry timetable, and can serve beaches the ferries don't. Prices are per boat [ask Mea: one-way and return tariff; fleet from 19,000 THB is a charter "from" price]; tell us date, time, group size and hotels and we quote, then you pay by secure link in THB.
- **Section outline (H2 → H3):**
  1. **At a glance** → per boat, capacity by boat, crossing time, Samui piers, Phangan drop points (Thong Sala, Haad Rin, Ban Tai, beaches by sea [ask Mea]).
  2. **Private boat or public ferry?** → table: ferry 200–500 THB pp, 20–50 min, fixed times, named piers; private: door-to-beach, any time [ask Mea limits], luggage. Link `/koh-samui-to-koh-phangan/` for ferry details.
  3. **Popular uses** → H3 villa-to-villa transfer · H3 Koh Phangan day trip (Than Sadet, Thong Nai Pan, Bottle Beach by sea [check access]) · H3 Full Moon/Half Moon nights (→ party products) · H3 airport connections.
  4. **Our boats** → fleet subset (PP 30 ft, 8 guests; PP 35 ft, 28; others) with photos.
  5. **How booking works** → enquiry → quote → pay link; [CONFIRM].
  6. **Pickup and piers** → hotel transfer options [ask Mea], pier pins.
  7. **Good to know** → sea-state rule; night crossings only on party nights [ask Mea]; luggage.
  8. **Prices 2026** → "from" table [ask Mea].
  9. **Cancellation** → [CXL-DAY].
  10. **FAQ** → 8 Q&As.
- **Data blocks:** enquiry form (date, time, guests, from/to, hotel); comparison table; fleet cards; route map; sea card.
- **FAQ (exact questions):** 1 How long does a private speedboat take from Samui to Phangan? · 2 How much is a private boat to Koh Phangan? · 3 Can you pick us up from our beach or villa? · 4 Can we do a Koh Phangan day trip and come back? · 5 Is it cheaper than the ferry for a group? · 6 Can we travel at night? · 7 How much luggage can we bring? · 8 What if the sea is too rough?
- **Money links (internal):** FMP private speedboat, `/koh-samui-private-speedboat/`, Half Moon package · **Supporting guide links:** `/koh-samui-to-koh-phangan/`, `/koh-samui-sea-conditions/` · **Sister-site link:** kohphangan.com (Phangan beaches guide, for day-trip planning).
- **Images needed:** speedboat crossing with Phangan behind; arrival at a Phangan beach; luggage loading; Than Sadet [licensed]. 5–6 images.
- **Word target:** 1,900 (parity floor, P0.2; was 1,300)
- **Schema:** S-ENQUIRY (`Service` "Private speedboat transfer", `areaServed` Koh Samui, Koh Phangan).

#### `/product/full-moon-party-speedboat-koh-samui/` · D3 · MONEY
- **Primary keyword:** full moon party speedboat samui · **Secondary:** full moon party from koh samui transfer · koh samui to haad rin speedboat · full moon party boat ticket · full moon party transfer price
- **Title tag:** Full Moon Party Speedboat from Koh Samui 2026 | 1,400 THB · **Meta description:** Return speedboat from Koh Samui to the Full Moon Party on Haad Rin, with hotel pickup from most areas. 1,400 THB per person. See the next dates. (The next date is rendered from the events CPT, never typed into the meta.)
- **H1:** Full Moon Party Speedboat from Koh Samui (Shared Return)
- **Answer-first lead:** A shared return speedboat from Koh Samui to Haad Rin for the Full Moon Party, with hotel pickup and drop-off from most areas of Samui, for 1,400 THB per person in 2026 (about half the price of typical minivan-and-boat packages). Departures run in an 18:00–23:00 window; party entry (~200 THB) is paid in cash at the beach. Next dates: Tue 24 Nov 2026 (also Loy Krathong), Thu 24 Dec, Thu 31 Dec (NYE).
- **Section outline (H2 → H3):**
  1. **At a glance** → facts table (departure window 18:00–23:00; return window [ask Mea]; pier [ask Mea]; crossing time [check]; entry ~200 THB not included; min. age [ask Mea]).
  2. **Next Full Moon Party dates** → next 6 from CPT (24 Nov, 24 Dec, 31 Dec 2026; 22 Jan, 22 Feb★, 22 Mar 2027) with "moved" flags; link `/full-moon-party-dates/`.
  3. **How the night works** → pickup → pier → crossing → Haad Rin → choose your return slot → drop-off at your hotel.
  4. **What's included / not included** → return speedboat, hotel transfers from most areas [ask Mea: does the 400 THB remote surcharge apply?], life jackets; not included: party entry, drinks.
  5. **Shared or private boat?** → table (1,400 pp vs private [ask Mea price], up to 10 guests, your own times).
  6. **Stay safe on party night** → watch drinks (spiking warnings), stay with friends, no swimming drunk, keep your phone dry, unlicensed boats: don't board; carry a copy of your passport [check advice].
  7. **What to bring** → cash for entry and drinks, waterproof pouch, closed shoes (glass on the sand), charged phone, our WhatsApp number.
  8. **Good to know** → boats run only in safe sea conditions; weather cancellation = full refund or new date; booking closes midnight ICT the night before.
  9. **Prices 2026** → 1,400 pp [ask Mea: child policy if any; NYE price same?].
  10. **Cancellation** → [CXL-DAY].
  11. **FAQ** → 10 Q&As. 12. Reviews. 13. "Add a day trip tomorrow" rail (Pig Island afternoon/sunset).
- **Data blocks:** booking card with date list restricted to party dates (from CPT), return-slot select [ask Mea], countdown; facts table; dates table; shared vs private table; route map (Samui pier → Haad Rin).
- **FAQ (exact questions):** 1 How do I get from Koh Samui to the Full Moon Party? · 2 What time do the boats leave and return? · 3 Is the party entry ticket included? · 4 Which hotels does the Full Moon boat pick up from? · 5 When is the next Full Moon Party? · 6 Is it safe to take a speedboat at night? · 7 What happens if the sea is too rough? · 8 Can I book on the day of the party? · 9 Can I book for a group of 10 or more? · 10 Is the Full Moon Party on the same night as Loy Krathong this year?
- **Money links (internal):** FMP private speedboat, Half Moon package, Pig Island sunset (day after) · **Supporting guide links:** `/full-moon-party-from-koh-samui/`, `/full-moon-party-dates/`, `/precautions-safety/` · **Sister-site link:** kohphangan.com Haad Rin area guide, for guests who want to stay over [check URL].
- **Images needed:** hero speedboat with neon-lit Haad Rin beach behind (own/licensed); guests boarding at the pier; Haad Rin fire show; boat crew with life jackets; map graphic. 5–7 images; no identifiable intoxicated people.
- **Word target:** 1,500
- **Schema:** S-PRODUCT + each party date as `Event` (on event pages) referenced via `offers` URL.

#### `/product/full-moon-party-private-speedboat-koh-samui/` · D3 · MONEY
- **Primary keyword:** full moon party private speedboat · **Secondary:** private boat full moon party koh samui · vip speedboat full moon party · private transfer haad rin from samui · full moon party group boat
- **Title tag:** Full Moon Party Private Speedboat from Koh Samui 2026 · **Meta description:** Private speedboat for up to 10 guests from Koh Samui to the Full Moon Party, with hotel pickup and drop-off from most areas and your own return time. Book now.
- **H1:** Full Moon Party Private Speedboat from Koh Samui
- **Answer-first lead:** Your own speedboat to Haad Rin for up to 10 guests, with hotel pickup and drop-off from most areas of Samui and a return time you choose. Price per boat [ask Mea: 35,800 THB return vs 19,500 THB one way; show one model only]; booked and paid online in THB. Groups over 10 contact us on WhatsApp.
- **Section outline (H2 → H3):**
  1. At a glance (up to 10 guests incl. VIP option [ask Mea what VIP adds])
  2. Next party dates
  3. Why go private (own schedule, skip queues, celebrations)
  4. How the night works
  5. Included / not included (entry ~200 pp not included)
  6. Shared vs private table
  7. Stay safe
  8. Good to know (sea-state rule; cut-off)
  9. Prices 2026 (per boat)
  10. Cancellation [CXL-DAY]
  11. FAQ
  12. Reviews/rail.
- **Data blocks:** booking card (party date, outbound time, return time [ask Mea limits], guests up to 10); countdown; comparison table; dates table.
- **FAQ (exact questions):** 1 How many people fit on a private Full Moon boat? · 2 Can we choose our departure and return times? · 3 Does the private boat include pickup for the whole group? · 4 Is party entry included? · 5 What does the VIP option include? · 6 How far ahead should we book? · 7 What happens if the party date moves? · 8 What if the sea is unsafe?
- **Money links (internal):** FMP shared, `/private-speedboat-koh-samui-to-koh-phangan/`, Half Moon package · **Supporting guide links:** `/full-moon-party-from-koh-samui/`, `/full-moon-party-dates/` · **Sister-site link:** none.
- **Images needed:** private speedboat at night with group; Haad Rin; pier departure at dusk. 4–6 images.
- **Word target:** 1,500 (parity floor, P0.2; was 1,300)
- **Schema:** S-PRODUCT (offer per boat).

#### `/product/half-moon-festival-package-koh-samui/` · D3 · MONEY
- **Primary keyword:** half moon festival from koh samui · **Secondary:** half moon party koh samui boat · half moon festival tickets and transfer · magic forest half moon · half moon festival dates 2026
- **Title tag:** Half Moon Festival from Koh Samui 2026: Boat + Ticket · **Meta description:** Half Moon Festival Magic Forest packages from Koh Samui: speedboat and festival ticket in one booking, from 2,700 THB. Next nights: Thu 3 and Thu 17 December.
- **H1:** Half Moon Festival Packages from Koh Samui (Boat + Ticket)
- **Answer-first lead:** We sell the Half Moon Festival Magic Forest nights from Samui as one booking: speedboat plus the festival ticket, which we buy for you at the organiser's official price. Packages start from 2,700 THB [check: the 2026 Magic Forest ticket alone is 2,500 THB online]; the 2026 forest nights are Thursday 3 and Thursday 17 December in the Ban Tai jungle, 21:00 to sunrise.
- **Section outline (H2 → H3):**
  1. At a glance
  2. Next Magic Forest nights (3 Dec, 17 Dec 2026; 2027 only after the organiser publishes)
  3. Choose your package (three options mirroring the organiser's Samui packages [ask Mea: names, what each includes, prices])
  4. What is the Half Moon Festival (two-day format: beach-club day party ~15:00–24:00, then Magic Forest 21:00–sunrise; 2026 tickets day 1,300 / forest 2,500 / VIP 4,900)
  5. How the night works (pickup, boat, ticket handover [ask Mea], return)
  6. Included / not included
  7. Stay safe
  8. Good to know (age limit [check]; sea-state rule)
  9. Prices 2026
  10. Cancellation [CXL-DAY] [ask Mea: ticket refundability may differ once purchased]
  11. FAQ
  12. Rail.
- **Data blocks:** booking card with package select and date list; package comparison table (Package · Includes · Price THB); dates table; countdown.
- **FAQ (exact questions):** 1 When is the next Half Moon Festival? · 2 Is the festival ticket included? · 3 What is the difference between the packages? · 4 What time do boats leave and return? · 5 Can I buy only the boat? · 6 Is there an age limit? · 7 What if the festival is cancelled or moved? · 8 Can I cancel my package?
- **Money links (internal):** FMP shared, FMP private, `/private-speedboat-koh-samui-to-koh-phangan/` · **Supporting guide links:** `/koh-samui-party-calendar-2026-2027/`, `/koh-samui-events/` · **Sister-site link:** kohphangan.com Half Moon event page [check URL].
- **Images needed:** Magic Forest stage in the jungle (organiser permission); speedboat at night; Ban Tai. 3–5 images.
- **Word target:** 1,500 (parity floor, P0.2; was 1,200)
- **Schema:** S-PRODUCT + `Event` links.

---

#### P1.4 Private charters, sunset and yachting (enquiry → quote → pay link; fleet data from O12, never linked to speedboatsamui.com in the flow; [ask Mea] whether fleet prices are seasonal: market uses low May–Oct · high Nov–Apr · peak 15 Dec–15 Jan)

#### `/koh-samui-private-speedboat/` · D2 (charter hub) · MONEY
- **Primary keyword:** private speedboat koh samui · **Secondary:** speedboat charter koh samui · private boat hire koh samui · koh samui boat rental · private island hopping koh samui · speedboat koh samui price
- **Title tag:** Private Speedboat Charter Koh Samui 2026 | From 19,000 · **Meta description:** Charter a private speedboat on Koh Samui: 9 boats for 8 to 37 guests, from 19,000 THB per boat. Ang Thong, Pig Island, Koh Phangan and Koh Tao. Get a quote.
- **H1:** Private Speedboat Charter on Koh Samui
- **Answer-first lead:** We charter nine private speedboats from Koh Samui, from a 30 ft boat for up to 8 guests (from 19,000 THB) to a boat for up to 37 guests (from 46,000 THB), with captain, crew and fuel [ask Mea: fuel, snorkel gear and drinks included?]. Popular routes are Ang Thong (16 Dec–31 Oct), Pig Island and Koh Tan, Koh Phangan's beaches and Koh Tao. Send your date and group size; we quote, you pay by secure link in THB.
- **Section outline (H2 → H3):**
  1. **Our speedboats** → fleet table (data blocks) + cards with photos.
  2. **How much does a private speedboat cost?** → "from" prices are per boat with the stated guest basis (e.g. PP 30 ft: 19,000 for 4 guests); extras per guest above basis [ask Mea]; national park and island fees extra (300/150 Ang Thong; 250 Nang Yuan; ~50 Madsum).
  3. **Where to go: charter itineraries** → H3 Ang Thong (or fixed-price product 33,000) · H3 Pig Island, Koh Tan & Koh Rap · H3 Koh Som & Tongson Bay [check] · H3 Koh Phangan beaches (Bottle Beach, Than Sadet) · H3 Koh Tao & Nang Yuan · H3 Samui coastal sunset · H3 Full Moon Party night.
  4. **Half day or full day?** → durations [ask Mea: 4 h / 8 h tariffs], what fits in each.
  5. **What's included** → captain, crew, fuel, life jackets incl. children's, snorkel gear, water/soft drinks, insurance [ask Mea]; optional: lunch stop, hotel transfers, catering, decorations.
  6. **Choosing the right boat** → by group size, comfort (shade, toilet, cabin), sea state; speedboat vs catamaran (link).
  7. **When to charter** → Feb–Apr calmest; Nov–Dec east-side swell: choose south/west routes; Ang Thong closed 1 Nov–15 Dec.
  8. **How booking works** → enquiry form → quote within [ask Mea SLA] → pay link (Woo "pay for order" or Stripe link, same account) → [CONFIRM].
  9. **Piers and meeting points** → departure pier per boat [ask Mea]; hotel transfers optional.
  10. **Safety** → licensed boats and crews [ask Mea: registration wording], life jackets, we cancel when unsafe (full refund or new date).
  11. **Cancellation** → [CXL-DAY] for charters [ask Mea: same 48 h/50% rule for private charters?].
  12. **Private speedboat FAQ** → 10 Q&As.
- **Data blocks:** fleet table (Boat · Type · Max guests · Price basis · From THB): PP 30 ft (8 · 4 guests · 19,000) · NP (16 · 6 · 28,000) · PP 35 ft (28 · 6 · 29,000) · AP (30 · 12 · 30,000) · FS (28 · 6 · 30,000) · KT (14 · 6 · 30,000) · PP 40 ft (22 · 6 · 33,000) · COCO CAY (10 · 2 · 38,000) · MN (37 · 10 · 46,000); filter by guests; itinerary cards; enquiry form (date, half/full day, guests, destination, hotel, extras); route map; sea card.
- **FAQ (exact questions):** 1 How much is a private speedboat on Koh Samui? · 2 How many people fit on a speedboat? · 3 What is included in the charter price? · 4 Are national park fees included? · 5 Can we design our own route? · 6 Can you pick us up from our hotel or villa? · 7 Is a half-day charter possible? · 8 Can we go to Ang Thong in November? · 9 Is a speedboat suitable for young children or pregnant guests? · 10 How do we pay and when is the booking confirmed?
- **Money links (internal):** Ang Thong private speedboat, Pig Island private speedboat, FMP private speedboat, `/koh-samui-catamaran-charter/`, `/koh-samui-yacht-charter/` · **Supporting guide links:** `/islands-near-koh-samui/`, `/koh-samui-sea-conditions/`, `/koh-samui-tides/` · **Sister-site link:** none (speedboatsamui.com appears only in the footer row).
- **Images needed:** hero speedboat at speed off Samui; one photo per boat (9, from the speedboatsamui.com library); interior seating; snorkel stop; Koh Phangan beach arrival. 13 images.
- **Word target:** 1,800
- **Schema:** S-ENQUIRY + `ItemList` of `Product` (each boat, `offers` "from" with `priceSpecification`, no `availability` claim).

#### `/koh-samui-catamaran-charter/` · D2 (charter hub) · MONEY
- **Primary keyword:** catamaran charter koh samui · **Secondary:** sailing catamaran koh samui · private catamaran koh samui · catamaran day trip koh samui · koh samui sailing · catamaran sunset cruise koh samui
- **Title tag:** Catamaran Charter Koh Samui 2026 | From 20,000 THB · **Meta description:** Private sailing and power catamarans on Koh Samui for 13 to 45 guests, from 20,000 THB per boat: Ang Thong, Pig Island and sunset sails. Get a quote online.
- **H1:** Catamaran and Sailing Charters on Koh Samui
- **Answer-first lead:** A catamaran is the stable, spacious way to spend a day on the water: shade, nets for lounging and room for groups. Our boats range from a sailing catamaran for up to 13 guests (from 20,000 THB) to twin-engine catamarans for up to 45 guests (from 45,000 THB). Quote first, then pay by secure link in THB.
- **Section outline (H2 → H3):**
  1. **Our catamarans** → table: VICTORIA SAILING (sailing cat · 13 · basis 10 · 20,000) · BLUE COCO (cat · 25 · 10 · 36,000) · KIA ORA (cat · 45 · 15 · 36,000 + 7% VAT) · COCO PARADISE (twin-engine cat · 45 · 10 · 45,000) · private sailing catamaran [ask Mea: 21,000 vs 27,000 THB].
  2. **Why charter a catamaran** → stability, shade, toilets/cabins [ask Mea per boat], slower than speedboats (transit times [check]).
  3. **Itineraries** → H3 Ang Thong by catamaran (time realism) · H3 Pig Island & southern islands · H3 west-coast sunset sail · H3 Koh Phangan beaches.
  4. **Sailing vs motor catamaran** → table.
  5. **What's included** → [ask Mea per boat]; extras (catering, DJ, decorations).
  6. **Events on board** → birthdays, weddings, corporate groups (capacity, catering lead time).
  7. **Best season for sailing** → wind and sea by month (NE monsoon Nov–Feb [check sailing conditions]); calmest Feb–Apr.
  8. **How booking works** → enquiry → quote → pay link.
  9. **Cancellation and weather** → [CXL-DAY] [ask Mea for charters].
  10. **Catamaran FAQ** → 8 Q&As.
- **Data blocks:** fleet table; enquiry form; itinerary cards with durations; comparison table; sunset-time widget; sea card.
- **FAQ (exact questions):** 1 How much does a catamaran charter cost on Koh Samui? · 2 How many guests can a catamaran take? · 3 Do the catamarans actually sail? · 4 Can we go to Ang Thong by catamaran? · 5 Is food included? · 6 Are catamarans good for people who get seasick? · 7 Can we book a sunset-only charter? · 8 What happens if the weather is bad?
- **Money links (internal):** `/koh-samui-sunset-cruise/`, Boutique yachting day, `/koh-samui-private-speedboat/`, `/koh-samui-yacht-charter/` · **Supporting guide links:** `/koh-samui-sunset-spots/`, `/koh-samui-sea-conditions/` · **Sister-site link:** none.
- **Images needed:** hero catamaran under sail off Samui; one per boat (5); nets lounging; sunset on deck; group lunch on board. 9 images.
- **Word target:** 1,500
- **Schema:** S-ENQUIRY + `ItemList` of `Product` (boats).

#### `/koh-samui-yacht-charter/` · D2 (charter hub) · MONEY
- **Primary keyword:** yacht charter koh samui · **Secondary:** luxury yacht koh samui · motor yacht charter koh samui · private yacht koh samui price · junk boat koh samui · superyacht koh samui
- **Title tag:** Yacht Charter Koh Samui 2026: Motor Yachts & Junk Boat · **Meta description:** Private yachts on Koh Samui: a classic junk for up to 70 guests from 41,000 THB and motor yachts for 12 from 50,000 to 255,000 THB. Enquire for a quote.
- **H1:** Yacht Charter on Koh Samui
- **Answer-first lead:** For celebrations and luxury days we charter a classic junk yacht for up to 70 guests (from 41,000 THB) and motor yachts for up to 12 guests, from 50,000 THB (Casablanca) to 255,000 THB (Minor Affair) per charter. Every charter is quoted to your date and route and paid by secure link in THB.
- **Section outline (H2 → H3):**
  1. **Our yachts** → table: RED BARON (junk · 70 · basis 20 · 41,000) · CASABLANCA (motor yacht · 12 · 50,000) · MINOR AFFAIR (motor yacht · 12 · 255,000).
  2. **Which yacht for which occasion** → H3 large parties and weddings (junk) · H3 couples and families (Casablanca) · H3 luxury day (Minor Affair).
  3. **Routes** → west-coast cruise past the Four Seasons stretch (White Lotus filming area; view from the sea only) · Ang Thong · Pig Island · Koh Phangan.
  4. **What's included** → crew, fuel, toys [ask Mea per yacht].
  5. **Catering and extras** → chef, bar packages, photographer [ask Mea].
  6. **Prices and seasons** → "from" per charter; VAT/service notes [ask Mea]; peak 15 Dec–15 Jan [ask Mea].
  7. **How booking works** → enquiry → quote → pay link; deposit terms [ask Mea].
  8. **Cancellation and weather** → [CXL-DAY] [ask Mea for yachts].
  9. **Yacht charter FAQ** → 8 Q&As.
- **Data blocks:** fleet table; enquiry form (occasion, guests, date, duration, catering); route map; comparison table.
- **FAQ (exact questions):** 1 How much is a yacht charter on Koh Samui? · 2 How many guests can a yacht take? · 3 Is a chef or catering included? · 4 Can we see the White Lotus filming locations from the sea? · 5 Can we hire a yacht for a wedding or birthday? · 6 How long is a yacht charter? · 7 How far ahead should we book for Christmas and New Year? · 8 What happens if the sea is rough?
- **Money links (internal):** `/koh-samui-catamaran-charter/`, `/koh-samui-private-speedboat/`, Boutique yachting day, `/koh-samui-sunset-cruise/` · **Supporting guide links:** White Lotus Koh Samui guide [slug per P2], `/koh-samui-sea-conditions/` · **Sister-site link:** none.
- **Images needed:** hero motor yacht at anchor off a Samui bay; Red Baron junk under sail; interiors (2); deck dining; west-coast cliffs from the sea. 7 images.
- **Word target:** 3,800 (parity floor, P0.2; was 1,400)
- **Schema:** S-ENQUIRY + `ItemList` of `Product`.

#### `/koh-samui-sunset-cruise/` · D2 (mini hub) · MONEY
- **Primary keyword:** sunset cruise koh samui · **Secondary:** koh samui sunset boat · sunset catamaran koh samui · romantic boat trip koh samui · sunset dinner cruise samui
- **Title tag:** Koh Samui Sunset Cruise 2026: Shared & Private Boats · **Meta description:** Sunset boat trips on Koh Samui: Pig Island sunset tour with dinner from 1,550 THB, or a private catamaran or yacht for your group. Sunset times and best spots.
- **H1:** Koh Samui Sunset Cruises: Shared and Private
- **Answer-first lead:** The sun sets over the sea on Samui's west and south-west coasts, so sunset boats leave from that side (Thong Krut, Lipa Noi, Taling Ngam area). Our shared option is the Pig Island Sunset Tour with dinner (1,550 THB, 5–6 h); for couples and groups we quote private catamarans and yachts. Sunset is roughly 18:00–18:40 depending on the month [check].
- **Section outline (H2 → H3):**
  1. **Sunset cruise options** → cards: Pig Island sunset (book now) · private sailing catamaran (quote) · private speedboat sunset (quote) · motor yacht sunset (quote).
  2. **Shared or private?** → table.
  3. **Where the sun sets** → west coast (Lipa Noi, Taling Ngam, Five Islands), north coast views to Phangan; east coast = sunrise only.
  4. **Sunset times by month** → table [compute for 9.45, 99.94].
  5. **What a sunset cruise includes** → per option.
  6. **Proposals and celebrations** → private set-ups [ask Mea].
  7. **Season** → Feb–Apr clearest; Oct–Dec cloud and rain, boats run when safe.
  8. **How to book** → Book now (shared) / Get a quote (private).
  9. **Cancellation** → [CXL-DAY].
  10. **Sunset cruise FAQ** → 8 Q&As.
- **Data blocks:** option cards; comparison table; sunset-time table + live "sunset today" widget; map of departure points; sea card.
- **FAQ (exact questions):** 1 What time is sunset on Koh Samui? · 2 Which side of Koh Samui has the best sunset? · 3 How much is a sunset cruise? · 4 Is dinner included? · 5 Can we book a private sunset boat for two? · 6 Can I propose on a sunset cruise? · 7 Do sunset cruises run in the rainy season? · 8 What should I wear?
- **Money links (internal):** Pig Island sunset, `/koh-samui-catamaran-charter/`, `/koh-samui-yacht-charter/` · **Supporting guide links:** `/koh-samui-sunset-spots/`, `/koh-samui-weather/` · **Sister-site link:** none.
- **Images needed:** hero catamaran at sunset off the west coast; Five Islands silhouette from Taling Ngam; dinner on board; couple at the bow (model release). 5–6 images.
- **Word target:** 1,500 (parity floor, P0.2; was 1,300)
- **Schema:** S-HUB (`ItemList` of the options) + `FAQPage`.

#### `/product/boutique-yachting-day-koh-samui/` · D3 · MONEY
- **Primary keyword:** sailing day trip koh samui · **Secondary:** boutique yacht day koh samui · sailing yacht tour samui · luxury day trip koh samui · koh samui sailing tour
- **Title tag:** Boutique Yachting Day on Koh Samui 2026 | 4,500 THB · **Meta description:** A full day on a sailing yacht from Koh Samui: swimming stops, snorkelling and lunch on board, about 8 hours. 4,500 THB per person, booked online in THB.
- **H1:** Boutique Yachting Day on Koh Samui
- **Answer-first lead:** About 8 hours on a sailing yacht with swimming and snorkelling stops and lunch on board, for 4,500 THB per person in 2026. It is a shared day [ask Mea: guest limit, route, departure point and days of operation].
- **Section outline (H2 → H3):**
  1. **At a glance** → facts table (duration ~8 h, yacht type, departure [ask Mea], guests [ask Mea]).
  2. **Why a sailing day** → quieter than speedboats, time under sail, upmarket feel.
  3. **Route and itinerary** → timeline [ask Mea].
  4. **Lunch and drinks on board** → [ask Mea].
  5. **Included / not included** → [ask Mea]; park fees if Ang Thong.
  6. **Pickup areas** → [PICKUP] [ask Mea].
  7. **What to bring** · 8. **Good to know** (heeling under sail, seasickness, children's minimum age [ask Mea]).
  9. **Prices 2026** → 4,500 pp; child [ask Mea]; private option via catamaran hub.
  10. **Cancellation** → [CXL-DAY].
  11. **FAQ** → 8 Q&As. 12. Reviews. 13. Rail.
- **Data blocks:** booking card; facts table; timeline; sea card.
- **FAQ (exact questions):** 1 How many guests are on the yacht? · 2 Do we actually sail? · 3 Where does the yacht go? · 4 What is served for lunch? · 5 Is it suitable for children? · 6 Will I get seasick on a sailing yacht? · 7 Can we book the yacht privately? · 8 What if there's no wind or bad weather?
- **Money links (internal):** `/koh-samui-catamaran-charter/`, `/koh-samui-sunset-cruise/`, `/koh-samui-yacht-charter/` · **Supporting guide links:** `/islands-near-koh-samui/`, `/koh-samui-sea-conditions/` · **Sister-site link:** none.
- **Images needed:** yacht under sail; guests swimming off the stern; lunch on deck; anchorage. 5–6 images.
- **Word target:** 1,500 (parity floor, P0.2; was 1,200)
- **Schema:** S-PRODUCT.

---

#### P1.5 On the island (status per I2: **guide page with an enquiry CTA** until Mea confirms a partner and price; then becomes a Woo product with our 48 h policy, our or permitted photos, no partner link and the partner's name hidden if agreed. Market prices below are positioning only; never name the sellers. Welfare and safety rules from O11 apply.)

#### `/koh-samui-jungle-safari/` · D4 + enquiry card · MONEY
- **Primary keyword:** koh samui jungle safari · **Secondary:** 4x4 safari koh samui · koh samui island tour · jeep tour koh samui · koh samui sightseeing tour
- **Title tag:** Koh Samui Jungle Safari 2026: 4x4 Island Tour & Prices · **Meta description:** 4x4 jungle safari on Koh Samui: Na Muang Waterfall, Secret Buddha Garden, mummified monk, Hin Ta & Hin Yai and a hilltop lunch in one day. Enquire for prices.
- **H1:** Koh Samui Jungle Safari: 4x4 Island Tour
- **Answer-first lead:** A 4x4 jungle safari is the easiest way to see Samui's interior in one day: Na Muang Waterfall, the Secret Buddha Garden up a road most scooters can't handle, Wat Khunaram's mummified monk, Hin Ta & Hin Yai and a mountain-top lunch. Shared safaris run about 7 hours (10:00–17:00) and cost around 1,700 THB on the market in 2026 [check]; ask us for our price and private options.
- **Section outline (H2 → H3):**
  1. **Jungle safari at a glance** → duration ~7 h, typical stops, entry fees usually included [check], pickup zone (often Maenam–Lamai; west/south may cost extra [check]).
  2. **Typical route** → timeline with stop facts: Hin Ta & Hin Yai (free, parking 30) · Wat Khunaram (dress code) · Na Muang 1 (swim) · Secret Buddha Garden (80–100 THB [check]; steep road) · viewpoint lunch · Big Buddha (free, 07:00–18:30).
  3. **Shared or private safari** → private market ~US$279 pp [check, convert]; private 4x4 with driver [ask Mea].
  4. **What to wear and bring** → swimwear for the waterfall, temple cover-up, closed shoes.
  5. **Good to know** → bumpy open-back 4x4s (pregnancy/back problems), rainy season mud, child seats [check].
  6. **DIY alternative** → by scooter or car: which stops are easy, which need 4x4; IDP and helmet rules.
  7. **Animal welfare note** → no elephant riding or chained-animal stops on tours we sell.
  8. **Prices 2026** → our price [ask Mea]; market ~1,700 THB pp.
  9. **How to book** → **Enquire on WhatsApp** (→ Book now when product is live); [CXL-DAY] once live.
  10. **Jungle safari FAQ** → 8 Q&As.
- **Data blocks:** enquiry card (date, guests, hotel area); route map with all stops (GPS from O13); stops table (Stop · Entry · Time there · Note); weather widget.
- **FAQ (exact questions):** 1 What does a Koh Samui jungle safari include? · 2 How long does the safari take? · 3 Are entrance fees included? · 4 Is the safari suitable for children? · 5 Can we swim at Na Muang Waterfall? · 6 Can I do the route myself by scooter? · 7 Is it worth doing in the rainy season? · 8 Do any safari tours include elephant riding?
- **Money links (internal):** `/koh-samui-zipline/`, `/koh-samui-atv-quad-bike/`, Pig Island speedboat · **Supporting guide links:** `/na-muang-waterfall-koh-samui/`, `/secret-buddha-garden-koh-samui/`, `/koh-samui-waterfalls/` · **Sister-site link:** none.
- **Images needed:** hero 4x4 on a jungle road; Secret Buddha Garden statues; Na Muang 1 pool; Wat Khunaram monk (respectful, permitted angle); Hin Ta rock; viewpoint lunch. 6–8 images.
- **Word target:** 1,500
- **Schema:** S-GUIDE + S-ENQUIRY (`Service`), `ItemList` of stops as `TouristAttraction`.

#### `/koh-samui-elephant-sanctuary/` · D4 + enquiry card · MONEY
- **Primary keyword:** koh samui elephant sanctuary · **Secondary:** ethical elephant sanctuary koh samui · elephant sanctuary samui price · no riding elephant koh samui · elephant experience koh samui with kids
- **Title tag:** Ethical Elephant Sanctuary Koh Samui 2026: No Riding · **Meta description:** How to choose an ethical elephant sanctuary on Koh Samui: no riding, no bathing, honest welfare checks and 2026 prices (half day ~3,000 THB). Enquire with us.
- **H1:** Ethical Elephant Sanctuary Visits on Koh Samui (No Riding)
- **Answer-first lead:** Choose a Samui sanctuary where visitors watch and feed retired elephants but never ride or bathe them; that rules out several well-known names. Half-day visits with transfers and a vegetarian meal cost about 3,000 THB per adult (child ~1,500) in 2026. No Samui venue meets the strictest standard because all include feeding, so we explain the trade-offs honestly.
- **Section outline (H2 → H3):**
  1. **What "ethical" means on Koh Samui** → no riding, no bathing, no hooks/chains, no shows, small visitor numbers, retired/rescued elephants.
  2. **How to check a sanctuary** → 7-point checklist (data blocks).
  3. **What a half-day visit looks like** → timeline [ask Mea once partner chosen].
  4. **Sanctuaries and welfare status** → criteria table; names only if Mea approves [ask Mea]; the one listed by welfare organisations is in Bophut/Chaweng Noi (O11 [V]); do **not** promote the Na Mueang venue at the old Namuang Safari Park address until the riding question is verified; skip chained-elephant feeding at Overlap Stone.
  5. **Prices 2026** → half day ~3,000 adult / ~1,500 child; short encounters ~2,000 [check]; ours [ask Mea].
  6. **Visiting with children** → age bands [AGES], safety around large animals.
  7. **What to wear and bring** → clothes you don't mind getting muddy, insect repellent, closed shoes.
  8. **What we will never sell** → riding, bathing, shows, chained feeding.
  9. **How to book** → **Enquire on WhatsApp** (→ Book now when live).
  10. **Elephant sanctuary FAQ** → 8 Q&As.
- **Data blocks:** welfare checklist box; criteria comparison table (Riding · Bathing · Hooks/chains · Group size · Welfare listing · Half-day price); enquiry card; map (approximate areas only until partner set).
- **FAQ (exact questions):** 1 Is there an ethical elephant sanctuary on Koh Samui? · 2 Can you bathe with elephants on Koh Samui? · 3 How much does an elephant sanctuary visit cost? · 4 Is it suitable for young children? · 5 Why don't you sell elephant riding? · 6 What should I wear? · 7 Are hotel transfers included? · 8 How long is a visit?
- **Money links (internal):** `/koh-samui-jungle-safari/`, `/koh-samui-cooking-class/`, Pig Island speedboat · **Supporting guide links:** `/activities/`, `/koh-samui-with-kids/` [check slug], `/thai-culture-and-traditions/` · **Sister-site link:** kohphangan.com elephant sanctuary product [check URL] only if it is a no-riding product.
- **Images needed:** elephants walking freely in forest (partner permission); feeding platform; mud-wallow (elephants only, no tourists in water); guests observing at a distance. 4–6 images; no riding or chained imagery.
- **Word target:** 1,600
- **Schema:** S-GUIDE + S-ENQUIRY.

#### `/koh-samui-zipline/` · D4 + enquiry card · MONEY
- **Primary keyword:** koh samui zipline · **Secondary:** zipline koh samui price · tree top adventure samui · zip line maenam · koh samui adventure park
- **Title tag:** Koh Samui Zipline 2026: Prices, Sessions & What to Expect · **Meta description:** Ziplining on Koh Samui: 8 platforms and ~2 km of lines in the Maenam hills, about 60 minutes, from ~1,590 THB with 4WD pickup. Safety, ages and booking.
- **H1:** Koh Samui Zipline: Prices, Sessions and Safety
- **Answer-first lead:** Samui's best-known zipline runs 8 platforms and about 2,000 m of line in the Maenam hills in roughly 60 minutes, with sessions at 09:30, 12:30 and 14:30 and 4WD pickup between Chaweng and Maenam, from about 1,590 THB in 2026 [check]. West- and south-coast transfers cost extra per group. Ask us for our price and combos.
- **Section outline (H2 → H3):**
  1. **At a glance** → platforms, length, duration, sessions, pickup zone.
  2. **What to expect on the course** → briefing, harness, guides, waterfall walk [check].
  3. **Safety and limits** → min. age/height, max. weight [check], pregnancy, closed shoes.
  4. **Other zipline parks** → Lipa Noi park with ATV/UTV, 16-platform jungle course (~1,700) [check; no names unless approved].
  5. **Combos** → zipline + ATV / safari [ask Mea].
  6. **Prices 2026** → market ~1,590; ours [ask Mea]; remote transfers +1,400–1,800 per group [check].
  7. **Season** → runs in light rain; closes in storms [check].
  8. **How to book** → enquiry → Book now when live.
  9. **Zipline FAQ** → 8 Q&As.
- **Data blocks:** facts table; session times; enquiry card; map (approximate location).
- **FAQ (exact questions):** 1 How much is ziplining on Koh Samui? · 2 What is the minimum age for the zipline? · 3 Is there a weight limit? · 4 How long does the zipline take? · 5 Which areas does the zipline pickup cover? · 6 Does it run when it rains? · 7 Can I combine the zipline with an ATV ride? · 8 What should I wear?
- **Money links (internal):** `/koh-samui-atv-quad-bike/`, `/koh-samui-jungle-safari/` · **Supporting guide links:** `/maenam-koh-samui/`, `/activities/` · **Sister-site link:** kohphangan.com zipline product (Phangan Zipline partner) only for Phangan-based readers [check value].
- **Images needed:** rider on a line over the canopy; platform; briefing. 3–5 images (partner permission).
- **Word target:** 1,500 (parity floor, P0.2; was 1,200)
- **Schema:** S-GUIDE + S-ENQUIRY.

#### `/koh-samui-atv-quad-bike/` · D4 + enquiry card · MONEY
- **Primary keyword:** atv koh samui · **Secondary:** quad bike koh samui · atv tour samui price · off road koh samui · buggy tour koh samui
- **Title tag:** ATV & Quad Bike Tours Koh Samui 2026: Prices & Routes · **Meta description:** Guided ATV and quad bike tours on Koh Samui: 1- and 2-hour jungle routes to viewpoints and a hidden waterfall, from ~1,490 THB per rider. Safety and booking.
- **H1:** ATV and Quad Bike Tours on Koh Samui
- **Answer-first lead:** Guided ATV tours take 1 or 2 hours on jungle tracks in Samui's hills, with the 2-hour route adding a waterfall and a jungle bar stop; prices start around 1,490 THB per rider in 2026, including transfers, helmet and guide [check]. Passengers over 12 pay; ask us for our price and private departures.
- **Section outline (H2 → H3):**
  1. **At a glance** → durations, inclusions, rider/passenger rules (under-12 passenger free on request [check]).
  2. **Routes** → 1 h vs 2 h (viewpoint, waterfall, jungle bar).
  3. **Safety** → helmets, guide in front, no licence needed on private land [check], insurance cover, pregnancy and back problems.
  4. **ATV, buggy or UTV?** → table.
  5. **Rainy-season riding** → mud, slippery tracks, cancellations.
  6. **Prices 2026** → market 1,490 (1–2 h) to ~2,350 (2–3 h); ours [ask Mea].
  7. **Combos** → zipline + ATV.
  8. **How to book** → enquiry.
  9. **ATV FAQ** → 8 Q&As.
- **Data blocks:** facts table; route comparison; enquiry card.
- **FAQ (exact questions):** 1 How much is an ATV tour on Koh Samui? · 2 Do I need a driving licence? · 3 Can children ride as passengers? · 4 Is it safe for beginners? · 5 What should I wear? · 6 Does it run in the rain? · 7 Does the ATV tour include transfers from my hotel? · 8 Can I rent a quad bike for the road?
- **Money links (internal):** `/koh-samui-zipline/`, `/koh-samui-jungle-safari/` · **Supporting guide links:** `/koh-samui-roads/`, `/precautions-safety/` · **Sister-site link:** none.
- **Images needed:** ATV on a red-dirt jungle track; viewpoint stop; waterfall stop. 3–5 images.
- **Word target:** 1,500 (parity floor, P0.2; was 1,200)
- **Schema:** S-GUIDE + S-ENQUIRY.

#### `/koh-samui-cooking-class/` · D4 + enquiry card · MONEY
- **Primary keyword:** koh samui cooking class · **Secondary:** thai cooking class koh samui · cooking school samui · market tour cooking class samui · vegetarian cooking class koh samui
- **Title tag:** Thai Cooking Class Koh Samui 2026: Prices & What You Cook · **Meta description:** Thai cooking classes on Koh Samui: morning or evening sessions, market tours, southern dishes like wai khua, vegetarian options and 2026 prices. Enquire now.
- **H1:** Thai Cooking Classes on Koh Samui
- **Answer-first lead:** A Thai cooking class is the best rainy-day activity on Samui: 3–4 hours, usually a late-morning (around 11:00–14:00) or evening (around 16:00–20:00) session, cooking 3–5 dishes you then eat. Prices vary widely by school and transfer [check typical local rate; one well-known school sells from ~4,200 THB with private transfer]. Ask us for our partner price.
- **Section outline (H2 → H3):**
  1. **At a glance** → session times, length, dishes, group size, transfers.
  2. **What you'll cook** → classics (green curry, pad thai, tom yum) + southern/Samui dishes (wai khua octopus in coconut, gaeng som, khua kling) [ask Mea partner menu].
  3. **Market tour** → what you learn at a fresh market (Lamai fresh market 06:00–20:00 [check]).
  4. **Diets and allergies** → vegetarian/vegan, gluten, nuts, shellfish.
  5. **Classes for children and families** → min. age [ask Mea].
  6. **Choosing a school** → criteria (hands-on stations, group size, transfer, recipe book).
  7. **Prices 2026** → [check]; ours [ask Mea].
  8. **How to book** → enquiry.
  9. **Cooking class FAQ** → 8 Q&As.
- **Data blocks:** facts table; sample menu table (Dish · Region · Spice level · Veg option); enquiry card.
- **FAQ (exact questions):** 1 How much is a Thai cooking class on Koh Samui? · 2 How long is a class? · 3 Can vegetarians and vegans join? · 4 Is there a market tour? · 5 Can children take part? · 6 Does the cooking class include a transfer from my hotel? · 7 Do I get the recipes? · 8 Which dishes are unique to Koh Samui?
- **Money links (internal):** `/koh-samui-muay-thai/`, `/koh-samui-spa/`, Pig Island speedboat · **Supporting guide links:** `/koh-samui-restaurants/`, `/koh-samui-markets/`, `/thai-culture-and-traditions/` · **Sister-site link:** none.
- **Images needed:** cooking station with fresh herbs; wai khua dish; market produce; finished dishes plated. 4–6 images.
- **Word target:** 1,500 (parity floor, P0.2; was 1,200)
- **Schema:** S-GUIDE + S-ENQUIRY.

#### `/koh-samui-muay-thai/` · D4 + enquiry card · MONEY
- **Primary keyword:** muay thai koh samui · **Secondary:** muay thai training koh samui · muay thai camp koh samui · muay thai classes samui price · muay thai visa thailand (DTV)
- **Title tag:** Muay Thai on Koh Samui 2026: Training, Camps & Fights · **Meta description:** Muay Thai on Koh Samui: drop-in classes from ~500 THB, weekly and monthly camp prices, beginner tips and fight nights 6 days a week in Chaweng. Enquire with us.
- **H1:** Muay Thai on Koh Samui: Training, Camps and Fight Nights
- **Answer-first lead:** Samui has camps for complete beginners and serious fighters, with drop-in group classes from about 500 THB and weekly packages around 2,500–3,000 THB in 2026 [check]. To watch, two Chaweng stadiums share six fight nights a week (none on Thursday), tickets 1,500/2,000/2,500 THB. This page covers training; fight-night details live on the fight-nights page.
- **Section outline (H2 → H3):**
  1. **At a glance** → class times (typical two group sessions a day [check]), prices, areas (Chaweng/Bophut, Lamai).
  2. **Training for beginners** → what a class looks like, fitness level, kit.
  3. **Camps and packages** → drop-in · weekly 2,500–3,000 · monthly 7,500–10,000 [check]; training + accommodation options; camp names only if approved [ask Mea].
  4. **Private lessons** → price range [check].
  5. **Training on a long stay: the DTV visa** → "soft power" track includes Muay Thai courses; 5 years, 180 days/entry, 10,000 THB fee, 500,000 THB funds; criminal record certificate since 31 Aug 2026 [check]; link visa guide.
  6. **Watching a fight** → summary + link `/koh-samui-muay-thai-fight-nights/`.
  7. **Health and safety** → heat, hydration, injuries, insurance cover for contact sports.
  8. **How to book** → enquiry (classes) / Book now (stadium tickets, if partner approved [ask Mea]).
  9. **Muay Thai FAQ** → 8 Q&As.
- **Data blocks:** price table (Option · Price THB · Notes); weekly class timetable template [ask Mea]; enquiry card; map of camp areas.
- **FAQ (exact questions):** 1 Can complete beginners train Muay Thai on Koh Samui? · 2 How much is a Muay Thai class? · 3 How much is a week or month at a camp? · 4 What should I bring to training? · 5 Can I get a visa to train Muay Thai in Thailand? · 6 Are there women-only or kids' classes? · 7 Which nights are the fights? · 8 Is training safe if I'm not fit?
- **Money links (internal):** `/koh-samui-muay-thai-fight-nights/`, `/koh-samui-cooking-class/`, `/koh-samui-spa/` · **Supporting guide links:** `/thailand-visa-guide/`, `/koh-samui-travel-insurance/` · **Sister-site link:** kohphangan.com Muay Thai product (Chinnarach) only for Phangan-based readers [check].
- **Images needed:** pad work at a camp (consent); group class; gloves and wraps; stadium ring. 4–5 images.
- **Word target:** 1,500
- **Schema:** S-GUIDE + S-ENQUIRY.

#### `/koh-samui-golf/` · D4 · GUIDE
- **Primary keyword:** golf koh samui · **Secondary:** santiburi golf · koh samui golf course · green fee koh samui · royal samui golf
- **Title tag:** Golf on Koh Samui 2026: Courses, Green Fees & Tips · **Meta description:** Golf on Koh Samui: Santiburi's 18-hole, par-72 course from ~5,600 THB with caddie and cart, a 9-hole hill course, best tee times and booking help.
- **H1:** Golf on Koh Samui: Courses and Green Fees (2026)
- **Answer-first lead:** Samui's main course is Santiburi Samui Country Club in the Maenam hills: 18 holes, par 72, 6,930 yards, about 5,600 THB for 18 holes or 2,825 THB for 9 with caddie and cart included [check]. A smaller 9-hole, par-33 course sits in the Bophut hills [check status and fees]. Tee off early to beat the heat.
- **Section outline (H2 → H3):**
  1. **Golf courses at a glance** → table.
  2. **Santiburi Samui Country Club** → layout, hills, views, dress code, fees.
  3. **Royal Samui Golf & Country Club** → 9 holes, no caddies [check], fees [uncertain].
  4. **Best time to play** → early tee times; Feb–Apr driest; Oct–Dec rain.
  5. **Getting there** → from Chaweng/Bophut/Lamai (minutes [check]), taxi, rental clubs.
  6. **Golf for non-golfers** → driving range, lessons [check].
  7. **Booking a round** → enquiry (we arrange tee times [ask Mea]).
  8. **Golf FAQ** → 6 Q&As.
- **Data blocks:** courses table (Course · Holes · Par · Yards · Green fee · Caddie/cart · Area); map; weather widget.
- **FAQ (exact questions):** 1 How much is a round of golf on Koh Samui? · 2 Is a caddie compulsory? · 3 Can I rent clubs? · 4 What is the dress code? · 5 What is the best time of day to play? · 6 Can you book a tee time for us?
- **Money links (internal):** `/koh-samui-spa/`, `/koh-samui-private-speedboat/` · **Supporting guide links:** `/maenam-koh-samui/`, `/getting-around-koh-samui/` · **Sister-site link:** none.
- **Images needed:** fairway with sea view (course permission); clubhouse; buggy path. 3–4 images.
- **Word target:** 2,000 (parity floor, P0.2; was 1,200)
- **Schema:** S-GUIDE + `ItemList` of `GolfCourse` with `geo`.

#### `/koh-samui-spa/` · D4 · GUIDE
- **Primary keyword:** koh samui spa · **Secondary:** thai massage koh samui price · best spa koh samui · massage chaweng · couples spa koh samui · day spa samui
- **Title tag:** Koh Samui Spa & Massage Guide 2026: Prices by Area · **Meta description:** Thai massage on Koh Samui costs 300–500 THB an hour (Chaweng 400–600); resort spas 1,800–3,500+. Where to go, what to choose and how to spot a good spa.
- **H1:** Koh Samui Spa and Massage Guide (2026 Prices)
- **Answer-first lead:** A one-hour Thai massage costs 300–500 THB on most of Samui in 2026 (Chaweng 400–600, Lamai 300–450, Bophut and Maenam 300–400); oil massage 400–700. Resort spas charge 1,800–3,500 THB and top spas 2,500–10,000+. Book a resort spa for treatments and setting; a good street spa for value.
- **Section outline (H2 → H3):**
  1. **Massage prices by area** → table.
  2. **Types of massage** → Thai, oil, foot, herbal compress, aloe after sun.
  3. **Street spa or resort spa?** → table and honest trade-offs.
  4. **Signature spas and jungle spas** → named in guide context only, no links (e.g. Lamai-hills rock-pool spa) [check names policy].
  5. **How to spot a good spa** → licence display, clean linen, therapist questions.
  6. **Spa etiquette and tipping** → 50–100 THB tip norm [check].
  7. **Massage training courses** → [check].
  8. **Rainy-day wellness** → link retreats.
  9. **Spa FAQ** → 6 Q&As.
- **Data blocks:** price table (Treatment · Street spa · Resort spa); area map; sidebar booking card (Pig Island sunset, cooking class, retreats).
- **FAQ (exact questions):** 1 How much is a Thai massage on Koh Samui? · 2 Should I tip after a massage? · 3 Is Thai massage painful? · 4 Can I get a massage when pregnant? · 5 Where are the best spas on Koh Samui? · 6 Do I need to book ahead?
- **Money links (internal):** `/koh-samui-retreats/`, `/koh-samui-cooking-class/`, Pig Island sunset · **Supporting guide links:** `/lamai-koh-samui/`, `/koh-samui-retreats/` · **Sister-site link:** none.
- **Images needed:** beach massage pavilion; resort spa room; herbal compress; foot massage. 4 images.
- **Word target:** 3,300 (parity floor, P0.2; was 1,300)
- **Schema:** S-GUIDE.

#### P1.6 Diving and water sports

#### `/koh-samui-diving/` · D4 (diving hub) · HUB
- **Primary keyword:** koh samui diving · **Secondary:** sail rock diving from koh samui · scuba diving koh samui · padi course koh samui · diving koh tao from samui · discover scuba koh samui
- **Title tag:** Koh Samui Diving 2026: Sail Rock, Koh Tao & Courses · **Meta description:** Diving from Koh Samui: Sail Rock 2-dive trips from ~4,650 THB, Koh Tao fun dives, Discover Scuba and Open Water courses, best months (Mar–Apr clearest).
- **H1:** Diving from Koh Samui: Sail Rock, Koh Tao and Courses (2026)
- **Answer-first lead:** Samui's reefs are modest, so most diving from Samui is by day boat to Sail Rock (a pinnacle between Samui and Koh Tao; 2-dive trips from ~4,650 THB in 2026) or to Koh Tao and Ang Thong. The diving season around Ang Thong runs February–October with the clearest water in March–April. Learning? Open Water from Samui with two nights on Koh Tao costs ~18,000 THB vs ~14,000 THB if you start on Koh Tao [check].
- **Section outline (H2 → H3):**
  1. **Diving from Samui at a glance** → table of trips and courses.
  2. **Dive sites** → H3 Sail Rock (pinnacle, chimney [check]) · H3 Koh Tao sites (via day boat) · H3 Ang Thong (closed 1 Nov–15 Dec) · H3 Samui shore/house reefs [check].
  3. **Fun dives from Samui** → product block (when partner set): Koh Tao / Sail Rock fun dives [ask Mea].
  4. **Learn to dive** → H3 Discover Scuba · H3 PADI/SSI Open Water (Samui vs Koh Tao) · H3 Advanced.
  5. **When to dive** → month table: visibility/season; NE monsoon Nov–Dec rougher.
  6. **What it costs** → table (Sail Rock 2 dives from ~4,650; fun diver 5 dives + 1 night Tao ~10,500; OW from Samui ~18,000) [check all].
  7. **Safety and medical** → dive medical questionnaire, insurance covering diving, hyperbaric chamber in Bophut (SSS Network [check address and 24 h number]), no flying within 18–24 h after diving.
  8. **Snorkelling instead** → link snorkelling page.
  9. **How booking works** → partner products under our 48 h policy, no partner names/links if agreed [ask Mea partner].
  10. **Diving FAQ** → 8 Q&As.
- **Data blocks:** trips/courses table; dive-site map (Sail Rock, Koh Tao, Ang Thong); season table; product cards (pending partner).
- **FAQ (exact questions):** 1 Is diving good on Koh Samui? · 2 How far is Sail Rock from Koh Samui? · 3 How much does a dive trip from Samui cost? · 4 Should I do my Open Water course on Samui or Koh Tao? · 5 What is the best month to dive? · 6 Can I dive in November? · 7 Is there a recompression chamber on Koh Samui? · 8 Do I need dive insurance?
- **Money links (internal):** fun dives product, Discover Scuba product, Open Water product, Koh Tao day trip · **Supporting guide links:** `/koh-samui-snorkeling/`, `/koh-samui-to-koh-tao/`, `/koh-samui-travel-insurance/` · **Sister-site link:** kohphangan.com diving (Sail Rock partner already sold there) [check URL].
- **Images needed:** diver at Sail Rock with fish schools (licensed/partner); dive boat; training in shallow water; Koh Tao bay; map graphic. 5–6 images.
- **Word target:** 1,800
- **Schema:** S-HUB (`ItemList` of dive products) + `FAQPage`.

#### `/product/sail-rock-koh-tao-fun-dives-koh-samui/` (slug [check]) · D3 · MONEY (launch only once partner confirmed)
- **Primary keyword:** sail rock dive trip from koh samui · **Secondary:** fun dives koh samui · koh tao fun dive from samui · 2 dive trip samui · certified diver trip samui
- **Title tag:** Sail Rock Fun Dives from Koh Samui 2026 | Price [ask Mea] · **Meta description:** Two guided fun dives at Sail Rock or Koh Tao from Koh Samui, with gear, lunch, insurance and transfers from most areas. For certified divers. Book in THB.
- **H1:** Sail Rock & Koh Tao Fun Dives from Koh Samui
- **Answer-first lead:** A day boat from Samui for certified divers: two guided dives at Sail Rock or Koh Tao with gear, lunch, insurance and transfers. Market price from ~4,650 THB in 2026; our price [ask Mea]. Pickup ~08:00, back ~15:30 [check with partner].
- **Section outline (H2 → H3):**
  1. At a glance
  2. Dive sites
  3. Itinerary
  4. Certification and experience required
  5. Included / not included (park fee if Ang Thong; marine fee [check])
  6. Pickup areas [PICKUP]
  7. Safety (medical form, insurance, chamber)
  8. Season
  9. Prices 2026
  10. Cancellation [CXL-DAY]
  11. FAQ (6)
  12. Rail.
- **Data blocks:** booking card (cert level select); facts table; site map.
- **FAQ (exact questions):** 1 What certification do I need? · 2 Is equipment included? · 3 How deep are the dives? · 4 Can a non-diver come along to snorkel? · 5 What is the visibility like? · 6 What if the trip is cancelled for weather?
- **Money links (internal):** Discover Scuba, Open Water, Koh Tao day trip · **Supporting guide links:** `/koh-samui-diving/`, `/koh-samui-sea-conditions/` · **Sister-site link:** none.
- **Images needed:** Sail Rock pinnacle underwater; dive deck; briefing. 3–4 images (partner permission).
- **Word target:** 1,200
- **Schema:** S-PRODUCT.

#### `/product/discover-scuba-koh-samui/` (slug [check]) · D3 · MONEY (once partner confirmed)
- **Primary keyword:** discover scuba diving koh samui · **Secondary:** try diving koh samui · beginner diving samui · first dive koh samui · scuba for beginners thailand
- **Title tag:** Discover Scuba Diving on Koh Samui 2026 | Try a Dive · **Meta description:** Try scuba diving on Koh Samui with no experience: pool or shallow-water skills, then a guided open-water dive with an instructor. Ages, medical rules, prices.
- **H1:** Discover Scuba Diving on Koh Samui (No Experience Needed)
- **Answer-first lead:** A half or full day for non-divers: a skills session with an instructor, then one or two shallow guided dives [ask Mea partner format]. Price [ask Mea]; minimum age typically 10 [check]; a medical questionnaire is required.
- **Section outline (H2 → H3):**
  1. At a glance
  2. How the day works
  3. Who can join (age, medical, swimming ability)
  4. Where you dive
  5. Included / not included
  6. Pickup [PICKUP]
  7. Safety
  8. From Discover Scuba to Open Water (credit [check])
  9. Prices 2026
  10. Cancellation [CXL-DAY]
  11. FAQ (6)
  12. Rail.
- **Data blocks:** booking card; facts table; medical checklist link.
- **FAQ (exact questions):** 1 Do I need to be a strong swimmer? · 2 What is the minimum age? · 3 How deep will I go? · 4 Can I do it if I wear glasses or contact lenses? · 5 Does it count towards Open Water? · 6 What medical conditions stop me diving?
- **Money links (internal):** Open Water, fun dives · **Supporting guide links:** `/koh-samui-diving/`, `/koh-samui-snorkeling/` · **Sister-site link:** none.
- **Images needed:** instructor with beginner in shallow water; pool session; first dive over reef. 3 images.
- **Word target:** 1,200
- **Schema:** S-PRODUCT.

#### `/product/padi-open-water-koh-samui/` (slug [check]) · D3 · MONEY (once partner confirmed)
- **Primary keyword:** padi open water koh samui · **Secondary:** open water course koh samui price · learn to dive koh samui · ssi open water samui · dive course koh samui
- **Title tag:** PADI Open Water Course from Koh Samui 2026: Price & Days · **Meta description:** Get your PADI Open Water on a course from Koh Samui: theory, confined water and four open-water dives over 3–4 days. Samui vs Koh Tao prices, ages, booking.
- **H1:** PADI Open Water Course from Koh Samui
- **Answer-first lead:** The entry-level certification: theory, confined-water skills and four open-water dives over 3–4 days [check partner schedule]. Learning from a Samui base with two nights on Koh Tao costs about 18,000 THB vs about 14,000 THB starting on Koh Tao (2026 market [check]); our price [ask Mea].
- **Section outline (H2 → H3):**
  1. At a glance
  2. Course schedule day by day
  3. Samui-based or Koh Tao? (table)
  4. Who can join
  5. Included / not included (e-learning, certification fee, accommodation [check])
  6. Pickup [PICKUP]
  7. Safety and medical
  8. After your course
  9. Prices 2026
  10. Cancellation [CXL-DAY]
  11. FAQ (6)
  12. Rail.
- **Data blocks:** booking card; schedule timeline; comparison table.
- **FAQ (exact questions):** 1 How many days does the Open Water course take? · 2 Is it cheaper to learn on Koh Tao? · 3 Is accommodation included? · 4 What is the minimum age? · 5 Can I do the theory online before I arrive? · 6 What if I can't finish the course?
- **Money links (internal):** Discover Scuba, fun dives, Koh Tao day trip · **Supporting guide links:** `/koh-samui-diving/`, `/koh-samui-to-koh-tao/` · **Sister-site link:** none.
- **Images needed:** students on a dive boat; skills underwater; certification moment. 3 images.
- **Word target:** 1,300
- **Schema:** S-PRODUCT + `Course` [check fit].

#### `/koh-samui-snorkeling/` · D4 · GUIDE
- **Primary keyword:** snorkeling koh samui · **Secondary:** best snorkelling koh samui · koh samui snorkel tour · snorkelling spots samui · koh tan snorkelling
- **Title tag:** Snorkelling Koh Samui 2026: Best Spots & Boat Trips · **Meta description:** Where to snorkel on and around Koh Samui: Koh Tan, Ang Thong, Koh Nang Yuan, Silver Beach and Coral Cove, with seasons, tides, jellyfish safety and tours.
- **H1:** Snorkelling on Koh Samui: Best Spots, Seasons and Boat Trips
- **Answer-first lead:** Samui's own beaches have limited reef, so the best snorkelling is by boat: Koh Tan on Pig Island trips (all year), Ang Thong (mid-December to October) and Koh Nang Yuan off Koh Tao. From the shore, try Silver Beach, Coral Cove (wear water shoes) and Chaweng Noi. Go February–April for the calmest, clearest water.
- **Section outline (H2 → H3):**
  1. **Best snorkelling spots map** → map + table.
  2. **Snorkelling by boat** → H3 Koh Tan · H3 Ang Thong (Koh Wao [ask Mea]) · H3 Koh Nang Yuan & Koh Tao · H3 Koh Rap.
  3. **Snorkelling from the beach** → H3 Silver Beach · H3 Coral Cove (coral health reports mixed [check]) · H3 Chaweng Noi · H3 Tongson Bay.
  4. **When to snorkel** → month table; tides (north/west tidal flats; high tide better) + tide widget.
  5. **Safety** → box jellyfish (vinegar 30 s+, no rubbing or fresh water), currents and red flags (Oct–Dec east), boat traffic, sun.
  6. **Reef etiquette** → no touching or standing on coral, reef-safe sunscreen.
  7. **Gear** → our tours include masks/snorkels; kids' sizes [ask Mea].
  8. **Snorkelling FAQ** → 8 Q&As.
- **Data blocks:** spots map; spots table (Spot · Access · Best months · Depth · Kids?); tide + sea widgets; sidebar booking card.
- **FAQ (exact questions):** 1 Where is the best snorkelling near Koh Samui? · 2 Can you snorkel from the beach on Koh Samui? · 3 What month is best for snorkelling? · 4 Are there jellyfish around Koh Samui? · 5 Is snorkelling possible for non-swimmers? · 6 Do tours provide snorkel gear? · 7 Does the tide matter? · 8 Is Ang Thong or Koh Tao better for snorkelling?
- **Money links (internal):** Pig Island speedboat, Ang Thong speedboat, Koh Tao day trip · **Supporting guide links:** `/koh-samui-tides/`, `/koh-samui-beaches/`, `/koh-samui-diving/` · **Sister-site link:** none.
- **Images needed:** snorkeller at Koh Tan; Silver Beach; Nang Yuan reef; vinegar station sign. 4–6 images.
- **Word target:** 1,600
- **Schema:** S-GUIDE + `ItemList` of `TouristAttraction`.

#### `/koh-samui-kitesurfing/` · D4 · GUIDE
- **Primary keyword:** kitesurfing koh samui · **Secondary:** kite spots koh samui · kitesurf season samui · kite lessons koh samui · wing foil koh samui
- **Title tag:** Kitesurfing Koh Samui 2026: Season, Spots & Lessons · **Meta description:** When and where to kitesurf on Koh Samui: wind season by month, spots by wind direction, lessons, rental and safety, plus nearby options on Koh Phangan.
- **H1:** Kitesurfing on Koh Samui: Season, Spots and Lessons
- **Answer-first lead:** Samui's kite season follows the monsoon winds: the NE monsoon brings the most reliable wind roughly December–March, with a lighter SW season mid-year [check all with a local school]. Spots depend on wind direction; choose a school-supervised beach. [Facts on this page are largely unverified; research must confirm spots and months before publishing.]
- **Section outline (H2 → H3):**
  1. **Kite season by month** → table [check].
  2. **Spots by wind direction** → H3 NE wind spots [check] · H3 SW wind spots [check].
  3. **Lessons and courses** → beginner hours, IKO certification [check], prices [check].
  4. **Rental and gear** → [check].
  5. **Wing foil and SUP alternatives** → light-wind days.
  6. **Safety** → offshore wind, swimmers, boat lanes, jellyfish.
  7. **Kiting on Koh Phangan** → short note + sister link (kohphangan.com sells kite courses).
  8. **Kitesurfing FAQ** → 6 Q&As.
- **Data blocks:** wind-by-month table (Open-Meteo wind climatology); spot map; live wind widget (Open-Meteo, utility link to Windy allowed).
- **FAQ (exact questions):** 1 When is the kitesurfing season on Koh Samui? · 2 Where can I kitesurf on Koh Samui? · 3 How long does it take to learn? · 4 Can I rent kite gear? · 5 Is Koh Samui good for beginners? · 6 Is Koh Phangan better for kiting?
- **Money links (internal):** `/koh-samui-private-speedboat/` (downwinder support [ask Mea]), `/koh-samui-kayak-sup/` · **Supporting guide links:** `/koh-samui-weather/`, `/koh-samui-sea-conditions/` · **Sister-site link:** kohphangan.com kitesurfing page [check URL].
- **Images needed:** kiter on a Samui beach (own/licensed, verified location); lesson on the sand; wind map graphic. 3 images.
- **Word target:** 2,800 (parity floor, P0.2; was 1,200)
- **Schema:** S-GUIDE.

#### `/koh-samui-jet-ski/` · D4 · GUIDE
- **Primary keyword:** jet ski koh samui · **Secondary:** jet ski scam koh samui · jet ski rental chaweng · jet ski price koh samui · jet ski rules thailand
- **Title tag:** Jet Ski Koh Samui 2026: Prices, Rules & Scams to Avoid · **Meta description:** Renting a jet ski on Koh Samui: what it costs, the damage-claim scam and how to avoid it, why not to leave your passport, and a safer guided jet ski safari.
- **H1:** Jet Skis on Koh Samui: Prices, Rules and How to Avoid Scams
- **Answer-first lead:** Beach jet ski rental on Chaweng and Lamai is where most Samui scam complaints start: riders are blamed for "damage" that was already there and pressured to pay. Never hand over your passport as a deposit (UK FCDO advice), photograph and film the jet ski before you ride, and agree terms in writing. The safer way is a guided jet ski safari (ours: 9,950 THB per jet ski to Pig Island).
- **Section outline (H2 → H3):**
  1. **Jet ski prices on Samui** → typical rental per 15/30 min [check].
  2. **The damage scam and how it works** → pattern, red flags.
  3. **How to rent safely** → 8-step checklist (photos/video, written price, no passport, check life jackets, stay in zone, sober, card not cash deposit [check], Tourist Police 1155).
  4. **Rules and safety** → swim zones, distance from swimmers, alcohol, age [check], insurance exclusions.
  5. **If something goes wrong** → stay calm, call Tourist Police 1155, embassy, don't pay on the beach under pressure.
  6. **Guided jet ski safari** → product block 9,950/jet ski.
  7. **Jet ski FAQ** → 6 Q&As.
- **Data blocks:** checklist box; emergency numbers box (1155, 191, 1669); product card.
- **FAQ (exact questions):** 1 How much does it cost to rent a jet ski on Koh Samui? · 2 Are jet ski scams still a problem? · 3 Should I leave my passport as a deposit? · 4 Do I need a licence to ride a jet ski? · 5 Does travel insurance cover jet skis? · 6 What should I do if I'm accused of damage?
- **Money links (internal):** Jet Ski Safari to Pig Island, `/koh-samui-private-speedboat/` · **Supporting guide links:** `/precautions-safety/`, `/koh-samui-tourist-police/`, `/koh-samui-travel-insurance/` · **Sister-site link:** none.
- **Images needed:** jet skis lined up on Chaweng beach (no identifiable operators); rider with life jacket; checklist graphic. 3 images.
- **Word target:** 1,900 (parity floor, P0.2; was 1,300)
- **Schema:** S-GUIDE.

#### `/koh-samui-kayak-sup/` · D4 · GUIDE
- **Primary keyword:** kayak koh samui · **Secondary:** sup koh samui · stand up paddle koh samui · kayaking ang thong · kayak rental chaweng
- **Title tag:** Kayak & SUP on Koh Samui 2026: Where to Paddle · **Meta description:** Kayaking and stand-up paddleboarding on Koh Samui: Coral Cove rentals (~300 THB/hour), calm bays by season, kayaking in Ang Thong and safety tips.
- **H1:** Kayaking and Stand-Up Paddleboarding on Koh Samui
- **Answer-first lead:** The best paddling near Samui is in Ang Thong Marine Park, where kayaking is included on our day tours (mid-December to October). On Samui itself, rent at Coral Cove (about 300 THB an hour [check]) or paddle the calm north and north-east bays (Choeng Mon, Maenam) in the dry season; avoid the east coast October–December.
- **Section outline (H2 → H3):**
  1. **Where to paddle** → map + table.
  2. **Kayaking in Ang Thong** → what the tour includes; closure.
  3. **Beach rentals** → prices [check].
  4. **SUP lessons and tours** → [check; no names].
  5. **Best conditions** → wind and tide; mornings calmer.
  6. **Safety** → offshore winds, life jackets, sun, jellyfish.
  7. **Kayak & SUP FAQ** → 6 Q&As.
- **Data blocks:** spot table (Spot · Rental · Best months · Level); map; tide + wind widgets.
- **FAQ (exact questions):** 1 Where can I rent a kayak on Koh Samui? · 2 How much is kayak or SUP rental? · 3 Is kayaking included on the Ang Thong tour? · 4 When is the sea calm enough to paddle? · 5 Can children kayak? · 6 Can I paddle to Koh Fan Noi from Choeng Mon?
- **Money links (internal):** Ang Thong speedboat, Ang Thong overnight camping, Pig Island longtail · **Supporting guide links:** `/koh-samui-beaches/`, `/koh-samui-tides/` · **Sister-site link:** none.
- **Images needed:** kayaks in an Ang Thong lagoon; SUP at Choeng Mon morning; Coral Cove. 3–4 images.
- **Word target:** 1,900 (parity floor, P0.2; was 1,200)
- **Schema:** S-GUIDE.

#### `/koh-samui-fishing/` · D4 + enquiry card · MONEY
- **Primary keyword:** fishing trip koh samui · **Secondary:** fishing charter koh samui · squid fishing samui · night fishing koh samui · deep sea fishing koh samui
- **Title tag:** Fishing Trips Koh Samui 2026: Day, Night & Private · **Meta description:** Fishing from Koh Samui: shared day trips around 1,500 THB, night squid fishing, and private charters on our boats with crew and gear. Seasons, catches, booking.
- **H1:** Fishing Trips on Koh Samui: Day, Night and Private Charters
- **Answer-first lead:** Shared fishing day trips from Samui cost around 1,500 THB in 2026 (typically 10:00–16:00 with lunch and the catch cooked), and night squid trips run about 20:00–02:00 [check]. For a group, a private speedboat with crew and gear gives you your own spots and timing [ask Mea: which boats take fishing charters and rods/bait included?].
- **Section outline (H2 → H3):**
  1. **Fishing options at a glance** → table (shared day · night squid · private half/full day).
  2. **What you can catch** → species by season [check].
  3. **Night squid fishing** → how it works.
  4. **Private fishing charters** → fleet boats suitable [ask Mea], market half day 10,000–21,000 per boat [check].
  5. **Rules and responsible fishing** → national park no-fishing zones (Ang Thong) [check], catch and release.
  6. **Season and sea** → Feb–Sep best; Nov–Dec rough.
  7. **How to book** → enquiry → quote → pay.
  8. **Fishing FAQ** → 6 Q&As.
- **Data blocks:** options table; enquiry card; sea widget.
- **FAQ (exact questions):** 1 How much is a fishing trip on Koh Samui? · 2 Do I need my own rod? · 3 Can we cook what we catch? · 4 Is night squid fishing good for kids? · 5 Can we fish in Ang Thong Marine Park? · 6 What is the best season for fishing?
- **Money links (internal):** `/koh-samui-private-speedboat/`, Pig Island private speedboat · **Supporting guide links:** `/koh-samui-sea-conditions/`, `/hua-thanon-koh-samui/` [check slug] · **Sister-site link:** none.
- **Images needed:** rod on a boat at sea; squid boat lights at night; catch being grilled. 3 images.
- **Word target:** 1,500 (parity floor, P0.2; was 1,200)
- **Schema:** S-GUIDE + S-ENQUIRY.

#### `/product/khao-sok-2-day-trip-koh-samui/` · D3 · MONEY (only if a partner is confirmed)
- **Primary keyword:** khao sok from koh samui · **Secondary:** khao sok 2 day trip · cheow lan lake tour from samui · khao sok overnight tour · khao sok day trip from koh samui (answer: not realistic)
- **Title tag:** Khao Sok 2-Day Trip from Koh Samui 2026: Cheow Lan Lake · **Meta description:** Khao Sok from Koh Samui as a 2-day, 1-night trip: ferry, transfer, Cheow Lan Lake longtail and a floating-raft night. Why it isn't a day trip, prices, booking.
- **H1:** Khao Sok 2-Day, 1-Night Trip from Koh Samui
- **Answer-first lead:** Khao Sok is 4–6 hours each way from Samui (ferry to Donsak plus about 190 km by road), so we sell it only as a 2-day, 1-night trip, not a day tour. The highlight is Cheow Lan Lake by longtail with a night on a floating raft house [ask Mea partner programme]; the lake fee for foreigners is about 300 THB + 40 THB pier fee [check]. Price [ask Mea].
- **Section outline (H2 → H3):**
  1. **At a glance** → 2D1N, travel time each way, accommodation type, meals [ask Mea].
  2. **Why not a day trip** → travel maths (ferry ~1.5 h + road 3–4 h [check]); honest verdict.
  3. **Itinerary** → H3 Day 1 · H3 Day 2 (timeline [ask Mea]).
  4. **Cheow Lan Lake and the raft houses** → what to expect, electricity, swimming, caves [check].
  5. **Included / not included** → lake/park fees, meals, transfers.
  6. **Pickup** → [PICKUP] + early start.
  7. **What to pack** → overnight bag, torch, insect repellent, rain jacket.
  8. **Good to know** → long road travel, motion sickness, monsoon on the mainland (May–Oct wetter [check]), families.
  9. **Prices 2026** → [ask Mea].
  10. **Cancellation** → [CXL-DAY].
  11. **FAQ** → 8 Q&As. 12. Rail.
- **Data blocks:** booking card; 2-day timeline; route map (Samui → Donsak → Khao Sok); fees table.
- **FAQ (exact questions):** 1 Can I visit Khao Sok as a day trip from Koh Samui? · 2 How long is the journey? · 3 Where do we sleep? · 4 Is food included? · 5 Are park and lake fees included? · 6 Is it suitable for children? · 7 What is the best season? · 8 Can I continue to Phuket or Krabi instead of returning? [ask Mea]
- **Money links (internal):** `/koh-samui-jungle-safari/`, Pig Island speedboat · **Supporting guide links:** `/surat-thani-to-koh-samui/`, `/activities/` · **Sister-site link:** kohphangan.com Khao Sok product [check: it lists a "Khao Sok day trip"; flag consistency with Mea].
- **Images needed:** Cheow Lan Lake limestone karsts; raft house at dawn; longtail on the lake; jungle trail. 4–6 images.
- **Word target:** 1,500 (parity floor, P0.2; was 1,400)
- **Schema:** S-PRODUCT.

---

#### P1.7 Event-type evergreen pages (S-EVENTPAGE; every date also exists as a single event in the CPT with `confidence` and `last_verified`; "Provisional – confirm locally" on [check] items; weekly Monday review)

#### `/full-moon-party-from-koh-samui/` · D4 · GUIDE
- **Primary keyword:** full moon party from koh samui · **Secondary:** koh samui to full moon party · how to get to full moon party from samui · haad rin from koh samui · full moon party koh samui boat · stay on samui for full moon party
- **Title tag:** Full Moon Party from Koh Samui 2026: Boats, Times, Tips · **Meta description:** How to get from Koh Samui to the Full Moon Party: shared speedboat 1,400 THB return, private boats, Haad Rin Queen ferry times, safety and the next dates.
- **H1:** Full Moon Party from Koh Samui: How to Get There and Back (2026)
- **Answer-first lead:** The Full Moon Party is on Haad Rin beach on Koh Phangan, 25–50 minutes by boat from Samui. The easiest option is a shared return speedboat with hotel pickup from most areas (1,400 THB per person); the cheapest is the Haad Rin Queen ferry from Big Buddha pier (200 THB, but only 10:30 and 17:00 departures [check party-night extras]). Next parties: Tue 24 Nov 2026 (Loy Krathong), Thu 24 Dec, Thu 31 Dec.
- **Section outline (H2 → H3):** (keyword split: this guide owns "from koh samui"; the product owns "speedboat")
  1. **Next Full Moon Party dates** → next 6 from CPT + link to dates page.
  2. **Your options from Samui** → comparison table (data blocks).
  3. **Shared return speedboat (our pick)** → 1,400 pp, departures 18:00–23:00, pickup from most areas, return slots [ask Mea]; **Book your seat**.
  4. **Private speedboat for your group** → up to 10 guests, price [ask Mea].
  5. **Public ferries and speedboats** → Haad Rin Queen ferry 200 THB (Big Buddha pier → Haad Rin, 50 min, 10:30 / 17:00) and speedboat 500 THB (25–30 min, 15:00 / 18:30) [check party-night schedule]; other routes land at Thong Sala, then taxi to Haad Rin (~20–30 min [check]); several "Bangrak piers": check yours.
  6. **Should you stay on Samui or Phangan?** → honest trade-offs: Samui = better hotels, calmer next day; Phangan = no boat timings; link kohphangan.com.
  7. **Timeline of the night** → pickup → pier → Haad Rin → party (from ~21:00 till sunrise [check]) → return.
  8. **Costs on the night** → entry ~200 THB cash (we don't sell entry), buckets [check typical], taxi/boat, ATM fees 220–250 THB.
  9. **Stay safe** → drink spiking and assault warnings (FCDO), only licensed boats, no swimming, glass on the sand, keep valuables minimal, Tourist Police 1155.
  10. **What to bring** → cash, waterproof pouch, closed shoes, ID copy, charged phone.
  11. **Weather and sea** → Nov–Dec NE monsoon: boats run only when safe; full refund or new date if cancelled.
  12. **The day after** → Pig Island afternoon/sunset trips.
  13. **FAQ** → 10 Q&As.
- **Data blocks:** options table (Option · Price · Door to door? · Times · Pier · Best for); countdown; dates mini-table; map (Samui piers → Haad Rin); sea widget; booking card (FMP shared) in sidebar.
- **FAQ (exact questions):** 1 How far is the Full Moon Party from Koh Samui? · 2 What is the cheapest way to get there? · 3 What is the easiest way to get there and back? · 4 What time do boats return to Samui? · 5 Is it safe to take a boat at night? · 6 Do I need to buy a Full Moon Party ticket? · 7 Can I book a boat on the day? · 8 Is it better to stay on Samui or Koh Phangan? · 9 What happens if the sea is rough? · 10 Is the Full Moon Party on Loy Krathong this year?
- **Money links (internal):** FMP shared, FMP private, Half Moon package, Pig Island sunset · **Supporting guide links:** `/full-moon-party-dates/`, `/koh-samui-to-koh-phangan/`, `/precautions-safety/` · **Sister-site link:** kohphangan.com Haad Rin guide [check URL].
- **Images needed:** Haad Rin beach at night (licensed); speedboat at the pier at dusk; Big Buddha pier; fire show; map graphic. 5–6 images.
- **Word target:** 2,000
- **Schema:** S-EVENTPAGE (`ItemList` of upcoming FMP `Event`s with `offers` → product URL).

#### `/full-moon-party-dates/` · D4 · GUIDE
- **Primary keyword:** full moon party dates 2026 · **Secondary:** full moon party dates 2027 · next full moon party · full moon party schedule · full moon party december 2026 · full moon party new year 2026
- **Title tag:** Full Moon Party Dates 2026 & 2027 (Checked Monthly) · **Meta description:** Every Full Moon Party date for 2026 and 2027, including the four 2027 dates moved for Buddhist holidays, plus times, entry fee and boats from Koh Samui.
- **H1:** Full Moon Party Dates 2026–2027
- **Answer-first lead:** The next Full Moon Party is Tuesday 24 November 2026, the same night as Loy Krathong, followed by Thursday 24 December (Christmas Eve) and Thursday 31 December (New Year's Eve). In 2027 four parties move off Buddhist holy days: Mon 22 Feb, Fri 21 May, Tue 20 Jul and Sat 16 Oct. Entry is about 200 THB cash at the beach; we re-check every date about 30 days ahead.
- **Section outline (H2 → H3):** (twin has 14 H2s and 5 FAQs)
  1. **Full Moon Party dates 2026–2027** → master table (data blocks).
  2. **Next party: {weekday d Month} on Haad Rin** → dynamic H2 + countdown + party info box (21:00–sunrise [check], ~200 THB cash, no online entry tickets).
  3. **Why some dates move** → alcohol ban on Makha Bucha (21 Feb 2027), Visakha Bucha (20 May), Asahna Bucha/Khao Phansa (18–19 Jul [check]), Ok Phansa (~15 Oct [check]); the Haad Rin association moves the party a day; many sites still list raw lunar dates.
  4. **Full Moon Party at a glance** → fact box: Haad Rin Sunrise Beach, Koh Phangan; start/finish; entry; crowd size [check; avoid unsourced numbers]; dress (closed shoes).
  5. **How the night works** → timeline.
  6. **Music on the beach** → stages by genre (generic; don't name bars unless verified [check]).
  7. **Getting there from Koh Samui** → shared 1,400 / private / ferry summary; **Book your seat**.
  8. **Special nights** → H3 Loy Krathong + FMP (24 Nov 2026; probably 13 Nov 2027 [check]) · H3 Christmas Eve FMP · H3 NYE countdown party (31 Dec, not lunar).
  9. **Full Moon week on Koh Phangan** → Jungle Experience the night before (23 Nov, 23 Dec, 30 Dec 2026), Waterfall Party (11, 22, 26 Nov), Half Moon (3 & 17 Dec Magic Forest).
  10. **What it costs** → entry, transfers, drinks, ATM fees.
  11. **What to bring** → list.
  12. **Stay safe** → as FMP guide.
  13. **Weather on party nights** → month climate (Nov 445 mm, Dec 263 mm); boats run only when safe.
  14. **How we check these dates** → two-source rule, 30-day re-check, `last_verified` shown per row.
  15. **Full Moon Party dates FAQ** → 10 Q&As.
- **Data blocks:** master table (columns: Date · Weekday · Moved? (★ + reason) · Same night as · Shared boat (Book) · Private boat (Book) · Status: provisional/confirmed · Last checked) with rows: 24 Nov 2026 (Loy Krathong) · 24 Dec 2026 (Christmas Eve) · 31 Dec 2026 (NYE) · 22 Jan 2027 · 22 Feb 2027★ · 22 Mar · 21 Apr · 21 May★ · 19 Jun · 20 Jul★ · 17 Aug · 15 Sep · 16 Oct★ · 13 Nov (probably Loy Krathong) · 13 Dec · 31 Dec 2027 (NYE); countdown; "Add to calendar" (.ics) per row; party-info sidebar; map of Haad Rin (Google Maps directions).
- **FAQ (exact questions):** 1 When is the next Full Moon Party? · 2 Why is the Full Moon Party not always on the full moon? · 3 Which 2027 Full Moon Parties have moved dates? · 4 Is there a Full Moon Party on New Year's Eve? · 5 How much does the Full Moon Party cost? · 6 Do I need to buy tickets online? · 7 What time does the party start and finish? · 8 How do I get there from Koh Samui? · 9 Can the date change at short notice? · 10 Is the Full Moon Party on in the rainy season?
- **Money links (internal):** FMP shared, FMP private, Half Moon package · **Supporting guide links:** `/full-moon-party-from-koh-samui/`, `/koh-samui-party-calendar-2026-2027/`, `/koh-samui-events/` · **Sister-site link:** kohphangan.com `/full-moon-party-dates/` is the twin; avoid duplicate-content competition: **[ask Mea]** whether this page should canonicalise to kohphangan.com or stay Samui-angled (recommended: keep a Samui-angled page with its own text and cross-link once).
- **Images needed:** Haad Rin party beach wide shot; fire skipping (licensed); speedboat arrival; calendar graphic (WebP, text as HTML not baked into image). 4–5 images.
- **Word target:** 2,000 (twin ~1,500)
- **Schema:** S-EVENTPAGE (`ItemList` of 16 `Event`s, `eventStatus` EventScheduled/EventRescheduled with `previousStartDate` for moved dates where known).

#### `/koh-samui-party-calendar-2026-2027/` · D4 · GUIDE
- **Primary keyword:** koh samui party calendar 2026 · **Secondary:** koh samui events 2027 · koh phangan party dates 2027 · half moon festival dates · koh samui festivals calendar
- **Title tag:** Koh Samui Party & Festival Calendar 2026–2027 · **Meta description:** Month-by-month calendar of parties, festivals, holidays and alcohol-ban days for Koh Samui and Koh Phangan, Nov 2026 to Dec 2027, with boats from Samui.
- **H1:** Koh Samui Party and Festival Calendar 2026–2027
- **Answer-first lead:** Every party, festival, public holiday and alcohol-ban day relevant to Koh Samui from November 2026 to December 2027 on one page: Full Moon Parties, Half Moon nights, Loy Krathong (24 Nov 2026), Chinese New Year (6 Feb 2027), Songkran (13–15 Apr 2027), the Samui Regatta (22–29 May 2027) and more. Dates marked "provisional" are re-checked monthly.
- **Section outline (H2 → H3):**
  1. **Calendar at a glance** → filterable table.
  2. **November–December 2026** → H3 per event (FMP 24 Nov + Loy Krathong; Half Moon 3 & 17 Nov beach club, 2/3 & 16/17 Dec; Jungle 23 Nov, 23 & 30 Dec; Waterfall 11/22/26 Nov; Father's Day 5 Dec (no alcohol ban); Santa Run ~mid-Dec [check]; Christmas; NYE).
  3. **January–March 2027** → FMP 22 Jan, 22 Feb★, 22 Mar; CNY 6 Feb; Makha Bucha ban 21 Feb; Red Cross Fair ~Feb [check]; Beach Volleyball ~late Mar [check].
  4. **April–June 2027** → Chakri Day 6 Apr; Songkran 13–15 Apr (events from 12 Apr); FMP 21 Apr, 21 May★, 19 Jun; Visakha Bucha ban 20 May; Regatta 22–29 May; Neon Run ~late May [check]; Half Marathon ~Jun [check].
  5. **July–September 2027** → Asahna Bucha/Khao Phansa bans 18–19 Jul [check]; FMP 20 Jul★, 17 Aug, 15 Sep; Sart Duean Sip ~30 Sep [check].
  6. **October–December 2027** → Ok Phansa ban ~15 Oct [check]; Chak Phra/Thod Pha Pa in Nathon (~9 days around end of Lent) [check]; FMP 16 Oct★, 13 Nov, 13 Dec, 31 Dec; Loy Krathong probably 13 Nov [check]; Samui Trail ~Nov [check].
  7. **Half Moon Festival 2027** → load only after the official site publishes (single-source list held in CPT as draft).
  8. **Alcohol-ban days explained** → hotels/licensed bars exempt; shops can't sell.
  9. **Events that no longer run** → Samui Festival (last 2019), Samui Jazz (last 2022), triathlon; buffalo fighting: cultural note only, never listed or sold.
  10. **Calendar FAQ** → 8 Q&As.
- **Data blocks:** master calendar table (Date · Event · Where · Type · Confidence · Boat from Samui?) with category filter and .ics export; month jump nav; alcohol-ban banner preview.
- **FAQ (exact questions):** 1 What are the biggest events on Koh Samui in 2027? · 2 When is Songkran on Koh Samui? · 3 When is Loy Krathong in 2026 and 2027? · 4 Which days can't you buy alcohol in Thailand in 2027? · 5 When are the Half Moon Festival dates? · 6 Is there a music festival on Koh Samui? · 7 When is the Samui Regatta? · 8 Are buffalo fights held on Koh Samui?
- **Money links (internal):** FMP shared, Half Moon package, `/koh-samui-private-speedboat/` · **Supporting guide links:** `/koh-samui-events/`, `/full-moon-party-dates/`, `/thai-culture-and-traditions/` · **Sister-site link:** none.
- **Images needed:** collage-free: one hero (Songkran or Loy Krathong), plus 4 month-section images (krathong, lion dance, regatta, Chak Phra float [licensed]). 5 images.
- **Word target:** 1,800
- **Schema:** S-EVENTPAGE.

#### `/koh-samui-songkran/` (slug [check] vs keyword map) · D4 · GUIDE
- **Primary keyword:** songkran koh samui · **Secondary:** songkran 2027 koh samui · thai new year koh samui · songkran chaweng · water festival koh samui
- **Title tag:** Songkran Koh Samui 2027: Dates, Best Spots & Tips · **Meta description:** Songkran 2027 on Koh Samui: public holidays 13–15 April, street water fights from 12 April on Chaweng Beach Road, Lamai and Nathon, plus etiquette and safety.
- **H1:** Songkran on Koh Samui 2027: Dates, Where to Go and Tips
- **Answer-first lead:** Songkran, Thai New Year, is a public holiday on 13–15 April 2027; on Samui the street water fights usually start on 12 April. Chaweng Beach Road is the main battleground, with official events also in Lamai and Nathon, and beach clubs and Central Samui host parties. It's the hottest time of year (April highs ~32 °C) and the sea is at its calmest.
- **Section outline (H2 → H3):**
  1. Songkran 2027 dates (table; 2026 programme ran 12–15 Apr in Bo Phut, Maret and Ang Thong subdistricts)
  2. Where to celebrate (H3 Chaweng Beach Road · H3 Lamai · H3 Nathon (more traditional) · H3 beach clubs and Central Samui foam party (venue names, no links))
  3. Traditions behind the water (rod nam dam hua, temple merit-making, sand chedis)
  4. Etiquette (don't splash monks, elderly, babies, drivers; no high-pressure hoses on faces [check rules])
  5. Safety (road accidents peak; never ride a scooter through water fights; phones in pouches; ice water)
  6. Getting around during Songkran (traffic, closures)
  7. Where to stay for Songkran
  8. Book early (+65% foreign bookings in 2025 after White Lotus)
  9. Boat trips over Songkran (calm sea, book ahead)
  10. FAQ.
- **Data blocks:** dates table; area map; weather card (April); sea card.
- **FAQ (exact questions):** 1 When is Songkran 2027 on Koh Samui? · 2 Where is the biggest water fight on Samui? · 3 Is Songkran family-friendly? · 4 Is alcohol sold during Songkran? · 5 Will tours and boats run during Songkran? · 6 How do I protect my phone? · 7 Is it safe to ride a scooter during Songkran? · 8 Do hotels get booked up for Songkran?
- **Money links (internal):** Ang Thong speedboat, Pig Island speedboat, `/koh-samui-private-speedboat/` · **Supporting guide links:** `/koh-samui-events/`, `/thai-culture-and-traditions/`, `/where-to-stay-koh-samui/` · **Sister-site link:** none.
- **Images needed:** water fight on Chaweng Beach Road; rod nam dam hua ceremony; sand chedi at a temple; family with water guns. 4–5 images.
- **Word target:** 1,500
- **Schema:** S-EVENTPAGE.

#### `/koh-samui-loy-krathong/` (slug [check]) · D4 · GUIDE
- **Primary keyword:** loy krathong koh samui · **Secondary:** loy krathong 2026 · loy krathong chaweng lake · where to celebrate loy krathong samui · eco krathong
- **Title tag:** Loy Krathong Koh Samui 2026: 24 November, Where to Go · **Meta description:** Loy Krathong 2026 is Tuesday 24 November, the same night as the Full Moon Party. Where to float a krathong on Samui, eco krathong tips and the sky-lantern ban.
- **H1:** Loy Krathong on Koh Samui 2026 (Tuesday 24 November)
- **Answer-first lead:** Loy Krathong falls on Tuesday 24 November 2026 (some English sites wrongly say 25 November), the full moon of the 12th lunar month and the same night as the Full Moon Party on Koh Phangan. On Samui, people float krathongs at Chaweng Lake, the Big Buddha and on beaches and hotel ponds. Sky lanterns are banned on Samui; choose a bread or banana-leaf krathong, never foam.
- **Section outline (H2 → H3):**
  1. Loy Krathong dates (2026: 24 Nov; 2027: probably Sat 13 Nov [check])
  2. What Loy Krathong means
  3. Where to celebrate on Samui (H3 Chaweng Lake · H3 Big Buddha · H3 beaches · H3 hotel events)
  4. How to float a krathong (step list)
  5. Eco krathong and the lantern ban
  6. Loy Krathong and the Full Moon Party on the same night (boats from Samui)
  7. Weather (November is the wettest month: 445 mm; plan for rain)
  8. Etiquette
  9. FAQ.
- **Data blocks:** date table; map (Chaweng Lake, Big Buddha); weather widget; FMP booking card.
- **FAQ (exact questions):** 1 When is Loy Krathong 2026? · 2 Where is the best place for Loy Krathong on Koh Samui? · 3 Can I release a sky lantern on Samui? · 4 Where can I buy a krathong? · 5 Is Loy Krathong a public holiday? · 6 Can I do Loy Krathong and the Full Moon Party on the same night? · 7 What happens if it rains?
- **Money links (internal):** FMP shared, FMP private · **Supporting guide links:** `/koh-samui-events/`, `/thai-culture-and-traditions/`, `/big-buddha-koh-samui/` · **Sister-site link:** none.
- **Images needed:** banana-leaf krathong with candle on water; Chaweng Lake at night; Big Buddha illuminated [check]. 3–4 images.
- **Word target:** 1,300
- **Schema:** S-EVENTPAGE.

#### `/koh-samui-chinese-new-year/` (slug [check]) · D4 · GUIDE
- **Primary keyword:** chinese new year koh samui · **Secondary:** chinese new year 2027 thailand · lion dance koh samui · maenam chinese new year · nathon chinese new year
- **Title tag:** Chinese New Year Koh Samui 2027: Saturday 6 February · **Meta description:** Chinese New Year 2027 on Koh Samui is Saturday 6 February: lion dances in Maenam, traditional rites at Nathon's Hainan shrine and Hua Thanon's Guan Yu shrine.
- **H1:** Chinese New Year on Koh Samui 2027 (Saturday 6 February)
- **Answer-first lead:** Chinese New Year 2027 falls on Saturday 6 February, the Year of the Goat. Samui's Chinese families have Hainan roots: Maenam's Chinese temple and old Chinatown host the family-friendly lion and dragon dances, Nathon's Hainan shrine holds the more traditional rites (which can include face-piercing), and the Guan Yu shrine at Hua Thanon also celebrates. Confirm the local programme in January [check].
- **Section outline (H2 → H3):**
  1. Date and what to expect
  2. Where to celebrate (H3 Maenam · H3 Nathon Hainan shrine · H3 Guan Yu shrine, Hua Thanon (16 m bronze, 09:00–17:00) · H3 resort galas)
  3. Samui's Hainanese heritage (short history [check])
  4. Etiquette at shrines
  5. Food to try
  6. Weather and sea in February (best month: 64 mm, 4 rain days)
  7. Makha Bucha alcohol ban 21 Feb 2027 note
  8. FAQ.
- **Data blocks:** map (Maenam temple, Nathon shrine, Guan Yu shrine); weather card.
- **FAQ (exact questions):** 1 When is Chinese New Year 2027? · 2 Where are the lion dances on Koh Samui? · 3 Is it suitable for children? · 4 Are shops and restaurants closed? · 5 What should I wear to a shrine? · 6 Is February a good time for boat trips?
- **Money links (internal):** Ang Thong speedboat, Pig Island speedboat · **Supporting guide links:** `/koh-samui-temples/`, `/maenam-koh-samui/`, `/nathon-koh-samui/` · **Sister-site link:** none.
- **Images needed:** lion dance in Maenam; Guan Yu shrine statue; red lanterns at Nathon shrine. 3–4 images.
- **Word target:** 1,200
- **Schema:** S-EVENTPAGE.

#### `/koh-samui-christmas-new-year/` (slug [check]) · D4 · GUIDE
- **Primary keyword:** new year's eve koh samui · **Secondary:** christmas koh samui 2026 · nye koh samui 2026 fireworks · koh samui countdown · nye boat party koh samui · full moon party new year
- **Title tag:** Christmas & New Year's Eve on Koh Samui 2026: Guide · **Meta description:** Christmas and NYE 2026 on Koh Samui: free Central Samui countdown, Chaweng fireworks, resort galas, Christmas Eve and NYE Full Moon boats, and booking tips.
- **H1:** Christmas and New Year's Eve on Koh Samui 2026
- **Answer-first lead:** Christmas Eve (Thu 24 Dec 2026) is also a Full Moon Party night, and New Year's Eve (Thu 31 Dec) brings the NYE Full Moon Party on Haad Rin, a free countdown with fireworks at Central Samui and the biggest beach fireworks in Chaweng, then Fisherman's Village, Lamai, Maenam and Choeng Mon. Resort galas and boats sell out by mid-December; flights and ferries are packed on 1–2 January.
- **Section outline (H2 → H3):**
  1. Key dates (24, 25, 31 Dec; 1 Jan public holiday)
  2. Christmas on Samui (resort brunches; not a Thai public holiday)
  3. Where to see in the New Year (H3 Chaweng & Central Samui · H3 Fisherman's Village · H3 Lamai · H3 Maenam & Choeng Mon (family-friendly))
  4. Beach-club countdowns (2025 pattern: free before 21:00, 500 THB after at one Chaweng club [check 2026])
  5. Resort galas (e.g. Bophut gala 14,500++ THB; "++" = +10% service +7% VAT; names as context, no links)
  6. Full Moon Party at Christmas and NYE from Samui (boats; NYE shared tickets [ask Mea price])
  7. NYE on the water: private boats for fireworks [ask Mea feasibility and price]
  8. Weather (Dec 263 mm, improving; Ang Thong reopens 16 Dec)
  9. Book-ahead checklist (villas, galas, boats, flights out 1–2 Jan)
  10. Getting home after midnight (taxis scarce; pre-book)
  11. FAQ.
- **Data blocks:** dates table; fireworks map; booking cards (FMP shared 24 Dec/31 Dec, private boat enquiry); countdown to NYE.
- **FAQ (exact questions):** 1 Where are the best New Year's Eve fireworks on Koh Samui? · 2 Is there a free countdown party? · 3 Is there a Full Moon Party on Christmas Eve and New Year's Eve? · 4 How do I get to the NYE Full Moon Party from Samui? · 5 When should I book NYE dinners and boats? · 6 Is Ang Thong open over Christmas? · 7 Can we watch the fireworks from a boat? · 8 Will it rain at Christmas?
- **Money links (internal):** FMP shared, FMP private, `/koh-samui-yacht-charter/`, Ang Thong speedboat (from 16 Dec) · **Supporting guide links:** `/koh-samui-events/`, `/full-moon-party-dates/`, `/koh-samui-nightlife/` · **Sister-site link:** none.
- **Images needed:** fireworks over Chaweng Bay; Christmas table at a beach resort; Haad Rin NYE crowd (licensed); boat with lights at night. 4–5 images.
- **Word target:** 1,600
- **Schema:** S-EVENTPAGE.

#### `/samui-regatta/` (slug [check]) · D4 · GUIDE
- **Primary keyword:** samui regatta · **Secondary:** samui regatta 2027 · sailing regatta koh samui · samui regatta dates · regatta chaweng
- **Title tag:** Samui Regatta 2027: Dates, Where to Watch & Sailing · **Meta description:** The 24th Samui Regatta runs Saturday 22 to Saturday 29 May 2027 off Chaweng Beach. Race format, where to watch, how to join, and boat trips during regatta week.
- **H1:** Samui Regatta 2027 (22–29 May): Dates and Where to Watch
- **Answer-first lead:** The 24th Samui Regatta runs from Saturday 22 to Saturday 29 May 2027 off Chaweng Beach, organised by Regatta Asia. The 2026 edition (23rd) was based at Chaweng with a closing gala. May is hot (33 °C) with good sea conditions, so it's a strong week for spectators and boat days.
- **Section outline (H2 → H3):**
  1. Dates and history (23rd: 23/24–30 May 2026; 24th: 22–29 May 2027)
  2. How the racing works (classes, courses [check])
  3. Where to watch from land (Chaweng beach points [check])
  4. Watching from the water (private boat spectating [ask Mea feasibility and safety rules])
  5. How to enter or crew [check; no outbound link except none]
  6. Social programme (generic; venues as context)
  7. May weather and sea
  8. Boat trips in regatta week
  9. FAQ.
- **Data blocks:** dates box; Chaweng map; weather card.
- **FAQ (exact questions):** 1 When is the Samui Regatta 2027? · 2 Where is the Samui Regatta held? · 3 Can spectators watch for free? · 4 Can I join a crew? · 5 Can we watch from a private boat? · 6 What is the weather like in late May?
- **Money links (internal):** `/koh-samui-catamaran-charter/`, `/koh-samui-private-speedboat/`, Boutique yachting day · **Supporting guide links:** `/koh-samui-events/`, `/chaweng-koh-samui/` · **Sister-site link:** none.
- **Images needed:** racing yachts off Chaweng (licensed); spinnakers; beach spectators. 3 images.
- **Word target:** 1,000
- **Schema:** S-EVENTPAGE (`SportsEvent`).

#### `/koh-samui-muay-thai-fight-nights/` (slug [check]; keyword split with `/koh-samui-muay-thai/`) · D4 · GUIDE
- **Primary keyword:** muay thai stadium koh samui · **Secondary:** muay thai fight koh samui tickets · muay thai fight night chaweng · phetchbuncha stadium · samui international muay thai stadium
- **Title tag:** Muay Thai Fight Nights Koh Samui 2026: Days & Tickets · **Meta description:** Muay Thai fights on Koh Samui six nights a week in Chaweng: Tue/Fri/Sun and Mon/Wed/Sat, from about 21:00. Tickets 1,500–2,500 THB, seats, kids and tips.
- **H1:** Muay Thai Fight Nights on Koh Samui: Stadiums, Days and Tickets
- **Answer-first lead:** Two stadiums in Chaweng share the week: Samui International Muay Thai Stadium on Tuesday, Friday and Sunday, and Phetchbuncha Stadium on Monday, Wednesday and Saturday, both from about 21:00; there are no fights on Thursdays. Tickets are 1,500 THB (stadium), 2,000 (ringside) and 2,500 (VIP), with a 3,000 VIP premium at Samui International. Buy at the box office or from us [ask Mea partner], never from street touts.
- **Section outline (H2 → H3):**
  1. Fight nights at a glance (table)
  2. Samui International Muay Thai Stadium (Tue/Fri/Sun; doors 20:00, fights ~21:00–midnight; children 6–10 half price, under 6 free [check])
  3. Phetchbuncha Stadium (Mon/Wed/Sat, 21:00; ~8 bouts over ~3 h [check])
  4. Which seat to buy
  5. What to expect on the night (wai kru, rounds, music)
  6. Bringing children
  7. Getting there and back (Chaweng; taxis/Grab late)
  8. Closed venues (Chaweng Stadium reported closed; no current Lamai schedule)
  9. Train yourself (→ `/koh-samui-muay-thai/`)
  10. FAQ.
- **Data blocks:** weekly table (Mon–Sun × stadium); ticket price table; map with both stadiums; booking card (if partner) or enquiry; events CPT recurrence feeding the ticker.
- **FAQ (exact questions):** 1 Which nights are Muay Thai fights on Koh Samui? · 2 How much are tickets? · 3 Is ringside worth it? · 4 Can children attend? · 5 What time do fights start and finish? · 6 Should I buy tickets in advance? · 7 Are there fights on Thursday? · 8 Can I take photos?
- **Money links (internal):** stadium tickets product [ask Mea], `/koh-samui-muay-thai/`, `/koh-samui-cooking-class/` · **Supporting guide links:** `/koh-samui-nightlife/`, `/chaweng-koh-samui/`, `/koh-samui-events/` · **Sister-site link:** none.
- **Images needed:** stadium ring under lights; wai kru ritual; crowd ringside (no identifiable faces without consent). 3–4 images.
- **Word target:** 1,300
- **Schema:** S-EVENTPAGE (`SportsEvent` recurring via CPT `eventSchedule`).

---

#### P1.8 FAQ, company and legal pages

#### `/faq/` · D10 · HUB
- **Primary keyword:** koh samui faq · **Secondary:** koh samui questions · koh samui travel tips · koh samui tours faq · is koh samui safe · best time to visit koh samui
- **Title tag:** Koh Samui FAQ 2026: Tours, Travel, Weather & Visas · **Meta description:** Straight answers to 52 Koh Samui questions: booking and refunds, boat trips, getting here, weather, safety, money, visas and parties. Updated 2026 by locals.
- **H1:** Koh Samui FAQ: Tours, Travel and Practical Answers (2026)
- **Answer-first lead:** Short, checked answers (40–80 words each) to the questions we're asked most on WhatsApp, grouped by topic. Facts that change (visas, fees, dates) carry a "last checked" date; links go to the full guide or the product.
- **Section outline (H2 → H3):** 9 H2 groups, each Q an H3 (FAQPage schema), answer 40–80 words, first sentence = the direct answer with a number; jump nav chips at top; search box (client-side filter).
  1. **Booking and payment** (8)
  2. **Cancellations and weather** (5)
  3. **Tours and boats** (9)
  4. **Parties and events** (5)
  5. **Getting here and around** (7)
  6. **Weather and seasons** (5)
  7. **Safety and health** (6)
  8. **Money and connectivity** (4)
  9. **Visas and entry** (3)
- **Data blocks:** grouped accordion (`kp-faq2-css`); jump chips; client-side search; "Still stuck? WhatsApp us" box; last-checked stamp per volatile answer.
- **FAQ (exact questions, 52; key facts for each answer in brackets):**
  - *Booking and payment:* 1 How do I book a tour? [online → pay in THB → confirmation email/WhatsApp] · 2 Which currency will I be charged in? [THB; EUR/USD display only] · 3 Is my booking confirmed instantly? [confirmed by email/WhatsApp after payment; pickup time evening before] · 4 Can I book a tour for tomorrow? [until midnight ICT the day before] · 5 Can I book on the same day? [WhatsApp only] · 6 Which cards do you accept? [cards, Apple Pay, Google Pay via Stripe] · 7 How do child and infant prices work? [Adult 12+, Child 3–11, Infant 0–2 free] · 8 Can I book for a group of 10 or more? [WhatsApp quote → pay link]
  - *Cancellations and weather:* 9 What is your cancellation policy for day tours? [CXL-DAY] · 10 What is the cancellation policy for Ang Thong tours? [CXL-AT] · 11 What happens if the weather is bad on my tour day? [operator decides; full refund or new date] · 12 Who decides if a boat trip is cancelled for weather? [captain/operator; safety first] · 13 Can I change my tour date? [ask Mea: change policy]
  - *Tours and boats:* 14 Is Ang Thong Marine Park open all year? [closed 1 Nov–15 Dec] · 15 Is the Ang Thong park fee included? [no; 300/150 THB cash] · 16 Ang Thong speedboat or big boat: which should I choose? [1,800 ~8 h vs 1,500 ~10 h] · 17 How many guests are on the VIP tour? [only 15 on a big speedboat] · 18 Does the Pig Island tour run every day? [yes, all year, weather permitting] · 19 Is hotel pickup included? [PICKUP wording, +400 remote] · 20 Are tours suitable for children and non-swimmers? [life jackets provided, must be worn] · 21 Can the boat drop me on another island after the tour? [no; boats return to Samui] · 22 What should I bring on a boat trip? [cash for fees, sunscreen, towel, water shoes]
  - *Parties and events:* 23 How do I get to the Full Moon Party from Koh Samui? [shared 1,400 return; private] · 24 Do you sell Full Moon Party tickets? [no; ~200 THB at the gate] · 25 When is the next Full Moon Party? [dynamic; 24 Nov 2026] · 26 Is alcohol sold on Buddhist holidays? [hotels/licensed bars yes; shops no] · 27 Which night is the Fisherman's Village Walking Street? [Friday ~17:00–23:00]
  - *Getting here and around:* 28 How do I get from Bangkok to Koh Samui? [~1h05 flight, 2,800–6,800 THB; or overland 12–17 h] · 29 Which airlines fly to Koh Samui? [Bangkok Airways; Scoot from Singapore] · 30 How much is a taxi from Samui Airport to Chaweng? [~400–600 THB; 400–700 by zone] · 31 Does Grab work on Koh Samui? [yes, thin on the west] · 32 How do I get from Koh Samui to Koh Phangan? [ferries 20–50 min, 200–500 THB; private boat] · 33 Do I need an International Driving Permit to rent a scooter? [yes, with motorcycle category] · 34 Should I leave my passport as a scooter deposit? [no, per UK FCDO]
  - *Weather and seasons:* 35 When is the best time to visit Koh Samui? [Feb–Apr calmest; Jan–Sep good] · 36 When is the rainy season? [Oct–Dec, peak Nov ~445 mm] · 37 Is November a good time to visit? [wettest; Ang Thong closed; Pig Island/Koh Tao run] · 38 How warm is the sea? [28–30 °C all year] · 39 Is the sea rough on the east coast in winter? [Oct–Dec red flags Chaweng/Lamai]
  - *Safety and health:* 40 Is Koh Samui safe for tourists? [generally; road safety and sea are the main risks] · 41 What are the emergency numbers? [1155, 191, 1669, 199] · 42 Are there jellyfish around Koh Samui? [box jellyfish; vinegar 30 s+] · 43 Where are the hospitals? [Bangkok Hospital Samui, Samui International, Thai International, Bandon, government hospital near Nathon] · 44 Is cannabis legal on Koh Samui? [prescription only; no public smoking, fines up to 25,000] · 45 Are vapes allowed in Thailand? [no, illegal]
  - *Money and connectivity:* 46 Do I need cash on Koh Samui? [yes for street food, songthaews, island fees] · 47 How much do ATMs charge? [220–250 THB; AEON 150; decline DCC] · 48 Which SIM card is best? [AIS/True; 8 d 499, 15 d 699, 30 d 1,199] · 49 Can I pay by card for tours? [yes, online in THB]
  - *Visas and entry:* 50 How long can I stay in Thailand without a visa? [30 days from 15 Sep 2026 for UK/US/EU/AU etc.] · 51 Do I need the TDAC arrival card? [yes, free at tdac.immigration.go.th within 3 days before arrival] · 52 Is there a tourist entry fee? [proposed 450 THB; not collected as of {date}]
- **Money links (internal):** in answers: Ang Thong speedboat, Pig Island speedboat, FMP shared, `/koh-samui-private-speedboat/` · **Supporting guide links:** `/thailand-visa-guide/`, `/koh-samui-weather/`, `/how-to-get-to-koh-samui/`, `/precautions-safety/`, `/terms-and-conditions/` · **Sister-site link:** none. Allowed outbound: tdac.immigration.go.th (official).
- **Images needed:** one hero (local team member on a boat answering a phone [real photo, ask Mea]) and none in answers. 1–2 images.
- **Word target:** 3,400 (52 × ~60 words + intro)
- **Schema:** `FAQPage` (all 52) + `WebPage` + `BreadcrumbList`.

#### `/about-us/` · utility (kpa template, no sidebar) · GUIDE
- **Primary keyword:** {{BRAND}} about us · **Secondary:** koh samui tour company · local tour operator koh samui · TAT licensed tour agency samui · koh samui since 2006
- **Title tag:** About Us: Koh Samui Tour Team Since 2006 | {{BRAND}} (trim if {{BRAND}} pushes past 60) · **Meta description:** Meet the Australian-Thai team behind {{BRAND}}: local on Koh Samui and Koh Phangan since 2006, TAT licence 43/01467, the boat trips we organise and how we check facts.
- **H1:** About {{BRAND}}: a Koh Samui team since 2006
- **Answer-first lead:** {{BRAND}} is run by Mea and an Australian-Thai team who have operated tours on Koh Samui and Koh Phangan since 2006, under TAT licence 43/01467. We organise the boat trips we sell (Ang Thong, Pig Island, Koh Tao, private boats, party transfers) [ask Mea which boats are owned and which are partner-operated, and word it accordingly] and write the island guides we wish we'd had.
- **Section outline (H2 → H3):**
  1. Our story since 2006 [ask Mea: founding story, milestones]
  2. What we do (tours, private boats, party transfers, villas, guides)
  3. The team (names, roles, photos with consent [ask Mea])
  4. Licence and trust (TAT 43/01467; secure card payments via Stripe; THB charging)
  5. Our sister sites (kohphangan.com, angthongmarinepark.com, pigislandkohsamui.com, speedboatsamui.com: one line each, linked)
  6. How we check facts (editorial policy: primary sources, monthly review of prices/dates, "Updated" stamps, sources log, no paid placements, no fabricated reviews)
  7. Safety first (we cancel when the sea isn't safe; life jackets incl. children's)
  8. Responsible tourism (no elephant riding, reef etiquette, pigs' welfare)
  9. Corrections and contact (`info@{{DOMAIN}}`, WhatsApp)
  10. Office (address on Chaweng Beach Road, Bo Phut 84320 [ask Mea exact], map, hours [ask Mea]).
- **Data blocks:** timeline (2006 → today); team cards; trust row; office map with **Get directions**; sister-site pill row.
- **FAQ (exact questions):** 1 Who runs {{BRAND}}? · 2 Are you a licensed tour operator? · 3 Do you run your own boats? · 4 Where is your office? · 5 How do you check the information in your guides? · 6 How can I report an error?
- **Money links (internal):** `/koh-samui-tours/`, `/koh-samui-private-speedboat/` · **Supporting guide links:** `/faq/`, `/terms-and-conditions/` · **Sister-site link:** all four sister sites in one pill row (exception justified: About is where the network belongs; keep `rel` normal).
- **Images needed:** team photo (real, consent); office front; crew on a boat; early-years photo [ask Mea]; boat fleet. 5 images.
- **Word target:** 1,200 (parity floor, P0.2; was 1,000)
- **Schema:** `AboutPage` + sitewide `TravelAgency`/`Organization` (foundingDate 2006, hasCredential TAT 43/01467, address, sameAs) + `Person` (Mea, if approved) + `BreadcrumbList` + `FAQPage`.

#### `/contact/` · utility · GUIDE
- **Primary keyword:** contact {{BRAND}} · **Secondary:** koh samui tour booking contact · whatsapp koh samui tours · koh samui tour office chaweng
- **Title tag:** Contact Us: WhatsApp, Email & Office on Koh Samui · **Meta description:** Contact our Koh Samui team on WhatsApp +66 63 704 0888 or by email. Office on Chaweng Beach Road, Bo Phut. Bookings, private boats, groups and villas.
- **H1:** Contact our Koh Samui team
- **Answer-first lead:** The fastest way to reach us is WhatsApp +66 63 704 0888 (support 08:00–20:00 daily [check]); email `info@{{DOMAIN}}` for anything that needs documents. For a booking, use **Book now** on the tour page; for private boats, groups and villas, use the enquiry form below.
- **Section outline (H2 → H3):**
  1. WhatsApp and email (buttons, response times [ask Mea])
  2. Enquiry form (name, email, WhatsApp with country code, date, guests, interest select: tour/private boat/party/villa/other, message; honeypot + rate limit)
  3. Our office (address [ask Mea], map, opening hours [ask Mea])
  4. Already booked? (find your confirmation, pickup time arrives the evening before, change/cancel per Terms)
  5. Emergencies on the island (1155, 191, 1669, 199)
  6. Contact FAQ.
- **Data blocks:** contact cards; enquiry form (WP Mail SMTP to `info@{{DOMAIN}}`); office map with **Get directions**; Samui time-now widget ("It's 14:32 on Koh Samui").
- **FAQ (exact questions):** 1 How quickly do you reply? · 2 Can I book by WhatsApp? · 3 Can I visit your office? · 4 How do I change or cancel a booking? · 5 What if I can't find my pickup driver?
- **Money links (internal):** `/koh-samui-tours/`, `/koh-samui-private-speedboat/`, `/koh-samui-villas/` · **Supporting guide links:** `/faq/`, `/terms-and-conditions/` · **Sister-site link:** none.
- **Images needed:** office or team at the pier (real); 1–2 images.
- **Word target:** 500
- **Schema:** `ContactPage` + `TravelAgency` (contactPoint: telephone, email, availableLanguage [ask Mea], hoursAvailable) + `BreadcrumbList` + `FAQPage`.

#### `/terms-and-conditions/` · utility · GUIDE
- **Primary keyword:** {{BRAND}} terms and conditions · **Secondary:** koh samui tour cancellation policy · refund policy tours koh samui
- **Title tag:** Terms, Cancellation & Refund Policy | {{BRAND}} · **Meta description:** Booking terms for tours, boats, party transfers and villas: THB payments, 48-hour cancellation policy, weather cancellations, pickup areas and your rights.
- **H1:** Terms and Conditions, Cancellation and Refund Policy
- **Answer-first lead:** These terms cover every booking on {{DOMAIN}}. In short: you pay in THB; day tours are fully refundable 48 hours or more before departure; Ang Thong tours are fully refundable 48 hours or more before and non-refundable after that; and if we cancel for weather or sea safety you choose a full refund or a new date.
- **Section outline (H2 → H3):** (legal review recommended [ask Mea: Thai counsel])
  1. **Who we are** → {{BRAND}} operating company name [ask Mea], address, TAT licence 43/01467, contact.
  2. **Bookings and confirmation** → contract formed on confirmation after payment; confirmation by email/WhatsApp; cut-off midnight ICT the day before; no same-day online bookings.
  3. **Prices and payment** → THB is the currency of record; EUR/USD display only; Stripe; what prices include/exclude (park fees, island fees, entry fees paid in cash).
  4. **Age bands and children** → Adult 12+, Child 3–11, Infant 0–2 free; life jackets must be worn.
  5. **Pickup and transfers** → [PICKUP] text; remote surcharge 400 THB pp return; be ready at the pickup time; missed pickup = no-show.
  6. **Cancellation by you** (`#cancellation`, the canonical copy) → verbatim:
     - **Day tours:** "Full refund if you cancel 48 hours or more before departure. 50% refund if you cancel 24–48 hours before departure. No refund if you cancel less than 24 hours before departure or do not show up."
     - **Ang Thong tours (day and overnight):** "Full refund if you cancel 48 hours or more before departure. No refund if you cancel less than 48 hours before departure or do not show up."
     - [ask Mea] whether to add kohphangan.com's clause "Cancellation due to sickness (with medical certificate): full refund or option to reschedule"; it is on the live kohphangan.com product page but not in Part A.
     - Private charters, party boats, Half Moon packages (purchased festival tickets), villas and retreats: [ask Mea] whether the day-tour rule applies or a specific rule is needed (keep "one policy" unless Mea decides otherwise).
  7. **Cancellation or changes by us** → "If we cancel for weather or sea safety, you choose a full refund or a new date." Itinerary changes for safety, park rules or tides; park or event closures by authorities (e.g. Ang Thong 1 Nov–15 Dec, storm closures); party date moves by organisers.
  8. **Date changes** → [ask Mea policy].
  9. **Refund method and timing** → to the original card in THB; bank FX differences not refundable [check]; timing [ask Mea].
  10. **Health, safety and conduct** → fitness to travel, pregnancy, seasickness, alcohol, crew instructions final, right to refuse boarding without refund for unsafe behaviour [check wording].
  11. **Partner-operated activities** → services may be delivered by vetted local partners under our booking terms and cancellation policy.
  12. **Liability and insurance** → accident insurance on tours [ask Mea per product]; recommend travel insurance; limits of liability [legal review].
  13. **Reviews** → only verified guests; we don't edit content; removal of abusive content.
  14. **Complaints** → WhatsApp/email, response time [ask Mea]; Tourist Police 1155; TAT 1672.
  15. **Governing law** → Thai law [legal review].
  16. **Changes to these terms** → dated versions.
- **Data blocks:** summary table at top (Product type · Full refund · Partial · No refund · Weather); anchor nav; "Last updated" date.
- **FAQ (exact questions):** 1 How do I cancel a booking? · 2 When will I get my refund? · 3 What happens if my tour is cancelled for weather? · 4 Can I change my date instead of cancelling? · 5 Are park and island fees refundable? · 6 What counts as a no-show?
- **Money links (internal):** none in body (link back via breadcrumbs and "Browse tours" CTA) · **Supporting guide links:** `/privacy-policy/`, `/faq/`, `/contact/` · **Sister-site link:** none.
- **Images needed:** none (text page); OG default image only.
- **Word target:** 2,000
- **Schema:** `WebPage` + `BreadcrumbList` + `FAQPage` (keep FAQ to the 6 above).

#### `/privacy-policy/` · utility · GUIDE
- **Primary keyword:** {{BRAND}} privacy policy · **Secondary:** cookies policy · PDPA privacy notice · GDPR privacy notice tours
- **Title tag:** Privacy Policy & Cookies | {{BRAND}} · **Meta description:** How {{BRAND}} uses your data for bookings, payments, WhatsApp and analytics; cookies, your rights under Thai PDPA and EU GDPR, and how to contact us.
- **H1:** Privacy Policy
- **Answer-first lead:** We collect only what we need to run your booking (name, email, WhatsApp number, hotel, guests, payment handled by Stripe) and to understand site use (Google Analytics with consent). We don't sell data. You can ask us to see, correct or delete your data at `info@{{DOMAIN}}`.
- **Section outline (H2 → H3):** (legal review recommended: Thai PDPA B.E. 2562 applies; GDPR for EU visitors [check])
  1. **Who is the data controller** → company name/address [ask Mea], contact.
  2. **What we collect** → booking data, enquiry form, WhatsApp chats, reviews, technical data, cookies.
  3. **Why we use it (legal bases)** → contract, legitimate interests, consent (analytics/marketing), legal obligations (tax/accounting).
  4. **Who we share it with** → Stripe (payments), the operating crew/partner delivering your tour (name, pickup, phone), our central bookings system (bookings hub), email delivery (WP Mail SMTP provider [ask Mea]), WhatsApp/Meta, Google Analytics/Site Kit, GTranslate, CookieYes, SiteGround hosting.
  5. **International transfers** → safeguards [legal review].
  6. **How long we keep it** → bookings [ask Mea: e.g. tax-period retention], enquiries, analytics.
  7. **Cookies** → CookieYes categories, Reject All honoured, `kp-theme` (theme preference, localStorage), currency preference (client-side), no ad cookies by default.
  8. **Your rights** → access, rectification, erasure, objection, portability, withdraw consent; complaint to Thailand's PDPC (official link allowed) or EU authority.
  9. **Children** → bookings by adults only.
  10. **Security** → HTTPS, Stripe PCI, access limited to Owner/Office roles.
  11. **Changes** → dated versions.
- **Data blocks:** processors table (Processor · Purpose · Data · Location [check]); cookie table (auto from CookieYes); "Manage cookies" button.
- **Money links (internal):** none · **Supporting guide links:** `/terms-and-conditions/`, `/contact/` · **Sister-site link:** none.
- **Images needed:** none.
- **Word target:** 1,400
- **Schema:** `WebPage` + `BreadcrumbList`.
- **FAQ (exact questions, 5):** What personal data do you collect when I book? · Who processes my card payment? · Do you share my details with the boat operator? · How long do you keep my booking data? · How can I ask you to delete my data?

#### `/404` · utility · GUIDE (noindex)
- **Primary keyword:** n/a · **Secondary:** n/a
- **Title tag:** Page Not Found | {{BRAND}} · **Meta description:** (none needed; noindex) fallback: "This page has moved or no longer exists. Search the site, see our most-booked Koh Samui tours or ask us on WhatsApp."
- **H1:** Sorry, we can't find that page
- **Answer-first lead:** The page may have moved or an event may have ended. Search below, jump to our most-booked trips, or message us on WhatsApp and we'll point you to the right place.
- **Section outline (H2 → H3):**
  1. Search the site (search box, WP search)
  2. Most-booked trips (6 cards: Pig Island speedboat, Koh Tao, Ang Thong speedboat (or "reopens 16 Dec"), FMP shared, Pig Island sunset, private speedboat)
  3. Popular guides (6 links: travel guide, weather, how to get here, beaches, events, FAQ)
  4. Ask us on WhatsApp (button; prefill includes the broken URL).
- **Data blocks:** search; product cards (closure-aware); guide links; Rank Math 404 monitor logging; ended-event logic belongs on event pages, not here.
- **FAQ (exact questions):** none.
- **Money links (internal):** 6 products above · **Supporting guide links:** 6 guides above · **Sister-site link:** none.
- **Images needed:** one light illustration-free photo (empty beach at Silver Beach) or none; keep the page light (<300 KB).
- **Word target:** 120
- **Schema:** none beyond sitewide `WebSite`; `noindex, follow`; HTTP status 404 (not a soft 404).

---

#### P1.9 Open questions raised by these briefs (add to Part N and ask Mea in one batch)
1. **Departure piers** for Ang Thong (speedboat, big boat, VIP, overnight, private), Koh Tao, FMP and Half Moon boats; Thong Krut confirmed for Pig Island.
2. **Exact itineraries and inclusions** per product (stop order, lunch location, snorkel site, drinks, insurance, kayak on big boat), big-boat transit time and return time.
3. **Child prices** for every product; whether infants/children are allowed on FMP boats; minimum ages (jet ski, boutique yacht, overnight camping).
4. **Transfers on Pig Island products** and whether the 400 THB remote surcharge applies to FMP boats.
5. **FMP private boat price model** (35,800 return vs 19,500 one way) and what "VIP" adds; FMP return time slots; NYE shared-ticket price.
6. **Half Moon packages:** names, contents and prices of the three options; "from 2,700 THB" vs the 2,500 THB forest ticket; refund rule once tickets are bought.
7. **Private sailing catamaran price** (21,000 vs 27,000); fleet seasonal pricing; per-guest extras above the basis; half-day/full-day tariffs; private Phangan transfer tariff.
8. **Capacities:** Ang Thong private speedboat, 3 Islands and Koh Rap boats, jet skis (riders per ski), boutique yacht.
9. **Pink Dolphins:** where they are usually seen and any no-sighting policy.
10. **Island-activity partners** (safari, elephants, zipline, ATV, cooking, Muay Thai, diving, Khao Sok), prices, photo permission, name shown or hidden; stadium tickets as a product.
11. **Retreat booking model** (deposit/72 h vs the single 48 h policy) and which retreats we can sell; **villa** partners.
12. **Terms:** operating company name, office address and hours, medical-certificate clause, date-change policy, charter/party/villa rules, refund timing, governing law (Thai counsel).
13. **Keyword map decisions:** event-page slugs (Songkran, Loy Krathong, CNY, Christmas/NYE, Regatta, fight nights) and the `/full-moon-party-dates/` overlap with kohphangan.com's twin page.
14. **kohphangan.com consistency (for later, do not change without asking):** its Ang Thong product says "limited to 20 people" (breaks rule A4.11), shows two prices (2,500 vs 2,200 sale) and repeats the H1 as an H2; its homepage tile shows Ang Thong from 2,200 THB; its FMP dates meta says "next party 27 Oct" while the body says 24 Nov; it sells a "Khao Sok day trip" while O11 says Khao Sok is not a realistic day trip from Samui.


### P2. Plan your trip, health & safety, living & working

Page-by-page content briefs for every page in Part C1 → Guide → *Plan your trip*, *Health and safety* and *Living and working*, plus `/koh-samui-tides/` and `/koh-samui-sea-conditions/`. There are 51 briefs. Each one is a writing spec, not publishable copy. Every number must be re-checked at writing time (Part K3), and anything tagged **[check]** stays off the live page until it is verified. If it can't be verified, write around it or ask Mea.

**P2.0 Rules that apply to every brief below**
- **Template:** D4 guide article (`kpa` shell with sticky `kpa-side` booking card, byline, "Updated {Month YYYY}", related grid) unless a brief says D11. D11 decision pages use the same D4 shell, in this order: verdict box → comparison table → reasoning → products.
- **Outbound links:** the only external links allowed in briefs are the ones marked **(P)** under "Official sources" (official government pages, plus Open-Meteo, Windy and TMD as utility tools) and Google Maps "Get directions" deep links. Everything else listed under sources is for verification only. Never link hospitals, schools, coworking spaces, banks, insurers, ferry operators, airlines, hotels or venues, even when they are named in the text.
- **Ang Thong:** every mention between 1 Nov and 15 Dec carries the auto-banner "Season reopens 16 December. Book now for later dates", plus a Pig Island + Koh Tao cross-sell block (Part I3). On shared Ang Thong and Koh Tao tours, never state a guest number, including for the big boat: don't write "50+ guests" even though the market data says so. Only the VIP tour says **15 guests on a big speedboat**.
- **Pickup wording:** always "Hotel pickup included from most areas of Koh Samui". Add "+400 THB per person return from Lipa Noi, Nathon, Bang Kao, Thong Krut and other remote areas" wherever pickup is discussed.
- **Prices:** THB first, with the year ("2026 price") and "approx." for market prices. Our checkout charges THB. Cash-only island fees: Ang Thong **300/150**, Koh Madsum **~50**, Koh Nang Yuan **250**.
- **Next-day online booking** closes at **midnight ICT** the day before. Same-day requests go to WhatsApp.
- **Keyword ownership (no cannibalisation, add to `/docs/keyword-map.csv`):**
  - `/koh-samui-visa-extension/` owns "koh samui visa extension" (tourists). `/koh-samui-immigration-office/` owns "koh samui immigration (office)" (address, 90-day reports, TM30, re-entry; residents).
  - `/koh-samui-scams/` owns "koh samui scams". `/koh-samui-jet-ski/` (Tours menu) owns "jet ski koh samui". The scams page links to it.
  - `/where-to-stay-koh-samui-with-kids/` owns "where to stay … with kids". `/koh-samui-with-kids/` owns "koh samui with kids / family holiday".
  - `/koh-samui-long-stay/` (guide) owns "long term rental koh samui (guide)". `/koh-samui-villas/#long-term` stays the money page.
  - `/koh-samui-weather/` owns "weather"; `/koh-samui-in-november/` owns "november"; `/koh-samui-sea-conditions/` owns "sea / waves"; `/koh-samui-tides/` owns "tides".
- **Proposed slugs not yet in Part C** (confirm, then add to the sitemap): `/ang-thong-day-tour-vs-overnight/`, `/chaweng-vs-lamai/`, `/where-to-stay-koh-samui-with-kids/`, `/koh-samui-with-kids/`, `/koh-samui-honeymoon/`, `/koh-samui-in-november/`, `/koh-samui-pharmacies/`, `/koh-samui-dentist/`, `/koh-samui-police-station/`, `/koh-samui-drugs-alcohol-law/`, `/koh-samui-scams/`, `/koh-samui-beach-safety/`, `/koh-samui-immigration-office/`, `/koh-samui-banks-money/`, `/koh-samui-coworking/`, `/working-on-koh-samui/`, `/opening-business-koh-samui/`, `/koh-samui-real-estate/`, `/building-koh-samui/`, `/koh-samui-lawyers/`, `/koh-samui-schools/`, `/koh-samui-local-government/`, `/koh-samui-long-stay/`. Product slugs that Part C names but doesn't spell out (Pig Island sunset, small-group longtail, Jet Ski Safari) are written below as `/product/…/` **[slug TBC]**.
- **Living-and-working pages depend on Part N8** (launch or phase 2). Their briefs are written so they can ship at launch. They carry the most **[check]** tags because the research files cover them least, so plan a dedicated verification pass with official sources (Land Department, DBD, Department of Employment, Immigration) and, ideally, a review by a Samui-licensed lawyer.

**P2.0a Depth benchmark: kohphangan.com twins fetched 31 Oct 2026**
| Twin page | Twin H2s | Twin FAQs | Twin body words (est.) | Samui brief: H2s / FAQs / words |
|---|---|---|---|---|
| /koh-phangan-travel-guide/ | 11 | 9 | ~3,300 | 15 / 12 / 4,500 |
| /how-to-get-to-koh-phangan/ | 9 | 6 | ~1,100 | 12 / 10 / 3,800 |
| /where-to-stay-koh-phangan/ | 6 (+6 H3) | 5 | ~1,000 | 12 / 10 / 3,500 |
| /koh-phangan-itinerary/ | 22 | 4 | ~2,700 | 22 / 8 / 3,500 |
| /koh-phangan-weather/ | 12 | 9 | ~2,300 | 13 / 10 / 3,500 |
| /getting-around-koh-phangan/ | 24 | 9 | ~2,500 | 24 / 10 / 3,000 |
| /thailand-visa-guide/ | 11 (+12 H3) | 7 | ~2,800 | 15 / 10 / 3,200 |
| /koh-phangan-hospital/ | 17 | 8 | ~4,000 | 18 / 10 / 4,000 |
| /koh-phangan-tides/ | 6 (+6 H3) | 7 | ~2,100 | 9 / 8 / 2,300 |
| /koh-phangan-real-estate/ | 15 | 9 | ~3,200 | 17 / 10 / 3,500 |

What the twins taught us:
1. The kohphangan.com `/thailand-visa-guide/` already says **30 days, 60 countries** and states that the 60-day exemption ended on 15 Sep 2026. The O4 "update to 30 days" flag is therefore resolved on Phangan. Because the slug is identical on both domains, the Samui version must be **original Samui-specific text** (Maenam immigration, Samui map), self-canonical, and must not copy the Phangan page.
2. The travel-guide, how-to-get and where-to-stay twins have **no map**. The Samui versions add the D4 Leaflet map near the top.
3. Live widgets on several twins captured as "Loading…" or "…". The Samui widgets must render a server-side fallback (G1).
4. The tides twin's "Sources" list links an academic paper. On Samui, published sources are restricted to (P) items only.
5. Twin itinerary and getting-around pages use more than 16 H2s. The Samui briefs match their H2 counts, so the 8–16 band is deliberately exceeded on those two pages.

---

**GROUP 1: PLAN YOUR TRIP**

#### `/koh-samui-travel-guide/` · D4 (pillar, doubles as Guide hub) · HUB
- **Primary keyword:** koh samui travel guide · **Secondary:** koh samui guide 2026, first time in koh samui, koh samui tips, koh samui trip planning, things to know before visiting koh samui
- **Title tag:** Koh Samui Travel Guide 2026: Getting There, Stays & Tips · **Meta description:** Plan Koh Samui with locals since 2006: flights and ferries, best areas, weather by month, the new 30-day visa rule, money, safety and the boat days to book.
- **H1:** Koh Samui Travel Guide 2026: The Essential Planner
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Samui is Thailand's second-largest island (228.7 km²), with its own airport (USM, ~1h05 from Bangkok) and a 51 km ring road that links every beach.
  - The driest, calmest months are Feb–Apr. The rainy season is Oct–Dec, peaking in November (~445 mm), which is the opposite of Phuket.
  - Most visitors stay in Chaweng, Lamai, Bophut or Choeng Mon and spend at least one day on the water: Ang Thong (closed 1 Nov–15 Dec) or Pig Island (all year).
- **Section outline (H2 → H3):**
  1. Koh Samui at a glance: fact table.
     - Area 228.7 km² (2nd after Phuket); Khao Pom 635 m.
     - Ring road ~51 km (Route 4169), ~90 min loop.
     - Surat Thani province, Amphoe Ko Samui, 7 tambons, one city municipality since 2012; ~70,000 registered residents.
     - Time ICT (UTC+7), THB, emergency numbers 1155/191/1669, sea 28–30 °C, mains 220 V and plug types [check].
  2. How to get to Koh Samui
     - H3 Fly direct to USM: BKK ~20–25 daily, 1h05–1h10, 2,800–6,800 THB; DMK ~3 daily; Phuket 7–8; Singapore; Hong Kong.
     - H3 Fly to Surat Thani + ferry: 5–7 h, 1,500–3,000 THB all-in.
     - H3 Overland from Bangkok: 12–17 h.
     - H3 From Koh Phangan / Koh Tao: 20–50 min / 1.5–2 h.
     - Then link to the route pages.
  3. Arriving: airport, piers and your first transfer.
     - Taxis are unmetered, approx. 400–700 THB by zone; shared minibus 100–250 THB pp; Grab meets you outside the pickup zone [S].
     - Name the exact piers: Nathon, Lipa Noi (Raja), Bangrak piers, Big Buddha pier.
  4. Areas and where to stay
     - Table: area | mid-range THB/night | best for | honest downside (O15).
     - H3 Where to stay by traveller type.
  5. When to go: seasons and weather
     - Three seasons and a 12-month mini table.
     - Peak crowds Jul–Aug and Dec–Feb; room rates +30–80%.
  6. Getting around
     - Table: taxi, Grab, songthaew 30–80 THB local, scooter 150–350/day, car 800–1,200/day.
     - IDP with motorcycle category; helmet fine up to 2,000 THB.
  7. Entry rules: visas, TDAC and the entry fee
     - 30-day exemption since 15 Sep 2026; extend once +30 days at Maenam (1,900 THB).
     - TDAC free within 3 days before arrival.
     - Funds check 10,000/20,000 THB.
     - "A fee has been proposed but is not being collected as of {date}."
  8. Money, SIM cards and Wi-Fi
     - ATM fee 220–250 (AEON 150); decline DCC.
     - Cash for songthaews and island fees.
     - SIM 499/699/1,199 THB (AIS/True).
  9. Health and safety
     - Five private hospitals plus the government hospital.
     - Red flags on Chaweng/Lamai Oct–Dec; box jellyfish first aid (vinegar 30 s+).
     - Vapes illegal; cannabis needs a prescription.
  10. Things to do on Koh Samui
      - H3 Beaches.
      - H3 Temples & viewpoints: Big Buddha free 07:00–18:30, Wat Plai Laem, Hin Ta & Hin Yai, Wat Khunaram.
      - H3 Waterfalls: Na Muang 1 & 2.
      - H3 Markets & nightlife: Fisherman's Village Fri ~17:00–23:00; Chaweng Walking Street Thu–Sat; Muay Thai 1,500/2,000/2,500.
      - H3 Food: wai khua; Baan Suan Lung Khai, Bib Gourmand 2026.
  11. Boat trips and day trips
      - H3 Ang Thong: speedboat 1,800 / big boat 1,500 / VIP 4,500 with 15 guests / overnight 3,600–4,200; park fee 300/150 cash; closed 1 Nov–15 Dec.
      - H3 Pig Island & Koh Tan: 1,450, Thong Krut, any date.
      - H3 Koh Tao & Nang Yuan: 2,200 + 250 cash.
      - H3 Koh Phangan & Full Moon: 1,400 THB return.
      - H3 Khao Sok, honestly: 4–6 h each way, so 2D/1N only.
  12. Events and festivals 2026–2027
      - FMP Tue 24 Nov (same night as Loy Krathong; sky lanterns banned), 24 Dec, 31 Dec.
      - Chinese New Year 6 Feb 2027; Songkran 13–15 Apr 2027 (Chaweng from 12 Apr); Samui Regatta 22–29 May 2027.
      - Alcohol-ban days.
  13. A 7-day Koh Samui plan: summary cards, then link to the itinerary.
  14. What a day on Samui costs: three budget tiers (derived), then link to the budget page.
  15. Koh Samui travel guide FAQ.
- **Data blocks:**
  - At-a-glance table; route table (From | Best option | Time | Fare THB); areas table; 12-month mini climate strip; transport table.
  - Leaflet overview map: airport, 7 piers, 10 main beaches, Big Buddha, Wat Plai Laem, Hin Ta & Hin Yai, Na Muang, Fisherman's Village, Immigration (Maenam), Bangkok Hospital Samui, our office.
  - Live strip: time, weather, sea, tide.
  - Ang Thong closure banner logic; "Popular trips" product rail.
- **FAQ (exact questions, 12):**
  1. How do I get to Koh Samui?
  2. What is the best time to visit Koh Samui?
  3. Where should I stay on Koh Samui for a first visit?
  4. How many days do I need on Koh Samui?
  5. Do I need a visa for Thailand in 2026?
  6. Is Ang Thong Marine Park open in November?
  7. Is Koh Samui expensive?
  8. Do I need cash on Koh Samui?
  9. Is Koh Samui safe for tourists?
  10. Does Grab work on Koh Samui?
  11. Can I visit Koh Phangan or Koh Tao in a day from Samui?
  12. What is your cancellation policy?
- **Money links (internal, 2–4 product/booking pages):** `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/pig-island-speedboat-tour/`, `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/`, `/product/full-moon-party-speedboat-koh-samui/` · **Supporting guide links:** every Plan-your-trip page (hub grid), plus `/koh-samui-beaches/`, `/koh-samui-events/` and `/precautions-safety/` · **Sister-site link (max 1, only if genuinely useful):** kohphangan.com/koh-phangan-travel-guide/ (in the Koh Phangan H3)
- **Images needed (descriptions):**
  - Aerial of Chaweng Bay (hero).
  - Big Buddha on Koh Fan causeway.
  - Mae Ko Emerald Lake viewpoint, Ang Thong (our own photo).
  - Pigs on the beach at Koh Madsum.
  - Fisherman's Village Friday walking street.
  - Samui airport open-air terminal.
  - Songthaew on the ring road.
  - Na Muang 1 pool.
  - Taling Ngam sunset.
- **Word target:** 4,500
- **Schema:** CollectionPage + Article, BreadcrumbList, FAQPage, ImageObject, ItemList (TouristTrip), Place (Koh Samui, geo 9.512/100.013)
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):**
  - GOV.UK Thailand entry requirements; tdac.immigration.go.th **(P)**; Royal Gazette notices of 31 Aug 2026.
  - TAT newsroom (tatnews.org); DNP Ang Thong closure notice; TMD climate normals.
  - Bangkok Airways timetable (verify only).

#### `/how-to-get-to-koh-samui/` · D4 (pillar) · GUIDE
- **Primary keyword:** how to get to koh samui · **Secondary:** koh samui ferry from mainland, flights to koh samui, cheapest way to koh samui, getting to koh samui, donsak ferry samui
- **Title tag:** How to Get to Koh Samui 2026: Flights, Ferries & Prices · **Meta description:** Every route to Koh Samui compared: direct flights from 1h05, Surat Thani bus-and-ferry combos from 330 THB, the night train, plus boats from Phangan and Tao.
- **H1:** How to Get to Koh Samui (2026–2027): Every Route Compared
- **Answer-first lead (what it must say in 2–3 sentences):**
  - The fastest way is a direct flight to Samui airport (USM): ~1h05 from Bangkok, ~20–25 flights a day, usually 2,800–6,800 THB one way.
  - The cheapest is a low-cost flight or night train to Surat Thani, then a coach + ferry combo (330–850 THB) to Nathon or Lipa Noi: 5–7 h in total.
  - From Koh Phangan it takes 20–50 min; from Koh Tao 1.5–2 h.
- **Section outline (H2 → H3):**
  1. Quick comparison: every way to Samui. Table: route | door-to-door time | price THB | best for.
  2. Fly direct to Samui (USM)
     - Route table (O2).
     - Thai Airways TG numbers are most likely Bangkok Airways codeshares: never write "Thai Airways flies to Samui".
     - Berjaya Subang **[check still operating]**.
     - Book early for Dec–Feb and Jul–Aug.
  3. Fly to Surat Thani or Nakhon Si Thammarat, then ferry
     - URT combo table: Phantip/Seatran 330–520; Raja ~550; Lomprayah ~850 (1,000 with hotel drop); Boonsiri ~850.
     - Last combos leave ~16:00. NST ground leg ~3.5 h [S].
  4. Bangkok overland: train, bus and boat
     - Express 85: Krung Thep Aphiwat 19:50 → Phun Phin 06:23. Sleeper berths 700–900 (2nd) and 1,300–1,500 (1st).
     - Lomprayah bus + catamaran 1,250–1,750; Boonsiri 1,450; government coach + Seatran 620–960.
  5. Car and passenger ferries from Donsak
     - Raja → Lipa Noi: 220 THB, roughly hourly 05:00–19:00, extra boats late Dec–Apr.
     - Seatran → Nathon: ~170 THB, car ~550.
     - Both ~1.5 h. Most rental contracts void cover off-island [S].
  6. From Koh Phangan: operator/pier table (O2). Always name the exact pier.
  7. From Koh Tao: fast boats ~700 THB / 1.5–2 h; slow boats 450–550; last Lomprayah 16:00 to Nathon.
  8. From Phuket, Krabi and Khao Lak
     - Flights: HKT 7–8 daily, KBV 1–2 daily.
     - Overland van + ferry via Surat Thani **[check fares/time]**.
  9. Samui piers explained
     - Table: pier | area | who uses it | approx. drive to Chaweng [check minutes].
     - Piers: Nathon; Lipa Noi (Raja); Bangrak Lomprayah pier; Bangrak Seatran pier; Petcherat Marina; Big Buddha pier (Haad Rin Queen); Pralarn (Maenam); Thong Krut (Pig Island tours); Bophut.
  10. From the pier or airport to your hotel: taxi 400–700 by zone; songthaew by day; Grab where available.
  11. Weather, delays and cancellations
      - NE monsoon swell Oct–Dec. Ferries can be cancelled in strong NE wind.
      - Leave a buffer day before an international flight.
  12. Check timetables before you travel
      - Timetables change seasonally. Show a "last checked {date}" stamp.
      - Buy at the pier or office. We don't link operators.
- **Data blocks:**
  - Comparison table, flight table, URT combo table, Phangan ferry table, pier table.
  - Leaflet pier map with Get directions on every pin.
  - "Bangkok → Samui by train" timeline (19:50 → 06:23 → ferry → ~10:30 on Samui [check]).
- **FAQ (exact questions, 10):**
  1. What is the fastest way to get to Koh Samui?
  2. What is the cheapest way to get to Koh Samui?
  3. Does Koh Samui have an airport?
  4. Why are flights to Koh Samui more expensive than to Surat Thani?
  5. Which pier do ferries from the mainland arrive at?
  6. Do I need to book ferry tickets in advance?
  7. Are ferries cancelled in bad weather?
  8. Can I take a car to Koh Samui?
  9. How do I get from Koh Phangan to Koh Samui?
  10. Can I land at Surat Thani and reach Samui the same day?
- **Money links (internal, 2–4 product/booking pages):** `/private-speedboat-koh-samui-to-koh-phangan/`, `/product/full-moon-party-speedboat-koh-samui/`, `/product/pig-island-speedboat-tour/` · **Supporting guide links:** the 6 route pages, `/koh-samui-airport/`, `/getting-around-koh-samui/`, `/koh-samui-sea-conditions/` · **Sister-site link (max 1, only if genuinely useful):** kohphangan.com/how-to-get-to-koh-phangan/
- **Images needed (descriptions):**
  - Bangkok Airways aircraft on the Samui apron.
  - Raja car ferry arriving at Lipa Noi.
  - Seatran ferry at Nathon pier.
  - Catamaran at Bangrak.
  - Haad Rin Queen at Big Buddha pier.
  - Night train sleeper berth (licensed stock).
- **Word target:** 3,800
- **Schema:** Article, BreadcrumbList, FAQPage, ImageObject, ItemList of Place (piers, with geo)
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):**
  - State Railway of Thailand timetable (railway.co.th, publishable only as an official link if needed).
  - Raja, Seatran and Lomprayah timetables (verify only); Bangkok Airways schedule (verify only); Surat Thani airport (AOT/DOA site).

#### `/koh-samui-airport/` · D4 · GUIDE
- **Primary keyword:** koh samui airport · **Secondary:** samui airport usm, samui airport to chaweng, koh samui airport taxi price, samui airport arrivals, samui airport lounge
- **Title tag:** Koh Samui Airport (USM) 2026: Taxis, Flights & Tips · **Meta description:** Samui airport explained: who flies there, taxi prices to every beach (approx. 400–700 THB), Grab pickup rules, check-in, lounges and the 2026–2030 expansion.
- **H1:** Koh Samui Airport (USM): Flights, Transfers and Tips
- **Answer-first lead (what it must say in 2–3 sentences):**
  - USM is a small, open-air airport in the north-east of the island, privately owned and run by Bangkok Airways since 1989.
  - Bangkok Airways flies every route except Scoot's Singapore service.
  - Chaweng is 10–15 min away. Taxis are fixed-price from the kiosk, roughly 400–700 THB depending on the zone.
- **Section outline (H2 → H3):**
  1. Samui airport at a glance
     - Table: code USM; owner Bangkok Airways; opened 1989; open-air terminal; gates 7 → 11 by 2030.
     - Drive to Chaweng 10–15 min, Lamai 25–30, west coast 40–50; opening hours [check].
  2. Airlines and routes: table (route | airline | frequency | flight time) from O2. Seasonal Chengdu; Berjaya [check].
  3. Arriving step by step
     - International arrivals: immigration and TDAC.
     - Baggage, kiosk taxis, ATMs [check], SIM counter [check].
  4. Airport transfers and prices
     - Table: option | price | time | notes.
     - Kiosk taxi 400–700; shared minibus 100–250 pp; Grab 300–600 (meet outside the pickup zone); private transfer.
     - Our tours: "Hotel pickup included from most areas", not airport pickup.
  5. Departing from Samui: check-in close time [check], security, the Bangkok Airways lounge for all its passengers [check], connections in Bangkok.
  6. Facilities and accessibility: food, Wi-Fi [check], luggage storage [check], step-free access [check].
  7. The 2026–2030 expansion: 6 m passengers a year; gates 7 → 11; works started Q2 2026; completion 2030.
  8. Weather and disruption
     - Storms (e.g. Pabuk, Jan 2019).
     - Allow a buffer day between boat days and flights.
  9. Samui airport FAQ
- **Data blocks:**
  - Route table and transfer table.
  - Map: airport, Big Buddha pier, the three Bangrak piers, Chaweng and Bophut, with drive times.
  - Samui time widget.
  - Zone price box: photo of the official kiosk board, transcribed [check on site].
- **FAQ (exact questions, 9):**
  1. How far is Samui airport from Chaweng?
  2. How much is a taxi from Samui airport?
  3. Can I get a Grab from Samui airport?
  4. Which airlines fly to Koh Samui?
  5. Is there a lounge for economy passengers at Samui airport?
  6. Can I fly to Koh Samui from Singapore?
  7. Is Samui airport open 24 hours?
  8. Can I go straight from the airport to Koh Phangan?
  9. Why is Samui airport privately owned?
- **Money links (internal, 2–4 product/booking pages):** `/private-speedboat-koh-samui-to-koh-phangan/`, `/product/pig-island-speedboat-tour/`, `/product/full-moon-party-speedboat-koh-samui/` · **Supporting guide links:** `/how-to-get-to-koh-samui/`, `/bangkok-to-koh-samui/`, `/getting-around-koh-samui/`, `/where-to-stay-koh-samui/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):**
  - Open-air check-in pavilions at Samui airport.
  - Tram-style shuttle carts to the aircraft [check they still run].
  - Arrivals taxi kiosk price board.
  - Aerial of the runway near Bang Rak.
- **Word target:** 2,200
- **Schema:** Article, BreadcrumbList, FAQPage, Airport (iataCode USM, geo [take from Google Maps])
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Bangkok Airways airport and schedule pages (verify only); Kaohoon Mar 2026 expansion report; CAAT (caat.or.th) for airport data **(P if needed)**

#### `/bangkok-to-koh-samui/` · D4 · GUIDE
- **Primary keyword:** bangkok to koh samui · **Secondary:** bangkok to koh samui train, bangkok to koh samui bus and ferry, bangkok to samui flight price, cheapest way bangkok to koh samui, drive bangkok to koh samui
- **Title tag:** Bangkok to Koh Samui 2026: Flight, Train, Bus & Ferry · **Meta description:** Bangkok to Koh Samui by direct flight (1h05), cheap flight to Surat Thani, night train or bus-and-boat ticket: times, 2026 prices and which suits you.
- **H1:** Bangkok to Koh Samui: Fly, Train, Bus or Drive (2026)
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Direct flights take ~1h05 from Suvarnabhumi (~20–25 a day) or Don Mueang (~3 a day) and usually cost 2,800–6,800 THB one way.
  - On a budget, fly low-cost to Surat Thani and take a coach + ferry (5–7 h, 1,500–3,000 THB all-in).
  - Overland, the night train + bus + ferry takes 15–17 h (950–2,000 THB) and joint bus-and-boat tickets cost 620–1,750 THB.
- **Section outline (H2 → H3):**
  1. Bangkok to Samui compared: table (option | from | door-to-door | 2026 price | best for).
  2. Direct flights from BKK and DMK: frequency, fares, checked bag included, best times to book.
  3. Fly to Surat Thani or Nakhon Si Thammarat + ferry: link to the Surat Thani page; combo prices; last combo ~16:00.
  4. Night train to Surat Thani (Phun Phin)
     - Express 85: Krung Thep Aphiwat 19:50 → 06:23; classes and prices.
     - Phun Phin is 14–16 km from town and ~80 km from Donsak. Allow 3.5–4 h onward.
  5. Bus-and-boat joint tickets
     - Lomprayah from Khao San: 06:00/21:30/22:00, 1,250–1,750 THB, 11.5–13.75 h, lands at Pralarn or Bangrak.
     - Boonsiri: 22:00 → Bangrak 11:30, 1,450.
     - Government coach (Southern Terminal / Mo Chit) + Seatran: 620–960, 12–16 h.
  6. Driving to Samui
     - Distance ~650–700 km [check].
     - Donsak car ferries: Seatran car ~550; Raja vehicle fares not published.
     - Rental insurance off-island.
  7. Door-to-door timelines: three sample days (flight, budget flight + ferry, night train).
  8. Which option suits you: families, budget, flexible, night travel. Keep valuables with you on overnight buses [check FCDO wording].
  9. Bangkok to Koh Samui FAQ
- **Data blocks:** comparison table; three timelines; route map (schematic Bangkok → Surat Thani → Donsak → Samui; static SVG, not Leaflet).
- **FAQ (exact questions, 8):**
  1. How long does it take from Bangkok to Koh Samui?
  2. What is the cheapest way from Bangkok to Koh Samui?
  3. Is the night train to Surat Thani worth it?
  4. Which Bangkok airport has flights to Samui?
  5. Can I buy one ticket from Bangkok to Samui by bus and boat?
  6. Can I drive from Bangkok to Koh Samui?
  7. How far in advance should I book flights to Samui?
  8. Can I go from Bangkok to Koh Phangan via Samui?
- **Money links (internal, 2–4 product/booking pages):** `/private-speedboat-koh-samui-to-koh-phangan/`, `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/pig-island-speedboat-tour/` · **Supporting guide links:** `/how-to-get-to-koh-samui/`, `/surat-thani-to-koh-samui/`, `/koh-samui-airport/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** Krung Thep Aphiwat station platform (licensed stock); a sleeper berth; Donsak pier; ferry deck with Samui on the horizon.
- **Word target:** 2,500
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** State Railway of Thailand (railway.co.th) **(P)**; Transport Co. Ltd (government bus, transport.co.th) **(P)**; operator timetables (verify only)

#### `/surat-thani-to-koh-samui/` · D4 · GUIDE
- **Primary keyword:** surat thani to koh samui · **Secondary:** donsak to koh samui ferry, surat thani airport to koh samui, raja ferry koh samui, seatran ferry nathon, phun phin to koh samui
- **Title tag:** Surat Thani to Koh Samui 2026: Ferries, Combos & Times · **Meta description:** From Surat Thani airport, Phun Phin station or Donsak pier to Koh Samui: combo tickets from 330 THB, Raja and Seatran ferries, last departures and piers.
- **H1:** Surat Thani to Koh Samui: Ferries, Combo Tickets and Times
- **Answer-first lead (what it must say in 2–3 sentences):**
  - At Surat Thani airport, buy a coach + ferry combo in the arrivals hall: 330–850 THB to Nathon or Lipa Noi. The last ones leave ~16:00.
  - Travelling independently, go to Donsak pier and take Raja to Lipa Noi (220 THB, roughly hourly 05:00–19:00) or Seatran to Nathon (~170 THB). Each crossing takes ~1.5 h.
- **Section outline (H2 → H3):**
  1. Surat Thani to Samui at a glance: table (from | how | time | price | arrives).
  2. From Surat Thani airport (URT)
     - Combo table with departures: Phantip 05:30–15:00; Raja 09:00 → Lipa Noi 12:30; Lomprayah 09:30 and 12:30; Boonsiri 11:30 → Nathon 14:15.
  3. From Phun Phin railway station: buses to Donsak, ~80 km; allow 3.5–4 h to Samui.
  4. From Surat Thani town and the night boat: whether a Ban Don → Nathon night boat still runs **[check]**. Don't publish unless confirmed.
  5. Donsak car ferries: Raja vs Seatran. Table (operator | Samui pier | crossing | foot | car | frequency).
  6. Arriving at Nathon or Lipa Noi
     - Songthaew to Chaweng 60–80 THB local; taxis [check].
     - Lipa Noi carries a +400 THB pp return surcharge on our tour pickups.
  7. Late arrivals and missed connections: Raja's last boat ~19:00; staying overnight near Surat Thani.
  8. Weather and sea: Oct–Dec chop. Car ferries rarely stop, but do in storms [check].
  9. Surat Thani to Samui FAQ
- **Data blocks:** combo table; Raja vs Seatran table; map of Donsak, Nathon and Lipa Noi with Get directions; "last departures" box with a last-checked date.
- **FAQ (exact questions, 8):**
  1. How do I get from Surat Thani airport to Koh Samui?
  2. How long is the ferry from Donsak to Koh Samui?
  3. Raja Ferry or Seatran: which is better?
  4. What time is the last ferry to Koh Samui?
  5. Can I buy the ferry ticket at the pier?
  6. Where does the ferry arrive on Koh Samui?
  7. Is there a night boat from Surat Thani to Koh Samui?
  8. Can I take my rental car on the ferry?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/`, `/product/ang-thong-big-boat-tour-koh-samui/`, `/private-speedboat-koh-samui-to-koh-phangan/` · **Supporting guide links:** `/bangkok-to-koh-samui/`, `/how-to-get-to-koh-samui/`, `/koh-samui-car-rental/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** URT arrivals combo counters; Raja ferry car deck; Nathon pier at sunset; Lipa Noi ferry terminal.
- **Word target:** 2,000
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Raja Ferry and Seatran sites (verify only); Department of Airports, Surat Thani airport page **(P if needed)**

#### `/koh-samui-to-koh-phangan/` · D4 · GUIDE
- **Primary keyword:** koh samui to koh phangan · **Secondary:** koh samui to koh phangan ferry, samui to haad rin boat, samui to phangan speedboat, haad rin queen ferry, koh phangan day trip from samui
- **Title tag:** Koh Samui to Koh Phangan 2026: Ferries, Piers & Prices · **Meta description:** About 40 boats a day from Samui to Koh Phangan, 20–50 min and 200–500 THB. Which pier, which operator, Haad Rin direct boats and private transfers.
- **H1:** Koh Samui to Koh Phangan: Ferries, Speedboats and Private Boats
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Around 40 boats a day cross in 20–50 min, mostly for 200–500 THB.
  - The main route is Lomprayah from Bangrak, Maenam (Pralarn) or Nathon to Thong Sala (350 THB).
  - For Haad Rin, take the Haad Rin Queen from Big Buddha pier (200 THB, 10:30 and 17:00). Groups and Full Moon nights are easier by private or shared speedboat with hotel pickup.
- **Section outline (H2 → H3):**
  1. Samui to Phangan ferry table
     - Operator | Samui pier | Phangan pier | time | THB | daily departures.
     - Rows: Lomprayah ×3 piers, Seatran Discovery, Boonsiri, Songserm speedboat, Songserm conventional (Nathon 10:30, 200–250), Echo (Baan Tai, 490, 09:00–20:30), Haad Rin Queen ferry and speedboat (500; 15:00, 18:30).
  2. Which Samui pier? "Bangrak pier" can mean the Lomprayah pier, the Seatran pier or Petcherat Marina. Name each one exactly, with a map.
  3. Which Phangan pier? Thong Sala vs Haad Rin vs Baan Tai, and which to choose for each area.
  4. Private speedboat transfer: door-to-pier, any time [check operating hours], groups; enquiry → quote → pay.
  5. A Koh Phangan day trip from Samui: realistic plans (Haad Rin + Thong Sala market; Than Sadet/Bottle Beach by private boat).
  6. Full Moon, Half Moon and Jungle nights from Samui
     - FMP shared return 1,400 THB. "Hotel pickup included from most areas of Koh Samui". Departures 18:00–23:00 window. Entry ≈200 THB paid at the party; we don't sell entry tickets.
     - Private boat; Half Moon packages from 2,700 (Magic Forest nights only).
     - 2026 dates: 24 Nov, 24 Dec, 31 Dec.
  7. Weather and safety
     - Oct–Dec chop. FCDO links overloading to fatal accidents.
     - "We cancel when it isn't safe": full refund or a new date.
  8. Do I need to book ahead? Yes on FMP nights and 20 Dec–5 Jan [check]; otherwise buy at the pier.
  9. Samui to Phangan FAQ
- **Data blocks:** ferry table; pier map (all Samui piers + Thong Sala/Haad Rin/Baan Tai); next FMP date widget (auto from events CPT); FMP promo block (`kpg-fmp`) within its date window.
- **FAQ (exact questions, 9):**
  1. How long is the ferry from Koh Samui to Koh Phangan?
  2. Which pier on Koh Samui do boats to Koh Phangan leave from?
  3. How do I get from Samui to Haad Rin?
  4. How much is the ferry from Samui to Phangan?
  5. What time is the last boat from Samui to Phangan?
  6. Can I do a Koh Phangan day trip from Samui?
  7. How do I get to the Full Moon Party from Koh Samui?
  8. Do ferries run in bad weather?
  9. Can I hire a private speedboat to Koh Phangan?
- **Money links (internal, 2–4 product/booking pages):** `/product/full-moon-party-speedboat-koh-samui/`, `/product/full-moon-party-private-speedboat-koh-samui/`, `/product/half-moon-festival-package-koh-samui/`, `/private-speedboat-koh-samui-to-koh-phangan/` · **Supporting guide links:** `/full-moon-party-from-koh-samui/`, `/full-moon-party-dates/`, `/koh-samui-sea-conditions/`, `/koh-samui-vs-koh-phangan-vs-koh-tao/` · **Sister-site link (max 1, only if genuinely useful):** kohphangan.com/koh-phangan-travel-guide/
- **Images needed (descriptions):** Lomprayah catamaran leaving Bangrak; Haad Rin Queen at Big Buddha pier; Thong Sala pier arrival; our speedboat at night on an FMP run (own photo).
- **Word target:** 2,500
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of Place (piers)
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** operator timetables (verify only); GOV.UK Thailand safety page; Marine Department (md.go.th) announcements **(P if needed)**

#### `/koh-samui-to-koh-tao/` · D4 · GUIDE
- **Primary keyword:** koh samui to koh tao · **Secondary:** koh samui to koh tao ferry, samui to koh tao speedboat time, koh tao day trip from samui, koh nang yuan from samui, samui to tao price
- **Title tag:** Koh Samui to Koh Tao 2026: Ferry Times, Prices & Day Trip · **Meta description:** Samui to Koh Tao by fast boat in 1.5–2 h (~700 THB) or slow ferry (450–550 THB), all arriving Mae Haad, or see Tao and Nang Yuan on a 2,200 THB day trip.
- **H1:** Koh Samui to Koh Tao: Ferries, Times and the Day-Trip Option
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Fast boats take 1.5–2 h (most stop at Phangan) and cost ~700 THB. Slow ferries take 2.5–3.25 h for 450–550 THB. All arrive at Mae Haad.
  - If you only want snorkelling and the Nang Yuan viewpoint, our speedboat day trip (2,200 THB + 250 THB cash island fee) is quicker and simpler than two ferry tickets.
- **Section outline (H2 → H3):**
  1. Samui to Tao boats and fares
     - Table: Lomprayah / Lomlahkkhirin / Boonsiri 700; Songserm ~800; Lomprayah slow from Pralarn 550; Songserm high-speed from Nathon ~450; Boonsiri from Nathon 650; Lomprayah with pickup 850.
  2. Departure times: first ~08:00 (Bangrak/Pralarn); last Lomprayah 16:00 (Nathon); direct non-stop Lomlahkkhirin 15:30 from Bangrak, ~1.5 h.
  3. Day trip or ferry? Decision table (goal | best option | time | cost).
  4. Koh Nang Yuan rules: 250 THB adult cash, child 100–120 [check]; no plastic bottles, fins or water shoes; no drones.
  5. Arriving at Mae Haad: what's at the pier; taxis on Tao [check].
  6. Sea and seasickness: Oct–Dec chop; Feb–Apr calmest; tablets 30–60 min before [check pharmacist wording].
  7. Diving from Samui vs Koh Tao: Sail Rock trips from ~4,650 THB (market); Ang Thong diving season Feb–Oct, clearest Mar–Apr; enquiry page.
  8. Samui to Koh Tao FAQ
- **Data blocks:** fare table; decision table; map Samui → Phangan → Tao route; day-trip timeline card.
- **FAQ (exact questions, 8):**
  1. How long is the boat from Koh Samui to Koh Tao?
  2. Is there a direct boat from Samui to Koh Tao?
  3. How much is the ferry from Samui to Koh Tao?
  4. Can I visit Koh Tao in a day from Koh Samui?
  5. What does Koh Nang Yuan cost to enter?
  6. What time is the last boat back from Koh Tao to Samui?
  7. Is the sea rough between Samui and Koh Tao?
  8. Can I go diving at Koh Tao from Samui?
- **Money links (internal, 2–4 product/booking pages):** `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/`, `/koh-samui-diving/` (guide/enquiry), `/product/pig-island-speedboat-tour/` · **Supporting guide links:** `/koh-samui-vs-koh-phangan-vs-koh-tao/`, `/islands-near-koh-samui/`, `/koh-samui-sea-conditions/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** Koh Nang Yuan viewpoint sandbar (own photo); Mae Haad pier; snorkellers at Nang Yuan; speedboat deck mid-Gulf.
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** operator timetables (verify only); Nang Yuan fee confirmed with our crew

#### `/phuket-to-koh-samui/` · D4 · GUIDE
- **Primary keyword:** phuket to koh samui · **Secondary:** krabi to koh samui, phuket to samui flight, krabi to koh samui bus and ferry, khao lak to koh samui, phuket and koh samui itinerary
- **Title tag:** Phuket & Krabi to Koh Samui 2026: Flights, Bus & Ferry · **Meta description:** Phuket to Koh Samui in about an hour by air (7–8 flights a day) or a full day by van and ferry; Krabi routes, Khao Sok stopover and the opposite monsoons.
- **H1:** Phuket and Krabi to Koh Samui: Flights, Bus-and-Ferry and Timing
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Bangkok Airways flies Phuket–Samui ~7–8 times a day (~1 h [check]) and Krabi–Samui 1–2 times.
  - Overland van + ferry tickets via Surat Thani and Donsak take most of a day [check: ~7–9 h] and cost far less.
  - The monsoons are opposite: the Andaman is wettest May–Oct, Samui Oct–Dec.
- **Section outline (H2 → H3):**
  1. Options compared: table (from | how | time | price).
  2. Flights from Phuket and Krabi: frequency, fares [check], baggage.
  3. Overland joint tickets via Surat Thani: van to Donsak + car ferry. Fares and times **[check with current timetables; no verified data in research]**.
  4. Khao Lak and Khao Sok routes
     - Khao Sok is 4–6 h from Samui each way, so plan a 2D/1N stop, never a day trip.
     - Partner package only if confirmed.
  5. Combining the Andaman and the Gulf by season: month table (Phuket/Krabi | Samui), from O7 plus general Andaman SW-monsoon knowledge [check].
  6. Arriving on Samui: airport or pier → hotel.
  7. Phuket/Krabi to Samui FAQ
- **Data blocks:** options table; 12-month two-coast weather comparison; route map (static SVG).
- **FAQ (exact questions, 7):**
  1. How do I get from Phuket to Koh Samui?
  2. How long is the flight from Phuket to Samui?
  3. Is there a ferry from Phuket to Koh Samui?
  4. How do I get from Krabi to Koh Samui?
  5. Can I stop at Khao Sok between Krabi and Samui?
  6. When is the best time to combine Phuket and Samui?
  7. Is it cheaper to go by bus and ferry?
- **Money links (internal, 2–4 product/booking pages):** `/product/khao-sok-2-day-trip-koh-samui/` (only if the partner is confirmed), `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/` · **Supporting guide links:** `/surat-thani-to-koh-samui/`, `/koh-samui-weather/`, `/koh-samui-itinerary/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** Khao Sok limestone lake (licensed); Bangkok Airways turboprop; Donsak ferry.
- **Word target:** 1,600
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Bangkok Airways schedule (verify only); TMD climate normals for Phuket and Samui **(P)**

#### `/where-to-stay-koh-samui/` · D4 (pillar) · GUIDE
- **Primary keyword:** where to stay in koh samui · **Secondary:** best area to stay in koh samui, koh samui areas, where to stay koh samui first time, best beach to stay koh samui, koh samui hotels by area
- **Title tag:** Where to Stay in Koh Samui 2026: Best Areas Compared · **Meta description:** Chaweng, Lamai, Bophut, Choeng Mon, Maenam or the west coast? Koh Samui areas compared on swimming, nightlife, airport time and 2026 room prices.
- **H1:** Where to Stay on Koh Samui (2026–2027): Areas Compared
- **Answer-first lead (what it must say in 2–3 sentences):**
  - First visit: Chaweng, for the most restaurants and a 10–15 min ride from the airport, or quieter Chaweng Noi or Choeng Mon.
  - Couples and food lovers: Bophut and Fisherman's Village, though the beach there isn't for swimming.
  - Value: Lamai (1,500–3,500 THB/night mid-range). Budget and long stays: Maenam. Sunsets and villas: the west coast (Lipa Noi, Taling Ngam), 40–50 min from the airport.
- **Section outline (H2 → H3):**
  1. Koh Samui areas compared: table (area | vibe | swimming | mid-range THB/night | to airport | best for | downside), from O14/O15.
  2. Map of Koh Samui's areas: Leaflet, area markers coloured by traveller type.
  3. Area by area
     - H3 Chaweng: North vs Central; 2,000–4,500 (budget 500–950); traffic.
     - H3 Chaweng Noi: quiet cove, snorkel off the sand.
     - H3 Lamai: ~4 km; the centre drops steeply; the north end is stony.
     - H3 Bophut & Fisherman's Village: 2,500–5,000; not for swimming; Friday market.
     - H3 Maenam: 1,000–2,500; quiet; Pralarn pier.
     - H3 Choeng Mon: 3,000–7,000; calmest bay; Koh Fan Noi sandbar.
     - H3 Bang Rak & Plai Laem: piers, airport noise, poor swimming.
     - H3 West coast: Lipa Noi, Bang Por, Laem Yai, Taling Ngam; tidal; best sunsets.
     - H3 The south: Bang Kao, Laem Set, Thong Krut, Hua Thanon; wellness and quiet.
     - H3 Nathon: transit only.
  4. Where to stay by traveller type
     - H3s: first-timers; couples & honeymoon; families with small kids; nightlife; budget; wellness; long stays & digital nomads.
  5. Where to stay by season
     - Oct–Dec: east-coast red flags; the west and north are more sheltered from the NE wind [derived, check with Mea].
     - Feb–Apr: anywhere.
  6. Swimming, tides and beaches by area: north and west beaches are tidal, so swim at high tide; link the tide widget.
  7. Hotels, resorts or villas?
     - Luxury 10,000+ THB.
     - Named resorts as context only, never linked: Four Seasons (Laem Yai), SALA Choengmon, W (Maenam), Banyan Tree and Silavadee (Lamai), Anantara Bophut, Conrad (Taling Ngam).
     - White Lotus season 3 note.
  8. Prices and booking tips for 2026–27
     - Peak +30–80% in Dec–Feb and Jul–Aug.
     - Steep concrete villa roads; electricity billed per unit; ask about road access.
  9. Where to stay for boat trips: pickup zones and the +400 THB surcharge areas; Thong Krut for Pig Island; north coast for the Phangan/Tao piers.
  10. Where to stay for the Full Moon Party from Samui: the north coast near the Big Buddha and Bangrak piers, or anywhere with our door-to-door boat.
  11. Honest downsides by area: Chaweng traffic, aircraft noise at Bang Rak, quiet nights in Maenam and Choeng Mon, distances on the west coast.
  12. Where to stay FAQ
- **Data blocks:** comparison table; area map; pickup-zone table (area | included / +400 THB); season table; "Find a villa" CTA strip.
- **FAQ (exact questions, 10):**
  1. What is the best area to stay in Koh Samui?
  2. Is Chaweng or Lamai better?
  3. Where should families with young children stay on Koh Samui?
  4. Where should I stay on Koh Samui for a honeymoon?
  5. Which Koh Samui beaches are best for swimming?
  6. Where should I stay for the Full Moon Party?
  7. Is Bophut beach good for swimming?
  8. What is the cheapest area to stay on Koh Samui?
  9. How far is each area from the airport?
  10. Do your tours pick up from every area?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-villas/`, `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/pig-island-speedboat-tour/`, `/product/full-moon-party-speedboat-koh-samui/` · **Supporting guide links:** `/chaweng-vs-lamai/`, `/where-to-stay-koh-samui-with-kids/`, `/koh-samui-honeymoon/`, `/koh-samui-beaches/`, the area place pages · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):**
  - Chaweng Central beach.
  - Choeng Mon bay with Koh Fan Noi.
  - Lamai beach from Hin Ta.
  - Fisherman's Village street at dusk.
  - Maenam palms.
  - Lipa Noi shallows at sunset.
  - Taling Ngam cliffs.
  - A steep concrete villa road.
- **Word target:** 3,500
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of Place (areas with geo)
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** O14/O15 research; Mea's local tips; rate checks on hotel sites (verify only)

#### `/koh-samui-itinerary/` · D4 · GUIDE
- **Primary keyword:** koh samui itinerary · **Secondary:** 3 days in koh samui, 5 day koh samui itinerary, 7 days in koh samui, koh samui 10 day itinerary, koh samui itinerary november
- **Title tag:** Koh Samui Itinerary 2026: 3, 5, 7 & 10-Day Plans · **Meta description:** Day-by-day Koh Samui itineraries from locals: Ang Thong or Pig Island, a round-island sights loop, Koh Tao, Koh Phangan and a version for November.
- **H1:** Koh Samui Itinerary: 3, 5, 7 and 10 Days, Day by Day
- **Answer-first lead (what it must say in 2–3 sentences):**
  - 3 days: arrive and eat at Fisherman's Village; one boat day (Ang Thong from 16 Dec to 31 Oct, Pig Island on any date); a round-island sights loop.
  - 5 days adds Koh Tao & Nang Yuan and a west-coast sunset. 7 days adds Koh Phangan and a slow wellness day.
- **Section outline (H2 → H3), 22 H2s to match the twin:**
  1. 3 days on Koh Samui
     - H3 Day 1: arrive, Chaweng or Fisherman's Village (Fri walking street ~17:00–23:00).
     - H3 Day 2: Ang Thong (07:30–08:30 pickup, back 16:30–17:00), or Pig Island 1 Nov–15 Dec.
     - H3 Day 3: round-island loop: Big Buddha (07:00–18:30), Wat Plai Laem, Lad Koh, Hin Ta & Hin Yai, Wat Khunaram, Na Muang 1 (09:00–17:00).
  2. 5 days on Koh Samui
     - H3 Days 1–3 as above.
     - H3 Day 4: Koh Tao & Nang Yuan (8–9 h; 250 THB cash).
     - H3 Day 5: Pig Island sunset tour or west-coast beach.
  3. 7 days on Koh Samui
     - H3 Day 6: Koh Phangan day, or a Full Moon night if dates align.
     - H3 Day 7: cooking class, ethical elephant sanctuary or spa.
  4. A 10-day itinerary
     - H3 Days 8–9: Ang Thong overnight (tent 3,600 / bungalow 4,200).
     - H3 Day 10: market, massage, goodbye.
  5. The November to mid-December version: swap Ang Thong for Pig Island and Koh Tao (sea permitting); add rainy-day backups.
  6. Itineraries by travel style
     - H3s: couples & honeymoon; families with children; party trips; wellness; divers & snorkellers.
  7. Where to stay for each itinerary.
  8. Your itinerary by season: Feb–Apr, May–Sep, Oct–Dec.
  9. What's on each day of the week (O10 cheat sheet).
  10. Booking ahead: online cut-off at midnight ICT the day before; FMP nights; 20 Dec–5 Jan.
  11. Getting around on an itinerary: tour pickups, Grab, a full-day taxi (2,000–3,000), scooter rules.
  12. Mistakes to avoid
      - Khao Sok as a day trip.
      - Ang Thong in November.
      - A boat day on your flight day.
      - Swimming at Bophut.
      - Ignoring red flags.
      - Riding without an IDP.
  13. Rainy-day ideas: Central Samui, cooking class, spa, Muay Thai (Mon–Sat nights except Thu), temples.
  14. A rough daily budget: tiers, linking to the budget page.
  15. Adding nearby islands
      - Phangan, Tao, Khao Sok 2D/1N.
      - Tour boats return to the island they left from, so there's no one-way hopping.
  16. Sunsets by coast: where to be at 18:00 [check sunset times by month].
  17. Markets and night food by day.
  18. Itineraries with a toddler or grandparents: low-walking options; the Wua Talab staircase warning.
  19. How we plan an itinerary for guests: WhatsApp, local since 2006.
  20. Before you go: final checks (TDAC, IDP, cash for island fees, insurance).
  21. Itinerary FAQ
  22. Book the boat days: product cards.
- **Data blocks:**
  - Day cards (timeline per day); Leaflet map with a per-day route polyline (loop day).
  - Day-of-week table; season swap table; budget table; Ang Thong closure banner.
- **FAQ (exact questions, 8):**
  1. How many days do you need on Koh Samui?
  2. Is 3 days enough for Koh Samui?
  3. What is the best day trip from Koh Samui?
  4. Can I do Ang Thong and Koh Tao on the same trip?
  5. Can I follow this itinerary in November?
  6. Should I plan around the Full Moon Party?
  7. Can I visit Khao Sok from Samui in a day?
  8. Can I see the island without renting a scooter?
- **Money links (internal, 2–4 product/booking pages):** `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/pig-island-speedboat-tour/`, `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/`, `/product/ang-thong-overnight-camping-koh-samui/` · **Supporting guide links:** `/where-to-stay-koh-samui/`, `/koh-samui-weather/`, `/koh-samui-budget/`, `/koh-samui-temples/`, `/koh-samui-markets/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):**
  - Wat Plai Laem Guanyin statue.
  - Hin Ta & Hin Yai rocks.
  - Kayaks at Ang Thong.
  - Pig Island beach at sunset.
  - Koh Nang Yuan sandbar.
  - A cooking class mise en place.
  - Fisherman's Village Friday crowd.
- **Word target:** 3,500
- **Schema:** Article, BreadcrumbList, FAQPage, TouristTrip (itinerary ItemList for the 3/5/7-day plans)
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** O8/O9/O10/O13 tables; sight opening hours re-checked on Google Maps listings (verify only)

#### `/koh-samui-weather/` · D4 (pillar) · GUIDE
- **Primary keyword:** koh samui weather · **Secondary:** koh samui weather by month, best time to visit koh samui, koh samui rainy season, koh samui weather november, koh samui weather december, koh samui monsoon
- **Title tag:** Koh Samui Weather 2026: Live Forecast & Month by Month · **Meta description:** Live Koh Samui forecast and weather by month: rain, sea temperature and boat conditions. Driest Feb–Apr, wettest November, Ang Thong closed 1 Nov–15 Dec.
- **H1:** Koh Samui Weather: Live Forecast and Weather by Month
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Samui is warm all year (highs 29–33 °C, sea 28–30 °C). The driest, calmest months are February to April.
  - The rain comes with the north-east monsoon from October to December, peaking in November (~445 mm), which is the opposite of Phuket.
  - Boat trips run most of the year, but Ang Thong closes 1 Nov–15 Dec.
- **Section outline (H2 → H3):**
  1. Koh Samui weather today and the 7-day forecast: Open-Meteo widget (9.512, 100.013), server-cached for 30 min, with a fallback.
  2. Live rain and wind map: Windy embed or link (allowed utility).
  3. Will my boat trip run? How we decide
     - Wave and wind thresholds agreed with Mea [check numbers].
     - The operator decides on the morning. Guest choice: full refund or new date.
  4. Koh Samui weather by month
     - 12-row table (O7): high/low, rain mm, rain days, sea °C, what to expect, best for, Ang Thong status.
  5. Best months for each activity
     - Table: activity | best months | why.
     - Ang Thong snorkelling Feb–Apr; diving Feb–Oct, clearest Mar–Apr; east-coast swimming Jan–Sep; waterfalls flowing Oct–Jan, thin Feb–Apr; budget/value Oct–Nov; kitesurfing [check].
  6. The three seasons
     - H3 Dry season: January to April.
     - H3 Hot season with short showers: May to September (sheltered from the SW monsoon).
     - H3 North-east monsoon: October to December.
  7. Samui vs Phuket and Krabi: opposite seasons; a two-row monthly comparison.
  8. Storms and typhoons: Dec–Jan tropical-storm risk (Pabuk, Jan 2019, closed ferries and Ang Thong); how warnings work.
  9. Sea, waves and tides
     - H3 Sea conditions (link).
     - H3 Tides today (link).
     - H3 Ferries in bad weather (link).
  10. How the weather affects tours and ferries
      - Ang Thong closure.
      - Pig Island runs from Thong Krut on the south coast [check sheltering claim with Mea].
      - Party boats run subject to safe seas.
  11. What to pack for each season
      - H3 Jan–Apr.
      - H3 May–Sep.
      - H3 Oct–Dec.
  12. Official forecasts and warnings: TMD marine and weather warnings (P), Windy (P).
  13. Koh Samui weather FAQ
- **Data blocks:**
  - Live forecast widget; Windy map.
  - Monthly table; climate chart (rain bars + high/low lines + sea temperature).
  - Activity table; Ang Thong status chip; time widget.
- **FAQ (exact questions, 10):**
  1. What is the weather like on Koh Samui today?
  2. What is the best month to visit Koh Samui?
  3. When is the rainy season on Koh Samui?
  4. Does it rain all day in November?
  5. Is Koh Samui good in July and August?
  6. Is December a good time to visit Koh Samui?
  7. Does Koh Samui get typhoons?
  8. When is Ang Thong Marine Park closed?
  9. How warm is the sea around Koh Samui?
  10. What happens to my tour if the weather is bad?
- **Money links (internal, 2–4 product/booking pages):** `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/pig-island-speedboat-tour/`, `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/` · **Supporting guide links:** `/koh-samui-in-november/`, `/koh-samui-sea-conditions/`, `/koh-samui-tides/`, `/koh-samui-itinerary/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** blue-sky Chaweng (Feb); monsoon clouds over Lamai (Nov); calm Ang Thong lagoon; red flag on Chaweng beach; rain on a Fisherman's Village street.
- **Word target:** 3,500
- **Schema:** Article, BreadcrumbList, FAQPage, Place (geo)
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):**
  - TMD (tmd.go.th) **(P)**; WMO 1991–2020 normals; Open-Meteo **(P, utility)**; Windy **(P, utility)**.
  - DNP Ang Thong notice; Pabuk 2019 reports.

#### `/getting-around-koh-samui/` · D4 · GUIDE
- **Primary keyword:** getting around koh samui · **Secondary:** grab koh samui, koh samui taxi prices, songthaew koh samui, koh samui transport, bolt koh samui
- **Title tag:** Getting Around Koh Samui 2026: Taxis, Grab & Songthaews · **Meta description:** How to get around Koh Samui: unmetered taxi prices, where Grab works, songthaew fares from 30 THB, scooter and car rules, night transport and tips from locals.
- **H1:** Getting Around Koh Samui: Taxis, Grab, Songthaews and Scooters
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Taxis don't use meters, so agree the fare first (airport → Chaweng ~400–600 THB).
  - Grab works best in Chaweng, Bophut and Lamai (short hops 80–120 THB). Songthaews charge locals 30–80 THB along the ring road by day, cash only, and mostly stop by 20:00–22:00.
  - Scooters cost 150–350 THB a day but need an IDP with the motorcycle category.
- **Section outline (H2 → H3), 24 H2s to match the twin:**
  1. Transport options and typical prices
     - Table: option | 2026 price | good for | watch out for.
     - Rows: songthaew, taxi, Grab, Bolt [check], scooter, car, airport minibus, private driver (2,000–3,000/day), hotel shuttle.
  2. Taxis: unmetered fares and zones; night surcharge +20–30% after 22:00 [S].
  3. Airport transfers: kiosk 400–700; minibus 100–250 pp.
  4. Grab on Koh Samui: coverage, waits of 5–20 min, surges in rain and evenings, no airport-zone pickup.
  5. Bolt and other apps: test in-app on the island before publishing [check].
  6. Songthaews: routes, fares and hours
     - Table, local vs fair tourist price: Chaweng → Lamai 30–40/50–60; → Bophut 40–50/60–80; → Maenam 50–60/70–100; → Nathon 60–80/80–120.
  7. Renting a scooter: summary, linking to the scooter page.
  8. Renting a car: summary, linking to the car page.
  9. Bicycles and e-bikes: summary, linking to the bicycle page.
  10. Getting around by area: what's walkable in Chaweng, Lamai, Bophut and Maenam; the west coast needs wheels.
  11. Pier to hotel: Nathon, Lipa Noi and the Bangrak piers.
  12. Licences, helmets and insurance: IDP motorcycle category; helmet fine up to 2,000 THB pp; checkpoints.
  13. Getting around at night: songthaews stop; Grab/taxi; drink-drive limit [check 0.05% BAC].
  14. The rainy season: flooded low roads Oct–Dec; wet hills on Route 4170.
  15. Boat days: pickups included from most areas; +400 THB pp return for remote areas.
  16. Island hopping from Samui: Phangan/Tao ferries; no one-way trips on tour boats.
  17. Getting around with children: car seats rarely available [check]; minibus or private driver.
  18. Getting around on a budget: songthaews by day, Grab shares.
  19. Accessibility: few pavements, steep side roads, open-air airport [check].
  20. Private driver and round-island day: route and timing.
  21. Safety checklist before you ride.
  22. What getting around costs: sample-week table for three traveller types.
  23. Our advice after 20 years on the island.
  24. Getting around FAQ
- **Data blocks:** price table; songthaew fare table; sample-week cost table; map of the ring road with zone colours, checkpoints and piers.
- **FAQ (exact questions, 10):**
  1. Do taxis on Koh Samui use meters?
  2. How much is a taxi from Samui airport to Chaweng?
  3. Is there Grab on Koh Samui?
  4. Does Bolt work on Koh Samui?
  5. How much is a songthaew on Koh Samui?
  6. Do songthaews run at night?
  7. Do I need a licence to ride a scooter on Koh Samui?
  8. Can I get around Koh Samui without renting anything?
  9. How much is a driver for a full day?
  10. Do your tours include hotel pickup?
- **Money links (internal, 2–4 product/booking pages):** `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/pig-island-speedboat-tour/`, `/koh-samui-jungle-safari/` (enquiry), `/private-speedboat-koh-samui-to-koh-phangan/` · **Supporting guide links:** `/koh-samui-motorbike-rental/`, `/koh-samui-car-rental/`, `/koh-samui-roads/`, `/koh-samui-airport/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** blue songthaew on Chaweng Beach Road; taxi rank; scooter rider with helmet; ring road through palms; our pickup minivan (own photo).
- **Word target:** 3,000
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Department of Land Transport (dlt.go.th) **(P)**; GOV.UK Thailand safety page; Royal Thai Police helmet-fine announcement (2025)

#### `/koh-samui-roads/` · D4 · GUIDE
- **Primary keyword:** koh samui roads · **Secondary:** koh samui ring road, driving in koh samui, route 4169 koh samui, koh samui road safety, drive around koh samui
- **Title tag:** Koh Samui Roads & Driving 2026: Ring Road, Hills, Safety · **Meta description:** Driving on Koh Samui: the 51 km ring road (Route 4169), steep 4170 and 4171 connectors, checkpoints and fines, rainy-season flooding and what to do in a crash.
- **H1:** Koh Samui Roads and Driving: Ring Road, Hill Roads and Safety
- **Answer-first lead (what it must say in 2–3 sentences):**
  - The 51 km ring road (Route 4169) is mostly two-lane and takes ~90 min non-stop.
  - Two connectors branch off it: Route 4170 in the south-west (Taling Ngam, Thong Krut, Lipa Noi), which is steep, narrow and slippery when wet, and Route 4171 in the north-east (Bangrak, Plai Laem, Choeng Mon, Big Buddha).
  - Traffic drives on the left. Most crashes happen on wet hills. Police checkpoints sit near Chaweng Lake Road, the airport and along 4169.
- **Section outline (H2 → H3):**
  1. Samui's road network
     - Map + table (road | section | character | hazards) for 4169, 4170, 4171 and Chaweng Beach Road.
     - Route numbers are [S], so verify them on the DOH map.
  2. The round-island drive: clockwise stops with approximate km [check]; ~90 min non-stop, a full day with stops.
  3. Hill roads and steep villa driveways
     - Secret Buddha Garden needs a 4x4 or a tour.
     - Na Muang 2 is a 20–40 min steep climb on foot.
     - Concrete gradients; brake fade on descents.
  4. Rules of the road: drive on the left; helmets; licence + IDP; seatbelts; speed limits [check]; drink-drive limit [check].
  5. Police checkpoints and fines: helmet up to 2,000 THB pp (since 1 Jun 2025); no licence/IDP 500–1,000 THB [S]; carry documents.
  6. Traffic hotspots and times
     - Chaweng Beach Road evenings.
     - The Fisherman's Village road closes ~16:30 on Fridays; scooters are towed (500+ THB to release).
     - School-run traffic [check].
  7. Rainy season and flooding: low-lying inland and south-west roads in Oct–Dec; potholes; sand on bends.
  8. Parking and towing: where it's tolerated; Fisherman's Village; beach car parks (Hin Ta & Hin Yai ~30 THB).
  9. If you crash: call 1669 (ambulance), 191/1155 (police); photos; police report for insurance; don't sign anything you can't read [check legal wording].
  10. Roads FAQ
- **Data blocks:** road map (Leaflet) with checkpoints, flood-prone stretches [check] and steep sections; road table; emergency box.
- **FAQ (exact questions, 7):**
  1. How long does it take to drive around Koh Samui?
  2. Which side of the road do they drive on in Koh Samui?
  3. Are Koh Samui roads dangerous?
  4. Where are the police checkpoints on Koh Samui?
  5. What is the fine for not wearing a helmet?
  6. Do roads flood in the rainy season?
  7. What should I do after a scooter accident?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-jungle-safari/` (enquiry), `/product/pig-island-speedboat-tour/`, `/product/ang-thong-big-boat-tour-koh-samui/` · **Supporting guide links:** `/getting-around-koh-samui/`, `/koh-samui-motorbike-rental/`, `/koh-samui-car-rental/`, `/koh-samui-hospital/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** ring road at Lamai; steep hill on Route 4170; Lad Koh viewpoint lay-by; flooded side road (Nov); police checkpoint (no faces).
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Department of Highways (doh.go.th) **(P)**; DLT **(P)**; Royal Thai Police; GOV.UK road-safety section

#### `/koh-samui-motorbike-rental/` · D4 · GUIDE
- **Primary keyword:** scooter rental koh samui · **Secondary:** motorbike rental koh samui, koh samui scooter price per day, international driving permit motorcycle thailand, helmet fine thailand, monthly scooter rental koh samui
- **Title tag:** Scooter Rental Koh Samui 2026: Prices, IDP & Helmet Law · **Meta description:** Koh Samui scooter rental in 2026: 150–350 THB a day, monthly deals, the IDP motorcycle rule insurers enforce, the 2,000 THB helmet fine and deposit tips.
- **H1:** Scooter and Motorbike Rental on Koh Samui (2026)
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Prices: a 125 cc scooter costs ~150–350 THB a day, 150–160 cc 200–450, and a month 2,000–4,500.
  - You legally need your home licence plus an International Driving Permit with the motorcycle category, or your insurance won't pay.
  - The helmet fine has been up to 2,000 THB per person since 1 June 2025. Never leave your passport as a deposit.
- **Section outline (H2 → H3):**
  1. Scooter prices on Koh Samui
     - Table: type | per day | per week [check] | per month | typical deposit.
     - Chaweng and Lamai cost most; Maenam, Nathon and Lipa Noi least.
  2. Licence and IDP rules: motorcycle (A) category; ASEAN licences exempt [S]; which IDP convention Thailand accepts [check].
  3. The helmet law and fines: rider and pillion; up to 2,000 THB pp; the old 500 THB figure is outdated.
  4. Deposits and passports: 1,000–5,000 THB cash; FCDO advises never handing over your passport.
  5. Insurance: rental vs travel policy
     - FCDO says many tourist bikes are unregistered or not road-legal.
     - Cover is void off-island (on ferries).
  6. Checklist before you ride: photo and video every panel; brakes, tyres, lights; registration book [check name]; fuel level; helmet fit.
  7. Where to rent, by area: shops vs hotel desks; reading the contract.
  8. Riding on Samui: hills, rain, sand on bends, dogs, night riding, the 4170 descents.
  9. Damage disputes and scams: evidence; the Tourist Police (1155); link to the scams page.
  10. Alternatives to a scooter: Grab, a driver, tours with pickup from most areas.
  11. Scooter rental FAQ
- **Data blocks:** price table; pre-ride checklist (printable card); a "Do you have the right licence?" decision box.
- **FAQ (exact questions, 9):**
  1. How much does it cost to rent a scooter on Koh Samui?
  2. Do I need an international driving permit for a scooter in Thailand?
  3. Is my car licence enough to ride a scooter?
  4. What is the fine for riding without a helmet?
  5. Should I leave my passport as a deposit?
  6. Does travel insurance cover scooter accidents in Thailand?
  7. Can I take a rented scooter to Koh Phangan?
  8. Is it safe to ride a scooter on Koh Samui?
  9. How much is a monthly scooter rental?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-jungle-safari/` (enquiry), `/koh-samui-atv-quad-bike/` (enquiry), `/product/pig-island-speedboat-tour/` · **Supporting guide links:** `/koh-samui-roads/`, `/koh-samui-travel-insurance/`, `/koh-samui-scams/`, `/getting-around-koh-samui/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** Honda Click scooters lined up at a rental shop; rider and pillion in helmets; photographing scooter damage before rental; an IDP booklet with the motorcycle stamp.
- **Word target:** 2,200
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** DLT **(P)**; GOV.UK Thailand safety page **(P as a reference)**; Royal Thai Police / Nation report on the 1 Jun 2025 helmet fines

#### `/koh-samui-car-rental/` · D4 · GUIDE
- **Primary keyword:** car rental koh samui · **Secondary:** rent a car koh samui airport, koh samui car hire price, jeep rental koh samui, koh samui car rental insurance, driving licence thailand tourist
- **Title tag:** Car Rental Koh Samui 2026: Prices, Licence & Insurance · **Meta description:** Renting a car on Koh Samui: compacts approx. 800–1,200 THB a day, SUVs 1,500–2,500, the IDP rule, insurance excess, airport pickup and car ferries.
- **H1:** Car Rental on Koh Samui: Prices, Licences and Driving Tips
- **Answer-first lead (what it must say in 2–3 sentences):**
  - A compact car costs approx. 800–1,200 THB a day and an SUV 1,500–2,500.
  - You need your licence plus an International Driving Permit.
  - Choose full ("first-class") insurance with a low excess [check term], and check whether the contract allows the car on the Donsak ferry.
- **Section outline (H2 → H3):**
  1. Car rental prices: table (car | per day | notes): compact, SUV, 4x4 pickup [check], HiAce van (~US$65–90 [S]).
  2. Licence and IDP requirements.
  3. Insurance and excess: what "first-class" covers [check]; deposits on credit cards; the ferry clause.
  4. Airport pickup vs local agencies: international brands present [S: Hertz, Budget, named as text only, no links]; local firms.
  5. Which car for Samui's hills: automatic, ground clearance, a 4x4 for Secret Buddha Garden.
  6. Driving and parking tips: left-hand traffic; scooters filtering; parking at the beaches and Fisherman's Village.
  7. Taking a car on the ferry: Seatran car ~550 THB to Donsak; Raja vehicle fares unpublished; contract limits.
  8. Car rental FAQ
- **Data blocks:** price table; checklist; map of rental clusters (airport, Chaweng) without business pins.
- **FAQ (exact questions, 7):**
  1. How much is car rental on Koh Samui?
  2. Do I need an international driving permit to rent a car?
  3. Can I rent a car at Samui airport?
  4. Is it easy to drive on Koh Samui?
  5. Do I need a 4x4 on Koh Samui?
  6. Can I take a rental car to the mainland?
  7. What insurance should I take?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-jungle-safari/` (enquiry), `/product/pig-island-speedboat-tour/`, `/product/ang-thong-marine-park-day-tour-koh-samui/` · **Supporting guide links:** `/koh-samui-roads/`, `/getting-around-koh-samui/`, `/surat-thani-to-koh-samui/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** compact car on the coast road; 4x4 on the hill track to Secret Buddha Garden; car on the Seatran ferry deck.
- **Word target:** 1,600
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** DLT **(P)**; Office of Insurance Commission (oic.or.th) **(P)** for insurance classes

#### `/koh-samui-bicycle-rental/` · D4 · GUIDE
- **Primary keyword:** bicycle rental koh samui · **Secondary:** e-bike rental koh samui, cycling in koh samui, electric scooter koh samui, mountain biking koh samui, koh samui cycling route
- **Title tag:** Bicycle & E-Bike Rental Koh Samui 2026: Routes & Tips · **Meta description:** Cycling on Koh Samui, honestly: flat coastal stretches, steep hills, heat and traffic, where to rent a bicycle or e-bike, e-scooter rules and safety tips.
- **H1:** Bicycle and E-Bike Rental on Koh Samui
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Cycling works on the flatter coastal stretches (e.g. Maenam–Bophut [check]) and early in the morning. The ring road is busy and the interior hills are steep, so most visitors are better off on an e-bike or on guided rides.
  - E-scooters are not legal on public roads [check DLT status]. Rental prices [check: collect from 3+ shops].
- **Section outline (H2 → H3):**
  1. Is Koh Samui good for cycling? Honest pros and cons: heat, hills (Khao Pom 635 m), traffic, dogs.
  2. Where to rent and what it costs: table (type | per day | per week) [check].
  3. E-bikes, e-scooters and the law [check DLT/police position; helmet rule].
  4. The best routes
     - Flat coastal rides [check].
     - Climbs: Na Muang road, Lamai hills [check].
     - Map with route polylines.
  5. Safety: ride before 10:00; lights at dusk (~18:00); rain; potholes; dogs.
  6. Guided rides and tours: enquiry only once a partner is confirmed.
  7. Bicycle FAQ
- **Data blocks:** route map (GPX-derived polylines, verified by riding or by Mea's team); price table; sunrise and sunset widget.
- **FAQ (exact questions, 6):**
  1. Can you cycle around Koh Samui?
  2. Where can I rent a bicycle on Koh Samui?
  3. Are e-scooters legal on Koh Samui?
  4. How long does it take to cycle around the island?
  5. Is it safe to cycle on the ring road?
  6. What is the best time of day to cycle?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-jungle-safari/` (enquiry), `/product/pig-island-speedboat-tour/`, `/koh-samui-kayak-sup/` · **Supporting guide links:** `/koh-samui-roads/`, `/getting-around-koh-samui/`, `/koh-samui-hiking/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** cyclist on the Maenam coast road at sunrise; e-bike parked by Big Buddha; mountain-bike track in the interior hills.
- **Word target:** 1,500
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** DLT **(P)**; Royal Thai Police

#### `/thailand-visa-guide/` · D4 · GUIDE
- **Primary keyword:** thailand visa guide 2026 · **Secondary:** thailand visa exemption 30 days, thailand 60 day visa exemption ended, tdac thailand digital arrival card, thailand visa on arrival 2026, dtv visa thailand, visa koh samui
- **Title tag:** Thailand Visa Guide 2026: 30-Day Rule, TDAC & Extensions · **Meta description:** Thailand cut visa-free stays to 30 days on 15 Sep 2026. Check your nationality, file the free TDAC, extend at Koh Samui immigration and see long-stay visas.
- **H1:** Thailand Visa Guide 2026: Rules by Nationality, from Koh Samui
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Since 15 September 2026, visa-exempt visitors from 60 countries, including the UK, US, Canada, Australia and all EU states, get **30 days**, not 60.
  - You can extend once by up to 30 days at Koh Samui Immigration in Maenam (form TM.7, 1,900 THB).
  - Every foreign arrival must file the free TDAC within 3 days before arrival. No tourist entry fee is collected (as of {date}).
- **Section outline (H2 → H3):**
  1. Check your nationality: an interactive passport selector (data from Royal Gazette lists via MFA/immigration). Output: exemption 30 days / bilateral / VoA / visa required.
  2. What changed on 15 September 2026
     - Four Royal Gazette notices dated 31 Aug 2026; the 93-country 60-day scheme (July 2024) was repealed.
     - Transitional rule: anyone who entered before 15 Sep keeps the stay stamped on entry.
  3. Visa exemption: 30 days (60 countries)
     - Table: rule | what it means.
     - Stay 30 days; one extension of 30 days; land-border entries 2 a year; frequent entries [check]; Mauritius and Seychelles 15 days.
  4. Bilateral agreements: table (visa-free stay | nationalities | notes) [check every row against MFA]. Waivers such as China and Russia were not cancelled.
  5. Visa on arrival: Azerbaijan, Belarus, Serbia.
  6. Visa required: how to apply on the official Thai e-Visa portal (thaievisa.go.th).
  7. Before you fly
     - H3 TDAC: official site only, free, within 3 days; warn about paid look-alikes.
     - H3 Passport validity [check 6-month rule] and onward ticket.
     - H3 Proof of funds: 10,000 THB pp / 20,000 per family; UK nationals have been refused without it (GOV.UK).
  8. The tourist entry fee: not in force. A 450 THB flat fee was endorsed on 24 Aug 2026 and still needs a hearing, Cabinet approval and a Gazette notice. Re-check monthly.
  9. Long-stay visas
     - Table: visa | for | stay | key requirements.
     - DTV: 5 years, up to 180 days per entry, 10,000 THB fee, 500,000 THB funds; from 31 Aug 2026 a criminal-record certificate and applying via the mission for your nationality or residence.
     - Tourist visa, Non-O (retirement/family), Non-ED, Non-B, LTR [check each].
  10. Extending your stay on Koh Samui
      - Office at 333 Maenam Rd Soi 1; tel +66 77 423 440; usually Mon–Fri 08:30–16:30 (call ahead).
      - H3 What to bring for a 30-day extension.
  11. Rules while you are in Thailand
      - H3 90-day reporting (TM.47).
      - H3 Address notification (TM.30).
      - H3 Re-entry permit (fees [check]).
      - H3 Overstay fines and bans: 500 THB/day up to 20,000; bans up to 10 years. Table: overstay | if you surrender | if arrested [check ban tiers].
      - H3 Visa runs in 2026.
  12. Map: immigration, police and hospitals on Koh Samui (Leaflet).
  13. Police, emergencies and lost passports: 1155/191/1669; police report → your embassy in Bangkok → immigration.
  14. Thailand visa FAQ
  15. Official sources: publishable gov links only (tdac.immigration.go.th, immigration.go.th, thaievisa.go.th, mfa.go.th, GOV.UK).
- **Data blocks:**
  - Nationality checker (JSON from official lists, with a last-checked date).
  - Rules table, bilateral table, long-stay table, overstay table.
  - Map pins: Immigration Maenam, Tourist Police, police stations, 5 hospitals.
  - "Last checked" box at the top.
- **FAQ (exact questions, 10):**
  1. Do I need a visa for Thailand in 2026?
  2. Is the 60-day visa exemption still available?
  3. I entered before 15 September 2026. How long can I stay?
  4. Can I extend my stay on Koh Samui?
  5. Where is the immigration office on Koh Samui?
  6. What is the TDAC and is it free?
  7. Is there a tourist entry fee for Thailand?
  8. How many times can I enter Thailand overland visa-free?
  9. What is the fine for overstaying in Thailand?
  10. Can I work on Koh Samui on a visa exemption or DTV?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/`, `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/` · **Supporting guide links:** `/koh-samui-visa-extension/`, `/koh-samui-immigration-office/`, `/koh-samui-coworking/`, `/working-on-koh-samui/` · **Sister-site link (max 1, only if genuinely useful):** none (same slug on kohphangan.com; each self-canonical, don't cross-link)
- **Images needed (descriptions):** Thai passport stamp page (illustrative, no real personal data); TDAC form on a phone (mock-up, no real data); Koh Samui Immigration building in Maenam (own photo).
- **Word target:** 3,200
- **Schema:** Article, BreadcrumbList, FAQPage, GovernmentOffice (Samui Immigration, geo [check])
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):**
  - tdac.immigration.go.th **(P)**; immigration.go.th **(P)**; thaievisa.go.th **(P)**; mfa.go.th visa-exemption list **(P)**.
  - Royal Gazette (ratchakitcha.soc.go.th) **(P)**; GOV.UK entry requirements **(P)**; TAT news.

#### `/koh-samui-visa-extension/` · D4 · GUIDE
- **Primary keyword:** koh samui visa extension · **Secondary:** extend visa exemption koh samui, tm7 koh samui, 30 day extension thailand 1900 baht, dtv extension koh samui, visa extension documents thailand
- **Title tag:** Koh Samui Visa Extension 2026: TM.7, 1,900 THB, Steps · **Meta description:** Extend a 30-day visa exemption once by 30 days at Koh Samui Immigration, Maenam: TM.7, 1,900 THB, documents, hours, queue tips and what if it's refused.
- **H1:** Visa Extension on Koh Samui: How to Extend at Maenam Immigration
- **Answer-first lead (what it must say in 2–3 sentences):**
  - A 30-day visa-exempt stay can be extended once, by up to 30 days, at Koh Samui Immigration (333 Maenam Rd, Soi 1, Maenam).
  - Use form TM.7 and pay the 1,900 THB fee. Approval is at the officer's discretion.
  - Bring your passport and copies, a photo, proof of address (TM.30) [check] and possibly an onward ticket.
- **Section outline (H2 → H3):**
  1. Who can extend, and for how long
     - Table: how you entered | extension | fee.
     - Visa-exempt 30 + 30, 1,900. Tourist visa [check]. DTV +180 days, 1,900. VoA [check]. Pre-15-Sep entries [check].
  2. Documents checklist: passport + copies of the photo page, entry stamp and TDAC [check]; 4×6 cm photo [check]; TM.30 receipt [check]; booking/address; onward ticket.
  3. Step by step at the office: queue tickets [check]; dress code (no shorts or vests [check]); photocopy service on site [check]; how long it takes.
  4. Location, hours and getting there
     - Map; directions from Chaweng/Lamai/Nathon [check km/min]; parking.
     - +66 77 423 440; usually Mon–Fri 08:30–16:30; closed weekends and public holidays.
     - Old Nathon pins are wrong (the office moved in 2016).
  5. Costs: 1,900 THB fee; agent fees [check range]; payment method [check cash].
  6. If your extension is refused: leave by your permitted date; overstay fines 500 THB/day up to 20,000; re-entry options.
  7. Using a visa agent: legitimate paperwork help vs illegal "stamp" services; never hand over your passport without a receipt.
  8. Visa extension FAQ
- **Data blocks:** eligibility table; document checklist (tickable, saved with localStorage); map and opening-hours box; overstay calculator (days × 500, capped at 20,000).
- **FAQ (exact questions, 8):**
  1. Can I extend my 30-day visa exemption on Koh Samui?
  2. How much does a visa extension cost in Thailand?
  3. How early can I apply for an extension?
  4. What documents do I need for a TM.7 extension?
  5. Where is Koh Samui immigration?
  6. Is Koh Samui immigration open on Saturdays?
  7. Can I extend more than once?
  8. What happens if I overstay by a day?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/`, `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/`, `/koh-samui-villas/` · **Supporting guide links:** `/thailand-visa-guide/`, `/koh-samui-immigration-office/`, `/koh-samui-long-stay/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** Koh Samui Immigration entrance, Maenam (own photo); TM.7 form (blank official form image); queue-ticket machine [check it exists].
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage, GovernmentOffice
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** immigration.go.th **(P)** (TM.7 form, fees); GOV.UK entry page; a phone call to +66 77 423 440 for hours

#### `/koh-samui-travel-insurance/` · D4 · GUIDE
- **Primary keyword:** travel insurance koh samui · **Secondary:** travel insurance thailand scooter, do i need travel insurance for thailand, travel insurance diving thailand, hospital costs koh samui, motorbike insurance idp thailand
- **Title tag:** Travel Insurance for Koh Samui 2026: What to Check · **Meta description:** What Koh Samui travel insurance must cover: hospital deposits, scooters and the IDP rule, diving depth, jet skis, evacuation and weather cancellations.
- **H1:** Travel Insurance for Koh Samui: What Your Policy Must Cover
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Thailand doesn't require insurance for visa-exempt tourists [check]. But Samui's private hospitals usually ask for an insurer's guarantee or a deposit before treatment [check].
  - Most scooter claims fail without an IDP with the motorcycle category.
  - If we cancel a boat trip for weather, you choose a full refund or a new date, so you don't need to claim.
- **Section outline (H2 → H3):**
  1. Is travel insurance mandatory for Thailand? Visa types that require health insurance (Non-O-A, LTR [check]; DTV [check]).
  2. What to check in your policy: medical limit; evacuation to Bangkok or home; licence clause; alcohol exclusion; scuba depth; jet skis and water sports; gadgets; cancellation.
  3. Scooters and motorbikes: IDP motorcycle category; helmet; engine size limits in policies [check].
  4. Diving, snorkelling and the hyperbaric chamber: SSS Network, Bophut [S, check]; depth and certification clauses.
  5. Hospitals and paying: direct billing vs pay-and-claim [check per hospital]; keep every receipt.
  6. Weather, closures and trip disruption: the Ang Thong closure is scheduled, so it's not an insurable surprise; our sitewide cancellation policy; ferry cancellations.
  7. Theft and making a claim: Tourist Police report (1155); medical reports in English.
  8. Travel insurance FAQ
- **Data blocks:** policy checklist table (cover | why it matters on Samui | minimum we suggest [check with Mea; avoid specific sums unless sourced]); claim-steps timeline.
- **FAQ (exact questions, 7):**
  1. Do I need travel insurance for Koh Samui?
  2. Does travel insurance cover scooter accidents in Thailand?
  3. Will a hospital on Koh Samui treat me without insurance?
  4. Does my insurance cover diving on Koh Samui?
  5. Am I covered on a jet ski?
  6. What if my boat trip is cancelled for weather?
  7. How do I get a police report for an insurance claim?
- **Money links (internal, 2–4 product/booking pages):** `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/pig-island-speedboat-tour/`, `/terms-and-conditions/` (cancellation policy) · **Supporting guide links:** `/koh-samui-hospital/`, `/koh-samui-motorbike-rental/`, `/koh-samui-tourist-police/`, `/koh-samui-diving/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** hospital reception (licensed stock, no patients); a scooter with helmets; a diver on a descent line.
- **Word target:** 1,600
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** GOV.UK Thailand (insurance and health sections) **(P)**; Thai consular requirements for Non-O-A/LTR **(P)**; hospital admissions pages (verify only)

#### `/koh-samui-sim-card-wifi/` · D4 · GUIDE
- **Primary keyword:** koh samui sim card · **Secondary:** thailand esim, ais vs true thailand, tourist sim thailand price 2026, wifi koh samui, koh samui internet speed
- **Title tag:** Koh Samui SIM Card, eSIM & Wi-Fi 2026: Prices, Coverage · **Meta description:** AIS or True on Koh Samui? 2026 tourist SIM prices (8 days 499 THB, 30 days 1,199), eSIMs, passport registration, coverage at sea and fibre for long stays.
- **H1:** SIM Cards, eSIM and Wi-Fi on Koh Samui
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Thailand has two networks: AIS and True (which merged with dtac).
  - Tourist SIMs cost 499 THB (8 days), 699 (15) or 1,199 (30), with unlimited data. You need your passport to register, and since Aug 2025 they last a maximum of 60 days.
  - Travel eSIMs run on the same networks. AIS rated best for coverage in Aug 2026 [S].
- **Section outline (H2 → H3):**
  1. AIS or True? Network facts; the Opensignal Aug 2026 rating [S].
  2. Tourist SIM prices 2026: table (package | AIS | True), including AIS 1 day 49 / 5 days 399 / 60 days 1,599 and True 10-day data 349 [S].
  3. eSIM vs a physical SIM: activation, hotspotting, keeping your home number.
  4. Where to buy on Koh Samui: airport counter [check]; AIS/True shops at Central Samui [check]; 7-Eleven sells top-ups only.
  5. Coverage on the island and at sea: hills and the south [check]; signal at Ang Thong and on boats [check with crew].
  6. Wi-Fi in hotels, cafés and coworking spaces: typical speeds [check by testing].
  7. Home internet for long stays: fibre availability by area [check providers].
  8. Power, plugs and outages: 220 V and plug types [check]; storm outages Oct–Dec.
  9. SIM and Wi-Fi FAQ
- **Data blocks:** SIM price table; coverage map (from operator coverage pages, rendered as our own simplified layer [check licensing]; else text only).
- **FAQ (exact questions, 7):**
  1. Which SIM card is best for Koh Samui?
  2. How much is a tourist SIM in Thailand?
  3. Can I buy a SIM at Samui airport?
  4. Do eSIMs work on Koh Samui?
  5. Do I need my passport to buy a SIM?
  6. Is there mobile signal on Ang Thong tours?
  7. Is Wi-Fi good enough to work from Koh Samui?
- **Money links (internal, 2–4 product/booking pages):** `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/pig-island-speedboat-tour/`, `/koh-samui-villas/` · **Supporting guide links:** `/koh-samui-coworking/`, `/koh-samui-long-stay/`, `/koh-samui-travel-guide/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** SIM pack and passport at a shop counter (no personal data); laptop at a beach café; phone showing a 5G signal at Big Buddha.
- **Word target:** 1,500
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** NBTC (nbtc.go.th) **(P)** for SIM registration rules; AIS/True tourist SIM pages (verify only)

#### `/koh-samui-vs-koh-phangan-vs-koh-tao/` · D11 · GUIDE
- **Primary keyword:** koh samui vs koh phangan vs koh tao · **Secondary:** koh samui or koh phangan, koh phangan vs koh tao, best gulf island thailand, koh samui vs koh tao, which thai island to visit gulf
- **Title tag:** Koh Samui vs Koh Phangan vs Koh Tao: Which Island? 2026 · **Meta description:** Samui for comfort, flights and families; Phangan for the Full Moon and yoga; Tao for diving. A side-by-side comparison from locals who run boats to all three.
- **H1:** Koh Samui vs Koh Phangan vs Koh Tao: Which Island Suits You?
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Choose Samui for easy flights, the widest choice of hotels and private hospitals, and family comfort. Choose Phangan for the Full Moon Party, yoga and wilder beaches. Choose Tao for diving and snorkelling.
  - Many people base on Samui and visit the others: Phangan is 20–30 min away by fast boat, Tao 1.5–2 h.
- **Section outline (H2 → H3):**
  1. The verdict in one box: three cards (best for / skip if).
  2. Side-by-side comparison
     - Table: factor | Samui | Phangan | Tao.
     - Factors: size (228.7 km² / ~125 [check] / ~21 [check]); airport (USM / none / none); time from Bangkok; beaches; nightlife; diving; families; wellness; healthcare (Samui has 5 private hospitals); budget; rainy season (all Oct–Dec, Gulf NE monsoon).
  3. Koh Samui is best for…
  4. Koh Phangan is best for…: Full Moon, Half Moon, yoga. One sister link here.
  5. Koh Tao is best for…: Sail Rock, Nang Yuan, dive courses (partner enquiry).
  6. Combining the islands
     - Ferry times and fares (O2).
     - Day trips vs staying.
     - Tour boats return to the island they left from.
  7. Same weather on all three? Yes: the Gulf NE monsoon Oct–Dec, calmest Feb–Apr.
  8. Island comparison FAQ
- **Data blocks:** verdict cards; comparison table; Gulf map with the three islands, routes and times.
- **FAQ (exact questions, 8):**
  1. Is Koh Samui or Koh Phangan better?
  2. Which island is best for families?
  3. Which island is best for diving?
  4. Can I visit Koh Phangan and Koh Tao from Koh Samui?
  5. Does Koh Phangan have an airport?
  6. Which island is cheapest?
  7. Do the three islands have the same weather?
  8. How many days should I spend on each island?
- **Money links (internal, 2–4 product/booking pages):** `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/`, `/private-speedboat-koh-samui-to-koh-phangan/`, `/product/full-moon-party-speedboat-koh-samui/`, `/product/ang-thong-marine-park-day-tour-koh-samui/` · **Supporting guide links:** `/koh-samui-to-koh-phangan/`, `/koh-samui-to-koh-tao/`, `/where-to-stay-koh-samui/` · **Sister-site link (max 1, only if genuinely useful):** kohphangan.com/ (Koh Phangan section)
- **Images needed (descriptions):** Chaweng beach; Haad Rin Sunrise Beach (own or licensed); Koh Nang Yuan viewpoint; Samui–Phangan speedboat.
- **Word target:** 2,200
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Wikipedia/official provincial data for island areas [check]; O2 ferry data

#### `/ang-thong-speedboat-vs-big-boat/` · D11 · GUIDE
- **Primary keyword:** ang thong speedboat or big boat · **Secondary:** ang thong big boat tour, ang thong speedboat tour from koh samui, ang thong vip tour, ang thong private speedboat, which ang thong tour is best
- **Title tag:** Ang Thong: Speedboat or Big Boat? Honest Comparison 2026 · **Meta description:** Ang Thong by speedboat (1,800 THB, ~8 h) or big boat (1,500 THB, ~10 h)? Time at stops, comfort, seasickness, kids, the 15-guest VIP and private boats.
- **H1:** Ang Thong Marine Park: Speedboat or Big Boat?
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Book the speedboat (1,800 THB, ~8 h) for a shorter day with more time at the stops. Book the big boat (1,500 THB, ~10 h) for a slower, steadier ride with shade [check comfort claims with Mea].
  - The VIP tour (4,500 THB) takes only 15 guests on a big speedboat. A private speedboat costs 33,000 THB per boat.
  - Every option adds the 300 THB (child 150) park fee in cash. The park is closed 1 Nov–15 Dec.
- **Section outline (H2 → H3):**
  1. Verdict box: who should pick which.
  2. Side-by-side comparison
     - Table: factor | speedboat | big boat | VIP | private.
     - Factors: price; duration; pickup 07:30–08:30; back at the pier; travel time each way [check]; stops; kayaking; snorkelling; lunch; shade and toilets [check]; best for.
     - **No guest numbers except VIP = 15.**
  3. The day on each boat: timelines (speedboat: pier ~09:00 → Mae Ko/Emerald Lake → Wua Talab viewpoint → kayak → snorkel → lunch → 16:00–16:30 pier; big-boat timings [check with Mea]).
  4. Seasickness and sea conditions: Feb–Apr calmest; Oct choppy; where to sit [check]; tablets.
  5. Kids, pregnancy and mobility: age bands; life jackets always; Wua Talab staircase (~20–30 min) and Emerald Lake steps [check].
  6. What's included and what isn't: park fee 300/150 cash; pickup "from most areas" + 400 THB remote surcharge.
  7. When to book: next-day online cut-off at midnight ICT; 48 h refund rule for Ang Thong.
  8. The closure (1 Nov–15 Dec) and what to do instead: Pig Island, Koh Tao.
  9. Speedboat vs big boat FAQ
- **Data blocks:** comparison table; two timelines; price box with currency switcher; closure banner; live sea-state chip.
- **FAQ (exact questions, 8):**
  1. Is the speedboat or big boat better for Ang Thong?
  2. Which Ang Thong tour is best for seasickness?
  3. How long is the Ang Thong tour by speedboat?
  4. Is the national park fee included?
  5. What is the Ang Thong VIP tour?
  6. Can young children do the Ang Thong tour?
  7. Can I book a private boat to Ang Thong?
  8. Is Ang Thong open in November?
- **Money links (internal, 2–4 product/booking pages):** `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/ang-thong-big-boat-tour-koh-samui/`, `/product/ang-thong-vip-tour-koh-samui/`, `/product/ang-thong-private-speedboat-koh-samui/` · **Supporting guide links:** `/ang-thong-marine-park/`, `/ang-thong-day-tour-vs-overnight/`, `/koh-samui-sea-conditions/` · **Sister-site link (max 1, only if genuinely useful):** angthongmarinepark.com
- **Images needed (descriptions):** our speedboat at Ang Thong (own); big boat deck with shade (own); VIP boat; Mae Ko Emerald Lake; kayaks below the Wua Talab cliffs.
- **Word target:** 2,000
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList (4 Product/TouristTrip refs)
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** DNP park page/notice (portal.dnp.go.th) **(P)**; Mea and crew for timings and inclusions

#### `/ang-thong-day-tour-vs-overnight/` · D11 · GUIDE
- **Primary keyword:** ang thong overnight · **Secondary:** ang thong camping, ang thong bungalow stay, ang thong overnight tour from koh samui, sleep in ang thong marine park, ang thong day trip or overnight
- **Title tag:** Ang Thong Day Tour or Overnight? Tent vs Bungalow 2026 · **Meta description:** One day or two in Ang Thong? Day tours from 1,500 THB vs overnight from 3,600 (tent) or 4,200 (bungalow): sunset and sunrise, what's included and who it suits.
- **H1:** Ang Thong Day Tour or Overnight: Which Should You Book?
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Book a day tour (speedboat 1,800 / big boat 1,500 THB) if you have one free day.
  - Stay overnight (tent 3,600 / bungalow 4,200 THB) to see the viewpoint and beaches after the day boats leave, with sunset and sunrise in the park; we take care of everything.
  - Overnight bookings: full refund 48 h or more before departure, none under 48 h.
- **Section outline (H2 → H3):**
  1. Verdict box.
  2. Comparison table: price; time in park; sunset/sunrise; meals [check]; sleeping; bathrooms (very clean); what to pack; refund rule.
  3. What the overnight includes: island and site (Koh Wua Talab park HQ [check]); boat; meals [check]; activities [check with Mea].
  4. Two-day timeline: day 1 arrival and afternoon; day 2 sunrise viewpoint and return [check times].
  5. Tent or bungalow? Comfort, fans/power [check], couples vs groups.
  6. Who the overnight suits: couples, photographers, families with older kids. Not for those who need air-conditioning or nightlife.
  7. Weather and the closure: dry season best; closed 1 Nov–15 Dec; operator weather cancellations → refund or new date.
  8. Day vs overnight FAQ
- **Data blocks:** comparison table; two-day timeline; packing checklist; closure banner.
- **FAQ (exact questions, 7):**
  1. Can you stay overnight in Ang Thong Marine Park?
  2. What is included in the Ang Thong overnight tour?
  3. Tent or bungalow: which should I choose?
  4. Is there electricity and a shower on the island?
  5. Is the overnight trip suitable for children?
  6. What is the cancellation policy for the overnight tour?
  7. When can I do the overnight tour?
- **Money links (internal, 2–4 product/booking pages):** `/product/ang-thong-overnight-camping-koh-samui/`, `/product/ang-thong-overnight-bungalow-koh-samui/`, `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/ang-thong-vip-tour-koh-samui/` · **Supporting guide links:** `/ang-thong-speedboat-vs-big-boat/`, `/ang-thong-marine-park/`, `/koh-samui-weather/` · **Sister-site link (max 1, only if genuinely useful):** angthongmarinepark.com
- **Images needed (descriptions):** tents at the park campsite (own); bungalow exterior (own); sunrise from the Wua Talab viewpoint; quiet beach in the late afternoon.
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** DNP accommodation and camping rules **(P)**; Mea for inclusions

#### `/chaweng-vs-lamai/` · D11 · GUIDE
- **Primary keyword:** chaweng or lamai · **Secondary:** chaweng vs lamai, chaweng or lamai for families, lamai vs chaweng nightlife, lamai beach vs chaweng beach, best area koh samui couples
- **Title tag:** Chaweng or Lamai? Where to Stay on Koh Samui (2026) · **Meta description:** Chaweng or Lamai? Beaches, nightlife, food, prices (2,000–4,500 vs 1,500–3,500 THB a night), airport times and traffic, with a verdict for every traveller.
- **H1:** Chaweng or Lamai: Which Is Better for Your Stay?
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Chaweng suits first-timers and nightlife: the most restaurants and bars, and 10–15 min to the airport (mid-range 2,000–4,500 THB).
  - Lamai is calmer and better value (1,500–3,500 THB), with a ~4 km beach and Hin Ta & Hin Yai, but 25–30 min from the airport.
  - Both are on the east coast, so both fly red flags Oct–Dec.
- **Section outline (H2 → H3):**
  1. Verdict box: pick Chaweng if… / pick Lamai if….
  2. Comparison table: beach; swimming; nightlife; food; markets; prices; airport time; traffic; families; couples.
  3. The beaches compared: Chaweng North/Central/Noi vs Lamai (the centre is best but drops steeply; the north end is stony).
  4. Nightlife and markets
     - Chaweng: Green Mango, ARKbar, Bar Solo, Chaweng Walking Street Thu–Sat.
     - Lamai: Lamai Night Market daily, Shamrock.
     - Muay Thai stadiums are in Chaweng. Text only, no venue links.
  5. Food and value: market dinner 300–500 THB pp; street food prices.
  6. Families vs couples.
  7. Getting around and traffic: songthaew Chaweng → Lamai 30–40 local / 50–60 fair.
  8. Chaweng vs Lamai FAQ
- **Data blocks:** comparison table; two-area map; price chips.
- **FAQ (exact questions, 7):**
  1. Is Chaweng or Lamai better for a first visit?
  2. Which is quieter, Chaweng or Lamai?
  3. Which beach is better for swimming?
  4. Is Lamai cheaper than Chaweng?
  5. How far is Lamai from Chaweng?
  6. Which is better for families?
  7. Is Lamai good for nightlife?
- **Money links (internal, 2–4 product/booking pages):** `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/pig-island-speedboat-tour/`, `/koh-samui-muay-thai/` (enquiry), `/koh-samui-villas/` · **Supporting guide links:** `/chaweng-koh-samui/`, `/lamai-koh-samui/`, `/where-to-stay-koh-samui/`, `/koh-samui-nightlife/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** Chaweng Central at dusk; Lamai beach from the south; Hin Ta & Hin Yai; Chaweng Walking Street; Lamai Night Market.
- **Word target:** 1,600
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** O9/O10/O14/O15; market field check

#### `/where-to-stay-koh-samui-with-kids/` · D11 · GUIDE
- **Primary keyword:** where to stay in koh samui with kids · **Secondary:** best beach koh samui for toddlers, family friendly area koh samui, choeng mon with kids, lipa noi family, koh samui family resort area
- **Title tag:** Where to Stay in Koh Samui with Kids: Calm Beaches 2026 · **Meta description:** The best Koh Samui areas for families: Choeng Mon's calm bay, Lipa Noi's shallows, Chaweng North's convenience, plus hospitals and tour pickups by area.
- **H1:** Where to Stay on Koh Samui with Kids: Calm Beaches by Age
- **Answer-first lead (what it must say in 2–3 sentences):**
  - For under-5s, choose Choeng Mon: the calmest bay, a low-tide sandbar to Koh Fan Noi and 5–10 min to the airport.
  - Lipa Noi's very shallow, calm water suits toddlers, but it's 40–50 min from the airport and our tour pickups cost +400 THB pp return there.
  - Chaweng North puts restaurants within walking distance. Avoid Bophut and Bang Rak for swimming.
- **Section outline (H2 → H3):**
  1. Verdict: best three areas.
  2. Comparison table: area | swimming for kids | walkable food | airport time | nearest private hospital [check minutes] | tour pickup (included / +400).
  3. By age
     - H3 Toddlers.
     - H3 Ages 5–11.
     - H3 Teens.
  4. Villa or resort with kids? Pool fencing [check]; steep roads; distance to shops.
  5. Season and sea safety: east-coast red flags Oct–Dec; tides on the north and west coasts; jellyfish vinegar stations.
  6. Healthcare near each area: Bangkok Hospital Samui (paediatrics).
  7. Where to stay with kids FAQ
- **Data blocks:** table; map of family-friendly beaches with hospital pins.
- **FAQ (exact questions, 6):**
  1. Which part of Koh Samui is best for families with young children?
  2. Which Koh Samui beach is safest for toddlers?
  3. Is Chaweng too busy for families?
  4. Is Lipa Noi good for kids?
  5. How close are hospitals to family areas?
  6. Are your tours suitable for children?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/`, `/product/ang-thong-big-boat-tour-koh-samui/`, `/koh-samui-villas/` · **Supporting guide links:** `/koh-samui-with-kids/`, `/where-to-stay-koh-samui/`, `/koh-samui-beach-safety/`, `/choeng-mon-koh-samui/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** child paddling at Choeng Mon (no identifiable faces, or with consent); Lipa Noi shallows; family villa pool with a fence.
- **Word target:** 1,600
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** O14/O15; hospital locations (O5); Mea's local tips

#### `/koh-samui-honeymoon/` · D4 · GUIDE
- **Primary keyword:** koh samui honeymoon · **Secondary:** koh samui for couples, romantic things to do koh samui, best honeymoon area koh samui, private boat trip koh samui couple, koh samui sunset dinner
- **Title tag:** Koh Samui Honeymoon 2026: Where to Stay & What to Book · **Meta description:** Plan a Koh Samui honeymoon: the calmest months, the best areas for sunsets and privacy, private boats from 19,000 THB, sunset cruises, spas and a 3-day plan.
- **H1:** Koh Samui Honeymoon: Where to Stay, What to Do and When to Go
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Go in Feb–Apr for the calmest seas. Stay in Choeng Mon or Chaweng Noi for quiet bays, or on the west coast for sunsets (Taling Ngam faces the Five Islands).
  - Book one private day on the water: a private speedboat from 19,000 THB, an Ang Thong private speedboat at 33,000 THB, or a boutique yachting day at 4,500 THB pp.
- **Section outline (H2 → H3):**
  1. The best time for a honeymoon: Feb–Apr; avoid November if the beach is the priority.
  2. Where to stay
     - Table: area | feel | sunset or sunrise | privacy.
     - Name resorts as context only.
  3. Private boats and sunset cruises
     - Charter fleet "from" prices (O12): PP 30 ft 19,000; Victoria sailing cat 20,000; Casablanca 50,000.
     - Enquiry → quote → pay.
  4. A three-day romantic plan.
  5. Sunset spots and dinners: Baan Suan Lung Khai (Bib 2026; reservation needed); west-coast sunset bars named as text only.
  6. Spas and wellness: Thai massage 300–600 THB; luxury retreats (Kamalaya, Absolute Sanctuary) as context; enquiry.
  7. The White Lotus coast by private boat: the west coast near Laem Yai; factual, with no implied access to private resorts.
  8. Honeymoon budget: three tiers.
  9. Honeymoon FAQ
- **Data blocks:** area table; charter "from" price cards; three-day timeline; sunset-time widget.
- **FAQ (exact questions, 7):**
  1. Is Koh Samui good for a honeymoon?
  2. What is the best month for a Koh Samui honeymoon?
  3. Where should honeymooners stay on Koh Samui?
  4. How much is a private boat for two on Koh Samui?
  5. Where is the best sunset on Koh Samui?
  6. Can we see the White Lotus hotel by boat?
  7. Is Koh Samui better than Phuket for a honeymoon?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-private-speedboat/`, `/koh-samui-catamaran-charter/`, `/koh-samui-sunset-cruise/`, `/product/ang-thong-vip-tour-koh-samui/` · **Supporting guide links:** `/koh-samui-sunset-spots/`, `/koh-samui-spa/`, `/where-to-stay-koh-samui/`, `/koh-samui-restaurants/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** couple on a catamaran bow at sunset (licensed or own); Taling Ngam sunset over the Five Islands; private speedboat at Koh Tan; villa terrace at dusk.
- **Word target:** 2,000
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Michelin Guide Thailand 2026 (verify only); O12 fleet data; O15

#### `/koh-samui-with-kids/` · D4 · GUIDE
- **Primary keyword:** koh samui with kids · **Secondary:** koh samui family holiday, things to do in koh samui with kids, koh samui for families, koh samui with a toddler, family boat trip koh samui
- **Title tag:** Koh Samui with Kids 2026: Family Guide, Trips & Safety · **Meta description:** Koh Samui with kids: calm beaches, family boat days (child rates 3–11, under-3s free), ethical elephant visits, health and safety tips and what to skip.
- **H1:** Koh Samui with Kids: Family Guide to Beaches, Trips and Safety
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Samui is the easiest Gulf island for families: direct flights, private hospitals including paediatrics, and calm seas from January to September.
  - Children 3–11 pay child rates, under-3s are free, and life jackets are always provided.
  - The best first boat day is Pig Island: 4–5 h and bookable on any date.
- **Section outline (H2 → H3):**
  1. When to go with kids: Feb–Apr best; Jul–Aug school holidays (busy, good seas); Oct–Dec red flags.
  2. Where to stay: summary, linking to the kids page.
  3. Family boat trips: Pig Island (4–5 h); Ang Thong big boat (steps at the viewpoints); Koh Tao long day (8–9 h, older kids).
  4. On-island activities
     - Samui Elephant Sanctuary (no riding or bathing; ~3,000 / child 1,500).
     - Big Buddha; Na Muang 1 pool; cooking class; Fisherman's Village Friday.
  5. Attractions to skip or check first: Aquarium & Tiger Zoo, Butterfly Garden, Coco Splash, Snake Farm and Namuang Safari Park are likely closed or unverified. No elephant riding; skip the chained-elephant feeding at Overlap Stone.
  6. Health and safety: heat and sun; jellyfish and vinegar; dengue (official source); tides; red flags; Bangkok Hospital Samui paediatrics.
  7. Getting around with kids: car seats [check availability]; no scooters with children; minibus or private driver.
  8. Food for kids: mild dishes; markets; water.
  9. Family FAQ
- **Data blocks:** activity table (age | duration | price | booking); "skip list" box; family map.
- **FAQ (exact questions, 8):**
  1. Is Koh Samui good for families with young children?
  2. What is the best boat trip on Koh Samui for kids?
  3. Do children pay full price on your tours?
  4. Are life jackets provided for children?
  5. Is there an ethical elephant sanctuary on Koh Samui?
  6. Which attractions on Koh Samui are closed?
  7. Is there a children's hospital on Koh Samui?
  8. Is November OK for a family trip?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/`, `/product/ang-thong-big-boat-tour-koh-samui/`, `/koh-samui-elephant-sanctuary/` (enquiry), `/koh-samui-cooking-class/` (enquiry) · **Supporting guide links:** `/where-to-stay-koh-samui-with-kids/`, `/koh-samui-beach-safety/`, `/koh-samui-hospital/` · **Sister-site link (max 1, only if genuinely useful):** pigislandkohsamui.com
- **Images needed (descriptions):** child in a life jacket on our boat (consent); Pig Island pigs on the sand; elephants foraging at a no-riding sanctuary (partner permission); Na Muang 1 pool.
- **Word target:** 2,200
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** CDC or TravelHealthPro Thailand page **(P)**; welfare-organisation sanctuary listings (verify only); phone checks on the closed attractions

#### `/koh-samui-in-november/` · D11 · GUIDE
- **Primary keyword:** koh samui november · **Secondary:** koh samui weather november, is november a good time to visit koh samui, koh samui rainy season november, ang thong november, koh samui november 2026 events
- **Title tag:** Koh Samui in November 2026: Rain, Sea, Events & Verdict · **Meta description:** Is November good for Koh Samui? The wettest month (~445 mm) with Ang Thong closed, but prices dip, Pig Island runs and 24 Nov brings Full Moon and Loy Krathong.
- **H1:** Is November a Good Time to Visit Koh Samui?
- **Answer-first lead (what it must say in 2–3 sentences):**
  - November is Samui's wettest month (~445 mm, ~16 rain days, 30/24 °C, sea 29 °C), and Ang Thong is closed 1 Nov–15 Dec, so it's a poor choice for a boat-first holiday.
  - It's green and good value, and Pig Island tours run on any date (weather permitting).
  - On 24 Nov 2026 the Full Moon Party and Loy Krathong fall on the same night.
- **Section outline (H2 → H3):**
  1. Verdict box: good for / not for.
  2. November in numbers: table vs February and July (high/low, rain, rain days, sea, boat conditions).
  3. What November rain looks like: pattern of downpours vs all-day rain [check against TMD hourly data; don't guess]; east-coast swell; red flags.
  4. What's open and what's closed: Ang Thong closed; Pig Island, Koh Tao (sea permitting) and FMP boats run; outdoor markets are often rained off.
  5. Events in November 2026
     - Half Moon (beach club) 3 and 17 Nov; Waterfall Party 11, 22 and 26 Nov; Jungle Experience 23 Nov.
     - FMP 24 Nov; Loy Krathong 24 Nov: sky lanterns banned, eco krathong only.
  6. Where to stay in November: north and west for calmer swimming [check with Mea]; villas with covered terraces.
  7. November vs December vs January: table; Ang Thong reopens 16 Dec.
  8. What to pack.
  9. November FAQ
- **Data blocks:** live forecast widget; Nov/Feb/Jul table; event list auto-filtered for November; closure banner; FMP promo block (date-gated).
- **FAQ (exact questions, 8):**
  1. Is November a good time to visit Koh Samui?
  2. How much does it rain on Koh Samui in November?
  3. Is Ang Thong Marine Park open in November?
  4. What boat trips run in November?
  5. When is Loy Krathong on Koh Samui in 2026?
  6. Can I go to the Full Moon Party from Samui in November?
  7. Is the sea rough in November?
  8. Is December better than November?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/`, `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/`, `/product/full-moon-party-speedboat-koh-samui/`, `/product/ang-thong-marine-park-day-tour-koh-samui/` (from 16 Dec) · **Supporting guide links:** `/koh-samui-weather/`, `/koh-samui-sea-conditions/`, `/full-moon-party-dates/`, Loy Krathong page · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** rainclouds over Chaweng; eco krathong at Chaweng Lake; Pig Island on a bright November morning; red flag on Lamai.
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage, Event refs (FMP, Loy Krathong) via ItemList
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** TMD **(P)**; DNP closure notice **(P)**; TAT Loy Krathong announcement; halfmoonfestival dates (verify only)

#### `/koh-samui-budget/` · D4 · GUIDE
- **Primary keyword:** is koh samui expensive · **Secondary:** koh samui budget per day, koh samui prices 2026, cost of food koh samui, koh samui on a budget, cheap things to do koh samui
- **Title tag:** Is Koh Samui Expensive? 2026 Budget Guide & Real Prices · **Meta description:** What Koh Samui really costs in 2026: daily budgets, rooms by area, street food from 50 THB, massages, scooters, taxis, boat trips and the hidden costs.
- **H1:** Is Koh Samui Expensive? A 2026 Budget Guide with Real Prices
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Samui costs more than Phangan, Tao or the mainland, mainly because of flights and resorts.
  - A careful traveller can manage roughly 1,500–2,500 THB a day, mid-range 4,000–7,000, luxury 15,000+ (our estimates from 2026 prices).
  - Street dishes cost 50–120 THB, a Thai massage 300–500, a scooter 150–350 a day, and Ang Thong 1,800 + 300 THB park fee.
- **Section outline (H2 → H3):**
  1. Daily budget at a glance: table (item | budget | mid-range | luxury), labelled "estimate, 2026".
  2. The 2026 price list
     - ~25-row table.
     - Rooms by area (O15); pad thai 60–80; mango sticky rice 50–80; grilled prawns 80–120; market dinner 300–500.
     - Cocktail ~99 (Fisherman's Village) [S]; massage 300–500 (Chaweng 400–600).
     - Scooter; taxi; Grab; songthaew; SIM; ATM fee; Muay Thai 1,500–2,500; island fees.
  3. Getting there: flight 2,800–6,800 vs budget routes.
  4. Accommodation by area and season: peak +30–80%.
  5. Food and drink: markets vs restaurants; service charge and VAT "++" [check 10% + 7%].
  6. Transport.
  7. Tours and activities: our prices vs typical market ranges (O11). No competitor names.
  8. Money-saving tips: AEON ATMs (150 THB fee); decline DCC; songthaews by day; shoulder months; Pig Island as the lowest-cost boat day; free sights (Big Buddha, Wat Plai Laem, Hin Ta & Hin Yai).
  9. Hidden costs: park and island fees in cash; +400 THB remote pickup; ATM fees; ++ pricing; peak surcharges; Fisherman's Village towing (500+).
  10. Budget FAQ
- **Data blocks:** daily budget table; price list table (sortable); daily-budget calculator (nights × area rate + days × food tier + activities from the product list), in THB with display conversions.
- **FAQ (exact questions, 8):**
  1. Is Koh Samui expensive compared with Phuket?
  2. How much money do I need per day on Koh Samui?
  3. How much does food cost on Koh Samui?
  4. What is the cheapest boat trip from Koh Samui?
  5. Are there free things to do on Koh Samui?
  6. Do restaurants add service charge?
  7. Should I pay by card or cash on Koh Samui?
  8. When is Koh Samui cheapest?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/`, `/product/ang-thong-big-boat-tour-koh-samui/`, `/product/full-moon-party-speedboat-koh-samui/`, `/product/ang-thong-marine-park-day-tour-koh-samui/` · **Supporting guide links:** `/koh-samui-banks-money/`, `/koh-samui-markets/`, `/where-to-stay-koh-samui/`, `/getting-around-koh-samui/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** street-food stall at Fisherman's Village; Lamai Night Market; songthaew; Big Buddha (free sight).
- **Word target:** 2,200
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** O6/O11/O15/O16 data; field price checks in Fisherman's Village and Lamai (date-stamped)

---

**GROUP 2: HEALTH AND SAFETY**

#### `/koh-samui-hospital/` · D4 · GUIDE
- **Primary keyword:** koh samui hospital · **Secondary:** bangkok hospital samui, hospitals in koh samui, samui international hospital, koh samui clinic, emergency number koh samui
- **Title tag:** Koh Samui Hospitals & Clinics 2026: Emergency Guide · **Meta description:** Koh Samui hospitals compared: Bangkok Hospital Samui, Samui International, Thai International, Bandon and the government hospital, plus emergency numbers.
- **H1:** Koh Samui Hospitals and Clinics: Medical Guide for Visitors
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Samui has several private hospitals: Bangkok Hospital Samui (Chaweng; trauma and paediatrics; +66 77 429 500, hotline 1719), Samui International, Thai International, Bandon International and Wattanapat. The government Koh Samui Hospital is near Nathon.
  - Call 1669 for an ambulance and 1155 for the Tourist Police.
  - Private hospitals usually ask for an insurer's guarantee or a deposit [check].
- **Section outline (H2 → H3), 18 H2s, at least the twin's 17:**
  1. Medical care at a glance: table (situation | where to go). Rows: life-threatening; scooter crash or fracture; minor illness; jellyfish sting; dive injury; dental pain; prescription refill.
  2. Map: hospitals, clinics, dentists, pharmacies and the hyperbaric chamber
     - Filterable directory, ≥20 facilities, from a field check.
     - Each entry: area, 24 h yes/no, phone from the facility's own site [check], Get directions.
  3. Private hospitals
     - H3 Bangkok Hospital Samui: 57 Moo 3 Thaweerat Phakdee Rd; trauma; paediatrics. Drop the BDMS label unless verified.
     - H3 Samui International Hospital: north Chaweng Beach Road; 24 h ER; phone [check].
     - H3 Thai International Hospital: opposite Lotus's, Chaweng; 24 h A&E; phone [check].
     - H3 Bandon International Hospital: Bophut ring road near Big C; phone [check].
     - H3 Wattanapat Hospital Samui: Bophut [S, check].
  4. Koh Samui Hospital (government)
     - H3 What it offers: 61 Moo 1, Tambon Ang Thong (near Nathon); phone [check].
     - H3 What to expect as a foreign patient: queues, cost, language [check].
  5. Clinics for minor illness and injury: how to choose; opening hours; when to escalate.
  6. Emergency numbers: table (service | number): 1669, 191, 1155, 199, TAT 1672, local Tourist Police +66 77 430 018 [S].
  7. Ambulances and getting to hospital: 1669 vs a hospital's own ambulance; typical drive times from each area [check].
  8. Costs, deposits and paying: guarantees; card deposits; itemised bills; price lists on request [check; no invented prices].
  9. Travel insurance: why it matters; link to the insurance page.
  10. Scooter accidents: the biggest risk; licence and insurance; what to do at the scene.
  11. Jellyfish stings: first aid. Box jellyfish caused 9 of Thailand's 10 recorded deaths since 2002 in waters off Samui and Phangan. Pour vinegar for 30 s or more; don't rub; no fresh water; call 1669.
  12. Dengue and mosquitoes: endemic, with peaks in the rainy season. Cite CDC/TravelHealthPro **(P)**.
  13. Pharmacies and medicines: summary, linking to the pharmacies page.
  14. Diving, decompression and the hyperbaric chamber: SSS Network, 34/8 Moo 4 Bophut; office +66 77 427 427; 24 h +66 81 081 9555 [S, check].
  15. Patients from Koh Phangan and Koh Tao: transfers to Samui hospitals [check process].
  16. Children, pregnancy and long-term conditions.
  17. Medical evacuation to Bangkok or home: air ambulance via insurer [check].
  18. Koh Samui hospital FAQ
- **Data blocks:** situation table; filterable map directory (JSON in `samui-poi.json`, type = hospital/clinic/dentist/pharmacy/chamber); emergency number table (tap-to-call); "Last verified" stamp per facility.
- **FAQ (exact questions, 10):**
  1. What is the best hospital on Koh Samui?
  2. Is there a 24-hour hospital on Koh Samui?
  3. What number do I call for an ambulance in Thailand?
  4. Should I go to a government or private hospital on Koh Samui?
  5. Do hospitals on Koh Samui accept travel insurance?
  6. How much does a hospital visit cost on Koh Samui?
  7. What should I do if I'm stung by a jellyfish?
  8. Is there a decompression chamber on Koh Samui?
  9. Do doctors on Koh Samui speak English?
  10. Where do patients from Koh Phangan go for serious treatment?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/`, `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/` (in the "Add a boat trip" rail only) · **Supporting guide links:** `/koh-samui-pharmacies/`, `/koh-samui-dentist/`, `/koh-samui-travel-insurance/`, `/koh-samui-beach-safety/` · **Sister-site link (max 1, only if genuinely useful):** kohphangan.com/koh-phangan-hospital/
- **Images needed (descriptions):** Bangkok Hospital Samui exterior (own photo, no patients); ambulance (licensed stock); vinegar station sign at a beach; hyperbaric chamber exterior [permission].
- **Word target:** 4,000
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of Hospital/MedicalClinic (geo, telephone only when verified)
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):**
  - Each hospital's own site (verify only); thailand.go.th emergency numbers **(P)**.
  - Department of Disease Control (ddc.moph.go.th) **(P)**; CDC / TravelHealthPro **(P)**; GOV.UK Thailand health section.

#### `/koh-samui-pharmacies/` · D4 · GUIDE
- **Primary keyword:** pharmacy koh samui · **Secondary:** 24 hour pharmacy koh samui, buy medicine thailand without prescription, bringing medication into thailand, pharmacy chaweng, seasickness tablets koh samui
- **Title tag:** Pharmacies on Koh Samui 2026: 24-Hour Options & Rules · **Meta description:** Pharmacies on Koh Samui: what Thai pharmacists can sell, late-night options, the rules on bringing your own medication and a first-aid kit for boat trips.
- **H1:** Pharmacies on Koh Samui: What You Can Buy and What to Bring
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Pharmacies are easy to find in Chaweng, Lamai, Bophut and Nathon, and hospital pharmacies are the safest late-night option [check 24 h].
  - Thai pharmacists can sell many medicines that need a prescription elsewhere [check scope]. Controlled medicines, including some painkillers and ADHD drugs [check], need a Thai FDA permit to bring in.
- **Section outline (H2 → H3):**
  1. How Thai pharmacies work: licensed pharmacist on duty [check]; OTC scope; generic names; ask for the leaflet.
  2. Where to find a pharmacy: by area; mall chains [check names]; hospital pharmacies.
  3. Late-night and 24-hour options [check each].
  4. Bringing your own medication: Thai FDA rules; quantity limits [check 30-day rule]; doctor's letter; narcotic/psychotropic permits.
  5. Holiday essentials: seasickness tablets (take before the boat); oral rehydration salts; DEET; reef-safe sunscreen [check any local ban]; vinegar for jellyfish; plasters for coral cuts.
  6. Antibiotics and prescription medicines: why to see a doctor first; counterfeit risk [check].
  7. Cannabis and CBD products: prescription only; don't take them out of Thailand.
  8. Pharmacy FAQ
- **Data blocks:** pharmacy layer on the health map (field-verified); boat-trip kit checklist.
- **FAQ (exact questions, 7):**
  1. Is there a 24-hour pharmacy on Koh Samui?
  2. Can I buy antibiotics without a prescription in Thailand?
  3. Can I bring my prescription medicine to Thailand?
  4. Where can I buy seasickness tablets on Koh Samui?
  5. Do pharmacists on Koh Samui speak English?
  6. Can I buy CBD on Koh Samui?
  7. What should I bring for a boat trip?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/`, `/product/ang-thong-big-boat-tour-koh-samui/` · **Supporting guide links:** `/koh-samui-hospital/`, `/koh-samui-drugs-alcohol-law/`, `/koh-samui-sea-conditions/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** pharmacy shopfront in Chaweng (no brand focus); seasickness tablets and a water bottle on a boat bench; first-aid kit flat lay.
- **Word target:** 1,500
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Thai FDA (fda.moph.go.th) **(P)** for importing medicines; Pharmacy Council of Thailand **(P if needed)**; GOV.UK

#### `/koh-samui-dentist/` · D4 · GUIDE
- **Primary keyword:** dentist koh samui · **Secondary:** dental clinic koh samui, emergency dentist koh samui, dental implants koh samui, teeth cleaning koh samui price, dental treatment thailand holiday
- **Title tag:** Dentists on Koh Samui 2026: Emergency Care & Prices · **Meta description:** Toothache or planned dental work on Koh Samui? How to find a licensed dentist, emergency options, typical treatments, timing around flights and diving.
- **H1:** Dentists on Koh Samui: Emergency Care, Clinics and Treatment Planning
- **Answer-first lead (what it must say in 2–3 sentences):**
  - For dental pain, Samui's private hospitals run dental departments [check per hospital], and private clinics in Chaweng, Bophut and Lamai take walk-ins [check].
  - For planned work, check the dentist's licence with the Thai Dental Council [check portal].
  - Multi-visit treatment such as implants rarely fits a 30-day visa-exempt stay without an extension.
- **Section outline (H2 → H3):**
  1. Emergency toothache: where to go, by time of day.
  2. Choosing a clinic: licence check; English; written quote; sterilisation; photos of the work.
  3. Treatments and price ranges: table [check: collect published price lists from 4+ clinics; publish ranges only].
  4. Planning dental work around your trip: visits needed vs the 30 + 30 day stay; extension link.
  5. Flying, diving and boat trips after dental work [check clinical guidance].
  6. Insurance and receipts.
  7. Dentist FAQ
- **Data blocks:** dentist layer on the health map; price-range table (sourced, dated).
- **FAQ (exact questions, 6):**
  1. Is there an emergency dentist on Koh Samui?
  2. How much is a dental check-up on Koh Samui?
  3. How do I check a Thai dentist is licensed?
  4. Can I get implants done during a 30-day stay?
  5. Can I fly or dive after a tooth extraction?
  6. Does travel insurance cover dental treatment?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-villas/` (long-term tab), `/product/pig-island-speedboat-tour/` · **Supporting guide links:** `/koh-samui-hospital/`, `/koh-samui-visa-extension/`, `/koh-samui-travel-insurance/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** modern dental chair (licensed stock); clinic reception (no brand); Samui street with clinic signage (no logos).
- **Word target:** 1,500
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Thai Dental Council (dentalcouncil.or.th) **(P)**; clinic price lists (verify only)

#### `/koh-samui-tourist-police/` · D4 · GUIDE
- **Primary keyword:** koh samui tourist police · **Secondary:** tourist police 1155, report theft koh samui, police report for insurance thailand, lost passport koh samui, tourist police samui phone number
- **Title tag:** Koh Samui Tourist Police 2026: 1155, Office & Reports · **Meta description:** How the Koh Samui Tourist Police help: call 1155, the local office, police reports for insurance, lost passports and jet-ski, scooter or taxi disputes.
- **H1:** Koh Samui Tourist Police: How to Get Help, Reports and Office Details
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Call 1155, the national Tourist Police line (English-speaking [check 24 h]), for theft, scams, disputes or emergencies. The local Samui office is on +66 77 430 018 [S, check].
  - They can file a police report for insurance and help mediate jet-ski, rental and taxi disputes. For crimes in progress, call 191.
- **Section outline (H2 → H3):**
  1. What the Tourist Police do, and don't do.
  2. How to contact them: table (need | number): 1155, local office, 191, 1669.
  3. Office location and hours: map, address [check], hours [check].
  4. Getting a police report for insurance: what to bring; translation; copies.
  5. Lost or stolen passport, step by step: report → your embassy in Bangkok (emergency travel document) → immigration (entry-stamp transfer [check]).
  6. Disputes: jet skis, scooters, taxis: evidence first; don't hand over your passport; link to the scams page.
  7. Tourist Police FAQ
- **Data blocks:** contact table (tap-to-call); map pin; lost-passport timeline.
- **FAQ (exact questions, 7):**
  1. What is the Tourist Police number in Thailand?
  2. Where is the Tourist Police office on Koh Samui?
  3. How do I get a police report for my insurance?
  4. What should I do if my passport is stolen on Koh Samui?
  5. Can the Tourist Police help with a jet-ski damage dispute?
  6. Do the Tourist Police speak English?
  7. Is 1155 free to call?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/` (rail only), `/product/full-moon-party-speedboat-koh-samui/` (licensed transport) · **Supporting guide links:** `/koh-samui-police-station/`, `/koh-samui-scams/`, `/precautions-safety/`, `/koh-samui-travel-insurance/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** Tourist Police office sign (own photo); patrol vehicle (no faces); passport and a police report form (mock-up).
- **Word target:** 1,500
- **Schema:** Article, BreadcrumbList, FAQPage, PoliceStation (geo [check])
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Tourist Police Bureau official site **(P)** [check URL]; thailand.go.th emergency numbers **(P)**; GOV.UK lost-passport guidance **(P)**

#### `/koh-samui-police-station/` · D4 · GUIDE
- **Primary keyword:** koh samui police station · **Secondary:** bophut police station, nathon police station, chaweng police, koh samui police phone number, report a crime koh samui
- **Title tag:** Koh Samui Police Stations 2026: Locations & Numbers · **Meta description:** Every police station and police box on Koh Samui with area, phone and map, when to go to the police vs the Tourist Police, and what to bring to a report.
- **H1:** Police Stations on Koh Samui: Locations, Numbers and When to Go
- **Answer-first lead (what it must say in 2–3 sentences):**
  - For emergencies, call 191 (police) or 1155 (Tourist Police, English).
  - Koh Samui Police Station is on +66 77 421 097 [S; location check]. Bophut and other stations/boxes cover Chaweng, Lamai and Maenam [check each].
  - Bring your passport (or a copy), evidence and, ideally, a Thai speaker.
- **Section outline (H2 → H3):**
  1. Directory: table (station | area covered | address | phone | hours | map). Every row [check] by a field visit or official listing.
  2. Police or Tourist Police: which to call when.
  3. Filing a report: what to bring; language help; copies for insurance.
  4. Checkpoints and fines: helmet up to 2,000 THB; licence; paying fines officially and getting a receipt [check procedure].
  5. Arrest or detention: contact your embassy; your rights [check GOV.UK wording].
  6. Police stations FAQ
- **Data blocks:** directory table; map layer "police"; tap-to-call numbers.
- **FAQ (exact questions, 6):**
  1. Where is the main police station on Koh Samui?
  2. What is the police emergency number in Thailand?
  3. Should I report a theft to the police or the Tourist Police?
  4. How do I pay a traffic fine on Koh Samui?
  5. What should I do if I'm arrested in Thailand?
  6. Is there a police station in Chaweng?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/`, `/product/ang-thong-big-boat-tour-koh-samui/` (rail only) · **Supporting guide links:** `/koh-samui-tourist-police/`, `/koh-samui-roads/`, `/precautions-safety/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** Koh Samui Police Station frontage (own); police box in Chaweng; checkpoint cones on the ring road.
- **Word target:** 1,500
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of PoliceStation (geo)
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Royal Thai Police / Surat Thani Provincial Police **(P)** [check URLs]; GOV.UK "arrested abroad" page **(P)**

#### `/koh-samui-drugs-alcohol-law/` · D4 · GUIDE
- **Primary keyword:** thailand drug laws for tourists · **Secondary:** cannabis koh samui 2026, vape ban thailand, alcohol sale hours thailand 2026, buddhist holiday alcohol ban 2027, drinking age thailand
- **Title tag:** Drugs, Vapes & Alcohol Law on Koh Samui: 2026 Rules · **Meta description:** Rules visitors break by mistake: cannabis only on prescription, vapes illegal, alcohol sold 11:00–24:00, holy-day bans with bar exemptions, drinking age 20.
- **H1:** Drugs, Vapes and Alcohol: The Law on Koh Samui in 2026
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Cannabis has needed a prescription to buy since 25 June 2025, and smoking it in public can bring fines up to 25,000 THB.
  - Vapes and e-cigarettes are illegal to bring in, own or use.
  - Alcohol has been on sale 11:00–24:00 since 29 May 2026 (licensed venues and hotels are exempt from the hours). The drinking age is 20.
- **Section outline (H2 → H3):**
  1. Cannabis in 2026: prescription; public use banned; age 20; extracts above 0.2% THC are narcotics; rules keep changing. Copy: "illegal to buy without a prescription; never smoke in public".
  2. Vapes and e-cigarettes: illegal; confiscation, fines, detention; reported on-the-spot demands. Don't state "10 years prison" (unsourced).
  3. Other drugs: severe penalties [check GOV.UK wording]; drink spiking and party safety around the Full Moon (FCDO).
  4. Alcohol: hours, places and age: 11:00–24:00; exemptions; no sales at temples, petrol stations, public parks or on public transport.
  5. Buddhist holy-day bans 2027
     - Table: date | day | status.
     - Makha Bucha Sun 21 Feb; Visakha Bucha Thu 20 May [S]; Asahna Bucha / Khao Phansa 18–19 Jul [check]; Ok Phansa ~15 Oct [check].
     - Hotels and licensed bars may still sell; 7-Eleven can't. No ban days in Nov–Dec 2026.
  6. Election-day bans: 18:00–18:00 when called; monitor.
  7. Drink-driving: limit [check]; checkpoints.
  8. Smoking rules on beaches [check national beach smoking ban scope].
  9. Drugs and alcohol FAQ
- **Data blocks:** holy-day table feeding the sitewide alcohol-ban banner; "quick rules" card (6 lines).
- **FAQ (exact questions, 8):**
  1. Is cannabis legal on Koh Samui in 2026?
  2. Can I bring a vape to Thailand?
  3. What time can you buy alcohol in Thailand?
  4. Are bars open on Buddhist holidays?
  5. What is the legal drinking age in Thailand?
  6. Can I smoke on the beach in Koh Samui?
  7. What happens if I'm caught with drugs in Thailand?
  8. Are there alcohol bans in December 2026?
- **Money links (internal, 2–4 product/booking pages):** `/product/full-moon-party-speedboat-koh-samui/` (safe licensed return), `/product/full-moon-party-private-speedboat-koh-samui/` · **Supporting guide links:** `/koh-samui-nightlife/`, `/full-moon-party-from-koh-samui/`, `/precautions-safety/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** "no vaping" sign (generic); 7-Eleven fridges with an alcohol-hours notice [check exists]; beach bar at sunset (no brands).
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** TAT alcohol update (29 May 2026); GOV.UK laws and cultural differences **(P)**; Ministry of Public Health cannabis notices **(P)**; Royal Gazette **(P)**

#### `/koh-samui-scams/` · D4 · GUIDE
- **Primary keyword:** koh samui scams · **Secondary:** jet ski scam koh samui, koh samui taxi scam, scooter damage scam thailand, fake tdac website, koh samui tourist traps
- **Title tag:** Koh Samui Scams & Jet Ski Safety: How to Avoid Them 2026 · **Meta description:** Scams that still catch visitors on Koh Samui: jet-ski and scooter damage claims, taxi overcharging, fake TDAC sites, card DCC and ticket touts, and fixes.
- **H1:** Koh Samui Scams and Jet Ski Safety: How to Avoid Trouble
- **Answer-first lead (what it must say in 2–3 sentences):**
  - The classic Samui scam is a damage claim after a jet-ski or scooter rental. Film the vehicle before you ride and never leave your passport as a deposit.
  - Other traps: unmetered taxis (agree the fare first), paid look-alike TDAC sites (the official one is free) and card terminals offering DCC (always pay in THB).
- **Section outline (H2 → H3):**
  1. Jet-ski damage claims: how it works; how to avoid it (video, contract, guided safari); what to do (Tourist Police 1155). Link `/koh-samui-jet-ski/`.
  2. Scooter damage and passport deposits: FCDO advice; cash deposit instead.
  3. Taxi overcharging: no meters; agree the fare; airport kiosk; Grab where available.
  4. Fake TDAC and visa websites: tdac.immigration.go.th is free.
  5. Card skimming and DCC: decline conversion; use bank ATMs inside banks or malls.
  6. Ticket touts and fake tours
     - Muay Thai seats; Full Moon "entry tickets" (we sell boats only; entry ≈200 THB paid at the party).
     - Closed attractions sold as open; elephant riding.
  7. Booking safely: TAT-licensed agencies; secure card payment in THB; written cancellation policy.
  8. Where to complain: 1155; Office of the Consumer Protection Board hotline [check number].
  9. Scams FAQ
- **Data blocks:** scam cards (scam | how it works | how to avoid); pre-rental checklist; contact box.
- **FAQ (exact questions, 8):**
  1. What are the most common scams on Koh Samui?
  2. How do I avoid the jet-ski scam?
  3. Should I leave my passport when renting a scooter?
  4. Do taxis overcharge on Koh Samui?
  5. Is the TDAC free?
  6. Should I pay in my home currency or THB?
  7. How can I check a tour company is licensed?
  8. Who do I call if I've been scammed?
- **Money links (internal, 2–4 product/booking pages):** `/product/jet-ski-safari-pig-island/` [slug TBC] (guided, 9,950 THB per jet ski), `/product/pig-island-speedboat-tour/`, `/product/full-moon-party-speedboat-koh-samui/` · **Supporting guide links:** `/koh-samui-jet-ski/`, `/koh-samui-tourist-police/`, `/koh-samui-banks-money/`, `/thailand-visa-guide/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** jet skis lined up on Chaweng (no faces or brands); phone filming scooter damage; card terminal showing a THB/home-currency choice.
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** GOV.UK safety and security **(P)**; tdac.immigration.go.th **(P)**; TAT licence search (tourism.go.th) **(P)** [check URL]; OCPB (ocpb.go.th) **(P)**

#### `/koh-samui-beach-safety/` · D4 · GUIDE
- **Primary keyword:** koh samui beach safety · **Secondary:** koh samui red flag, rip current chaweng, box jellyfish koh samui, lamai beach dangerous, koh samui swimming safety
- **Title tag:** Koh Samui Beach Safety 2026: Flags, Rips & Jellyfish · **Meta description:** Swim safely on Koh Samui: red flags and rips on Chaweng and Lamai in Oct–Dec, box jellyfish first aid with vinegar, tidal north and west beaches and rocks.
- **H1:** Beach and Swimming Safety on Koh Samui
- **Answer-first lead (what it must say in 2–3 sentences):**
  - From October to December, the north-east monsoon brings big surf, rip currents and red flags to Chaweng and Lamai. Don't swim when the red flag is up.
  - For a box-jellyfish sting, pour vinegar for at least 30 seconds, don't rub it, don't use fresh water, and call 1669.
  - North and west beaches are tidal, so swim at high tide.
- **Section outline (H2 → H3):**
  1. Beach flags and when they fly: Oct–Dec east coast; winter surges (e.g. 19 Feb 2026: 1–2 m+ waves, swimming banned).
  2. Rip currents: how to spot and escape one.
  3. Box jellyfish and other stingers: 9 of Thailand's 10 recorded deaths since 2002 were in waters off Samui and Phangan; vinegar posts at hotels; higher risk in calm seas and after rain; FCDO season May–Oct nationally.
  4. Tides, rocks and coral
     - Tidal north/west coasts; water shoes at Coral Cove; urchins.
     - Lad Koh rocks: a tourist was swept away in Nov 2024.
  5. Beach-by-beach safety: table (beach | coast | swimming | main hazard | best months), from O14.
  6. Boats, jet skis and swimmers: stay inside swim zones [check marked zones].
  7. Sun, heat and hydration.
  8. Children at the beach.
  9. Beach safety FAQ
- **Data blocks:** beach safety table; live sea-state chip and tide widget; first-aid card (printable); map colouring beaches by current risk (seasonal).
- **FAQ (exact questions, 8):**
  1. Is it safe to swim at Chaweng Beach?
  2. When do red flags fly on Koh Samui?
  3. Are there box jellyfish on Koh Samui?
  4. What should I do if I'm stung by a jellyfish?
  5. Which Koh Samui beaches are safest for swimming?
  6. Are there lifeguards on Koh Samui beaches?
  7. Why is the water so shallow at some beaches?
  8. Is it safe to climb on the rocks at Lad Koh?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/`, `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/koh-samui-snorkeling/` · **Supporting guide links:** `/koh-samui-beaches/`, `/koh-samui-tides/`, `/koh-samui-sea-conditions/`, `/koh-samui-hospital/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** red flag on Chaweng in surf; vinegar station post; Coral Cove rocks at low tide; Choeng Mon calm water.
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** GOV.UK safety **(P)**; Department of Marine and Coastal Resources (dmcr.go.th) jellyfish guidance **(P)**; Khaosod reports (verify only)

#### `/precautions-safety/` · D4 · GUIDE
- **Primary keyword:** is koh samui safe · **Secondary:** koh samui safety tips, koh samui safety for women, koh samui crime, koh samui dangers, koh samui travel advice
- **Title tag:** Is Koh Samui Safe? Safety Tips & Precautions for 2026 · **Meta description:** Is Koh Samui safe? The real risks are roads, the sea and party nights, not crime. Practical precautions, laws that catch tourists out and emergency numbers.
- **H1:** Is Koh Samui Safe? Precautions and Safety Tips for 2026
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Koh Samui is generally safe for visitors. The real risks are scooter crashes, the sea (rip currents Oct–Dec, box jellyfish) and alcohol-related incidents on party nights.
  - Wear a helmet, swim between flags and take a licensed return boat from the Full Moon.
  - Save these numbers: 1155 Tourist Police, 1669 ambulance.
- **Section outline (H2 → H3):**
  1. Safety at a glance: table (risk | how common | what to do).
  2. Road safety: helmets; IDP; wet hills; night riding.
  3. Sea and beaches: summary, linking to the beach safety page.
  4. Boat trips: FCDO links accidents to overloading and rough seas. We cancel when it isn't safe; life jackets for every age.
  5. Nightlife and Full Moon nights from Samui: spiking, assaults and unlicensed transport (FCDO); book a licensed return.
  6. Crime and theft: bag snatching from scooters [check]; hotel safes; scams link.
  7. Women and solo travellers: practical advice [use GOV.UK wording].
  8. Health: heat; dengue; drinking water (bottled/filtered [check]); dogs and rabies [check]; hospitals.
  9. Natural hazards: storms Dec–Jan (Pabuk 2019); flooding Oct–Dec; TMD warnings.
  10. Laws that catch tourists out: vapes; cannabis in public; drugs; temple dress and conduct; respect for the monarchy [check wording].
  11. Emergency numbers and contacts: tap-to-call table.
  12. Safety FAQ
- **Data blocks:** risk table; emergency table; map: hospitals, police and Tourist Police.
- **FAQ (exact questions, 8):**
  1. Is Koh Samui safe for tourists?
  2. Is Koh Samui safe for solo female travellers?
  3. Is Koh Samui safe at night?
  4. Is it safe to drink tap water on Koh Samui?
  5. Are there dangerous animals on Koh Samui?
  6. Is it safe to go to the Full Moon Party from Samui?
  7. What are the emergency numbers in Thailand?
  8. Is Koh Samui safe in the rainy season?
- **Money links (internal, 2–4 product/booking pages):** `/product/full-moon-party-speedboat-koh-samui/`, `/product/pig-island-speedboat-tour/`, `/product/ang-thong-marine-park-day-tour-koh-samui/` · **Supporting guide links:** every Health and safety page; `/koh-samui-roads/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** helmeted scooter riders; red flag on Lamai; life jackets on our boat (own); Tourist Police sign.
- **Word target:** 2,500
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** GOV.UK Thailand travel advice **(P)**; TMD **(P)**; CDC/TravelHealthPro **(P)**

---

**GROUP 3: LIVING AND WORKING** (phase decision per Part N8; heavy [check] load: verify with official sources and a licensed lawyer)

#### `/koh-samui-immigration-office/` · D4 (with D5 at-a-glance box) · GUIDE
- **Primary keyword:** koh samui immigration office · **Secondary:** koh samui immigration, samui immigration maenam, 90 day report koh samui, tm30 koh samui, re-entry permit koh samui
- **Title tag:** Koh Samui Immigration Office 2026: Address, Hours, Services · **Meta description:** Koh Samui Immigration is in Maenam, not Nathon: address, phone, hours, extensions, 90-day reports, TM30, re-entry permits, what to bring and when to go.
- **H1:** Koh Samui Immigration Office (Maenam): Address, Hours and Services
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Koh Samui Immigration is at 333 Maenam Road, Soi 1, Moo 1, Maenam 84330. It moved from Nathon in 2016, so old map pins are wrong.
  - Phone +66 77 423 440. It's usually open Mon–Fri 08:30–16:30 and closed on weekends and public holidays, so call ahead.
  - It handles extensions (TM.7), 90-day reports, TM.30 and re-entry permits.
- **Section outline (H2 → H3):**
  1. At a glance: address, GPS [check], phone, hours, services, dress code [check].
  2. Map and directions: from Chaweng, Lamai, Bophut and Nathon (km/min [check]); parking; songthaew/Grab.
  3. Services
     - H3 Extensions.
     - H3 90-day reports (TM.47), in person or online [check portal].
     - H3 TM.30 address notification.
     - H3 Re-entry permits: single/multiple fees [check].
     - H3 Long-stay extensions (retirement, marriage, DTV) [check].
  4. What to bring: copies, photos, TM.30 receipt [check]; a printable checklist.
  5. Queues and the best time to go: local tip from Mea [check].
  6. TM.30 for landlords, villa owners and tenants: who files; deadlines [check].
  7. Online services: official portals only.
  8. Immigration office FAQ
- **Data blocks:** at-a-glance box; map with directions; service table (service | form | fee | when) [check fees]; checklist.
- **FAQ (exact questions, 8):**
  1. Where is the immigration office on Koh Samui?
  2. What are Koh Samui immigration's opening hours?
  3. Can I do my 90-day report online?
  4. What is TM30 and who files it?
  5. How much is a re-entry permit?
  6. Is Koh Samui immigration still in Nathon?
  7. Do I need an appointment?
  8. Is there a dress code at immigration?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-villas/` (long-term tab), `/product/pig-island-speedboat-tour/` · **Supporting guide links:** `/koh-samui-visa-extension/`, `/thailand-visa-guide/`, `/koh-samui-long-stay/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** Immigration building frontage, Maenam (own); Soi 1 turn-off from Maenam Road (for wayfinding); parking area.
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage, GovernmentOffice (address, geo, openingHoursSpecification once verified)
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** immigration.go.th **(P)**; Surat Thani Immigration **(P)** [check URL]; a phone call to the office

#### `/koh-samui-banks-money/` · D4 · GUIDE
- **Primary keyword:** koh samui atm · **Secondary:** atm fees thailand 2026, banks on koh samui, money exchange koh samui, open a bank account in thailand foreigner, cash or card koh samui
- **Title tag:** Koh Samui Banks, ATMs & Money 2026: Fees and Exchange · **Meta description:** Money on Koh Samui: ATM fees of 220–250 THB (AEON 150), withdrawal limits, why to decline DCC, where cards work, exchanging cash and Thai bank accounts.
- **H1:** Banks, ATMs and Money on Koh Samui
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Most Thai ATMs charge foreign cards 220–250 THB per withdrawal (AEON ATMs in Big C and Lotus's charge 150), with limits of 20,000–30,000 THB. Always decline "conversion" (DCC) and choose THB.
  - Cards work in malls, 7-Eleven and hotels. Carry cash for street food, songthaews, many taxis and boat island fees.
- **Section outline (H2 → H3):**
  1. Cash or card: where each works on Samui.
  2. ATM fees and limits: table (bank | fee | max per withdrawal): Krungsri 30k; Bangkok Bank 25k; SCB/KBank 20k; AEON 150 THB fee, 20k.
  3. Dynamic currency conversion: always decline it.
  4. Exchanging money: bank exchange booths; SuperRich presence on Samui [check]; bring clean notes.
  5. Paying for tours: we charge in THB online; cash for park and island fees (300/150, ~50, 250).
  6. Opening a Thai bank account: requirements vary by bank and visa [check]; why long-stayers want one; PromptPay.
  7. Transferring money: international transfers; FET forms for property [check].
  8. Currency import and export rules: declaration thresholds [check].
  9. Money FAQ
- **Data blocks:** ATM fee table; map of bank clusters (Central Samui, Chaweng, Nathon) without branch links; cash-needed checklist.
- **FAQ (exact questions, 8):**
  1. How much do ATMs charge on Koh Samui?
  2. Which ATM is cheapest in Thailand?
  3. Should I accept conversion at the ATM?
  4. Can I pay by card on Koh Samui?
  5. Where can I exchange money on Koh Samui?
  6. Can a foreigner open a bank account in Thailand?
  7. How much cash do I need for boat trips?
  8. Is there a limit on bringing cash into Thailand?
- **Money links (internal, 2–4 product/booking pages):** `/product/ang-thong-marine-park-day-tour-koh-samui/`, `/product/pig-island-speedboat-tour/`, `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/` · **Supporting guide links:** `/koh-samui-budget/`, `/koh-samui-scams/`, `/koh-samui-long-stay/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** row of bank ATMs (no logos prominent); THB notes and coins; card terminal with a currency choice.
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Bank of Thailand (bot.or.th) **(P)**; Thai Customs (customs.go.th) **(P)** for currency declaration; bank fee pages (verify only)

#### `/koh-samui-coworking/` · D4 · GUIDE
- **Primary keyword:** koh samui digital nomad · **Secondary:** coworking koh samui, dtv visa koh samui, koh samui cost of living, best area koh samui for digital nomads, koh samui internet for remote work
- **Title tag:** Koh Samui for Digital Nomads 2026: DTV, Coworking, Costs · **Meta description:** Remote work from Koh Samui: the DTV visa (5 years, 180 days per entry), where to base yourself, coworking and café Wi-Fi, fibre, monthly costs and tax.
- **H1:** Koh Samui for Digital Nomads: Visas, Coworking and Costs
- **Answer-first lead (what it must say in 2–3 sentences):**
  - The usual legal route is the DTV: 5 years, up to 180 days per entry, 10,000 THB fee and 500,000 THB in savings. It allows remote work for foreign clients, never for a Thai employer.
  - Base yourself in Bophut, Maenam or Lamai for quieter rents and fibre [check]. Budget for a monthly scooter (2,000–4,500 THB) and a backup SIM.
- **Section outline (H2 → H3):**
  1. Is Samui good for remote work? An honest comparison with Phangan and Chiang Mai [check claims].
  2. Visas for remote workers: DTV terms and the 31 Aug 2026 changes; LTR [check]; why the 30-day exemption doesn't fit.
  3. Where to base yourself: table (area | rent level [check] | internet | vibe).
  4. Coworking spaces and laptop-friendly cafés: field-verified directory; day/month prices [check]; no outbound links.
  5. Internet: fibre; AIS/True 5G; backup.
  6. Monthly cost of living: table (rent [check], scooter 2,000–4,500, food, SIM 1,199/30 days, gym [check]).
  7. Tax residency and foreign income: 180-day rule; 2024 remittance rule [check with a tax adviser; general only].
  8. Weekends: Pig Island, Ang Thong, Koh Phangan.
  9. Digital nomad FAQ
- **Data blocks:** area table; coworking layer on a map (verified); monthly cost table.
- **FAQ (exact questions, 8):**
  1. Can I work remotely from Koh Samui?
  2. What is the DTV visa?
  3. Is there coworking on Koh Samui?
  4. Is the internet good on Koh Samui?
  5. What does it cost to live on Koh Samui per month?
  6. Which area is best for digital nomads?
  7. Do I pay Thai tax as a digital nomad?
  8. Can I work for a Thai company on a DTV?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-villas/` (long-term tab), `/product/pig-island-speedboat-tour/`, `/product/ang-thong-marine-park-day-tour-koh-samui/` · **Supporting guide links:** `/thailand-visa-guide/`, `/koh-samui-sim-card-wifi/`, `/koh-samui-long-stay/`, `/working-on-koh-samui/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** laptop on a villa terrace; café workspace in Bophut (no brand); Maenam beach at sunset after work.
- **Word target:** 2,000
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** thaievisa.go.th DTV page **(P)**; Revenue Department (rd.go.th) **(P)**; BOI LTR (ltr.boi.go.th) **(P)**

#### `/working-on-koh-samui/` · D4 · GUIDE
- **Primary keyword:** working in koh samui · **Secondary:** work permit thailand foreigner, jobs in koh samui for foreigners, can i work on a tourist visa in thailand, dive instructor work permit thailand, teaching english koh samui
- **Title tag:** Working on Koh Samui 2026: Work Permits & Legal Jobs · **Meta description:** Can foreigners work on Koh Samui? Work permit basics, jobs reserved for Thais, legal routes in hospitality, diving and teaching, DTV remote work, penalties.
- **H1:** Working on Koh Samui: Work Permits, Legal Jobs and Remote Work
- **Answer-first lead (what it must say in 2–3 sentences):**
  - To work for a Thai business you need a non-immigrant visa (usually Non-B) and a work permit. Working on a visa exemption, a tourist visa or for a Thai employer on a DTV is illegal.
  - Some occupations, including tour guiding [check list], are reserved for Thai nationals.
- **Section outline (H2 → H3):**
  1. The short answer: visa + permit; who sponsors.
  2. How work permits work: the Foreign Workers Management Emergency Decree 2017 [check]; employer requirements (capital per foreign worker, Thai staff ratio [check]); processing.
  3. Jobs reserved for Thais [check current list].
  4. Common legal jobs on Samui: hotel management, dive instructors, teachers, chefs [check], with the permit route for each.
  5. Remote work, DTV and LTR: what's allowed.
  6. Volunteering and "free" work: still needs a permit [check].
  7. Penalties for working illegally: fines, deportation [check amounts].
  8. Working FAQ
- **Data blocks:** route table (situation | visa | permit | sponsor); reserved-occupation summary (from the official list, dated).
- **FAQ (exact questions, 7):**
  1. Can I work on Koh Samui as a foreigner?
  2. Can I work on a visa exemption or tourist visa?
  3. How do I get a work permit in Thailand?
  4. Can I be a dive instructor on Koh Samui?
  5. Which jobs are foreigners not allowed to do in Thailand?
  6. Can I volunteer without a work permit?
  7. Can I work remotely on a DTV?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-villas/` (long-term tab), `/product/pig-island-speedboat-tour/` · **Supporting guide links:** `/opening-business-koh-samui/`, `/koh-samui-coworking/`, `/thailand-visa-guide/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** dive instructor briefing (licensed); hotel reception (generic); classroom (generic).
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Department of Employment (doe.go.th) **(P)**; immigration.go.th **(P)**; Royal Gazette reserved-occupation decree **(P)**

#### `/opening-business-koh-samui/` · D4 · GUIDE
- **Primary keyword:** open a business in koh samui · **Secondary:** foreign business act thailand, thai company 49 percent foreign ownership, boi thailand, nominee shareholders thailand illegal, tour company licence thailand
- **Title tag:** Opening a Business on Koh Samui 2026: Rules for Foreigners · **Meta description:** Starting a business on Koh Samui as a foreigner: Thai company, Foreign Business Licence or BOI, the 49% rule, nominee risks, tour and hotel licences, tax.
- **H1:** Opening a Business on Koh Samui: What Foreigners Need to Know
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Most service businesses are restricted for foreigners under the Foreign Business Act 1999 [check list]. The usual routes are a Thai company with at most 49% foreign shares, a Foreign Business Licence, BOI promotion or (for US citizens) the Treaty of Amity [check].
  - Thai nominee shareholders holding shares for a foreigner are illegal.
- **Section outline (H2 → H3):**
  1. Your options compared: table (route | foreign ownership | capital [check] | pros | cons).
  2. The Foreign Business Act lists: what's restricted [check].
  3. Nominee structures: illegal; 2025–26 enforcement [check reports].
  4. Capital and work-permit requirements [check].
  5. Licences by sector: TAT tour business licence (Tourism Business and Guide Act [check]); hotel licence for stays under 30 days [check]; food and alcohol licences [check].
  6. Tax basics: VAT 7%, registration threshold [check 1.8 m THB]; corporate income tax [check]; accounting and audit.
  7. Renting commercial premises: lease registration over 3 years [check].
  8. Samui practicalities: seasonality (Oct–Dec low season); staffing; local offices.
  9. Business FAQ
- **Data blocks:** options table; licence-by-sector table; step timeline (name reservation → registration → VAT → permits) [check order].
- **FAQ (exact questions, 8):**
  1. Can a foreigner own a business on Koh Samui?
  2. What is the 49% rule in Thailand?
  3. Are Thai nominee shareholders legal?
  4. Do I need a licence to run tours on Koh Samui?
  5. Do I need a hotel licence to rent out my villa?
  6. When do I need to register for VAT?
  7. How long does it take to set up a company?
  8. Can I work in my own company?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-villas/` (long-term tab), `/koh-samui-private-speedboat/` · **Supporting guide links:** `/working-on-koh-samui/`, `/koh-samui-lawyers/`, `/koh-samui-real-estate/`, `/koh-samui-local-government/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** shopfronts on Fisherman's Village street (no brands); signing documents (generic); Nathon government offices (own).
- **Word target:** 2,200
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Department of Business Development (dbd.go.th) **(P)**; BOI (boi.go.th) **(P)**; Revenue Department **(P)**; Department of Tourism licence pages **(P)**

#### `/koh-samui-real-estate/` · D4 · GUIDE
- **Primary keyword:** koh samui real estate · **Secondary:** buying property on koh samui as a foreigner, koh samui land for sale foreigner, chanote koh samui, 30 year lease thailand, koh samui condo foreign quota, property transfer fees thailand
- **Title tag:** Koh Samui Real Estate Guide 2026: Leases, Titles & Costs · **Meta description:** Buying or leasing on Koh Samui as a foreigner: what you can own, safe land titles, 30-year leases, condos, transfer costs, land tax and hillside rules.
- **H1:** Koh Samui Real Estate Guide 2026: Buying, Leasing, Titles and Costs for Foreigners
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Foreigners can't own land in Thailand. They can own a condominium unit (within the 49% foreign quota), own a building separately from the land, or register a lease of up to 30 years at the Land Office.
  - Only deal in land with a Chanote (Nor Sor 4 Jor) or a properly surveyed Nor Sor 3 Gor [check].
  - On Samui, check hillside, forest-land and building-height rules before you pay anything [check].
- **Section outline (H2 → H3), 17 H2s, at least the twin's 15:**
  1. What foreigners can and cannot own: table (structure | what you get | maximum term | key law): land ×; condo ✓ 49%; building ✓; lease 30 years; usufruct/superficies [check].
  2. Land titles on Koh Samui: table (title | what it is | sale and lease registration | our view): Chanote, NS3G, NS3, Sor Kor 1, Por Bor Tor 5 [check each].
  3. How a 30-year lease works: registration at the Land Office; fees [check 1% + 0.1% stamp]; "30+30+30" renewals aren't guaranteed [check].
  4. Is there a 99-year lease in Thailand? 2025–26 proposal status [check].
  5. Condominiums: 49% quota; foreign-currency transfer proof (FET form) [check].
  6. Thai companies and nominees: illegal; risks.
  7. Usufruct, superficies and buying through a Thai spouse [check].
  8. Transfer and registration costs: table (item | rate | usually paid by): transfer fee 2%; SBT 3.3% or stamp duty 0.5%; withholding tax [check all].
  9. Annual Land and Building Tax: table (use | rate on appraised value) [check].
  10. Hillside, coastal and forest-land rules on Samui: elevation/slope/height limits and coastal setbacks [check every number]. Overlap Stone 2 was reported closed after a forestry raid in July 2026, a reminder that forest-land encroachment is enforced.
  11. Water, electricity and road access: PEA connection; water supply [check]; steep concrete roads; rainy-season access.
  12. Renting your villa out: hotel licence for stays under 30 days [check]; TM.30 duties.
  13. What happened in 2025–2026: nominee enforcement [check]; forest-land enforcement (July 2026); 99-year-lease debate [check].
  14. Buyer's and leaseholder's checklist: independent lawyer; Land Office title search; access; permits; utilities.
  15. Renting long-term on Koh Samui: summary, linking to the long-stay page.
  16. Land Office, municipality and district office: map [check every location].
  17. Real estate FAQ
- **Data blocks:** four tables (ownership, titles, costs, tax); checklist; Leaflet map (Land Office [check], municipality, district office, immigration, PEA [check]); "Last legal review {date}" stamp.
- **FAQ (exact questions, 10):**
  1. Can a foreigner buy land on Koh Samui?
  2. Is a 30+30+30-year lease valid?
  3. Does Thailand have 99-year leases now?
  4. What is a Chanote?
  5. Can foreigners buy a condo on Koh Samui?
  6. How much are property transfer fees in Thailand?
  7. Can I build on a hillside plot on Koh Samui?
  8. Is buying through a Thai company legal?
  9. Where is the Land Office on Koh Samui?
  10. Do foreigners pay property tax in Thailand?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-villas/` (long-term tab: "Monthly rent on request · min. 6 months"), `/koh-samui-villas/` (holiday tab for house-hunting stays), `/product/pig-island-speedboat-tour/` · **Supporting guide links:** `/building-koh-samui/`, `/koh-samui-lawyers/`, `/koh-samui-long-stay/`, `/koh-samui-local-government/` · **Sister-site link (max 1, only if genuinely useful):** kohphangan.com/koh-phangan-real-estate/ (for buyers comparing islands)
- **Images needed (descriptions):** drone shot of hillside villas above Chaweng Noi; Chanote document (illustrative, with no real parcel data); steep concrete access road; Land Office counter (own photo, no faces).
- **Word target:** 3,500
- **Schema:** Article, BreadcrumbList, FAQPage, GovernmentOffice items for map pins
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):**
  - Department of Lands (dol.go.th) **(P)**; Revenue Department **(P)**; Condominium Act and Land Code texts (Krisdika, krisdika.go.th) **(P)**.
  - Department of Public Works and Town & Country Planning (dpt.go.th) **(P)**; Samui municipality **(P)** [check URL].

#### `/building-koh-samui/` · D4 · GUIDE
- **Primary keyword:** building permit koh samui · **Secondary:** build a house on koh samui, koh samui building regulations, hillside building koh samui, koh samui height limit, construction koh samui foreigner
- **Title tag:** Building on Koh Samui 2026: Permits, Height & Hill Rules · **Meta description:** Building a villa on Koh Samui: owning the building, the municipal permit process, slope, height and coastal rules, utility connections and contractors.
- **H1:** Building on Koh Samui: Permits, Rules and Practical Steps
- **Answer-first lead (what it must say in 2–3 sentences):**
  - A foreigner can own a building on leased land (with a registered lease or superficies [check]). Every build needs a municipal construction permit with licensed architect and engineer drawings [check].
  - Samui has stricter controls on slopes, height and coastal setbacks than most of Thailand [check numbers], so confirm the plot's zoning before you sign a lease.
- **Section outline (H2 → H3):**
  1. Who can build and own a building: building ownership vs land; superficies [check].
  2. The permit process: Building Control Act [check]; municipality application; drawings; timescales [check].
  3. Samui-specific controls: environmental protection area rules; slope; elevation; height; coastal setback [check every figure].
  4. Environmental impact assessments: thresholds [check].
  5. Utilities: PEA meter; water [check]; wastewater/septic rules [check].
  6. Contractors and contracts: staged payments, retention, defects period [check typical]; independent site supervision.
  7. Timing and seasons: avoid earthworks in Oct–Dec rain; access roads.
  8. Building FAQ
- **Data blocks:** process timeline; rules table (rule | limit | source | last checked) **[all check]**.
- **FAQ (exact questions, 7):**
  1. Can a foreigner build a house on Koh Samui?
  2. Do I need a building permit on Koh Samui?
  3. What is the height limit for buildings on Koh Samui?
  4. Can I build on a steep hillside plot?
  5. How long does a building permit take?
  6. How do I connect electricity and water?
  7. When is the best time of year to build?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-villas/` (long-term tab), `/koh-samui-villas/` · **Supporting guide links:** `/koh-samui-real-estate/`, `/koh-samui-lawyers/`, `/koh-samui-local-government/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** villa under construction on a slope; architect's plans on a site table; PEA power poles on a new road.
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** dpt.go.th **(P)**; ONEP (onep.go.th) for EIA and environmental protection areas **(P)**; PEA (pea.co.th) **(P)**; Samui municipality **(P)**

#### `/koh-samui-lawyers/` · D4 · GUIDE
- **Primary keyword:** lawyer koh samui · **Secondary:** property lawyer koh samui, thai lawyer for foreigners, land due diligence koh samui, power of attorney thailand, legal fees koh samui
- **Title tag:** Lawyers on Koh Samui 2026: How to Choose & What to Check · **Meta description:** Finding a lawyer on Koh Samui: when you need one, how to check a licence, what property due diligence must cover, fee structures and red flags to avoid.
- **H1:** Lawyers on Koh Samui: How to Choose One and What They Should Check
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Use an independent, licensed Thai lawyer (verify with the Lawyers Council of Thailand [check search]) for property, business set-up or disputes. Never use the seller's or agent's lawyer.
  - Property due diligence must include a Land Office title search, encumbrances, legal access, zoning and permits.
- **Section outline (H2 → H3):**
  1. When you need a lawyer: property, leases, company set-up, visas, disputes, accidents.
  2. How to choose: licence check; independence; English; a written fee quote; references.
  3. What property due diligence covers: a checklist.
  4. Fees: fixed vs percentage vs hourly [check typical]. No invented numbers.
  5. Power of attorney, translations and notarisation [check].
  6. Red flags: nominee schemes; "guaranteed" 90-year leases; pressure to pay deposits early.
  7. Lawyer FAQ
- **Data blocks:** due-diligence checklist; "questions to ask a lawyer" card. No directory of named firms (no endorsements, no outbound links).
- **FAQ (exact questions, 6):**
  1. Do I need a lawyer to lease land on Koh Samui?
  2. How do I check a Thai lawyer is licensed?
  3. How much does a property lawyer cost on Koh Samui?
  4. Can the agent's lawyer act for me?
  5. What does due diligence include?
  6. Can I sign documents by power of attorney?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-villas/` (long-term tab), `/koh-samui-villas/` · **Supporting guide links:** `/koh-samui-real-estate/`, `/opening-business-koh-samui/`, `/building-koh-samui/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** contract and pen (generic); Thai legal document stamp (illustrative); office meeting (generic).
- **Word target:** 1,500
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Lawyers Council of Thailand (lawyerscouncil.or.th) **(P)**; Department of Lands **(P)**; MFA legalisation **(P)**

#### `/koh-samui-schools/` · D4 · GUIDE
- **Primary keyword:** international schools koh samui · **Secondary:** koh samui international school fees, british school koh samui, schools in koh samui for expats, education visa thailand parent, moving to koh samui with children
- **Title tag:** International Schools on Koh Samui 2026: Fees & Options · **Meta description:** Moving to Koh Samui with children: international and bilingual schools, curricula, published fee ranges, accreditation, student and parent visas.
- **H1:** International Schools on Koh Samui: Options, Fees and Visas
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Samui has a small number of international and bilingual schools [check count]. Candidates to verify include Panyadee (British curriculum) [check] and the International School of Samui [check].
  - Fees vary widely, so take them only from each school's published fee sheet [check].
  - Children usually study on a Non-ED visa, with a parent on a guardian visa [check].
- **Section outline (H2 → H3):**
  1. Overview: how many schools; curricula; ages.
  2. School directory: table (school | area | curriculum | ages | annual fees THB | accreditation). Every cell [check] from the school's own published documents, with a last-checked date. Names as text only, never links.
  3. Fees and extra costs: application, deposits, uniforms, transport [check].
  4. Curricula and accreditation: British, IB, Thai bilingual; how to verify accreditation [check bodies].
  5. Visas for students and parents [check].
  6. Where to live for the school run: Route 4169 traffic at peak times [check].
  7. Thai and bilingual schools.
  8. Schools FAQ
- **Data blocks:** school table (dated); map of schools (verified pins; no outbound links).
- **FAQ (exact questions, 7):**
  1. Are there international schools on Koh Samui?
  2. How much do international schools on Koh Samui cost?
  3. Is there a British school on Koh Samui?
  4. What visa does my child need to study in Thailand?
  5. Can a parent get a visa to accompany a child at school?
  6. Which area is best for families with school-age children?
  7. Do schools on Koh Samui offer IB?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-villas/` (long-term tab), `/product/pig-island-speedboat-tour/` · **Supporting guide links:** `/koh-samui-long-stay/`, `/koh-samui-with-kids/`, `/thailand-visa-guide/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** generic school classroom; school bus on the ring road (no logos); children's sports field (no faces).
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of School (geo) once verified
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** OPEC / Ministry of Education private school register **(P)** [check URL]; immigration.go.th (Non-ED, guardian) **(P)**; school fee sheets (verify only)

#### `/koh-samui-local-government/` · D4 · GUIDE
- **Primary keyword:** koh samui municipality · **Secondary:** koh samui district office, koh samui land office, samui city municipality, koh samui government offices, koh samui postcode
- **Title tag:** Koh Samui Local Government 2026: Offices & Who Does What · **Meta description:** How Koh Samui is run: Surat Thani province, Amphoe Ko Samui and its 7 tambons, the city municipality since 2012, key government offices and postcodes.
- **H1:** Koh Samui Local Government: Offices, Districts and Who Does What
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Samui is a district (Amphoe Ko Samui) of Surat Thani province with 7 tambons, and the whole island has been a single city municipality (Thesaban Nakhon Ko Samui) since 2012.
  - Postcodes: 84320 Bophut/Chaweng, 84330 Maenam, 84140 Nathon.
- **Section outline (H2 → H3):**
  1. How Samui is governed: province → district → municipality; a chronology (subdistrict municipality 1999, town 2008, city 2012).
  2. The 7 tambons: table (tambon | main areas): Ang Thong (incl. Nathon); Lipa Noi; Taling Ngam; Na Mueang; Maret (Lamai); Bo Phut (Chaweng, Bophut, Bangrak, Choeng Mon); Mae Nam.
  3. Key offices: table (office | what it does | location | phone | hours). Rows: District Office, Municipality, Land Office, Immigration (Maenam, verified), Tourist Police, PEA, water utility [check all except immigration].
  4. Postcodes and addresses: how Thai addresses work (Moo, Tambon).
  5. Residence certificates and house registration (yellow book) [check].
  6. Public services: rubbish, water and power issues [check]; reporting problems.
  7. Local government FAQ
- **Data blocks:** tambon table; offices table; Leaflet map of offices.
- **FAQ (exact questions, 6):**
  1. Which province is Koh Samui in?
  2. Is Koh Samui a city?
  3. What is the postcode for Chaweng?
  4. Where is the district office on Koh Samui?
  5. Where is the Land Office on Koh Samui?
  6. How do I get a residence certificate on Koh Samui?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-villas/` (long-term tab), `/product/pig-island-speedboat-tour/` · **Supporting guide links:** `/koh-samui-real-estate/`, `/koh-samui-immigration-office/`, `/opening-business-koh-samui/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** Nathon town waterfront; municipality building (own); district map graphic (our own SVG).
- **Word target:** 1,500
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of GovernmentOffice
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Samui municipality site **(P)** [check URL]; Surat Thani province (suratthani.go.th) **(P)**; Department of Provincial Administration (dopa.go.th) **(P)**

#### `/koh-samui-long-stay/` · D4 · GUIDE
- **Primary keyword:** long term rental koh samui · **Secondary:** koh samui monthly rental, long stay koh samui, villa monthly rent koh samui, cost of living koh samui, koh samui rental contract
- **Title tag:** Long-Term Rentals on Koh Samui 2026: Villas & Long Stays · **Meta description:** Renting long-term on Koh Samui: areas, villa vs house vs condo, contracts and deposits, electricity per unit, TM30, monthly scooters and living costs.
- **H1:** Long-Term Rentals and Long Stays on Koh Samui
- **Answer-first lead (what it must say in 2–3 sentences):**
  - Most long-stayers rent a villa or house in Maenam, Bophut, Lamai or the Chaweng Noi hills on 6–12-month contracts. Our long-term villas are "Monthly rent on request · min. 6 months".
  - Check how electricity is billed (owner's rate per unit vs the PEA tariff [check]) and the deposit terms.
  - Remember the TM.30 address notification.
- **Section outline (H2 → H3):**
  1. Visas for long stays: summary, linking to the visa guide.
  2. Rental market by area: table (area | typical property | monthly range [check: collect 10+ listings per area] | suits).
  3. Villa, house or condo?
  4. Contracts and deposits: typical 2 months [check]; notice; inventory and photos; Thai/English versions.
  5. Utilities and extras: electricity per unit; water; Wi-Fi/fibre; cleaning; pool and garden.
  6. TM.30 and registering your address.
  7. Transport for long stays: monthly scooter 2,000–4,500; car 800–1,200/day (monthly deals [check]).
  8. Monthly cost of living: table (rent [check], utilities [check], food, transport, SIM 1,199).
  9. Seasons and availability: high season Dec–Apr and Jul–Aug; Oct–Dec rain and road access.
  10. Long-stay FAQ
- **Data blocks:** area table; cost table; contract checklist; "Long-term villas" card rail from `/koh-samui-villas/#long-term`.
- **FAQ (exact questions, 8):**
  1. How much is a monthly villa rental on Koh Samui?
  2. What is the minimum rental period for long-term villas?
  3. How is electricity charged in Koh Samui rentals?
  4. How much deposit do landlords ask for?
  5. Which area is best for a long stay?
  6. Who files the TM30 for my rental?
  7. Can I rent a scooter monthly?
  8. When is it hardest to find a long-term rental?
- **Money links (internal, 2–4 product/booking pages):** `/koh-samui-villas/` (#long-term, "Enquire"), `/koh-samui-villas/` (#short-stay for a first month), `/product/pig-island-speedboat-tour/`, `/koh-samui-private-speedboat/` · **Supporting guide links:** `/koh-samui-immigration-office/`, `/koh-samui-coworking/`, `/koh-samui-real-estate/`, `/koh-samui-banks-money/` · **Sister-site link (max 1, only if genuinely useful):** none
- **Images needed (descriptions):** long-term villa living room; Maenam house with a garden; electricity meter on a villa wall; scooter outside a rental house.
- **Word target:** 2,200
- **Schema:** Article, BreadcrumbList, FAQPage
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** PEA tariffs (pea.co.th) **(P)**; immigration.go.th TM.30 **(P)**; Mea's villa partners for typical rents

---

**GROUP 4: SEA DATA PAGES** (Beaches and nature menu; included in this part because they share the live widgets)

#### `/koh-samui-tides/` · D4 + live widget · GUIDE
- **Primary keyword:** koh samui tides · **Secondary:** koh samui tide times today, tide chart koh samui, low tide koh samui beaches, high tide chaweng, koh samui tide table
- **Title tag:** Koh Samui Tides Today & Next 7 Days: Times and Heights · **Meta description:** Live Koh Samui tide times for Chaweng, Nathon and Thong Krut: tide now, next high and low, a 7-day chart and which beaches go shallow at low tide.
- **H1:** Koh Samui Tides Today and Next 7 Days
- **Answer-first lead (what it must say in 2–3 sentences):**
  - The widget shows the tide now and the next high and low for three Samui points (Chaweng, Nathon, Thong Krut).
  - Samui usually gets one main high and one main low a day (diurnal/mixed [check]), with a typical range of ~1–2 m [check against 12 months of data].
  - North and west beaches (Bophut, Bang Rak, Maenam, Lipa Noi, Bang Por, Bang Kao) go shallow at low tide, so swim at high tide.
- **Section outline (H2 → H3):**
  1. Koh Samui tides today and the next 7 days
     - `kpl-tnow` clone: "Tide now (hh:mm) x.xx m Rising · Next high tide hh:mm x.xx m · in h min · Biggest tide this week…".
     - Location tabs: Chaweng 9.53/100.06, Nathon 9.53/99.93, Thong Krut 9.41/99.95.
     - 7-day chart and an 8-day high/low table.
  2. Koh Samui tide facts: table (tide type; usual range; daily shift [check]; daytime lows by season; highest and lowest water of the year), derived from Open-Meteo or Hydrographic Department tables.
  3. How the tide works on Samui
     - H3 Why the water goes so far out: shallow fringing flats on the north and west coasts.
  4. Seasonal pattern by month: 12-row table (month | usual low | usual high | typical range | what it means on the beach) [check: compute from a year of data].
  5. Which beaches are best at which tide
     - H3 Shallow at low tide.
     - H3 Swimmable at most tides: Chaweng, Lamai centre, Silver Beach [check].
     - H3 Low-tide specials: Choeng Mon sandbar to Koh Fan Noi; rock pools [check].
  6. Tides for boats, kayaks and piers: Thong Krut longtails; beach landings at Koh Madsum [check with crew]; kayak/SUP timing.
  7. Full moon, spring tides and party nights: bigger ranges around full and new moon.
  8. Low-tide warnings: getting cut off on sandbars; urchins and coral; Lad Koh rocks. "Not for navigation" disclaimer.
  9. Koh Samui tides FAQ
- **Data blocks:**
  - Live tide widget with server-side fallback and 30-min cache; 7-day SVG chart; high/low table; moon-phase chip.
  - Facts table; monthly table; beach-tide map (icons: swim at high tide / OK any tide).
- **FAQ (exact questions, 8):**
  1. What time is high tide on Koh Samui today?
  2. How big is the tide on Koh Samui?
  3. When is low tide in the daytime on Koh Samui?
  4. Which Koh Samui beaches are good for swimming at low tide?
  5. Why does the sea go out so far at Bophut and Maenam?
  6. Is the biggest tide on the full moon?
  7. Do tides affect boat trips to Pig Island?
  8. Can I use these tide times for navigation?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/`, `/koh-samui-kayak-sup/`, `/product/ang-thong-marine-park-day-tour-koh-samui/` · **Supporting guide links:** `/koh-samui-beaches/`, `/koh-samui-sea-conditions/`, `/koh-samui-beach-safety/` · **Sister-site link (max 1, only if genuinely useful):** pigislandkohsamui.com
- **Images needed (descriptions):** Bophut flats at low tide; the same view at high tide (pair); Choeng Mon sandbar to Koh Fan Noi; longtail at Thong Krut pier.
- **Word target:** 2,300
- **Schema:** Article, BreadcrumbList, FAQPage, Place (three points with geo)
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** Hydrographic Department, Royal Thai Navy tide tables **(P)** [check URL]; Open-Meteo Marine API **(P, utility)**; TMD **(P)**

#### `/koh-samui-sea-conditions/` · D4 + live widget · GUIDE
- **Primary keyword:** koh samui sea conditions · **Secondary:** koh samui waves today, koh samui monsoon sea, is the sea rough in koh samui, ang thong sea conditions, ferry cancelled koh samui weather
- **Title tag:** Koh Samui Sea Conditions Today: Waves, Wind & Monsoon · **Meta description:** Live Koh Samui sea conditions: waves, swell and wind with a plain-English verdict, how we decide if boats run, the sea by month and the Oct–Dec monsoon.
- **H1:** Koh Samui Sea Conditions: Waves, Wind and Monsoon Today
- **Answer-first lead (what it must say in 2–3 sentences):**
  - The widget shows today's wave height, swell and wind with a Calm / Choppy / Rough verdict.
  - Feb–Apr has the calmest seas, and May–Sep is workable most days. The north-east monsoon from October to December brings onshore swell to the east coast, ferry delays and the Ang Thong closure (1 Nov–15 Dec).
  - If we cancel for sea safety, you choose a full refund or a new date.
- **Section outline (H2 → H3):**
  1. Sea now and the next 7 days
     - Open-Meteo Marine `wave_height`, `wind_wave_height` and `swell_wave_height`, plus forecast wind.
     - Verdict thresholds agreed with Mea [check: e.g. Calm < 0.5 m, Choppy 0.5–1.25 m, Rough > 1.25 m].
  2. Will my boat run? How we decide: the operator decides on the morning, based on TMD warnings and conditions; the guest chooses a refund or a new date.
  3. The sea by month: 12-row table (month | typical sea | east coast | west/south | boat trips | ferries), from O7.
  4. The north-east monsoon explained: onshore east coast; red flags; choppier ferries; Ang Thong closure.
  5. Which side is calmer today? East vs west/south and the departure points (Thong Krut for Pig Island; north-coast piers for Phangan/Tao; the Ang Thong departure pier [check]).
  6. Seasickness: boats, routes and tips. Big boat vs speedboat [check with crew]; where to sit; tablets.
  7. Ferries and weather cancellations: Phangan/Tao and Donsak; a buffer day before flights.
  8. Storms and official warnings: Pabuk 2019; TMD marine warnings (P); Windy (P).
  9. Swimming and surf safety: link to the beach safety page.
  10. Sea conditions FAQ
- **Data blocks:** live sea widget with fallback; verdict chip (also used on boat product pages); Windy embed; monthly table; map of piers coloured by exposure.
- **FAQ (exact questions, 8):**
  1. Is the sea rough on Koh Samui today?
  2. When is the sea calmest around Koh Samui?
  3. What wave height cancels boat trips?
  4. Do ferries to Koh Phangan run in the monsoon?
  5. Why is Ang Thong closed from November to mid-December?
  6. Which side of Koh Samui is calmer in the monsoon?
  7. Is the speedboat or big boat better if I get seasick?
  8. What happens if my tour is cancelled for weather?
- **Money links (internal, 2–4 product/booking pages):** `/product/pig-island-speedboat-tour/`, `/product/ang-thong-big-boat-tour-koh-samui/`, `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/`, `/product/full-moon-party-speedboat-koh-samui/` · **Supporting guide links:** `/koh-samui-weather/`, `/koh-samui-tides/`, `/koh-samui-beach-safety/`, `/ang-thong-speedboat-vs-big-boat/` · **Sister-site link (max 1, only if genuinely useful):** angthongmarinepark.com
- **Images needed (descriptions):** glassy Ang Thong lagoon (Mar); whitecaps off Chaweng (Nov); our crew checking conditions at the pier (own); ferry in a chop.
- **Word target:** 2,200
- **Schema:** Article, BreadcrumbList, FAQPage, Place (geo)
- **Official sources to verify against (for the writer, NOT to publish, except official gov/utility links allowed by Part A):** TMD marine forecast **(P)**; Open-Meteo Marine **(P, utility)**; Windy **(P, utility)**; Marine Department **(P)**; DNP closure notice **(P)**


### P3. Beaches, nature, places, nightlife, food, culture and wellness

This part gives the writer one content brief per page for the C1 groups "Beaches and nature", "Places to go", "Nightlife and festivals", "Food, shopping and culture" and "Wellness". Event pages (FMP, Songkran, Loy Krathong, CNY, NYE, Regatta, Muay Thai nights) and product pages are briefed elsewhere. So are `/activities/`, `/places/` (the hub), tides and sea conditions. Every fact below comes from Part O or `/docs/research/`. Anything tagged **[check]** must be verified at writing time, and stays off the live page until it is.

#### P3.0 Shared rules for every page in this part (read once, apply everywhere)

**Depth benchmark: kohphangan.com twins, read on 31 Oct 2026.** The Samui page must equal or beat its twin on H2 count, FAQ count, tables and map.

| Twin page | Body words | H2s (body) | FAQ | Tables | Map | What it means for Samui |
|---|---|---|---|---|---|---|
| /koh-phangan-beaches/ | 3,541 (measured) | 12 | 0 | 1 | yes | Twin has no FAQ schema, so beat it: build to the D4 spec (16+ H2s, 10 FAQs, map) |
| /koh-phangan-waterfalls/ | ~3,000 | 16 | 8 | 2 (compare, rainfall) | yes, no chips | Match the 16-H2 structure and add filter chips |
| /koh-phangan-temples/ | ~3,000 | 10 | 9 | 2 (glance, festivals) | none | Same shape, plus a map |
| /koh-phangan-restaurants/ | ~3,100 | 11 | 9 | 1 | none | Venues are named but **never linked**. Copy that practice |
| /koh-phangan-markets/ | ~1,900 | 10 | 7 | 2 (calendar, prices) | yes | Keep the "What's open tonight" opener |
| /zen-beach-koh-phangan/ | ~2,900 | 12 | 12 | 3 | yes (6 pins, 3 layers) | Gold standard for place pages: 10-field at-a-glance box, facilities, best-time and nearby tables |
| /thong-sala-koh-phangan/ | ~2,000 | 15 | 12 | 2 | yes, with category filters | Twin for the area/town pages (Chaweng, Nathon, Fisherman's Village) |
| /koh-phangan-hiking/ | 2,709 (measured) | 13 | 8 | 1 | [check] | Build to ≥ twin depth, plus a map |
| /koh-phangan-yoga/ | ~2,900 | 11 | 8 | 2 | none | Studios are named, not linked, and no studio prices are given. Copy that |
| /koh-phangan-nightlife/ | 1,906 (measured) | 13 | 5 | 1 | [check] | Beat it: 14+ H2s, 8+ FAQs, a venue map (names only, no links) |

**Rules that apply to all 62 briefs:**
1. **Links.** Naming venues, resorts, restaurants and studios as context is fine, as kohphangan.com does. **Linking them never is.** Allowed links: our own pages; a sister site (**max 1 per page in the body**); `wa.me/66637040888`; Google Maps directions deep links; and on weather and sea blocks only, Open-Meteo or Windy.
2. **Closed or unverified: never present as open.** Starz Cabaret (closed Nov 2021) · Chaweng Stadium (Muay Thai, reported closed) · Beach Republic, Lamai (largely closed 2025–26) · Samui Aquarium & Tiger Zoo · Samui Butterfly Garden · Coco Splash waterpark · Samui Snake Farm · Namuang Safari Park, plus Samui Elephant Kingdom at the same address until no-riding is verified · Overlap Stone 2 (closed after a July 2026 forestry raid) · Maenam Thursday and Lamai Sunday walking streets [U] · Nathon Saturday walking street (discontinued) · Samui Festival, Samui triathlon, Samui Jazz Festival (discontinued). Where a reader would look for one of these, write a one-line status note ("reported closed in 2026; we'll update this if it reopens").
3. **Animals.** No elephant riding or bathing, and no promotion of the Overlap Stone elephant feeding. Buffalo fighting appears only on the explainer page. Pig Island copy tells people not to chase or feed the pigs junk food.
4. **Ang Thong closure block.** On every page that links an Ang Thong product, date logic swaps the chip to "Season reopens 16 December" from **1 Nov to 15 Dec**, and Pig Island and Koh Tao cards move first. Ang Thong and Koh Tao shared tours are just "speedboat": **never state a guest number**. Only the VIP tour says "**15 guests on a big speedboat**".
5. **Pickup wording.** Always "Hotel pickup included from most areas of Koh Samui" (in at-a-glance boxes, the short form "pickup from most areas"). Pages for **Nathon, Lipa Noi, Taling Ngam, Bang Kao and Thong Krut** add "from {area} add 400 THB per person return".
6. **"How to get there" table on every place page.** Rows: from Chaweng · Lamai · Maenam · Nathon · Samui Airport. Columns: km · minutes · Grab (THB) · taxi (THB). **Measure km and minutes in Google Maps at writing time. Never publish an unmeasured figure.** Sanity anchors from Part O: airport to Chaweng 10–15 min, Lamai 25–30, Maenam 20–30, Choeng Mon 5–10, west coast 40–50. Airport taxi to Chaweng 400–600 THB; other zones "approx. 400–700 THB" [U]. Grab short hop 80–120, cross-island 200–350. Songthaew local fares 30–80 (tourists are asked 50–120), mostly finished by 20:00–22:00, and they don't serve the airport.
7. **At-a-glance box order** (place pages; mirrors Zen Beach): Area · GPS · Opening hours · Entry fee · Best time · Time needed · Parking · Dress code (temples) or Swimming (beaches) · Nearest pickup area for our tours.
8. **Images.** WebP. Alt text in the form "{what} at {where}, Koh Samui". Owner photos first. No public figures, **no TV stills**, no watermarks. No image used on more than two pages.
9. **Schema baseline.** `Article` (author `Person`, publisher `Organization`, `dateModified`) + `BreadcrumbList` + `FAQPage` + hero `ImageObject`. Place pages add `TouristAttraction`/`Beach`/`PlaceOfWorship` with `geo`, `openingHoursSpecification` and `isAccessibleForFree`. Hubs add an `ItemList` with `geo`.
10. **Every guide carries** a seasonal note (Oct–Dec NE monsoon, November wettest at ~445 mm; Feb–Apr calmest), a safety note, an "Updated {Month YYYY}" stamp and the author box.
11. **Slugs marked † are proposed** (C1 names the page but gives no slug). Add them to `/docs/keyword-map.csv` before writing. Product slugs C1 doesn't give (Pig Island variants) are proposed as `/product/pig-island-sunset-tour/`†, `/product/pig-island-longtail-tour/`†, `/product/pink-dolphins-pig-island-tour/`†, `/product/pig-island-private-longtail/`†, `/product/pig-island-private-speedboat/`†, `/product/three-islands-private-longtail/`† (Madsum, Tan, Rap), `/product/koh-rap-full-day-private/`† and `/product/jet-ski-safari-pig-island/`†.
12. **"[Local tip: ask Mea]"** marks a slot for an insider tip from the owner. Never invent one.
13. **Island activities** (safari, zipline, ATV, elephant sanctuary, cooking class, Muay Thai, diving, golf, spa) are enquiry-CTA guide pages until a partner is confirmed (I2). Link them as "money" pages, but the button reads **Enquire on WhatsApp**, not Book now.

---

#### `/koh-samui-beaches/` · D4 · HUB
- **Primary keyword:** koh samui beaches · **Secondary:** best beaches koh samui; best beach in koh samui for swimming; koh samui beaches for families; quiet beaches koh samui; koh samui beach map
- **Title tag:** Koh Samui Beaches: 18 Best Bays by Coast (2026) · **Meta description:** 18 Koh Samui beaches compared by coast: where to swim, which suit small kids, tides, red-flag months and a live map. Local team since 2006, updated monthly.
- **H1:** Koh Samui Beaches: 18 Best Bays by Coast (2026)
- **Answer-first lead:** For swimming, choose Chaweng North, central Lamai, Choeng Mon or Silver Beach. For toddlers, choose Choeng Mon or Lipa Noi at high tide. For sunsets, go to the west coast at Lipa Noi or Taling Ngam. The sea is calm January–September and calmest February–April. October–December brings surf, rip currents and red flags to Chaweng and Lamai, so swim on the north and west coasts then.
- **Section outline (H2 → H3):**
  1. **Map of Koh Samui's beaches**: split view (`kpg-map` + numbered `kpg-list`), 18 pins.
  2. **How to choose a Samui beach**. H3 by trip type: first-timers (Chaweng) · families with small kids (Choeng Mon, Lipa Noi) · couples (Chaweng Noi, Silver Beach, Bophut for dinners) · strong swimmers (Chaweng North, central Lamai) · snorkellers (Coral Cove, Silver Beach, Laem Yai) · sunset (Taling Ngam, Lipa Noi, Bang Por) · budget and long stays (Maenam). Answer-first line: east coast = swimming + sunrise; north = calm, shallow, tidal, dining; west = sunsets and tidal flats; south = quiet and local.
  3. **Koh Samui beaches compared**: the sortable table (see Tables).
  4. **East coast: Chaweng, Chaweng Noi, Silver Beach, Coral Cove and Lamai**. One H3 each, with facts line (best for · sand · swimming · facilities · parking · sun) and 120–250 words. Chaweng: the busiest beach; fine white sand on a gentle slope; North is the quietest and best for swimming; central has ARKbar and the beach clubs; length "~5–7 km, sources vary" [check]. Chaweng Noi: quiet cove, coarser sand, snorkel off the rocks, occasional sea lice. Silver Beach: boulder cove that fills by ~10:00. Coral Cove: coarse crystalline sand (water shoes), kayaks ~300 THB/h. Lamai: ~4 km; the centre is best but shelves steeply; the north end is shallow and stony (reef shoes). All five get red flags Oct–Dec. Chip "Book nearby" on each.
  5. **North-east: Choeng Mon, Tongson Bay and Plai Laem**. Choeng Mon is among the calmest; sandbar to Koh Fan Noi at low tide; rocky west end. Tongson: small, quiet, clear and shallow Dec–Apr, rougher May–Oct, sand-road access. Plai Laem: mostly resort frontage, swimming [check on site].
  6. **North coast: Bang Rak, Bophut, Maenam and Ban Tai**. Bang Rak (Big Buddha Beach): piers, aircraft noise, **not for swimming** (muddy shallows; glass reported). Bophut: **not recommended for swimming** (outflow near the east end, cloudy water, jellyfish), but the dining and the sunset view to Phangan are good. Maenam: long and quiet; calm in the dry season; chest-deep ~5 m out. Ban Tai (north): quiet ~1 km, shallow, calm, good for small kids [S] [GPS: take from Google Maps]. Add a note: not the Ban Tai on Koh Phangan.
  7. **North-west and west: Bang Por, Laem Yai, Lipa Noi and Nathon**. Bang Por: local seafood; swim at high tide only, with a stony flat 50 m+ at low tide (sources conflict [U]). Laem Yai: very quiet resort frontage (Four Seasons side); poor at low tide; clear for snorkelling. Lipa Noi: very shallow, no coral, calm most of the year; toddlers at high tide. Nathon: a town pier, not a swimming beach.
  8. **South-west and south: Taling Ngam, Thong Krut, Bang Kao and Laem Set**. Taling Ngam: long village beach, tidal, best sunset (Five Islands). Thong Krut: the pier for Pig Island boats, not a swimming beach. Bang Kao: high tide only, coral pieces (water shoes), litter reported. Laem Set: rocky headland, wellness resorts; beach data [check].
  9. **Beaches you reach by boat**: Ang Thong (Koh Mae Ko, Koh Wua Talab), Koh Madsum, Koh Tan, Koh Nang Yuan. Chips to products (closure logic applies).
  10. **Tides: why the north and west beaches empty at low tide**. Embed the `kpl-tnow` card (Chaweng point 9.53, 100.06; Nathon point 9.53, 99.93). Rule of thumb "swim within a couple of hours of high tide" [check against the local tide range]. Link to `/koh-samui-tides/`.
  11. **When to visit Samui's beaches, month by month**: table from O7 plus a coast verdict.
  12. **Beach safety**. Red flags and rips: Oct–Dec, and during winter surges (19 Feb 2026, 1–2 m+ waves, swimming banned). Box jellyfish: 9 of Thailand's 10 recorded deaths since 2002 were off Samui and Phangan; use the hotel vinegar stations; first aid is vinegar for 30 s or more, no rubbing, no fresh water. Jet-ski scams (link `/koh-samui-jet-ski/`). Sea lice. Theft from sunbeds. Numbers 1669 / 1155.
  13. **Beach rules and etiquette**: public nudity is illegal [check wording]; beach smoking ban on named beaches incl. Chaweng and Lamai and its fine [check current list and fine]; drones [check]; leave no litter.
  14. **Facilities and costs**: sunbed hire [check price], beach massage (Thai massage 1 h 300–500 THB island-wide, 400–600 in Chaweng), toilets, parking.
  15. **Where to stay by beach**: mini table from O15, linking to `/where-to-stay-koh-samui/`.
  16. **Koh Samui beaches: questions and answers**.
  17. **More from the Koh Samui guide** (`kpa-rel`).
- **Map (Leaflet POIs + filter chips):** 18 beaches with O14 GPS (Chaweng North 9.532, 100.0675 · Chaweng Noi 9.5082, 100.0565 · Lamai 9.4618, 100.0446 · Silver 9.4778, 100.0663 · Coral Cove 9.4906, 100.0613 · Choeng Mon 9.5722, 100.0825 · Tongson 9.5866, 100.0757 · Bang Rak 9.5572, 100.0533 · Bophut 9.5611, 100.0280 · Maenam 9.5701, 100.0004 · Bang Por 9.5781, 99.9369 · Laem Yai 9.5696, 99.9163 · Lipa Noi 9.5007, 99.9344 · Taling Ngam 9.4554, 99.9347 · Bang Kao 9.4232, 99.9938; Chaweng Central, Ban Tai, Thong Krut, Plai Laem [GPS: take from Google Maps]). Chips: North · East · South · West · Families · Snorkelling · Sunset · Swim at any tide. Second layer: Thong Krut pier and Big Buddha pier.
- **Tables / data blocks:** (1) Comparison table: Beach · Coast · Swimming · Tide-dependent? · Best for · Sun (rise/set) · Crowd · Oct–Dec verdict. (2) Month table: Month · Sea °C · Rain mm · East coast · North/West coast. (3) Tide card (live). (4) Where-to-stay mini table: Area · Mid-range THB/night · Honest downside.
- **FAQ (exact questions, 5–12):** What is the best beach on Koh Samui? · Which Koh Samui beach is best for swimming? · Which beach is best for families with small children? · Can you swim on Koh Samui in November? · Why is the sea so shallow at Maenam and Lipa Noi? · Is Bophut beach good for swimming? · Are there box jellyfish on Koh Samui? · Where can I watch the sunset from a beach on Koh Samui? · Are Koh Samui beaches free to use? · Is smoking allowed on Chaweng Beach?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat `/product/pig-island-speedboat-tour/` (1,450) · Ang Thong speedboat `/product/ang-thong-marine-park-day-tour-koh-samui/` (1,800; closure logic) · Koh Tao & Nang Yuan `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/` (2,200) · Private speedboat `/koh-samui-private-speedboat/` (from 19,000). Supporting: tides, sea conditions, weather, where to stay, snorkelling, sunset spots, beach safety. Sister: kohphangan.com/koh-phangan-beaches/ ("the beaches across the water").
- **Images needed:** Chaweng North at morning low crowd · Choeng Mon with the Koh Fan Noi sandbar · Silver Beach boulders · Coral Cove snorkellers · Lamai centre · red flag on Chaweng in surf · Lipa Noi tidal flat at low tide · Taling Ngam sunset with the Five Islands · Bophut beach at dusk with Phangan on the horizon · Maenam palms · vinegar station sign · Koh Nang Yuan sandbar (boat-only section).
- **Word target:** 4,500 (twin 3,541 measured; no FAQ on the twin, so add 10).
- **Schema:** Article, BreadcrumbList, FAQPage, ImageObject, ItemList of `Beach` with `geo`.

#### `/koh-samui-snorkeling/` · D4 · GUIDE
- **Primary keyword:** koh samui snorkelling (also "snorkeling") · **Secondary:** best snorkelling koh samui; snorkelling tour koh samui; koh tan snorkelling; coral cove snorkelling; ang thong snorkelling
- **Title tag:** Koh Samui Snorkelling 2026: Best Spots, Tours & Seasons · **Meta description:** Where to snorkel on Koh Samui in 2026: beach spots like Coral Cove, then Koh Tan, Ang Thong and Nang Yuan by boat. Seasons, fees, reef rules and tours.
- **H1:** Koh Samui Snorkelling: Best Spots by Beach and by Boat (2026)
- **Answer-first lead:** Snorkelling off Samui's own beaches is modest: Coral Cove, Silver Beach, the Chaweng Noi rocks and Laem Yai. The good reefs are offshore, at Koh Tan on the Pig Island trip, Koh Wao in Ang Thong, and Koh Nang Yuan by Koh Tao (250 THB landing fee). Visibility is best February–April. Ang Thong closes 1 Nov–15 Dec, and the east-coast spots are rough October–December.
- **Section outline (H2 → H3):**
  1. **Map of snorkelling spots**.
  2. **Snorkelling spots compared** (table).
  3. **Snorkelling from the beach**. H3s: Coral Cove (coarse sand, water shoes, kayak ~300 THB/h; a Jan 2026 review reported dead coral and litter [S], so say so) · Silver Beach (arrive before 10:00) · Chaweng Noi rocks (occasional sea lice) · Laem Yai (clear water, rocks, poor at low tide) · Choeng Mon and Koh Fan Noi · Tongson Bay (clear Dec–Apr).
  4. **Snorkelling by boat**. H3s: Koh Tan and Koh Madsum (from Thong Krut, ~30 min; Koh Tan is the better spot) · Ang Thong (Koh Wao stop, kayak) · Koh Nang Yuan (250 THB; plastic bottles, fins and water shoes banned on the island) · Koh Rap [check reef condition].
  5. **Private boat snorkel routes** (southern islands; Koh Som and Tongson; Ang Thong private 33,000).
  6. **When visibility is best**: month table; diving data says Ang Thong is clearest Mar–Apr [S].
  7. **What you might see** [check: species list from a dive-shop or DNP source; no guesses].
  8. **Gear: rent, bring or use ours**: what our trips include; mask fit; children's life jackets always provided and worn on our boats.
  9. **Reef rules**: don't stand on coral; no fish feeding; the reef-safe sunscreen rule (DNP ban on oxybenzone, octinoxate, 4-MBC and butylparaben in marine national parks since 2021 [check]); park fees in cash.
  10. **Safety**: box jellyfish and vinegar; longtail traffic; currents; sunburn (wear a rash vest); seasickness.
  11. **Snorkelling or Discover Scuba?** (→ diving guide).
  12. **Koh Samui snorkelling: questions and answers**.
  13. **Get on the water** (CTA rail).
- **Map (Leaflet POIs + filter chips):** Coral Cove 9.4906, 100.0613 · Silver 9.4778, 100.0663 · Chaweng Noi 9.5082, 100.0565 · Laem Yai 9.5696, 99.9163 · Choeng Mon 9.5722, 100.0825 · Tongson 9.5866, 100.0757 · Koh Tan, Koh Madsum, Thong Krut pier, Koh Wao, Koh Nang Yuan [GPS: take from Google Maps]. Chips: From the beach · By boat · Beginners · Kids.
- **Tables / data blocks:** Spots: Spot · Access · Depth/beginner? · Visibility season · Fee · Our trip. Month table (Feb–Apr best; Oct–Dec rough east).
- **FAQ (exact questions, 5–12):** Where is the best snorkelling on Koh Samui? · Can you snorkel straight from the beach on Koh Samui? · Is Koh Tan or Koh Madsum better for snorkelling? · Is Ang Thong good for snorkelling? · What is the best month for snorkelling around Samui? · Do I need to bring my own snorkel gear? · Can non-swimmers snorkel on your tours? · Are there jellyfish when snorkelling around Samui?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat (1,450) · Koh Tao & Nang Yuan (2,200) · Ang Thong speedboat (1,800) · Pig Island private longtail `/product/pig-island-private-longtail/`† (5,950/boat). Supporting: diving, beaches, Pig Island guide, Ang Thong guide, sea conditions, kayak & SUP. Sister: pigislandkohsamui.com.
- **Images needed:** snorkeller over coral at Koh Tan · Coral Cove from above · Silver Beach early morning · Nang Yuan sandbar · kids in life jackets on our boat · mask-and-snorkel gear laid out · kayak at Coral Cove · reef-safe sunscreen sign.
- **Word target:** 2,800
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `TouristAttraction` with `geo`.

#### `/koh-samui-diving/` · D4 · HUB
- **Primary keyword:** koh samui diving · **Secondary:** scuba diving koh samui; sail rock diving; padi open water koh samui; discover scuba koh samui; diving koh tao from samui
- **Title tag:** Koh Samui Diving 2026: Sail Rock, Koh Tao & Courses · **Meta description:** Diving from Koh Samui in 2026: Sail Rock day trips from ~4,650 THB, Koh Tao sites, courses, seasons, dive insurance and the recompression chamber. Local advice.
- **H1:** Koh Samui Diving: Sail Rock, Koh Tao and Courses (2026)
- **Answer-first lead:** Samui is a departure point rather than a dive destination. The main sites are Sail Rock (between Samui and Phangan), the Koh Tao sites and Ang Thong. A two-dive Sail Rock day from Samui costs from ~4,650 THB [S]. An Open Water course started from Samui with two nights on Koh Tao costs ~18,000 THB, against ~14,000 if you start on Tao [S]. The season runs February–October, with the clearest water March–April.
- **Section outline (H2 → H3):** Note: guide side only. The product grid appears when a partner is confirmed (I2); until then CTA = Enquire on WhatsApp.
  1. **Map of dive sites and departure piers**.
  2. **Diving from Samui or from Koh Tao?**: table of cost, boat time and dives per day. Answer: Tao for courses, Samui for one Sail Rock day.
  3. **Sail Rock**: pinnacle between Samui and Phangan; trip timing 08:00 pickup, 09:00 departure, back ~15:30, gear, lunch and insurance included (one operator [S]); features and whale-shark season [check with 2 dive shops].
  4. **Koh Tao dive sites**: name only sites confirmed by 2 sources [check]; boat time from Samui 1.5–2 h.
  5. **Diving in Ang Thong**: season Feb–Oct; clearest Mar–Apr; park fee 300/150; closed 1 Nov–15 Dec.
  6. **Diving around Samui itself**: be honest that it is limited [check which shore sites, if any, are worth listing].
  7. **Courses**. H3s: Discover Scuba · Open Water (18,000 from Samui incl. 2 nights on Tao vs 14,000 on Tao [S]) · Advanced · Refresher. Samui-based course prices [check 2+ shops].
  8. **Fun-dive packages** (5 dives + 1 night on Tao from Samui ~10,500 [S]).
  9. **When to dive**: month table (visibility, sea state, Oct–Dec crossings).
  10. **How to choose a dive centre**: checklist (agency centre number, instructor ratio, insurance, gear condition, no pressure to dive in bad conditions).
  11. **Medical, insurance and flying after diving**: fitness questionnaire; "no flying for at least 18 h after repeat dives" (DAN guidance [check]); travel insurance must cover diving (link `/koh-samui-travel-insurance/`).
  12. **Recompression chamber**: SSS Network, 34/8 Moo 4, Bophut; office +66 77 427 427; 24 h +66 81 081 9555 [S]. **Confirm the address and the 24-h number before publishing.**
  13. **Diving etiquette and reef care**.
  14. **Koh Samui diving: questions and answers**.
  15. **Not a diver? Snorkel instead** (→ snorkelling, Koh Tao trip).
- **Map (Leaflet POIs + filter chips):** Sail Rock, Koh Tao (Mae Haad), Koh Nang Yuan, Ang Thong, Bangrak piers, SSS chamber [GPS: take from Google Maps for each]. Chips: Dive sites · Piers · Medical.
- **Tables / data blocks:** Samui vs Tao comparison · course price table [check] · month table · dive-centre checklist box · emergency box (1669, chamber).
- **FAQ (exact questions, 5–12):** Is Koh Samui good for diving? · How much is a Sail Rock dive trip from Koh Samui? · Should I learn to dive on Koh Samui or Koh Tao? · How long does an Open Water course take? · When is the best time to dive around Koh Samui? · Can you see whale sharks at Sail Rock? · Is there a recompression chamber on Koh Samui? · How long after diving can I fly? · Can I dive in November?
- **Money links · Supporting guides · Sister-site link:** Koh Tao & Nang Yuan day trip (2,200) · Ang Thong speedboat (1,800) · Private speedboat (dive-charter enquiries) · future dive products. Supporting: snorkelling, Koh Tao, sea conditions, hospitals, travel insurance. Sister: none.
- **Images needed:** diver at a pinnacle (licensed) · dive boat at Sail Rock · Open Water class in a shallow bay · Koh Tao Mae Haad pier · gear check on deck · whale shark (licensed, only if a sighting season is verified) · Ang Thong underwater · recompression chamber exterior (if permitted).
- **Word target:** 4,000 (K1 pillar)
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `TouristAttraction` (dive sites, `geo` once verified).

#### `/koh-samui-waterfalls/` · D4 · HUB
- **Primary keyword:** koh samui waterfalls · **Secondary:** waterfall koh samui; best waterfall koh samui; na muang waterfall; hin lad waterfall; swimming waterfall samui
- **Title tag:** Koh Samui Waterfalls 2026: Na Muang, Hin Lad & More · **Meta description:** Every Koh Samui waterfall worth the drive: Na Muang 1 and 2, Hin Lad, fees, walks, when they flow, a map and a day plan. Free entry; parking 20–60 THB.
- **H1:** Koh Samui Waterfalls: Na Muang, Hin Lad and Every Fall Worth the Trip (2026)
- **Answer-first lead:** Samui has three waterfalls worth the drive. Na Muang 1 is free and has a swimmable pool. Na Muang 2, further up the same road, is a 20–40 minute steep climb with ropes. Hin Lad near Nathon is a jungle walk of about two hours. All are fullest October–January and thin to a trickle February–April. Parking at Na Muang costs 20 THB for a scooter and 60 THB for a car.
- **Section outline (H2 → H3)** (16 H2s, matching the twin):
  1. **Map of the waterfalls and viewpoints**.
  2. **Koh Samui waterfalls compared**.
  3. **Na Muang 1: the easy swim** (9.4668, 99.9838; free; 09:00–17:00; pool).
  4. **Na Muang 2: the climb** (9.4723, 99.9905; 09:00–18:00; left-hand jungle path; 20–40 min steep with ropes; busy by ~10:30). H3: Footwear and ropes.
  5. **Hin Lad and the forest temple** (9.5205, 99.9556; ~2 km south of Nathon; 30–45 min between tiers; ~2 h in total; fee and hours not published [check]).
  6. **Smaller falls and jungle pools**: list only places verified on a field visit [check]. Note that zipline and ATV tours include "waterfall walks"; don't name an unverified fall.
  7. **When the waterfalls have water**: rainfall table from O7.
  8. **Fees, hours and parking**.
  9. **How to get there**: inland roads, no songthaew route [check]; the scooter warning for steep roads.
  10. **A waterfall and temple day plan**: Na Muang 1 swim (09:00) → Na Muang 2 → Wat Khunaram → Secret Buddha Garden (4x4) → Hin Ta & Hin Yai at 17:00.
  11. **Jungle tours that include waterfalls**: 4x4 safari (market ~1,700, 7 h incl. lunch and entries), ATV, zipline (enquiry pages).
  12. **Elephant camps near Na Muang: our view**. The Na Muang road has elephant attractions; the old Namuang Safari Park address now trades as Samui Elephant Kingdom, and legacy listings mention riding [U]. Recommend only `/koh-samui-elephant-sanctuary/`. Parking tip: use the waterfall's own car park, not the first lot by the elephant camp.
  13. **Safety at the waterfalls**: slippery rock; flash floods after heavy rain Oct–Dec; no jumping; mosquitoes and dengue; valuables. H3: What to bring.
  14. **Koh Samui waterfalls: questions and answers**.
  15. **Waterfalls in the morning, the sea in the afternoon** (CTA: Pig Island afternoon departure [check times]).
  16. **More from the Koh Samui guide**.
- **Map (Leaflet POIs + filter chips):** Na Muang 1 and 2, Hin Lad, Wat Khunaram 9.4495, 100.0004, Secret Buddha Garden 9.4829, 99.9945, Overlap Stone 9.4597, 100.0301, Hin Ta & Hin Yai 9.4522, 100.0395. Chips: Waterfalls · Viewpoints · Temples nearby.
- **Tables / data blocks:** Compare: Waterfall · Area · Walk · Fee · Swim · Best for. Rain-by-season: Months · Rain mm · Waterfalls. Day-plan timeline.
- **FAQ (exact questions, 5–12):** What is the best waterfall on Koh Samui? · Is Na Muang waterfall free? · Can you swim at Na Muang waterfall? · How hard is the walk to Na Muang 2? · When do Koh Samui's waterfalls have the most water? · How do I get to Na Muang without a scooter? · Is Hin Lad waterfall worth it? · Are the waterfalls open in the rainy season?
- **Money links · Supporting guides · Sister-site link:** Jungle safari `/koh-samui-jungle-safari/` (enquiry) · Pig Island speedboat (1,450) · Zipline `/koh-samui-zipline/` (enquiry). Supporting: hiking, temples, Na Muang place page, Hin Lad, Secret Buddha Garden. Sister: kohphangan.com/koh-phangan-waterfalls/.
- **Images needed:** Na Muang 1 pool with swimmers · Na Muang 2 cascade · rope section on the NM2 trail · Hin Lad tier · Wat Namtok Hin Lad gate · trickle in dry season (honest) · parking area signage · day-plan collage.
- **Word target:** 3,000 (twin ~3,000)
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `TouristAttraction` with `geo`.

#### `/koh-samui-hiking/` · D4 · GUIDE
- **Primary keyword:** koh samui hiking · **Secondary:** koh samui viewpoints; best viewpoint koh samui; hikes on koh samui; lad koh viewpoint; khao hua jook chedi
- **Title tag:** Koh Samui Hiking & Viewpoints 2026: Walks and Views · **Meta description:** Koh Samui hikes and viewpoints that are worth the sweat: Na Muang 2, Hin Lad, Overlap Stone, Khao Hua Jook and Lad Koh, with times, fees, heat and safety tips.
- **H1:** Koh Samui Hiking and Viewpoints: 12 Walks and Lookouts (2026)
- **Answer-first lead:** Samui is hilly (Khao Pom reaches 635 m) but has few marked trails. The rewarding walks are short climbs to waterfalls (Na Muang 2 at 20–40 min; Hin Lad at ~2 h return) and viewpoints (Khao Hua Jook Chedi above Chaweng, Overlap Stone at ~300 THB, the Secret Buddha Garden), plus free roadside lookouts like Lad Koh. Start before 10:00, and expect slippery trails October–December.
- **Section outline (H2 → H3):**
  1. **Map of walks and viewpoints**.
  2. **Walks and viewpoints compared** (table).
  3. **Viewpoints you can drive to**. H3s: Lad Koh (free, 24 h, 10-min stop) · Khao Hua Jook Chedi (9.5371, 100.0589 [S]) · Chaweng Lake viewpoint (best 08:00–10:00 [S]; GPS not verified) · Big Buddha platform · Laem Sor and Khao Chedi.
  4. **Short hikes**. H3s: Na Muang 2 (20–40 min, ropes) · Hin Lad (30–45 min between tiers; ~2 h) · Overlap Stone (~500 m, suspension bridge, ~300 THB incl. soft drink [S]) · Khao Chedi near Laem Sor [check route].
  5. **The highlands: Secret Buddha Garden and the central ridge**: steep road, 4x4 advised. Khao Pom 635 m: **no public trail verified, so publish no route without a field check**.
  6. **Beach and headland walks**: Choeng Mon to Koh Fan Noi on the low-tide sandbar (check the tide; don't get cut off [check]); others [field-check].
  7. **Guided jungle treks and 4x4 tours** (enquiry pages).
  8. **The Samui Trail race**: ITRA-rated, 15/25/55 km; the 2025 edition ran 8–9 Nov; 2026 date [U].
  9. **Best time and heat**: month table; highs 29–33 °C; sunrise time from the Open-Meteo daily feed.
  10. **Safety on the trails**: carry 2 L of water; heat; slippery rock after rain; stray dogs [check]; snakes; tell someone your route; 1669. Lad Koh: a tourist was swept off the rocks in Nov 2024, so stay off them in surf.
  11. **What to wear and bring**.
  12. **Sunrise and sunset viewpoints** (→ sunset page).
  13. **Koh Samui hiking: questions and answers**.
  14. **The best view of all is at sea**: CTA for the Ang Thong viewpoint climb on Koh Wua Talab (20–30 min staircase).
- **Map (Leaflet POIs + filter chips):** Lad Koh 9.4990, 100.0600 · Khao Hua Jook 9.5371, 100.0589 · Overlap Stone · Na Muang 2 · Hin Lad · Secret Buddha Garden · Big Buddha 9.5708, 100.0598 · Laem Sor 9.4117, 99.9690 · Pra Buddha Dipankara 9.5020, 100.0060 [S]. Chips: Drive-up · Short hike · Half day · Sunrise · Sunset.
- **Tables / data blocks:** Compare: Name · Type · Walk time · Difficulty · Fee · Best light. What-to-bring checklist.
- **FAQ (exact questions, 5–12):** Where is the best viewpoint on Koh Samui? · Are there marked hiking trails on Koh Samui? · Can you hike to Khao Pom, the highest point? · Is the Lad Koh viewpoint safe? · How do I get to Khao Hua Jook Chedi? · Is Overlap Stone worth the entrance fee? · What is the best time of day to hike on Samui? · Do I need a guide to hike on Koh Samui?
- **Money links · Supporting guides · Sister-site link:** Ang Thong speedboat (1,800; closure logic) · Jungle safari (enquiry) · Pig Island speedboat (1,450). Supporting: waterfalls, sunset spots, Overlap Stone, Lad Koh, Secret Buddha Garden, weather. Sister: angthongmarinepark.com (Wua Talab viewpoint).
- **Images needed:** Lad Koh view over Chaweng Noi bay · Khao Hua Jook Chedi · Overlap Stone suspension bridge · Na Muang 2 rope trail · Hin Lad forest path · Secret Buddha Garden sculptures · sunrise over Chaweng from a hill · hiker with water and proper shoes.
- **Word target:** 3,000 (twin 2,709 measured)
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `TouristAttraction` with `geo`.

#### `/koh-samui-sunset-spots/` · D4 · GUIDE
- **Primary keyword:** koh samui sunset · **Secondary:** best sunset koh samui; sunset spots koh samui; where to watch sunset koh samui; sunset bar koh samui (context only; "sunset cruise" belongs to the money page)
- **Title tag:** Koh Samui Sunset Spots 2026: 12 Best Places to Watch · **Meta description:** Where to watch the sunset on Koh Samui: Taling Ngam, Lipa Noi, Nathon pier, Bang Por and the north coast, plus today's sunset time and boats at golden hour.
- **H1:** Koh Samui Sunset Spots: 12 Places to Watch the Sun Go Down (2026)
- **Answer-first lead:** The sun sets on Samui's west and north-west coasts: Taling Ngam (behind the Five Islands), Lipa Noi, Nathon pier and Bang Por. On the north coast, Bophut and Big Buddha Beach look across to Koh Phangan as the sky colours. Chaweng and Lamai face sunrise, not sunset. Sunset falls at roughly 18:00–18:45 depending on the month [check against a sunset table]; the live time is shown below.
- **Section outline (H2 → H3):**
  1. **Sunset time today**: live widget from the Open-Meteo daily `sunset`, Samui coordinates.
  2. **Map of sunset spots**.
  3. **Sunset spots compared** (table).
  4. **West coast**. H3s: Taling Ngam and the Five Islands · Lipa Noi · Nathon pier (free) · Laem Yai · Bang Por.
  5. **North coast**. H3s: Bophut and Fisherman's Village (view to Phangan) · Bang Rak and Big Buddha.
  6. **Sunset from the sea**: shared catamaran sunsets leave the west coast ~16:30–17:00 [S]; our Pig Island Sunset Tour (1,550, 5–6 h, dinner); private boat. Answer: a boat beats a bar on clear Feb–Apr evenings.
  7. **Hilltop and rooftop sunsets**: hotel sky bars as context only (Air Bar at the InterContinental 17:00–22:00; Jahn at the Conrad; Woobar at the W [S]). No links.
  8. **Sunset bars on the sand**: names from a single undated source (Beryl Bar, Laem Yai; The Island View, Lipa Noi; LaJava, Thong Krut, closed Wed; L'Ananas). **Verify each on site before naming.**
  9. **Prefer sunrise?**: Chaweng, Lamai, Silver Beach, Lad Koh, Choeng Mon.
  10. **Best months for sunsets**: Feb–Apr clearest; Oct–Dec cloud and rain.
  11. **Getting back after dark**: west-coast taxis are scarce and Grab weak; songthaews stop 20:00–22:00; Route 4170 is steep and slippery when wet. Book a return driver.
  12. **Sunset photo tips**.
  13. **Koh Samui sunsets: questions and answers**.
- **Map (Leaflet POIs + filter chips):** Taling Ngam 9.4554, 99.9347 · Lipa Noi 9.5007, 99.9344 · Laem Yai 9.5696, 99.9163 · Bang Por 9.5781, 99.9369 · Bophut 9.5611, 100.0280 · Bang Rak 9.5572, 100.0533 · Big Buddha · Nathon pier [GPS: take]. Chips: Beach · Pier · Bar · Boat departure · Sunrise.
- **Tables / data blocks:** Spot · Coast · Free/paid · Swim there too? · Getting back. Month table of cloud and rain.
- **FAQ (exact questions, 5–12):** Where is the best sunset on Koh Samui? · Can you see the sunset from Chaweng? · What time is sunset on Koh Samui? · Is a sunset cruise worth it? · Which beach has both a sunset and good swimming? · How do I get back from the west coast after sunset? · What is the best month for sunsets on Samui? · Can I watch the sunset at the Big Buddha?
- **Money links · Supporting guides · Sister-site link:** Sunset cruise `/koh-samui-sunset-cruise/` · Pig Island Sunset Tour `/product/pig-island-sunset-tour/`† (1,550) · Catamaran charter `/koh-samui-catamaran-charter/` · Private speedboat. Supporting: beaches, Taling Ngam, Lipa Noi, Nathon, getting around. Sister: none.
- **Images needed:** Five Islands silhouette from Taling Ngam · Lipa Noi at low-tide sunset · Nathon pier fishermen at dusk · catamaran under sail at golden hour · Bophut dusk with Phangan · Big Buddha at sunset · Bang Por seafood tables at dusk · Chaweng sunrise (contrast).
- **Word target:** 2,200
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `TouristAttraction` with `geo`.

#### `/koh-samui-temples/` · D4 · HUB
- **Primary keyword:** koh samui temples · **Secondary:** temples in koh samui; best temple koh samui; temple dress code thailand; wat koh samui; koh samui chinese temple
- **Title tag:** Koh Samui Temples 2026: 12 Wats, Shrines & Dress Code · **Meta description:** Koh Samui temples worth visiting: Big Buddha, Wat Plai Laem, the mummified monk, the Red Temple, Laem Sor and Chinese shrines, plus dress code and festivals.
- **H1:** Koh Samui Temples: Wats, Shrines and Etiquette Guide (2026)
- **Answer-first lead:** The five essential temples are Big Buddha (Wat Phra Yai) and Wat Plai Laem in the north-east, Wat Khunaram with its mummified monk and the carved Red Temple (Wat Sila Ngu) in the south-east, and the gold seafront chedi at Laem Sor. All are free, mostly open 07:00–18:00. Cover shoulders and knees, and take your shoes off inside the halls.
- **Section outline (H2 → H3):**
  1. **Map of Koh Samui's temples and shrines**.
  2. **Koh Samui temples at a glance** (table).
  3. **The best Koh Samui temples to visit**. H3s, 80–200 words each, linking to the place page where one exists: Big Buddha (free, 07:00–18:30; don't state the height, since 12 m and 15 m both circulate [U]) · Wat Plai Laem (built 2004–09; 18-armed Guanyin; laughing Buddha Phra Sangkachai) · Wat Khunaram (Luang Pho Daeng, died 1970s, in a glass case) · Wat Ratchathammaram / Wat Sila Ngu, the Red Temple (07:00–17:00, carved reliefs) · Laem Sor Pagoda and Khao Chedi (07:00–18:00) · Guan Yu Shrine (16 m bronze, 09:00–17:00) · Chinese Temple of Guanyin, Taling Ngam (9.4212, 99.9479 [S]) · Wat Samret (over 150 years old [S]) · Pra Buddha Dipankara (9.5020, 100.0060 [S]) · Wat Namtok Hin Lad (forest temple at the waterfall) · Khao Hua Jook Chedi (hilltop chedi above Chaweng) · Secret Buddha Garden (a sculpture garden, not a temple; 80–100 THB [U]).
  4. **Chinese shrines and Samui's Hainanese heritage**: Nathon Hainan Shrine; San Chao Jao Eng Sae in Maenam; Chinese New Year on Sat 6 Feb 2027.
  5. **The mosque at Hua Thanon**: Koh Samui Central Mosque (Masjid Nurul Ihsan, built 1984); dress; prayer times; Friday prayers.
  6. **Temple etiquette and dress code**. H3s: What to wear (sarong loan or hire [check at each temple]) · How to behave (feet, head, never climb on or pose disrespectfully with Buddha images) · Monks and women (women don't touch monks or hand them things directly) · Making merit and donations.
  7. **Buddhist festivals at Samui temples, Nov 2026 to Dec 2027** (table).
  8. **Alcohol-ban days and what stays open**: the hotel and licensed-bar exemption; 7-Eleven doesn't sell.
  9. **Meditation and temple life** (→ meditation page).
  10. **Two half-day temple routes**. North-east: Big Buddha → Wat Plai Laem → Khao Hua Jook. South: Hin Ta & Hin Yai → Red Temple → Guan Yu → Wat Khunaram → Laem Sor.
  11. **Getting there and parking**.
  12. **Koh Samui temples: questions and answers**.
  13. **Add a boat trip to your stay**.
- **Map (Leaflet POIs + filter chips):** every temple with O13 GPS; Hua Thanon mosque [GPS: take]; Nathon Hainan shrine and San Chao Jao Eng Sae [GPS: take]. Chips: Buddhist temple · Chinese shrine · Mosque · Viewpoint chedi.
- **Tables / data blocks:** At a glance: Temple · Area · Hours · Fee · Best for. Festivals: Festival · 2026/27 date · Where on Samui · What happens. Rows: Loy Krathong Tue 24 Nov 2026 (Chaweng Lake, Big Buddha; **sky lanterns banned on Samui**; eco krathong) · Makha Bucha Sun 21 Feb 2027 · Visakha Bucha Thu 20 May 2027 · Asahna Bucha Sun 18 Jul 2027 [U] · Khao Phansa Mon 19 Jul 2027 [U] · Sart Duean Sip ~Thu 30 Sep 2027 [U] · Ok Phansa ~Fri 15 Oct 2027 [U] · Chak Phra / Thod Pha Pa procession to Nathon pier, ~9 days around Ok Phansa [U] · CNY Sat 6 Feb 2027.
- **FAQ (exact questions, 5–12):** Which temple should I visit on Koh Samui? · Is the Big Buddha free to visit? · What should I wear to temples on Koh Samui? · Can I see the mummified monk? · Where is the Red Temple? · Are Koh Samui temples open every day? · Can I take photos inside temples? · Can women visit temples and speak to monks? · When is Loy Krathong on Koh Samui? · Can I join a meditation session at a temple?
- **Money links · Supporting guides · Sister-site link:** Jungle safari (includes Wat Khunaram, Secret Buddha Garden, Big Buddha; enquiry) · Pig Island speedboat (pairs with the south route) · Ang Thong speedboat (closure logic). Supporting: Thai culture, meditation, each temple place page, Loy Krathong event. Sister: kohphangan.com/koh-phangan-temples/.
- **Images needed:** Big Buddha from the causeway · 18-armed Guanyin at Wat Plai Laem · Red Temple relief detail · Laem Sor chedi at the shoreline · Guan Yu statue · Chinese Temple of Guanyin, Taling Ngam · respectful visitors in sarongs, shoes off · krathong on Chaweng Lake (eco) · mosque at Hua Thanon (exterior, permission).
- **Word target:** 3,200 (twin ~3,000)
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `PlaceOfWorship` with `geo`.

#### `/islands-near-koh-samui/` · D4 · HUB
- **Primary keyword:** islands near koh samui · **Secondary:** island hopping koh samui; day trips from koh samui by boat; koh samui island tour; best island trip from koh samui
- **Title tag:** Islands Near Koh Samui 2026: 10 Boat Trips Compared · **Meta description:** Islands near Koh Samui compared: Ang Thong, Pig Island, Koh Tan, Koh Tao, Nang Yuan, Koh Phangan and Koh Rap, with boat times, fees, seasons and our prices.
- **H1:** Islands Near Koh Samui: Every Boat Trip Compared (2026)
- **Answer-first lead:** The four best island trips from Samui are Ang Thong Marine Park (42 islands, ~30 km west; closed 1 Nov–15 Dec), Koh Madsum (Pig Island) and Koh Tan from Thong Krut (~30 min, bookable every day), Koh Tao with Koh Nang Yuan (1.5–2 h) and Koh Phangan (20–50 min). Tour boats always return to Samui: there is no one-way island hopping on day tours.
- **Section outline (H2 → H3):**
  1. **Map of the islands around Samui**.
  2. **Islands compared** (table).
  3. **Ang Thong Marine Park** (300/150 THB park fee; Emerald Lake; viewpoint).
  4. **Koh Madsum (Pig Island)** (~50 THB landing fee).
  5. **Koh Tan** (best snorkelling of the southern pair).
  6. **Koh Rap and the pink dolphins** (Pink Dolphins & Pig Island 2,250 THB, ~6 h; where the dolphins are seen [check]).
  7. **The Five Islands (Koh Ha) off Taling Ngam**: landing rules [check]; seen at sunset.
  8. **Koh Tao and Koh Nang Yuan** (250 THB Nang Yuan fee; bans on plastic bottles, fins and drones).
  9. **Koh Phangan** (Full Moon Party; one link to the sister site lives on `/koh-phangan/`, not here).
  10. **Koh Som, Koh Fan and Koh Fan Noi**: the charter itinerary "Koh Som & Tongson Bay"; Koh Fan is Big Buddha's islet; Koh Fan Noi is the Choeng Mon sandbar islet.
  11. **Shared tour or private boat?**: decision table; private from 19,000 THB/boat (PP 30 ft, 8 guests max).
  12. **Island-hopping rules and ferries**: no one-way on tour boats; for multi-island travel use the ferries (→ `/koh-samui-to-koh-phangan/`, `/koh-samui-to-koh-tao/`).
  13. **Best season by island** (table).
  14. **Seasickness, safety and weather cancellations**: we cancel when it isn't safe, and you choose a full refund or a new date.
  15. **Islands near Koh Samui: questions and answers**.
- **Map (Leaflet POIs + filter chips):** islands and departure piers (Thong Krut, Bangrak piers, Big Buddha pier, Nathon) [GPS: take for each]. Chips: Day trip · Snorkelling · Wildlife · Party island · Private charter.
- **Tables / data blocks:** Compare: Island · Boat time from Samui · Fee (cash) · Best for · Season · Our trip from (THB). Season table: Island × Jan–Dec traffic-light, Ang Thong grey 1 Nov–15 Dec.
- **FAQ (exact questions, 5–12):** Which island trip from Koh Samui is best? · Can you visit Ang Thong in November? · What is the closest island to Koh Samui? · Can I island-hop from Samui to Phangan and Koh Tao on one tour? · Is Pig Island worth it? · How long is the boat to Koh Tao? · Do I pay island fees on top of the tour price? · Is a private boat worth it for a family? · Which boat trips run in the rainy season?
- **Money links · Supporting guides · Sister-site link:** Ang Thong speedboat (1,800) · Pig Island speedboat (1,450) · Koh Tao & Nang Yuan (2,200) · Private speedboat (from 19,000). Supporting: Ang Thong guide, Pig Island guide, Koh Tan, Koh Tao, Koh Phangan, speedboat vs big boat, sea conditions. Sister: angthongmarinepark.com.
- **Images needed:** Ang Thong from the Wua Talab viewpoint · pigs on the Koh Madsum beach · Koh Tan reef · Nang Yuan sandbars from above · Haad Rin (Phangan) from a boat · Five Islands at sunset · private speedboat underway · longtail at Thong Krut.
- **Word target:** 3,000
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `TouristAttraction`/`Place` with `geo`.

#### `/ang-thong-marine-park/` · D4 pillar with D5 at-a-glance · GUIDE
- **Primary keyword:** ang thong marine park · **Secondary:** ang thong national marine park; ang thong emerald lake; ang thong viewpoint; ang thong park fee; ang thong closed november; ang thong overnight
- **Title tag:** Ang Thong Marine Park 2026: Guide, Fees & Closure Dates · **Meta description:** Ang Thong National Marine Park from Koh Samui: Emerald Lake, the viewpoint, kayaking, the 300 THB fee, the 1 Nov–15 Dec closure and every way to visit.
- **H1:** Ang Thong National Marine Park: The Complete Guide from Koh Samui (2026)
- **Answer-first lead:** Ang Thong National Marine Park is 42 islands about 30 km west of Samui. A day trip covers the Emerald Lake on Koh Mae Ko, the viewpoint on Koh Wua Talab (a 20–30 min staircase), kayaking and snorkelling. The park fee is 300 THB per foreign adult and 150 per child, in cash. **The park closes every year from 1 November to 15 December, and the season reopens 16 December.**
- **At-a-glance box:** Area: ~30 km W of Samui, 42 islands, park ~102 km² of which islands ~18 km² [S] · GPS: HQ Koh Wua Talab [GPS: take from Google Maps] · Hours: 08:00–17:00 · Fee: 300 adult / 150 child (3–14 and under 140 cm), under-3s free, Thai 40/20, cash · Best time: Feb–Apr; closed 1 Nov–15 Dec; ad-hoc storm closures · Time needed: ~8 h by speedboat, ~10 h by big boat, or overnight · Dress: swimwear plus shoes with grip for the viewpoint · Pickup: from most areas of Koh Samui (+400 THB pp return from remote areas).
- **Section outline (H2 → H3):**
  1. **Closure banner** (date logic): "Season reopens 16 December. Book now for later dates", plus a Pig Island + Koh Tao block.
  2. **Ang Thong at a glance** (box).
  3. **Map of Ang Thong Marine Park**.
  4. **What you see on a day trip**. H3s: Emerald Lake (Thale Nai) on Koh Mae Ko (no swimming in the lake [check DNP rule]) · Koh Wua Talab viewpoint (20–30 min staircase) · Kayaking · Snorkelling at Koh Wao · Lunch stop (Koh Paluay on many itineraries [S]).
  5. **Ways to visit compared**: speedboat 1,800 (~8 h) · big boat 1,500 (~10 h) · **VIP 4,500: 15 guests on a big speedboat** · overnight tent 3,600 · overnight bungalow 4,200 · private speedboat 33,000/boat. **Do not state guest numbers for the shared tours.** Link `/ang-thong-speedboat-vs-big-boat/`.
  6. **A typical day, hour by hour**: 07:30–08:30 hotel pickup · ~09:00 pier briefing · Mae Ko / Emerald Lake · Wua Talab viewpoint · kayak · snorkel · lunch · ~16:00–16:30 back at the pier · 16:30–17:00 hotel drop-off.
  7. **Park fees and rules**: cash only; no feeding wildlife; reef-safe sunscreen [check]; drones need a permit [check]; take all litter back.
  8. **Staying overnight in the park**: Wua Talab bungalows 600–1,500 THB, camping 80 pp [S]; the DNP online booking system was down in 2026 [S]; our overnight tours handle bookings ("we take care of everything"; the bungalow option has very clean bathrooms).
  9. **When to go**: month table; closure; storm closures (e.g. 3–5 Jan 2019, Pabuk).
  10. **Sea conditions and seasickness**: link the live sea widget; the rule that the boat returns to the island it left from.
  11. **Wildlife and landscape** [check species list against DNP or thainationalparks before writing].
  12. **A short history of the park** [check: year declared, meaning of the name, the link to *The Beach* novel; publish only what is verified].
  13. **What to bring**.
  14. **Children, pregnancy and mobility**: the viewpoint is steep; children's life jackets are always provided and worn.
  15. **Cancellation policy**: Ang Thong tours get a full refund 48 h or more before, none under 48 h or for a no-show; operator weather cancellations get a full refund or a new date (verbatim sitewide text, linking to Terms).
  16. **Ang Thong Marine Park: questions and answers**.
  17. **Closed? Go south instead** (Pig Island, Koh Tao).
- **Map (Leaflet POIs + filter chips):** Koh Wua Talab HQ and viewpoint, Koh Mae Ko and Emerald Lake, Koh Wao, Koh Paluay, our Samui departure pier [GPS: take; confirm the pier with Mea]. Chips: Viewpoints · Swim and snorkel · Kayak · Overnight · Pier.
- **Tables / data blocks:** Product comparison: Option · Boat · Duration · Price · Best for. Fee table. Month table. Itinerary timeline. Closure date logic block.
- **FAQ (exact questions, 5–12):** Is Ang Thong Marine Park open in November? · When does Ang Thong reopen after the monsoon closure? · How much is the Ang Thong park fee? · Is the park fee included in the tour price? · Should I go by speedboat or big boat? · How long is the boat ride from Koh Samui? · Can you swim in the Emerald Lake? · How hard is the viewpoint climb? · Can you stay overnight in Ang Thong? · Is Ang Thong suitable for children? · What happens if the trip is cancelled for bad weather? · What is the best month to visit Ang Thong?
- **Money links · Supporting guides · Sister-site link:** Speedboat `/product/ang-thong-marine-park-day-tour-koh-samui/` (1,800) · Big boat `/product/ang-thong-big-boat-tour-koh-samui/` (1,500) · VIP `/product/ang-thong-vip-tour-koh-samui/` (4,500) · Overnight bungalow `/product/ang-thong-overnight-bungalow-koh-samui/` (4,200); chip for private `/product/ang-thong-private-speedboat-koh-samui/` (33,000). Supporting: speedboat vs big boat, sea conditions, weather, islands near Samui, snorkelling. Sister: angthongmarinepark.com.
- **Images needed:** the panorama from Wua Talab · Emerald Lake from the platform · kayaks in a lagoon · snorkellers at Koh Wao · speedboat at the park · big boat deck · overnight bungalows · tent camp at dusk · park-fee ticket (cash) · kids in life jackets · stairs to the viewpoint · closed-season sea (honest).
- **Word target:** 4,500 (K1 pillar)
- **Schema:** Article, BreadcrumbList, FAQPage, `TouristAttraction` (Ang Thong; `geo`; `openingHoursSpecification` with the seasonal closure; `publicAccess`), ItemList of `TouristTrip` linking the products.

#### `/pig-island-koh-samui/` · D4 pillar with D5 at-a-glance · GUIDE
- **Primary keyword:** pig island koh samui · **Secondary:** koh madsum; koh madsum tour; pig island tour samui; koh tan and pig island; thong krut pier
- **Title tag:** Pig Island Koh Samui 2026: Koh Madsum Guide & Tours · **Meta description:** Pig Island (Koh Madsum) from Koh Samui: how to get there from Thong Krut, the 50 THB fee, the pigs, Koh Tan snorkelling and every tour from 1,450 THB.
- **H1:** Pig Island Koh Samui: The Koh Madsum Guide (2026)
- **Answer-first lead:** Pig Island is Koh Madsum, a small island off Samui's south coast, about 30 minutes by boat from Thong Krut pier, known for the pigs that wander its beach. The landing fee is about 50 THB in cash, and most trips add snorkelling at Koh Tan. Tours run every day of the year, weather permitting, which makes this the go-to boat trip while Ang Thong is closed (1 Nov–15 Dec).
- **At-a-glance box:** Area: off the south coast, next to Koh Tan · GPS: Koh Madsum and Thong Krut pier [GPS: take from Google Maps] · Departure: Thong Krut · Boat time: ~30 min · Fee: ~50 THB cash where not included · Hours: daylight; sunset tour 5–6 h · Best time: Jan–Sep; also runs Oct–Dec when the sea allows (the south side sheltered from NE swell [check]) · Time needed: 4–6 h · Footwear: wet landing on sand · Pickup: from most areas of Koh Samui.
- **Section outline (H2 → H3):**
  1. **Pig Island at a glance**.
  2. **Map: Thong Krut, Koh Madsum, Koh Tan and Koh Rap**.
  3. **The pigs: what to expect and how to behave**: don't chase them, lift piglets or feed them junk food or alcohol; supervise children; whether the pigs swim [check: don't claim it unless observed].
  4. **Koh Tan: snorkelling and the village** (→ Koh Tan page).
  5. **Koh Rap and the pink dolphins** [check sighting area].
  6. **Every way to visit** (table with all 10 Pig Island products).
  7. **A typical speedboat trip, hour by hour** [check times with Mea].
  8. **Getting to Thong Krut**: hotel pickup from most areas; self-drive parking at the pier [check]; the rule for guests staying in Thong Krut [ask Mea].
  9. **When to go**: sunset tour; month table; the rainy-season advantage (I3).
  10. **Fees, cash and what's included**.
  11. **What to bring**.
  12. **Children and accessibility**: wading landings; life jackets always provided and worn.
  13. **Safety and weather cancellations**: full refund or a new date; Pig Island is always bookable online, and weather is the only reason a date is withdrawn.
  14. **Is a Pig Island trip ethical?**: honest paragraph; [Local tip: ask Mea about how the pigs are cared for].
  15. **Pig Island: questions and answers**.
  16. **Book a Pig Island trip** (rail).
- **Map (Leaflet POIs + filter chips):** Thong Krut pier, Koh Madsum, Koh Tan, Koh Rap, Five Islands [GPS: take]. Chips: Pier · Pigs · Snorkel · Dolphins · Sunset.
- **Tables / data blocks:** Products: Tour · Boat · Duration · Price (THB) · Includes. Rows: speedboat 1,450 (4–5 h) · small-group longtail 1,750 (~6 h, lunch on Koh Tan) · sunset 1,550 (5–6 h, dinner) · Pink Dolphins & Pig Island 2,250 (~6 h) · private longtail 5,950/boat (up to 8) · private speedboat 11,950/boat (up to 10) · Madsum/Tan/Rap private 8,450/boat (up to 8) · Koh Rap full day private 9,950/boat · Jet Ski Safari 9,950/jet ski · private sailing catamaran (**21,000 vs 27,000: ask Mea, publish neither until confirmed**). Plus a month table and a fees box.
- **FAQ (exact questions, 5–12):** Where is Pig Island on Koh Samui? · How do you get to Pig Island? · How much does a Pig Island tour cost? · Is there an entrance fee for Koh Madsum? · Can you swim with the pigs? · Is Pig Island open in November? · Is it ethical to visit Pig Island? · Speedboat or longtail: which Pig Island tour is better? · Can we book a private Pig Island trip? · Is the Pig Island tour good for kids?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat `/product/pig-island-speedboat-tour/` (1,450) · Sunset `/product/pig-island-sunset-tour/`† (1,550) · Small-group longtail `/product/pig-island-longtail-tour/`† (1,750) · Private speedboat `/product/pig-island-private-speedboat/`† (11,950). Supporting: Koh Tan, Thong Krut, islands near Samui, snorkelling, sea conditions. Sister: pigislandkohsamui.com.
- **Images needed:** pigs on the Koh Madsum sand · speedboat beached at Madsum · longtail at Thong Krut pier · snorkellers at Koh Tan · sunset tour dinner on the beach · family wading ashore · dolphins off Koh Rap (only if our own footage exists) · jet skis in formation · map graphic.
- **Word target:** 4,000 (K1 pillar)
- **Schema:** Article, BreadcrumbList, FAQPage, `TouristAttraction` (Koh Madsum, `geo`), ItemList of `TouristTrip`.

#### `/koh-tan-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** koh tan · **Secondary:** koh taen; koh tan snorkelling; koh tan koh samui; koh tan island
- **Title tag:** Koh Tan, Koh Samui 2026: Snorkelling, Beaches & Trips · **Meta description:** Koh Tan (Koh Taen) next to Pig Island: the best snorkelling of the pair, the quiet village, how to get there from Thong Krut in 30 minutes, and the tours.
- **H1:** Koh Tan, Koh Samui: Snorkelling and Quiet Beaches Next to Pig Island (2026)
- **Answer-first lead:** Koh Tan (Koh Taen) is the larger island beside Koh Madsum (Pig Island), about 30 minutes by boat from Thong Krut on Samui's south coast. It is the better snorkelling stop of the two, and the small-group longtail tour stops there for lunch.
- **At-a-glance box:** Area: south of Thong Krut · GPS: [take from Google Maps] · Hours: daylight · Fee: [check whether a landing fee applies] · Best time: Jan–Sep · Time needed: 1–2 h on a tour · Swimming: snorkel from the beach [check spots] · Pickup: from most areas.
- **Section outline (H2 → H3):** Koh Tan at a glance · Map · Snorkelling at Koh Tan (spots [check]; coral rules) · Beaches and the village (who lives there; accommodation [check]) · How to get there (tours; longtails from Thong Krut) · Koh Tan or Koh Madsum? (table) · When to go · Koh Tan: questions and answers.
- **Map (Leaflet POIs + filter chips):** Koh Tan, Koh Madsum, Thong Krut pier. Chips: Snorkel · Beach · Pier.
- **Tables / data blocks:** Koh Tan vs Koh Madsum: Fee · Snorkelling · Pigs · Facilities · On which tours. Plus "How to get there".
- **FAQ (exact questions, 5–12):** Where is Koh Tan? · How do I get to Koh Tan from Koh Samui? · Is the snorkelling good at Koh Tan? · Can you stay overnight on Koh Tan? · Is there a fee to land on Koh Tan? · Koh Tan or Pig Island: which is better?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat (1,450, includes Koh Tan) · Small-group longtail (1,750, lunch on Koh Tan) · Madsum/Tan/Rap private `/product/three-islands-private-longtail/`† (8,450). Supporting: Pig Island guide, snorkelling, Thong Krut. Sister: pigislandkohsamui.com.
- **Images needed:** Koh Tan beach from the boat · reef fish at Koh Tan · longtail moored · lunch table on Koh Tan · village path · aerial of Tan and Madsum.
- **Word target:** 1,200
- **Schema:** Article, BreadcrumbList, FAQPage, `TouristAttraction` with `geo`.

#### `/white-lotus-koh-samui/`† · D4 · GUIDE
- **Primary keyword:** white lotus koh samui · **Secondary:** white lotus filming locations koh samui; white lotus hotel koh samui; four seasons koh samui white lotus; white lotus season 3 thailand
- **Title tag:** White Lotus Koh Samui: Filming Locations & How to Visit · **Meta description:** Where The White Lotus season 3 was filmed on Koh Samui, what the Four Seasons costs, whether you can visit, and how to see that coast from a private boat.
- **H1:** The White Lotus on Koh Samui: Filming Locations and How to See Them
- **Answer-first lead:** Season 3 of *The White Lotus* (aired February–April 2025) was filmed largely at the Four Seasons Resort Koh Samui, on Laem Yai in the north-west. The resort is private, with rooms from roughly US$1,900 a night (Oct 2026 report). The practical way to see that coast is from the water, on a private boat or a sunset cruise along the north-west and west coasts.
- **Section outline (H2 → H3):**
  1. **What was filmed on Koh Samui**: build this list **only** from HBO, TAT or Thailand Film Office releases [check]; label anything else "reported".
  2. **The Four Seasons Koh Samui**: Laem Yai; rates (SlashFilm: standard ~US$1,900, villas ~$8,500–14,000; Bangkok Post: THB 43,000–320,000 a night). Don't publish the conflicting "from 15,000 THB" figure.
  3. **Can you visit without staying?**: dining or spa reservations only if the resort accepts outside guests [check with the resort]; never trespass; the rule on public beach access [check before stating].
  4. **See the coast by boat**: route Laem Yai → Bang Por → Nathon → Lipa Noi at sunset; private speedboat from 19,000/boat; catamaran; sunset cruise.
  5. **Other filming locations in Thailand**: Bangkok and Phuket scenes, verified items only [check].
  6. **The "White Lotus effect" on Samui**: foreign Songkran 2025 bookings +65% (SiteMinder); online searches for the resort +40%; Minor/Anantara Samui direct bookings +41%.
  7. **Plan a White Lotus-style week on any budget**: wellness (→ retreats, wellness resorts), temples, a boat day.
  8. **Getting to Laem Yai**: far north-west (how-to-get-there table; measure the times).
  9. **Respectful photography and privacy**.
  10. **White Lotus Koh Samui: questions and answers**.
- **Map (Leaflet POIs + filter chips):** Laem Yai beach 9.5696, 99.9163 (beach point only; **don't pin the resort as a destination**), Bang Por, Lipa Noi, boat departure point. Chips: Coast · Sunset · Boat.
- **Tables / data blocks:** Filming facts box (verified only) · price box (sourced ranges) · boat-route table: Leg · Time · What you see.
- **FAQ (exact questions, 5–12):** Where was The White Lotus season 3 filmed? · Which hotel is The White Lotus on Koh Samui? · How much does it cost to stay at the White Lotus hotel? · Can you visit the Four Seasons Koh Samui without staying there? · Can you see the White Lotus resort from a boat? · Were scenes filmed elsewhere in Thailand? · Is Koh Samui really like the show?
- **Money links · Supporting guides · Sister-site link:** Private speedboat (from 19,000) · Sunset cruise · Catamaran charter · Boutique Yachting Day `/product/boutique-yachting-day-koh-samui/` (4,500 pp). Supporting: sunset spots, wellness resorts, where to stay, Songkran event. Sister: none.
- **Images needed:** north-west coastline from a boat (own photo) · Laem Yai bay · catamaran at sunset off the west coast · sea-view villa terrace (generic, licensed, not the resort unless licensed) · Bang Por fishing boats · route map graphic. **No stills from the show and no actors.**
- **Word target:** 1,800
- **Schema:** Article, BreadcrumbList, FAQPage, ImageObject.

---

#### Places to go: area and beach pages

Every place page uses D5 with the shared at-a-glance order (P3.0 rule 7) and the measured "How to get there" table (rule 6). It also carries a "Nearby places" rail of 4–6 place pages and a "Book nearby" block of 2–3 products. Sections are listed in order; the twin for town and area pages is `/thong-sala-koh-phangan/` (15 H2s, 12 FAQ), and for beach and sight pages `/zen-beach-koh-phangan/` (12 H2s, 12 FAQ, 3 tables).

#### `/chaweng-koh-samui/` · D5 · GUIDE
- **Primary keyword:** chaweng koh samui · **Secondary:** chaweng beach; chaweng beach road; staying in chaweng; chaweng lake; chaweng or lamai
- **Title tag:** Chaweng, Koh Samui 2026: Beach, Nightlife & Area Guide · **Meta description:** Chaweng, Koh Samui in 2026: which part of the beach to swim, red-flag months, Central Samui, the walking street, nightlife, traffic and whether to stay here.
- **H1:** Chaweng, Koh Samui: Beach, Nightlife and Area Guide (2026)
- **Answer-first lead:** Chaweng is Samui's busiest beach town, on the east coast 10–15 minutes from the airport. It has the island's best-known stretch of fine white sand, most of its restaurants, bars and shops (Central Samui), and the nightlife around Soi Green Mango and ARKbar. North Chaweng is quieter and best for swimming. October–December brings surf and red flags.
- **At-a-glance box:** Bo Phut subdistrict, east coast · GPS Chaweng North ~9.532, 100.0675 (central [take]) · beach open 24 h · free · best Jan–Sep (calmest Feb–Apr) · base for 2–5 nights · parking hard on Beach Road · swimming good, red flags Oct–Dec · pickup from most areas.
- **Section outline (H2 → H3):** Chaweng at a glance · Map of Chaweng · **The beach: north, central and south** (H3 each; North quietest, gentle slope; Central busiest, with ARKbar and fire shows; South [field-check]) · **Chaweng Lake, Central Samui and the walking street** (Thu–Sat ~16:00/17:00–22:00/23:00; Si Khao market daily 17:00–23:00) · **Eating and nightlife** (→ Chaweng nightlife; Muay Thai at Samui International on Tue/Fri/Sun and Phetchbuncha on Mon/Wed/Sat, no fights Thu) · **Traffic and getting around** (Beach Road congestion; songthaew to Lamai 30–40 local / 50–60 tourist; best Grab coverage on the island; police checkpoints on Chaweng Lake Road; helmet fine up to 2,000 THB) · **Hospitals, banks and services** (Bangkok Hospital Samui near Chaweng Noi; Samui International Hospital at the north end of Beach Road, 24 h ER; Thai International Hospital opposite Lotus's; ATMs 220–250 THB per foreign withdrawal) · **Should you stay in Chaweng?** (mid-range 2,000–4,500, budget 500–950; busy and noisy) · **Safety** (rips Oct–Dec; jet-ski scams; drink spiking; scooters) · **Events in Chaweng** (Songkran water fight on Beach Road from ~12 Apr; Regatta 22–29 May 2027; free NYE countdown at Central Samui; Neon Run) · FAQ.
- **Map (Leaflet POIs + filter chips):** beach sections, Central Samui, Chaweng Lake, walking street, Si Khao market, both stadiums, three hospitals, Khao Hua Jook Chedi 9.5371, 100.0589 [take the rest]. Chips: Beach · Food & markets · Nightlife · Medical · Viewpoint.
- **Tables / data blocks:** Beach sections (Section · Vibe · Swimming · Best for) · services (Service · Where · Notes) · How to get there.
- **FAQ (exact questions, 5–12):** Is Chaweng the best area to stay on Koh Samui? · Which part of Chaweng Beach is best? · Can you swim at Chaweng in November? · How far is Chaweng from the airport? · How much is a taxi from the airport to Chaweng? · When is the Chaweng walking street? · Is Chaweng too noisy for families? · Where is the nearest hospital to Chaweng? · Chaweng or Lamai: which is better?
- **Money links · Supporting guides · Sister-site link:** Ang Thong speedboat (closure logic) · Pig Island speedboat · FMP shared speedboat `/product/full-moon-party-speedboat-koh-samui/` (1,400). Supporting: Chaweng nightlife, beaches, where to stay, walking streets, Chaweng Noi. Sister: none.
- **Images needed:** Chaweng North morning · central beach at sunset glow · Beach Road at night · Chaweng Lake · walking-street stalls · Central Samui exterior · red-flag day · Khao Hua Jook view.
- **Word target:** 2,500 (parity floor, P0.2; was 1,800) (reference only; see precedence rule 5)
- **Schema:** Article, BreadcrumbList, FAQPage, `Beach` + `Place` with `geo`.

#### `/chaweng-noi-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** chaweng noi · **Secondary:** chaweng noi beach; chaweng noi snorkelling; quiet beach near chaweng
- **Title tag:** Chaweng Noi Beach, Koh Samui 2026: Quiet Cove Guide · **Meta description:** Chaweng Noi, the quiet cove just south of Chaweng: swimming, snorkelling off the rocks, sea lice, public access, where to eat and what's nearby. Updated 2026.
- **H1:** Chaweng Noi Beach, Koh Samui: The Quiet Cove Next to Chaweng (2026)
- **Answer-first lead:** Chaweng Noi is the small cove just south of Chaweng's rocky point. It is quieter and mostly resort frontage, with coarser sand, snorkelling off the rocks and occasional sea lice, and it is a few minutes' drive from Chaweng's restaurants. Expect red flags October–December.
- **At-a-glance box:** east coast · 9.5082, 100.0565 · 24 h · free · Jan–Sep · 2–4 h · limited parking [check public access points] · swimming good in season · pickup from most areas.
- **Section outline (H2 → H3):** At a glance · Map · Beach, swimming and snorkelling (sea lice explained) · Getting onto the beach (public access paths [check]) · Staying in Chaweng Noi (hillside villas; steep roads) · Nearby (Lad Koh viewpoint, Coral Cove, Silver Beach; Samui Elephant Sanctuary's Chaweng Noi site, welfare-listed → elephant page; Vikasa) · How to get there · FAQ.
- **Map:** Chaweng Noi, Lad Koh 9.4990, 100.0600, Coral Cove, Bangkok Hospital Samui [take]. Chips: Beach · Viewpoint · Snorkel.
- **Tables / data blocks:** Chaweng vs Chaweng Noi table · How to get there.
- **FAQ:** Is Chaweng Noi better than Chaweng? · Can you swim at Chaweng Noi? · How do I get onto Chaweng Noi beach if I'm not staying there? · Is there snorkelling at Chaweng Noi? · What are sea lice? · Is Chaweng Noi good for families?
- **Money links · Supporting guides · Sister-site link:** Elephant sanctuary `/koh-samui-elephant-sanctuary/` (enquiry) · Ang Thong speedboat · Private speedboat. Supporting: Chaweng, Coral Cove, Lad Koh, villas. Sister: none.
- **Images needed:** cove from the headland · rocks for snorkelling · quiet morning sand · hillside villas · Lad Koh view.
- **Word target:** 1,100 · **Schema:** Article, BreadcrumbList, FAQPage, `Beach` with `geo`.

#### `/lamai-koh-samui/` · D5 · GUIDE
- **Primary keyword:** lamai koh samui · **Secondary:** lamai beach; lamai night market; staying in lamai; lamai or chaweng
- **Title tag:** Lamai, Koh Samui 2026: Beach, Night Market & Area Guide · **Meta description:** Lamai, Koh Samui in 2026: where to swim on the 4 km beach, the daily night market, Hin Ta and Hin Yai, nightlife, rainy-season surf and whether to stay.
- **H1:** Lamai, Koh Samui: Beach, Night Market and Area Guide (2026)
- **Answer-first lead:** Lamai is Samui's second beach town: about 4 km of fine sand on the south-east coast, 25–30 minutes from the airport. Central Lamai is good for swimming but shelves steeply; the north end is shallow and stony; Hin Ta and Hin Yai sit at the south end. It is cheaper and calmer than Chaweng, and rough October–December.
- **At-a-glance box:** Maret subdistrict · 9.4618, 100.0446 · 24 h · free · Jan–Sep · base · street parking · reef shoes at the north end · pickup from most areas.
- **Section outline (H2 → H3):** At a glance · Map · The beach, north to south · Lamai Night Market and fresh market (night market daily from ~17:00 on Beach Road before the bridge, live music, best 18:00–20:00; fresh market 06:00–20:00 at 9.4716, 100.0470) · Is the Sunday walking street still running? [U: check locally; may have ended after the pandemic] · Eating and nightlife (→ Lamai nightlife) · Sights nearby (Hin Ta & Hin Yai, Overlap Stone, Red Temple, Guan Yu, Wat Khunaram, Silver Beach, Coral Cove) · Should you stay in Lamai? (1,500–3,500) · Getting around (Grab good; airport taxi approx. 400–700 [U]) · Safety (rips; Beach Republic largely closed, so don't send people there) · Events (official Songkran zone; NYE fireworks) · FAQ.
- **Map:** beach, night market, fresh market, Hin Ta & Hin Yai, Overlap Stone, Red Temple, Guan Yu. Chips: Beach · Markets · Sights · Nightlife.
- **Tables / data blocks:** Lamai vs Chaweng (Price · Crowd · Swimming · Nightlife · Airport) · How to get there.
- **FAQ:** Lamai or Chaweng: which is better? · Can you swim at Lamai Beach? · When is the Lamai night market? · Is there still a Lamai Sunday walking street? · How far is Lamai from the airport? · What is there to do in Lamai at night? · Is Lamai good for families? · Where are Hin Ta and Hin Yai? · Is Lamai safe to swim in the rainy season?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat · Ang Thong speedboat · Jungle safari (enquiry). Supporting: Lamai nightlife, markets, Hin Ta & Hin Yai, beaches, where to stay. Sister: none.
- **Images needed:** central Lamai beach · night market food stalls · Hin Ta & Hin Yai · north-end rocks at low tide · surf with red flag · fresh market morning.
- **Word target:** 2,500 (parity floor, P0.2; was 1,700) · **Schema:** Article, BreadcrumbList, FAQPage, `Beach` + `Place` with `geo`.

#### `/fishermans-village-koh-samui/` · D5 · GUIDE
- **Primary keyword:** fisherman's village koh samui · **Secondary:** bophut koh samui; bophut beach; fisherman's village restaurants; bophut pier ("walking street" belongs to `/koh-samui-walking-streets/`)
- **Title tag:** Fisherman's Village, Bophut 2026: Koh Samui Area Guide · **Meta description:** Fisherman's Village, Bophut: the Friday walking street, parking and towing, street-food prices, where to eat, the beach (not for swimming) and the sunset views.
- **H1:** Fisherman's Village, Bophut: Koh Samui Area Guide (2026)
- **Answer-first lead:** Fisherman's Village is Bophut's old shophouse strip on Samui's north coast. It is now the island's best dining street and hosts the Friday Walking Street (~17:00–23:00; road closed from ~16:30). The beach is narrow and not recommended for swimming, but the sunset view across to Koh Phangan is good.
- **At-a-glance box:** Bo Phut, north coast · 9.5597, 100.0314 · always open; Friday market ~17:00–23:00 · free · evenings, Fri busiest · 2–3 h · parking at The Wharf ~20 THB scooter / 40+ car; scooters left on the street are towed (500+ THB release) · beach not for swimming · pickup from most areas.
- **Section outline (H2 → H3):** At a glance · Map · The village: history and shophouses [check building ages] · Friday Walking Street and the other market nights (smaller Mon and Wed; Free Wave Market daily 16:00–24:00, new 2025; Samui Green Market on the last Sunday of the month) → walking streets page · Eating in Fisherman's Village (street-food prices: pad thai 60–80, mango sticky rice 50–80, grilled prawns 80–120, satay ~10/stick, cocktails ~99; restaurants named as open in 2026 by one source: Salt & Oak, The Thai Tapas, Rice x De Pier, Charm Samui, Chez François, Ban Thai, Ran Khang Non [verify each; no links]; Michelin-listed Khao Horm and Long Dtai [check 2026 status]) · Bophut beach: why not to swim (outflow near the east end, cloudy water, jellyfish) · Bars and fire shows (Coco Tam's, ~19:15 and 21:00; minimum spend on some seats) · Parking, towing and Friday tips · Staying in Bophut (2,500–5,000) · Events (second-biggest NYE fireworks; resort galas) · FAQ.
- **Map:** village centre, The Wharf, Free Wave Market, Coco Tam's, Bophut beach 9.5611, 100.0280, Bophut pier [take]. Chips: Market · Food · Bars · Parking · Pier.
- **Tables / data blocks:** Market nights (Day · Hours · Size) · street-food prices · How to get there.
- **FAQ:** What day is the Fisherman's Village market? · What time does the Friday walking street start? · Where do I park for the Friday market? · Can you swim at Bophut beach? · Is Fisherman's Village worth visiting on a non-market night? · How far is Fisherman's Village from Chaweng? · Is Fisherman's Village good for families? · Are there boats from Bophut to Koh Phangan? [check current services] · Is Fisherman's Village busy at New Year?
- **Money links · Supporting guides · Sister-site link:** Ang Thong speedboat · Pig Island Sunset Tour† · FMP shared speedboat (1,400). Supporting: walking streets, restaurants, markets, sunset spots, where to stay. Sister: none.
- **Images needed:** shophouse street at dusk · Friday market crowd · grilled prawns stall · Coco Tam's beanbags · The Wharf · beach with Phangan on the horizon · parking signs.
- **Word target:** 2,500 (parity floor, P0.2; was 1,800) · **Schema:** Article, BreadcrumbList, FAQPage, `TouristAttraction` with `geo`.

#### `/maenam-koh-samui/` · D5 · GUIDE
- **Primary keyword:** maenam koh samui · **Secondary:** maenam beach; maenam pier; maenam walking street; staying in maenam
- **Title tag:** Maenam, Koh Samui 2026: Quiet Beach & Area Guide · **Meta description:** Maenam, Koh Samui: a quiet palm-lined beach, the cheapest beachfront stays, the Pralarn ferry pier, Chinatown, the immigration office and how calm the sea is.
- **H1:** Maenam, Koh Samui: Quiet Beach and Area Guide (2026)
- **Answer-first lead:** Maenam is the long, quiet, palm-lined beach on Samui's north coast. It has the cheapest beachfront stays, calm dry-season water (chest-deep about 5 m out), a small Chinatown and Lomprayah's Pralarn pier for Koh Phangan and Koh Tao. It is 20–30 minutes from the airport, and the nights are quiet.
- **At-a-glance box:** Mae Nam subdistrict · 9.5701, 100.0004 · 24 h · free · Jan–Sep · base · easy parking · calm in season, high tide narrows the beach · pickup from most areas.
- **Section outline (H2 → H3):** At a glance · Map · Beach and swimming · Chinatown and the Chinese temple (San Chao Jao Eng Sae; CNY Sat 6 Feb 2027, family-friendly lion dances) · Markets (Thursday walking street [U: may be gone]; J&J Street Food daily 12:00–24:00 opposite the Chinese gate [S]) · Pralarn pier ferries (Lomprayah to Thong Sala 350–400, 3 a day; slow boat to Koh Tao 550) · Koh Samui Immigration Office (333 Maenam Rd, Soi 1; +66 77 423 440; Mon–Fri ~08:30–16:30, call ahead; moved from Nathon in 2016) · Nearby (Santiburi golf, Tree Bridge zipline, Cape Away Sunday party) · Staying in Maenam (1,000–2,500) · FAQ.
- **Map:** beach, Chinatown, Pralarn pier [take], immigration office [take], Santiburi [take]. Chips: Beach · Ferry · Services · Food.
- **Tables / data blocks:** Ferries from Pralarn · How to get there.
- **FAQ:** Is Maenam a good place to stay? · Can you swim at Maenam Beach? · Is there still a Maenam walking street on Thursdays? · Where is the Koh Samui immigration office? · Which ferries leave from Maenam? · How far is Maenam from Chaweng? · Is Maenam good for families? · Is Maenam too quiet?
- **Money links · Supporting guides · Sister-site link:** Zipline (enquiry) · Koh Tao & Nang Yuan (2,200) · Phangan private transfer `/private-speedboat-koh-samui-to-koh-phangan/`. Supporting: visa extension, golf, Koh Samui to Koh Phangan, where to stay. Sister: none.
- **Images needed:** palm-lined Maenam beach · Chinese gate · Pralarn pier · quiet beach bar · immigration office exterior.
- **Word target:** 2,500 (parity floor, P0.2; was 1,300) · **Schema:** Article, BreadcrumbList, FAQPage, `Beach` with `geo`.

#### `/choeng-mon-koh-samui/` · D5 · GUIDE
- **Primary keyword:** choeng mon beach · **Secondary:** choeng mon koh samui; koh fan noi; best family beach koh samui
- **Title tag:** Choeng Mon Beach, Koh Samui 2026: Family Beach Guide · **Meta description:** Choeng Mon, one of Koh Samui's calmest bays: swimming with small kids, the low-tide sandbar to Koh Fan Noi, resorts, restaurants and the 5–10 min airport run.
- **H1:** Choeng Mon Beach, Koh Samui: The Calm Family Bay (2026)
- **Answer-first lead:** Choeng Mon is a sheltered bay on Samui's north-east tip. It is among the island's calmest swimming beaches and the first pick for families with small children; at low tide a sandbar links it to the islet of Koh Fan Noi. It is 5–10 minutes from the airport and quiet after dark.
- **At-a-glance box:** north-east · 9.5722, 100.0825 · 24 h · free · Jan–Sep · half day to base · parking [check] · calmest in the centre; rocky west end · pickup from most areas.
- **Section outline (H2 → H3):** At a glance · Map · Swimming and the Koh Fan Noi sandbar (tide widget; don't get cut off [check]) · Choeng Mon for families · Where to eat (beach restaurants; FishHouse Michelin-listed [check]) · Staying in Choeng Mon (3,000–7,000; luxury resorts as context) · Nearby (Tongson Bay, Big Buddha, Wat Plai Laem) · How to get there · FAQ.
- **Map:** Choeng Mon, Koh Fan Noi [take], Tongson 9.5866, 100.0757, Big Buddha. Chips: Beach · Sandbar · Temples.
- **Tables / data blocks:** Choeng Mon vs Chaweng vs Lipa Noi (for families) · How to get there.
- **FAQ:** Is Choeng Mon good for small children? · Can you walk to Koh Fan Noi? · Is Choeng Mon calm in November? · How far is Choeng Mon from the airport? · Choeng Mon or Chaweng: which is better? · Are there restaurants at Choeng Mon? · Is there aircraft noise at Choeng Mon?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat · Ang Thong speedboat · Private speedboat (Koh Som & Tongson itinerary). Supporting: beaches, tides, villas, Tongson Bay. Sister: none.
- **Images needed:** bay from the west headland · children in shallow water · the sandbar at low tide · beachfront restaurants · Koh Fan Noi.
- **Word target:** 2,500 (parity floor, P0.2; was 1,200) · **Schema:** Article, BreadcrumbList, FAQPage, `Beach` with `geo`.

#### `/big-buddha-beach-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** bang rak beach · **Secondary:** big buddha beach koh samui; bangrak pier; bang rak koh samui ("big buddha" alone belongs to the temple page)
- **Title tag:** Bang Rak (Big Buddha Beach) 2026: Piers & Area Guide · **Meta description:** Bang Rak (Big Buddha Beach): which of four piers your ferry uses, why the water isn't for swimming, seafood on the sand, beach clubs and stays by the airport.
- **H1:** Bang Rak (Big Buddha Beach), Koh Samui: Piers, Food and Area Guide (2026)
- **Answer-first lead:** Bang Rak, also called Big Buddha Beach, is the north-coast bay between Bophut and Big Buddha, next to the airport and the main Koh Phangan and Koh Tao piers. It is convenient and good for seafood on the sand, but the water is muddy and not for swimming, and planes fly low overhead.
- **At-a-glance box:** north coast · 9.5572, 100.0533 · 24 h · free · any season (not a swim beach) · transit, 1–2 nights · parking at piers [check] · not for swimming (glass reported in the sand) · pickup from most areas.
- **Section outline (H2 → H3):** At a glance · Map of the piers · **Which "Bangrak pier"?** (table: Lomprayah pier, Seatran pier, Petcherat Marina for Songserm and Echo, Big Buddha pier for the Haad Rin Queen; destinations, times, fares from O2) · The beach, honestly · Eating (seafood strip; Plaza The Green Market daily ~15:00–22:00 [S]) · Beach clubs (Chi Samui, Tembo, Malika, 79 Beach Club) · Staying near the airport · Full Moon Party: Haad Rin Queen (200 THB at 10:30 and 17:00) vs our door-to-door boat (1,400) · FAQ.
- **Map:** the 4 piers [take each], beach, Big Buddha. Chips: Piers · Food · Beach clubs.
- **Tables / data blocks:** Pier table (Pier · Operators · To · Time · Fare) · How to get there.
- **FAQ:** Can you swim at Big Buddha Beach? · Which pier do ferries to Koh Phangan leave from? · Where does the Haad Rin Queen leave from? · Is Bang Rak noisy? · Is Bang Rak a good place to stay before an early ferry? · How far is Bang Rak from the airport? · What is the difference between Bang Rak and Big Buddha?
- **Money links · Supporting guides · Sister-site link:** FMP shared speedboat (1,400) · FMP private speedboat · Koh Tao & Nang Yuan (2,200). Supporting: Koh Samui to Koh Phangan, Koh Samui to Koh Tao, Big Buddha, beach clubs. Sister: none.
- **Images needed:** piers with ferries · seafood tables on the sand · aircraft on approach (honest) · Chi Samui swim-up bar (generic) · bay at sunset.
- **Word target:** 1,100 · **Schema:** Article, BreadcrumbList, FAQPage, `Beach` with `geo`.

#### `/plai-laem-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** plai laem koh samui · **Secondary:** plai laem beach; staying in plai laem; north east koh samui
- **Title tag:** Plai Laem, Koh Samui 2026: North-East Tip Area Guide · **Meta description:** Plai Laem on Koh Samui's north-east tip: Wat Plai Laem, Big Buddha, beach clubs, resort stays 5–10 minutes from the airport, and what the beach is really like.
- **H1:** Plai Laem, Koh Samui: The North-East Tip (2026)
- **Answer-first lead:** Plai Laem is the north-east tip between Big Buddha and Choeng Mon. It is home to Wat Plai Laem and a string of resorts and beach clubs, and the airport and the Phangan piers are close. Beach quality varies by resort frontage, so check swimming conditions on the spot [field-check before publishing].
- **At-a-glance box:** north-east · [GPS: take from Google Maps] · 24 h · free · Jan–Sep · base · resort parking · swimming [check] · pickup from most areas.
- **Section outline (H2 → H3):** At a glance · Map · Wat Plai Laem and Big Buddha · The beach (field-check sand, tide and swimming) · Beach clubs (listed by sources as "Bangrak/Plai Laem") · Staying in Plai Laem · How to get there · FAQ.
- **Map:** Wat Plai Laem 9.5713, 100.0673, Big Buddha 9.5708, 100.0598, Choeng Mon. Chips: Temple · Beach · Beach clubs.
- **Tables / data blocks:** How to get there.
- **FAQ:** Where is Plai Laem? · Can you swim at Plai Laem? · Is Plai Laem close to the airport? · What is there to see in Plai Laem? · Is Plai Laem a good base for the Koh Phangan ferries?
- **Money links · Supporting guides · Sister-site link:** FMP private speedboat · Ang Thong speedboat · Private speedboat. Supporting: Wat Plai Laem, Big Buddha, Choeng Mon. Sister: none.
- **Images needed:** coast at the tip · Wat Plai Laem lake · beach club deck · resort beach (licensed).
- **Word target:** 900 · **Schema:** Article, BreadcrumbList, FAQPage, `Place` with `geo`.

#### `/nathon-koh-samui/` · D5 · GUIDE
- **Primary keyword:** nathon koh samui · **Secondary:** nathon pier; nathon night market; nathon town; koh samui government hospital
- **Title tag:** Nathon, Koh Samui 2026: Town, Pier & Night Market Guide · **Meta description:** Nathon, Koh Samui's old capital and west-coast port: ferries to Donsak, Phangan and Tao, the daily night market, the Chinese shrine, the hospital and sunset.
- **H1:** Nathon, Koh Samui: Town, Pier and Night Market Guide (2026)
- **Answer-first lead:** Nathon is Samui's old capital and west-coast port. From here Seatran ferries run to Donsak (~1.5 h, ~170 THB) and Lomprayah and Songserm boats run to Koh Phangan and Koh Tao. The town has government offices, the government hospital and a daily waterfront night market (~16:00–22:00, busiest on Tuesday). It is a day-visit and transit town, not a beach base, and the pier is a free sunset spot.
- **At-a-glance box:** Ang Thong subdistrict, 84140 · [GPS: take] · market ~16:00–22:00 · free · late afternoon · 2–3 h · street parking · no swimming beach · **pickup: +400 THB pp return from Nathon**.
- **Section outline (H2 → H3):** At a glance · Map · Nathon pier and ferries (table) · Night market and food (daily 16:30–22:00; no Saturday walking street any more) · Old town and Chinese heritage (Hainan shrine; CNY with traditional face-piercing that may not suit children; the Chak Phra procession to Nathon pier, ~9 days around Ok Phansa [U]) · Services (Koh Samui Hospital, government, 61 Moo 1 [phone: take from the hospital's site]; banks; **immigration moved to Maenam in 2016, so ignore old pins**) · Nearby (Hin Lad waterfall 2 km south, Lipa Noi, Raja ferry) · Sunset on the pier · Should you stay? (transit only) · FAQ.
- **Map:** pier, night market, Hainan shrine, government hospital, Hin Lad 9.5205, 99.9556 [take the rest]. Chips: Ferry · Market · Heritage · Medical.
- **Tables / data blocks:** Ferry table (Seatran to Donsak hourly ~170; Lomprayah to Thong Sala 12:15 and 16:00, 350; Songserm 10:30, 200–250; Koh Tao: Songserm ~450, Boonsiri 650, last Lomprayah 16:00) · How to get there.
- **FAQ:** Is Nathon worth visiting? · Is there a beach in Nathon? · When is the Nathon night market? · Which ferries leave from Nathon? · Is the immigration office in Nathon? · Where is the government hospital? · Is there a walking street in Nathon on Saturdays? · How far is Nathon from Chaweng?
- **Money links · Supporting guides · Sister-site link:** Koh Tao & Nang Yuan (2,200) · Pig Island speedboat · Ang Thong speedboat (pickup surcharge note). Supporting: Surat Thani to Koh Samui, Hin Lad, markets, hospitals. Sister: none.
- **Images needed:** Nathon pier at sunset · night-market stalls · old shophouses · Hainan shrine · Seatran ferry docking.
- **Word target:** 2,500 (parity floor, P0.2; was 1,400) · **Schema:** Article, BreadcrumbList, FAQPage, `Place` with `geo`.

#### `/lipa-noi-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** lipa noi beach · **Secondary:** lipa noi koh samui; raja ferry lipa noi; lipa noi sunset
- **Title tag:** Lipa Noi Beach, Koh Samui 2026: Sunset & Family Guide · **Meta description:** Lipa Noi on Koh Samui's west coast: very shallow, calm water for toddlers at high tide, wide low-tide flats, sunsets, the Raja ferry pier and where to eat.
- **H1:** Lipa Noi Beach, Koh Samui: Sunsets and Shallow Water (2026)
- **Answer-first lead:** Lipa Noi is a quiet, very shallow beach on the west coast. It is calm for much of the year and ideal for toddlers at high tide, with wide flats at low tide. Sunsets here are among Samui's best, and the Raja car ferry from Donsak lands here. It is 40–50 minutes from the airport, with few restaurants.
- **At-a-glance box:** Lipa Noi subdistrict, west · 9.5007, 99.9344 · 24 h · free · Jan–Sep; often calm Oct–Dec [check] · half day to base · roadside parking · high tide only for swimming · **pickup: +400 THB pp return**.
- **Section outline (H2 → H3):** At a glance · Map · Beach, tides and swimming (tide widget, Nathon point) · Sunset · Raja ferry pier (Donsak 220 THB foot passenger, ~1.5 h, roughly hourly 05:00–19:00) · Beach clubs and food (Nikki Beach: Sat party, Sun brunch, as context; sunset bars [verify]) · Staying in Lipa Noi (villas 1,500–6,000) · Nearby (Paradise Park Farm: open 09:00–17:00 per Oct 2026 listing, fee unconfirmed [check]; zipline operator [S]) · Getting there and back (Grab weak in the west) · FAQ.
- **Map:** beach, Raja pier [take], Nathon. Chips: Beach · Ferry · Sunset.
- **Tables / data blocks:** Tide-and-swim box · How to get there.
- **FAQ:** Is Lipa Noi good for swimming? · Is Lipa Noi good for small children? · Where does the Raja ferry arrive on Koh Samui? · Is Lipa Noi too remote? · Can I watch the sunset at Lipa Noi? · Do your tours pick up from Lipa Noi?
- **Money links · Supporting guides · Sister-site link:** Pig Island Sunset Tour† (1,550) · Sunset cruise · Pig Island speedboat. Supporting: sunset spots, tides, villas, Surat Thani to Koh Samui. Sister: none.
- **Images needed:** sunset over the flats · toddler in shallow water · Raja ferry · low-tide sand ripples · beachfront villa (licensed).
- **Word target:** 1,100 · **Schema:** Article, BreadcrumbList, FAQPage, `Beach` with `geo`.

#### `/taling-ngam-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** taling ngam · **Secondary:** taling ngam beach; five islands koh samui; baan suan lung khai; west coast koh samui
- **Title tag:** Taling Ngam, Koh Samui 2026: Best Sunset Coast Guide · **Meta description:** Taling Ngam on Koh Samui's south-west coast: the Five Islands sunset, a quiet tidal village beach, the Bib Gourmand seafood restaurant and the steep road in.
- **H1:** Taling Ngam, Koh Samui: The Sunset Coast (2026)
- **Answer-first lead:** Taling Ngam is the long, quiet village beach on the south-west coast, with fishing boats, clifftop luxury resorts and Samui's best sunset over the Five Islands (Koh Ha). The water is shallow and tidal. It is also home to Baan Suan Lung Khai, Samui's MICHELIN Bib Gourmand 2026 (southern seafood; reservation required).
- **At-a-glance box:** Taling Ngam subdistrict · 9.4554, 99.9347 · 24 h · free · Jan–Sep, sunsets clearest Feb–Apr · half day · roadside parking · tidal · **pickup: +400 THB pp return**.
- **Section outline (H2 → H3):** At a glance · Map · Beach and tides · The Five Islands and the sunset (landing rules [check]) · Baan Suan Lung Khai and local food (11:00–14:00 and 16:30–19:00; book ahead; no link) · Chinese Temple of Guanyin (9.4212, 99.9479) · Staying in Taling Ngam (clifftop resorts as context) · The roads (Route 4170 is steep, narrow and slippery when wet) · FAQ.
- **Map:** beach, Guanyin temple, Five Islands viewpoint [take], Thong Krut. Chips: Beach · Sunset · Food · Temple.
- **Tables / data blocks:** Sunset box (live time) · How to get there.
- **FAQ:** Where is the best sunset on Koh Samui? · Can you swim at Taling Ngam? · What are the Five Islands? · Do I need to book Baan Suan Lung Khai? · How do I get to Taling Ngam? · Is Taling Ngam too remote to stay in?
- **Money links · Supporting guides · Sister-site link:** Pig Island Sunset Tour† · Pig Island private longtail† · Sunset cruise. Supporting: sunset spots, seafood, restaurants, Thong Krut. Sister: none.
- **Images needed:** Five Islands at sunset · fishing boats on the sand · Guanyin temple · southern seafood plate (generic) · cliff road.
- **Word target:** 1,100 · **Schema:** Article, BreadcrumbList, FAQPage, `Beach` with `geo`.

#### `/bang-kao-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** bang kao koh samui · **Secondary:** south koh samui; laem sor; laem set; bang kao beach
- **Title tag:** Bang Kao & South Koh Samui 2026: Quiet Coast Guide · **Meta description:** Koh Samui's quiet south coast: Bang Kao beach (high tide only), Laem Sor Pagoda, Laem Set and its wellness resorts, local food, and what's closed. Updated 2026.
- **H1:** Bang Kao and the South Coast, Koh Samui (2026)
- **Answer-first lead:** Samui's south coast (Bang Kao, Laem Sor and Laem Set, and the villages towards Thong Krut and Hua Thanon) is the island's quietest and most local stretch. Its shallow, coral-strewn beaches only work for swimming at high tide. The highlights are Laem Sor's gold seafront pagoda and wellness resorts such as Kamalaya.
- **At-a-glance box:** Na Mueang subdistrict · Bang Kao 9.4232, 99.9938 · 24 h · free · Jan–Sep [south shore in the NE monsoon: check] · half day · roadside parking · water shoes; swim at high tide · **pickup: +400 THB pp return from Bang Kao**.
- **Section outline (H2 → H3):** At a glance · Map · Bang Kao beach (few amenities; litter reported) · Laem Sor Pagoda and Khao Chedi · Laem Set (rocky; Kamalaya; Samui Aquarium & Tiger Zoo status unclear, **don't list it as open**; the Butterfly Garden is likely closed) · Hua Thanon and Thong Krut (→ their pages) · Food (no verified 2026 seafood venue at Bang Kao; Kanomjeen Pa Lek opposite Wat Samret [U, 2018 data]) · Staying in the south (wellness, long stays; far from everything) · FAQ.
- **Map:** Bang Kao, Laem Sor 9.4117, 99.9690, Wat Samret 9.4380, 100.0106, Laem Set [take], Thong Krut [take]. Chips: Beach · Temple · Wellness.
- **Tables / data blocks:** "Open / closed / unverified" status box · How to get there.
- **FAQ:** Is Bang Kao beach good for swimming? · What is there to do in the south of Koh Samui? · Where is Laem Sor Pagoda? · Is the Samui Aquarium & Tiger Zoo open? · Is the south of Samui a good place to stay? · Do tours pick up from Bang Kao?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat · Pig Island private longtail† · Pig Island Sunset Tour†. Supporting: Laem Sor, Thong Krut, wellness resorts, Hua Thanon. Sister: none.
- **Images needed:** Bang Kao at high tide · Laem Sor chedi · rocky Laem Set coast · village lane · Khao Chedi.
- **Word target:** 1,300 · **Schema:** Article, BreadcrumbList, FAQPage, `Place` with `geo`.

#### `/thong-krut-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** thong krut · **Secondary:** thong krut pier; thong krut koh samui; boat to pig island
- **Title tag:** Thong Krut, Koh Samui 2026: The Pier for Pig Island · **Meta description:** Thong Krut on Koh Samui's south-west coast: the pier for Pig Island, Koh Tan and Koh Rap boats, how to get there, parking, seafood and sunsets. Updated 2026.
- **H1:** Thong Krut, Koh Samui: The Pier for Pig Island and Koh Tan (2026)
- **Answer-first lead:** Thong Krut is a small fishing village on the south-west coast. Its pier is where boats leave for Koh Madsum (Pig Island), Koh Tan and Koh Rap, about 30 minutes away. There are a few seafood restaurants and sunset views, but it isn't a swimming beach.
- **At-a-glance box:** Taling Ngam subdistrict · [GPS: take pier] · daylight · free · Jan–Sep; trips also run Oct–Dec when safe · 30 min before departure · parking at the pier [check] · not for swimming · **pickup: +400 THB pp return** [ask Mea whether guests who meet the boat at the pier pay it].
- **Section outline (H2 → H3):** At a glance · Map · The pier: what leaves and where we meet [ask Mea] · Getting to Thong Krut (Route 4170 or the ring road; measure from Chaweng and Lamai) · The village and seafood · Sunset · What's not open (Samui Snake Farm unverified, so don't list it) · FAQ.
- **Map:** pier, Koh Madsum, Koh Tan, Laem Sor. Chips: Pier · Islands · Food.
- **Tables / data blocks:** Departures box (our tours from Thong Krut) · How to get there.
- **FAQ:** Where is Thong Krut pier? · How do I get to Thong Krut? · Do Pig Island tours pick up from my hotel? · Can I hire a longtail at Thong Krut myself? · Is there parking at Thong Krut pier? · Is Thong Krut worth visiting without a tour?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat (1,450) · Small-group longtail† (1,750) · Pig Island private longtail† (5,950). Supporting: Pig Island guide, Koh Tan, Taling Ngam. Sister: pigislandkohsamui.com.
- **Images needed:** longtails at the pier · speedboat loading · village seafood shack · sunset over the islands · pier sign.
- **Word target:** 1,000 · **Schema:** Article, BreadcrumbList, FAQPage, `Place` with `geo`.

#### `/hua-thanon-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** hua thanon · **Secondary:** hua thanon fish market; muslim fishing village koh samui; guan yu shrine samui
- **Title tag:** Hua Thanon, Koh Samui 2026: Fishing Village & Market · **Meta description:** Hua Thanon, Koh Samui's Muslim fishing village: the morning fish market, the 1984 mosque, the 16 m Guan Yu shrine above it, etiquette and how to get there.
- **H1:** Hua Thanon, Koh Samui: Fishing Village, Market and Mosque (2026)
- **Answer-first lead:** Hua Thanon is Samui's Muslim fishing village on the south-east coast below Lamai. It has a fish market that is best early in the morning (listed 07:00–18:00), the Koh Samui Central Mosque (Masjid Nurul Ihsan, built 1984), and the 16 m bronze Guan Yu shrine on the hill above.
- **At-a-glance box:** Maret subdistrict · 9.4426, 100.0236 · market 07:00–18:00, mornings best · free · 07:00–09:00 · 1 h · roadside parking · modest dress in the village · pickup from most areas.
- **Section outline (H2 → H3):** At a glance · Map · The fish market · Village and mosque etiquette (dress, prayer times, Friday prayers, ask before photographing people) · Guan Yu shrine · Food (halal; southern curries) · Nearby (Red Temple, Wat Khunaram, Lamai) · FAQ.
- **Map:** market, mosque [take], Guan Yu 9.4454, 100.0244, Red Temple 9.4512, 100.0309. Chips: Market · Mosque · Shrine.
- **Tables / data blocks:** Etiquette do/don't box · How to get there.
- **FAQ:** When is the Hua Thanon fish market open? · Can tourists visit the mosque? · What should I wear in Hua Thanon? · Where is the Guan Yu statue? · Is there a beach at Hua Thanon? · How far is Hua Thanon from Lamai?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat · Jungle safari (enquiry) · Cooking class `/koh-samui-cooking-class/` (enquiry). Supporting: seafood, markets, Guan Yu, Thai culture. Sister: none.
- **Images needed:** boats on the shore · fish market morning (with consent) · mosque exterior · Guan Yu statue · village lane.
- **Word target:** 1,000 · **Schema:** Article, BreadcrumbList, FAQPage, `Place` with `geo`.

#### `/silver-beach-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** silver beach koh samui · **Secondary:** crystal bay koh samui; silver beach snorkelling
- **Title tag:** Silver Beach (Crystal Bay) Koh Samui 2026: Guide & Tips · **Meta description:** Silver Beach (Crystal Bay) between Chaweng Noi and Lamai: soft sand, good swimming and snorkelling, why to arrive before 10:00, parking and the red-flag months.
- **H1:** Silver Beach (Crystal Bay), Koh Samui (2026)
- **Answer-first lead:** Silver Beach (Crystal Bay) is a small boulder-framed cove between Chaweng Noi and Lamai, with soft pale sand, good swimming and easy snorkelling. It fills up by about 10:00, so arrive early. Expect waves October–December.
- **At-a-glance box:** east coast · 9.4778, 100.0663 · daylight · free [check parking fee] · Feb–Sep mornings · 2–3 h · small car park [check] · good swimming in season · pickup from most areas.
- **Section outline (H2 → H3):** At a glance · Map · Swimming and snorkelling · Access and parking · Facilities · Crowds and timing · Nearby (Coral Cove, Lamai, Lad Koh) · FAQ.
- **Map:** Silver Beach, Coral Cove, Lad Koh. Chips: Beach · Snorkel.
- **Tables / data blocks:** Best-time table (morning, midday, Oct–Dec) · How to get there.
- **FAQ:** Where is Silver Beach on Koh Samui? · Is Silver Beach the same as Crystal Bay? · Is Silver Beach good for snorkelling? · Is there parking at Silver Beach? · When is Silver Beach least crowded? · Is Silver Beach safe in the rainy season?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat (better reefs) · Ang Thong speedboat · Kayak & SUP `/koh-samui-kayak-sup/`. Supporting: snorkelling, beaches, Coral Cove. Sister: none.
- **Images needed:** cove with boulders · clear shallow water · early-morning empty sand · snorkeller by the rocks.
- **Word target:** 1,000 · **Schema:** Article, BreadcrumbList, FAQPage, `Beach` with `geo`.

#### `/coral-cove-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** coral cove koh samui · **Secondary:** coral cove beach; coral cove snorkelling; kayak coral cove
- **Title tag:** Coral Cove, Koh Samui 2026: Snorkelling & Kayak Guide · **Meta description:** Coral Cove on Koh Samui's ring road: easy snorkelling, kayaks at ~300 THB an hour, coarse sand (wear water shoes), the honest reef condition and nearby stops.
- **H1:** Coral Cove, Koh Samui: Snorkelling and Kayaking (2026)
- **Answer-first lead:** Coral Cove is a small rocky cove on the ring road between Chaweng Noi and Lamai, and the easiest snorkelling from a Samui beach. The sand is coarse and crystalline, so wear water shoes; kayaks cost about 300 THB an hour; and a January 2026 report noted dead coral and litter.
- **At-a-glance box:** east coast · 9.4906, 100.0613 · facilities 08:00–20:30 [S] · free; kayak ~300/h · Feb–Sep · 1–3 h · ring-road parking [check] · snorkel; rough Oct–Dec · pickup from most areas.
- **Section outline (H2 → H3):** At a glance · Map · Snorkelling (what you'll see [check]) · Kayaking · Facilities · Access (steps [check]) · Reef condition: an honest note · Nearby (Vikasa 9.4861, 100.0658; Lad Koh; Silver Beach) · FAQ.
- **Map:** cove, Lad Koh, Silver Beach. Chips: Snorkel · Kayak · Viewpoint.
- **Tables / data blocks:** Coral Cove vs Silver Beach · How to get there.
- **FAQ:** Is Coral Cove good for snorkelling? · How much is a kayak at Coral Cove? · Do I need water shoes at Coral Cove? · Is there parking at Coral Cove? · Is the coral still alive at Coral Cove? · Is Coral Cove good for kids?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat · Kayak & SUP · Ang Thong speedboat. Supporting: snorkelling, Silver Beach, Lad Koh. Sister: none.
- **Images needed:** cove from the road · kayaks on the sand · snorkeller · crystalline sand close-up.
- **Word target:** 1,000 · **Schema:** Article, BreadcrumbList, FAQPage, `Beach` with `geo`.

#### `/tongson-bay-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** tongson bay koh samui · **Secondary:** thongson bay; quiet beach north east samui
- **Title tag:** Tongson Bay, Koh Samui 2026: Quiet North-East Cove · **Meta description:** Tongson (Thongson) Bay on Koh Samui's north-east: a small, sheltered, quiet bay that is clear and shallow Dec–Apr, reached by a sand road. Tips and directions.
- **H1:** Tongson Bay, Koh Samui: A Quiet North-East Cove (2026)
- **Answer-first lead:** Tongson (Thongson) Bay is a small, sheltered, quiet bay on the north-east coast between Choeng Mon and the Bang Rak headland. It is clear and shallow December–April and rougher May–October, and the last stretch in is a sand road.
- **At-a-glance box:** north-east · 9.5866, 100.0757 · daylight · free · Dec–Apr · half day · limited parking at the end of the sand road · shallow and clear in season · pickup from most areas.
- **Section outline (H2 → H3):** At a glance · Map · Swimming and snorkelling · The access road · Facilities [check] · Seen from the sea (the Koh Som & Tongson charter route) · FAQ.
- **Map:** Tongson, Choeng Mon, Big Buddha. Chips: Beach · Charter route.
- **Tables / data blocks:** Season box · How to get there.
- **FAQ:** Where is Tongson Bay? · Can you swim at Tongson Bay? · Can I drive a scooter to Tongson Bay? · When is Tongson Bay best? · Are there facilities at Tongson Bay?
- **Money links · Supporting guides · Sister-site link:** Private speedboat (Koh Som & Tongson) · Catamaran charter · Ang Thong speedboat. Supporting: Choeng Mon, beaches. Sister: none.
- **Images needed:** bay from above · sand road · clear shallows · boat anchored offshore.
- **Word target:** 900 · **Schema:** Article, BreadcrumbList, FAQPage, `Beach` with `geo`.

#### Places to go: sights

#### `/big-buddha-koh-samui/` · D5 · GUIDE
- **Primary keyword:** big buddha koh samui · **Secondary:** wat phra yai; big buddha opening hours; big buddha dress code; big buddha temple samui
- **Title tag:** Big Buddha Koh Samui 2026: Wat Phra Yai Visitor Guide · **Meta description:** Big Buddha (Wat Phra Yai), Koh Samui: free entry, open 07:00–18:30, the dress code, the best time for photos, Loy Krathong and the nearby Wat Plai Laem.
- **H1:** Big Buddha, Koh Samui: Wat Phra Yai Visitor Guide (2026)
- **Answer-first lead:** Big Buddha (Wat Phra Yai) is the golden seated Buddha on Koh Fan, a small islet joined by a causeway to Samui's north-east coast, about 3 km north of the airport. Entry is free and it is open 07:00–18:30. Cover shoulders and knees, and take your shoes off on the upper platform.
- **At-a-glance box:** Bo Phut, Koh Fan causeway · 9.5708, 100.0598 · 07:00–18:30 · free (donations) · early morning or late afternoon · 45–60 min [check] · parking at the base [check fee] · **dress code: shoulders and knees covered** · on the jungle-safari route.
- **Section outline (H2 → H3):** At a glance · Map · What you'll see (the statue; **don't state its height or build year, since sources conflict**; stairs [count on site]; bells; merit-making; stalls) · Dress code and etiquette (sarong loan [check]) · Best time and photos · Loy Krathong at Big Buddha (Tue 24 Nov 2026) · Big Buddha pier and the Haad Rin Queen (FMP route) · Nearby (Wat Plai Laem 1 km east, Bang Rak, Choeng Mon) · How to get there · FAQ.
- **Map:** Big Buddha, Wat Plai Laem, Big Buddha pier [take], Bang Rak. Chips: Temple · Pier · Beach.
- **Tables / data blocks:** Visiting-hours box · How to get there.
- **FAQ:** Is the Big Buddha on Koh Samui free? · What are the Big Buddha's opening hours? · What should I wear to the Big Buddha? · How tall is the Big Buddha? (answer honestly: figures of 12 m and 15 m both circulate) · How do I get to the Big Buddha from Chaweng? · Can you visit the Big Buddha at sunset? · Is Wat Plai Laem near the Big Buddha? · Where is the Big Buddha pier?
- **Money links · Supporting guides · Sister-site link:** Jungle safari (includes Big Buddha; enquiry) · FMP shared speedboat · Ang Thong speedboat. Supporting: temples, Wat Plai Laem, Bang Rak, Loy Krathong event. Sister: none.
- **Images needed:** statue from the causeway · stairs with visitors in sarongs · bells · sunset silhouette · Loy Krathong krathong (eco) · stalls at the base.
- **Word target:** 1,900 (parity floor, P0.2; was 1,500) · **Schema:** Article, BreadcrumbList, FAQPage, `PlaceOfWorship` + `TouristAttraction` with `geo`, `openingHoursSpecification`, `isAccessibleForFree: true`.

#### `/wat-plai-laem-koh-samui/` · D5 · GUIDE
- **Primary keyword:** wat plai laem · **Secondary:** wat plai laem koh samui; 18 arm guanyin samui; laughing buddha samui
- **Title tag:** Wat Plai Laem Koh Samui 2026: 18-Arm Guanyin Guide · **Meta description:** Wat Plai Laem on Koh Samui: the 18-armed Guanyin, the laughing Buddha and the lake hall, built 2004–09. Free, ~06:00–18:00, 1 km from Big Buddha. Tips inside.
- **H1:** Wat Plai Laem, Koh Samui: The 18-Armed Guanyin (2026)
- **Answer-first lead:** Wat Plai Laem, about 1 km east of Big Buddha, is a modern temple complex built 2004–09 on a lake. It is best known for its white 18-armed Guanyin and a large laughing Buddha (Phra Sangkachai). Entry is free, it is open about 06:00–18:00, and fish food costs a few baht.
- **At-a-glance box:** north-east tip · 9.5713, 100.0673 · ~06:00–18:00 · free · morning light · 30–45 min · temple car park [check] · dress code · on the jungle-safari route.
- **Section outline (H2 → H3):** At a glance · Map · What you'll see (Guanyin, Sangkachai, the lake hall [check murals]) · Thai and Chinese Buddhism side by side · Feeding the fish (use the temple-sold food) · Etiquette · Best time · Combine with Big Buddha · FAQ.
- **Map:** Wat Plai Laem, Big Buddha. Chips: Temple.
- **Tables / data blocks:** How to get there.
- **FAQ:** Is Wat Plai Laem free? · What are the opening hours? · Who is the 18-armed statue? · How far is Wat Plai Laem from the Big Buddha? · What should I wear? · Can I feed the fish?
- **Money links · Supporting guides · Sister-site link:** Jungle safari (enquiry) · FMP shared speedboat · Pig Island speedboat. Supporting: temples, Big Buddha, Plai Laem. Sister: none.
- **Images needed:** Guanyin on the lake · laughing Buddha · hall reflection · fish feeding.
- **Word target:** 1,900 (parity floor, P0.2; was 1,100) · **Schema:** Article, BreadcrumbList, FAQPage, `PlaceOfWorship` with `geo`.

#### `/hin-ta-hin-yai-koh-samui/` · D5 · GUIDE
- **Primary keyword:** hin ta hin yai · **Secondary:** grandfather grandmother rocks; hin ta hin yai opening hours; lamai rocks
- **Title tag:** Hin Ta & Hin Yai, Koh Samui 2026: Rocks Visitor Guide · **Meta description:** Hin Ta and Hin Yai, the Grandfather and Grandmother Rocks at the south end of Lamai: free entry, parking 30 THB, opening hours, the legend and wave safety.
- **H1:** Hin Ta and Hin Yai, Koh Samui: Grandfather and Grandmother Rocks (2026)
- **Answer-first lead:** Hin Ta and Hin Yai ("Grandfather and Grandmother Rocks") are two naturally shaped rock formations on the shore at the south end of Lamai. Entry is free (parking ~30 THB), opening is roughly 08:00/08:30–18:30/19:00, and you reach them through a lane of souvenir and snack stalls. Stay off the wet rocks when waves are up.
- **At-a-glance box:** Maret · 9.4522, 100.0395 · Sun–Fri 08:30–18:30, Sat 08:00–19:00 [S] · free; parking 30 · morning · 30–45 min · paid car park · grippy shoes · on the jungle-safari route.
- **Section outline (H2 → H3):** At a glance · Map · The legend (told as folklore [check the version]) · What to expect · The stall lane (local coconut sweets [check name]) · Wave safety (Oct–Dec) · Children and accessibility (rock steps) · Nearby (Lamai, Red Temple, Overlap Stone) · FAQ.
- **Map:** rocks, Lamai, Red Temple, Overlap Stone. Chips: Sight · Temple · Viewpoint.
- **Tables / data blocks:** Hours box · How to get there.
- **FAQ:** Is Hin Ta Hin Yai free? · What are the opening hours? · What is the legend of Hin Ta and Hin Yai? · Is it suitable for children? · How do I get there from Chaweng? · Is it worth visiting?
- **Money links · Supporting guides · Sister-site link:** Jungle safari (enquiry) · Pig Island speedboat · Ang Thong speedboat. Supporting: Lamai, temples, Overlap Stone. Sister: none.
- **Images needed:** rocks with the sea · stall lane · visitors on the rocks (calm day) · waves on a rough day (safety).
- **Word target:** 1,900 (parity floor, P0.2; was 1,100) · **Schema:** Article, BreadcrumbList, FAQPage, `TouristAttraction` with `geo`.

#### `/na-muang-waterfall-koh-samui/` · D5 · GUIDE
- **Primary keyword:** na muang waterfall · **Secondary:** na muang waterfall 2; namuang waterfall koh samui; na muang waterfall entrance fee
- **Title tag:** Na Muang Waterfall Koh Samui 2026: 1 & 2 Visitor Guide · **Meta description:** Na Muang Waterfalls 1 and 2 on Koh Samui: free entry, parking 20–60 THB, the swimmable pool, the steep 20–40 min climb to NM2, opening hours and when they flow.
- **H1:** Na Muang Waterfalls 1 and 2, Koh Samui (2026)
- **Answer-first lead:** Na Muang has two falls on the same inland road. Na Muang 1 has a swimmable pool; Na Muang 2 is a 20–40 minute steep climb with ropes and is busy by about 10:30. Both are free (parking 20 THB scooter / 60 THB car), open about 09:00–17:00 (NM1) and 09:00–18:00 (NM2), and thin to a trickle February–April.
- **At-a-glance box:** Na Mueang, interior · NM1 9.4668, 99.9838 / NM2 9.4723, 99.9905 · 09:00–17:00 / 09:00–18:00 · free; parking 20/60 · Oct–Jan for flow (slippery), mornings · 1–3 h · use the waterfall car park · NM1 pool swimmable · on the jungle-safari route.
- **Section outline (H2 → H3):** At a glance · Map · Na Muang 1 · Na Muang 2 (left-hand jungle path; ropes) · Which one to visit? (table) · Water levels by month · Parking, and what we don't recommend (use the waterfall car park, not the first lot by the elephant camp; no elephant attraction is endorsed here) · Safety (flash floods, rocks, no jumping) · How to get there · Combine (Wat Khunaram, Secret Buddha Garden) · FAQ.
- **Map:** NM1, NM2, Wat Khunaram, Secret Buddha Garden. Chips: Waterfall · Temple · Viewpoint.
- **Tables / data blocks:** NM1 vs NM2 (Walk · Swim · Hours · Crowds) · month flow table · How to get there.
- **FAQ:** Is Na Muang waterfall free? · Can you swim at Na Muang 1? · How long is the hike to Na Muang 2? · Which Na Muang waterfall is better? · When does Na Muang have the most water? · Is Na Muang open in the rainy season? · Can I get there without a scooter? · Is there an elephant camp at Na Muang?
- **Money links · Supporting guides · Sister-site link:** Jungle safari (includes the NM swim; enquiry) · ATV `/koh-samui-atv-quad-bike/` (enquiry) · Pig Island speedboat. Supporting: waterfalls, hiking, Wat Khunaram, elephant sanctuary. Sister: none.
- **Images needed:** NM1 pool · NM2 cascade · rope section · parking sign · dry-season trickle · swimmers (consent).
- **Word target:** 1,900 (parity floor, P0.2; was 1,600) · **Schema:** Article, BreadcrumbList, FAQPage, `TouristAttraction` (two, `geo`).

#### `/hin-lad-waterfall-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** hin lad waterfall · **Secondary:** hin lad waterfall koh samui; wat namtok hin lad; waterfall near nathon
- **Title tag:** Hin Lad Waterfall, Koh Samui 2026: Hike & Temple Guide · **Meta description:** Hin Lad Waterfall near Nathon: a steep jungle trail past a forest temple, 30–45 minutes between tiers and about 2 hours in all. When to go and how to get there.
- **H1:** Hin Lad Waterfall, Koh Samui: Jungle Hike and Forest Temple (2026)
- **Answer-first lead:** Hin Lad is a jungle waterfall about 2 km south of Nathon, reached past the forest temple Wat Namtok Hin Lad. The trail between tiers is steep and uneven (30–45 minutes each way), so allow about two hours. Fee and hours are not published [check on site]. Flow is best October–January and low February–April.
- **At-a-glance box:** Ang Thong subdistrict · 9.5205, 99.9556 · [check hours] · [check fee] · morning, Oct–Jan · ~2 h · trailhead parking [check] · modest dress at the temple · pickup: +400 THB pp from Nathon.
- **Section outline (H2 → H3):** At a glance · Map · The trail (number of tiers [check]) · The forest temple and etiquette · When it has water · Safety (slippery; tell someone) · Getting there · FAQ.
- **Map:** waterfall, temple, Nathon. Chips: Waterfall · Temple.
- **Tables / data blocks:** How to get there.
- **FAQ:** Where is Hin Lad waterfall? · How long is the walk to Hin Lad? · Is there an entrance fee? · Can you swim at Hin Lad? · Is Hin Lad better than Na Muang? · What should I wear at the temple?
- **Money links · Supporting guides · Sister-site link:** Jungle safari (enquiry) · Pig Island speedboat · Koh Tao day trip. Supporting: waterfalls, hiking, Nathon. Sister: none.
- **Images needed:** waterfall tier · forest trail · temple entrance · roots and rocks on the path.
- **Word target:** 1,000 · **Schema:** Article, BreadcrumbList, FAQPage, `TouristAttraction` with `geo`.

#### `/secret-buddha-garden-koh-samui/` · D5 · GUIDE
- **Primary keyword:** secret buddha garden · **Secondary:** tarnim magic garden; secret buddha garden entrance fee; secret buddha garden road
- **Title tag:** Secret Buddha Garden Koh Samui 2026: Fee, Road & Tips · **Meta description:** The Secret Buddha Garden (Tarnim Magic Garden) in Koh Samui's hills: the 80–100 THB fee, 09:00–18:00 hours, the very steep road and how to get there safely.
- **H1:** Secret Buddha Garden, Koh Samui: Fee, Road and Tips (2026)
- **Answer-first lead:** The Secret Buddha Garden (Tarnim Magic Garden) is a hilltop sculpture garden in Samui's central highlands, begun in 1976 and opened to visitors after its creator died in 1990. Entry is 80–100 THB (sources differ) and it is open 09:00–18:00. The access road is very steep: go by 4x4 or on a tour, not on a rental scooter.
- **At-a-glance box:** Na Mueang highlands · 9.4829, 99.9945 · 09:00–18:00 · 80 or 100 THB [U] · dry months, morning · 45–60 min · small car park · scooter warning · on the jungle-safari route.
- **Section outline (H2 → H3):** At a glance · Map · What you'll see (sculptures, stream, views; creator's name unconfirmed, so don't state it) · The road: why not to ride a scooter · Getting there (4x4 tours) · Best time · Combine (Na Muang, Wat Khunaram) · FAQ.
- **Map:** garden, Na Muang, Wat Khunaram. Chips: Sight · Waterfall.
- **Tables / data blocks:** Fee and hours box · How to get there.
- **FAQ:** How much is the Secret Buddha Garden entrance fee? · Can I ride a scooter up to the Secret Buddha Garden? · Who built the Secret Buddha Garden? · How long do I need there? · Is it included on the jungle safari? · Is it open in the rainy season?
- **Money links · Supporting guides · Sister-site link:** Jungle safari (enquiry) · ATV (enquiry) · Pig Island speedboat. Supporting: hiking, waterfalls, temples. Sister: none.
- **Images needed:** sculptures among trees · stream · 4x4 on the hill road · view from the top.
- **Word target:** 1,900 (parity floor, P0.2; was 1,200) · **Schema:** Article, BreadcrumbList, FAQPage, `TouristAttraction` with `geo`.

#### `/wat-khunaram-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** mummified monk koh samui · **Secondary:** wat khunaram; luang pho daeng; samui mummy
- **Title tag:** Wat Khunaram Koh Samui 2026: The Mummified Monk Guide · **Meta description:** Wat Khunaram on Koh Samui's Route 4169: the mummified monk Luang Pho Daeng in his glass case, free entry, the dress code and how to visit respectfully.
- **H1:** Wat Khunaram, Koh Samui: The Mummified Monk (2026)
- **Answer-first lead:** Wat Khunaram, on Route 4169 in Na Mueang, displays the body of Luang Pho Daeng, a revered monk who died in the 1970s while meditating, seated in a glass case. Entry is free and it is open in the daytime. It is an active temple, so cover shoulders and knees and keep voices low.
- **At-a-glance box:** Na Mueang · 9.4495, 100.0004 · daytime [check hours] · free · morning · 20–30 min · roadside car park · dress code · on the jungle-safari route.
- **Section outline (H2 → H3):** At a glance · Map · Who was Luang Pho Daeng? (verified facts only) · Visiting respectfully (photos, donations) · The sunglasses detail [check on site before mentioning] · Getting there and parking · Nearby (Na Muang, Secret Buddha Garden, Hua Thanon) · FAQ.
- **Map:** temple, Na Muang, Hua Thanon. Chips: Temple · Waterfall.
- **Tables / data blocks:** How to get there.
- **FAQ:** Where is the mummified monk on Koh Samui? · Is it free to see the mummified monk? · Who was Luang Pho Daeng? · Can I take photos? · What should I wear?
- **Money links · Supporting guides · Sister-site link:** Jungle safari (enquiry) · Pig Island speedboat · Ang Thong speedboat. Supporting: temples, Thai culture, Na Muang. Sister: none.
- **Images needed:** temple exterior · display hall (respectful, no close-up if signage forbids) · offerings · visitors in sarongs.
- **Word target:** 1,000 · **Schema:** Article, BreadcrumbList, FAQPage, `PlaceOfWorship` with `geo`.

#### `/overlap-stone-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** overlap stone koh samui · **Secondary:** overlap stone entrance fee; overlap stone viewpoint; balancing rock samui
- **Title tag:** Overlap Stone Koh Samui 2026: Fee, Walk & What to Know · **Meta description:** Overlap Stone above Lamai: ~300 THB incl. a drink, a 500 m walk and suspension bridge, open 08:00–18:00, Overlap Stone 2 closed, and why we skip the elephants.
- **H1:** Overlap Stone, Koh Samui: Fee, Walk and What to Know (2026)
- **Answer-first lead:** Overlap Stone is a balanced-rock viewpoint on the hill above Maret, about 3 km from Lamai. Entry is ~300 THB including a soft drink (it was 200 earlier in 2026), it is open 08:00–18:00, and the walk is about 500 m with a suspension bridge. "Overlap Stone 2" has been reported closed since a July 2026 forestry raid, and we don't recommend the elephant-feeding add-on.
- **At-a-glance box:** Maret hills · 9.4597, 100.0301 · 08:00–18:00 · ~300 THB [S] · morning · ~1 h · steep road, small car park · shoes with grip · pickup: tours [check].
- **Section outline (H2 → H3):** At a glance · Map · The walk and the view · The fee, then and now [check] · Overlap Stone 2: closed · The elephants: why we skip them (chained young elephants reported [S]; welfare-listed alternative → `/koh-samui-elephant-sanctuary/`) · Road and parking · FAQ.
- **Map:** Overlap Stone, Lamai, Hin Ta & Hin Yai. Chips: Viewpoint · Beach.
- **Tables / data blocks:** Fee and hours box · How to get there.
- **FAQ:** How much is Overlap Stone? · Is Overlap Stone 2 open? · How long is the walk at Overlap Stone? · Is the road to Overlap Stone steep? · Is there elephant feeding at Overlap Stone?
- **Money links · Supporting guides · Sister-site link:** Elephant sanctuary (enquiry; the welfare alternative) · Jungle safari (enquiry) · Pig Island speedboat. Supporting: hiking, Lamai, Hin Ta & Hin Yai. Sister: none.
- **Images needed:** the balanced rock · suspension bridge · view over Lamai · steep access road.
- **Word target:** 900 · **Schema:** Article, BreadcrumbList, FAQPage, `TouristAttraction` with `geo`.

#### `/lad-koh-viewpoint-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** lad koh viewpoint · **Secondary:** lad koh koh samui; viewpoint chaweng noi; samui ring road viewpoint
- **Title tag:** Lad Koh Viewpoint Koh Samui 2026: Stop, Photos & Safety · **Meta description:** Lad Koh viewpoint on the ring road between Chaweng Noi and Coral Cove: free, open 24 h, a 10-minute stop with big views. Stay off the rocks when waves are up.
- **H1:** Lad Koh Viewpoint, Koh Samui (2026)
- **Answer-first lead:** Lad Koh viewpoint is a free, 24-hour roadside lookout on the ring road between Chaweng Noi and Coral Cove, worth a 10-minute stop for the view over the bay and the rocks below. Stay off the rocks when waves are up: a tourist was swept away there in November 2024.
- **At-a-glance box:** east coast ring road · 9.4990, 100.0600 · 24 h · free · sunrise · 10–15 min · roadside pull-out · stay on the platform · pickup n/a.
- **Section outline (H2 → H3):** At a glance · Map · The view · Safety on the rocks · Parking and traffic (blind bends) · Nearby (Coral Cove, Silver Beach, Chaweng Noi) · FAQ.
- **Map:** Lad Koh, Coral Cove, Silver Beach, Chaweng Noi. Chips: Viewpoint · Beach.
- **Tables / data blocks:** How to get there.
- **FAQ:** Where is Lad Koh viewpoint? · Is Lad Koh viewpoint free? · Is it safe to climb on the rocks? · When is the best time to visit? · Is there parking?
- **Money links · Supporting guides · Sister-site link:** Ang Thong speedboat · Private speedboat · Pig Island speedboat. Supporting: hiking, beach safety, Coral Cove. Sister: none.
- **Images needed:** the view at sunrise · the platform · waves on the rocks (safety) · roadside pull-out.
- **Word target:** 900 · **Schema:** Article, BreadcrumbList, FAQPage, `TouristAttraction` with `geo`.

#### `/laem-sor-pagoda-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** laem sor pagoda · **Secondary:** wat phra chedi laem sor; laem sor koh samui; golden pagoda samui
- **Title tag:** Laem Sor Pagoda Koh Samui 2026: Seafront Chedi Guide · **Meta description:** Laem Sor Pagoda (Wat Phra Chedi Laem Sor): a gold-tiled chedi on the shore at the end of Bang Kao beach. Free entry, 07:00–18:00, dress code and what's nearby.
- **H1:** Laem Sor Pagoda, Koh Samui: The Seafront Chedi (2026)
- **Answer-first lead:** Laem Sor Pagoda (Wat Phra Chedi Laem Sor) is a gold-tiled chedi right on the shore at the end of Bang Kao beach on Samui's south coast. Entry is free, it is open 07:00–18:00, and a white chedi (Khao Chedi) stands on the hill to the west.
- **At-a-glance box:** south coast · 9.4117, 99.9690 · 07:00–18:00 · free · late afternoon light · 30–45 min · temple parking · dress code · pickup: +400 THB pp from Bang Kao.
- **Section outline (H2 → H3):** At a glance · Map · The chedi · Khao Chedi (walk [check]) · Etiquette · Best light · Nearby (Bang Kao, Thong Krut) · FAQ.
- **Map:** pagoda, Khao Chedi [take], Bang Kao, Thong Krut. Chips: Temple · Beach · Pier.
- **Tables / data blocks:** How to get there.
- **FAQ:** Where is Laem Sor Pagoda? · Is Laem Sor Pagoda free? · What are the opening hours? · What should I wear? · Can you walk up to Khao Chedi?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat · Pig Island Sunset Tour† · Pig Island private longtail†. Supporting: temples, Bang Kao, Thong Krut. Sister: none.
- **Images needed:** chedi with the sea · gold tiles close-up · Khao Chedi on the hill · shoreline at golden hour.
- **Word target:** 900 · **Schema:** Article, BreadcrumbList, FAQPage, `PlaceOfWorship` with `geo`.

#### `/wat-sila-ngu-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** red temple koh samui · **Secondary:** wat sila ngu; wat ratchathammaram; red temple samui hours
- **Title tag:** Red Temple Koh Samui 2026: Wat Sila Ngu Visitor Guide · **Meta description:** The Red Temple (Wat Ratchathammaram) between Lamai and Hua Thanon: carved terracotta reliefs, free entry, open 07:00–17:00, the dress code and nearby sights.
- **H1:** The Red Temple (Wat Sila Ngu), Koh Samui (2026)
- **Answer-first lead:** Wat Ratchathammaram, better known as Wat Sila Ngu or the Red Temple, stands on the ring road between Lamai and Hua Thanon. Its terracotta-red hall is covered in carved reliefs. Entry is free and it is open 07:00–17:00; allow about 30 minutes.
- **At-a-glance box:** Maret · 9.4512, 100.0309 · 07:00–17:00 · free · morning · ~30 min · roadside parking · dress code · on the jungle-safari route [check].
- **Section outline (H2 → H3):** At a glance · Map · The reliefs (what to look for [check]) · Etiquette · Combine (Hin Ta & Hin Yai, Guan Yu, Wat Khunaram) · FAQ.
- **Map:** temple, Guan Yu, Hin Ta & Hin Yai. Chips: Temple · Sight.
- **Tables / data blocks:** How to get there.
- **FAQ:** Where is the Red Temple on Koh Samui? · What is the Red Temple's real name? · Is it free? · What are the opening hours? · What should I wear?
- **Money links · Supporting guides · Sister-site link:** Jungle safari (enquiry) · Pig Island speedboat · Ang Thong speedboat. Supporting: temples, Hua Thanon, Lamai. Sister: none.
- **Images needed:** red hall exterior · relief detail · entrance · visitors in respectful dress.
- **Word target:** 900 · **Schema:** Article, BreadcrumbList, FAQPage, `PlaceOfWorship` with `geo`.

#### `/guan-yu-shrine-koh-samui/`† · D5 · GUIDE
- **Primary keyword:** guan yu shrine koh samui · **Secondary:** guan yu statue samui; chinese shrine hua thanon
- **Title tag:** Guan Yu Shrine Koh Samui 2026: 16 m Statue Guide · **Meta description:** The Guan Yu Shrine above Hua Thanon: a 16 m bronze statue of the Chinese general, free entry, 09:00–17:00, Chinese New Year celebrations and shrine etiquette.
- **H1:** Guan Yu Shrine, Koh Samui: The 16 m Bronze Statue (2026)
- **Answer-first lead:** The Guan Yu Shrine is a 16 m bronze statue of the Chinese general Guan Yu on the hillside above Hua Thanon. Entry is free, it is open 09:00–17:00, and it is a focus of the Chinese New Year celebrations (Sat 6 Feb 2027).
- **At-a-glance box:** Maret hillside · 9.4454, 100.0244 · 09:00–17:00 · free · morning · 30 min · shrine parking · respectful dress · pickup n/a.
- **Section outline (H2 → H3):** At a glance · Map · Who was Guan Yu? · Visiting the shrine (incense etiquette) · Chinese New Year at the shrine [confirm the 2027 programme in Jan] · Nearby (Hua Thanon, Red Temple) · FAQ.
- **Map:** shrine, Hua Thanon, Red Temple. Chips: Shrine · Village.
- **Tables / data blocks:** How to get there.
- **FAQ:** Where is the Guan Yu statue on Koh Samui? · How tall is the Guan Yu statue? · Is it free to visit? · What happens there at Chinese New Year? · What should I wear?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat · Jungle safari (enquiry) · Ang Thong speedboat. Supporting: temples, Hua Thanon, CNY event. Sister: none.
- **Images needed:** the statue against the sky · incense offerings · view over Hua Thanon · CNY lanterns (event photo with permission).
- **Word target:** 900 · **Schema:** Article, BreadcrumbList, FAQPage, `PlaceOfWorship` with `geo`.

#### Places to go: islands

`/ang-thong-marine-park/`, `/pig-island-koh-samui/` and Koh Tan are briefed above, under Beaches and nature.

#### `/koh-phangan/`† · D5 · GUIDE
- **Primary keyword:** koh phangan from koh samui · **Secondary:** visit koh phangan; koh phangan island guide; full moon party island. (Not "koh samui to koh phangan ferry", which `/koh-samui-to-koh-phangan/` owns, nor "phangan day trip", which the money page owns.)
- **Title tag:** Koh Phangan from Koh Samui 2026: Island Guide & Trips · **Meta description:** Koh Phangan seen from Koh Samui: 20–50 min by boat, Full Moon Party dates, Half Moon Festival packages, the best beaches by private boat, and how to get there.
- **H1:** Koh Phangan from Koh Samui: What to Know Before You Cross (2026)
- **Answer-first lead:** Koh Phangan is Samui's northern neighbour, about 17 km across the water and 20–50 minutes by boat (200–500 THB). It is home to the Full Moon Party at Haad Rin (next: Tue 24 Nov 2026, the same night as Loy Krathong), the Half Moon Festival at Ban Tai, and quieter bays like Thong Nai Pan and Bottle Beach. Our sister site kohphangan.com has the full island guide.
- **At-a-glance box:** north of Samui · [Thong Sala pier GPS: take] · ferries ~08:00–20:30 · fares 200–500 · Jan–Sep calmest · day trip or 2+ nights · n/a · n/a · hotel pickup from most areas on our FMP boat.
- **Section outline (H2 → H3):** At a glance · Map (piers on both islands) · Phangan or Samui? (table) · Full Moon Party from Samui (2026–27 dates incl. the shifted 22 Feb, 21 May, 20 Jul and 16 Oct 2027; shared boat 1,400; entry ~200 THB paid at the party; FCDO warnings on spiking and assault) · Half Moon Festival (Magic Forest nights 2/3 and 16/17 Dec 2026; packages from 2,700) · A private-boat day on Phangan (Bottle Beach, Than Sadet, Thong Nai Pan) · Getting there (summary → `/koh-samui-to-koh-phangan/`) · Staying over · FAQ.
- **Map:** Samui piers (Bangrak, Big Buddha, Pralarn, Nathon), Thong Sala, Haad Rin, Ban Tai [take]. Chips: Ferry · Party · Beaches.
- **Tables / data blocks:** Samui vs Phangan · next 3 FMP dates (auto from the events CPT).
- **FAQ:** How far is Koh Phangan from Koh Samui? · Can you do Koh Phangan as a day trip from Samui? · How do I get to the Full Moon Party from Samui? · When is the next Full Moon Party? · Is Koh Phangan better than Koh Samui? · Should I stay on Phangan or Samui for the Full Moon Party?
- **Money links · Supporting guides · Sister-site link:** FMP shared speedboat (1,400) · Half Moon Festival package `/product/half-moon-festival-package-koh-samui/` (from 2,700) · Phangan private transfer. Supporting: Full Moon Party from Samui, FMP dates, Koh Samui to Koh Phangan, vs page. Sister: **kohphangan.com** (the single link).
- **Images needed:** Haad Rin from the sea · Thong Sala pier · speedboat crossing · Bottle Beach (licensed) · party crowd from a distance (no identifiable faces).
- **Word target:** 1,300 · **Schema:** Article, BreadcrumbList, FAQPage, `Place` (Koh Phangan, `geo`).

#### `/koh-tao/`† · D5 · GUIDE
- **Primary keyword:** koh tao from koh samui · **Secondary:** koh nang yuan; nang yuan entrance fee; koh tao island guide. ("Ferry" belongs to `/koh-samui-to-koh-tao/`; "day trip" to the product.)
- **Title tag:** Koh Tao from Koh Samui 2026: Island & Nang Yuan Guide · **Meta description:** Koh Tao and Koh Nang Yuan from Koh Samui: 1.5–2 h by fast boat, the 250 THB Nang Yuan fee and its rules, snorkelling and diving, and day trip vs staying over.
- **H1:** Koh Tao and Koh Nang Yuan from Koh Samui (2026)
- **Answer-first lead:** Koh Tao is 1.5–2 hours north of Samui by fast boat (~700 THB). It is Thailand's dive-training hub, with clear water and small bays. Next door, Koh Nang Yuan's three islets joined by sandbars charge a 250 THB landing fee and ban plastic bottles, fins and drones. A day trip from Samui covers both.
- **At-a-glance box:** Gulf, north of Phangan · [Mae Haad pier GPS: take] · boats ~08:00–16:00 · Nang Yuan 250 adult, child 100–120 [U] · Feb–Sep; rough crossings Oct–Dec · day trip or 2+ nights · n/a · n/a · hotel pickup from most areas on the day trip.
- **Section outline (H2 → H3):** At a glance · Map · Koh Nang Yuan (viewpoint walk [check]; island rules) · Snorkelling and diving (Open Water ~14,000 on Tao vs ~18,000 started from Samui [S]) · Day trip or stay over? (table) · Getting there (summary → `/koh-samui-to-koh-tao/`) · Season and sea · FAQ.
- **Map:** Mae Haad, Nang Yuan, Samui departure piers. Chips: Ferry · Snorkel · Dive.
- **Tables / data blocks:** Day trip vs overnight (Cost · Time on Tao · Best for) · fees and rules box.
- **FAQ:** How far is Koh Tao from Koh Samui? · Can you visit Koh Tao as a day trip from Samui? · How much is the Koh Nang Yuan entrance fee? · What can't you bring to Koh Nang Yuan? · Is Koh Tao good for snorkelling? · Should I learn to dive on Koh Tao? · Is the crossing rough?
- **Money links · Supporting guides · Sister-site link:** Koh Tao & Nang Yuan day trip (2,200; say "speedboat", **no guest numbers**) · Private speedboat · Diving (enquiry). Supporting: diving, snorkelling, Koh Samui to Koh Tao, islands near Samui. Sister: none.
- **Images needed:** Nang Yuan sandbars from the viewpoint · Mae Haad pier · snorkellers in clear water · speedboat at Nang Yuan · dive class.
- **Word target:** 1,300 · **Schema:** Article, BreadcrumbList, FAQPage, `Place` + `TouristAttraction` (Nang Yuan, `geo`).

---

#### Nightlife and festivals

**Venue status here is as of Oct 2026.** Re-check every named venue at writing time, and monthly afterwards. Never link a venue; ticketed products link only to our own pages.

#### `/koh-samui-nightlife/` · D4 · HUB
- **Primary keyword:** koh samui nightlife · **Secondary:** chaweng nightlife; best bars koh samui; koh samui clubs; what's on tonight koh samui; muay thai koh samui tonight
- **Title tag:** Koh Samui Nightlife 2026: Clubs, Bars & What's On Tonight · **Meta description:** Koh Samui nightlife in 2026: Chaweng clubs, beach fire shows, live music, Muay Thai nights, alcohol hours and holy-day bans, safety and how to get home.
- **H1:** Koh Samui Nightlife: Clubs, Bars and What's On Tonight (2026)
- **Answer-first lead:** Chaweng is the centre of Samui nightlife: the Soi Green Mango clubs (nightly ~21:00–04:00), ARKbar's free beach fire shows (20:00–24:00), live-band bars and two Muay Thai stadiums (no fights on Thursdays). Lamai is smaller and older; Fisherman's Village, Bang Rak and the west coast do beach clubs and sunset bars. Shops may sell alcohol 11:00–24:00 since 29 May 2026; licensed venues stay open later.
- **Section outline (H2 → H3):**
  1. **What's on tonight**: widget generated from the events CPT recurrence rules (O10 cheat sheet; "Live now / Tonight" chips).
  2. **Map of Koh Samui nightlife**.
  3. **Nightlife areas compared** (table).
  4. **Chaweng** (summary → `/chaweng-nightlife-koh-samui/`).
  5. **Lamai** (summary → `/lamai-nightlife-koh-samui/`).
  6. **Fisherman's Village and Bophut** (Coco Tam's fire shows ~19:15 and 21:00; Friday Walking Street).
  7. **Bang Rak and Plai Laem** (Chi Samui, Tembo with Mon and Fri sunset DJs, Malika, 79 Beach Club).
  8. **Maenam and the west coast** (Cape Away Sunday party; Nikki Beach on Sat and Sun; resort sunset bars as context).
  9. **Beach clubs and pool parties** (→ beach clubs page).
  10. **Live music and cabaret**: Bar Solo (live cover bands); Paris Follies Cabaret, three shows nightly [U, undated source: verify]; **Starz Cabaret closed in 2021, so don't list it**.
  11. **Muay Thai fight nights** (table; buy at the box office, not from touts; Chaweng Stadium reported closed).
  12. **Parties on Koh Phangan from Samui**: Full Moon Party dates; shared boat 1,400; Half Moon Magic Forest nights; Jungle Experience (Mon 23 Nov, Wed 23 Dec, Wed 30 Dec 2026, age 20+ with ID); Waterfall Party (11, 22 and 26 Nov 2026 [S]).
  13. **Alcohol laws and holy-day bans**: sales 11:00–24:00; drinking age 20; hotels and licensed entertainment venues are exempt and may open to ~02:00–04:00 by zone; ban days Sun 21 Feb, Thu 20 May, 18–19 Jul [U] and ~15 Oct 2027 [U], when hotels and licensed bars can still serve but 7-Eleven can't; **no ban days in Nov–Dec 2026**. Show the auto banner on ban days.
  14. **What a night out costs** [check beer, cocktail and club-entry prices in Chaweng; FV happy-hour cocktails ~99 [S]; ARKbar NYE 2025 was free before 21:00 and 500 THB after].
  15. **Staying safe at night**: drink spiking and assault warnings (FCDO); **vapes illegal** (fines, detention, reported extortion); cannabis: illegal to buy without a prescription, never smoke in public (fines up to 25,000 THB); no scooter after drinking; carry an ID copy.
  16. **Getting home**: Grab works best in Chaweng, Bophut and Lamai; taxis are negotiated (+20–30% after 22:00 [S]); songthaews stop ~22:00.
  17. **Koh Samui nightlife: questions and answers**.
  18. **Party at night, the sea by day** (CTA).
- **Map (Leaflet POIs + filter chips):** Soi Green Mango, ARKbar, Bar Solo, SEEN (Avani Chaweng), Elephant Beach Club, both stadiums, Coco Tam's, Chi Samui, Tembo, Cape Away, Nikki Beach, Shamrock (Lamai), walking streets [GPS: take each]. Chips: Clubs · Bars · Beach clubs · Live music · Muay Thai · Markets.
- **Tables / data blocks:** Areas (Area · Vibe · Best nights · Late?) · Muay Thai (Stadium · Nights · Start · Tickets): Samui International, Tue/Fri/Sun, fights ~21:00, 1,500 / 2,000 ringside / 2,500 VIP (3,000 VIP premium; children 6–10 half price); Phetchbuncha, Mon/Wed/Sat, 21:00, 1,500 / 2,000 / 2,500 · weekly cheat sheet (Mon–Sun) · ban-day table.
- **FAQ (exact questions, 5–12):** Where is the nightlife on Koh Samui? · Is Koh Samui's nightlife as good as Koh Phangan's? · What time do bars close on Koh Samui? · Can you buy alcohol on Buddhist holidays? · Which nights are the Muay Thai fights? · Is Green Mango open every night? · How do I get to the Full Moon Party from Koh Samui? · Is Lamai good for nightlife? · How do I get home at night? · Is Koh Samui nightlife safe for solo women?
- **Money links · Supporting guides · Sister-site link:** FMP shared speedboat (1,400) · FMP private speedboat · Half Moon package (from 2,700) · Muay Thai `/koh-samui-muay-thai/` (enquiry or commission). Supporting: events, party calendar, FMP dates, drugs and law, getting around. Sister: kohphangan.com/koh-phangan-nightlife/ [check that the URL resolves].
- **Images needed:** Soi Green Mango at night (no identifiable faces) · ARKbar fire show · live band · Muay Thai ring (with stadium permission) · beach club sunset · walking street at night · speedboat at night for FMP (own photo) · Grab car pickup.
- **Word target:** 3,500 (K1 pillar; twin unreadable)
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `NightClub`/`BarOrPub`/`Place` with `geo` (no `url` to venues).

#### `/chaweng-nightlife-koh-samui/`† · D4 · GUIDE
- **Primary keyword:** chaweng nightlife · **Secondary:** soi green mango; ark bar chaweng; chaweng bars; chaweng clubs
- **Title tag:** Chaweng Nightlife 2026: Bars, Clubs & Fight Nights Guide · **Meta description:** Chaweng nightlife street by street: Soi Green Mango clubs to 04:00, ARKbar fire shows, live bands, beach clubs, Muay Thai nights, scams and getting home.
- **H1:** Chaweng Nightlife: Bars, Clubs and Fight Nights (2026)
- **Answer-first lead:** Chaweng's nightlife runs on three tracks. Soi Green Mango holds the clubs (Green Mango nightly ~21:00–04:00, busiest after midnight). The beach has ARKbar's free fire shows and DJs nightly 20:00–24:00, with pool parties often on Wednesdays and Fridays 14:00–19:00 [S]. Then there are the two Muay Thai stadiums (Tue/Fri/Sun and Mon/Wed/Sat). Saturday is the peak night.
- **Section outline (H2 → H3):** Chaweng after dark at a glance · Map · Soi Green Mango · ARKbar and the beach bars · Live music (Bar Solo) · Cabaret (Paris Follies [U]; Starz closed) · Beach clubs (SEEN at Avani: Fri "Ignite", Sat pool party, Sun brunch [S]; Elephant Beach Club: Sat DJs to 03:00 [S]) · Muay Thai stadiums · Late food (Chaweng Walking Street Thu–Sat; Si Khao 17:00–23:00) · Scams and safety (touts, bar bills, spiking, jet-ski "damage" claims the next day) · Getting home · FAQ.
- **Map:** venues and stadiums [take each]. Chips: Club · Beach bar · Live music · Muay Thai · Late food.
- **Tables / data blocks:** Night-by-night table (Mon–Sun) · price check box [check].
- **FAQ:** What time does Green Mango open and close? · Is ARKbar free to enter? · Which night is best in Chaweng? · Where can I watch Muay Thai in Chaweng? · Is there a cabaret show in Chaweng? · Where can I eat late in Chaweng? · How do I get back to my hotel after midnight? · Is Chaweng nightlife safe?
- **Money links · Supporting guides · Sister-site link:** FMP shared speedboat · Muay Thai (enquiry) · Ang Thong speedboat (closure logic, "the day after"). Supporting: nightlife pillar, Chaweng, beach clubs, drugs and law. Sister: none.
- **Images needed:** Green Mango entrance · fire show on the sand · live band · stadium ring · walking-street food late at night.
- **Word target:** 1,800 · **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `Place` with `geo`.

#### `/lamai-nightlife-koh-samui/`† · D4 · GUIDE
- **Primary keyword:** lamai nightlife · **Secondary:** lamai bars; shamrock lamai; lamai night out
- **Title tag:** Lamai Nightlife 2026: Bars, Live Bands & Beach Parties · **Meta description:** Lamai nightlife in 2026: a nightly Irish-pub band, reggae and rock bars, beach fire shows, the night-market bar, what's closed and getting to Chaweng and back.
- **H1:** Lamai Nightlife: Bars, Live Bands and Beach Parties (2026)
- **Answer-first lead:** Lamai's nightlife is smaller and older than Chaweng's. Shamrock Irish Pub (open since 2005) has a show band nightly 21:30–01:30, Rock Bar plays reggae and rock until midnight, and Teddy Weed runs beach parties and fire shows until 02:00 [all S]. Beach Republic is largely closed, so don't plan around it.
- **Section outline (H2 → H3):** Lamai after dark at a glance · Map · Shamrock · Rock Bar · Teddy Weed · The night-market bar (live music) · What's closed (Beach Republic) · Muay Thai in Lamai (no current stadium schedule [U]; training at Lamai Muay Thai Camp) · Getting to Chaweng and back (songthaew 30–40 local by day; Grab; taxi at night) · FAQ.
- **Map:** venues, night market. Chips: Bar · Beach · Market.
- **Tables / data blocks:** Venue table (Venue · Style · Hours · Confidence).
- **FAQ:** Is Lamai good for nightlife? · Where is the live music in Lamai? · Is Beach Republic still open? · How far is Chaweng from Lamai at night? · Is Lamai quieter than Chaweng? · Are there Muay Thai fights in Lamai?
- **Money links · Supporting guides · Sister-site link:** FMP shared speedboat · Pig Island speedboat · Muay Thai (enquiry). Supporting: Lamai, nightlife pillar, markets. Sister: none.
- **Images needed:** pub band · beach fire show · night-market bar · Lamai Beach Road at night.
- **Word target:** 1,300 · **Schema:** Article, BreadcrumbList, FAQPage.

#### `/koh-samui-beach-clubs/` · D4 · GUIDE
- **Primary keyword:** koh samui beach clubs · **Secondary:** best beach club koh samui; pool party koh samui; sunday brunch koh samui; nikki beach samui
- **Title tag:** Koh Samui Beach Clubs 2026: Pool Parties & Brunch Guide · **Meta description:** Koh Samui beach clubs night by night: Chaweng pool parties, north-coast sunset DJs, Sunday brunches, minimum spends, what ++ means and what's closed.
- **H1:** Koh Samui Beach Clubs: Pool Parties, Sunset DJs and Brunch (2026)
- **Answer-first lead:** The busiest beach clubs are on Chaweng (ARKbar, SEEN at Avani, Elephant Beach Club), around Bang Rak and Plai Laem (Chi Samui, Tembo, Malika, 79 Beach Club), Coco Tam's in Fisherman's Village, Cape Away's Sunday party in Maenam and Nikki Beach at Lipa Noi on the west coast. Beach Republic in Lamai has been largely closed in 2025–26.
- **Section outline (H2 → H3):** Weekly beach-club calendar · Map · Clubs compared · Chaweng clubs · North coast clubs · Maenam · West coast and sunset bars · Brunches (SEEN Sun family brunch; Nikki Beach Sun) · Entry, minimum spends and dress ("++" = 10% service + 7% VAT) · Children at beach clubs [check per venue] · Big dates (Songkran, NYE, Zamna at SEEN on 21 Feb 2026, no 2027 date announced) · Safety (sun, alcohol and swimming, jellyfish) · Arriving by boat [check landing feasibility per venue with Mea] · FAQ.
- **Map:** all clubs [take]. Chips: Chaweng · North coast · West coast · Brunch · Sunset.
- **Tables / data blocks:** Calendar (Mon: Tembo sunset DJ · Wed: ARKbar pool party · Fri: ARKbar pool party, SEEN Ignite · Sat: SEEN pool party, Elephant late DJs, Nikki Beach · Sun: Cape Away, SEEN and Nikki brunches) with a confidence column · compare (Club · Area · Vibe · Signature night · Status).
- **FAQ:** What is the best beach club on Koh Samui? · Which beach clubs have pool parties? · Where is the best Sunday brunch on Koh Samui? · Do beach clubs charge entry? · What does "++" mean on prices? · Are beach clubs child-friendly? · Is Beach Republic open? · Can you arrive at a beach club by boat?
- **Money links · Supporting guides · Sister-site link:** Private speedboat · Sunset cruise · Catamaran charter · FMP shared speedboat. Supporting: nightlife, sunset spots, Chaweng, Lipa Noi. Sister: none.
- **Images needed:** pool party (licensed, no identifiable faces) · sunset DJ deck · beanbags at Coco Tam's · brunch table · catamaran offshore.
- **Word target:** 2,200 · **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `Place` with `geo`.

#### `/koh-samui-buffalo-fighting/`† · D4 · GUIDE (cultural explainer; no promotion)
- **Primary keyword:** buffalo fighting koh samui · **Secondary:** samui buffalo fight; buffalo fighting thailand; is buffalo fighting legal thailand
- **Title tag:** Buffalo Fighting on Koh Samui: A Cultural Explainer · **Meta description:** What buffalo fighting on Koh Samui is, its history at New Year and Songkran, what Thai law says, welfare concerns and why we don't list dates or sell tickets.
- **H1:** Buffalo Fighting on Koh Samui: What It Is and Why We Don't List It
- **Answer-first lead:** Buffalo fighting is a traditional southern Thai contest in which two bulls lock horns until one turns away, with betting central to the event. On Samui it has historically been held at small village arenas around New Year and Songkran. We found no confirmed 2025–26 venues or dates, and we don't list, sell or give directions to fights.
- **Section outline (H2 → H3):** What buffalo fighting is · Its history on Samui (no venue names, no locations, no ticket prices) · What Thai law says (the Animal Welfare Act B.E. 2557 exempts traditional practices; gambling is a separate grey area) · The welfare concerns, and our position · Why we don't publish dates · Other ways to see Samui's culture (temples, festivals, markets, the cooking class) · FAQ.
- **Map (Leaflet POIs + filter chips):** **none** (deliberately).
- **Tables / data blocks:** none. One "Our position" callout box.
- **FAQ:** Is there buffalo fighting on Koh Samui? · Is buffalo fighting legal in Thailand? · When are buffalo fights held? · Can tourists attend a buffalo fight? · Do you sell buffalo-fight tickets?
- **Money links · Supporting guides · Sister-site link:** **No body money links** (a documented exception to F3; the default sidebar stays). Supporting: Thai culture, temples, events. Sister: none.
- **Images needed:** water buffalo grazing in a field (not fighting) · a rural Samui landscape. No fight imagery.
- **Word target:** 900 · **Schema:** Article, BreadcrumbList, FAQPage.

---

#### Food, shopping and culture

#### `/koh-samui-restaurants/` · D4 · HUB
- **Primary keyword:** koh samui restaurants · **Secondary:** where to eat koh samui; best restaurants koh samui; michelin koh samui; koh samui food; southern thai food samui
- **Title tag:** Koh Samui Restaurants 2026: Where to Eat by Area & Budget · **Meta description:** Where to eat on Koh Samui in 2026: southern dishes to try, the Bib Gourmand, the best areas for seafood, markets, vegan food, prices, tipping and food safety.
- **H1:** Koh Samui Restaurants: Where to Eat, What to Order and What It Costs (2026)
- **Answer-first lead:** Eat southern Thai and seafood: try wai khua (octopus in coconut milk), southern sour curry and khua kling. For dining, go to Fisherman's Village; for seafood on the sand, Bang Por and Bang Rak; for cheap eats, the Lamai and Nathon night markets. Samui's MICHELIN Bib Gourmand for 2026 is Baan Suan Lung Khai in Taling Ngam (book ahead).
- **Section outline (H2 → H3):**
  1. **Koh Samui restaurants at a glance** (table).
  2. **Map: where to eat on Samui**.
  3. **Samui dishes to try**. H3 each: wai khua · gaeng som / gaeng lueang · gaeng tai pla · khua kling · moo hong · pad sataw goong · khanom jeen with southern curry · crab curry with betel leaves. H3: How to order spice levels.
  4. **MICHELIN on Koh Samui**: Bib Gourmand 2026 Baan Suan Lung Khai (11:00–14:00 and 16:30–19:00; reservation required). Michelin's 2026 Bib list counts two Samui venues; name the second only after checking. Other listed names (Bang Por Seafood (Takho), Khao Horm, Kapi Sator, Phensiri, Jun Hom, Long Dtai, FishHouse, Saffron at Banyan Tree, Koh Thai Kitchen) need their 2026 status checked one by one.
  5. **Restaurants by area**. H3s: Chaweng · Fisherman's Village and Bophut · Lamai · Maenam · Choeng Mon and Plai Laem · Bang Rak · West coast (Bang Por, Lipa Noi, Taling Ngam) · South and Hua Thanon. Each H3 gives 3–6 named places (verified as open, no links), price level and a "Local tip" slot.
  6. **Night markets and street food** (→ `/koh-samui-markets/`).
  7. **Seafood** (→ `/koh-samui-seafood/`).
  8. **Vegan, vegetarian and healthy food** [field list; "jay" yellow-flag stalls].
  9. **International food** [field list].
  10. **Coffee and breakfast** (→ cafés page).
  11. **Dinners with a view**: The Jungle Club hillside (~1,500 THB for two; book 3 days ahead [S]); resort sky bars as context.
  12. **Prices and budgets**: street dishes 60–120; market dinner 300–500 pp; mid-range and fine-dining bands [check]; what "++" means.
  13. **Tipping and paying**: cash vs card; always decline DCC; service charge.
  14. **Food safety**: ice, water, seafood freshness, allergies (peanut, shellfish, fish sauce).
  15. **Booking and seasons**: book for NYE and high season; low-season closures [check].
  16. **Koh Samui restaurants: questions and answers**.
  17. **Taste Samui on the water** (CTA).
- **Map (Leaflet POIs + filter chips):** dining areas, markets, the Bib Gourmand [take], seafood strips (Bang Por 9.5781, 99.9369; Bang Rak 9.5572, 100.0533). Chips: Thai · Seafood · Market · Michelin · Vegan · Sunset.
- **Tables / data blocks:** At a glance (Style · What to expect · Where) · dishes table (Dish · What it is · Spice) · budget table.
- **FAQ (exact questions, 5–12):** What food is Koh Samui known for? · Where are the best restaurants on Koh Samui? · Are there MICHELIN restaurants on Koh Samui? · Where can I eat cheaply on Samui? · Is street food safe on Koh Samui? · Do I need to tip in restaurants? · What does "++" mean on a menu? · Where can I find vegan food on Samui? · Where should I eat seafood? · Do restaurants close in the rainy season?
- **Money links · Supporting guides · Sister-site link:** Cooking class `/koh-samui-cooking-class/` (enquiry) · Pig Island Sunset Tour† (dinner included) · Private speedboat (restaurant stop). Supporting: markets, seafood, cafés, Fisherman's Village, budget guide. Sister: kohphangan.com/koh-phangan-restaurants/.
- **Images needed:** wai khua plate · southern curry spread · Fisherman's Village dining street · seafood on ice at Bang Por · night-market noodles · vegan bowl · sunset dinner table · khanom jeen stall.
- **Word target:** 3,800 (K1 pillar; twin ~3,100)
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `Restaurant` (name, address, `geo`; **no `url`**).

#### `/koh-samui-seafood/`† · D4 · GUIDE
- **Primary keyword:** koh samui seafood · **Secondary:** seafood restaurant koh samui; bang por seafood; lamai seafood market; hua thanon fish market
- **Title tag:** Koh Samui Seafood 2026: Where to Eat & How to Order · **Meta description:** The best areas for seafood on Koh Samui (Bang Por, Bang Rak, Taling Ngam, Lamai) and how to order by weight without overpaying, plus local dishes and prices.
- **H1:** Koh Samui Seafood: Where to Eat It and How to Order (2026)
- **Answer-first lead:** For seafood, head to Bang Por in the north-west, the beach restaurants of Bang Rak, Taling Ngam in the south-west (Baan Suan Lung Khai, Bib Gourmand 2026) or the Lamai Seafood Market (daily ~17:00–24:00 [S]). Order by weight, and check whether the price is per kilo or per 100 g before the fish goes on the grill.
- **Section outline (H2 → H3):** Map · Best areas for seafood (table) · Bang Por · Bang Rak · Taling Ngam and Thong Krut · Lamai and Chaweng seafood markets · Hua Thanon fish market (mornings) · How to order (weight, scales, cooking-style charge, set menus) · Samui seafood dishes (wai khua; crab curry with betel leaves; squid in coconut curry; grilled prawns 80–120 at markets) · What it costs [field-check per-kg prices] · Sustainability (skip shark fin; ask about the local catch) · Allergies and food safety · FAQ.
- **Map:** seafood strips, Lamai Seafood Market, Hua Thanon, Bib Gourmand. Chips: Restaurant strip · Market · Fish market.
- **Tables / data blocks:** Area table (Area · Style · Sunset? · Price level) · ordering checklist.
- **FAQ:** Where is the best seafood on Koh Samui? · How is seafood priced in Thailand? · Is Bang Por good for seafood? · Can I buy fish at Hua Thanon and have it cooked? [check] · What is wai khua? · Is seafood safe to eat on Samui? · Do I need to book Baan Suan Lung Khai?
- **Money links · Supporting guides · Sister-site link:** Pig Island Sunset Tour† (dinner) · Fishing trips `/koh-samui-fishing/` (enquiry; the catch is cooked [S]) · Pig Island private longtail†. Supporting: restaurants, markets, Taling Ngam, Hua Thanon. Sister: none.
- **Images needed:** seafood display on ice · grilled prawns · crab curry · fish market morning · beach tables at dusk.
- **Word target:** 2,000 · **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `Place` with `geo`.

#### `/koh-samui-markets/` · D4 · HUB
- **Primary keyword:** koh samui night market · **Secondary:** koh samui markets; lamai night market; nathon night market; street food koh samui; market today koh samui
- **Title tag:** Koh Samui Night Markets 2026: What's Open Tonight & Map · **Meta description:** Every Koh Samui night market and walking street by day: Fisherman's Village Friday, Chaweng Thu–Sat, the daily Lamai and Nathon markets, prices and a live map.
- **H1:** Koh Samui Night Markets: What's Open Tonight, Map and Every Market Day (2026)
- **Answer-first lead:** The firm weekly fixtures are Fisherman's Village Walking Street on Friday (~17:00–23:00, with smaller markets Mon and Wed) and Chaweng Walking Street, Thursday to Saturday, by Chaweng Lake. Daily options: Lamai Night Market, Nathon Night Market (busiest Tuesday), Si Khao and Central Samui in Chaweng, and the new Free Wave Market in Bophut. The Maenam Thursday and Lamai Sunday walking streets may have stopped, so check locally.
- **Section outline (H2 → H3):**
  1. **What's open tonight**: widget from the events CPT recurrence; "weather permitting" plus the weather widget.
  2. **The weekly market calendar** (table).
  3. **Map of Koh Samui's markets**.
  4. **The walking streets** (full section here, anchor `#walking-streets`; see the merged brief below).
  5. **Daily night markets**. H3s: Lamai Night Market (from ~17:00, before the bridge) · Nathon Night Market (~16:00/16:30–22:00) · Si Khao (17:00–23:00) · Central Samui market · Food Village, ex-Chaweng Night Market [U] · Free Wave Market, Bophut (16:00–24:00, new 2025) · Plaza The Green Market, Bangrak (~15:00–22:00 [S]) · Maenam J&J Street Food (12:00–24:00 [S]) · Lamai Seafood Market (17:00–24:00 [S]).
  6. **Fresh and morning markets**: Lamai fresh market 06:00–20:00; Hua Thanon fish market; others [check].
  7. **Special and occasional markets**: Samui Green Market (last Sunday of the month); the moving market [U]; temple fairs and the Chak Phra fair in Nathon [U]; Red Cross Fair ~Feb [U].
  8. **What to eat at a Samui market** (H3 per dish).
  9. **What things cost** (table).
  10. **Money, etiquette and getting there**: cash; bargain for goods, not food; parking at The Wharf; Friday towing in Fisherman's Village.
  11. **Markets in the rainy season** (Nov–Dec rain-offs).
  12. **Koh Samui markets: questions and answers**.
  13. **Taste Koh Samui** (CTA).
- **Map (Leaflet POIs + filter chips):** every market [GPS: take each; Lamai fresh market 9.4716, 100.0470]. Chips: Tonight · Walking street · Daily · Fresh/morning · Uncertain.
- **Tables / data blocks:** Weekly calendar (Day · Evening markets · Every day) · prices (Dish · Typical THB): pad thai 60–80 · mango sticky rice 50–80 · grilled prawns 80–120 · satay ~10/stick · cocktail ~99 · market dinner 300–500 pp · others [check] · status column (firm / uncertain / discontinued).
- **FAQ (exact questions, 5–12):** What is the best night market on Koh Samui? · What day is the Fisherman's Village market? · Is there a night market every day on Koh Samui? · When is the Chaweng walking street? · Is the Lamai Sunday market still running? · How much cash should I bring to a market? · Is market food safe to eat? · Are the markets open when it rains?
- **Money links · Supporting guides · Sister-site link:** Cooking class (enquiry) · Ang Thong speedboat (closure logic) · Pig Island speedboat. Supporting: walking streets, restaurants, Fisherman's Village, Lamai, Nathon. Sister: kohphangan.com/koh-phangan-markets/.
- **Images needed:** Friday market crowd · Lamai night-market grill · Nathon waterfront stalls · fresh market morning · mango sticky rice · market at dusk in light rain (honest).
- **Word target:** 2,500 (twin ~1,900)
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `Place` with `geo`; recurring markets also exist as `Event` items in the CPT.

#### `/koh-samui-walking-streets/`† · D4 · GUIDE
> **Merge note (review H3):** this overlaps `/koh-samui-markets/` and `/fishermans-village-walking-street/`. Build it as a **section of `/koh-samui-markets/`** (anchor `#walking-streets`) rather than a separate URL, and move its FAQs into the markets page. Keep the brief below as the outline for that section.
- **Primary keyword:** fisherman's village walking street · **Secondary:** koh samui walking street; chaweng walking street; maenam walking street; lamai walking street
- **Title tag:** Koh Samui Walking Streets 2026: Fisherman's Village & More · **Meta description:** Which Koh Samui walking streets still run in 2026: Fisherman's Village every Friday, Chaweng Thursday to Saturday, and the status of Maenam, Lamai and Nathon.
- **H1:** Koh Samui Walking Streets: Which Still Run and When (2026)
- **Answer-first lead:** Two walking streets run for certain. Fisherman's Village in Bophut runs every Friday (~17:00–23:00; road closed from ~16:30; smaller markets Mon and Wed). Chaweng Walking Street by Chaweng Lake runs Thursday–Saturday (~16:00/17:00–22:00/23:00). The Maenam Thursday and Lamai Sunday walking streets may have stopped after the pandemic, and Nathon's Saturday street has ended.
- **Section outline (H2 → H3):** Status table (last verified date) · Map · Fisherman's Village on Friday (route from The Wharf to Coco Tam's; parking 20/40+; towing 500+; arrive 17:30–18:00; fire shows) · Chaweng Walking Street · Maenam Thursday (uncertain) · Lamai Sunday (uncertain) · Nathon Saturday (discontinued) · What to buy, and haggling · What to eat · Rain and season · FAQ.
- **Map:** the five locations, colour-coded by status. Chips: Running · Uncertain · Ended.
- **Tables / data blocks:** Status (Street · Day · Hours · Status · Last checked).
- **FAQ:** What day is the Fisherman's Village walking street? · What time does it start and finish? · Where do I park? · Is there a walking street in Chaweng? · Is the Maenam walking street still on? · Is the Lamai Sunday walking street still on? · Is there a walking street in Nathon?
- **Money links · Supporting guides · Sister-site link:** Ang Thong speedboat (closure logic) · Pig Island speedboat · Koh Tao & Nang Yuan ("Friday night out, Saturday on the water"). Supporting: markets, Fisherman's Village, Chaweng. Sister: none.
- **Images needed:** Fisherman's Village Friday crowd · Chaweng Walking Street stalls · handmade souvenirs · street-food queue.
- **Word target:** 1,800 · **Schema:** Article, BreadcrumbList, FAQPage; `Event` (recurring) via the CPT.

#### `/koh-samui-shopping-malls/`† · D4 · GUIDE
- **Primary keyword:** central samui · **Secondary:** koh samui shopping mall; shopping koh samui; big c samui; supermarket koh samui
- **Title tag:** Koh Samui Shopping 2026: Central Samui, Big C & More · **Meta description:** Shopping on Koh Samui: Central Samui mall in Chaweng, Big C, Lotus's and Makro, ATM fees, SIM shops, VAT refunds, what not to buy and rainy-day options.
- **H1:** Koh Samui Shopping: Central Samui, Supermarkets and What to Buy (2026)
- **Answer-first lead:** Samui's one big mall is Central Samui in Chaweng, opposite Chaweng Lake, with Chaweng Walking Street beside it Thursday–Saturday. For groceries there are the hypermarkets Big C (Bophut ring road), Lotus's (Chaweng) and Makro, whose AEON ATMs charge 150 THB per foreign-card withdrawal against the usual 220–250 THB.
- **Section outline (H2 → H3):** Map · Central Samui (hours [check]; former name [check]; events: free NYE countdown, Songkran foam party 13–15 Apr 12:00–24:00 (2025 pattern), Neon Run, beach volleyball) · Supermarkets and hypermarkets (Big C, Lotus's, Makro; others [check]) · Phones, SIMs and pharmacies (AIS and True shops; tourist SIMs 499 / 699 / 1,199 THB for 8 / 15 / 30 days; passport needed) · Money (ATM fees; DCC; VAT refund rules and whether USM has a refund counter [check]) · Tailors and local crafts [check] · What not to buy (counterfeits; vapes, which are illegal; coral and shells; Buddha images may need an export permit [check]) · Rainy-day shopping · FAQ.
- **Map:** Central Samui, Big C, Lotus's, Makro [take]. Chips: Mall · Supermarket · ATM.
- **Tables / data blocks:** Store table (Store · Area · Hours [check] · Good for) · ATM fee box.
- **FAQ:** Is there a shopping mall on Koh Samui? · What are Central Samui's opening hours? · Where is the cheapest ATM on Samui? · Where can I buy a SIM card on Samui? · Can I get a VAT refund on Koh Samui? · What shouldn't I buy in Thailand?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat (the west/south rainy-season option) · Cooking class (enquiry) · Spa `/koh-samui-spa/`. Supporting: SIM and Wi-Fi, banks and money, markets, Chaweng. Sister: none.
- **Images needed:** Central Samui exterior · supermarket aisle · SIM counter · lakeside walking street.
- **Word target:** 1,500 · **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `ShoppingCenter`/`Store` with `geo`.

#### `/koh-samui-cafes/`† · D4 · GUIDE
- **Primary keyword:** koh samui cafes · **Secondary:** coffee koh samui; best cafe koh samui; laptop cafe koh samui; breakfast koh samui
- **Title tag:** Koh Samui Cafés 2026: Coffee, Breakfast & Work Spots · **Meta description:** Koh Samui cafés by area: specialty coffee, Thai iced coffee, breakfast and brunch, laptop-friendly spots with Wi-Fi and prices. Every café checked in person.
- **H1:** Koh Samui Cafés: Coffee, Breakfast and Places to Work (2026)
- **Answer-first lead:** Samui's cafés cluster in Fisherman's Village and Bophut, Chaweng and Lamai, with a growing number of specialty roasters and laptop-friendly spaces. Expect roughly 60–150 THB for a coffee [check]. **Our research found no current, verified café list, so names go in only after a field visit.**
- **Section outline (H2 → H3):** Map (field-verified pins only) · Cafés by area (H3: Bophut · Chaweng · Lamai · Maenam · West coast) · Specialty coffee and Thai coffee (oliang, cha yen) · Work-friendly cafés (Wi-Fi, power, etiquette) → coworking guide · Breakfast and brunch (resort brunches: SEEN on Sunday; Nikki Beach on Sunday) · Local coffee or cacao [check for Samui farms] · Prices · FAQ.
- **Map:** cafés [field list]. Chips: Specialty · Breakfast · Work-friendly · Sea view.
- **Tables / data blocks:** Café table (Name · Area · Good for · Wi-Fi · Price level), filled after the field visit.
- **FAQ:** Where is the best coffee on Koh Samui? · Are there laptop-friendly cafés on Samui? · How much is a coffee on Koh Samui? · Where can I get breakfast early before a tour pickup? · What is Thai iced coffee?
- **Money links · Supporting guides · Sister-site link:** Cooking class (enquiry) · Ang Thong speedboat (closure logic) · Pig Island speedboat. Supporting: restaurants, coworking, Fisherman's Village. Sister: none.
- **Images needed:** latte art · Thai iced tea · laptop in a café · breakfast plate · café frontage.
- **Word target:** 1,500 · **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `CafeOrCoffeeShop` (no `url`).

#### `/history-of-koh-samui/`† · D4 · GUIDE
- **Primary keyword:** history of koh samui · **Secondary:** koh samui history; koh samui coconut island; nathon history; samui airport history
- **Title tag:** History of Koh Samui: From Coconut Island to Today · **Meta description:** The history of Koh Samui: fishing villages and coconut farms, Hainanese traders in Nathon, the Muslim village at Hua Thanon, the 1989 airport and Samui today.
- **H1:** The History of Koh Samui: From Coconut Island to Today
- **Answer-first lead:** For most of its history Samui was an island of fishing villages and coconut plantations, with Nathon as its port and Hainanese Chinese families among its traders. Tourism began with backpackers in the 1970s [check], Bangkok Airways opened the airport in 1989, and the whole island became one city municipality in 2012. Today about 70,000 people are registered residents.
- **Section outline (H2 → H3):** Samui's history at a glance (timeline table) · Early settlement and the name (present the theories as theories [check]) · The coconut economy [check figures before using any] · Hainanese Chinese families and Nathon · Hua Thanon's Muslim fishing community (mosque 1984) · Buddhism on Samui (Wat Samret >150 years [S]; Luang Pho Daeng d. 1970s; Big Buddha [date U, don't state]; Secret Buddha Garden 1976/1990; Wat Plai Laem 2004–09) · The ring road and the first tourists [check dates] · The airport (1989; expansion to 6 m passengers/year and gates 7 → 11, completion targeted 2030) · Local government (subdistrict municipality 1999 → town 2008 → city 2012) · Storms (Tropical Storm Pabuk, Jan 2019, closed ferries and Ang Thong) · Samui today (White Lotus effect 2025; 30-day visa exemption from 15 Sep 2026) · FAQ.
- **Map:** heritage points (Nathon, Hua Thanon, Wat Samret, Wat Khunaram, Big Buddha). Chips: Heritage.
- **Tables / data blocks:** Timeline (Year · Event · Source confidence).
- **FAQ:** How old is Koh Samui as a destination? · Why is Koh Samui called the coconut island? · When did tourism start on Koh Samui? · When was Samui airport built? · Who owns Samui airport? · Is Koh Samui a city?
- **Money links · Supporting guides · Sister-site link:** Jungle safari (heritage stops; enquiry) · Ang Thong speedboat · Pig Island speedboat. Supporting: temples, Thai culture, Nathon, Hua Thanon, airport. Sister: none.
- **Images needed:** coconut palms with old plantation feel · Nathon shophouses · Hua Thanon boats · archive-style photo (licensed only) · airport open-air terminal.
- **Word target:** 2,500 · **Schema:** Article, BreadcrumbList, FAQPage.

#### `/thai-culture-and-traditions/` · D4 · GUIDE
- **Primary keyword:** thai culture and traditions · **Secondary:** thai etiquette for tourists; temple etiquette thailand; koh samui culture; thai customs dos and don'ts
- **Title tag:** Thai Culture & Traditions on Koh Samui: Etiquette 2026 · **Meta description:** Thai culture on Koh Samui: the wai, temple etiquette, the monarchy and the law, southern Thai, Chinese and Muslim traditions, and the laws visitors break.
- **H1:** Thai Culture and Traditions: An Etiquette Guide for Koh Samui (2026)
- **Answer-first lead:** The basics: return a wai with a smile; never touch someone's head or point your feet at people or Buddha images; cover shoulders and knees at temples; and never criticise the monarchy, because Thailand's lèse-majesté law carries prison sentences. Samui adds southern Thai, Hainanese Chinese and Muslim traditions to the Buddhist calendar.
- **Section outline (H2 → H3):** Etiquette at a glance (do/don't table) · The wai and greetings · The monarchy and the law (lèse-majesté [check wording; keep it factual]) · Buddhism and temple etiquette (→ temples) · Spirit houses · Samui's cultures: southern Thai, Hainanese Chinese and the Muslim village at Hua Thanon · Festivals calendar, Nov 2026–Dec 2027 (table; sky lanterns banned on Samui) · Language basics (sawasdee, khop khun, khrap/kha) · Food culture (sharing; spoon and fork) · Dress and beach etiquette (public nudity illegal [check]) · Saving face, bargaining and tipping · Muay Thai traditions (wai kru) · Contested traditions (→ buffalo-fighting explainer) · Laws visitors break by accident (vapes illegal; cannabis public smoking banned; alcohol on holy days; disrespect to Buddha images) · FAQ.
- **Map:** none (culture page). Optional: a link to the temples map.
- **Tables / data blocks:** Do/don't table · festival table (dates as on the temples page) · phrase table.
- **FAQ:** What is the wai and should tourists do it? · What should I not do in Thailand? · What should I wear in Koh Samui? · Is it illegal to criticise the Thai king? · Can I touch a monk? · Do Thais expect tips? · What festivals happen on Koh Samui? · Is vaping illegal in Thailand?
- **Money links · Supporting guides · Sister-site link:** Cooking class (enquiry) · Muay Thai (enquiry) · Jungle safari (enquiry). Supporting: temples, history, festivals and events, drugs and law. Sister: none. **The slug may also exist on kohphangan.com: write original Samui-specific copy, self-canonical, no duplicated paragraphs.**
- **Images needed:** a wai greeting (models with release) · spirit house with offerings · temple shoes-off sign · eco krathong · Muay Thai wai kru (permission) · Chinese shrine incense.
- **Word target:** 3,000 · **Schema:** Article, BreadcrumbList, FAQPage.

---

#### Wellness

The retreats hub `/koh-samui-retreats/` (D8) owns "koh samui retreats". The pages below own their subtopics and link up to it. The C1 menu items "Massage, sauna and spa" and "Golf, tennis and padel" point to the existing `/koh-samui-spa/` and `/koh-samui-golf/` URLs (one page per keyword).

#### `/koh-samui-yoga/`† · D4 · GUIDE
- **Primary keyword:** koh samui yoga · **Secondary:** yoga retreat koh samui; yoga classes koh samui; drop in yoga samui; yoga teacher training koh samui
- **Title tag:** Koh Samui Yoga 2026: Studios, Retreats & Drop-In Classes · **Meta description:** Yoga on Koh Samui: cliffside studios, resort classes, multi-day retreats and teacher trainings, how Samui differs from Phangan, and the best season.
- **H1:** Koh Samui Yoga: Studios, Retreats and Teacher Trainings (2026)
- **Answer-first lead:** Samui's yoga is led by resorts and retreats rather than a village scene like Koh Phangan's Sri Thanu. Vikasa on the cliffs between Chaweng Noi and Coral Cove, Absolute Sanctuary near Choeng Mon and wellness resorts such as Kamalaya at Laem Set run daily classes and multi-day programmes. Studio prices change often, so confirm them directly.
- **Section outline (H2 → H3):** Why Samui yoga is different from Phangan's · Yoga styles you can practise (table) · Drop-in classes vs retreats vs teacher trainings (H3 each) · Well-known studios and retreats (H3: Vikasa, 9.4861, 100.0658 · Absolute Sanctuary, 6-night retreats from ~US$2,152 [S] · Kamalaya, from ~US$1,836 for 3 nights, 3-night minimum [S] · Samahita Retreat [check location and status] · Other names [field list]; named, never linked) · Map · How to choose (H3: safety and etiquette in class) · Best season (table) · Where to stay for yoga · Combine yoga with spa, detox and meditation · Combine yoga with island tours (H3: Ang Thong · Pig Island · Koh Tao) · FAQ · Retreats on Koh Samui (→ hub) · More from the guide.
- **Map:** studios and retreats [take]. Chips: Studio · Retreat · Resort.
- **Tables / data blocks:** Styles (Style · What it's like · Good for) · season (Period · What to expect).
- **FAQ:** Where is the best area for yoga on Koh Samui? · Can beginners do yoga on Koh Samui? · Do I need to book drop-in classes in advance? · How long is a yoga teacher training? · What is the best time of year for a yoga retreat on Samui? · Is Koh Samui or Koh Phangan better for yoga? · What should I bring to a class? · Can I combine yoga with island tours?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat · Ang Thong speedboat (closure logic) · Koh Tao & Nang Yuan. Supporting: retreats hub, meditation, wellness resorts, spa. Sister: kohphangan.com/koh-phangan-yoga/.
- **Images needed:** cliffside yoga shala at sunrise · class in session (release) · mats on a sea-view deck · meditation corner · Ang Thong kayak (cross-sell).
- **Word target:** 3,000 (twin ~2,900)
- **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `Place`/`SportsActivityLocation` with `geo` (no `url`).

#### `/koh-samui-meditation/`† · D4 · GUIDE
- **Primary keyword:** meditation koh samui · **Secondary:** meditation retreat koh samui; silent retreat samui; vipassana koh samui; temple meditation thailand
- **Title tag:** Meditation on Koh Samui 2026: Retreats, Temples & Classes · **Meta description:** Meditation on Koh Samui: temple silent retreats, resort and studio classes, mainland options nearby, what to expect, the rules, the costs and the best season.
- **H1:** Meditation on Koh Samui: Silent Retreats, Temples and Classes (2026)
- **Answer-first lead:** There are three routes on Samui: temple-based silent retreats (Dipabhavan, the Suan Mokkh branch in the hills above Lamai [check]), resort and studio classes (Samui International Meditation Center in Bophut [S]; wellness resorts such as Kamalaya and Absolute Sanctuary), and longer mainland retreats near Chaiya [check]. Temple retreats are usually donation-based and strict about silence and early starts [check].
- **Section outline (H2 → H3):** Types of meditation on Samui (table) · Temple silent retreats [check schedules] · Classes at studios and resorts · Mainland retreats nearby [check] · What to expect, and the rules (silence, dress, phones, food) · Etiquette with monks · Best season · Combine with yoga and spa · FAQ.
- **Map:** centres [take, once verified]. Chips: Temple · Studio · Resort.
- **Tables / data blocks:** Types (Type · Length · Cost · Strictness).
- **FAQ:** Can tourists meditate at temples on Koh Samui? · Are there silent retreats on Koh Samui? · How much does a meditation retreat cost? · Do I need experience to join? · What should I wear to a temple retreat? · Can I combine meditation with a holiday?
- **Money links · Supporting guides · Sister-site link:** Pig Island Sunset Tour† · Boutique Yachting Day (4,500) · Pig Island speedboat. Supporting: temples, yoga, wellness resorts, Thai culture, retreats hub. Sister: none.
- **Images needed:** meditation hall (permission) · forest path at a temple · cushion and bell · sunrise sitting on a deck.
- **Word target:** 1,800 · **Schema:** Article, BreadcrumbList, FAQPage.

#### `/koh-samui-wellness-resorts/`† · D4 · GUIDE
- **Primary keyword:** detox koh samui · **Secondary:** wellness resort koh samui; detox retreat koh samui; kamalaya; absolute sanctuary
- **Title tag:** Koh Samui Detox & Wellness Resorts 2026: Prices Compared · **Meta description:** Koh Samui detox and wellness resorts compared: Kamalaya from ~US$1,836 for 3 nights, Absolute Sanctuary from ~US$2,152 for 6, spa resorts and medical cautions.
- **H1:** Koh Samui Detox and Wellness Resorts: Programmes and Prices (2026)
- **Answer-first lead:** Samui's two best-known wellness resorts are Kamalaya at Laem Set (programmes from ~US$1,836 for 3 nights to ~US$4,954 for 7, with a 3-night minimum, including 10% service and 7% VAT [S]) and Absolute Sanctuary near Choeng Mon (6-night retreats from ~US$2,152, 5 minutes from the airport [S]). Spa resorts and the Tamarind Springs day spa suit a lighter reset.
- **Section outline (H2 → H3):** Wellness resorts compared (table) · Kamalaya · Absolute Sanctuary · Spa resorts and day spas (Six Senses, Banyan Tree, Tamarind Springs with jungle rock pools; context only) · Types of programmes (detox and fasting, fitness, sleep, yoga) · Medical cautions (fasting with medication; consult a doctor) · What it really costs, and "++" · Best season (Feb–Apr dry; Oct–Dec rain suits indoor programmes) · A resort retreat or a DIY wellness week? · Light boat days to add · FAQ.
- **Map:** resorts [take; Kamalaya on Laem Set Rd]. Chips: Resort · Day spa.
- **Tables / data blocks:** Compare (Resort · Area · Minimum stay · From price · Focus · Confidence).
- **FAQ:** What is the best detox resort on Koh Samui? · How much does a wellness retreat on Samui cost? · Is there a minimum stay? · Are detox programmes safe? · When is the best time for a wellness retreat? · Can I visit a wellness resort spa without staying? · Detox resort or yoga retreat: which suits me?
- **Money links · Supporting guides · Sister-site link:** Boutique Yachting Day (4,500) · Sunset cruise · Pig Island speedboat. Supporting: retreats hub, yoga, spa, meditation, Bang Kao and the south. Sister: none.
- **Images needed:** hillside spa pavilion · healthy meal · rock-pool spa (licensed) · consultation room · infinity pool at dawn (licensed).
- **Word target:** 2,200 · **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `HealthAndBeautyBusiness`/`Resort` (no `url`).

#### `/koh-samui-spa/` · D4 · GUIDE
- **Primary keyword:** koh samui spa · **Secondary:** thai massage koh samui; massage prices koh samui; best spa koh samui; sauna koh samui
- **Title tag:** Koh Samui Spa & Massage 2026: Prices, Areas & Etiquette · **Meta description:** Spa and massage prices on Koh Samui in 2026: Thai massage 300–500 THB an hour, oil massage, resort spas, saunas, how to choose a safe shop, and tipping.
- **H1:** Koh Samui Spa and Massage: Prices, Areas and Etiquette (2026)
- **Answer-first lead:** A one-hour Thai massage costs about 300–500 THB on Samui: 400–600 in Chaweng, 300–450 in Lamai and 300–400 in Bophut and Maenam. An oil massage runs 400–700. Resort spas charge 1,800–3,500, and the top spas 2,500–10,000 or more.
- **Section outline (H2 → H3):** Massage prices by area (table) · Map · Types of massage (Thai, oil, foot, herbal compress; others [check]) · Street shops vs day spas vs resort spas · Notable spas, as context (Tamarind Springs, Six Senses, Banyan Tree, Kamalaya; no links) · Saunas and herbal steam [check what exists on Samui] · Choosing a good shop (hygiene, therapist training [check certification]) · Health cautions (pregnancy, injuries, sunburn) · Beach massage · Tipping [check norm] · Booking (enquiry CTA until a partner is confirmed) · FAQ.
- **Map:** spa areas and named spas [take]. Chips: Street shop · Day spa · Resort spa.
- **Tables / data blocks:** Prices (Treatment · Street shop · Day spa · Resort) · area table.
- **FAQ:** How much is a Thai massage on Koh Samui? · What is the best spa on Koh Samui? · Is Thai massage painful? · Should I tip after a massage? · Is beach massage safe? · Can I have a massage when pregnant? · Is there a sauna on Koh Samui? · Do I need to book a spa in advance?
- **Money links · Supporting guides · Sister-site link:** Pig Island speedboat · Ang Thong speedboat (closure logic) · Boutique Yachting Day. Enquiry CTA on the page itself. Supporting: wellness resorts, yoga, retreats hub. Sister: none.
- **Images needed:** Thai massage in progress (release) · herbal compress · resort spa room · beach massage sala · foot massage chairs.
- **Word target:** 3,300 (parity floor, P0.2; was 2,200)· **Schema:** Article, BreadcrumbList, FAQPage, `Service` (enquiry, no offers until a partner is confirmed).

#### `/koh-samui-gyms/`† · D4 · GUIDE
- **Primary keyword:** koh samui gym · **Secondary:** fitness koh samui; muay thai gym koh samui; crossfit koh samui; running koh samui
- **Title tag:** Koh Samui Gyms & Fitness 2026: Muay Thai, Gyms & Runs · **Meta description:** Training on Koh Samui in 2026: Muay Thai camps (drop-in from 500 THB), gyms, running routes and races like the Samui Half Marathon, heat tips and costs.
- **H1:** Koh Samui Gyms and Fitness: Muay Thai, Gyms and Races (2026)
- **Answer-first lead:** Training on Samui centres on Muay Thai camps, for example Superpro Samui (drop-in 500 THB, weekly 2,500–3,000, monthly 7,500–10,000 [S]) and Lamai Muay Thai Camp (Mon–Sat 07:00–19:00 [S]). Add resort and commercial gyms [field list] and annual races such as the Samui Half Marathon (21 Jun in 2026) and the Neon Run (30 May 2026).
- **Section outline (H2 → H3):** Training options compared (table) · Muay Thai camps (→ `/koh-samui-muay-thai/`; the Muay Thai track of the DTV "soft power" visa) · Gyms and CrossFit [field list] · Running routes and races (Half Marathon; Neon Run; Samui Trail; Santa Run, mid-Dec [U]) · Outdoor fitness (beach workouts, SUP and kayak) · Heat and hydration · What it costs · FAQ.
- **Map:** camps and gyms [take; Lamai Muay Thai Camp 9.4600, 100.0412]. Chips: Muay Thai · Gym · Running.
- **Tables / data blocks:** Compare (Place · Type · Drop-in · Week · Month · Confidence) · race calendar.
- **FAQ:** Where can I train Muay Thai on Koh Samui? · How much is a gym day pass on Samui? · Are there CrossFit boxes on Koh Samui? · When is the Samui Half Marathon? · Is it too hot to run on Samui? · Can I get a visa to train Muay Thai?
- **Money links · Supporting guides · Sister-site link:** Muay Thai (enquiry) · Kayak & SUP (guide) · Ang Thong speedboat (kayaking). Supporting: Muay Thai, visa guide, events, golf. Sister: none.
- **Images needed:** pad work at a camp (release) · gym interior · runners on the ring road at dawn · SUP at sunrise.
- **Word target:** 1,600 · **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `SportsActivityLocation` (no `url`).

#### `/koh-samui-golf/` · D4 · GUIDE (shared by the Tours "Golf" item and the Wellness "Golf, tennis and padel" item)
- **Primary keyword:** koh samui golf · **Secondary:** santiburi golf; golf course koh samui; tennis koh samui; padel koh samui
- **Title tag:** Koh Samui Golf, Tennis & Padel 2026: Courses & Courts · **Meta description:** Golf on Koh Samui: Santiburi's 18 holes (~5,600 THB with caddie and cart), the 9-hole Royal Samui, tee-time tips, the best season, and tennis and padel.
- **H1:** Koh Samui Golf, Tennis and Padel: Courses and Courts (2026)
- **Answer-first lead:** Samui has one full course, Santiburi Samui Country Club in Mae Nam (18 holes, par 72, 6,930 yd), where 18 holes cost ~5,600 THB and 9 holes 2,825, caddie and cart included [S]. There is also the 9-hole Royal Samui Golf & Country Club in the Bophut hills (par 33, no caddies, fees unpublished). Tennis and padel courts are mostly at resorts and clubs [field list].
- **Section outline (H2 → H3):** Courses compared (table) · Santiburi Samui Country Club · Royal Samui Golf & Country Club [check current fees] · Tee times and the best season (early starts; Oct–Dec rain) · Golf etiquette and dress · Tennis (resort and public courts [field list]) · Padel [field list: clubs, court fees] · Getting there · Enquire (until a partner is confirmed) · FAQ.
- **Map:** Santiburi [take], Royal Samui [take], courts. Chips: Golf · Tennis · Padel.
- **Tables / data blocks:** Compare (Venue · Holes/courts · Fee · Includes · Confidence).
- **FAQ:** How many golf courses are on Koh Samui? · How much is a round at Santiburi? · Do I need to book a tee time? · What should I wear to play golf? · Where can I play tennis on Koh Samui? · Is there padel on Koh Samui?
- **Money links · Supporting guides · Sister-site link:** Enquiry CTA (this page) · Private speedboat · Ang Thong speedboat (closure logic). Supporting: gyms and fitness, Maenam, wellness resorts. Sister: none.
- **Images needed:** Santiburi fairway (licensed) · hillside 9-hole green · tennis court at a resort · padel court.
- **Word target:** 2,000 (parity floor, P0.2; was 1,800)· **Schema:** Article, BreadcrumbList, FAQPage, ItemList of `GolfCourse`/`SportsActivityLocation` (no `url`).

---

#### P3.9 Open items this part adds for Mea (append to Part N)
1. The departure pier for our Ang Thong boats, and the Thong Krut meeting point. Is the 400 THB surcharge waived for guests who meet the boat at the pier?
2. The private sailing catamaran price on Pig Island pages (21,000 or 27,000 THB).
3. Field checks: Samui café list; vegan list; Plai Laem and Laem Set beach conditions; the Maenam and Lamai walking streets; the Chaweng Lake viewpoint GPS; the Big Buddha step count and parking fee; Coral Cove reef condition; tennis and padel venues; whether a public herbal sauna exists.
4. Insider tips for the "[Local tip: ask Mea]" slots, especially Pig Island animal care, the best Friday parking in Fisherman's Village, and seafood restaurants he trusts.
5. (Removed: an earlier note said the kohphangan.com beaches and hiking pages were thin. Direct measurement shows 3,541 and 2,709 words; the reader tool had a truncated copy.)


### P4. Pages kohphangan.com has that the first sitemap missed (add them to Part C)

#### `/koh-samui-parties/` · D4 · HUB
- **Primary keyword:** koh samui parties · **Secondary:** party in koh samui, koh samui pool party, full moon party from koh samui, koh samui beach party tonight, koh samui party boat
- **Title tag:** Koh Samui Parties 2026: Beach Clubs, Boats & Full Moon · **Meta:** Where to party on Koh Samui in 2026: weekly beach-club nights, pool parties, Full Moon and Half Moon boats from Samui, and how to get home safely.
- **H1:** Koh Samui parties: what's on every night
- **Answer-first lead:** Chaweng is Samui's party centre (ARKbar beach parties, Green Mango until ~04:00), Fisherman's Village and Bangrak are for sunset beach clubs, and the biggest nights are the Full Moon and Half Moon parties on Koh Phangan, 30–50 min away by boat. Book the shared Full Moon boat for 1,400 THB return with pickup.
- **Section outline:**
  1. Tonight on Samui (live list from the events CPT plus the weekly cheat sheet, O10)
  2. Weekly party calendar Mon–Sun (table: night · venue type · area · typical start)
  3. Chaweng: beach bars, clubs, Soi Green Mango (honest notes: touts, prices, late taxis)
  4. Beach clubs and pool parties (SEEN, Nikki Beach, Coco Tam's, Chi, Tembo; no links)
  5. Lamai, Bophut and Maenam nights
  6. Full Moon Party from Samui (dates O8 · boat options · our products)
  7. Half Moon, Jungle Experience and Waterfall parties from Samui (dates O8; packages)
  8. New Year's Eve and Songkran parties
  9. Party boats and private boat parties (charter fleet O12, Red Baron junk)
  10. Rules and the law: alcohol hours 11:00–24:00, holy-day bans (licensed venues exempt), drugs, vapes (O5)
  11. Getting home safely: Grab coverage, taxi prices, no drink-riding, drink spiking warning
  12. What it costs (table: beer, cocktail, entry, taxi home)
  13. Where to stay for nightlife (Chaweng vs Lamai vs Bophut)
  14. FAQ
- **Data blocks:** party map (venues, plus piers for the FMP boats), weekly table, "next Full Moon" countdown (`kpg-fmp`), ticker
- **FAQ:** Where is the best party on Koh Samui? · Is there a Full Moon Party on Koh Samui? · How do I get from Samui to the Full Moon Party and back? · What night is the big party in Chaweng? · What time do clubs close on Samui? · Are there pool parties on Samui? · Can I buy alcohol on Buddhist holidays? · Is Samui safe at night? · How much does a night out cost? · What's on New Year's Eve?
- **Money links:** FMP shared boat · FMP private boat · Half Moon package · private charter (party boat) · **Supporting:** nightlife, events, FMP dates, where to stay · **Sister:** kohphangan.com Full Moon Party dates
- **Images:** Chaweng beach fire show at night · beach-club pool party · Full Moon boat at Haad Rin · Fisherman's Village at night · NYE fireworks over Chaweng (6–10)
- **Word target:** ≥ 3,909 (twin) · **Schema:** Article, ItemList (venues as Place, no URLs), Event (upcoming), FAQPage

#### `/koh-samui-boat-charter/` · D2 · HUB/MONEY
- **Primary keyword:** koh samui boat charter · **Secondary:** private boat koh samui, boat rental koh samui, catamaran charter samui, yacht charter koh samui price ("speedboat charter samui" belongs to `/koh-samui-private-speedboat/`)
- **Title tag:** Koh Samui Boat Charter 2026: Speedboats, Catamarans & Yachts · **Meta:** Charter a private speedboat, catamaran or yacht from Koh Samui. 16 boats from 19,000 THB per boat: Ang Thong, Pig Island, Phangan, Koh Tao. Written quote, pay online.
- **H1:** Koh Samui boat charter: private speedboats, catamarans and yachts
- **Answer-first lead:** Private boats on Samui run from about 19,000 THB a day for a small speedboat to 255,000 THB for a large motor yacht, priced per boat, not per person. Tell us your date, group size and islands, and we send a written quote; you pay online to confirm.
- **Section outline:**
  1. Our fleet at a glance (filterable cards from O12: type, max guests, price basis, from-price)
  2. Speedboat vs catamaran vs motor yacht vs junk (comparison table: speed, comfort, best trips, price range)
  3. Where you can go (Ang Thong, Pig Island/Koh Tan/Koh Rap, Koh Som & Tongson Bay, Koh Phangan beaches, Koh Tao & Nang Yuan, sunset coast): time each way, best season
  4. Sample itineraries (half day, full day, sunset, Full Moon)
  5. What's included and extra (crew, fuel, snorkel gear, drinks; park fees, lunch, transfers: per boat)
  6. Seasons and prices (whether we price low/high/peak is [ask Mea]; Ang Thong closed 1 Nov–15 Dec)
  7. Weather and safety (sea conditions widget; cancellation for unsafe seas = refund or new date)
  8. Weddings, proposals, corporate and cruise-ship groups
  9. How booking works (enquiry → quote → pay link; THB)
  10. FAQ
- **Data blocks:** fleet grid with filters (type, guests, price); destination map with routes; sea-conditions widget; quote form (date, guests, boat type, destination, pickup pier) → WhatsApp/email
- **FAQ:** How much is a private boat on Koh Samui? · Is the price per person or per boat? · Can we go to Ang Thong in November? · Which pier do charters leave from? · Can the boat pick us up at our beach? · Is lunch included? · Can we bring our own drinks? · What if the weather is bad? · Can we charter a boat for the Full Moon Party? · Do you have boats with toilets?
- **Money links:** each fleet product/enquiry · Ang Thong private · Pig Island private · FMP private · **Supporting:** sea conditions, Ang Thong guide, islands near Samui · **Sister:** speedboatsamui.com in "Our other sites" only
- **Images:** one hero per boat type, plus destination photos (12–30)
- **Word target:** ≥ 3,478 · **Schema:** CollectionPage, ItemList of Product (offers in THB, `priceSpecification` per boat), Service, FAQPage

#### `/koh-samui-water-sports/` · D4 · GUIDE
- **Keywords:** koh samui water sports · jet ski koh samui, kayak koh samui, paddle board samui, parasailing chaweng, kitesurf samui
- **Title tag:** Koh Samui Water Sports 2026: Jet Ski, Kayak, SUP, Kite · **Meta:** Every water sport on Koh Samui with 2026 prices, best beaches, seasons and safety: jet skis (and scams), kayaks, SUP, kitesurfing, diving and snorkelling.
- **H1:** Water sports on Koh Samui
- **Outline:** 1. At a glance (table: sport · where · season · price range · age) 2. Snorkelling (Koh Tan, Ang Thong, Silver Beach, Coral Cove) 3. Diving (Sail Rock, Koh Tao; season Feb–Oct) 4. Kayaking and SUP (Coral Cove ~300 THB/h; calm bays) 5. Jet skis: rules, the damage-claim scam, how to protect yourself (photos, no passport deposit) 6. Kitesurfing and wing foil (NE monsoon wind Oct–Feb on the east/north coasts [check]) 7. Parasailing and banana boats (Chaweng) 8. Fishing trips (day 1,500 THB, night squid) 9. Water sports for kids 10. Safety: red flags, jellyfish, boat traffic 11. FAQ
- **FAQ (8):** Can you jet ski on Koh Samui? · Is jet skiing safe and legal? · Where is the best snorkelling? · Can beginners kitesurf on Samui? · Where can I rent a paddleboard? · Is there parasailing in Chaweng? · When is the sea calm? · Are there jellyfish?
- **Money:** Pig Island (snorkel), Ang Thong (kayak), private speedboat, Koh Tao snorkel · **Word target:** ≥ 3,419 · **Schema:** Article, ItemList, FAQPage

#### `/koh-samui-wildlife/` · D4 · GUIDE
- **Keywords:** koh samui wildlife · pink dolphins samui, monitor lizards samui, snakes koh samui, birds samui, marine life samui
- **Title:** Koh Samui Wildlife 2026: Pink Dolphins, Reefs & Jungle · **Meta:** What wildlife you can see on and around Koh Samui (pink dolphins, reef fish, hornbills, monitor lizards), where to see it ethically, and what to avoid.
- **Outline:** 1. Where to see wildlife (map) 2. Pink (Indo-Pacific humpback) dolphins off the south-west coast: the Pink Dolphins & Pig Island tour, best season [check], ethics 3. Reef life at Ang Thong, Koh Tan and Sail Rock (whale sharks occasionally at Sail Rock [check]) 4. Jungle animals: monitor lizards, squirrels, birds, macaques [check] 5. Snakes and safety (what to do) 6. Box jellyfish (O5) 7. Elephants: ethical rules (no riding, no bathing) 8. Animal attractions to avoid (captive tiger, monkey and snake shows; flag the closed venues) 9. Stray dogs and cats, and how to help (local shelters, by name only, no links [check]) 10. FAQ
- **FAQ (8):** Can you see dolphins from Koh Samui? · Are there dangerous snakes? · Are there monkeys on Samui? · Is there a tiger zoo? · Where is the best reef? · Are the elephant camps ethical? · What do I do about a jellyfish sting? · Are stray dogs dangerous?
- **Money:** Pink Dolphins & Pig Island · Ang Thong · Pig Island speedboat · elephant sanctuary guide · **Word target:** ≥ 3,318

#### `/koh-samui-wedding/` · D4 · GUIDE (enquiry money page)
- **Keywords:** koh samui wedding · beach wedding koh samui, wedding on a boat samui, koh samui wedding cost, legal marriage thailand foreigners
- **Title:** Koh Samui Wedding 2026: Beach, Boat & Villa Weddings · **Meta:** Plan a Koh Samui wedding: best beaches and months, beach vs villa vs boat ceremonies, Thai legal marriage steps, typical costs and a private-boat wedding option.
- **Outline:** 1. Best months (Feb–Apr, dry; avoid Nov) 2. Venues by type: beach, villa, resort, boat (no venue links) 3. Symbolic vs legal marriage in Thailand (embassy affirmation, translation, the Amphur in Nathon/Ko Samui district office [check]) 4. Buddhist blessing ceremony 5. Budget table (small, mid, luxury) [check ranges] 6. Wedding on a private boat or catamaran (our fleet) 7. Guest logistics (flights, transfers, ferries) 8. Weather plan B 9. Photographers and permits (drones) 10. FAQ
- **FAQ (8):** Is it legal for foreigners to marry in Thailand? · How much does a Samui wedding cost? · Best month for a beach wedding? · Can we marry on a boat? · Do we need a permit for a beach ceremony? · How far ahead should we book? · Can guests stay in a villa together? · What if it rains?
- **Money:** catamaran charter, yacht charter, villas, honeymoon page · **Word target:** ≥ 3,378 · **Schema:** Article, FAQPage

#### `/koh-samui-freediving/` · D4 · GUIDE
- **Keywords:** freediving koh samui · freediving course samui, freediving koh tao from samui
- **Outline:** 1. Can you freedive on Samui? (most schools are on Koh Tao and Koh Phangan; honest) 2. Courses and levels (table) 3. Day trips from Samui (Sail Rock, Ang Thong reef) 4. Season and visibility 5. Safety (never alone) 6. Where to stay 7. FAQ (8) · **Money:** Koh Tao day trip, private speedboat; **Sister:** kohphangan.com freediving · **Word target:** ≥ 2,441
- **FAQ (exact questions, 8):** Can you go freediving on Koh Samui? · Where is the nearest freediving school to Samui? · How deep can a beginner freedive? · What is the best month for freediving visibility? · Can I do a freediving course as a day trip from Samui? · Do I need to be a strong swimmer? · Is freediving safe? · What should I bring to a freediving course?

#### `/koh-samui-beauty-salons/` · D4 · GUIDE
- **Outline:** nail, hair, lash and brow, barbers by area (no links; names only after checking), price table, hygiene tips, bridal packages, FAQ (6) · **Word target:** ≥ 2,032
- **FAQ (exact questions, 6):** How much is a manicure on Koh Samui? · Where can I get a haircut in Chaweng? · Are salons on Samui hygienic? · Do salons on Samui offer bridal hair and make-up? · Do I need to book ahead? · Do salons accept cards?

#### `/fishermans-village-walking-street/` · D5 (recurring event page, like `/happy-saturday-zen-beach/`)
- **Keywords:** fisherman's village walking street · bophut night market friday, fisherman's village market times
- **Outline:** 1. When (Friday ~17:00–23:00; smaller Mon/Wed) 2. Where and parking (The Wharf, road closes ~16:30, scooter towing) 3. What to eat (price table) 4. What to buy 5. Getting there (Grab/taxi from Chaweng, Lamai, Maenam) 6. Nearby: Coco Tam's fire shows, sunset bars 7. Combine with a Pig Island sunset tour on another day 8. FAQ (7) · **Event schema** with weekly `eventSchedule` · **Word target:** ≥ 1,600
- **FAQ (exact questions, 8):** What day is the Fisherman's Village Walking Street? · What time does it start and finish? · Where do I park for the Friday market? · Is there a market on other nights? · What food is there and what does it cost? · Is it suitable for children? · How do I get there from Chaweng or Lamai? · Does the market run in the rain?

#### `/destinations/` + destination posts · D4 · HUB (clone of kohphangan.com `/destinations/`)
Posts, each ≥ the twin depth: **Koh Phangan from Samui** (≥ 3,373; links to kohphangan.com), **Koh Tao from Samui**, **Bangkok** (≥ 2,608: stopover guide and flights to Samui), **Khao Sok from Samui** (≥ 3,274: a 2-day plan, honest that it is not a day trip), **Krabi and Phuket from Samui** (flight and land routes), **Surat Thani** (gateway town). Each has a transport table, a 2–3-day plan, best season, and money links (Koh Tao day trip, FMP boat, private transfer).
- **FAQ (exact questions, 6):** What are the best trips from Koh Samui? · Can you visit Koh Phangan as a day trip from Samui? · Is Khao Sok a day trip from Koh Samui? · How do I get from Samui to Krabi or Phuket? · Should I stop in Bangkok before Samui? · Which island is better: Samui, Phangan or Tao?

#### News backlog for launch (`/koh-samui-news/`, NewsArticle, 400–800 words each, our own words)
1. Thailand cuts visa-free stays to 30 days (from 15 Sep 2026): what Samui visitors must know
2. Ang Thong Marine Park closes 1 Nov–15 Dec 2026: what to do instead
3. Loy Krathong and the Full Moon Party on the same night (24 Nov 2026): where to float a krathong on Samui (sky lanterns banned)
4. Alcohol now sold 11:00–24:00: what changed in 2026
5. Samui Airport expansion: 11 gates and 6 million passengers by 2030
6. Proposed tourist entry fee: not in force yet (status)


#### `/koh-samui-facts/` · D4 · GUIDE (AI-citation page)
- **Primary keyword:** koh samui facts · **Secondary:** koh samui in numbers, how big is koh samui, koh samui population, koh samui statistics
- **Title tag:** Koh Samui Facts & Figures 2026: Size, Prices, Transport · **Meta:** Koh Samui in numbers for 2026: 228.7 km², 51 km ring road, flights, ferries, weather, prices, emergency numbers and park fees, checked and dated.
- **H1:** Koh Samui facts and figures (2026)
- **Answer-first lead:** Koh Samui is Thailand's second-largest island (228.7 km²) in the Gulf of Thailand, about 35 km off Surat Thani, with a 51 km ring road, an airport run by Bangkok Airways and ferries to the mainland, Koh Phangan and Koh Tao.
- **Section outline:** 1. Geography (area, highest point Khao Pom 635 m, ring road, tambons, postcodes) 2. People and administration (population, city municipality since 2012) 3. Getting there (airport routes, flight time, fares; ferries with times and prices) 4. Getting around (taxi, Grab, songthaew, scooter prices; helmet fine) 5. Climate (month table) 6. Sea and boat seasons (Ang Thong closure) 7. Money (ATM fees, card use) 8. Entry rules (30-day visa exemption, TDAC, entry fee status) 9. Emergency numbers and hospitals 10. Typical prices 2026 (tours, massage, street food, beer, taxi) 11. Events calendar (next 12 months) 12. FAQ. Every table carries "Last verified {date}"; every fact comes from Part O.
- **Data blocks:** 10+ HTML tables; no prose padding.
- **FAQ (exact questions, 10):** How big is Koh Samui? · How many people live on Koh Samui? · How long is the Koh Samui ring road? · How far is Koh Samui from Bangkok? · Which airlines fly to Koh Samui? · What is the rainiest month on Koh Samui? · What is the emergency number on Koh Samui? · How long can I stay in Thailand without a visa? · How much does a taxi from Samui Airport cost? · When is Ang Thong Marine Park closed?
- **Money links:** tours hub, Ang Thong, Pig Island, FMP boat · **Word target:** 2,500 · **Schema:** Article, ItemList, FAQPage, Place (Koh Samui)

#### `/editorial-policy/` · utility · GUIDE (E-E-A-T)
- **Outline:** who writes (team, since 2006) · how we research (on-the-ground checks, official sources, operator timetables) · how we verify prices and dates (monthly; "Last verified" stamps) · what we sell and how we keep guides honest (we name downsides; we don't link competitors but we do mention them where it helps readers) · AI and tools policy (any drafting is reviewed and fact-checked by the team) · corrections (email, response time) · photo policy (our own or licensed).
- **FAQ (exact questions, 5):** Who writes the guides? · How often are prices checked? · Are your guides sponsored? · How do I report a mistake? · Do you use AI to write content?
- **Word target:** 900 · **Schema:** WebPage (AboutPage), FAQPage

#### `/sitemap/` · utility · HUB (HTML sitemap)
- All indexable URLs grouped as in the mega menu (Rank Math HTML sitemap block). Linked from the footer bottom bar. No FAQ needed beyond 3 lines; index, follow.

### P5. URL index (187 unique pages with a brief; tick each off in `/docs/parity.csv`)

**P1 money, hubs, events, company (67):** `/` · `/404` · `/about-us/` · `/activities/` · `/contact/` · `/faq/` · `/full-moon-party-dates/` · `/full-moon-party-from-koh-samui/` · `/koh-samui-atv-quad-bike/` · `/koh-samui-catamaran-charter/` · `/koh-samui-chinese-new-year/` · `/koh-samui-christmas-new-year/` · `/koh-samui-cooking-class/` · `/koh-samui-diving/` · `/koh-samui-elephant-sanctuary/` · `/koh-samui-events/` · `/koh-samui-fishing/` · `/koh-samui-golf/` · `/koh-samui-jet-ski/` · `/koh-samui-jungle-safari/` · `/koh-samui-kayak-sup/` · `/koh-samui-kitesurfing/` · `/private-speedboat-koh-samui-to-koh-phangan/` · `/koh-samui-loy-krathong/` · `/koh-samui-muay-thai-fight-nights/` · `/koh-samui-muay-thai/` · `/koh-samui-news/` · `/koh-samui-party-calendar-2026-2027/` · `/koh-samui-private-speedboat/` · `/koh-samui-retreats/` · `/koh-samui-snorkeling/` · `/koh-samui-songkran/` · `/koh-samui-spa/` · `/koh-samui-sunset-cruise/` · `/koh-samui-tours/` · `/koh-samui-travel-guide/` · `/koh-samui-villas/` · `/koh-samui-yacht-charter/` · `/koh-samui-zipline/` · `/places/` · `/privacy-policy/` · `/product/ang-thong-big-boat-tour-koh-samui/` · `/product/ang-thong-marine-park-day-tour-koh-samui/` · `/product/ang-thong-overnight-bungalow-koh-samui/` · `/product/ang-thong-overnight-camping-koh-samui/` · `/product/ang-thong-private-speedboat-koh-samui/` · `/product/ang-thong-vip-tour-koh-samui/` · `/product/boutique-yachting-day-koh-samui/` · `/product/discover-scuba-koh-samui/` · `/product/full-moon-party-private-speedboat-koh-samui/` · `/product/full-moon-party-speedboat-koh-samui/` · `/product/half-moon-festival-package-koh-samui/` · `/product/jet-ski-safari-pig-island/` · `/product/khao-sok-2-day-trip-koh-samui/` · `/product/koh-madsum-koh-tan-koh-rap-private-tour/` · `/product/koh-rap-full-day-private-tour/` · `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/` · `/product/padi-open-water-koh-samui/` · `/product/pig-island-longtail-tour/` · `/product/pig-island-private-longtail/` · `/product/pig-island-private-speedboat/` · `/product/pig-island-speedboat-tour/` · `/product/pig-island-sunset-tour/` · `/product/pink-dolphins-pig-island-tour/` · `/product/sail-rock-koh-tao-fun-dives-koh-samui/` · `/samui-regatta/` · `/terms-and-conditions/`

**P2 plan, health, living (50):** `/ang-thong-day-tour-vs-overnight/` · `/ang-thong-speedboat-vs-big-boat/` · `/bangkok-to-koh-samui/` · `/building-koh-samui/` · `/chaweng-vs-lamai/` · `/getting-around-koh-samui/` · `/how-to-get-to-koh-samui/` · `/koh-samui-airport/` · `/koh-samui-banks-money/` · `/koh-samui-beach-safety/` · `/koh-samui-bicycle-rental/` · `/koh-samui-budget/` · `/koh-samui-car-rental/` · `/koh-samui-coworking/` · `/koh-samui-dentist/` · `/koh-samui-drugs-alcohol-law/` · `/koh-samui-honeymoon/` · `/koh-samui-hospital/` · `/koh-samui-immigration-office/` · `/koh-samui-in-november/` · `/koh-samui-itinerary/` · `/koh-samui-lawyers/` · `/koh-samui-local-government/` · `/koh-samui-long-stay/` · `/koh-samui-motorbike-rental/` · `/koh-samui-pharmacies/` · `/koh-samui-police-station/` · `/koh-samui-real-estate/` · `/koh-samui-roads/` · `/koh-samui-scams/` · `/koh-samui-schools/` · `/koh-samui-sea-conditions/` · `/koh-samui-sim-card-wifi/` · `/koh-samui-tides/` · `/koh-samui-to-koh-phangan/` · `/koh-samui-to-koh-tao/` · `/koh-samui-tourist-police/` · `/koh-samui-travel-insurance/` · `/koh-samui-visa-extension/` · `/koh-samui-vs-koh-phangan-vs-koh-tao/` · `/koh-samui-weather/` · `/koh-samui-with-kids/` · `/opening-business-koh-samui/` · `/phuket-to-koh-samui/` · `/precautions-safety/` · `/surat-thani-to-koh-samui/` · `/thailand-visa-guide/` · `/where-to-stay-koh-samui-with-kids/` · `/where-to-stay-koh-samui/` · `/working-on-koh-samui/`

**P3 places, nature, nightlife, food, wellness (58):** `/ang-thong-marine-park/` · `/bang-kao-koh-samui/` · `/big-buddha-beach-koh-samui/` · `/big-buddha-koh-samui/` · `/chaweng-koh-samui/` · `/chaweng-nightlife-koh-samui/` · `/chaweng-noi-koh-samui/` · `/choeng-mon-koh-samui/` · `/coral-cove-koh-samui/` · `/fishermans-village-koh-samui/` · `/guan-yu-shrine-koh-samui/` · `/hin-lad-waterfall-koh-samui/` · `/hin-ta-hin-yai-koh-samui/` · `/history-of-koh-samui/` · `/hua-thanon-koh-samui/` · `/islands-near-koh-samui/` · `/koh-phangan/` · `/koh-samui-beach-clubs/` · `/koh-samui-beaches/` · `/koh-samui-buffalo-fighting/` · `/koh-samui-cafes/` · `/koh-samui-gyms/` · `/koh-samui-hiking/` · `/koh-samui-markets/` · `/koh-samui-meditation/` · `/koh-samui-nightlife/` · `/koh-samui-restaurants/` · `/koh-samui-seafood/` · `/koh-samui-shopping-malls/` · `/koh-samui-sunset-spots/` · `/koh-samui-temples/` · `/koh-samui-walking-streets/` · `/koh-samui-waterfalls/` · `/koh-samui-wellness-resorts/` · `/koh-samui-yoga/` · `/koh-tan-koh-samui/` · `/koh-tao/` · `/lad-koh-viewpoint-koh-samui/` · `/laem-sor-pagoda-koh-samui/` · `/lamai-koh-samui/` · `/lamai-nightlife-koh-samui/` · `/lipa-noi-koh-samui/` · `/maenam-koh-samui/` · `/na-muang-waterfall-koh-samui/` · `/nathon-koh-samui/` · `/overlap-stone-koh-samui/` · `/pig-island-koh-samui/` · `/plai-laem-koh-samui/` · `/secret-buddha-garden-koh-samui/` · `/silver-beach-koh-samui/` · `/taling-ngam-koh-samui/` · `/thai-culture-and-traditions/` · `/thong-krut-koh-samui/` · `/tongson-bay-koh-samui/` · `/wat-khunaram-koh-samui/` · `/wat-plai-laem-koh-samui/` · `/wat-sila-ngu-koh-samui/` · `/white-lotus-koh-samui/`

**Added in Part R:** `/koh-samui-facts/` · `/editorial-policy/` · `/sitemap/`

**P4 extra pages (9):** `/destinations/` · `/fishermans-village-walking-street/` · `/koh-samui-beauty-salons/` · `/koh-samui-boat-charter/` · `/koh-samui-freediving/` · `/koh-samui-parties/` · `/koh-samui-water-sports/` · `/koh-samui-wedding/` · `/koh-samui-wildlife/`
