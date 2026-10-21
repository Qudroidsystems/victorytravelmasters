<?php

/*
|--------------------------------------------------------------------------
| Victory Journey Masters — website content
|--------------------------------------------------------------------------
|
| Every piece of text and business detail used by the public website lives
| in this one file. Anything written in [SQUARE BRACKETS] is a placeholder:
| replace it with the client's real details before the site goes live.
|
| After editing on a server that caches config, run:  php artisan config:clear
|
*/

return [

    /* ------------------------------------------------------------------
     | Business & owner details  (REPLACE THE PLACEHOLDERS)
     * ------------------------------------------------------------------ */
    'name'        => 'Victory Journey Masters',
    'short_name'  => 'Victory Journey',
    'tagline'     => 'Leave your travel to us.',
    'tagline_long' => 'Visas, flights, study abroad and holidays — handled by people who care.',

    'owner' => [
        'name'      => '[Owner Name]',            // e.g. Mrs. Jane Doe
        'title'     => 'Founder & Chief Executive Officer',
        'signature' => '[Owner Name]',            // name shown in handwriting style under the welcome address
    ],

    'phone'          => '0705 917 3036',           // main line (from the client's flyers)
    'phone_link'     => '+2347059173036',          // same number in international format, for tel: links
    'phone_alt'      => '0905 114 9946',           // second line
    'phone_alt_link' => '+2349051149946',
    'whatsapp'       => '2347059173036',           // digits only, used for wa.me links — confirm which line has WhatsApp
    'email'          => 'victoryfrancis06@gmail.com', // contact-form messages are sent here
    'address'        => 'No. 8 Sydney Emmanuel Street, Upper Valentino, Ondo, Ondo State',
    'website'        => 'https://www.victoryjourneymasters.ng/',
    'hours'          => [
        'Monday – Friday : 9:00 AM – 5:00 PM',
        'Saturday : 10:00 AM – 3:00 PM',
        'Sunday : Closed',
    ],
    'hours_short'    => 'Mon – Sat, 9:00 AM – 5:00 PM',

    'socials' => [
        // Replace '#' with the full profile links (e.g. https://facebook.com/yourpage)
        'facebook'    => '#',
        'instagram'   => '#',
        'x-twitter'   => '#',
        'linkedin-in' => '#',
    ],

    /* ------------------------------------------------------------------
     | Client photos (stored in public/website/images/client)
     * ------------------------------------------------------------------ */
    'photos' => [
        'welcome'  => 'website/images/client/owner-welcome.jpg',    // smiling at laptop
        'portrait' => 'website/images/client/owner-portrait.jpg',   // standing portrait
        'desk'     => 'website/images/client/owner-desk-smile.jpg', // leaning on desk, smiling
        'laptop'   => 'website/images/client/owner-laptop.jpg',     // working on laptop
    ],

    /* ------------------------------------------------------------------
     | Welcome address (home + about pages)
     * ------------------------------------------------------------------ */
    'welcome' => [
        'heading'   => 'Welcome to Victory Journey Masters',
        'paragraphs' => [
            'Thank you for stopping by. Whether you are applying for your first visa, preparing to study abroad, booking a business trip or planning the holiday you have dreamt about for years, you have come to the right place.',
            'I started Victory Journey Masters because I saw how stressful travel planning can be — confusing embassy requirements, last-minute fare changes, and too little honest advice. Our promise is simple: we listen first, explain every step clearly, and stay with you until you are safely back home.',
            'Every client is treated as a person, not a file number. We check your documents carefully, give you realistic timelines, and never make promises that only an embassy or airline can keep. That honesty is why our clients come back — and why they send their families and friends to us.',
            'Wherever your journey is taking you, it would be our privilege to help you get there.',
        ],
        'closing' => 'Warm regards,',
    ],

    /* ------------------------------------------------------------------
     | Headline counters — these are facts about the site, not claims.
     | Replace with real figures (e.g. years in business, clients served)
     | once the client confirms them.
     * ------------------------------------------------------------------ */
    'stats' => [
        ['value' => '9',   'suffix' => '',  'label' => 'Travel & Study Services'],
        ['value' => '8',   'suffix' => '+', 'label' => 'Featured Destinations'],
        ['value' => '6',   'suffix' => '',  'label' => 'Ready-made Tour Packages'],
        ['value' => '100', 'suffix' => '%', 'label' => 'Personalised Planning'],
    ],

    /* ------------------------------------------------------------------
     | Services
     * ------------------------------------------------------------------ */
    'services' => [
        [
            'slug'  => 'visa-assistance',
            'title' => 'Visa & Immigration Assistance',
            'icon'  => 'website/images/service-icon-1.svg',
            'tag'   => 'Tourist · Business · Family Visit',
            'image' => 'website/images/service-detail-image-1.jpg',
            'short' => 'Clear guidance and careful document preparation for tourist, business and family-visit visas.',
            'intro' => [
                'A visa application is often the most stressful part of travelling. Requirements differ from embassy to embassy, they change often, and a small mistake can lead to a refusal that stays on your record. We take that weight off your shoulders.',
                'Our team reviews your purpose of travel, checks your documents against the current requirements of the country you are visiting, helps you complete the forms correctly, and prepares you for your biometrics appointment or interview. We are honest about your chances and will tell you what to strengthen before you apply.',
            ],
            'features' => [
                ['title' => 'Document Review',      'text' => 'We check bank statements, letters, itineraries and supporting documents before submission.'],
                ['title' => 'Form Completion',      'text' => 'Accurate, consistent application forms so there are no avoidable errors or contradictions.'],
                ['title' => 'Appointment Booking',  'text' => 'We help you secure biometrics or interview slots and explain what to expect on the day.'],
                ['title' => 'Interview Coaching',   'text' => 'Practical preparation so you can answer questions calmly, truthfully and confidently.'],
            ],
            'checklist' => [
                'UK, Schengen, US, Canada, UAE and other popular visas',
                'Tourist, business, conference and family-visit applications',
                'Cover letters and travel itineraries that match your purpose',
                'Hotel and flight reservations for your application',
                'Follow-up and status updates until a decision is made',
                'Advice on re-applying after a previous refusal',
            ],
            'faqs' => [
                ['q' => 'Can you guarantee that my visa will be approved?', 'a' => 'No honest agent can. Only the embassy decides. What we guarantee is a carefully prepared, truthful application that gives you the best possible chance.'],
                ['q' => 'How early should I start my application?', 'a' => 'Ideally 8–12 weeks before you travel. Some embassies have long appointment waiting times, especially during peak seasons.'],
                ['q' => 'I was refused before. Can you still help?', 'a' => 'Yes. We will review your refusal letter, identify the reasons given, and advise you on what needs to change before you apply again.'],
            ],
        ],
        [
            'slug'  => 'study-abroad',
            'title' => 'Study Abroad & Admissions',
            'icon'  => 'website/images/service-icon-2.svg',
            'tag'   => 'Admissions · Student Visas',
            'image' => 'website/images/destination-image-9.jpg',
            'short' => 'From choosing a school to landing on campus — admissions, student visas and pre-departure support.',
            'intro' => [
                'Studying abroad is one of the biggest investments a family can make. We help students and parents make that decision with clear information about courses, costs, entry requirements and life in the destination country.',
                'From shortlisting universities and preparing personal statements to securing your admission letter, student visa and accommodation, we guide you through each stage and keep you on schedule so you do not miss important intake deadlines.',
            ],
            'features' => [
                ['title' => 'Course & School Matching', 'text' => 'Programmes that fit your grades, career goals and budget in the UK, Canada, Ireland, the US and more.'],
                ['title' => 'Application Support',      'text' => 'Help with personal statements, references, transcripts and English-test requirements.'],
                ['title' => 'Student Visa Processing',  'text' => 'Proof-of-funds guidance, document checks and interview preparation for your student visa.'],
                ['title' => 'Pre-departure Briefing',   'text' => 'Flights, accommodation, airport pickup and what to pack for your first months abroad.'],
            ],
            'checklist' => [
                'Undergraduate, postgraduate and diploma programmes',
                'Scholarship and tuition-discount guidance where available',
                'Statement of purpose and CV review',
                'Tuition deposit and proof-of-funds advice',
                'Student accommodation search',
                'Parent briefings so the whole family is informed',
            ],
            'faqs' => [
                ['q' => 'When should I start planning to study abroad?', 'a' => 'About 9–12 months before your intended intake. This leaves time for applications, English tests, funding and the visa process.'],
                ['q' => 'Do I need IELTS?', 'a' => 'It depends on the school and country. Some institutions accept alternatives or waive the requirement; we will check this for each option on your shortlist.'],
                ['q' => 'Can my family visit me later?', 'a' => 'In many cases yes, through a visitor visa. Rules on dependants differ by country and course level, so we advise case by case.'],
            ],
        ],
        [
            'slug'  => 'flight-booking',
            'title' => 'Flight Booking & Ticketing',
            'icon'  => 'website/images/service-icon-3.svg',
            'tag'   => 'Local & International',
            'image' => 'website/images/how-works-img.jpg',
            'short' => 'Local and international tickets with sensible routes, fair fares and help when plans change.',
            'intro' => [
                'We compare airlines, routes and fare rules to find options that balance price, travel time and flexibility. You get a clear explanation of baggage allowances, change fees and layovers before you pay — no surprises at the airport.',
                'If your plans change, you call us, not a faceless call centre. We handle date changes, re-routing and refunds according to the airline’s rules and keep you updated throughout.',
            ],
            'features' => [
                ['title' => 'Fare Comparison',     'text' => 'Multiple airline and route options so you can choose what suits your budget and schedule.'],
                ['title' => 'Group & Family Fares', 'text' => 'Bookings for families, church and corporate groups, events and conferences.'],
                ['title' => 'Changes & Refunds',    'text' => 'We manage date changes, cancellations and refunds on your behalf.'],
                ['title' => 'Travel Reminders',     'text' => 'Check-in reminders, baggage guidance and transit-visa checks before you fly.'],
            ],
            'checklist' => [
                'Domestic flights across Nigeria',
                'International economy, premium and business class',
                'One-way, return and multi-city itineraries',
                'Flight reservations for visa applications',
                'Special assistance and meal requests',
                'Airport transfers on arrival',
            ],
            'faqs' => [
                ['q' => 'How far in advance should I book?', 'a' => 'For international flights, 6–10 weeks ahead usually gives good fares. Book earlier for December, Easter and summer holidays.'],
                ['q' => 'Do I need a transit visa for my layover?', 'a' => 'Sometimes. It depends on your passport and the transit country. We check this for you before you book.'],
                ['q' => 'Can I hold a booking before paying?', 'a' => 'Some fares can be held for a short time. We will tell you if a hold is possible and how long the price is guaranteed.'],
            ],
        ],
        [
            'slug'  => 'hotel-reservations',
            'title' => 'Hotel Reservations',
            'icon'  => 'website/images/service-icon-4.svg',
            'tag'   => 'Hotels · Apartments · Resorts',
            'image' => 'website/images/blog-image5.jpg',
            'short' => 'Safe, well-located hotels and apartments that match your budget and the reason for your trip.',
            'intro' => [
                'Where you stay can make or break a trip. We recommend hotels, serviced apartments and resorts based on location, safety, reviews and your budget — not on whatever pays the highest commission.',
                'Whether you need a business hotel close to your meetings, a family apartment with a kitchen, or a beach resort for your honeymoon, we confirm your booking in writing and share everything you need for check-in.',
            ],
            'features' => [
                ['title' => 'Honest Recommendations', 'text' => 'Shortlists based on location, safety and real guest feedback.'],
                ['title' => 'Every Budget',           'text' => 'From comfortable mid-range hotels to five-star resorts and private villas.'],
                ['title' => 'Visa-ready Confirmations', 'text' => 'Booking confirmations formatted for your visa application where required.'],
                ['title' => 'Special Requests',       'text' => 'Early check-in, connecting rooms, airport pickup and celebration set-ups.'],
            ],
            'checklist' => [
                'City hotels for business and conferences',
                'Serviced apartments for families and long stays',
                'Beach and island resorts',
                'Flexible and refundable rate options',
                'Group room blocks for events and weddings',
                'Airport transfers and car hire',
            ],
            'faqs' => [
                ['q' => 'Can I get a refundable booking?', 'a' => 'Yes, where the hotel offers it. Refundable rates cost a little more but are often worth it while you wait for a visa decision.'],
                ['q' => 'Do you book apartments as well as hotels?', 'a' => 'Yes — serviced apartments are often better value for families and stays longer than a week.'],
            ],
        ],
        [
            'slug'  => 'holiday-packages',
            'title' => 'Tours & Holiday Packages',
            'icon'  => 'website/images/service-icon-5.svg',
            'tag'   => 'Leisure · Group Tours',
            'image' => 'website/images/tour-detail-image-1.jpg',
            'short' => 'Ready-made and tailor-made holidays to Dubai, Europe, the Maldives and beyond.',
            'intro' => [
                'Our holiday packages bring flights, accommodation, transfers, sightseeing and travel insurance together into one well-organised trip. Choose one of our ready-made tours or let us design an itinerary around your dates, interests and budget.',
                'We work with trusted local partners at each destination, so you have someone on the ground if you need help — and someone at home who already knows your plans.',
            ],
            'features' => [
                ['title' => 'Tailor-made Itineraries', 'text' => 'Trips designed around your dates, interests, pace and budget.'],
                ['title' => 'Trusted Local Partners',  'text' => 'Vetted guides, drivers and hotels at every destination.'],
                ['title' => 'All-in-one Planning',     'text' => 'Visa, flights, hotels, transfers and tours coordinated by one team.'],
                ['title' => 'Support While Away',      'text' => 'A direct line to our team throughout your trip.'],
            ],
            'checklist' => [
                'Family holidays and school-break trips',
                'Group tours for friends, churches and associations',
                'Corporate retreats and incentive trips',
                'City breaks and shopping trips',
                'Easter, summer and December holiday specials',
                'Flexible instalment planning on request',
            ],
            'faqs' => [
                ['q' => 'What is usually included in a package?', 'a' => 'Typically return flights, accommodation, airport transfers and selected tours. Each package page lists exactly what is and is not included.'],
                ['q' => 'Can I pay in instalments?', 'a' => 'For many packages, yes. We agree a payment schedule with you before booking so you know every date and amount.'],
            ],
        ],
        [
            'slug'  => 'honeymoon-getaways',
            'title' => 'Honeymoons & Special Occasions',
            'icon'  => 'website/images/service-icon-6.svg',
            'tag'   => 'Romance · Celebrations',
            'image' => 'website/images/destination-image-7.jpg',
            'short' => 'Romantic escapes, anniversaries and milestone birthdays planned with extra care.',
            'intro' => [
                'Some trips deserve more than a booking — they deserve a memory. We plan honeymoons, anniversaries, proposals and milestone birthdays with the small touches that make them special.',
                'From overwater villas in the Maldives to sunsets in Santorini or a surprise dinner in Paris, we take care of every detail so you can simply enjoy the moment together.',
            ],
            'features' => [
                ['title' => 'Romantic Destinations', 'text' => 'The Maldives, Zanzibar, Santorini, Bali, Paris and more.'],
                ['title' => 'Special Touches',       'text' => 'Room decorations, private dinners, spa treatments and photoshoots.'],
                ['title' => 'Surprise Planning',     'text' => 'Discreet help for proposals and surprise celebrations.'],
                ['title' => 'Stress-free Logistics', 'text' => 'Visas, flights and transfers sorted, so the focus stays on you.'],
            ],
            'checklist' => [
                'Honeymoon packages',
                'Anniversary and vow-renewal trips',
                'Proposal planning',
                'Milestone birthday getaways',
                'Babymoons',
                'Destination wedding guest travel',
            ],
            'faqs' => [
                ['q' => 'How soon after the wedding should we travel?', 'a' => 'That is up to you. Many couples leave within a week; we simply recommend sorting visas well before the wedding date.'],
                ['q' => 'Can you include a photoshoot?', 'a' => 'Yes. We can arrange a professional photographer at most popular honeymoon destinations.'],
            ],
        ],
        [
            'slug'  => 'work-permit',
            'title' => 'Work Permits & Relocation',
            'icon'  => 'website/images/service-icon-3.svg',
            'tag'   => 'Work & Live Abroad',
            'image' => 'website/images/flyers/work-permit-banner.jpg',
            'flyer' => 'website/images/flyers/work-permit.jpg',
            'short' => 'Guidance on legitimate work-visa routes to the UK, USA, Germany, the Netherlands, Canada, Ireland, Australia and more.',
            'intro' => [
                'Working abroad can change your career and your family’s future — but it is also the area where Nigerians are most often targeted by fake job offers and visa scams. We help you pursue genuine, legal routes to work and live abroad.',
                'We assess your qualifications and experience, explain which work-visa categories you may qualify for in the UK, USA, Germany, the Netherlands, Canada, Russia, Ireland and Australia, and guide you through credential checks, documentation and the visa application once you have a valid job offer or sponsorship.',
            ],
            'features' => [
                ['title' => 'Eligibility Assessment', 'text' => 'An honest review of your profession, qualifications and experience against each country’s requirements.'],
                ['title' => 'CV & Document Preparation', 'text' => 'Country-standard CVs, reference letters and certificate evaluation where needed.'],
                ['title' => 'Visa Application Support', 'text' => 'Careful preparation of your work-visa application once you have a genuine offer or sponsorship.'],
                ['title' => 'Relocation Planning', 'text' => 'Flights, temporary accommodation and arrival guidance for you and your family.'],
            ],
            'checklist' => [
                'UK, USA, Germany and the Netherlands',
                'Canada, Ireland, Australia and Russia',
                'Skilled-worker and sponsored routes',
                'Healthcare, tech, engineering and other in-demand fields',
                'Dependant visas for spouse and children',
                'Pre-departure and arrival guidance',
            ],
            'faqs' => [
                ['q' => 'Can you guarantee me a job abroad?', 'a' => 'No. Jobs are offered by employers and visas are issued by governments. Be careful of anyone who “sells” guaranteed jobs or visas. We help you prepare properly and apply through legitimate routes.'],
                ['q' => 'Do I need a job offer before applying?', 'a' => 'For most work visas, yes — usually from an employer licensed to sponsor foreign workers. Some countries also have points-based or job-seeker routes; we will tell you which ones fit your profile.'],
                ['q' => 'Can my family come with me?', 'a' => 'Many work-visa routes allow dependants. The rules and costs differ by country and visa type, so we check this for your situation.'],
            ],
        ],
        [
            'slug'  => 'healthcare-leadership',
            'title' => 'Healthcare Leadership Programmes',
            'icon'  => 'website/images/service-icon-2.svg',
            'tag'   => 'For Healthcare Professionals',
            'image' => 'website/images/flyers/healthcare-banner.jpg',
            'flyer' => 'website/images/flyers/healthcare-leadership.jpg',
            'short' => 'Specialised professional programmes in Canada and other countries for doctors, nurses, pharmacists and health administrators.',
            'intro' => [
                'Advance your career in the global healthcare sector. We help healthcare professionals find and apply for specialised leadership and management programmes in Canada and other countries.',
                'These programmes help you gain international healthcare knowledge, build a global professional network and strengthen your career — whether you plan to return home with new skills or build a career abroad. We support you from choosing a programme to admission, study permit and travel.',
            ],
            'features' => [
                ['title' => 'Healthcare & Nursing Leadership', 'text' => 'Programmes that build management and leadership skills for clinical professionals.'],
                ['title' => 'Hospital Administration', 'text' => 'Training in running hospitals and health facilities efficiently.'],
                ['title' => 'Quality & Patient Safety', 'text' => 'Courses in healthcare quality improvement and patient-safety systems.'],
                ['title' => 'Public Health Management', 'text' => 'Programmes for leading public-health projects, teams and policy.'],
            ],
            'checklist' => [
                'Doctors',
                'Nurses',
                'Pharmacists',
                'Hospital administrators',
                'Public health professionals',
                'Other healthcare practitioners',
            ],
            'faqs' => [
                ['q' => 'Which countries offer these programmes?', 'a' => 'Mainly Canada, with options in other countries too. We will show you programmes that fit your profession, budget and goals.'],
                ['q' => 'Do I need to be practising already?', 'a' => 'Most leadership programmes expect a healthcare qualification and some work experience. Entry requirements vary by school, and we check them for you.'],
                ['q' => 'Do you help with the study permit?', 'a' => 'Yes — once you have an admission letter, we help you prepare your study permit or visa application, proof of funds and travel plans.'],
            ],
        ],
        [
            'slug'  => 'study-mbbs-abroad',
            'title' => 'Study Medicine (MBBS) Abroad',
            'icon'  => 'website/images/service-icon-1.svg',
            'tag'   => 'MBBS · MD · MS',
            'image' => 'website/images/flyers/mbbs-banner.jpg',
            'flyer' => 'website/images/flyers/study-mbbs.jpg',
            'short' => 'Admission support for medical degrees in Russia, the UK, the USA, Australia, Europe and Canada.',
            'intro' => [
                'Dreaming of becoming a doctor? We help aspiring medical students secure admission into MBBS, MD and MS programmes at medical universities in Russia, the UK, the USA, Australia, Europe and Canada.',
                'Choosing a medical school is a long-term decision. We help you compare tuition, duration, language of instruction and — most importantly — whether the degree will be recognised when you return. If you plan to practise in Nigeria, we advise you to confirm the school’s recognition with the Medical and Dental Council of Nigeria (MDCN) before you accept an offer.',
            ],
            'features' => [
                ['title' => 'School Shortlisting', 'text' => 'Recognised medical universities that match your grades, budget and preferred country.'],
                ['title' => 'Admission Processing', 'text' => 'Application forms, transcripts, statements and admission-letter follow-up.'],
                ['title' => 'Student Visa Support', 'text' => 'Proof of funds guidance, document checks and visa interview preparation.'],
                ['title' => 'Travel & Arrival', 'text' => 'Flights, accommodation and a pre-departure briefing for students and parents.'],
            ],
            'checklist' => [
                'MBBS / MD / MS programmes',
                'Russia, UK, USA and Canada',
                'Australia and other European countries',
                'Recognition checks before you accept an offer',
                'Tuition and living-cost planning',
                'Parent briefings and ongoing support',
            ],
            'faqs' => [
                ['q' => 'What qualifications do I need?', 'a' => 'Usually strong results in Biology, Chemistry, Physics and English (for example WAEC/NECO). Some countries also require entrance exams or foundation years. We check each school’s requirements for you.'],
                ['q' => 'Will my degree be recognised in Nigeria?', 'a' => 'Only if the school is recognised by the MDCN, and graduates normally sit a qualifying assessment before practising. We help you check recognition before you commit.'],
                ['q' => 'How long does the programme take?', 'a' => 'Typically five to six years, depending on the country and whether a foundation or language year is required.'],
            ],
        ],
    ],

    /* ------------------------------------------------------------------
     | How it works (3 steps)
     * ------------------------------------------------------------------ */
    'steps' => [
        ['title' => 'Tell Us Your Plans',    'text' => 'Call, WhatsApp or send a message. We listen to where you want to go, why, when and your budget.'],
        ['title' => 'Get a Clear Plan',      'text' => 'We send you options, requirements, timelines and costs in writing — no hidden charges.'],
        ['title' => 'Travel With Confidence', 'text' => 'We handle the paperwork and bookings, then stay reachable until you are back home.'],
    ],

    /* ------------------------------------------------------------------
     | Why choose us
     * ------------------------------------------------------------------ */
    'why' => [
        'Honest advice — we tell you what is realistic before you spend a kobo.',
        'One team for visas, flights, hotels, study abroad and tours.',
        'Careful document checks that reduce avoidable refusals and delays.',
        'Personal attention from the first call until you return home.',
    ],

    /* ------------------------------------------------------------------
     | Destinations
     * ------------------------------------------------------------------ */
    'destinations' => [
        [
            'slug' => 'dubai', 'name' => 'Dubai, UAE', 'image' => 'website/images/destination-image-8.jpg',
            'best_time' => 'November – March', 'ideal_for' => 'Shopping, family holidays, luxury and business trips',
            'intro' => [
                'Dubai is one of the most popular destinations for Nigerian travellers — and for good reason. In a few hours you can move from desert dunes to sky-high observation decks, world-class malls and white-sand beaches.',
                'It is an easy city for first-time international travellers: excellent hotels for every budget, efficient transport and attractions for every age. We take care of your UAE visa, flights, hotel and tours as one package.',
            ],
            'highlights' => ['Burj Khalifa observation deck', 'Desert safari with dinner', 'Dubai Mall & Dubai Fountain', 'Dhow cruise at Dubai Marina', 'Day trip to Abu Dhabi', 'Global Village (seasonal)', 'Miracle Garden (seasonal)', 'Gold & Spice Souks'],
        ],
        [
            'slug' => 'canada', 'name' => 'Canada', 'image' => 'website/images/destination-image-9.jpg',
            'best_time' => 'June – September (summer), December – March (snow)', 'ideal_for' => 'Study, family visits and nature lovers',
            'intro' => [
                'Canada attracts students, families visiting relatives and travellers who love wide open landscapes. Its universities and colleges are respected worldwide, and its cities are safe, welcoming and multicultural.',
                'Whether you are visiting Toronto, exploring the Rockies or preparing for a new academic year, we help with visitor and study permits, flights and accommodation.',
            ],
            'highlights' => ['Niagara Falls', 'Toronto’s CN Tower', 'Banff & Lake Louise', 'Old Montreal & Quebec City', 'Vancouver & Stanley Park', 'Top-ranked universities', 'Winter skiing', 'Autumn colours'],
        ],
        [
            'slug' => 'france', 'name' => 'Paris, France', 'image' => 'website/images/destination-image-6.jpg',
            'best_time' => 'April – June, September – October', 'ideal_for' => 'Romance, culture, fashion and food',
            'intro' => [
                'Paris needs little introduction: the Eiffel Tower, the Louvre, café terraces and some of the world’s best food and fashion. It is a favourite for honeymoons, anniversaries and first trips to Europe.',
                'A Schengen visa for France also lets you combine your trip with other European countries. We plan the route, prepare your visa documents and book the right hotels.',
            ],
            'highlights' => ['Eiffel Tower', 'Louvre Museum', 'Seine river cruise', 'Montmartre & Sacré-Cœur', 'Palace of Versailles', 'Disneyland Paris', 'Champs-Élysées shopping', 'Day trip to the countryside'],
        ],
        [
            'slug' => 'italy', 'name' => 'Italy', 'image' => 'website/images/destination-image-5.jpg',
            'best_time' => 'April – June, September – October', 'ideal_for' => 'History, faith tourism, food and coastline',
            'intro' => [
                'Italy brings history, faith and food together like nowhere else. Walk through ancient Rome, visit Vatican City, ride a gondola in Venice and relax on the Amalfi Coast.',
                'We design Italy itineraries that move at a comfortable pace, with fast trains between cities and well-located hotels so you spend less time travelling and more time enjoying.',
            ],
            'highlights' => ['Colosseum & Roman Forum', 'Vatican Museums & St Peter’s Basilica', 'Venice gondola ride', 'Florence & Tuscany', 'Amalfi Coast', 'Leaning Tower of Pisa', 'Authentic pizza and pasta', 'Lake Como'],
        ],
        [
            'slug' => 'maldives', 'name' => 'Maldives', 'image' => 'website/images/destination-image-7.jpg',
            'best_time' => 'November – April', 'ideal_for' => 'Honeymoons, anniversaries and total relaxation',
            'intro' => [
                'Crystal-clear lagoons, overwater villas and complete privacy make the Maldives the ultimate honeymoon and anniversary destination.',
                'Resorts differ a lot in price, transfer type and what is included, so we help you choose the right island and meal plan — and arrange speedboat or seaplane transfers.',
            ],
            'highlights' => ['Overwater villas', 'Snorkelling with turtles', 'Sunset dolphin cruise', 'Sandbank picnic', 'Spa treatments', 'Seaplane transfers', 'Private beach dinners', 'Diving trips'],
        ],
        [
            'slug' => 'switzerland', 'name' => 'Switzerland', 'image' => 'website/images/destination-image-1.jpg',
            'best_time' => 'June – September, December – March', 'ideal_for' => 'Scenery, train journeys and winter holidays',
            'intro' => [
                'Switzerland is postcard scenery everywhere you look: snow-capped peaks, clean lakes and charming mountain villages linked by some of the world’s most beautiful train routes.',
                'Visit in summer for hiking and lake cruises, or in winter for snow and skiing. We plan routes, rail passes and hotels so the whole trip runs smoothly.',
            ],
            'highlights' => ['Jungfraujoch – Top of Europe', 'Mount Titlis cable car', 'Lake Lucerne cruise', 'Glacier Express train', 'Interlaken', 'Zermatt & the Matterhorn', 'Swiss chocolate tasting', 'Geneva & Lake Geneva'],
        ],
        [
            'slug' => 'bali', 'name' => 'Bali, Indonesia', 'image' => 'website/images/destination-image-4.jpg',
            'best_time' => 'April – October', 'ideal_for' => 'Honeymoons, wellness and culture',
            'intro' => [
                'Bali blends tropical beaches, green rice terraces, temples and wellness retreats into one island — at prices that are often friendlier than other luxury destinations.',
                'Stay in a private pool villa in Ubud, watch the sunset at Uluwatu and enjoy Balinese hospitality, with our team coordinating flights, visas and transfers.',
            ],
            'highlights' => ['Ubud rice terraces', 'Uluwatu Temple at sunset', 'Private pool villas', 'Balinese spa rituals', 'Nusa Penida day trip', 'Mount Batur sunrise trek', 'Seminyak beach clubs', 'Traditional dance shows'],
        ],
        [
            'slug' => 'australia', 'name' => 'Australia', 'image' => 'website/images/destination-image-12.jpg',
            'best_time' => 'September – November, March – May', 'ideal_for' => 'Study, adventure and family visits',
            'intro' => [
                'Australia offers respected universities, vibrant cities and natural wonders such as the Great Barrier Reef. It is a strong choice for students and adventurous travellers.',
                'We help with visitor and student visas, long-haul flight planning and itineraries that make the most of the distance.',
            ],
            'highlights' => ['Sydney Opera House & Harbour Bridge', 'Great Barrier Reef', 'Melbourne’s laneways', 'Gold Coast beaches', 'Wildlife parks', 'Great Ocean Road', 'Top-ranked universities', 'Blue Mountains'],
        ],
    ],

    /* ------------------------------------------------------------------
     | Tour packages  (set 'price' to a string such as '₦2,450,000 / person'
     | when the client confirms current prices; null shows "Price on request")
     * ------------------------------------------------------------------ */
    'tours' => [
        [
            'slug' => 'dubai-city-and-desert', 'title' => 'Dubai City & Desert Escape', 'destination' => 'Dubai, UAE',
            'image' => 'website/images/tour-list4.jpg', 'duration' => '5 Days / 4 Nights', 'price' => null,
            'summary' => 'Skyscrapers, souks, a desert safari and plenty of time for shopping — the perfect first international holiday.',
            'description' => [
                'This five-day package is our most requested trip. It balances the must-see sights of Dubai with free time to shop, relax by the pool or explore on your own.',
                'You will see the city from the top of the Burj Khalifa, ride the dunes on a desert safari, cruise the marina on a traditional dhow and visit the old souks of Deira. Families, couples and groups of friends all love this one.',
            ],
            'highlights' => ['Burj Khalifa “At the Top” visit', 'Desert safari with BBQ dinner and shows', 'Dhow cruise dinner at Dubai Marina', 'Half-day city tour including Old Dubai', 'Free time at Dubai Mall', 'Optional Abu Dhabi day trip'],
            'included' => ['UAE tourist visa processing', 'Return airport transfers', '4 nights’ hotel with breakfast', 'Tours listed in the highlights'],
            'excluded' => ['International flights (quoted separately)', 'Lunches and personal shopping', 'Optional activities', 'Travel insurance (strongly recommended)'],
        ],
        [
            'slug' => 'maldives-honeymoon', 'title' => 'Maldives Honeymoon Retreat', 'destination' => 'Maldives',
            'image' => 'website/images/tour-list5.jpg', 'duration' => '6 Days / 5 Nights', 'price' => null,
            'summary' => 'Overwater villa, turquoise lagoon and nothing to do but enjoy each other.',
            'description' => [
                'Celebrate your new marriage in true paradise. This retreat combines nights in a beach villa and an overwater villa so you experience both sides of island life.',
                'Days are yours to fill with snorkelling, spa treatments and sunset cruises — or simply doing nothing at all. We add honeymoon touches such as a decorated room and a private dinner on the beach.',
            ],
            'highlights' => ['Beach and overwater villa stay', 'Private candle-lit beach dinner', 'Sunset dolphin cruise', 'Guided snorkelling trip', 'Couples’ spa session', 'Honeymoon room decoration'],
            'included' => ['Speedboat or seaplane resort transfers', '5 nights’ accommodation', 'Meal plan as selected (half or full board)', 'Honeymoon extras listed above'],
            'excluded' => ['International flights (quoted separately)', 'Drinks outside the meal plan', 'Optional excursions', 'Travel insurance'],
        ],
        [
            'slug' => 'paris-romance', 'title' => 'Paris in Love', 'destination' => 'Paris, France',
            'image' => 'website/images/tour-list6.jpg', 'duration' => '5 Days / 4 Nights', 'price' => null,
            'summary' => 'The Eiffel Tower, a Seine cruise and slow mornings in Parisian cafés.',
            'description' => [
                'A romantic city break for couples and anniversary travellers. Stay in a charming central hotel and discover Paris at a relaxed pace.',
                'We include the classics — the Eiffel Tower, the Louvre and a Seine cruise — and leave space for wandering Montmartre, shopping and long dinners.',
            ],
            'highlights' => ['Eiffel Tower summit tickets', 'Evening Seine river cruise', 'Louvre Museum entry', 'Montmartre walking tour', 'Day trip to Versailles', 'Free afternoon for shopping'],
            'included' => ['Schengen visa document support', '4 nights’ central hotel with breakfast', 'Airport transfers', 'Tickets for listed attractions'],
            'excluded' => ['Visa and embassy fees', 'International flights (quoted separately)', 'Lunches and dinners', 'Travel insurance (required for Schengen visas)'],
        ],
        [
            'slug' => 'classic-italy', 'title' => 'Classic Italy: Rome, Florence & Venice', 'destination' => 'Italy',
            'image' => 'website/images/tour-list3.jpg', 'duration' => '8 Days / 7 Nights', 'price' => null,
            'summary' => 'Three iconic cities connected by fast trains, with the Vatican, the Colosseum and Venice’s canals.',
            'description' => [
                'Italy’s three most famous cities in one comfortable week. You travel between them by high-speed train, so there is no driving and no stress.',
                'Guided visits bring the history to life, while free time lets you enjoy gelato, piazzas and Italian food at your own pace. A favourite for faith groups, families and couples.',
            ],
            'highlights' => ['Guided Colosseum & Roman Forum tour', 'Vatican Museums & Sistine Chapel', 'Florence walking tour', 'Gondola ride in Venice', 'High-speed train between cities', 'Optional Tuscany wine-country day'],
            'included' => ['Schengen visa document support', '7 nights’ hotels with breakfast', 'Rail tickets between cities', 'Guided tours listed above'],
            'excluded' => ['Visa and embassy fees', 'International flights (quoted separately)', 'City tourist taxes payable at hotels', 'Travel insurance'],
        ],
        [
            'slug' => 'swiss-alps-discovery', 'title' => 'Swiss Alps Discovery', 'destination' => 'Switzerland',
            'image' => 'website/images/tour-list1.jpg', 'duration' => '7 Days / 6 Nights', 'price' => null,
            'summary' => 'Snowy peaks, lake cruises and panoramic train rides through the heart of the Alps.',
            'description' => [
                'See the best of Switzerland from Lucerne and Interlaken, two bases surrounded by lakes and mountains. A Swiss Travel Pass makes trains, buses and boats simple.',
                'Ride up to the Jungfraujoch, cross Lake Lucerne by boat and taste real Swiss chocolate. Ideal for families and anyone who loves breathtaking scenery.',
            ],
            'highlights' => ['Jungfraujoch – Top of Europe', 'Mount Titlis rotating cable car', 'Lake Lucerne cruise', 'Interlaken & Lauterbrunnen valley', 'Swiss chocolate tasting', 'Swiss Travel Pass for trains & boats'],
            'included' => ['Schengen visa document support', '6 nights’ hotels with breakfast', 'Swiss Travel Pass', 'Mountain excursion tickets listed'],
            'excluded' => ['Visa and embassy fees', 'International flights (quoted separately)', 'Lunches and dinners', 'Travel insurance'],
        ],
        [
            'slug' => 'canada-explorer', 'title' => 'Canada Explorer: Toronto & Niagara', 'destination' => 'Canada',
            'image' => 'website/images/tour-list9.jpg', 'duration' => '6 Days / 5 Nights', 'price' => null,
            'summary' => 'City life in Toronto and the thunder of Niagara Falls — great for families and first visits.',
            'description' => [
                'An easy introduction to Canada, perfect if you are also visiting relatives or touring universities. Base yourself in Toronto and take a full day to experience Niagara Falls up close.',
                'We can add campus visits for prospective students or extend the trip to Montreal or Vancouver.',
            ],
            'highlights' => ['CN Tower & EdgeWalk option', 'Full-day Niagara Falls tour with boat ride', 'Toronto city tour', 'Distillery District & harbourfront', 'Optional university campus visits', 'Optional extension to Montreal'],
            'included' => ['Visitor visa document support', '5 nights’ hotel', 'Niagara Falls day tour', 'Airport transfers'],
            'excluded' => ['Visa and biometrics fees', 'International flights (quoted separately)', 'Meals', 'Travel insurance'],
        ],
    ],

    /* ------------------------------------------------------------------
     | FAQs (grouped)
     * ------------------------------------------------------------------ */
    'faqs' => [
        'Visas & Travel Documents' => [
            ['q' => 'Which visas do you help with?', 'a' => 'Tourist, business, family-visit and student visas for the UK, Schengen countries, the US, Canada, the UAE, Australia and many others. Ask us about any country not listed.'],
            ['q' => 'Can you guarantee my visa?', 'a' => 'No. Visa decisions are made only by the embassy or immigration authority. We make sure your application is complete, consistent and truthful, which gives you the best possible chance.'],
            ['q' => 'How long does a visa take?', 'a' => 'It varies by country and season — from a few days for some e-visas to several weeks for UK, US or Schengen visas. We will give you a realistic timeline for your case.'],
            ['q' => 'What documents will I need?', 'a' => 'Usually a valid passport, photographs, bank statements, proof of employment or business, and a travel itinerary. We send you a personalised checklist after your consultation.'],
        ],
        'Study Abroad' => [
            ['q' => 'Which countries can I study in?', 'a' => 'We support applications to the UK, Canada, Ireland, the US, Australia and selected European countries.'],
            ['q' => 'Can you help with scholarships?', 'a' => 'We point you to scholarships and tuition discounts you may qualify for and help you prepare strong applications, though awards are decided by the institutions.'],
            ['q' => 'Do you help after admission?', 'a' => 'Yes — student visa, flights, accommodation, airport pickup advice and a pre-departure briefing.'],
        ],
        'Work Permits' => [
            ['q' => 'Which countries do you help with?', 'a' => 'The UK, USA, Germany, the Netherlands, Canada, Russia, Ireland, Australia and others. Requirements differ for each country and job type.'],
            ['q' => 'Do you sell jobs or guarantee visas?', 'a' => 'No. Genuine jobs come from employers and visas from governments. We help you understand the legal routes and prepare a strong, truthful application.'],
        ],
        'Flights & Hotels' => [
            ['q' => 'Do you book both local and international flights?', 'a' => 'Yes, on most major airlines, including group and family bookings.'],
            ['q' => 'Can you provide flight and hotel reservations for my visa application?', 'a' => 'Yes. We provide genuine, verifiable reservations suitable for embassy submission.'],
            ['q' => 'What happens if my flight is cancelled or changed?', 'a' => 'Contact us immediately. We liaise with the airline to rebook or arrange a refund according to its rules.'],
        ],
        'Tours & Payments' => [
            ['q' => 'How do I book a tour package?', 'a' => 'Send us a message with your preferred package, dates and number of travellers. We confirm availability, send a written quote and book once you approve it.'],
            ['q' => 'Can I customise a package?', 'a' => 'Absolutely. Every package can be adjusted — dates, hotels, length of stay and activities.'],
            ['q' => 'How do I pay?', 'a' => 'By bank transfer to our official company account only. We always issue a receipt. Never pay into a personal account claiming to be us.'],
            ['q' => 'What is your cancellation policy?', 'a' => 'It depends on the airline, hotel and tour suppliers involved. The exact terms are written on your quote before you pay.'],
        ],
    ],

    /* ------------------------------------------------------------------
     | Testimonials — ADD REAL CLIENT REVIEWS HERE.
     | Only publish reviews from real clients who agreed to be quoted.
     | While this list is empty the testimonials sections are hidden.
     | Example entry:
     |   ['name' => 'Adaeze O.', 'location' => 'Lagos', 'trip' => 'Dubai holiday',
     |    'text' => 'Their words here…', 'image' => 'website/images/testimonial1.png'],
     * ------------------------------------------------------------------ */
    'testimonials' => [],

    /* ------------------------------------------------------------------
     | Gallery images
     * ------------------------------------------------------------------ */
    'gallery' => [
        'website/images/flyers/work-permit.jpg', 'website/images/flyers/healthcare-leadership.jpg', 'website/images/flyers/study-mbbs.jpg',
        'website/images/page-gallery1.jpg', 'website/images/page-gallery2.jpg', 'website/images/page-gallery3.jpg',
        'website/images/page-gallery4.jpg', 'website/images/page-gallery5.jpg', 'website/images/page-gallery6.jpg',
        'website/images/page-gallery7.jpg', 'website/images/page-gallery8.jpg', 'website/images/page-gallery9.jpg',
    ],

    /* ------------------------------------------------------------------
     | Blog / travel guides
     * ------------------------------------------------------------------ */
    'posts' => [
        [
            'slug' => 'strong-visa-application-tips', 'title' => '8 Tips for a Stronger Visa Application',
            'category' => 'Visa Guides', 'date' => '2026-10-06', 'image' => 'website/images/blog-image1.jpg', 'thumb' => 'website/images/blog-list1.png',
            'excerpt' => 'Most visa refusals come from avoidable mistakes. Here is how to present your application clearly, truthfully and convincingly.',
            'quote' => 'A strong application is not about looking rich — it is about telling a clear, consistent and truthful story.',
            'sections' => [
                ['h' => '1. Start early', 'p' => 'Appointment slots fill up quickly, especially before the summer and December holidays. Begin gathering documents at least two to three months before you plan to travel.'],
                ['h' => '2. Be clear about your purpose', 'p' => 'Your forms, cover letter, itinerary and bookings should all tell the same story. If you say you are going for a conference, include the invitation and registration.'],
                ['h' => '3. Show stable finances', 'p' => 'Embassies want to see that you can afford the trip. Provide recent statements with a steady history; large unexplained deposits shortly before applying raise questions.'],
                ['h' => '4. Prove your ties to home', 'p' => 'Employment letters, business registration, property documents and family responsibilities all show that you intend to return.'],
                ['h' => '5. Never submit false documents', 'p' => 'Fake bank statements or letters can lead to long bans. If something is weak, it is far better to strengthen it honestly or wait.'],
                ['h' => '6. Keep your travel history visible', 'p' => 'Include copies of previous visas and passport stamps. A good travel record helps your case.'],
                ['h' => '7. Prepare for questions', 'p' => 'If an interview is required, practise answering simply and truthfully. Do not memorise speeches.'],
                ['h' => '8. Get a second pair of eyes', 'p' => 'A careful review before submission catches small inconsistencies. That is exactly what our visa team does for every client.'],
            ],
            'tags' => ['Visa Tips', 'Travel Documents', 'Embassy'],
        ],
        [
            'slug' => 'study-abroad-timeline', 'title' => 'Your 12-Month Study Abroad Timeline',
            'category' => 'Study Abroad', 'date' => '2026-09-18', 'image' => 'website/images/blog-image2.jpg', 'thumb' => 'website/images/blog-list2.png',
            'excerpt' => 'From choosing a course to boarding your flight — a month-by-month plan so you never miss a deadline.',
            'quote' => 'The students who succeed are rarely the ones who started with the most money — they are the ones who started early.',
            'sections' => [
                ['h' => '12–10 months before: research', 'p' => 'Decide on your course, preferred countries and budget. Look at entry requirements, tuition and living costs, and talk to us about realistic options.'],
                ['h' => '10–8 months before: tests and documents', 'p' => 'Book any English test you need, request transcripts and references, and begin your personal statement.'],
                ['h' => '8–6 months before: apply', 'p' => 'Submit applications to a balanced shortlist of schools. Apply for scholarships at the same time — many have early deadlines.'],
                ['h' => '6–4 months before: accept and pay deposits', 'p' => 'Compare your offers, accept one, and pay any required deposit to receive your confirmation for the visa.'],
                ['h' => '4–2 months before: student visa', 'p' => 'Prepare proof of funds and submit your student visa application. Book accommodation once your visa is approved or as your school advises.'],
                ['h' => 'Last month: pre-departure', 'p' => 'Book flights, buy suitable clothing, arrange airport pickup and attend a pre-departure briefing.'],
            ],
            'tags' => ['Study Abroad', 'Admissions', 'Student Visa'],
        ],
        [
            'slug' => 'book-cheaper-flights', 'title' => 'How to Get Better Value on International Flights',
            'category' => 'Flights', 'date' => '2026-08-27', 'image' => 'website/images/blog-image3.jpg', 'thumb' => 'website/images/blog-list3.png',
            'excerpt' => 'The cheapest fare is not always the best value. Here is what to look at before you pay for a ticket.',
            'quote' => 'A cheap ticket with a 20-hour layover and no baggage is not a bargain.',
            'sections' => [
                ['h' => 'Book at the right time', 'p' => 'For most international routes, booking six to ten weeks ahead gives good prices. For December and Easter travel, book even earlier.'],
                ['h' => 'Be flexible with dates', 'p' => 'Flying mid-week is often cheaper than Friday or Sunday. Moving your trip by a day or two can make a noticeable difference.'],
                ['h' => 'Read the fare rules', 'p' => 'Check baggage allowance, change fees and refund conditions before you compare prices. A slightly higher fare can save you money later.'],
                ['h' => 'Check transit requirements', 'p' => 'Some layovers require a transit visa for Nigerian passport holders. Always confirm before booking a connection.'],
                ['h' => 'Ask an agent', 'p' => 'We compare multiple airlines and routes and explain the trade-offs, so you can choose with confidence.'],
            ],
            'tags' => ['Flights', 'Travel Tips', 'Budget'],
        ],
        [
            'slug' => 'first-trip-to-dubai', 'title' => 'First Trip to Dubai? What to Know Before You Go',
            'category' => 'Destination Guides', 'date' => '2026-08-05', 'image' => 'website/images/blog-image4.jpg', 'thumb' => 'website/images/blog-list4.png',
            'excerpt' => 'Visas, weather, dress codes, money and the attractions worth your time on a first visit.',
            'quote' => 'Dubai rewards a little planning — book the big attractions early and leave room for the souks.',
            'sections' => [
                ['h' => 'Sort your visa first', 'p' => 'Nigerian passport holders need a UAE visa arranged before travel. Requirements change from time to time, so check with us for the current rules.'],
                ['h' => 'Choose the right season', 'p' => 'November to March is the most comfortable time to visit. Summer is very hot, but hotel prices are lower.'],
                ['h' => 'Respect local customs', 'p' => 'Dress modestly in malls and traditional areas, and be mindful during Ramadan. Beachwear is fine at the beach and pool.'],
                ['h' => 'Plan your must-sees', 'p' => 'Book the Burj Khalifa and desert safari in advance. Leave time for Old Dubai, the souks and an abra ride across the creek.'],
                ['h' => 'Getting around', 'p' => 'The metro is clean and affordable. Taxis and ride-hailing apps are easy for longer trips.'],
            ],
            'tags' => ['Dubai', 'Destination Guide', 'Holiday'],
        ],
    ],

];
