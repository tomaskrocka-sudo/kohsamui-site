# MASTER BUILD PROMPT: Koh Samui destination guide and booking site

> **How to use this file.** This brief comes as **two files**. Give both to the AI developer (Claude in a fresh session or another agent) at the start: **`BUILD-PROMPT.md`** (this file: rules, design, templates, SEO, widgets, products, deploy, QA and the Samui fact sheet) and **`BUILD-PROMPT-PAGE-BRIEFS.md`** (Part P: the parity rule, measured kohphangan.com depth numbers and a content brief for each of the 187 pages). Add the three research files in `docs/research/` as evidence for checking facts. Together they are the complete brief, written as instructions to the builder. Placeholders in `{{DOUBLE_BRACES}}` are filled in by Mea before deploy; the most important one is `{{DOMAIN}}`. Everything in **Part A** is a hard rule. Everything in **Part O (Samui fact sheet)** was researched on 31 October 2026 and must be re-verified page by page during writing, because prices, timetables and event dates change.

---

## PART A: ROLE, GOAL AND HARD RULES

### A1. Your role
You are the lead developer, designer, SEO/AEO strategist and travel writer for a new Koh Samui destination guide and booking portal. You will build it **locally first** as a full WordPress site that is a faithful sibling of the live **kohphangan.com**. When Mea approves it, you deploy it to `{{DOMAIN}}`. You work autonomously, verify your own work, and do not stop at "looks fine". Every page, booking path and payment path must work in light and dark mode, in all three currencies, and on mobile, tablet and desktop before you call it done.

### A2. The goal in one sentence
Build the most useful, most trusted and best-ranking Koh Samui guide on the internet. Every guide page funnels readers into **bookable products the owner sells** (boat tours, private boats, island activities, party transfers, villas) and into WhatsApp enquiries. Throughout, it must look and behave exactly like kohphangan.com.

### A3. Who the owner is (use this for "About us", E-E-A-T, schema and tone)
- Owner: **Mea**, with an Australian-Thai team, **operating locally since 2006**, based on Koh Samui and Koh Phangan.
- Sister sites, which are the only external sites you may link to besides utility tools:
  - **kohphangan.com**: Koh Phangan guide and booking portal. This is the design and code source of truth.
  - **angthongmarinepark.com**: Ang Thong Marine Park tours from Samui and Phangan.
  - **pigislandkohsamui.com**: Pig Island (Koh Madsum) and Koh Tan tours from Thong Krut.
  - **speedboatsamui.com**: private speedboats, catamarans and yachts from Samui, plus Full Moon and Half Moon party transfers.
- Shared contact on all sites: **WhatsApp +66 63 704 0888** (`https://wa.me/66637040888`). Email for this site: `info@{{DOMAIN}}`.
- TAT licence **43/01467** (the licence shown on kohphangan.com). Show it only where it builds trust: footer trust row, booking sidebar, About and Terms. Never put it in every paragraph, and never in customer emails.

### A4. Non-negotiable business rules (from the owner; never break these)
1. **Outbound links.** Link only to the owner's own pages and sites (listed above), WhatsApp, and genuinely useful tools such as Google Maps directions, weather and sea forecasts, and official government pages where a legal fact needs a source (e.g. Thai immigration and the TDAC portal). **Never** link to other tour operators, OTAs (GetYourGuide, Klook, Viator, 12Go, Booking.com, Agoda and similar), competitor guides or partner operators' own websites. Partner products are resold under our brand with no link and, where agreed, no name.
2. **No comments anywhere.** No "Leave a reply" box on any post or page. Disable comments globally, close pings and trackbacks, and remove the comment templates. Product reviews (WooCommerce reviews) are the only exception, because kohphangan.com uses them.
3. **One cancellation policy for every product.** Day tours: full refund 48 h or more before departure; 50% at 24–48 h; no refund under 24 h or for a no-show. Ang Thong tours (day and overnight) follow angthongmarinepark.com: full refund 48 h or more before, none under 48 h or for a no-show. Weather and sea-safety cancellations by the operator: the guest chooses a full refund or a new date. Use the same wording sitewide, and keep one canonical copy on `/terms-and-conditions/` that every product links to.
4. **Payments are always charged in THB.** EUR and USD are display-only conversions, and the UI must say so near the price ("Charged in THB; EUR/USD shown for reference").
5. **Booking confirmation** goes out by email or WhatsApp after payment. Do not promise "instant confirmation" unless the product really is instant.
6. **Next-day online bookings** close at **midnight Thailand time (ICT, UTC+7)** the day before departure. No same-day online bookings. Same-day requests go to WhatsApp.
7. **Age bands:** Adult 12+, Child 3–11, Infant 0–2 (free). Children's life jackets are always provided and must be worn on boats.
8. **Never write "hotel pickup included" unqualified.** Write "Hotel pickup included from most areas of Koh Samui". Lipa Noi, Nathon, Taling Ngam, Bang Kao and Thong Krut (and other remote areas) carry an extra transfer charge of **400 THB per person return** on Chaweng-side departures. **The surcharge zones differ by departure pier** (Pig Island trips leave from Thong Krut, so south-west hotels are *not* remote for them), so every product carries its own `pickup_zones` table, and one shared text string `[PICKUP]` is used wherever pickup is mentioned, including llms.txt. Ask Mea for the zone list per pier.
9. **Ang Thong Marine Park closes every year from 1 November to 15 December.** During that window, Ang Thong products must show "Season reopens 16 December" with the date picker starting at 16 Dec. Cross-sell **Pig Island** and **Koh Tao** tours prominently instead.
10. **Pig Island tours must always be bookable on any date** wherever they are sold.
11. **Ang Thong and Koh Tao shared-tour copy must not state a guest number** (no "max 20 guests"). Just say "speedboat". The **one exception** is the VIP tour: say clearly that it has only **15 guests on a big speedboat**, so it is far more comfortable and personal.
12. **Do not say the company is "not affiliated with the national park".** Leave that out. The official disclaimer page exists but stays out of menus, linked only in the footer bottom bar, as on kohphangan.com.
13. **High-season rule:** a boat returns to the island it left from. **No one-way island hopping** on tour boats (e.g. Ang Thong to Koh Phangan).
14. **The homepage always promotes the next sellable, current thing** (next Full Moon or Half Moon boat, next big event, an in-season tour). Once an event starts, its promo switches to the next one automatically. A party promo banner shows **from 2 days before the party until online booking closes**, then disappears on its own, so automate it by date.
15. **We do not sell Full Moon Party entry tickets.** We sell the boat transfers only, with entry (≈200 THB) paid at the party. Other party tickets may be resold at the organiser's official price.
16. **Pictures:** high-quality and relevant only, **WebP**, with descriptive alt text on every image, and no watermarked or stolen images. Stock is allowed only when licensed. Never use a photo of a public figure.
17. **Facts must be current and correct.** Every price, timetable, date, phone number and opening hour must be re-checked at writing time, and each page shows a visible "Updated {Month YYYY}" stamp.
18. **Buttons must make sense.** Don't put a WhatsApp button everywhere: use **Book now** where a product can be paid online, **Enquire on WhatsApp** where a quote is needed (villas, private charters, groups), and **Get directions** on places.
19. **Do not break working things.** Once a page or payment path is approved, later changes must not alter its design or break its flow. Test after every change.

### A5. What "same design and functionality" means
"The same" means **pixel-faithful design tokens, the same components, the same templates, the same URL patterns (with `koh-samui` in place of `koh-phangan`), the same plugins, the same live widgets, the same schema graph, and the same booking engine**. The only differences are Samui content and the brand name. Do not "improve" the visual design or invent a new style. Section E lists a few known defects on kohphangan.com: fix those in the clone, and propose them for kohphangan.com separately.

---

## PART B: SOURCE OF TRUTH, AS MEASURED ON THE LIVE kohphangan.com (31 OCT 2026)

Before you write a line of code, **open kohphangan.com logged out, in a private window**, and confirm each item below. If the live site has changed since this brief, the **live site wins**. Copy it, then note the change at the top of your work log.

### B1. Platform and stack (replicate exactly)
| Layer | kohphangan.com | Koh Samui clone |
|---|---|---|
| Hosting | SiteGround (SiteGround Optimizer active) | Same SiteGround account, new site; Mea confirms the plan |
| CMS | WordPress (latest) | Same |
| Theme | **Hello Elementor** + **child theme** (`hello-elementor-child`, Child Theme Configurator) | Same parent + **cloned child theme** |
| Page builder | **Elementor + Elementor Pro** (Theme Builder header/footer, nav menu, sticky) | Same. **But** most custom UI is hand-written HTML/CSS/JS in snippets (see B3); keep that pattern |
| Shop | **WooCommerce** | Same |
| Tour booking | **WooTour** plugin (fields `wt_date`, `wt_number_adult`, `wt_number_child`; pickadate date picker restyled by `kp-picker-css`) | Same plugin and same config |
| SEO | **Rank Math SEO + Rank Math Pro** (schema, sitemaps, redirections, analytics) | Same |
| Analytics | **Google Site Kit** + GA4 gtag | New GA4 property and new Search Console property for `{{DOMAIN}}` |
| Translation | **GTranslate** (`gt_selector`, cdn.gtranslate.net) | Same configuration and languages as kohphangan.com |
| WhatsApp | **Click to Chat for WhatsApp** (`ht_ctc`), floating button, number +66637040888 | Same |
| Cookies | **CookieYes / Cookie Law Info** (Customize / Reject All / Accept All) | Same; default to privacy-preserving |
| Email | **WP Mail SMTP** | Same, from `info@{{DOMAIN}}` |
| Maps | **Leaflet** (guide pages, beach and place maps, villa map with Map/Satellite toggle) + Google Maps JS on some pages + "Get directions" deep links | Same |
| Marine data | **Open-Meteo Marine API** (`marine-api.open-meteo.com/v1/marine`) for tides and sea state | Same, with Samui coordinates |
| Currency | Custom `kpcur` module: `window.KPCUR = {r:{EUR, USD}, d:date, pay:0, u:'/wp-json/kpcur/v1/rates'}`; switcher in header (THB, EUR, USD) | Clone the module and endpoint as-is |
| Theme toggle | Custom `kpts` module: `localStorage['kp-theme']`, `html.kpts-dark`, pre-paint init script in `<head>` | Clone as-is (keep the storage key so behaviour matches) |

### B2. Design tokens: copy these exact values
**Fonts** (Google Fonts, self-host them for speed; see H3):
- **Inter** 400/500/600/700: body, UI, buttons, nav (`--kp-sans: Inter, system-ui, -apple-system, "Segoe UI", sans-serif`)
- **Playfair Display** 500/600/700: section headlines (H2s such as "Coming up on Koh Phangan" render at 30px/500, letter-spacing −0.4px) (`--kp-serif: "Playfair Display", Georgia, serif`)
- Eyebrow or kicker labels: Inter 12px/500, uppercase, letter-spacing ≈1.68px (0.14em), colour lime on dark backgrounds
- **Remove** the unused font loads on kohphangan.com: Figtree, Roboto Mono, Google Sans, Poppins and Noticons come from admin and plugins. Load only Inter and Playfair Display on the front end.

**Light-mode tokens** (`:root` / `body`):
```css
--kp-ink:#0B1F33;        /* headings / primary text (body text renders rgb(20,44,71) = #142C47) */
--kp-muted:#5C6675;  --kp-muted2:#6E7886;
--kp-border:#E7E9EC;  --kp-surface:#F6F8FA;  --kp-warm:#F6F2EA;  --kp-white:#fff;
--kp-accent:#C1DF0F;     /* THE lime: all primary buttons, chips, ticker label, active states */
--kp-accent-hover:#ADC90B;  --kp-accent-ink:#14202E;   /* text on lime */
--kp-accent-dark:#5E6E00;   --kp-brass:#5E6E00;   --kp-gold:#C1DF0F;
--kp-trust:#1E7A4C;      /* refund / secure / licence ticks */
--kp-night:#020A1C;  --kp-night-text:#93A3B8;  --kp-night-line:#33425F;  /* dark hero & footer blocks */
--kp-w:1148px;           /* content max width */
--kp-gutter:max(20px,5.5vw);
--kp-sec:clamp(40px,4.4vw,60px);   /* vertical section rhythm */
--kp-radius-pill:999px;  /* buttons & chips are pills; cards 12px radius */
```
**Dark-mode tokens** (`html.kpts-dark`):
```css
color-scheme:dark;
--kp-ink:#E6EDF5; --kp-muted:#A9B6C6; --kp-muted2:#97A5B7; --kp-border:#263A55;
--kp-surface:#111F33; --kp-warm:#132339; --kp-accent-dark:#C1DF0F; --kp-brass:#C1DF0F; --kp-trust:#5BCB93;
--kpd-bg:#0A1422; --kpd-card:#111F33; --kpd-card2:#172A43; --kpd-line:#263A55;
--kpd-text:#E6EDF5; --kpd-muted:#A9B6C6; --kpd-link:#8FD8E8; --kpd-navy:#1F3452;
/* header: rgba(10,20,34,.97); logo: filter brightness(0) invert(1); ::selection lime on #0B1F33 */
```
**Components measured:**
- Primary button: lime `#C1DF0F` background, `#14202E` text, pill radius, 700 weight, with a hover to `#ADC90B`. It must be **very visible** in both modes.
- Ticker label "HAPPENING NOW": lime background, `#0B2233` text, Inter 11.5px/700, padding `0 14px`, with a pulsing red dot before it.
- Card button on dark cards (`.kc.kpg-btn`): `rgba(7,20,31,.6)` background, `#DFEEF3` text, 12px radius.
- Hero: full-bleed, high-quality photo with a dark gradient. **Maps are full colour, with only a fade behind the text** (an owner rule).
- Body padding offsets the fixed header (≈102px top on mobile) and the mobile bottom bar (≈70px bottom).

### B3. Custom code modules to clone (inline `<style>` and `<script>` blocks, kept in the child theme or Code Snippets)
Copy each one **byte for byte** from kohphangan.com, then rename only the text, URLs and coordinates. Keep the `kp` prefixes, because sharing class names across sister sites makes future fixes portable.

| Handle on kohphangan.com | What it does | Size (chars) |
|---|---|---|
| `kp-v2-shell` | Global shell: layout, typography, buttons, cards, sections | ~21,000 |
| `kpts-css` + `kpts-init` (JS) | Theme toggle (sun/moon), dark tokens, overrides for every component | ~22,300 |
| `kph` (header) + `kp-menu-hl`, `kp-menu-categories` | Sticky header: logo, mega-menu with category columns (`kph-mega`, `kph-cat`), currency select (`kph-cur`), language (`kph-lang`), theme button (`kph-theme`), CTA, burger and off-canvas panel (`kph-panel`) | — |
| `kpn-css` | "Happening now" ticker (`kpn-l` label, `kpn-i` items: "Today 12:00 Event · Venue", "Tonight 19:00 …") fed by the events CPT | ~3,000 |
| `kpcur-css` + `kpcur-cfg` | Currency switcher (THB/EUR/USD) and REST rates endpoint `/wp-json/kpcur/v1/rates` (daily) | ~2,300 |
| `kp-picker-css` | Restyled WooTour/pickadate calendar (lime selected day, accessible focus rings) | ~8,700 |
| `kpg-hero-css` | Homepage hero and price tiles | ~1,800 |
| `kpg-fmp-css` + `kpg-fmp-js` | Full Moon / Half Moon private-boat promo block with date logic (auto show/hide) | ~9,400 / 4,800 |
| `kp-gm-css` | Map module styles (Leaflet split view: map + list, `kpg-map`, `kpg-list`, `kpg-row`, `kpg-dot`, `kpg-key`) | ~3,800 |
| `kp-ck-css` | Cookie banner restyle | ~4,500 |
| `kp-card-type`, `kp-photo-fix`, `kp-polish-css`, `kp-notinc-css` | Card type labels, image fixes, polish, "Not included" list styling | small |
| `kp-vl-css` | Villa listing (short-stay and long-term tabs, map with Map/Satellite toggle) | ~1,900 |
| `kp-faq2-css` | FAQ accordion (paired with FAQPage schema) | ~2,100 |
| `kp-rail-css` | Horizontal product and event rails | ~2,000 |
| `kpg-wa-pos` | WhatsApp float position (moved clear of the mobile bar) | small |
| `kpa-*` (article template) | Reading progress bar (`kpa-prog`), hero (`kpa-hero`), breadcrumbs (`kpa-bc`), kicker (`kpa-k`), lead (`kpa-lead`), byline with avatar and credentials (`kpa-by`, `kpa-av`, `kpa-cr`), body, sticky sidebar booking card (`kpa-side`, `kpa-sd-*`), related cards (`kpa-rel`, `kpa-rc-*`), mobile sticky booking bar (`kpa-mbar`) | — |
| `kpf2` footer | Brand and CTA row, link columns, pill row, bottom bar | — |
| `kp-ev-card` + events filter | Event cards and filter chips: All · Live now · Today · Tomorrow · This weekend · Party · Market · Live Music · Festival · Community, plus "Show more events" | — |
| `kpl-tnow` | Live tide widget ("Tide now (06:53) 0.70 m Rising · Next high tide 13:30 1.99 m · in 6 h 36 min · Biggest tide this week …") from Open-Meteo Marine | — |
| `kp-org-ld` | Sitewide Organization/TravelAgency JSON-LD | — |
| `wp-custom-css` | Customizer additional CSS | ~5,200 |

**Procedure:** export kohphangan.com with **All-in-One WP Migration** or **Duplicator** (or SiteGround Staging → copy), restore it locally, then **strip all Phangan content** while keeping the theme, child theme, Elementor templates (header, footer, single product, single post, archive), snippets, plugin settings, WooTour settings, Rank Math settings and menus (as structure). This is faster and more faithful than rebuilding from scratch. Do **not** carry over: orders, customers, users other than admin, reviews, Phangan images or Phangan posts.

### B4. Global layout, top to bottom on every page
1. Skip link ("Skip to content").
2. **Header `kph`**: logo (`{{BRAND}}` wordmark + "Ultimate Travel Guide" tagline, matching the KOHPHANGAN.COM logo style), mega menu, then on the right: currency select (THB ▾), theme toggle, language, **Book a tour** (lime pill) and burger on mobile.
3. **Ticker `kpn`**: "HAPPENING NOW · Today 15:00 Event · Venue · Tonight 19:00 …", scrolling, every item linking to its event page.
4. Page content (templates in Part D).
5. **Footer `kpf2`**: brand blurb "Australian owned since 2006. Boat tours, villas and honest island guides…", WhatsApp, email; then columns Tours · Villas · Events · Plan your trip · Company · Getting here; then the bottom bar Privacy · Terms · Disclaimer.
6. **Mobile bottom bar `kp-mbar`/`kpa-mbar`** (price + Book now on products and articles) and the **WhatsApp float** above it.
7. Cookie banner (CookieYes), restyled.

---

## PART C: INFORMATION ARCHITECTURE (FULL SITEMAP)

URL rule: copy the kohphangan.com slug and replace `koh-phangan` with `koh-samui`. Where Phangan has a place-specific page, create the Samui equivalent. Keep `/product/{slug}/` for products, `/koh-samui-events/event/{slug}/` for single events, and trailing slashes everywhere. **Target: ~185 indexable URLs at launch: every page that has a brief in Part P (index in P5).** The menus below show the structure; **the slugs in Part P's brief headings are canonical**, and Part P adds pages that are not listed here (e.g. parties hub, boat-charter hub, water sports, wildlife, wedding, honeymoon, with kids, scams, beach safety, Chaweng vs Lamai, Koh Samui in November, destinations). Mark each page `[MONEY]` (sells directly), `[HUB]` (category or pillar) or `[GUIDE]` (informational with booking sidebar).

### C1. Main menu (mega menu, same structure and order as kohphangan.com)

