# Sources: batch H (events hub, places hub, charter pages)

Checked 1 November 2026. For internal fact-checking only; do not link from the live site.

## Shared base data (all pages)
- `local/wp/wp-content/kp-data/fleet.json`, `products.json`, `places.json`, `events.json`
- `docs/research/events.md`, `practical.md`, `tours-places.md`; BUILD-PROMPT.md Part O (O7–O15)
- Sunset and sunrise times: computed with the NOAA solar algorithm for 9.45 N, 99.94 E (Taling Ngam), UTC+7, 2026–2027 dates.

## /koh-samui-events/
- Full Moon Party dates Nov 2026–Dec 2027 (page updated 27 Oct 2026): https://thaiest.com/blog/full-moon-party-schedule
- Half Moon Festival 2026 dates (Magic Forest 3 and 17 Dec; beach club 3 and 17 Nov, 2 and 16 Dec; no 2027 dates): https://www.halfmoonfestival.com/2026-dates
- Samui International Muay Thai Stadium (Tue/Fri/Sun; gates 20:00, fights 21:30; 1,500/2,000/2,500/3,000 THB; children 6–10 half price, under 6 free): https://www.samuimuaythaitickets.com/muay-thai-tickets-boxing-match-on-oct-6-2026-tuesday
- Phetchbuncha Mon/Wed/Sat 21:00 (Mondays sometimes skipped); Chaweng Stadium closed (updated 30 May 2026): https://thaiest.com/en/blog/muay-thai-koh-samui
- Fisherman's Village market Mon/Wed/Fri ~17:00–23:00, Friday biggest (updated Jun 2026): https://www.thaiholidayguide.com/attraction/fishermans-village-walking-street/
- Paris Follies Cabaret operating (50-min show, Chaweng Beach Road, ticket packages with drink): https://www.expedia.com.my/things-to-do/koh-samui-paris-follies-cabaret-show-entry-ticket-drinks.a51505747.activity-details
- Paris Follies show times and free-with-drink entry (undated, marked [check]): https://au.hotels.com/go/thailand/paris-follies-cabaret-samui
- Loy Krathong Tue 24 Nov 2026: https://www.thaiholidayguide.com/events/loy-krathong/ ; Thai press in events.md (thansettakij, sanook)
- Sky lanterns illegal near airports / govt warning: https://nationthailand.com/thailand/general/40033263 ; Samui-specific ban (single source): https://www.thekohsamuiguide.com/koh-samui-new-years-eve/
- Thailand 2027 public holidays (Makha Bucha 21 Feb + sub 22 Feb, Chakri 6 Apr, Songkran 13–15 Apr, Visakha Bucha 20 May, Asalha Bucha 18 Jul, Lent 19 Jul): https://www.timeout.com/bangkok/news/the-thailand-2027-public-holidays-092326 ; https://qppstudio.net/publicholidays2027/thailand.htm
- 24th Samui Regatta 22–29 May 2027: https://www.sail-world.com/news/296661/Team-Hollywood-clinches-second-straight-Samui-Rega
- Phangan-side listings (sister site, linked once): https://kohphangan.com/koh-phangan-events/
- Alcohol hours 11:00–24:00 since 29 May 2026, holy-day exemptions, NYE patterns, Songkran programme areas, sports events, buffalo fighting status: see events.md sections 1.2–1.8 and 5.1–5.2 (TAT, Nation, thailand.prd.go.th, Bangkok Hospital Samui, Khaosod)

## /places/
- Place data, GPS, hours and fees: places.json (last_verified 2026-10-31); O13–O15
- Ring road, tambons, postcodes, Khao Pom: practical.md section 7 (Wikipedia, byklo.rent)
- Piers and ferry operators: practical.md 1.5–1.6 (visitthailandtoday.com, 12go)
- Transport prices (Grab, songthaew, scooter, car, helmet fine): practical.md 2.1–2.6
- Hospitals and emergency numbers: practical.md 4.1–4.3
- Closed/unverified venues: tours-places.md 1.9 and section 7; events.md 5.4
- Drive times from Chaweng: our estimate from GPS straight-line distances (places.json) and ring-road layout; not from a routing service (see report)

## /koh-samui-boat-charter/, /koh-samui-private-speedboat/, /koh-samui-catamaran-charter/, /koh-samui-yacht-charter/, /koh-samui-sunset-cruise/
- Fleet prices, capacities, price basis: fleet.json (matches speedboatsamui.com home page, checked 1 Nov 2026): https://speedboatsamui.com/
- Safety equipment and Thai Marine Department-licensed captains, quote-before-pay flow, north-coast departures: https://speedboatsamui.com/
- PP 30 ft (8 h programmes, inclusions, hotel transfer included): https://speedboatsamui.com/speedboats/pp-speed-boat/
- PP 40 ft (40 ft, 2 engines, inclusions incl. snacks, hotel transfer): https://speedboatsamui.com/speedboats/pp-speed-boat-2/
- NP (38 ft, 2 engines, shade, inclusions, hotel transfer): https://speedboatsamui.com/speedboats/np-speed-boat/
- Coco Cay (44 ft, twin 250 HP, restroom, 4 h and 8 h programmes, from price = Koh Tan & Madsum 4 h for 2): https://speedboatsamui.com/speedboats/coco-cay-speedboat/
- MN (52 ft, 3 engines, 37 guests, inclusions, transfers not included): https://speedboatsamui.com/speedboats/mn-speed-boat/
- Victoria Sailing (37 ft; sunset 16:00–18:30 = from price; half/full-day times; inclusions; BYO food): https://speedboatsamui.com/catamarans/victoria-private-sailing-catamaran/
- Blue Coco (Lagoon 400, 40 ft; 08:30–12:30 = from price; cabins with bathrooms; butler, bartender, BBQ; BYO): https://speedboatsamui.com/catamarans/blue-coco/
- Kia Ora (54 ft; sunset Koh Som & Thongson Bay 16:00–18:30 = from price + VAT; bathroom and showers; transfers extra): https://speedboatsamui.com/catamarans/kia-ora-catamaran/
- Coco Paradise (twin engine; 08:30–12:30 = from price; butler; sea pool/slide extra, not in Ang Thong): https://speedboatsamui.com/catamarans/coco-paradise-catamaran/
- Red Baron (98 ft wooden junk, Surat Thani-built; 3 h sunset dinner = from price; 6/9/10 h programmes; inclusions): https://speedboatsamui.com/yachts/red-baron/
- Casablanca (41 ft, 2 cabins, 2 bathrooms; 4 h 10:00–14:00 Koh Som = from price; 8 h 09:00–17:00; inclusions; BYO): https://speedboatsamui.com/yachts/casablanca-motor-yacht/
- Minor Affair (Sunseeker Manhattan 60, 61 ft; 8 h; from price = Koh Phangan or Ang Thong; inclusions incl. land transfers): https://speedboatsamui.com/yachts/minor-affair-motor-yacht/
- Ang Thong closure 1 Nov–15 Dec and fees 300/150 THB (as of May 2026): https://www.thainationalparks.com/mu-ko-ang-thong-national-park
- Fixed-price products and our tour prices: products.json; CONTENT-STYLE.md business facts
- Island fees Koh Madsum ~50, Koh Rap ~100, Nang Yuan 250 THB: products.json; speedboatsamui.com MN and Blue Coco pages; tours-places.md 1.3
- White Lotus S3 at Four Seasons Koh Samui (Laem Yai): tours-places.md section 4; events.md 5.3
- Box jellyfish and sea hazards: practical.md 4.4
- Climate by month: practical.md 6.1 (WMO normals)
