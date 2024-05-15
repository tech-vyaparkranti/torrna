@extends('layouts.webSite')
@section('title', 'Torna Holidays Pvt Ltd')
@section('content')
    {{-- @include('include.navigation') --}}
    @include('include.slider')

    <!-- aboutus Section -->
    <div class="destinations pt-5 pb-3">
        <div class="custom-container">
            <div class="site-title pb-0">
                <h2 class="text-center">About Us</h2>
            </div>
            <p class="text-center">Established in 1994, Torna Leisures Pvt Ltd has been a stalwart in the tourism industry, dedicated to creating memorable experiences for travelers worldwide. Specializing in both domestic and international tours, we cater to a diverse range of tourism segments, including adventure, leisure, cultural exploration, educational trips, cruise holidays, bike expeditions, camping excursions, and hikes. With a commitment to excellence and a passion for exploration, we have become synonymous with exceptional travel experiences tailored to suit every traveler's preference.</p>
            <p class="text-center">At <b>Torna Leisures Pvt Ltd,</b> we invite you to embark on a journey of discovery, where every experience is crafted with care and passion. Let us be your guide to the wonders of india.</p>
        </div>
    </div>
    <!-- Destinations Section End -->
    <!-- Destinations Section -->
    <div class="destinations pt-2 pb-4">
        <div class="custom-container">
            <div class="site-title pb-4">
                <h2 class="text-center">Our Popular Destinations</h2>
                <p class="text-center">Embark on unforgettable journeys to exotic destinations with our expertly crafted travel experiences.</p>
            </div>
            <div class="swiper we-offer" >
                <div class="swiper-wrapper" id="destinations">
                    <div class="swiper-slide mb-4">
                        <div class="destinations-block">
                            <div class="destinations-figure">
                                <img src="assets/img/travelbrace/ram-mandir.jpg" class="img-fluid" width="" height="" alt="Destinations">
                            </div>
                            <span class="destinations-title">India</span>
                        </div>
                    </div>
                    <div class="swiper-slide mb-4">
                        <div class="destinations-block">
                            <div class="destinations-figure">
                                <img src="assets/img/europe.jpg" class="img-fluid" width="" height="" alt="Destinations">
                            </div>
                            <span class="destinations-title">Europe</span>
                        </div>
                    </div>
                    <div class="swiper-slide mb-4">
                        <div class="destinations-block">
                            <div class="destinations-figure">
                                <img src="assets/img/usa.jpg" class="img-fluid" width="" height="" alt="Destinations">
                            </div>
                            <span class="destinations-title">USA</span>
                        </div>
                    </div>
                    <div class="swiper-slide mb-4">
                        <div class="destinations-block">
                            <div class="destinations-figure">
                                <img src="assets/img/canada.jpg" class="img-fluid" width="" height="" alt="Destinations">
                            </div>
                            <span class="destinations-title">Canada</span>
                        </div>
                    </div>
                    <div class="swiper-slide mb-4">
                        <div class="destinations-block">
                            <div class="destinations-figure">
                                <img src="assets/img/thailand.jpg" class="img-fluid" width="" height="" alt="Destinations">
                            </div>
                            <span class="destinations-title">Thailand</span>
                        </div>
                    </div>
                    <div class="swiper-slide mb-4">
                        <div class="destinations-block">
                            <div class="destinations-figure">
                                <img src="assets/img/uk.jpg" class="img-fluid" width="" height="" alt="Destinations">
                            </div>
                            <span class="destinations-title">UK</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="destinations pt-2 pb-4">
        <div class="custom-container">
            <div class="site-title pb-4">
                <h2 class="text-center">Our Services</h2>
                {{-- <p class="text-center">Embark on unforgettable journeys to exotic destinations with our expertly crafted travel experiences.</p> --}}
            </div>
            <div class="swiper we-offer" >
                <div class="swiper-wrapper" id="destinations">
                    <div class="swiper-slide mb-4">
                        <div class="destinations-block">
                            <div class="destinations-figure">
                                <img src="assets/img/travelbrace/accomodation.jpg" class="img-fluid" width="" height="" alt="Destinations">
                            </div>
                            <span class="destinations-title">Accommodations</span>
                        </div>
                    </div>
                    <div class="swiper-slide mb-4">
                        <div class="destinations-block">
                            <div class="destinations-figure">
                                <img src="assets/img/travelbrace/meet-and-greet-2.jpg" class="img-fluid" width="" height="" alt="Destinations">
                            </div>
                            <span class="destinations-title">Meet & Greet</span>
                        </div>
                    </div>
                    <div class="swiper-slide mb-4">
                        <div class="destinations-block">
                            <div class="destinations-figure">
                                <img src="assets/img/travelbrace/hotels.jpg" class="img-fluid" width="" height="" alt="Destinations">
                            </div>
                            <span class="destinations-title">Hotel / Resorts / Palaces & Forts / Camps / Serviced Apartments / Home Stays</span>
                        </div>
                    </div>
                    <div class="swiper-slide mb-4">
                        <div class="destinations-block">
                            <div class="destinations-figure">
                                <img src="assets/img/travelbrace/car-rental.jpg" class="img-fluid" width="" height="" alt="Destinations">
                            </div>
                            <span class="destinations-title">Rental Cars & Couches of all specifications</span>
                        </div>
                    </div>
                    <div class="swiper-slide mb-4">
                        <div class="destinations-block">
                            <div class="destinations-figure">
                                <img src="assets/img/travelbrace/air-ticket.jpg" class="img-fluid" width="" height="" alt="Destinations">
                            </div>
                            <span class="destinations-title">Air/Rail Tickets - Domestic & International (Eurail, Britrail)</span>
                        </div>
                    </div>
                    <div class="swiper-slide mb-4">
                        <div class="destinations-block">
                            <div class="destinations-figure">
                                <img src="assets/img/travelbrace/visa.jpg" class="img-fluid" width="" height="" alt="Destinations">
                            </div>
                            <span class="destinations-title">Visa & immigration Assistance</span>
                        </div>
                    </div>
                    <div class="swiper-slide mb-4">
                        <div class="destinations-block">
                            <div class="destinations-figure">
                                <img src="assets/img/travelbrace/foreign-exchange.jpg" class="img-fluid" width="" height="" alt="Destinations">
                            </div>
                            <span class="destinations-title">Foreign Exchange & Money Transfer</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- Destinations Section End -->
        {{-- We Serve section --}}
        <div class="we-serve pt-3 pb-5">
        <div class="custom-container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="midd-content">
                        <h3>Who We Serve</h3>
                        <p class="text-justify">At Torna Leisures Pvt Ltd, we believe that travel is for everyone. Whether you're a student seeking new experiences, a corporate team looking for team-building opportunities, or a family craving quality time together, we have the perfect itinerary for you. Additionally, we specialize in facilitating MICE (Meetings, Incentive, Conference, and Events) to ensure that your business gatherings are seamless and memorable.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="we-serve-figure">
                        <img src="assets/img/travelbrace/collase-2.jpg" width="" alt="Torna" height="" class="img-fluid rounded" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- We Serve section End --}}
    <!-- What we offer? Section -->
    <div class="destinations pt-2 pb-4">
        <div class="custom-container">
            <div class="site-title pb-3">
                <h2 class="text-center">Our Offerings</h2>
                <p class="text-center">Explore the world seamlessly with our tailored travel experiences.</p>
            </div>
            <div class="swiper we-offer">
                <div class="swiper-wrapper">
                    @if (empty($our_offers))
                        @foreach ($our_offers as $item)
                            <div class="swiper-slide mb-4">
                                <div class="destinations-block">
                                    <img src="{{ url($item->offer_image) }}" class="img-fluid" width="375" height="250"
                                        alt="{!! $item->offer_name !!}">
                                    <span class="destinations-title">{!! $item->offer_name !!}</span>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/Adventure-Holidays.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Adventure Holidays</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/himalayan-hikes.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Himalayan Hikes</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/Mountaineering-Expeditions.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Mountaineering Expeditions</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/drivista1.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Drivista</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/Wild-Life-Tours.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Wild Life Tours</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/Great-Indian-Journeys.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Great Indian Journeys</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/North-East-India.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">North East India</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/Globe-Trotting.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Globe Trotting</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/Educational-Trips-&-Experiential-Programs.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Educational Trips & Experiential Programs</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/Accommodations.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Accommodations</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/Voyages-of-Revelry.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Voyages of Revelry</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/Ladies-Only-Tours.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Ladies Only Tours</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/Senior-Citizens-Programs.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Senior Citizens Programs</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/Transport1.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Transport</span>
                            </div>
                        </div>
                        <div class="swiper-slide mb-4">
                            <div class="destinations-block">
                                <div class="destinations-figure">
                                    <img src="assets/img/travelbrace/visa-assistance.jpg" class="img-fluid" width="" height="" alt="Destinations">
                                </div>
                                <span class="destinations-title mh-auto text-center">Visa, Forex, and Insurance Services</span>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="view-button text-center pt-4">
                <a href="{{ route('destinations') }}">Know more</a>
            </div>
        </div>
    </div>
    <!-- What we offer? Section End -->
    <!-- Our Services  -->
    <section class="our-service pt-2 pb-4">
        <div class="custom-container">
            <div class="site-title pb-3">
                <h2 class="text-center">Why chose us</h2>
            </div>
            <div class="row" id="ourServices">
                <div class="col-md-4 mb-4 col-6">
                    <div class="our-block">
                        <div class="our-block-figure"><i class="fa-solid fa-sliders"></i></div>
                        <div class="our-content">
                            <h4 class="our-title">Personalized Matching</h4>
                            <p class="mb-0">Our unique matching system lets you find just the tour you want for your next holiday</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 col-6">
                    <div class="our-block">
                        <div class="our-block-figure"><i class="fa-solid fa-award"></i></div>
                        <div class="our-content">
                            <h4 class="our-title">Wide Variety of Tours</h4>
                            <p class="mb-0">We offer a wide variety of personally picked tours with destinations all over the globe.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 col-6">
                    <div class="our-block">
                        <div class="our-block-figure"><i class="fa-regular fa-star"></i></div>
                        <div class="our-content">
                            <h4 class="our-title">Highly Qualified Service</h4>
                            <p class="mb-0">Our tour managers are qualified, skilled, and friendly to bring you the best service.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 col-6">
                    <div class="our-block">
                        <div class="our-block-figure"><i class="fa-solid fa-headphones"></i></div>
                        <div class="our-content">
                            <h4 class="our-title">24/7 Support</h4>
                            <p class="mb-0">You can always get professional support from our staff 24/7 and ask any question you have.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 col-6">
                    <div class="our-block">
                        <div class="our-block-figure"><i class="fa-solid fa-fire"></i></div>
                        <div class="our-content">
                            <h4 class="our-title">Handpicked Hotels</h4>
                            <p class="mb-0">Our team offers only the best selection of affordable and luxury hotels to our clients.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 col-6">
                    <div class="our-block">
                        <div class="our-block-figure"><i class="fa-solid fa-wallet"></i></div>
                        <div class="our-content">
                            <h4 class="our-title">Best Price Guarantee</h4>
                            <p class="mb-0">If you find tours that are cheaper than ours, we will compensate the difference.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Services End -->

    {{-- Testimonial Section  --}}
    <section class="testimonial pt-4 pb-2">
        <div class="custom-container">
            <div class="site-title pb-3 mt-4">
                <h2 class="text-center">What our Client Says</h2>
            </div>
            <div class="swiper testimonials mb-5">
                <div class="swiper-wrapper" id="testimonialsData">
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <h3 class="text-center">Client Name</h3>
                            <p class="text-center">Designation</p>
                            <p class="text-center"><i class="fa-solid fa-quote-left"></i> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat itaque laudantium fuga! Officiis libero harum dicta aperiam adipisci neque. Quae, vero. Quibusdam numquam deserunt distinctio fugiat beatae harum repellat sint. Odio assumenda mollitia esse aut eos enim ipsa hic perferendis. <i class="fa-solid fa-quote-right"></i></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <h3 class="text-center">Client Name</h3>
                            <p class="text-center">Designation</p>
                            <p class="text-center"><i class="fa-solid fa-quote-left"></i> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat itaque laudantium fuga! Officiis libero harum dicta aperiam adipisci neque. Quae, vero. Quibusdam numquam deserunt distinctio fugiat beatae harum repellat sint. Odio assumenda mollitia esse aut eos enim ipsa hic perferendis. <i class="fa-solid fa-quote-right"></i></p>
                        </div>
                    </div>
                    {{-- <div class="swiper-slide">
                        <div class="testimonials-block text-center">
                            <img src="./assets/img/indian-male-three.jpg" class="img-fluid" width="150"
                                height="150" alt="Destinations">
                            <span class="testimonials-title">Pradeep</span>
                            <p class="text-justify">highly trained and motivated teams, an exclusive panel of knowledgeable guides.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonials-block text-center">
                            <img src="./assets/img/indian-male-two.jpg" class="img-fluid" width="150" height="150"
                                alt="Destinations">
                            <span class="testimonials-title">Naresh</span>
                            <p class="text-justify">highly trained and motivated teams, an exclusive panel of knowledgeable guides.</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    {{-- Testimonial Section End  --}}
@endsection
@section('script')
    <script>
        let site_url = '{{ url('/') }}';
    </script>
    <script src="js/homePage.js?v=2"></script>
@endsection