**1. Tours & Activities** → `/koh-samui-tours/` [HUB, MONEY]
- All tours `/koh-samui-tours/` · All activities `/activities/`
- *Boat trips*
  - Ang Thong Marine Park Day Tour (speedboat) `/product/ang-thong-marine-park-day-tour-koh-samui/`
  - Ang Thong Day Tour by Big Boat `/product/ang-thong-big-boat-tour-koh-samui/`
  - Ang Thong VIP Day Tour (15 guests) `/product/ang-thong-vip-tour-koh-samui/`
  - Ang Thong Overnight: Tent `/product/ang-thong-overnight-camping-koh-samui/` · Bungalow `/product/ang-thong-overnight-bungalow-koh-samui/`
  - Ang Thong Private Speedboat `/product/ang-thong-private-speedboat-koh-samui/`
  - Pig Island (Koh Madsum) & Koh Tan Speedboat `/product/pig-island-speedboat-tour/`
  - Pig Island Sunset Tour · Small-group Longtail · Pink Dolphins & Pig Island · Private Longtail · Private Speedboat · 3 Islands (Madsum, Tan, Rap) · Koh Rap Full Day · Jet Ski Safari
  - Koh Tao & Koh Nang Yuan Day Trip from Samui `/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/`
  - Koh Phangan day trip / private transfer `/private-speedboat-koh-samui-to-koh-phangan/` (not `/koh-samui-koh-phangan-private-transfer/`, which kohphangan.com already uses)
  - Full Moon Party speedboat (shared return) `/product/full-moon-party-speedboat-koh-samui/`
  - Full Moon Party private speedboat `/product/full-moon-party-private-speedboat-koh-samui/`
  - Half Moon Festival boat packages `/product/half-moon-festival-package-koh-samui/`
  - Private speedboat charter `/koh-samui-private-speedboat/` · Catamaran & sailing `/koh-samui-catamaran-charter/` · Yacht charter `/koh-samui-yacht-charter/` [MONEY, enquiry → pay]
  - Sunset cruise `/koh-samui-sunset-cruise/` · Boutique yachting day `/product/boutique-yachting-day-koh-samui/`
- *On the island*
  - Jungle / 4x4 safari `/koh-samui-jungle-safari/`
  - Ethical elephant sanctuary visits `/koh-samui-elephant-sanctuary/`
  - Zipline `/koh-samui-zipline/` · ATV / quad bike `/koh-samui-atv-quad-bike/`
  - Thai cooking class `/koh-samui-cooking-class/` · Muay Thai training and fights `/koh-samui-muay-thai/`
  - Golf `/koh-samui-golf/` · Spa and massage `/koh-samui-spa/`
- *Diving and water sports*
  - Diving guide (all trips and courses) `/koh-samui-diving/` · Snorkelling `/koh-samui-snorkeling/`
  - Koh Tao / Sail Rock fun dives from Samui · Discover Scuba · PADI Open Water (products, once a partner is confirmed)
  - Kitesurfing (Samui season and spots) `/koh-samui-kitesurfing/` · Jet ski (rules and scams) `/koh-samui-jet-ski/` · Kayak & SUP `/koh-samui-kayak-sup/` · Fishing trips `/koh-samui-fishing/`
- *Day trips and parties*
  - Khao Sok 2-day/1-night trip from Samui `/product/khao-sok-2-day-trip-koh-samui/` (partner, if confirmed; **not** a day tour, because it is 4–6 h each way, see O11)
  - All events and parties `/koh-samui-events/`

**2. Guide** → `/koh-samui-travel-guide/` [HUB]
- *Plan your trip:* Koh Samui travel guide · How to get to Koh Samui `/how-to-get-to-koh-samui/` · Samui Airport guide `/koh-samui-airport/` · Bangkok to Koh Samui `/bangkok-to-koh-samui/` · Surat Thani to Koh Samui `/surat-thani-to-koh-samui/` · Koh Samui to Koh Phangan `/koh-samui-to-koh-phangan/` · Koh Samui to Koh Tao `/koh-samui-to-koh-tao/` · Phuket/Krabi to Koh Samui `/phuket-to-koh-samui/` · Where to stay `/where-to-stay-koh-samui/` · Itinerary 3, 5 and 7 days `/koh-samui-itinerary/` · Weather by month `/koh-samui-weather/` · Taxis, Grab and getting around `/getting-around-koh-samui/` · Roads and driving `/koh-samui-roads/` · Scooter rental `/koh-samui-motorbike-rental/` · Car rental `/koh-samui-car-rental/` · Bicycle and e-bike `/koh-samui-bicycle-rental/` · Thailand visa guide `/thailand-visa-guide/` · Visa extensions and Samui immigration `/koh-samui-visa-extension/` · Travel insurance `/koh-samui-travel-insurance/` · SIM, eSIM and Wi-Fi `/koh-samui-sim-card-wifi/` · Koh Samui vs Koh Phangan vs Koh Tao `/koh-samui-vs-koh-phangan-vs-koh-tao/` · Ang Thong: speedboat or big boat? `/ang-thong-speedboat-vs-big-boat/` · Is Koh Samui expensive? Budget guide `/koh-samui-budget/` · FAQ `/faq/`
- *Beaches and nature:* Things to do `/activities/` · Places to go `/places/` · Best beaches `/koh-samui-beaches/` · Best snorkelling · Diving · Waterfalls `/koh-samui-waterfalls/` · Hiking and viewpoints `/koh-samui-hiking/` · Sunset spots `/koh-samui-sunset-spots/` · Temples `/koh-samui-temples/` · Islands near Koh Samui `/islands-near-koh-samui/` · Tides and boating `/koh-samui-tides/` · Sea conditions and monsoon `/koh-samui-sea-conditions/`
- *Places to go* (one `[GUIDE]` page each, with a map, directions and nearby bookables): Chaweng `/chaweng-koh-samui/` · Chaweng Noi · Lamai `/lamai-koh-samui/` · Bophut and Fisherman's Village `/fishermans-village-koh-samui/` · Maenam `/maenam-koh-samui/` · Choeng Mon `/choeng-mon-koh-samui/` · Bang Rak / Big Buddha Beach · Plai Laem · Nathon town `/nathon-koh-samui/` · Lipa Noi · Taling Ngam · Bang Kao and the south · Thong Krut · Hua Thanon fishing village · Silver Beach (Crystal Bay) · Coral Cove · Tongson Bay · Big Buddha (Wat Phra Yai) `/big-buddha-koh-samui/` · Wat Plai Laem `/wat-plai-laem-koh-samui/` · Hin Ta & Hin Yai `/hin-ta-hin-yai-koh-samui/` · Na Muang Waterfalls `/na-muang-waterfall-koh-samui/` · Hin Lad Waterfall · Secret Buddha Garden `/secret-buddha-garden-koh-samui/` · Wat Khunaram (mummified monk) · Overlap Stone · Lad Koh viewpoint · Laem Sor Pagoda · Wat Sila Ngu · Koh Madsum (Pig Island) `/pig-island-koh-samui/` · Koh Tan · Ang Thong Marine Park `/ang-thong-marine-park/` · Koh Phangan (cross-link to kohphangan.com) · Koh Tao
- *Nightlife and festivals:* Nightlife `/koh-samui-nightlife/` · Chaweng nightlife · Lamai nightlife · Beach clubs `/koh-samui-beach-clubs/` · Full Moon Party from Samui `/full-moon-party-from-koh-samui/` · Full Moon Party dates `/full-moon-party-dates/` · Party calendar 2026–2027 `/koh-samui-party-calendar-2026-2027/` · Songkran · Loy Krathong · Chinese New Year · Christmas and New Year · Muay Thai fight nights · Samui Regatta · Buffalo fighting (cultural explainer, no promotion)
- *Food, shopping and culture:* Restaurants `/koh-samui-restaurants/` · Seafood · Street food and night markets `/koh-samui-markets/` · Walking streets (Fisherman's Village Friday, Maenam Thursday, Lamai Sunday) · Shopping malls (Central Samui) · Coffee and cafés · History of Koh Samui · Thai culture and traditions `/thai-culture-and-traditions/`
- *Wellness:* Yoga · Meditation · Retreats `/koh-samui-retreats/` · Detox and wellness resorts · Massage, sauna and spa · Gyms and fitness · Golf, tennis and padel
- *Health and safety:* Hospitals and clinics `/koh-samui-hospital/` · Pharmacies · Dentists · Tourist Police `/koh-samui-tourist-police/` · Police stations · Drugs, alcohol and the law · Jet ski and scam safety · Beach and swimming safety · Precautions and safety `/precautions-safety/`
- *Living and working:* Immigration office · Banks, ATMs and money · Coworking and digital nomads · Working on Koh Samui · Opening a business · Real estate guide · Building and permits · Lawyers · International schools and prices · Local government · Villas and long stays

**3. Retreats** → `/koh-samui-retreats/` (anchors #yoga, #meditation, #detox, #healing, #ttc), same as kohphangan.com.

**4. Villas** → `/koh-samui-villas/` (#short-stay, #long-term, All villas), with a map listing as on kohphangan.com. Content depends on Mea's villa partners (see Part I).

**5. Events** → `/koh-samui-events/`: All events this week · Full Moon Party dates · Party boats from Samui · Songkran · Loy Krathong · Christmas & NYE · Muay Thai nights · Samui Regatta.

**6. News** → `/koh-samui-news/`: latest island stories (posts in the "News" category) plus background guides.

### C2. Footer columns (mirroring kohphangan.com)
- **Tours:** Ang Thong day tour · Ang Thong VIP · Ang Thong overnight · Pig Island speedboat · Pig Island sunset · Koh Tao & Nang Yuan · Full Moon Party boat · Private speedboat · Catamaran charter · All tours
- **Villas:** Holiday villas · Long-term villas · Where to stay
- **Events:** Events this week · Full Moon dates · Nightlife
- **Plan your trip:** Travel guide · How to get here · Weather by month · FAQ · Safety
- **Company:** About us · Blog · Terms and cancellation · Privacy · Disclaimer
- **Getting here:** Bangkok to Koh Samui · Surat Thani to Koh Samui · Koh Phangan to Koh Samui · Koh Tao to Koh Samui · All routes
- **Our other sites** (new pill row): KohPhangan.com · AngThongMarinePark.com · PigIslandKohSamui.com · SpeedboatSamui.com

### C3. Utility pages
`/about-us/` (story since 2006, team, licence, office address on Chaweng Beach Road, 84320 Bo Phut) · `/contact/` · `/terms-and-conditions/` · `/privacy-policy/` · `/official-disclaimer/` (noindex, footer only) · `/blogs/` · `/cart/` `/checkout/` `/my-account/` (noindex) · `/thank-you/` · `/404`, which offers search, top tours and WhatsApp.

---

## PART D: PAGE TEMPLATES (clone each from its kohphangan.com counterpart)

For every template, open the matching kohphangan.com URL side by side with your local build at **390px, 768px, 1280px and 1920px**, in **light and dark**, and match spacing, type sizes and order.

### D1. Homepage `/` (clone of kohphangan.com `/`)
Section order, top to bottom:
1. **Ticker** "HAPPENING NOW" (from the events CPT, next 24–48 h).
2. **Hero.** Eyebrow label (`<p class="kpa-k">`, Inter, uppercase, lime): *"Koh Samui tours, boats, villas & events · local since 2006"*. Below it, the big Playfair headline, **which is the page's H1** (see E5; kohphangan.com uses the eyebrow as the H1, but don't copy that), then a supporting line, then buttons: **Book a tour** (lime) → `/koh-samui-tours/`, and **Find a villa** (outline) → `/koh-samui-villas/`. Below that sit **four price tiles**:
   - **Ang Thong from 1,500 THB** (big boat); on hover or subtext, speedboat 1,800. During 1 Nov–15 Dec the tile reads "Ang Thong reopens 16 Dec".
   - **Pig Island from 1,450 THB**
   - **Private speedboat from 19,000 THB** (fleet minimum, linking to the charter hub)
   - **Tonight on Samui** (count of events tonight, updated hourly)
3. **"Next party" pill + "Coming up on Koh Samui"** (Playfair H2): event and party cards with date, "IN 3 DAYS", "from X THB per person", **Book tickets**, "See all events →".
4. **Full Moon Party private speedboat block** (`kpg-fmp`), shown automatically from 2 days before each Full Moon until online booking closes. Title "Full Moon Party on {weekday d Month} on Haad Rin"; shared return **1,400 THB** and private boat price; party entry (~200 THB) paid at the party; boats run subject to safe sea conditions; weather cancellations get a full refund. Buttons: **Book your seat** (shared) and **Book a private boat** (product; WhatsApp only for 10+ groups). Repeat for the next date.
5. **Half Moon / Jungle / Waterfall party boat prompts** from Samui with dates.
6. **Boat trip cards:** Ang Thong speedboat · Ang Thong big boat · Ang Thong VIP (15 guests) · Ang Thong overnight · Pig Island speedboat · Koh Tao & Nang Yuan. Each shows a "from" price, duration and **See the trip**. During the Ang Thong closure, Pig Island and Koh Tao move first.
7. **"Our most-booked trips"**: 12 cards with rating, duration and price.
8. **"What's on in Koh Samui"**: 10 live event cards plus **See all events** and **Full Moon Party dates**.
9. **"Charter your own boat"** (new section, the Samui equivalent of the kohphangan.com yacht block): fleet cards from speedboatsamui.com data (speedboats, catamarans, motor yachts, junk) with a "from" price per boat, guest capacity and **Get a quote**. Flow: enquiry → quote → pay link.
10. **"Stay in a Koh Samui villa"**: 8 holiday villas (nightly price, **Book this villa**) and 8 long-term villas ("Monthly rent on request · min. 6 months", **Enquire**), plus tabs.
11. **"Retreats on Koh Samui"**: 10 retreat cards.
12. **"Explore Koh Samui"**: guide cards for itinerary, getting there, weather, where to stay, getting around, beaches, waterfalls, temples, viewpoints, diving, restaurants, nightlife, markets, wellness, families, honeymoon, Pig Island and Ang Thong.
13. **Live strip**: Samui time now (ICT), weather now and today's high/low (Open-Meteo), tide now and next high/low (Open-Meteo Marine), sea state (wave height), and THB rate.
14. **FAQ** (8–10 Q&As with FAQPage schema): "Is Ang Thong open in November?", "How do I get from Samui to the Full Moon Party?", "Best time to visit Koh Samui?", "Do I need cash on Samui?", "Is hotel pickup included?" and similar.
15. Footer.

**Homepage rule (automate it):** a "promo" query always picks the **next sellable dated product** (FMP or Half Moon boat, NYE boat, festival). A promo hides itself when `now > start_time` or when booking closes, and the next one takes its place. Use a `kp_promo_until` meta or WooTour's date list. Never show a past date.

### D2. Tours hub `/koh-samui-tours/` (clone of `/koh-phangan-tours/`)
H1, intro with trust row (since 2006 · TAT 43/01467 · secure card payment · 48 h free cancellation), then a filter-chip row (Boat trips · Island tours · Water sports · Parties · Private), the product grid (image, title, duration, rating, "from" price in the selected currency, **See the trip**), a comparison table (Ang Thong speedboat vs big boat vs VIP vs private; Pig Island options), a "How booking works" 3-step strip, FAQ, and the related guides rail. Schema: `ItemList` of `Product`/`TouristTrip`, plus `BreadcrumbList` and `FAQPage`.

### D3. Single product `/product/{slug}/` (clone of `/product/daytour-ang-thong-marine-park/`)
Exact section order on kohphangan.com (keep it):
1. Breadcrumbs → **H1 = product name** (e.g. "Ang Thong Marine Park Day Tour from Koh Samui"). **Do not repeat the H1 text as an H2** (a defect on kohphangan.com, see E1).
2. Gallery (WebP, 8–15 photos, lightbox) + **booking card** on the right (sticky on desktop), with these WooTour fields:
   - "{price} THB / adult · 1 Day · ★ 5.0 (n reviews)"
   - **Departure** date picker (restyled pickadate: lime selected day; disabled dates from closures and cut-off; Ang Thong disabled 1 Nov–15 Dec; Pig Island **never blocked** in the picker; if weather stops a departure, we contact the guests and apply the weather rule: full refund or a new date)
   - Adult (12+) select with unit price; Child (3–11) select with unit price; Infant (0–2) free note
   - Pickup area select (Chaweng, Lamai, Bophut, Maenam, Choeng Mon, Bang Rak, Plai Laem, Nathon†, Lipa Noi†, Taling Ngam†, Bang Kao†, Thong Krut†; † = +400 THB/person return), auto-adding the surcharge line
   - Live total in the selected currency, with "Charged in THB" under it
   - **Book Now** (lime) → checkout. A secondary text link "Questions? WhatsApp us".
   - Trust ticks: "Full refund 48 h+ before departure" · "Secure card payment" · "Local team since 2006"
3. **"{Tour} at a glance"**: a facts table (duration, departure pier, pickup window, return time, boat type, included, park fee, minimum age, what to bring).
4. **Why visit…** (2–3 paragraphs with facts).
5. **Itinerary** as a timeline (e.g. 07:30–08:30 hotel pickup · ~09:00 pier briefing · Mae Ko viewpoint/Emerald Lake · Wua Talab viewpoint · kayaking · snorkelling · lunch · ~16:00–16:30 back at the pier · 16:30–17:00 hotel drop-off).
6. **What's included** / **Not included** (`kp-notinc` styling). The national park fee is listed as not included, paid in cash at the park: **300 THB per foreign adult, 150 THB per child (3–14)**. Re-verify before launch.
7. **What to bring** · **Good to know** (sea conditions, seasickness, pregnancy, mobility, cash).
8. **Prices** (table: adult, child, infant, private option, pickup surcharge).
9. **Cancellation policy** (verbatim sitewide text, linking to Terms).
10. **FAQ** (6–10 Q&As, FAQPage schema).
11. **More tours and guides from Koh Samui** (rail).
12. **Gallery** · **What our guests say** (WooCommerce reviews, **real ones only**, never fabricated; show the review form as on kohphangan.com).
13. **More trips from Koh Samui** (rail) + mobile sticky bar with price and **Book now**.

Schema: `Product` (with `offers` in THB, `availability`, `priceValidUntil`, and `aggregateRating` **only when real reviews exist**), `TouristTrip` (with `itinerary`, `touristType`, `provider` = our TravelAgency, `offers`), `BreadcrumbList`, `FAQPage` and `ItemPage`.

### D4. Guide article (clone of `/koh-phangan-beaches/`, the `kpa` template)
- Reading progress bar · **hero** (photo, H1 with year, e.g. "Koh Samui Beaches: 18 Best Bays by Coast (2026)") · breadcrumbs · kicker · **lead paragraph that answers the query in 2–3 sentences** (for AEO) · byline with avatar, "By the {{BRAND}} team · local since 2006 · Updated {Month YYYY}" and credentials.
- **Interactive Leaflet map near the top** ("Map of Koh Samui's beaches"): split view with a numbered list (`kpg-map` + `kpg-list`), colour dots by category, a legend (`kpg-key`) and filter chips (`kpg-chips`) such as "North · East · South · West · Families · Snorkelling · Sunset". Clicking a list row flies the map to it, and every marker popup has **Get directions** (Google Maps deep link `https://www.google.com/maps/dir/?api=1&destination={lat},{lng}`). **Maps stay full colour, with only a fade behind overlaid text.**
- "How to choose…", then a **comparison table** (sortable on desktop, cards on mobile), then one H2 per area or coast and one H3 per place, each with photo, facts line (best for · sand · swimming · facilities · parking), 120–250 words, and a "Book nearby" chip linking to a relevant product.
- A seasonal section ("When to visit…, month by month") and a safety section (rip currents, jellyfish, jet skis).
- **FAQ** (FAQPage) and a related guides grid (`kpa-rel`).
- **Sticky sidebar `kpa-side`** (desktop) or bottom bar (mobile): "Plan with locals · Book your Koh Samui days with our Chaweng team" with 3 relevant products and prices, **See tours and prices**, **Book on WhatsApp**, and trust ticks (since 2006 · TAT licence · secure card payment · full refund 48 h+).
- Schema: `Article` (author `Person` + publisher `Organization`, `dateModified`), `BreadcrumbList`, `FAQPage`, and `ImageObject` for the hero. For place-heavy pages, add `ItemList` of `TouristAttraction`/`Beach` with `geo`.
- Length: **at least the measured twin (P0.2)**. As floors: pillars 3,500–5,000 words; sub-guides 1,900–3,000; sights and temples ≥ 1,900; beach and area pages ≥ 2,500. Depth means more facts, tables and answers, never padding.

### D5. Place page (clone of `/zen-beach-koh-phangan/` and `/than-sadet-koh-phangan/`)
Hero · H1 · lead · **"At a glance"** box (area, GPS, opening hours, entry fee, best time, parking, dress code for temples, time needed) · map with directions · "How to get there" from Chaweng, Lamai, Maenam, Nathon and the airport (km, minutes, Grab/taxi price range) · what to see · tips · nearby places (rail) · nearby bookables · FAQ. Schema: `TouristAttraction`/`Beach`/`PlaceOfWorship`/`Waterfall` (as `TouristAttraction`) with `geo`, `openingHoursSpecification` and `isAccessibleForFree`/`publicAccess`.

### D6. Events hub `/koh-samui-events/` + single event `/koh-samui-events/event/{slug}/` (clone of `/koh-phangan-events/`)
- **Events CPT** (same as kohphangan.com): fields `start` (ISO with `+07:00`), `end`, `venue`, `venue_geo`, `area`, `category` (Party · Market · Live Music · Festival · Community · Sport · Muay Thai · Culture), `poster` (WebP), `price_from`, `ticket_product_id` (optional Woo product), `organizer`, `recurrence` (weekly markets: Fisherman's Village Friday, Maenam Thursday, Lamai Sunday and the rest), `status` (scheduled/cancelled/postponed).
- Hub: H1 "Koh Samui Events and Parties: What's On (2026–2027)", **filter chips** (All · Live now · Today · Tomorrow · This weekend · Party · Market · Live Music · Festival · Community), event cards (`kp-ev-card`: category · "Sat 31 Oct · 4:00 PM – 10:00 PM" · title · venue), **Show more events**, then evergreen sections ("The big Samui events": Full Moon from Samui, Songkran, Loy Krathong, NYE, Regatta, Muay Thai), party tips (getting there and back · stay safe · where to stay · the day after), FAQ, and a closing CTA "Party at night, the sea by day".
- Single event: H1 title, date/time/venue block, poster, description, "Where is {venue}?" map with **Get directions**, **Add to calendar** (.ics), tickets or a boat button if sellable, and "More events on Koh Samui". Schema: **`Event`** with `startDate`, `endDate`, `eventStatus`, `eventAttendanceMode` Offline, `location` (Place + PostalAddress + geo), `offers` (when sold), `organizer` and `image`.
- Auto-expire: past events drop off listings (keep the page, add a "This event has ended. See what's on next" banner, keep it indexable only for recurring/annual events, otherwise `noindex` after 30 days).

### D7. Villas `/koh-samui-villas/` (clone of `/koh-phangan-villas/`)
H1 "Villas for rent in Koh Samui" · tabs **All stays · Holiday · Long-term** · a Leaflet map with Map/Satellite toggle and price pins · villa cards (photo, area, bedrooms, pool, sea view, price per night or "Monthly rent on request · min. 6 months") · "Best areas for a villa on Koh Samui" (Chaweng Noi & Choeng Mon · Bophut & Plai Laem · Maenam · Lamai · Taling Ngam & Lipa Noi for sunsets · Bang Kao for quiet) · "Tips for renting a villa" (book early for high season · check the road, since steep concrete hills are common · ask what's included (electricity rate per unit, water, cleaning, pool, Wi-Fi) · plan your days out) · FAQ · CTA "Staying in a villa? Add a day on the water". Single villa: gallery, facts, map, availability calendar, **Book this villa** (short stay) or **Enquire** (long-term). Schema: `LodgingBusiness`/`Accommodation` (`VacationRental` on single villas), with `offers` only when bookable.

### D8. Retreats `/koh-samui-retreats/`
Clone the retreats hub (cards with rating, duration, "from" price, **View retreat**) and the anchors #yoga #meditation #detox #healing #ttc. Samui is known for luxury wellness resorts. Only list retreats we can actually sell or enquire for, and never link out.

### D9. News `/koh-samui-news/`
H1 "Koh Samui News" · "Latest stories" (news posts, newest first, date and source note) · "Background guides". Each news post: `NewsArticle` schema, a factual and neutral tone, 300–800 words, written from official or primary reporting and **in our own words** (no copying). Link to related evergreen guides. Target 2–3 posts a week.

### D10. FAQ `/faq/`
Grouped Q&A (Booking & payment · Tours & boats · Getting here · Weather & seasons · Safety · Money · Visas) with FAQPage schema. The answers are short and direct, 40–80 words each, so answer engines can quote them.

### D11. Comparison and decision pages (they win AI answers)
"Koh Samui vs Koh Phangan vs Koh Tao", "Ang Thong: speedboat or big boat?", "Ang Thong day tour or overnight?", "Chaweng or Lamai?", "Where to stay with kids", "Is November a good time for Samui?". Format: a verdict first, then a comparison table, then the reasoning, then products.

---

## PART E: KNOWN DEFECTS ON kohphangan.com: DO NOT COPY, FIX IN THE CLONE
Measured on 31 Oct 2026. Fix these on the Samui site, and list them for Mea to apply to kohphangan.com later. **Do not change kohphangan.com yourself without asking.**
1. **Duplicate heading on products:** the H1 product name repeats as an H2 directly below (and again as an H3 in the booking card). Keep one H1; make the second heading a non-heading label.
2. **Image alt text missing:** on `/koh-phangan-beaches/`, 15 of 27 images had no `alt`. Every image needs descriptive alt text (decorative images get `alt=""` + `role="presentation"`).
3. **Images not WebP:** the same page served 19 PNG + 6 JPG and only 1 WebP. Convert every upload to WebP (quality 78–82, max 2400px wide) and serve `srcset` sizes. Only 4 of 27 images were lazy-loaded: lazy-load everything below the fold, and keep the LCP hero `fetchpriority="high"` and **not** lazy.
4. **Font bloat:** ~10 font families load (Figtree, Roboto Mono, Google Sans, Poppins, WPAIStudio, plus Inter and Playfair). On the front end load only Inter (400/500/600/700) and Playfair Display (500/600/700), **self-hosted WOFF2 subsets** with `font-display: swap` and a preload for the two most-used weights.
5. **Homepage H1 is a 12px eyebrow.** It's acceptable, but the visible Playfair headline is an H2. In the clone, make the **visible hero headline the H1** and style the eyebrow as a `<p class="kpa-k">`. The same keywords stay in the H1.
6. **Server response:** logged-in TTFB measured ~5.3 s (admin, uncached). Verify logged-out TTFB < 600 ms with the SiteGround dynamic cache + Memcached. Never ship admin-only CSS or JS to visitors.
7. **Third-party noise:** a WordPress.com cookie-check iframe (`widgets.wp.com/3rd-party-cookie-check`) and Noticons load on pages, which suggests the Jetpack or WordPress.com connection is unnecessary. Don't install Jetpack on the clone unless a feature needs it.
8. **Booking card heading "Thank you!"** appears as an H3 in the page outline. Hidden success messages must not be headings until shown.

---

## PART F: SEO, AEO AND AI-VISIBILITY SPEC (principles; the exact implementation is in Part R, which wins on any conflict)

### F1. On-page patterns (Rank Math)
- **Title:** `{Primary keyword} {Year}: {benefit or number} | {short brand qualifier}`, 50–60 characters. Examples:
  - Home: "Koh Samui Tours, Boats & Island Guide 2026 | Since 2006" (57 chars)
  - Product: "Ang Thong Marine Park Tour from Koh Samui 2026 | 1,800 THB"
  - Guide: "Koh Samui Beaches 2026: 18 Best Bays by Coast" (the H1 is worded differently, e.g. "The best beaches on Koh Samui, coast by coast")
  - Events: "Koh Samui Events & Parties This Week (2026–2027) | What's On"
- **Meta description:** 140–160 characters with a concrete promise, a price or number, and a call to action ("Book online or on WhatsApp…").
- **One H1 per page**, logical H2/H3 outlines, and a **question-shaped H2 or H3** wherever a real question exists.
- **URL:** short, hyphenated, keyword first, no dates in slugs (the year goes in the title only, so URLs stay evergreen).
- **Open Graph and Twitter:** `og:locale en_GB`, a 1200×630 WebP/JPG share image per page, and `summary_large_image`.
- **Robots:** `index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1`. Noindex cart, checkout, account, thank-you, search results, tag archives, author archives (except the team author page) and expired one-off events.
- **Canonical** on every page; no parameter duplicates (currency and filter state stay client-side, never in URLs).
- **Sitemaps:** Rank Math XML (pages, posts, products, events, places), submitted to Search Console and Bing Webmaster Tools.

### F2. Schema graph (match kohphangan.com, then extend)
The sitewide `@graph` holds: `Place` (Koh Samui, with geo 9.512, 100.013) → `TravelAgency` + `Organization` (`{{BRAND}}`, logo, `foundingDate` 2006, telephone +66637040888, email, address on Chaweng Beach Road, Bo Phut 84320, `areaServed` Koh Samui / Koh Phangan / Koh Tao / Ang Thong, `sameAs` = the sister sites and the owner's social profiles, `hasCredential` TAT licence 43/01467) → `WebSite` (with `SearchAction`) → `WebPage` / `ItemPage` / `CollectionPage` → `BreadcrumbList`, plus template-specific types (D2–D10). Validate every template in the Rich Results Test and the Schema.org validator. **Zero errors; warnings only with a reason.**

### F3. Internal linking model (this is the monetisation architecture)
- Every guide links to **2–4 money pages** in the body (contextual anchors, e.g. "Ang Thong speedboat tour from Samui") and has the sidebar booking card.
- Every money page links back to **2–3 supporting guides** (e.g. the Ang Thong product links to "Ang Thong Marine Park guide", "speedboat vs big boat" and "Samui sea conditions").
- **One page owns each keyword (no cannibalisation).** Keep a keyword map in `/docs/keyword-map.csv` (keyword, URL, intent, status). If two pages compete, merge them and 301 the loser.
- **Network keyword map (five domains).** The same CSV covers kohphangan.com, angthongmarinepark.com, pigislandkohsamui.com and speedboatsamui.com. If a sister site already ranks in the top 10 for a keyword (e.g. "pig island koh samui", "ang thong marine park tour", "koh samui to koh phangan private transfer"), this site targets the **Samui-specific or informational variant** ("pig island tour from koh samui", "ang thong from chaweng") and links to the sister page once. Product descriptions, FAQ answers and alt text are **written fresh**, never copied from a sister site. Home targets "koh samui" + brand; the tours hub owns "koh samui tours".
- **Slug clash:** `/koh-samui-koh-phangan-private-transfer/` already exists on kohphangan.com. Use `/private-speedboat-koh-samui-to-koh-phangan/` here with original copy.
- Hubs link to all children; children link to their hub and their siblings (rail).
- Cross-site: link to the sister sites only where they truly help (e.g. Koh Phangan beaches → kohphangan.com/koh-phangan-beaches/), and never more than once or twice per page.

### F4. AEO / GEO (answer engines, AI Overviews, ChatGPT, Perplexity, Claude)
- **Answer first.** The first 40–60 words under each H2 answer that H2 directly with numbers (prices, minutes, km, dates).
- **Fact boxes and tables** for prices, times, distances and months. AI systems quote tables.
- **Named entities and specifics:** exact pier names, GPS, opening hours, phone numbers of hospitals and police, year-stamped prices.
- **Freshness signals:** visible "Updated {Month YYYY}", `dateModified` in schema, and a **monthly review cycle** for money and fact pages (events weekly).
- **E-E-A-T:** an About page with the story since 2006, the team (real names and photos if Mea approves), the licence, the office address, the editorial policy ("how we check facts") and a corrections email. Author box on guides.
- **`/llms.txt`** at the root: a short site summary, the key pages (tours, prices, how to get to Samui, weather, events, FAQ) and the contact. Optionally add `/llms-full.txt` with the core facts.
- **robots.txt:** allow GPTBot, OAI-SearchBot, ChatGPT-User, ClaudeBot, Claude-SearchBot, PerplexityBot, Google-Extended and Bingbot (the goal is AI visibility). Block `/wp-admin/` (except admin-ajax), `/cart/`, `/checkout/`, `/my-account/` and `/?s=`.
- **IndexNow** (Rank Math's Instant Indexing) for Bing/Yandex on publish and update.
- **Google Business Profile:** Mea to confirm whether the Samui office already has a GBP, then add the site URL. Keep NAP (name, address, phone) identical everywhere.

### F5. Keyword targets (starting map; validate volumes in GSC and Ahrefs/Semrush if available)
Money: koh samui tours · ang thong marine park tour from koh samui · ang thong speedboat tour · pig island koh samui · koh madsum tour · koh tao day trip from koh samui · full moon party from koh samui · full moon party speedboat samui · private speedboat koh samui · catamaran charter koh samui · yacht charter koh samui · sunset cruise koh samui · koh samui villas · pool villa koh samui · koh samui elephant sanctuary · koh samui cooking class.
Guide: koh samui travel guide · best beaches koh samui · where to stay in koh samui · koh samui weather (by month: "koh samui weather november", "december") · how to get to koh samui · bangkok to koh samui · koh samui to koh phangan ferry · koh samui airport · things to do in koh samui · koh samui itinerary · koh samui nightlife · koh samui night market (Fisherman's Village walking street) · big buddha koh samui · na muang waterfall · hin ta hin yai · secret buddha garden · koh samui hospital · koh samui immigration · scooter rental koh samui · grab koh samui · koh samui tides · koh samui events · loy krathong koh samui · songkran koh samui · white lotus koh samui (filming locations, done tastefully and factually).

---

## PART G: LIVE WIDGETS, DATA FEEDS AND MAPS

### G1. Live widgets (exactly as on kohphangan.com, retargeted to Samui)
| Widget | Source | Where | Notes |
|---|---|---|---|
| **Happening now ticker** | Events CPT (next 24–48 h) | Every page under the header | "Today 12:00 · Title · Venue" / "Tonight 19:00 …" / "Live now" |
| **Time now** | Client JS, `Asia/Bangkok` | Header strip and footer, plus Weather/Tides pages | "Koh Samui 14:32 ICT" |
| **Weather now + 7 days** | Open-Meteo Forecast API (`api.open-meteo.com/v1/forecast`, lat 9.512, lng 100.013, `timezone=Asia/Bangkok`) | `/koh-samui-weather/`, homepage strip, article sidebars | Cache server-side 30 min (transient) to avoid client calls on every view |
| **Tides now / next 7 days** | Open-Meteo Marine API `sea_level_height_msl` (Samui points: Chaweng 9.53, 100.06; Nathon 9.53, 99.93; Thong Krut 9.41, 99.95) | `/koh-samui-tides/`, product pages for boat trips (small card) | Clone `kpl-tnow`: "Tide now (hh:mm) 0.70 m Rising · Next high tide 13:30 1.99 m · in 6 h 36 min · Biggest tide this week …" plus a 7-day chart |
| **Sea conditions** | Open-Meteo Marine `wave_height`, `wind_wave_height`, `swell_wave_height`, wind from Forecast | `/koh-samui-sea-conditions/`, boat product pages | Plain-English verdict: "Calm / Choppy / Rough: boats may be rescheduled" |
| **Currency** | `kpcur` REST endpoint (daily rates) | Header select; every price | Display only; checkout in THB |
| **News** | News posts (our own) | `/koh-samui-news/`, homepage card | Never embed third-party feeds with outbound links |
| **Weather / sea tool links** | Windy, Open-Meteo or TMD | Weather and sea pages only | Allowed utility links (owner rule) |

**Licences:** Open-Meteo's free API is for non-commercial use, so use its **commercial plan** (server-side calls only, key in `wp-config.php`). OpenStreetMap's public tile servers may refuse heavy commercial use, and Carto/Esri layers need licences, so use a **keyed commercial tile provider** (e.g. MapTiler or Stadia Maps) for the street and satellite layers, with visible OSM attribution. Flag this for kohphangan.com too.

All widgets must: render a **server-side fallback** (no layout shift, no "Loading…" forever), cache responses, fail gracefully ("Live data unavailable. Check again shortly"), meet WCAG AA contrast in both themes, and never block LCP.

### G2. Map dataset
Create `/data/samui-poi.json` (and import it into a `place` CPT or ACF repeater) with **≥120 POIs**: beaches, viewpoints, waterfalls, temples, piers (Nathon, Lipa Noi (Raja), Bangrak/Big Buddha, Maenam (Lomprayah), Thong Krut, Bophut/Fisherman's Village, Plai Laem), the airport, hospitals, police, immigration, markets, malls, Muay Thai stadiums, golf, sanctuaries and our office. Fields: `id, name, type, area, lat, lng, hours, fee, phone, url (internal), photo, short, directions_url, updated`. **Verify every coordinate on Google Maps satellite view before publishing.** Wrong pins destroy trust.

### G3. Map UX (clone `kpg-map` / `kp-gm-css`)
Leaflet, tiles in **full colour** (OpenStreetMap standard or a colour Carto/Esri layer; the villa page also gets a Satellite toggle), numbered markers matching the list, category colours, clustering above 25 markers, keyboard-accessible list, `prefers-reduced-motion` respected, and lazy init when scrolled into view. Each popup has photo, name, a one-line description, **Get directions** and a "See guide →" internal link.

---

## PART H: PERFORMANCE, ACCESSIBILITY AND TECH QUALITY

### H1. Budgets (mobile, logged out, Moto G Power / Slow 4G in PageSpeed)
- **LCP < 2.5 s**, **INP < 200 ms**, **CLS < 0.05**, TTFB < 600 ms, **Lighthouse ≥ 90 Performance**, ≥ 95 Accessibility, Best Practices and SEO.
- Page weight under 1.2 MB on articles (under 1.6 MB on the homepage); under 60 requests on articles; **no render-blocking third-party JS**.

### H2. How
- SiteGround Optimizer: dynamic cache + Memcached, CSS minify and combine (test the Elementor CSS), JS defer (exclude the `kpts-init` pre-paint script, which must stay inline in `<head>`), WebP conversion, lazy load and DNS prefetch for Open-Meteo.
- Elementor: Improved CSS Loading, Inline Font Icons, Lazy-load background images, disable unused widgets, and **no Google Fonts from Elementor** (self-host).
- Load Leaflet only on pages with maps; load the WooTour/pickadate JS and CSS only on product, cart and checkout pages; load the cookie banner script async.
- Images: hero 1600–2000px WebP with `srcset` (480/768/1200/1600/2000), explicit width and height on every `<img>`, and `fetchpriority="high"` on the LCP image.
- Cloudflare (optional; ask Mea): cache static assets and use Brotli, but **don't** proxy-cache HTML that varies by cookie (cart, currency).

### H3. Accessibility
WCAG 2.2 AA: contrast (watch white text on lime and lime text on white, because lime as text on white **fails**, so use `--kp-accent-dark` #5E6E00 for lime-coloured text on light backgrounds), focus rings, labelled form fields (WooTour selects included), and an accessible date picker (keyboard and screen reader). Menus have `aria-expanded`, and the ticker can be paused. Tap targets ≥ 44px. `lang="en-GB"`.

### H4. Security and hygiene
Strong admin password + 2FA, limited login attempts, a non-`admin` username, daily SiteGround backups + an off-site weekly backup, auto-updates for minor core versions, staging before plugin updates, `DISALLOW_FILE_EDIT`, no XML-RPC, HSTS, and security headers (CSP report-only first).

---

## PART I: PRODUCTS, BOOKING ENGINE AND PAYMENTS

### I1. Payment and order flow (same as the sister sites)
- **Stripe**, the **same Stripe account** used by kohphangan.com, angthongmarinepark.com, pigislandkohsamui.com and speedboatsamui.com, via the official WooCommerce Stripe Gateway (cards, Apple Pay, Google Pay). Use test keys locally and live keys only on production after Mea approves.
- Currency of record: **THB**. The `kpcur` switcher changes display only. Checkout shows "You will be charged {amount} THB".
- Checkout fields: name, email, WhatsApp number (with country code), hotel/villa name + area (select, same list as the pickup field), special requests. Guest checkout on; no forced account.
- Order emails (WP Mail SMTP): branded HTML in the site palette, with booking reference, date, pax by age band, pickup area, surcharge, total THB, the cancellation policy, WhatsApp contact, "What happens next: we confirm your pickup time by email/WhatsApp the evening before". **No "instant confirmation" wording.**
- **Bookings hub integration:** every paid order must also appear in the owner's central hub at **bookings.speedboatsamui.com** (private WordPress site; roles Owner and Office). Implement it exactly as the other four sites do: inspect how kohphangan.com pushes orders (webhook or REST call on `woocommerce_order_status_processing`/`completed`) and **reuse the same mechanism, payload and site identifier pattern**, with a new source tag for this site. Each booking gets a reference number in the same format as the other sites. Test it end to end with a Stripe test order before launch.
- Booking cut-off: **midnight ICT the day before** (WooTour min-date logic + server-side validation, so the cut-off can't be bypassed with a cached page).
- **Reviews:** WooCommerce reviews from verified owners only. A day+1 email after each trip asks for a product review and gives the Google Business Profile review link. Never seed, buy or write reviews.
- **Email capture (PDPA/GDPR):** opt-in forms "Tell me when Ang Thong reopens" (useful at launch, which falls in the closure) and "Full Moon Party dates", with an unticked consent box, double opt-in, and an unsubscribe link in every mail. Store consent date and source.
- Group enquiries (10+), private charters and villas go through **enquiry first, then a quote, then a payment link** (a Woo "pay for order" link or a Stripe Payment Link from the same account).

### I2. Launch catalogue: the owner's own products from Koh Samui (prices as published on the sister sites on 31 Oct 2026; **re-check with Mea before launch**)
| Product | Price | Notes |
|---|---|---|
| Ang Thong Marine Park Day Tour by speedboat | **1,800 THB** adult | ~8 h; pickup 07:30–08:30, pier ~09:00, back 16:00–16:30, hotel 16:30–17:00. Park fee 300/150 THB cash, not included. Closed 1 Nov–15 Dec |
| Ang Thong Day Tour by big boat | **1,500 THB** | ~10 h |
| Ang Thong **VIP** Day Tour | **4,500 THB** | **15 guests on a big speedboat**: say it |
| Ang Thong Overnight with tent | **3,600 THB** | 2 days/1 night; full refund 48 h+, none under 48 h |
| Ang Thong Overnight with bungalow | **4,200 THB** | bungalow included; "we take care of everything"; very clean bathrooms |
| Ang Thong Private Speedboat | **33,000 THB per boat** | lunch and land transfers optional; the boat can stop at a restaurant; guests may meet the boat at the pier (location sent) |
| Koh Tao & Koh Nang Yuan Day Trip by speedboat | **2,200 THB** | Nang Yuan island fee **250 THB cash** on arrival |
| Pig Island Speedboat Tour (bestseller) | **1,450 THB** | 4–5 h, Thong Krut; ~50 THB island fee cash where not included; **always bookable** |
| Pig Island Small-Group Longtail | **1,750 THB** | ~6 h, lunch on Koh Tan |
| Pig Island Sunset Tour | **1,550 THB** | 5–6 h, dinner |
| Pink Dolphins & Pig Island | **2,250 THB** | ~6 h |
| Private Longtail (Pig Island) | **5,950 THB per boat** | up to 8 |
| Private Speedboat (Pig Island) | **11,950 THB per boat** | up to 10 |
| Koh Madsum, Koh Tan & Koh Rap private | **8,450 THB per boat** | up to 8 |
| Koh Rap Full Day private | **9,950 THB per boat** | |
| Boutique Yachting Day | **4,500 THB** pp | ~8 h, sailing yacht |
| Private Sailing Catamaran | **27,000 THB per boat** | ⚠ pigislandkohsamui.com shows both 21,000 and 27,000. **Ask Mea which is correct** |
| Jet Ski Safari to Pig Island | **9,950 THB per jet ski** | |
| Full Moon Party shared return speedboat | **1,400 THB** pp | hotel pickup and drop-off on Samui; departures 18:00–23:00 window; entry ~200 THB paid at the party |
| Full Moon Party **private** speedboat | **35,800 THB per boat, return** (angthongmarinepark.com). kohphangan.com shows **19,500 THB one way** | up to 10 guests incl. VIP, hotel pickup/drop-off on Samui. **Confirm the price shown on this site with Mea** |
| Half Moon Festival package (boat + ticket) | **from 2,700 THB** | Magic Forest nights only; mirror the organiser's three Samui package options |
| NYE shared boat tickets | as speedboatsamui.com | same 18:00–23:00 departures |
| Private charters (speedboatsamui.com fleet) | from **19,000 THB** (PP 30 ft) to **255,000 THB** (Minor Affair) per boat | enquiry → quote → pay; fleet list in Part O |

**Child prices** are not shown on the sister-site listings, so **ask Mea for the child price for every product** before the booking forms go live. Don't guess.

**Island activities (elephant sanctuary, cooking class, Muay Thai, zipline, jungle safari, ATV, diving, Khao Sok, golf, spa):** publish them as **guide pages with an enquiry CTA** until Mea confirms a Samui partner and its prices. Only then turn them into Woo products, using the kohphangan.com partner rules: partner price (or partner price + an agreed margin), our 48 h policy, our photos or the partner's with permission, **no link to the partner**, and the partner's name hidden if agreed.

### I3. Cross-sell logic
- Ang Thong closed (1 Nov–15 Dec): on every Ang Thong product and guide, show "Season reopens 16 December. Book now for later dates" and a block with Pig Island + Koh Tao.
- Party pages: shared boat → private boat → "add a day trip tomorrow" (Pig Island afternoon/sunset).
- Villa pages: "Add a day on the water" (Ang Thong, Pig Island, private boat).
- Rainy season (Oct–Dec on the east coast): promote west and south-side trips (Pig Island from Thong Krut) and indoor or wellness options.

---

## PART K: CONTENT PRODUCTION RULES (writing quality = ranking)

1. **British English** (`en_GB`, as on kohphangan.com): "colour", "centre", "snorkelling", "travellers".
2. **Voice:** a knowledgeable local friend. Direct, honest and specific. No fluff ("hidden gem", "paradise", "nestled", "boasts", "vibrant tapestry"). Short paragraphs, real numbers, and honest downsides (traffic in Chaweng, jet-ski scams, steep villa roads, monsoon swell on the east coast).
3. **Every factual claim is current and checked at writing time** against an official or primary source (operator timetable, government page, venue page, Google Maps listing). Keep a private `/docs/sources.csv` (page, claim, source URL, checked date). **Don't publish source links to competitors**: sources are for verification, not outbound links.
4. **Prices** always carry the year ("2026 price") and a range when variable; THB first.
5. **Images:** only relevant photos of the actual place or product, high quality, WebP, alt text in the format "{what} at {where}, Koh Samui". Use the owner's own photos first (sister sites, Google Drive), then licensed stock, then partner photos with permission. No watermarks. Don't reuse the same **hero or in-body** image on more than two pages (product thumbnails on cards and rails are exempt). OG share images are **1200×630 JPG**, because WebP previews unreliably in WhatsApp, our main sales channel.
6. **No fabricated reviews, quotes, guest names or ratings.** Ratings in schema only from real WooCommerce reviews.
7. **Page completeness checklist** (every guide): answer-first lead · map where relevant · at-a-glance box · comparison table · H2 per subtopic · seasonal note · safety note · 2–4 money links · FAQ (5–10) · related guides · updated stamp · author box.
8. **Original content only.** Never paraphrase a competitor article; write from verified facts and local knowledge (ask Mea for insider tips per page and mark them "Local tip").
9. **Event content:** weekly update every Monday (next 14 days). Party dates come from official organiser and Full Moon calendars, checked against two sources.
10. **Translation:** GTranslate as on kohphangan.com. Do not hand-translate in phase 1.

### K1. Launch content quota (definition of done for content)
**The binding rule is the parity rule in Part P (P0): every page must meet or beat its measured kohphangan.com twin on H2 topics, FAQs, tables and in-content images, and must contain every fact block in its own brief.** Word counts are references, not gates: a page that covers every section of its brief with real facts is complete, however long it is. **Never add words to reach a number.** The table below gives only reference floors.

**Launch in waves (this matters for Google's scaled-content and helpful-content systems):**
- **Wave 1, indexable at launch (~60 URLs):** home, all hubs, every product and charter page, the 12 pillars, FAQ, About, Contact, Terms, Privacy, Editorial policy, Accessibility, the facts page, the events hub with the next 60 days of events.
- **Waves 2+:** the remaining pages are built as drafts and published at **no more than 10 a week**, after Mea has read each one.
- **A page goes live only with at least one first-hand element:** our own photo, a measured drive time, a "Local tip" from Mea's team, or a price checked in person. Pages that are only rewritten public facts stay in draft until they get one.
- Island-wide facts (visa rules, taxi prices, emergency numbers) live on **one** owner page each; other pages give a one-line summary and link to it. Don't repeat the same paragraphs on 30 place pages.
| Group | Pages | Words each |
|---|---|---|
| Home, hubs (tours, guide, events, villas, retreats, news, places, activities) | 9 | 1,200–2,500 |
| Money pages (products + charter hubs) | ~45 | products ≈ 1,300–1,900; charter hubs ≈ 2,500–3,500 |
| Pillar guides (travel guide, beaches, where to stay, how to get there, weather, things to do, itinerary, nightlife, restaurants, diving, Ang Thong guide, Pig Island guide) | 12 | 3,500–5,000 |
| Sub-guides (transport routes, getting around, rentals, visa, health, money, SIM, markets, temples, waterfalls, viewpoints, sunset, tides, sea, safety, living and working…) | ~75 | 1,900–3,000 (≥ twin) |
| Place pages (beaches, areas, sights) | ~31 | sights ≈ 1,200–1,900; beaches and areas ≈ 1,800–2,500 |
| Event pages (seed: next 60 days + annual festivals) | 25+ | 250–800 |
| FAQ, About, legal, contact | 8 | as needed |
| News (launch backlog) | 6 | 400–800 |

---

## PART L: LOCAL BUILD → DEPLOY PROCEDURE

### L1. Local environment
1. Use **LocalWP** (or Docker: `wordpress:php8.2-apache` + `mariadb:10.11` + `wp-cli`), PHP 8.2, matching the SiteGround PHP version.
2. Clone kohphangan.com: create a **SiteGround staging copy** (or an All-in-One WP Migration / Duplicator export), download it, and import it locally. Rename the local site `kohsamui.local`.
3. `wp search-replace 'kohphangan.com' 'kohsamui.local' --all-tables --precise` (and later to `{{DOMAIN}}`). **Then** search-replace brand strings deliberately: "KohPhangan.com" → `{{BRAND}}`, "Koh Phangan" → "Koh Samui" **only inside templates, menus, snippets and settings**, never blindly across content you'll delete anyway.
4. Purge Phangan content: delete all posts, pages (except templates), products, events, media, orders, customers and reviews. Keep: theme, child theme, Elementor templates and kits, snippets, WooTour and Woo settings (without the Stripe live keys; use test keys), Rank Math settings (reset the analytics connection), menus (rebuild items per Part C), and the CookieYes config.
5. Disable outgoing email locally (or route it to Mailpit) and set the Stripe test mode. **Change or disable every inherited integration** (bookings-hub webhook URL and secret, GA4/Site Kit, CookieYes key, IndexNow key, Rank Math Analytics connection) so test orders and test traffic never reach the live hub or kohphangan.com's analytics.
6. Put the whole site in **git** (`wp-content/themes/hello-elementor-child`, `mu-plugins`, a snippets export, `/data`, `/docs`). Exclude uploads and secrets.

### L2. Build order (one commit per step, with QA after each)
1. Branding: logo SVG (wordmark like KOHPHANGAN.COM: "{{BRAND}}" + "Ultimate Travel Guide"), favicon, OG default image, `{{BRAND}}` replacements, and the tokens (unchanged).
2. Header/footer/menus, then the ticker, currency, theme toggle, language and WhatsApp float.
3. Templates D1–D11 with dummy data, then visual diff against kohphangan.com (light/dark × 4 breakpoints). **In the same step, build the SEO infrastructure every page depends on:** the `kp-schema.php` mu-plugin (R3), `/data/crumbs.json` + the breadcrumb filter (R4), the `kp_content_updated` and `kp_year` fields (R1), the FAQ accordion + registry (R2), and the llms generators (R7). Content is then born compliant instead of retrofitted.
4. Data: `samui-poi.json`, events seed, products (I2), and charter fleet.
5. Widgets: weather, tides, sea, time (Samui coordinates).
6. Content: money pages first, then pillars, places, sub-guides, events and news.
7. SEO: Rank Math titles and metas, schema per template, redirects (none needed at launch), sitemaps, `robots.txt`, `llms.txt`.
8. Performance pass, accessibility pass, then security pass.
9. Full QA (Part M). Then send Mea a review link: a **password-protected SiteGround staging** URL or a temporary subdomain (`staging.{{DOMAIN}}`), **noindex** with `X-Robots-Tag: noindex`.

### L3. Deploy to `{{DOMAIN}}`
1. Mea provides the domain, DNS access, and the SiteGround site or plan. Create the site on SiteGround, add SSL (Let's Encrypt), and force HTTPS + `www` or non-`www` (match kohphangan.com: **non-www**).
2. Migrate with SiteGround Migrator / All-in-One WP Migration, then `wp search-replace` to `https://{{DOMAIN}}`, flush caches and regenerate the Elementor CSS.
   - **Email deliverability before go-live:** SPF, DKIM and DMARC (`p=none`, then `quarantine`) for `{{DOMAIN}}` on the WP Mail SMTP sender; test that confirmations land in Gmail and Outlook inboxes.
   - **Old-domain check:** if `{{DOMAIN}}` was used before, audit its old URLs and backlinks (Wayback, GSC), set 301s to the best new pages, and check Search Console for manual actions. "No redirects needed" is only true for a brand-new domain.
3. Switch Stripe to live keys (same account): register the domain for Apple Pay and Google Pay, set a **per-site statement descriptor suffix** so guests recognise the charge (fewer chargebacks on the shared account), keep Radar on with 3DS when required, and rate-limit checkout against card testing. Set the order webhook to the bookings hub, and send one **real low-value test booking** (refund afterwards) to prove that payment, emails and the hub entry all work.
4. Untick "Discourage search engines". Set up the Search Console + Bing properties, submit sitemaps, and request indexing of home, hubs and top money pages. Run IndexNow. Set up GA4 + Site Kit and GBP.
5. Add the new site to the sister sites' footers ("Our other sites"), plus contextual links where genuinely useful. **Ask Mea before editing the live sister sites.**
6. Monitor for 14 days: GSC coverage, Core Web Vitals, 404s (Rank Math 404 monitor), Stripe and hub logs.

---

## PART M: QA CHECKLIST (run it fully before every hand-over and after every change)
**Functional**
- [ ] Every product is bookable end to end in Stripe **test** mode: date picker (blocked dates correct: Ang Thong 1 Nov–15 Dec, midnight-ICT cut-off), adult/child/infant, pickup surcharge, coupon none, checkout, emails, hub entry and reference number.
- [ ] Pig Island is bookable on any future date.
- [ ] The Full Moon promo shows exactly 2 days before and disappears when online booking closes (test by faking the date).
- [ ] Currency switch THB/EUR/USD on every price (cards, product, cart, checkout notice); the charge stays THB.
- [ ] Dark/light toggle persists (`kp-theme`), with no flash of the wrong theme on load, and every component is readable in both.
- [ ] Ticker, weather, tides, sea and time all show live values, with fallbacks when the API is blocked.
- [ ] Maps: every pin is correct, the list links to the pin, directions links work, and Map/Satellite toggles.
- [ ] Event filters (Live now / Today / Tomorrow / Weekend / categories) are correct in ICT, and past events are hidden.
- [ ] Forms (enquiry, villa, charter) arrive by email, with no spam (honeypot + rate-limit; no visible CAPTCHA unless needed).
- [ ] No comment forms anywhere (except product reviews).
- [ ] WhatsApp opens with the prefilled message "Hi, I'm interested in {page title} ({URL})".

**Content and rules**
- [ ] No outbound links except the sister sites, WhatsApp, Google Maps, weather/sea tools and official government pages. Run a crawl (Screaming Frog or `wp-cli` + a script) and export all external links for review.
- [ ] No "hotel pickup included" without "from most areas" + the surcharge note.
- [ ] No guest numbers on Ang Thong/Koh Tao shared tours; VIP says 15 guests.
- [ ] No "not affiliated with the national park" text.
- [ ] The cancellation policy is identical everywhere.
- [ ] Every page has the updated stamp, one H1, a meta title/description, OG image and schema valid with zero errors.
- [ ] All images are WebP with alt text; none missing, none watermarked.

**Parity**
- [ ] Every Wave-1 URL exists, follows its brief, and its `/docs/parity.csv` row says `pass` (every brief section present; ≥ twin on H2s, FAQs, tables and in-content images; 100% WebP + alt). Later waves pass the same check before publishing.

**Quality**
- [ ] Lighthouse mobile ≥ 90/95/95/95 on home, a product, a pillar, events and villas.
- [ ] Visual parity with kohphangan.com at 390/768/1280/1920 in light and dark (screenshot diff).
- [ ] Keyboard-only booking run-through succeeds; axe DevTools shows 0 serious issues.
- [ ] 404 page, search and the redirect to trailing slash all work.
- [ ] Tested in Chrome, Safari iOS, Samsung Internet and Firefox.

---

## PART N: OPEN ITEMS: ASK MEA BEFORE OR DURING THE BUILD
1. **Domain** `{{DOMAIN}}` and brand display name `{{BRAND}}` (e.g. "KohSamui.com"-style wordmark).
2. **Child prices** for every product (I2), and the correct **catamaran** (21,000 vs 27,000) and **FMP private boat** (35,800 return vs 19,500 one way) prices for this site.
3. **Samui partners** to sell (elephant sanctuary, cooking class, Muay Thai, diving, zipline, jungle safari, ATV, Khao Sok), with their prices, photo permission and whether their name may be shown.
4. **Villas:** which Samui villas (holiday and long-term), their photos (unwatermarked), prices and availability source.
5. **Office address and GBP** for the Samui team (for schema and the contact page), and opening hours (speedboatsamui.com shows WhatsApp support 08:00–20:00 daily).
6. **Real team photos and names** for About/E-E-A-T (optional, but strong for trust).
7. Social profiles for `sameAs`.
8. Whether to include **long-term living content** (real estate, schools, business) at launch or phase 2.
9. Which **languages** GTranslate should offer (kohphangan.com's current set, or add Russian and German as for Pig Island).
10. Confirmation that the bookings-hub connection for this site should use the **same webhook/secret pattern** as kohphangan.com.

---

## PART O: KOH SAMUI FACT SHEET (researched 31 Oct 2026)

**How to use this part:** it is the starting fact base for writing, not publishable copy. Confidence tags: **[V]** = two or more independent sources agree · **[S]** = single source · **[U]** = uncertain or conflicting, which **must** be checked locally or with the operator before publishing. The sources behind every fact are in `/docs/research/` (copy the three research files there). **Never publish those source URLs on the site** (outbound-link rule); they are for checking only. Wherever sources conflict, publish a range with "approx." and a "last checked" date.

### O1. Island basics
- Area **228.7 km²**, Thailand's 2nd-largest island after Phuket [V]. Highest point **Khao Pom 635 m** [V]. Registered population ~70,000, with far more workers and residents in practice [S].
- **Ring road ~51 km** (Route **4169**; connectors **4170** SW (Taling Ngam, Thong Krut, Lipa Noi: steep, narrow, slippery when wet) and **4171** NE (Bangrak, Plai Laem, Choeng Mon, Big Buddha)) [length V, route numbers S]. A full loop takes ~90 min non-stop.
- **Surat Thani province**, Amphoe Ko Samui, **7 tambons**: Ang Thong (incl. Nathon), Lipa Noi, Taling Ngam, Na Mueang, Maret (Lamai), Bo Phut (Chaweng, Bophut, Bangrak, Choeng Mon), Mae Nam [V]. The whole island has been one city municipality (Thesaban Nakhon Ko Samui) since 2012 [V].
- Postcodes: 84320 Bophut/Chaweng · 84330 Maenam · 84140 Nathon/Ang Thong [S].
- Widget and map centre point: **9.512, 100.013** (island centroid). Use the beach-specific coordinates in the POI file for widgets on area pages.

### O2. Getting to Koh Samui
**Samui International Airport (USM)**: privately owned and run by **Bangkok Airways**; open-air terminal; opened 1989 [V].
| Route | Airline | Frequency (late 2026) | Tag |
|---|---|---|---|
| Bangkok Suvarnabhumi | Bangkok Airways | ~20–25 daily; ~1h05–1h10 | [V] |
| Bangkok Don Mueang | Bangkok Airways | ~3 daily | [V] |
| Phuket | Bangkok Airways | ~7–8 daily | [V] |
| Krabi · Chiang Mai · U-Tapao (Pattaya) | Bangkok Airways | 1–2 daily · ~1 daily · ~1 daily | [V] |
| Singapore | Bangkok Airways + **Scoot** | several daily combined | [V] |
| Hong Kong | Bangkok Airways | ~1 daily | [V] |
| Chengdu Tianfu | Bangkok Airways | seasonal (~2/week, Feb–Sep) | [V]/[S] |
| Kuala Lumpur Subang | Berjaya Air (all-business ATR, described as charter, from Apr 2026) | 3× weekly | [U]: check it still operates |
- Thai Airways TG59xx numbers on BKK–USM are most likely **codeshares** on Bangkok Airways [U]. **Don't** write "Thai Airways flies to Samui".
- Fares BKK–USM one way: roughly **2,800–6,800 THB**, checked bag included [V].
- Airport expansion: 6 m passengers/year, gates 7 → 11; construction start Q2 2026, completion 2030 (Mar 2026 update) [scope V, timeline S].

**Via Surat Thani airport (URT) / Nakhon Si Thammarat (NST):** low-cost flights from Don Mueang, then combo coach + ferry from the arrivals hall [S]. Total 5–7 h, ~1,500–3,000 THB all-in [S].
| Combo from URT | Samui pier | Price (THB) |
|---|---|---|
| Phantip + Seatran | Nathon | 330–520 |
| Raja | Lipa Noi | ~550 |
| Lomprayah | Nathon | ~850 (1,000 with hotel drop) |
| Boonsiri | Nathon | ~850 |
The last combos leave ~16:00 [S].

**Overland from Bangkok:** night train (e.g. Express 85 Krung Thep Aphiwat 19:50 → Surat Thani/Phun Phin 06:23; 2nd-class sleeper 700–900, 1st 1,300–1,500 THB) + bus + ferry: 15–17 h door to door [S]. Lomprayah bus + catamaran from Khao San 1,250–1,750 THB [S]. Government coach + Seatran 620–960 THB [S].

**Car and passenger ferries from Donsak (Surat Thani):**
- **Raja Ferry**: Donsak → **Lipa Noi** (west coast), ~1.5 h, foot passenger **220 THB**, roughly hourly 05:00–19:00 [V].
- **Seatran Ferry**: Donsak → **Nathon**, ~1.5 h, "every hour", foot passenger ~170, car ~550 THB [S].

**Samui ↔ Koh Phangan** (~40 sailings/day, 20–50 min, mostly 200–500 THB) [S, broadly V]:
| Operator | Samui pier | Phangan pier | Time | THB |
|---|---|---|---|---|
| Lomprayah / Lomlahkkhirin | Bangrak (Lomprayah pier) · Pralarn (Maenam) · Nathon | Thong Sala | 20–30 min | 350 |
| Seatran Discovery | Bangrak (Seatran pier) | Thong Sala | 45 min | ~345–427 |
| Songserm speedboat | Bangrak (Petcherat Marina) / Nathon | Thong Sala | 20–30 min | 350 |
| Echo Travel speedboat | Bangrak (Petcherat Marina) | Baan Tai | 30 min | 490 |
| **Haad Rin Queen** ferry | **Big Buddha pier** | **Haad Rin** | 50 min | 200 (10:30, 17:00) |
| Haad Rin Queen speedboat | Big Buddha pier | Haad Rin | 25–30 min | 500 |
Several different piers are all called "Bangrak pier", so **always name the exact pier** [V]. The Haad Rin Queen is the direct Full Moon route, which is why our door-to-door FMP boats are the upsell.

**Samui ↔ Koh Tao:** fast boats 1.5–2 h (most via Phangan) **~700 THB**; slow ferry 2.5–3.25 h, 450–550 THB; all arrive at Mae Haad [S].

### O3. Getting around
- **Taxis don't use meters.** Fixed or negotiated fares. **Airport → Chaweng ~400–600 THB** [V]; elsewhere sources conflict, so publish "**approx. 400–700 THB depending on zone**" [U] (photograph the official airport kiosk board for exact zones). Shared airport minibus ~100–250 THB pp [V]. Full-day taxi 2,000–3,000 THB [S].
- **Grab** works but coverage is thin (best in Chaweng, Bophut and Lamai; weak on the west coast). Airport → resorts 300–600 THB; short hops 80–120 [V/S]. **Bolt**: unconfirmed on Samui, so test it in-app before writing [U].
- **Songthaews:** locals pay 30–80 THB along the ring road; tourists are often asked 50–120. They mostly stop by ~20:00–22:00, are cash only and don't serve the airport [V].
- **Scooters:** 125 cc **~150–350 THB/day**; 150–160 cc 200–450; monthly 2,000–4,500 [V]. You need your licence + an **International Driving Permit with the motorcycle category**, or insurance won't pay [V]. **Helmet fine up to 2,000 THB per person since 1 June 2025** [V]. Police checkpoints near Chaweng Lake Road, the airport and Route 4169 [V]. **Don't leave your passport as a deposit** (UK FCDO advice) [S, official].
- **Cars:** compact ~800–1,200 THB/day, SUV 1,500–2,500 THB/day; IDP required [V].

### O4. Entry and visas: **high-stakes; link to official pages only (tdac.immigration.go.th, Thai embassy pages, GOV.UK if you need a reference)**
- **Visa exemption cut to 30 days from 15 September 2026** (Royal Gazette notices of 31 Aug 2026) for **60 countries incl. the UK, US, Canada, Australia, Japan, India and all EU states** [V, confirmed by TAT and a Thai embassy]. People who entered before 15 Sep keep their stamped stay. Mauritius and Seychelles get 15 days. Land-border visa-exempt entries are limited to 2 a year [V].
- **Extension:** once, by up to **30 days**, at immigration, form TM.7, **1,900 THB** [V].
- Possible checks at entry: proof of funds (**10,000 THB per person / 20,000 per family**) and an onward ticket [S, GOV.UK]. Overstay **500 THB/day up to 20,000 THB** plus possible ban [V].
- **TDAC (Thailand Digital Arrival Card)** is mandatory for all foreign arrivals since 1 May 2025, filed at **tdac.immigration.go.th** within 3 days before arrival and **free** (warn about paid look-alike sites) [V].
- **Tourist entry fee: NOT in force.** The latest proposal is a flat 450 THB (Aug 2026), still pending a hearing, Cabinet and the Gazette. Copy: "A fee has been proposed but is **not** being collected as of {date}" [V for "not collected"].
- **DTV (Destination Thailand Visa):** 5 years, multiple entry, up to 180 days per entry, 10,000 THB fee, 500,000 THB funds; extra rules from 31 Aug 2026 (criminal record certificate, apply via the mission for your nationality or residence) [V/S].
- **Koh Samui Immigration Office:** 333 Maenam Road, Soi 1, Moo 1, Maenam 84330 (it moved from Nathon in 2016, so fix old pins), tel +66 77 423 440, usually Mon–Fri 08:30–16:30 (call ahead) [V address, S hours].
- **The `/thailand-visa-guide/` page must say 30 days, not 60.** kohphangan.com's version already says 30 days, so the Samui page needs **original text** (same slug, different domain; don't copy it word for word).

### O5. Health, safety and law
**Hospitals** (location V, phones vary, so **take numbers from each hospital's own site** [U]):
| Hospital | Area | Notes |
|---|---|---|
| Bangkok Hospital Samui | Chaweng (ring road near Chaweng Noi), 57 Moo 3 Thaweerat Phakdee Rd | private; trauma, paediatrics; tel +66 77 429 500, hotline 1719 |
| Samui International Hospital | north end of Chaweng Beach Road, Bophut | private, 24 h ER |
| Thai International Hospital | Chaweng, opposite Lotus's | private, 24 h A&E |
| Bandon International Hospital | Bophut, ring road near Big C | private |
| Koh Samui Hospital (government) | outskirts of Nathon, Tambon Ang Thong | government |
- Hyperbaric chamber: SSS Network, Bophut [S], so confirm the address and 24 h number before publishing.
- **Emergency numbers:** Tourist Police **1155** · Police **191** · Ambulance **1669** · Fire **199** · TAT 1672 [V].
- **Sea hazards:** rip currents and red flags on **Chaweng and Lamai in the NE monsoon (Oct–Dec)** and during winter surges (e.g. red flags on 19 Feb 2026); a tourist was swept off the rocks at Lad Koh viewpoint (Nov 2024) [V]. **Box jellyfish:** 9 of Thailand's 10 recorded deaths since 2002 were off Samui and Phangan; vinegar stations are at hotels; first aid is vinegar for 30 s or more, without rubbing or fresh water [V]. Fatal boat accidents are linked to overloading and rough seas, which strengthens our "we cancel when it isn't safe" message [S, FCDO].
- **Cannabis:** since 25 June 2025, buying requires a **prescription**; **public smoking is banned** (fines up to 25,000 THB) [V]. Copy: "illegal to buy without a prescription; never smoke in public". The rules keep changing, so keep the copy general.
- **Vapes and e-cigarettes are illegal** (import, possession and use), with fines, detention and reported extortion demands [V].
- **Alcohol:** sales allowed **11:00–24:00 since 29 May 2026** (the old 14:00–17:00 ban has ended); licensed venues and hotels are exempt from the hours; drinking age 20 [V]. On Buddhist holy-day bans, **hotels, licensed bars and entertainment venues may still sell** (since May 2025), but 7-Eleven and shops can't [V].
- Dengue: endemic, with peaks in the rainy season. Cite an official health source (CDC or TravelHealthPro) when written [U].

### O6. Money and connectivity
- Foreign-card ATM fee **220–250 THB** per withdrawal; AEON ATMs (Big C, Lotus's) 150 THB; limits 20,000–30,000 THB. **Always decline DCC.** Cards are widely accepted in malls, 7-Eleven and hotels; cash is needed for street food, songthaews, many taxis and boat island fees [V].
- SIM: **AIS** and **True** (True and dtac merged). Tourist SIMs: 8 days 499 · 15 days 699 · 30 days 1,199 THB, with unlimited data; passport registration required [S]. eSIMs use the same networks.

### O7. Climate and sea (for `/koh-samui-weather/` and `/koh-samui-sea-conditions/`)
| Month | High °C | Low °C | Rain mm | Rain days | Sea °C | Boat-trip conditions |
|---|---|---|---|---|---|---|
| Jan | 29 | 24 | 127 | 8 | 28 | good; occasional NE swell |
| Feb | 29 | 25 | 64 | 4 | 28 | **best**: calmest |
| Mar | 30 | 25 | 116 | 5 | 29 | excellent |
| Apr | 32 | 26 | 83 | 6 | 30 | excellent; hottest; Songkran |
| May | 33 | 26 | 132 | 11 | 30 | good |
| Jun | 33 | 25 | 134 | 10 | 30 | good (Samui sheltered from the SW monsoon) |
| Jul | 32 | 25 | 117 | 11 | 30 | good |
| Aug | 32 | 25 | 102 | 10 | 29 | good |
| Sep | 32 | 25 | 118 | 11 | 29 | good |
| Oct | 31 | 24 | 295 | 16 | 29 | mixed; NE monsoon starting |
| **Nov** | 30 | 24 | **445** | 16 | 29 | **wettest; rough on the east coast; Ang Thong closed** |
| Dec | 29 | 24 | 263 | 12 | 28 | improving; Ang Thong reopens 16 Dec |
Source: WMO 1991–2020 station normals [V for the pattern; exact mm vary by dataset; one cross-check gives Nov 463 mm]. **Key message:** Samui's rainy season is **Oct–Dec (peak in November)**, the opposite of Phuket's May–Oct; **Feb–Apr is the calmest sea**; sea 28–30 °C all year. Tropical storms can hit in Dec–Jan (e.g. Pabuk, Jan 2019, closed ferries and Ang Thong).
- **Ang Thong National Marine Park:** customary closure **1 Nov–15 Dec** [V], with ad-hoc storm closures possible. Fees: foreign adult **300**, child **150**, Thai 40/20 THB [S]. 42 islands; HQ on Koh Wua Talab [S]. Confirm the 2026 closure with the DNP announcement.

### O8. Events calendar seed, Nov 2026 – Dec 2027 (load into the Events CPT; set `confidence` and `last_verified` meta)
**Full Moon Party (Haad Rin, Koh Phangan)**: our biggest event product from Samui. These dates match across two schedules; four 2027 dates are **moved off Buddhist holidays** (marked ★), and competitors often get them wrong, which gives us an SEO edge:
- **2026:** **Tue 24 Nov** (same night as **Loy Krathong**) · **Thu 24 Dec** (Christmas Eve) · **Thu 31 Dec (NYE)**
- **2027:** Fri 22 Jan · **Mon 22 Feb ★** · Mon 22 Mar · Wed 21 Apr · **Fri 21 May ★** · Sat 19 Jun · **Tue 20 Jul ★** · Tue 17 Aug · Wed 15 Sep · **Sat 16 Oct ★** · Sat 13 Nov (probably Loy Krathong) · Mon 13 Dec · **Fri 31 Dec (NYE)**
Re-verify every date ~30 days ahead (the Haad Rin association can move them).

**Half Moon Festival (Ban Tai, Phangan)**, as on the official site for 2026: Tue 3 Nov (beach club) · Tue 17 Nov (beach club) · **Wed 2 / Thu 3 Dec** (beach club then Magic Forest) · **Wed 16 / Thu 17 Dec** [V]. 2026 tickets: day party 1,300 · Magic Forest 2,500 · VIP 4,900 THB [S]. The 2027 dates are single-source only, so load them only after halfmoonfestival.com publishes. **Our Samui packages are for Magic Forest nights only.**

**Jungle Experience** (the night before the FMP): Mon 23 Nov · Wed 23 Dec · Wed 30 Dec 2026 [S]. **Waterfall Party:** Wed 11 · Sun 22 · Thu 26 Nov 2026 [S].

**Samui festivals and holidays:**
| Date | Event | Tag |
|---|---|---|
| **Tue 24 Nov 2026** | **Loy Krathong**: Chaweng Lake, Big Buddha, beaches and hotel ponds. **Sky lanterns are banned on Samui**; promote eco krathong (bread or banana leaf, not foam) | [V] (some English sites wrongly say 25 Nov) |
| Sat 5 Dec 2026 | Father's Day / King Bhumibol Memorial (public holiday, no alcohol ban) | standard |
| ~mid-Dec 2026 | Samui Santa Run (2025: Sat 13 Dec) | [U] |
| Thu 24 – Fri 25 Dec 2026 | Christmas: resort brunches and galas | — |
| **Thu 31 Dec 2026** | **NYE**: Central Samui free countdown and fireworks; ARKbar beach countdown; resort galas (e.g. Anantara Bophut, 14,500++ THB); fireworks biggest at Chaweng, then Fisherman's Village, Lamai, Maenam, Choeng Mon. The 2026 municipal programme was not yet published | [V/S] |
| **Sat 6 Feb 2027** | **Chinese New Year**: Maenam Chinese temple and lion dances (family), Nathon Hainan shrine (traditional; may include face-piercing), Guan Yu shrine at Hua Thanon | [S]; confirm the programme in Jan |
| **Sun 21 Feb 2027** | **Makha Bucha alcohol-sales ban** (hotels and licensed bars exempt) | [V] |
| ~Feb 2027 | Koh Samui Red Cross Fair (usually Nathon) | [U] |
| ~late Mar 2027 | Samui Open Beach Volleyball (2026: 26–29 Mar at Central Samui beach) | [U] |
| **Tue 13 – Thu 15 Apr 2027** | **Songkran**: Samui street events usually from **12 Apr** in Chaweng (Beach Road is the main water fight), Lamai and Nathon; ARKbar, SEEN and Central Samui foam party | [V] holiday dates |
| **Thu 20 May 2027** | Visakha Bucha alcohol-sales ban | [S] |
| **Sat 22 – Sat 29 May 2027** | **24th Samui Regatta**, Chaweng | [V] |
| ~late May 2027 | Central Samui Neon Run (2026: Sat 30 May) | [U] |
| ~Jun 2027 | Bangkok Airways Samui Half Marathon (2026: Sun 21 Jun) | [U] |
| Sun 18 – Mon 19 Jul 2027 | Asahna Bucha and Khao Phansa alcohol bans | [U]: dates differ by a day between sources |
| ~Fri 15 Oct 2027 | Ok Phansa alcohol ban; Chak Phra / Thod Pha Pa temple-float procession and fair in **Nathon** (~9 days around the end of Lent) | [U] |
| ~Nov 2027 | Samui Trail (ITRA; 2025 edition was 8–9 Nov) | [U] |
- **Buffalo fighting:** no confirmed 2025–26 venues or dates. **Don't list it as an event or sell it.** At most, add a cultural footnote.
- **Discontinued or unconfirmed (do not publish as upcoming):** Samui Festival (last 2019), Samui triathlon, Samui Jazz Festival (last 2022). Zamna on the Beach ran on 21 Feb 2026 at SEEN, but no 2027 date has been announced.
- **Automation:** show an **alcohol-ban banner** on holy days, with copy that explains that hotels and licensed bars may still serve.

### O9. Markets and walking streets (**field-check before publishing; online sources are badly out of date**)
| Market | Day | Hours | Location | Status |
|---|---|---|---|---|
| **Fisherman's Village Walking Street** | **Friday** (main); smaller Mon and Wed | ~17:00–23:00 | Bophut, The Wharf → Coco Tam's | [V] firm |
| **Chaweng Walking Street** | **Thu, Fri, Sat** | ~16:00/17:00–22:00/23:00 | by Chaweng Lake, opposite Central Samui | [V] firm |
| Central Samui market | daily | afternoon–~22:00 | Central Samui square | [V] |
| Si Khao Night Market | daily | 17:00–23:00 | off Chaweng Beach Road | [V] |
| Lamai Night Market | daily | from ~17:00 | Lamai Beach Road, before the bridge | [S] |
| Nathon Night Market | daily (busiest Tue) | ~16:00–22:00 | Nathon waterfront | [V] |
| Free Wave Market (new 2025) | daily | 16:00–24:00 | Bophut, by the Fisherman's Village sign | [S] |
| Maenam Walking Street (Thu) | ? | ? | Maenam Chinatown | **[U]: may have disappeared after the pandemic** |
| Lamai Sunday Walking Street | ? | ? | central Lamai | **[U]: may have disappeared** |
| Nathon Saturday walking street | — | — | — | treat as discontinued |
Outdoor markets are often rained off in Nov–Dec, so add "weather permitting" + the weather widget.

### O10. Nightlife (status Oct 2026) **(guide content only; never link to venues)**
- **Chaweng:** Green Mango (nightly ~21:00–04:00) [V] · **ARKbar Beach Club** (daily, nightly fire shows; pool parties often Wed and Fri 14:00–19:00 [S]) [V] · Bar Solo (live bands) [S] · SEEN Beach Club at Avani (Fri party, Sat pool party, Sun brunch) [V/S] · Elephant Beach Club [S] · Paris Follies Cabaret [U]. **Closed: Starz Cabaret (since 2021), Chaweng Stadium (Muay Thai).**
- **Lamai:** quieter; Shamrock Irish Pub (nightly band), Rock Bar, Teddy Weed beach bar [S]. **Beach Republic: largely closed in 2025–26, so don't promote it.**
- **Bophut / Fisherman's Village:** Coco Tam's (fire shows, beanbags) [V].
- **Bangrak / Plai Laem:** Chi Samui, Tembo Beach Club, Malika, 79 Beach Club [V/S].
- **Maenam:** Cape Away Sunday party [S].
- **West coast:** Nikki Beach (Lipa Noi; Sat party, Sun brunch) [V]; sunset bars at the big west-coast resorts (Air Bar at the InterContinental, Jahn at the Conrad, Woobar at the W) [S].
- **Muay Thai:** **Samui International Muay Thai Stadium** (Chaweng; **Tue/Fri/Sun**, fights ~21:00) and **Phetchbuncha Stadium** (Chaweng; **Mon/Wed/Sat**, 21:00); tickets **1,500 / 2,000 ringside / 2,500 VIP THB** [V]. There are no fights on Thursdays. These are a strong commission product, so ask Mea.
- **"On tonight" cheat sheet** for the homepage strip (generate it from the events CPT recurrence rules):
  - Mon: Phetchbuncha Muay Thai; Fisherman's Village small market
  - Tue: Samui International Muay Thai
  - Wed: Phetchbuncha; ARKbar pool party
  - Thu: Chaweng Walking Street
  - Fri: **Fisherman's Village Walking Street**; Chaweng Walking Street; Samui International
  - Sat: Phetchbuncha; SEEN pool party; Chaweng Walking Street
  - Sun: Samui International; Cape Away; brunches

### O11. Tour market prices (to position our prices; **never name or link the sellers**)
| Product (adult, THB) | Market range 2026 | Our price | Positioning line for the copy |
|---|---|---|---|
| Ang Thong shared speedboat | 1,740–2,500 (+300 park fee usually extra) | **1,800** | "Speedboat, local crew since 2006, hotel pickup from most areas" |
| Ang Thong big boat | 1,100–1,400 (boats carry 50+) | **1,500** | justify with the inclusions; check this with Mea |
| Ang Thong private speedboat (35 ft) | 50,600–61,200 (premium operator, 3 seasons) | **33,000** | a strong value message |
| Pig Island + Koh Tan shared speedboat | 1,350–1,400 (+50 Madsum fee) | **1,450** | competitive |
| Pig Island private longtail | 3,500–6,250 | **5,950** | |
| Koh Tao & Nang Yuan speedboat | 1,500–2,500 (+250 Nang Yuan fee; child 100–120) | **2,200** | |
| FMP return transfer | ~2,800 (minivan + boat) | **1,400** | half the price: lead with it |
| Sunset catamaran (shared) | 1,500–3,500 | — | potential product |
| 4x4 jungle safari | ~1,700 (7 h incl. lunch and entries) | partner? | |
| ATV / quad | ~1,490 | partner? | |
| Zipline (Tree Bridge, Maenam hills) | ~1,590 (8 platforms, ~2 km) | partner? | |
| Elephant sanctuary half day | ~3,000 / child 1,500 | partner? | see below |
| Sail Rock 2-dive trip | from ~4,650 | partner? | Ang Thong diving season Feb–Oct, clearest Mar–Apr |
| Thai massage 1 h | 300–500 (Chaweng 400–600) | guide only | |
| Muay Thai stadium | 1,500 / 2,000 / 2,500 | partner? | |
| Golf: Santiburi 18 holes | ~5,600 incl. caddie + cart | guide only | |
- **Khao Sok is NOT a realistic day trip from Samui** (4–6 h each way) [V]. Sell it as a **2-day/1-night** package only, or leave it out, and say so honestly in the guide.
- **Elephants:** promote only no-riding, no-bathing venues. The strongest welfare credentials belong to **Samui Elephant Sanctuary** (Bophut and Chaweng Noi; listed by welfare organisations; half day ~3,000) [V]. **Samui Elephant Kingdom** sits at the old Namuang Safari Park address, and legacy listings still mention riding [U], so do not promote it until the riding question is verified. Never sell or show elephant riding, and skip the chained-elephant feeding at Overlap Stone.
- **Likely closed or unverified; do NOT list as open without a phone check:** Samui Aquarium & Tiger Zoo, Samui Butterfly Garden, Coco Splash waterpark, Samui Snake Farm, Namuang Safari Park, Overlap Stone 2 (reported closed after a forestry raid in July 2026).
- Charters price in three seasons in the market: **low May–Oct · high Nov–Apr · peak 15 Dec–15 Jan**. Ask Mea whether our fleet prices are seasonal.

### O12. Our charter fleet (from speedboatsamui.com, per boat, "from" price; **use it as the data source, never link to it from booking flows; link the brand only in "Our other sites"**)
| Vessel | Type | Max guests | Price basis | From (THB) |
|---|---|---|---|---|
| PP Speed Boat 30 ft | Speedboat | 8 | 4 guests | 19,000 |
| NP Speed Boat | Speedboat | 16 | 6 guests | 28,000 |
| PP Speed Boat 35 ft | Speedboat | 28 | 6 guests | 29,000 |
| AP Speed Boat | Speedboat | 30 | 12 guests | 30,000 |
| FS Speed Boat | Speedboat | 28 | 6 guests | 30,000 |
| KT Speed Boat | Speedboat | 14 | 6 guests | 30,000 |
| PP Speed Boat 40 ft | Speedboat | 22 | 6 guests | 33,000 |
| COCO CAY | Speedboat | 10 | 2 guests | 38,000 |
| MN Speed Boat | Speedboat | 37 | 10 guests | 46,000 |
| VICTORIA SAILING | Sailing catamaran | 13 | 10 guests | 20,000 |
| BLUE COCO | Catamaran | 25 | 10 guests | 36,000 |
| KIA ORA | Catamaran | 45 | 15 guests | 36,000 + 7% VAT |
| COCO PARADISE | Twin-engine catamaran | 45 | 10 guests | 45,000 |
| RED BARON | Junk yacht | 70 | 20 guests | 41,000 |
| CASABLANCA | Motor yacht | 12 | — | 50,000 |
| MINOR AFFAIR | Motor yacht | 12 | — | 255,000 |
Destinations to template as charter itineraries: Ang Thong · Pig Island / Koh Tan / Koh Rap (southern islands) · Koh Som & Tongson Bay · Koh Phangan (beaches, Bottle Beach, Than Sadet) · Koh Tao & Nang Yuan · Samui coastal sunset · Full Moon Party.

### O13. Sights: GPS, fees and hours (seed `samui-poi.json`; **verify each pin on Google Maps satellite view**)
| Sight | Area | GPS | Entry | Hours | Tag |
|---|---|---|---|---|---|
| Big Buddha (Wat Phra Yai) | Koh Fan islet causeway, Bang Rak, ~3 km N of airport | 9.5708, 100.0598 | free | 07:00–18:30 | [V]; statue height 12 m or 15 m [U], so don't state it |
| Wat Plai Laem | NE tip, ~1 km E of Big Buddha | 9.5713, 100.0673 | free | ~06:00–18:00 | [V]; 18-armed Guanyin, laughing Buddha; built 2004–09 |
| Hin Ta & Hin Yai | south end of Lamai | 9.4522, 100.0395 | free (parking ~30) | ~08:00/08:30–18:30/19:00 | [V]/[S] |
| Na Muang Waterfall 1 | interior, Na Mueang | 9.4668, 99.9838 | free (parking 20/60) | 09:00–17:00 | [S]; swimmable pool |
| Na Muang Waterfall 2 | further up the same road | 9.4723, 99.9905 | free | 09:00–18:00 | [S]; 20–40 min steep climb; both falls thin Feb–Apr |
| Hin Lad Waterfall | ~2 km S of Nathon, interior | 9.5205, 99.9556 | — | — | [S]; ~2 h round trip, steep |
| Wat Khunaram (mummified monk Luang Pho Daeng) | Rte 4169, Na Mueang | 9.4495, 100.0004 | free | daytime | [V]; dress code |
| Secret Buddha Garden (Tarnim Magic Garden) | central highlands | 9.4829, 99.9945 | 80 or 100 [U] | 09:00–18:00 | steep road: 4x4 or tour |
| Overlap Stone | hills above Maret/Lamai | 9.4597, 100.0301 | ~300 (incl. soft drink) [S] | 08:00–18:00 | ~500 m walk, suspension bridge |
| Lad Koh viewpoint | ring road, Chaweng Noi → Coral Cove | 9.4990, 100.0600 | free | 24 h | [V]; **warn about waves on the rocks** |
| Khao Hua Jook Chedi (viewpoint) | above Chaweng | 9.5371, 100.0589 | free | — | [S] |
| Fisherman's Village | Bophut | 9.5597, 100.0314 | free | Fri walking street ~17:00–23:00 | [V]; road closes ~16:30 Fri; scooters towed (500+ release) |
| Wat Ratchathammaram ("Red Temple", Wat Sila Ngu) | between Lamai and Hua Thanon | 9.4512, 100.0309 | free | 07:00–17:00 | [V] |
| Laem Sor Pagoda | SW coast near Bang Kao | 9.4117, 99.9690 | free | 07:00–18:00 | [V] |
| Coral Cove | between Chaweng Noi and Lamai | 9.4906, 100.0613 | free (kayak ~300/h) | — | [S] |
| Guan Yu Shrine (16 m bronze) | hillside, Hua Thanon | 9.4454, 100.0244 | free | 09:00–17:00 | [V] |
| Chinese Temple of Guanyin | Taling Ngam | 9.4212, 99.9479 | — | daylight | [S] |
| Hua Thanon fish market / Muslim fishing village | SE coast | 9.4426, 100.0236 | free | mornings best | [V] |
| Wat Samret | Na Mueang Rd | 9.4380, 100.0106 | free | — | [S] |
| Pra Buddha Dipankara | Na Mueang hills | 9.5020, 100.0060 | — | — | [S] |
| Paradise Park Farm | hills above Lipa Noi | 9.4862, 99.9833 | ~400 [U] | 09:00–17:00 | [S] |
| Tree Bridge zipline | Maenam hills | — | 1,590 | 09:30–17:00 | [V] |
| Santiburi Golf | Ban Don Sai, Mae Nam | — | 5,600 / 18 holes | — | [S] |
| Kamalaya (wellness) | Laem Set Rd, Na Mueang | — | from ~US$1,836 / 3 nights | — | [S] |
| Absolute Sanctuary | Choeng Mon / Bophut | — | 6 nights from ~US$2,152 | — | [S] |
| Vikasa Yoga | cliffside, Chaweng Noi–Coral Cove | 9.4861, 100.0658 | — | — | [S] |
| Samui Immigration | Maenam | — | — | Mon–Fri | [V] |
**Still missing GPS (take from Google Maps when building):** Nathon pier, Thong Krut pier, Koh Tan, Koh Madsum, Laem Set, Plai Laem beach, the Chaweng Lake viewpoint, every ferry pier and every hospital.

### O14. Beaches (for `/koh-samui-beaches/` and the beach place pages)
**Island rule:** calm Jan–Sep, best Feb–Apr; **Oct–Dec brings big waves, rip currents and red flags on the east coast**; north and west coast beaches are **tidal**, with flats at low tide, so swim at high tide (link to our tide widget) [V].
| Beach | Coast | GPS | Character | Swimming | Best for | Sun |
|---|---|---|---|---|---|---|
| Chaweng North | E | ~9.532, 100.0675 | quietest part of Chaweng | best of the busy beaches | families near restaurants | sunrise |
| Chaweng Central | E | — | busiest; ARKbar, clubs | good; red flags Oct–Dec | first-timers, party | sunrise |
| Chaweng Noi | E | 9.5082, 100.0565 | quiet cove | good, snorkel off the sand | couples | sunrise |
| Lamai | SE | 9.4618, 100.0446 | ~4 km, slower pace | centre best (drops steeply); north end stony | couples, value | sunrise |
| Silver Beach (Crystal Bay) | E | 9.4778, 100.0663 | boulder cove, fills by 10:00 | good swim and snorkel | couples, photos | sunrise |
| Coral Cove | E | 9.4906, 100.0613 | rocky cove | snorkel; coarse sand, wear water shoes | snorkellers | sunrise |
| Choeng Mon | NE | 9.5722, 100.0825 | sheltered bay | **among the calmest**; sandbar to Koh Fan Noi at low tide | **families with small kids**, honeymoon | sunrise |
| Tongson Bay | NE | 9.5866, 100.0757 | small, sheltered, quiet | clear Dec–Apr | half-day escape | — |
| Bang Rak (Big Buddha Beach) | N | 9.5572, 100.0533 | piers, airport noise | **not for swimming** | short stays, dining | sunset |
| Bophut | N | 9.5611, 100.0280 | Fisherman's Village strip | **not recommended for swimming** | dinner, couples | sunset view to Phangan |
| Maenam | N | 9.5701, 100.0004 | long, quiet, palms | calm dry season | budget, long stays, quiet families | — |
| Bang Por | NW | 9.5781, 99.9369 | local seafood, quiet | **high tide only** (stony flat) [U: sources conflict] | seafood, sunsets | **sunset** |
| Laem Yai | NW | 9.5696, 99.9163 | very quiet, resort frontage (Four Seasons side) | poor at low tide; snorkel | sunset | sunset |
| Lipa Noi | W | 9.5007, 99.9344 | quiet, local, Nikki Beach nearby | very shallow, calm | **families with toddlers**, sunset | **sunset** |
| Taling Ngam | SW | 9.4554, 99.9347 | long village beach, cliff resorts | tidal | seclusion | **best sunset** (Five Islands) |
| Thong Krut | SW | — | pier village for Pig Island boats | — | boat departures | sunset |
| Bang Kao | S | 9.4232, 99.9938 | quiet local | high tide only, coral bits | solitude | — |
| Nathon | W | — | town pier, not a beach | — | sunset from the pier | sunset |

### O15. Areas and where to stay (mid-range double, shoulder season; peak adds 30–80%)
| Area | Mid-range THB/night | Suits | Honest downside |
|---|---|---|---|
| Chaweng | 2,000–4,500 (budget 500–950) | first-timers, nightlife; 10–15 min to airport | busy, traffic |
| Lamai | 1,500–3,500 | value, couples | 25–30 min to airport |
| Bophut / Fisherman's Village | 2,500–5,000 | couples, foodies | beach not for swimming |
| Maenam | 1,000–2,500 | budget, long stays | quiet nights |
| Choeng Mon | 3,000–7,000 | families with small kids, honeymoon | quiet after dark |
| Bang Rak / Plai Laem | — | short stays near the airport and piers | poor swimming, aircraft noise |
| Lipa Noi / Taling Ngam (west) | 1,500–6,000 | sunsets, villas, honeymoon | 40–50 min to airport, few restaurants |
| South (Bang Kao, Laem Set, Thong Krut, Hua Thanon) | — | wellness, quiet | far from everything |
- Luxury: 10,000+ THB/night. Named luxury resorts include Four Seasons (Laem Yai), SALA Choengmon, W (Maenam), Banyan Tree and Silavadee (Lamai), Anantara Bophut, Santiburi, Napasai, The Tongsai Bay, Conrad (Taling Ngam) and Six Senses. **Mention them in guides as context only; never link to them.**
- **White Lotus season 3** was filmed largely at the **Four Seasons Koh Samui** (aired Feb–Apr 2025): it brought +65% foreign Songkran 2025 bookings and +40% searches [V/S]. Build a tasteful, factual "White Lotus Koh Samui: filming locations and how to see them" page that funnels to a **private boat along the west coast** and sunset cruises.

### O16. Food
- **Signature dish: wai khua** (octopus in coconut milk), plus southern sour curry (gaeng som/lueang), gaeng tai pla, khua kling, moo hong, pad sataw goong and khanom jeen with southern curry [V].
- **Michelin Bib Gourmand 2026: Baan Suan Lung Khai** (Taling Ngam; southern seafood; reservation needed) [V]. Other Michelin-listed spots exist in Maenam, Bophut, Chaweng, Choeng Mon and Maret; **verify each one's current status before naming it**.
- Street-food price guide (Fisherman's Village): pad thai 60–80, mango sticky rice 50–80, grilled prawns 80–120, market dinner 300–500 pp [S].
- Markets for food: Lamai Night Market (daily, by the bridge), Nathon night food market (daily 16:30–22:00), Hua Thanon fish market (mornings), Lamai fresh market (06:00–20:00).

### O17. Research gaps to close during the build (owner or field checks)
1. The official 2026 Ang Thong closure notice (DNP). 2. The airport taxi kiosk board by zone (photo). 3. Whether Bolt works on Samui. 4. Hospital phone numbers from their own sites; the hyperbaric chamber details. 5. Whether Berjaya Air Subang–Samui still operates. 6. The Maenam Thursday and Lamai Sunday walking streets. 7. The status of the Aquarium/Tiger Zoo, Butterfly Garden, Coco Splash, Snake Farm and Namuang Safari Park. 8. Secret Buddha Garden and Overlap Stone fees. 9. Missing GPS points (O13). 10. Re-check ferry fares on the operator sites at launch. 11. A dengue/health source (CDC or TravelHealthPro). 12. Re-verify the entry fee monthly. 13. **Child prices** for all our products. 14. Partner choices for island activities.

---

---

## PART P: PAGE-BY-PAGE CONTENT BRIEFS (separate file)
Part P is in **`BUILD-PROMPT-PAGE-BRIEFS.md`**. It contains:
- **P0:** the parity rule, plus measured kohphangan.com metrics for every twin page (words, H2s, FAQs, images, tables).
- **P1:** the homepage, hubs, every product and money page, event pages, FAQ (52 questions) and company pages.
- **P2:** plan your trip, health and safety, living and working.
- **P3:** beaches, nature, every place page, nightlife, food, culture and wellness.
- **P4:** extra pages found on kohphangan.com (parties, boat charter, water sports, wildlife, wedding, freediving, beauty salons, walking street, destinations, news backlog).
- **P5:** the URL index.

**No page is written without opening its brief first. No page is published until its `/docs/parity.csv` row says `pass`.**

## PART Q: DESIGN FIDELITY FALLBACK (if the builder cannot export kohphangan.com)
The preferred route is B3 (SiteGround staging copy or a migration export). If you only have public access to kohphangan.com, recreate the design like this. **Don't eyeball it.**
1. **Pull the exact CSS.** In Chrome on each template URL (home, `/koh-phangan-tours/`, `/product/daytour-ang-thong-marine-park/`, `/koh-phangan-beaches/`, `/zen-beach-koh-phangan/`, `/koh-phangan-events/`, a single event, `/koh-phangan-villas/`, `/koh-phangan-retreats/`, `/koh-phangan-news/`, `/faq/`), run this in DevTools to download every inline `kp*` style block plus the child-theme CSS:
   ```js
   const blocks=[...document.querySelectorAll('style')].filter(s=>/\.kp|--kp|kpg|kph|kpa|kpf|kpn|kpts|kpcur/.test(s.textContent)).map(s=>`/* ${s.id||'anon'} */\n${s.textContent}`).join('\n\n');
   const a=document.createElement('a');a.href=URL.createObjectURL(new Blob([blocks],{type:'text/css'}));a.download=location.pathname.replace(/\W+/g,'_')+'kp.css';a.click();
   ```
   Save the HTML of each template too (`document.documentElement.outerHTML`, minus the admin bar). Rebuild each template from that real markup: same class names, same nesting, same order. The custom CSS totals ~105,000 characters across ~27 blocks (`kp-v2-shell`, `kpts-css`, `kp-picker-css`, `kpg-fmp-css` …), so expect that volume.
2. **Pull the inline JS modules** the same way: `kpts-init`, `kpcur-cfg`, `kpg-fmp-js`, the ticker, event filter, tide widget and map scripts. Recreate the REST endpoints they call (`/wp-json/kpcur/v1/rates`, the events feed) as small mu-plugins.
3. **Pixel check:** capture full-page screenshots of the kohphangan.com template and your Samui equivalent at 390, 768, 1280 and 1920 px, in light and dark, and compare them with an image diff (e.g. `pixelmatch` / BackstopJS). Only content, photos and map tiles may differ; **spacing, type, colours, radii, shadows, buttons and component order must match.**
4. **Cookies and captcha:** SiteGround's bot protection served a `/.well-known/sgcaptcha/` challenge to a cookieless burst of requests (seen on 31 Oct 2026). For your extraction, use a normal logged-in browser session. **For the live Samui site, check SiteGround → Security → Bot protection so that Googlebot, Bingbot and the AI crawlers allowed in robots.txt are never challenged.** A challenge page served to a crawler means the page is invisible to it. Test with `curl -A "GPTBot" https://{{DOMAIN}}/` and `curl -A "ClaudeBot" …` after launch and confirm you get the full HTML. Mea should check the same on kohphangan.com.

---

## PART R: TECHNICAL SEO, AEO AND AI-VISIBILITY IMPLEMENTATION SPEC (copy-ready)

This part turns Part F's principles into exact specifications. **Where Part F and Part R differ, Part R wins.** Every rule applies to **every indexable URL** (pages, posts, products, events, places, villas, retreats). Noindex URLs (cart, checkout, account, thank-you, search, 404) are exempt unless stated.

### R1. Per-page SEO contract (every indexable URL ships with all of these)
| # | Element | Spec |
|---|---|---|
| 1 | `<title>` | 50–60 chars, primary keyword first, year where it helps CTR, unique sitewide (checked by the weekly crawl) |
| 2 | Meta description | 140–160 chars: a concrete promise plus a number (price, time, count) plus a CTA; unique |
| 3 | H1 | exactly one, containing the primary keyword; not identical to the `<title>` |
| 4 | Canonical | absolute, self-referencing, `https://{{DOMAIN}}/…/` with trailing slash, never parameterised |
| 5 | Robots meta | `index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1` |
| 6 | Visible breadcrumbs | on every page except home (R4) |
| 7 | Answer-first lead | the first 40–60 words answer the main query with numbers |
| 8 | "Updated {Month YYYY}" | visible under the H1, matching `dateModified` in schema and sitemap `lastmod`. WordPress bumps `post_modified` on every save, so all three read a custom field **`kp_content_updated`** that editors set only on real content changes (sitemap via the `rank_math/sitemap/entry` filter). The year in titles comes from one option **`kp_year`**, bumped each January after the price review; season-spanning pages use "2026–27" |
| 9 | Author box | If Mea approves named authors, the visible byline and the schema `author` are the same real Person. Otherwise `author` = `#organization` and the byline reads "By the {{BRAND}} team". **Never invent a person, photo or credential.** YMYL pages (visa, health, law, money, property) also show "Checked against {official source} on {date}" |
| 10 | Table | at least one HTML table where any price, time, distance, date or comparison appears (never an image of a table) |
| 11 | FAQ | visible accordion + FAQPage schema (R2) |
| 12 | Internal links | 2–4 money links + 2–3 supporting guides + hub link + breadcrumb; descriptive anchors; no orphan pages (every URL is linked from ≥ 3 others) |
| 13 | Images | WebP, `srcset`, explicit width and height, descriptive `alt`, the hero as `ImageObject` (`#primaryimage`), and the first image not lazy |
| 14 | Open Graph / Twitter | `og:title`, `og:description`, `og:url`, `og:type` (website / article / product), `og:image` 1200×630 (an auto-generated branded card if there's no photo), `og:locale en_GB`, `og:site_name`, `twitter:card summary_large_image` |
| 15 | JSON-LD | one `@graph` per page (R3), validated with zero errors |
| 16 | Speed | passes the Part H budgets |
| 17 | Server-rendered text | prices, FAQs, tables, opening hours and dates are in the HTML response, **never injected only by JS**, because AI crawlers mostly don't run JS. Live widgets need a server-side fallback value |
| 18 | Parity | `/docs/parity.csv` row = `pass` |

### R2. FAQ on every single page: rules
- **Every indexable URL has a visible FAQ section** (the `kp-faq2` accordion) placed above the related-content rail, with **FAQPage JSON-LD that mirrors the visible Q&As word for word** (Google requires the marked-up content to be visible).
- **Minimum counts:** homepage 10 · hubs 10–12 · pillar guides 10–15 · sub-guides 8–12 · place pages 6–12 · products 8–12 · events 6–8 · villas and retreats 6–8 · About, Contact, Terms and Privacy 5–6 · `/faq/` 50+ (grouped, one FAQPage).
- **Answers:** 40–80 words; the first sentence answers directly ("Yes, …", "1,800 THB per adult …", "About 30 minutes …"); then one supporting fact; then an internal link where useful. No marketing fluff; numbers carry the year.
- **No verbatim duplicates.** Keep `/docs/faq-registry.csv` (question, owner url). Each general question has **one owner page**. Other pages ask the **specific** version with a specific answer ("Does the Ang Thong VIP tour run in November?" rather than "Is Ang Thong open in November?"; "Which areas does the Pig Island pickup cover?" rather than "Is hotel pickup included?"), or link to the owner. **Product pages:** generic booking questions that the briefs list on many products ("Is lunch included?", "Is it suitable for children?", "What is the minimum age?", "What happens if the sea is rough?") are written **with the product name in the question** ("Is lunch included on the Ang Thong big boat tour?") and answered with that product's own facts, so every string in the registry is unique and every answer is specific. `/faq/` may repeat owner questions as a short answer plus a link, and those repeats are **left out of its FAQPage JSON-LD** so only the owner page marks them up.
- **Source questions from real demand:** Google "People also ask", Search Console queries, WhatsApp questions from Mea's team (ask for the 50 most common), and AI-answer gaps.
- **One FAQPage per URL.** Disable Rank Math's FAQ block schema wherever the custom accordion outputs it, or the other way round, to avoid duplicate FAQPage nodes.
- **Honest expectation:** since Aug 2023, Google shows FAQ rich results mainly for authoritative government and health sites, so FAQ markup here is **for answer engines (AI Overviews, ChatGPT, Perplexity, Claude, Copilot, Bing), voice and on-page conversion, not for SERP stars**. Implement it anyway; it is what AI systems quote.
- **Missing FAQ sets to add:** briefs that list no questions (`/koh-samui-freediving/`, `/koh-samui-beauty-salons/`, `/fishermans-village-walking-street/`, `/destinations/`, `/privacy-policy/`) have questions added in Part P. Every new page created later must come with its FAQ set.

### R3. JSON-LD: graph architecture and templates
**Implementation:** Rank Math Pro handles the base graph (WebSite, WebPage, BreadcrumbList, Article and Product). A small mu-plugin `kp-schema.php` adds the types Rank Math does not model well (TouristTrip, Event, TouristAttraction/Beach, VacationRental, ItemList, OfferCatalog) and **merges into the same `@graph`** via the `rank_math/json_ld` filter. **One `<script type="application/ld+json">` per page.** kohphangan.com currently outputs a second, separate TravelAgency/Organization block (`kp-org-ld`) next to Rank Math's: **don't copy that duplicate**, merge it into one node with one `@id`.

**`@id` conventions (stable, never change):**
`https://{{DOMAIN}}/#organization` · `/#website` · `/#logo` · `{url}#webpage` · `{url}#breadcrumb` · `{url}#primaryimage` · `{url}#article` · `{url}#faq` · `{url}#product` · `{url}#trip` · `{url}#event` · `{url}#place` · `{url}#itemlist` · `https://{{DOMAIN}}/#koh-samui` (the island as Place) · `/about-us/#mea` and other team Person nodes.

**R3.1 Sitewide nodes (on every page)**
```json
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": ["TravelAgency", "LocalBusiness"],
      "@id": "https://{{DOMAIN}}/#organization",
      "name": "{{BRAND}}",
      "url": "https://{{DOMAIN}}/",
      "logo": {"@type": "ImageObject", "@id": "https://{{DOMAIN}}/#logo", "url": "https://{{DOMAIN}}/wp-content/uploads/logo-512.png", "width": 512, "height": 512},
      "image": "https://{{DOMAIN}}/wp-content/uploads/og-default.jpg",
      "description": "Local Koh Samui tour operator and island guide since 2006: Ang Thong and Pig Island boat tours, private speedboats, party transfers, villas and up-to-date travel guides.",
      "foundingDate": "2006",
      "telephone": "+66637040888",
      "email": "info@{{DOMAIN}}",
      "priceRange": "฿฿",
      "currenciesAccepted": "THB",
      "paymentAccepted": "Credit card, Debit card, Apple Pay, Google Pay",
      "address": {"@type": "PostalAddress", "streetAddress": "{{OFFICE_STREET}}", "addressLocality": "Bo Phut, Koh Samui", "addressRegion": "Surat Thani", "postalCode": "84320", "addressCountry": "TH"},
      "geo": {"@type": "GeoCoordinates", "latitude": "{{OFFICE_LAT}}", "longitude": "{{OFFICE_LNG}}"},
      "openingHoursSpecification": [{"@type": "OpeningHoursSpecification", "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"], "opens": "08:00", "closes": "20:00"}],
      "areaServed": [{"@id": "https://{{DOMAIN}}/#koh-samui"}, {"@type": "Place", "name": "Koh Phangan"}, {"@type": "Place", "name": "Koh Tao"}, {"@type": "Place", "name": "Mu Ko Ang Thong National Park"}],
      "hasCredential": {"@type": "EducationalOccupationalCredential", "credentialCategory": "license", "name": "Tour operator licence 43/01467", "recognizedBy": {"@type": "GovernmentOrganization", "name": "Department of Tourism, Ministry of Tourism and Sports, Thailand"}},
      "contactPoint": [{"@type": "ContactPoint", "contactType": "customer service", "telephone": "+66637040888", "availableLanguage": ["English","Thai"], "hoursAvailable": {"@type": "OpeningHoursSpecification", "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"], "opens": "08:00", "closes": "20:00"}}],
      "sameAs": ["https://kohphangan.com/", "https://angthongmarinepark.com/", "https://pigislandkohsamui.com/", "https://speedboatsamui.com/", "{{FACEBOOK_URL}}", "{{INSTAGRAM_URL}}", "{{GBP_URL}}"],
      "knowsAbout": ["Koh Samui", "Ang Thong National Marine Park", "Koh Madsum (Pig Island)", "Koh Phangan Full Moon Party", "Gulf of Thailand boat trips"]
    },
    {"@type": "WebSite", "@id": "https://{{DOMAIN}}/#website", "url": "https://{{DOMAIN}}/", "name": "{{BRAND}}", "inLanguage": "en-GB", "publisher": {"@id": "https://{{DOMAIN}}/#organization"},
     "potentialAction": {"@type": "SearchAction", "target": {"@type": "EntryPoint", "urlTemplate": "https://{{DOMAIN}}/?s={search_term_string}"}, "query-input": "required name=search_term_string"}},
    {"@type": ["Place", "TouristDestination"], "@id": "https://{{DOMAIN}}/#koh-samui", "name": "Koh Samui", "alternateName": ["Ko Samui", "Samui"], "geo": {"@type": "GeoCoordinates", "latitude": 9.512, "longitude": 100.013}, "containedInPlace": {"@type": "AdministrativeArea", "name": "Surat Thani Province, Thailand"}, "sameAs": ["https://en.wikipedia.org/wiki/Ko_Samui", "https://www.wikidata.org/wiki/{{WIKIDATA_QID_KO_SAMUI}}"]}
  ]
}
```
Notes:
- `{{OFFICE_*}}`, `{{GBP_URL}}` and the socials come from Mea (Part N).
- `sameAs` to Wikipedia/Wikidata for the **island** entity is an entity reference, not a visible outbound link, so it doesn't break the link rule.
- Look up the Wikidata QID for Ko Samui and fill it in. Don't guess it.
-

**R3.2 Every page: WebPage + BreadcrumbList + primary image**
```json
{"@type": "WebPage", "@id": "{url}#webpage", "url": "{url}", "name": "{title}", "description": "{meta}", "isPartOf": {"@id": "https://{{DOMAIN}}/#website"}, "about": {"@id": "https://{{DOMAIN}}/#koh-samui"}, "primaryImageOfPage": {"@id": "{url}#primaryimage"}, "breadcrumb": {"@id": "{url}#breadcrumb"}, "inLanguage": "en-GB", "datePublished": "{iso}", "dateModified": "{iso}", "lastReviewed": "{iso}", "reviewedBy": {"@id": "https://{{DOMAIN}}/#organization"}}
{"@type": "ImageObject", "@id": "{url}#primaryimage", "url": "{img}", "contentUrl": "{img}", "width": 1600, "height": 900, "caption": "{alt}", "creditText": "{{BRAND}}", "copyrightNotice": "© {{BRAND}}", "license": "https://{{DOMAIN}}/terms-and-conditions/#images", "acquireLicensePage": "https://{{DOMAIN}}/contact/"}
{"@type": "BreadcrumbList", "@id": "{url}#breadcrumb", "itemListElement": [{"@type": "ListItem", "position": 1, "name": "Home", "item": "https://{{DOMAIN}}/"}, {"@type": "ListItem", "position": 2, "name": "{hub}", "item": "{hub_url}"}, {"@type": "ListItem", "position": 3, "name": "{page}"}]}
```
Use `@type` `CollectionPage` for hubs, `ItemPage` for products, `AboutPage` for About, `ContactPage` for Contact, and `FAQPage` only as the separate `#faq` node (don't type the WebPage as FAQPage). Put the image licence fields only on **our own photos**.

**R3.3 Guide / place / news article**
```json
{"@type": "Article", "@id": "{url}#article", "headline": "{H1}", "description": "{meta}", "image": {"@id": "{url}#primaryimage"}, "datePublished": "{iso}", "dateModified": "{iso}", "author": {"@type": "Person", "@id": "https://{{DOMAIN}}/about-us/#{author-slug}", "name": "{author}", "jobTitle": "{role}", "url": "https://{{DOMAIN}}/about-us/#{author-slug}", "worksFor": {"@id": "https://{{DOMAIN}}/#organization"}}, "publisher": {"@id": "https://{{DOMAIN}}/#organization"}, "mainEntityOfPage": {"@id": "{url}#webpage"}, "about": [{"@id": "{url}#place"}], "mentions": [{"@id": "{product_url}#product"}], "inLanguage": "en-GB", "wordCount": 0}
```
The `author` block above is the named-author form; when no named author is approved, replace it with `"author": {"@id": "https://{{DOMAIN}}/#organization"}` (R1 #9). Use `NewsArticle` on news posts. Fill `wordCount` automatically. Place pages add the place node:
```json
{"@type": ["TouristAttraction", "Beach"], "@id": "{url}#place", "name": "Choeng Mon Beach", "description": "{1 sentence}", "geo": {"@type": "GeoCoordinates", "latitude": 9.5722, "longitude": 100.0825}, "address": {"@type": "PostalAddress", "addressLocality": "Bo Phut, Koh Samui", "addressRegion": "Surat Thani", "addressCountry": "TH"}, "containedInPlace": {"@id": "https://{{DOMAIN}}/#koh-samui"}, "isAccessibleForFree": true, "publicAccess": true, "hasMap": "https://www.google.com/maps/search/?api=1&query=9.5722,100.0825", "touristType": ["Families", "Couples"], "image": {"@id": "{url}#primaryimage"}}
```
Type map: beach `["TouristAttraction","Beach"]` · temple `["TouristAttraction","BuddhistTemple"]` (or `PlaceOfWorship` for the Chinese shrines) · waterfall and viewpoint `TouristAttraction` · national park `["TouristAttraction","Park"]` · area/town `["Place","TouristDestination"]` (Chaweng, Lamai and the rest are not cities; use `City` only for Nathon if at all) · market `["TouristAttraction","Place"]` + an `Event` with `eventSchedule` when it is weekly · hospital `Hospital` · police `PoliceStation` · airport `Airport` · pier `BoatTerminal`.

**R3.4 Tour product (every bookable tour)**
```json
{"@type": "Product", "@id": "{url}#product", "name": "Ang Thong Marine Park Day Tour by Speedboat from Koh Samui", "description": "{2 sentences}", "image": ["{img1}","{img2}","{img3}"], "sku": "{woo_sku}", "brand": {"@id": "https://{{DOMAIN}}/#organization"}, "category": "Boat tours",
 "offers": {"@type": "AggregateOffer", "@id": "{url}#offer", "priceCurrency": "THB", "lowPrice": "{child_price}", "highPrice": "1800", "offerCount": 2, "availability": "https://schema.org/InStock", "url": "{url}",
   "offers": [{"@type": "Offer", "name": "Adult (12+)", "price": "1800", "priceCurrency": "THB", "availability": "https://schema.org/InStock", "validFrom": "2026-12-16", "priceValidUntil": "2027-10-31", "url": "{url}", "seller": {"@id": "https://{{DOMAIN}}/#organization"}},
              {"@type": "Offer", "name": "Child (3–11)", "price": "{child_price}", "priceCurrency": "THB", "availability": "https://schema.org/InStock", "url": "{url}"}]},
 "aggregateRating": "ONLY IF ≥1 real WooCommerce review exists: {ratingValue, reviewCount}",
 "review": "ONLY real reviews, never invented"}
{"@type": "TouristTrip", "@id": "{url}#trip", "name": "{same}", "description": "{same}", "touristType": ["Couples","Families","Snorkellers"], "provider": {"@id": "https://{{DOMAIN}}/#organization"}, "offers": {"@id": "{url}#offer"},
 "itinerary": {"@type": "ItemList", "numberOfItems": 6, "itemListElement": [{"@type": "ListItem", "position": 1, "item": {"@type": "TouristAttraction", "name": "Koh Mae Ko Emerald Lake"}}, {"@type": "ListItem", "position": 2, "item": {"@type": "TouristAttraction", "name": "Koh Wua Talab viewpoint"}}]},
 "subjectOf": {"@id": "{url}#webpage"}}
```
Rules:
- During the Ang Thong closure, keep `availability` as `InStock` (later dates are on sale) and omit `validFrom`; the closure is stated in the visible text and enforced by the date picker. Until child prices are confirmed, use a **single `Offer`** (adult) instead of `AggregateOffer`.
- Leave out `aggregateRating` and `review` until real reviews exist.
- Price is a string without separators and **must equal the visible price**.
- Private charters use `Offer` with `priceSpecification` (`UnitPriceSpecification`, `unitText: "per boat"`) and `eligibleQuantity` (max guests).
- Partner products use the same pattern, with **our Organization as seller** and no partner URL.

**R3.5 Event** (party nights, festivals, weekly markets)
```json
{"@type": "Event", "@id": "{url}#event", "name": "Full Moon Party, Haad Rin: speedboat from Koh Samui", "startDate": "2026-11-24T18:00:00+07:00", "endDate": "2026-11-25T05:00:00+07:00", "eventStatus": "https://schema.org/EventScheduled", "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
 "location": {"@type": "Place", "name": "Haad Rin Nok (Sunrise Beach), Koh Phangan", "address": {"@type": "PostalAddress", "addressLocality": "Haad Rin, Koh Phangan", "addressRegion": "Surat Thani", "addressCountry": "TH"}, "geo": {"@type": "GeoCoordinates", "latitude": 9.676, "longitude": 100.062}},
 "image": ["{poster}"], "description": "{2 sentences}", "organizer": {"@type": "Organization", "name": "{party organiser}"}}
```
- **Verify the Haad Rin coordinates before use.**
- When a party date moves, set `eventStatus` to `EventRescheduled` with `previousStartDate`; when cancelled, `EventCancelled`.
- Weekly markets get `eventSchedule` (`Schedule` with `byDay`, `startTime`, `endTime`, `scheduleTimezone: "Asia/Bangkok"`).
- **Event `offers` are tickets.** Add `offers` only where we sell the ticket itself (Half Moon Festival packages, resold party tickets at the organiser's price). **Never put a boat transfer in Event `offers`**: Google treats that as misrepresenting the event price, and we don't sell Full Moon entry (rule A4.15). Boat transfers stay as `Product` + `TouristTrip` on the product URL, linked visibly from the event page. Event `name` pattern: "Full Moon Party, Haad Rin: {d Month YYYY}".

**R3.6 Hubs and lists:** `CollectionPage` + `ItemList` (`itemListOrder` Ascending, each `ListItem` with `url` + `name` + `position`). On `/koh-samui-tours/`, also add an `OfferCatalog` under the Organization (`hasOfferCatalog`).
**R3.7 Villas:** `VacationRental` (single villa: name, image ×8+, `containsPlace` Accommodation with `numberOfBedrooms`, `occupancy`, `amenityFeature`, geo, `address`, `checkinTime` and `checkoutTime`). Google's vacation-rental rich results need a Google partner feed, so the markup is for AI and entity understanding only. Long-term villas: `Accommodation` **without** `offers` (the type has no offers property); the visible page says "Monthly rent on request".
**R3.8 About:** `AboutPage` + a `Person` node per team member (`name`, `jobTitle`, `knowsAbout`, `worksFor`, `image`, and `sameAs` to their public profiles if they consent). **Contact:** `ContactPage`.
**R3.9 Validation:** run every template through the Schema.org validator and Google's Rich Results Test, plus a weekly automated check (`npx structured-data-testing-tool` or a Python `extruct` crawl in CI) that fails on errors, duplicate `@id`s, missing FAQPage, or a schema price that differs from the visible price.

### R4. Breadcrumbs (visible + schema, every page except home)
- **Rank Math breadcrumbs**, rendered under the hero (`kpa-bc` style), separator `›`. The last item is plain text and unlinked; truncate on mobile with an ellipsis in the middle.
- **Hierarchy by template** (the visible trail and BreadcrumbList are identical):

| Page type | Trail |
|---|---|
| Product (tour) | Home › Tours & Activities › {Boat trips / On the island / Water sports / Parties} › {Product} |
| Charter boat | Home › Boat charter › {Speedboats / Catamarans / Yachts} › {Boat} |
| Guide (plan your trip) | Home › Koh Samui Guide › Plan your trip › {Page} |
| Beach or place | Home › Koh Samui Guide › Places to go › {Area} › {Place} (an Area level only where an area page exists, e.g. Chaweng › Chaweng Noi) |
| Event single | Home › Events › {Event} |
| Event evergreen | Home › Events › {Festival} |
| Villa | Home › Villas › {Holiday / Long-term} › {Villa} |
| Retreat | Home › Retreats › {Category} › {Retreat} |
| News | Home › News › {Headline} |
| Utility | Home › {Page} |
- **Never** use WooCommerce's default "Shop" or "Uncategorised" crumbs. Set the primary category per product in Rank Math so the trail is deterministic.
- **Implementation:** the slugs are flat, so Rank Math would output "Home › Page". Build the trails with the `rank_math/frontend/breadcrumb/items` filter from `/data/crumbs.json` (url → parent chain). Never change page parents or URLs to get a trail. **Every middle crumb must be an indexable URL**: Tours & Activities → `/koh-samui-tours/`; Parties → `/koh-samui-parties/`; Water sports → `/koh-samui-water-sports/`; Boat charter → `/koh-samui-boat-charter/`; Koh Samui Guide → `/koh-samui-travel-guide/`; Places to go → `/places/`; Events → `/koh-samui-events/`; Villas → `/koh-samui-villas/`; Retreats → `/koh-samui-retreats/`; News → `/koh-samui-news/`. Drop any level that has no hub page (Boat trips, Plan your trip, villa and retreat sub-types). No `#fragment` URLs in crumbs.
- The breadcrumb hub labels must match the menu labels exactly.

### R5. Sitemaps (XML + HTML + image)
- **Rank Math sitemap index** at `/sitemap_index.xml`, containing `page-sitemap.xml`, `post-sitemap.xml`, `product-sitemap.xml`, `event-sitemap.xml` (events CPT), `place-sitemap.xml` (places CPT, if used), `villa-sitemap.xml` and `local-sitemap.xml` (Rank Math Local SEO KML, as on kohphangan.com).
- **Exclude:** noindex URLs, attachment pages (disable them and redirect to the parent), tags, author archives (except the team page), date archives, `product_cat` archives that duplicate hubs, cart, checkout, account, search, past one-off events after 30 days.
- **Image entries:** include all content images (Rank Math "Include images"), with the primary image first.
- **`lastmod`:** reads `kp_content_updated` (R1 #8) via the `rank_math/sitemap/entry` filter, so cosmetic saves never bump it. Events: `lastmod` = last change to that event.
- **Limits:** ≤ 1,000 URLs per child sitemap; gzip on.
- **HTML sitemap** at `/sitemap/` (Rank Math HTML sitemap block, grouped like the mega menu), linked in the footer bottom bar. It helps users, crawlers and LLMs find every page.
- **Submission:** submit to Google Search Console and Bing Webmaster Tools, list it in `robots.txt`, ping IndexNow on publish and update (Rank Math Instant Indexing; Bing, Yandex, Seznam, Naver), and use Google's Indexing API only where it is permitted (it isn't for these page types, so don't use it).

### R6. `robots.txt` (exact starting content)
```
# {{BRAND}} robots.txt (updated {date})
# Guides and tours may be read, indexed and cited by search engines and AI assistants.
# Short content index for AI: https://{{DOMAIN}}/llms.txt
# Full text for AI: https://{{DOMAIN}}/llms-full.txt

User-agent: *
Disallow: /wp-admin/
Allow: /wp-admin/admin-ajax.php
Disallow: /cart/
Disallow: /checkout/
Disallow: /my-account/
Disallow: /*?add-to-cart=
Disallow: /*?s=
Disallow: /?s=
Disallow: /*?wc-ajax=
Disallow: /wp-content/uploads/wc-logs/
Disallow: /wp-content/uploads/woocommerce_transient_files/
Disallow: /wp-content/uploads/woocommerce_uploads/

Sitemap: https://{{DOMAIN}}/sitemap_index.xml
```
**Why there is no per-bot group:** a crawler obeys only the most specific group that matches it, so a named group for GPTBot, ClaudeBot, Bingbot and the rest would **cancel** the `/wp-admin/`, `?add-to-cart=` and `?s=` disallows for exactly those bots. The `*` group already allows every AI crawler (GPTBot, OAI-SearchBot, ChatGPT-User, ClaudeBot, Claude-SearchBot, Claude-User, PerplexityBot, Google-Extended, Applebot-Extended, Bingbot, CCBot, meta-externalagent, Amazonbot, DuckAssistBot) to read the whole site. kohphangan.com's file (updated 28 Oct 2026) has such a named group; tell Mea it should be removed or made a full copy of the `*` rules. **Then make sure the server lets these bots through:** see Q4 on SiteGround's captcha. Test each user agent with `curl -A`.

### R7. `llms.txt` and `llms-full.txt`
**R7.1 `/llms.txt`** follows kohphangan.com's structure: the Rank Math llms.txt module + a custom header and "Key facts", regenerated automatically on publish. Exact skeleton:
```markdown
# {{BRAND}}

> {{BRAND}} is a licensed Thai tour operator and travel guide for Koh Samui, Thailand
> (TAT licence 43/01467, running tours since 2006).
> Office: {{OFFICE_ADDRESS}}, Koh Samui, Surat Thani 84320, Thailand.
> We run speedboat tours to Ang Thong Marine Park and Pig Island (Koh Madsum), Koh Tao day trips,
> private speedboat and catamaran charters and Full Moon Party boats from Samui,
> and we publish up-to-date Koh Samui travel guides for 2026 and 2027.

## Key facts
- Prices are charged in Thai baht (THB); EUR/USD shown for reference only.
- Ang Thong Marine Park closes every year from 1 November to 15 December; tours there do not run on those dates.
- Pig Island tours run every day of the year, weather permitting.
- Hotel pickup from most areas of Koh Samui. Remote areas (Lipa Noi, Nathon, Taling Ngam, Bang Kao, Thong Krut) +400 THB per person return on Chaweng-side departures; Pig Island trips leave from Thong Krut, so their surcharge zones differ (see each product).
- Cancellation, day tours: full refund 48 h or more before departure; 50% refund 24–48 h; no refund under 24 h or no-show.
- Cancellation, Ang Thong tours (day and overnight): full refund 48 h or more before departure; no refund under 48 h or no-show.
- Weather or sea-safety cancellations by us: full refund or a new date, the guest chooses.
- Full policy: https://{{DOMAIN}}/terms-and-conditions/
- Next-day online bookings close at midnight Thailand time.
- Book online: https://{{DOMAIN}}/koh-samui-tours/
- WhatsApp: +66 63 704 0888 (https://wa.me/66637040888)
- Updated: {date}

## Tours and activities
- [Koh Samui Tours and Day Trips](https://{{DOMAIN}}/koh-samui-tours/): all boat trips and island activities with prices
- [Ang Thong Marine Park Day Tour by Speedboat](https://{{DOMAIN}}/product/ang-thong-marine-park-day-tour-koh-samui/): 1,800 THB, about 8 hours
- …every product, one line each, "name: price, duration"

## Main guides
- [Koh Samui Travel Guide](https://{{DOMAIN}}/koh-samui-travel-guide/): …
- [How to Get to Koh Samui](…) · [Koh Samui Weather by Month](…) · [Where to Stay](…) · [Thailand Visa Guide](…) · [Koh Samui Beaches](…) · [Getting Around](…)

## Parties and events
- [Koh Samui Events](…) · [Full Moon Party from Koh Samui](…) · [Full Moon Party Dates 2026–2027](…) · [Party Calendar](…)

## Villas · Retreats · FAQ
- …

## Sister sites
- [KohPhangan.com](https://kohphangan.com/llms.txt): Koh Phangan guide and tours
- [AngThongMarinePark.com](https://angthongmarinepark.com/) · [PigIslandKohSamui.com](https://pigislandkohsamui.com/) · [SpeedboatSamui.com](https://speedboatsamui.com/)

## Pages · Posts · Products
(auto-generated full lists from Rank Math, "title: one-line description")

## Sitemaps
- [XML Sitemap](https://{{DOMAIN}}/sitemap_index.xml)
```
**R7.2 `/llms-full.txt`:** a plain-Markdown knowledge file for AI systems, **generated nightly by WP-Cron** from the live content (never hand-edited, so it can't drift), served as `text/plain; charset=utf-8`, kept under ~1 MB (split the FAQ section into `/llms-faq.txt` if it grows past that, and link it from llms.txt), with a header line `Last generated: {ISO date, ICT}`. Contents, in this order:
1. The same summary + Key facts as llms.txt.
2. **All products:** name, URL, adult/child/infant prices in THB, duration, pickup window, departure pier, inclusions, exclusions, fees, age rules, cancellation policy, seasonal closures, how to book.
3. **Policies:** cancellation (both variants), payment, confirmation, cut-off, weather.
4. **Core facts:** O1–O7 condensed (transport table, visa rules with date, emergency numbers, climate table, sea conditions by month).
5. **Event calendar:** the next 12 months of FMP, Half Moon and festivals, with dates.
6. **Every page:** H1, URL, the answer-first lead, and **all FAQ Q&As** (this is the most-quoted part).
7. **Places:** name, type, GPS, hours, fee, one-line description.
Exclude prices tagged [check] and anything not on the live site. Link `llms-full.txt` from `llms.txt` and from `robots.txt` comments. kohphangan.com already serves both files, so mirror its generation method if it already has one (check the child theme or snippets).
**R7.3 Optional JSON endpoints for machines** (read-only, cached, CORS open): `/wp-json/kp/v1/tours` (products with prices), `/wp-json/kp/v1/events?from=&to=`, `/wp-json/kp/v1/places`. Reference them in llms.txt under "## Data". They are useful to AI agents and partners and cheap to build because the events and places CPTs already exist.

### R8. AI visibility (GEO/AEO) beyond files
1. **Crawlability:** AI bots get the full HTML (no captcha, no JS-only content, 200 status, < 1 s TTFB). Test monthly.
2. **Entity consistency:** the same brand name, phone, address, licence and founding year on the site, GBP, Bing Places, Apple Business Connect, Facebook, Instagram, TripAdvisor and the sister sites. Mismatches confuse knowledge graphs. Our site never links out to TripAdvisor or OTAs (Part A); having listings there is fine and helps entity strength.
3. **Quotable formats:** answer-first leads, definition sentences ("Pig Island is the nickname of Koh Madsum, a small island 30 minutes by boat from Thong Krut pier in south-west Koh Samui."), HTML tables, numbered steps, "Last verified {date}" on fact boxes, and units and currency on every number.
4. **A facts page:** `/koh-samui-facts/`, "Koh Samui in numbers 2026" (area, population, ring road, airports, piers, ferry times, climate, prices of common things, emergency numbers), with a table per topic and Dataset-like clarity. AI systems cite such pages heavily. Add it to the sitemap and llms.txt.
5. **Original data and assets:** publish things others will cite, such as the monthly sea-conditions record from our boats, real ferry and taxi prices we collected (with date), and the FMP date calendar including the holiday shifts that most sites get wrong.
6. **Freshness:** money and fact pages reviewed monthly, events weekly, pillars quarterly. Update `dateModified` only on real changes, and keep a visible changelog line on key pages ("Updated Oct 2026: visa rule changed to 30 days").
7. **E-E-A-T:** a real team with names, photos and roles; Mea's story since 2006; the licence; the office photo; an editorial policy page `/editorial-policy/` (how we research, check and update; how to report errors); a corrections email; and first-hand photos from our own boats.
8. **Measuring AI visibility:**
   - **GA4:** a custom channel group "AI assistants" matching referrers `chatgpt.com|chat.openai.com|perplexity.ai|claude.ai|gemini.google.com|copilot.microsoft.com|you.com|phind.com|meta.ai`.
   - **Monthly AI-answer audit:** a fixed set of 40 prompts, e.g. "best Ang Thong tour from Koh Samui", "how to get from Samui to the Full Moon Party", "is Ang Thong open in November", "Koh Samui weather December", "Pig Island tour price". Run them in ChatGPT, Perplexity, Gemini, Claude and Google AI Overviews. Log whether {{BRAND}} is mentioned or cited in `/docs/ai-visibility.csv`, and fix the gaps with content.
9. **Bing matters for AI:** ChatGPT search and Copilot use Bing's index, so set up Bing Webmaster Tools, IndexNow and Bing Places on day one.

### R9. Languages (decide before launch; this affects SEO)
- GTranslate's **free** widget translates in the browser. Search engines and AI crawlers see English only, so it adds **zero** SEO value. GTranslate's **paid** plans serve translated pages on subdirectories or subdomains with `hreflang`, so they can rank.
- **Recommendation:** launch in English. Then add translated versions (German, Russian, French, Chinese; ask Mea which markets) on a **paid, server-side** plan for the top ~40 money and pillar pages, with human review of prices, policies and product names.
- With translations, add: `hreflang` for every language + `x-default`, self-referencing canonicals per language, translated slugs, translated schema `inLanguage`, a separate llms.txt section per language, and sitemaps with `xhtml:link` alternates.
- **Check which GTranslate plan kohphangan.com uses** and match it (Part N, item 9).

### R10. Technical hygiene (one-time set-up + monitoring)
- **URLs and redirects:**
  - one host (`https://{{DOMAIN}}`, non-www, matching kohphangan.com)
  - 301s for http→https, www→non-www and no-slash→slash
  - no redirect chains
  - lowercase slugs
  - trailing slash on all URLs
- **Status codes:** proper 404s (no soft 404s); 410 for permanently removed products; a Rank Math 404 monitor with weekly review; a redirect map in `/docs/redirects.csv`.
- **Archives and attachments:** attachment pages off; tag/date/author archives noindex (except the team author page); `product_tag` noindex; search noindex.
- **Pagination:** news and events lists use crawlable `<a href>` links (not load-more buttons only) with self-canonical pages.
- **HTTP:** HTTP/2 or HTTP/3; Brotli; HSTS; `X-Content-Type-Options`; `Referrer-Policy: strict-origin-when-cross-origin`; `Permissions-Policy`; CSP in report-only mode first.
- **Head assets:** a favicon set (16/32/180/192/512 + SVG), `site.webmanifest`, `theme-color` (light `#ffffff`, dark `#0A1422`), and `apple-touch-icon`.
- **OG images:** auto-generated per page (title + hero + brand bar in the site palette) when there's no custom one.
- **Media:** use the YouTube no-cookie embed with a poster image if videos exist, plus `VideoObject` schema.
- **Monitoring:** GSC and Bing alerts on; uptime monitor; weekly crawl (Screaming Frog or Sitebulb) checking 4xx/5xx, orphans, missing FAQ or schema, duplicate titles, external links outside the allow-list, and non-WebP images.

### R11. Analytics, conversion and consent
- **GA4 via Site Kit + WooCommerce GA4 integration**, with ecommerce events `view_item`, `add_to_cart`, `begin_checkout`, `purchase` (value in THB, `item_category` = trip type), plus custom events `whatsapp_click` (with page + product), `enquiry_submit`, `currency_switch`, `theme_toggle`, `faq_open`, `map_directions_click`, `phone_click` and `email_click`. Mark `purchase`, `enquiry_submit` and `whatsapp_click` as key events.
- **Consent:** CookieYes with **Google Consent Mode v2** (defaults denied for analytics and ads until consent; privacy-preserving default), and no tracking pixels before consent.
- **Reporting:** a monthly SEO/AEO report in `/docs/reports/YYYY-MM.md` covering clicks, impressions and CTR by page group; the top queries; AI-assistant sessions; AI-audit results; bookings by source; pages losing traffic; and actions.
- **Phase 2 (high value):** **Google "Things to do"** listings for tours. This needs a connectivity partner or booking-system integration, so evaluate whether WooTour or the bookings hub can feed one. It puts our tour prices directly in Google Search and Maps.

### R11b. Small additions that complete the set
- **`/accessibility/`:** an accessibility statement (WCAG 2.2 AA target, known gaps, a contact for problems), linked in the footer bottom bar.
- **Thai legal checks (ask Thai counsel; don't guess):** whether the footer line "Australian owned since 2006" is appropriate under the Foreign Business Act for a tour business (it may be better as "Australian-Thai team since 2006"); whether DBD e-commerce registration is required for the site; the **PDPA** (Thailand's Personal Data Protection Act) privacy-policy wording, data-retention periods and the consent records for marketing emails.
- **Video:** short first-hand clips from our own boats on the top 6 products, via a lite-YouTube facade (no cookies, poster image) + `VideoObject` schema.
- **Internal search:** WordPress search covering products, places and events, with a results page that is noindex but useful (top tours, WhatsApp); log search terms in GA4 (`view_search_results`) to find content gaps.
- **Backups and staging:** SiteGround daily backups + weekly off-site copy; every plugin update goes through staging first; keep a rollback plan for the theme.

### R12. Launch acceptance: "perfect" means all of these are true
- [ ] 100% of indexable URLs pass the R1 contract and P0 parity; non-indexable drafts are queued for the weekly publishing cadence (K1 waves).
- [ ] 100% have a visible FAQ + matching FAQPage (R2); the FAQ registry has no duplicate questions.
- [ ] 0 schema errors sitewide; one `@graph` per page; schema prices = visible prices.
- [ ] Breadcrumbs on every page except home, with the visible trail = BreadcrumbList.
- [ ] XML, HTML and image sitemaps live and submitted to GSC + Bing; IndexNow firing.
- [ ] `robots.txt`, `llms.txt` and `llms-full.txt` live, valid, regenerated automatically, and fetchable by every listed AI bot (curl test logged).
- [ ] Lighthouse mobile ≥ 90/95/95/95 on the 10 key templates; field CWV green after 28 days.
- [ ] 100% WebP + alt text; no external links outside the allow-list (crawl export attached).
- [ ] Booking test (Stripe test + one live low-value booking) passes end to end, including the bookings hub.
- [ ] Facts tagged [check] or [ask Mea]: none on live pages.
- [ ] GA4 key events firing; Consent Mode v2 verified; AI channel group live; first AI-answer audit logged.

---

## FINAL INSTRUCTION TO THE BUILDER
Work in this order:
1. **A** (rules)
2. **B** (clone the stack; **Q** if you cannot export the site)
3. **D** (templates)
4. **C + P5** (sitemap and URL index)
5. **I** (products and booking)
6. **G** (widgets and maps)
7. **P + K + O** (content, page by page from its brief, at twin parity)
8. **F + R** (SEO, AEO, schema, breadcrumbs, sitemaps, llms files, analytics)
9. **H** (performance)
10. **M + R12** (QA, parity and launch acceptance)
11. **L** (deploy)

Keep a running `/docs/worklog.md` (date, what changed, what you tested, open questions) and `/docs/parity.csv`. Ask Mea the Part N questions, plus the open questions at the end of P1–P3, **in one batch at the start**, and keep building with placeholders while you wait.

Never invent prices, dates, reviews or facts. If something is uncertain, mark it in the CMS, keep it off the live page, and add it to the open-questions list.

When everything in Part M passes and every parity row says `pass`, send Mea the staging link with a one-page summary: what's built, what's pending, and the live-deploy checklist.
