@extends('layouts.webSite')
@section('title', 'Our Offerings')
@section('content')
<div class="information-page-slider">
    <div class="information-content">
        <h1><a href="{{ url('/') }}">Home</a><span>Our Offerings</span></h1>
    </div>
</div>
<div id="about">
    <div class="default-content pt-5 pb-3">
        <div class="custom-container">
            <div class="site-title pb-3">
                <h2 class="text-center">Adventure Holidays</h2>
                <p class="text-center pb-3">From basic treks to high-altitude mountaineering expeditions, we cater to adventurers of all levels.</p>
            </div>
            <div class="midd-content">
                <div class="row">
                    @if(empty($destinations))
                    @foreach ($destinations as $item)
                    <div class="col-md-4 mb-4">
                        <div class="destinations-block">
                            <img src="{{url( $item->destination_image )}}" class="img-fluid" width="" height="" alt="{!! $item->destination_name !!}">
                            <span class="destinations-title">{!! $item->destination_name !!}</span>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Himalyan Hikes</h3>
                                    <p><b>Immerse yourself in the local culture and scenery with our guided hikes through the majestic Himalayas.</b> You'll experience the rhythm of adventure and rediscovery amidst the majestic Himalayas. With top-notch equipment, experienced guides, reliable backup support, and a steadfast commitment to the safety and security of adventure seekers, we ensure every detail is meticulously planned for your expedition. Whether you're trekking through breathtaking landscapes, conquering challenging trails, or simply immersing yourself in the tranquility of nature, our tailored adventures guarantee an unforgettable odyssey. Join us and unleash your spirit of exploration in the heart of the Himalayas!</p>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/torna/action-america-architecture-378570-1-scaled-400x400.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Mountaineering Expeditions</h3>
                                    <p><b>Ultimate adventure with TORNA.</b> Our expert guides and seasoned climbers lead you to conquer some of the world's most challenging peaks, offering a thrilling blend of adrenaline and achievement. With a strong focus on safety and meticulous planning, we ensure every climber is equipped for success, from beginners to seasoned alpinists. Join us and experience the awe-inspiring beauty of the mountains like never before, as you push your limits and reach new heights with Torna.</p>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/torna/Africa-desktop-wallpapers-HD-400x400.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Drivista</h3>
                                    <p>Unleash your wanderlust on thrilling driving holidays across India and beyond, exploring hidden gems and iconic landmarks alike from the driver's seat of our premium bikes or SUVs. Experience the exhilaration of diverse landscapes, from off-the-beaten-path villages to rugged Himalayan terrain, with expert guides and comfortable camping setups ensuring a seamless journey. Whether you're embarking on a camel safari through Rajasthan's deserts or conquering high altitudes on a Jeep adventure, Drivista promises unforgettable experiences for the road warrior in you. Plus, discover the thrill of overland journeys in overseas destinations, where every turn becomes a new adventure waiting to be explored."</p>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/torna/america-architecture-blue-sky-1239162-1-scaled-400x400.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Wild Life Tours</h3>
                                    <p>Extraordinary journey with Torna take you to some of the world's finest wildlife destinations in <b>India, Nepal and Africa.</b> Witness the raw beauty of nature and encounter diverse species in their natural habitats. In India, our tours lead you to renowned sanctuaries such as <b>Ranthambore National Park,</b> home to the majestic Bengal tiger, and <b>Jim Corbett National Park, Rajaji National Parkwhere</b> the elusive leopard roams free. In <b>Africa,</b> experience the awe-inspiring landscapes of <b>Serengeti National Park, Tanzania, and Maasai Mara National Reserve, Kenya,</b> where you can witness the great migration of wildebeests and zebras. Let us guide you on an unforgettable wildlife adventure, where every moment promises to be an encounter with the extraordinary.</p>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="https://dummyimage.com/300x300/d1d1d1/fff" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Great Indian Journeys</h3>
                                    <p>Our expertise lies in crafting exceptional adventure tours across <b>Ladakh, Kashmir, Garhwal & Kumaon, Himachal Pradesh, Gujarat, Rajasthan, Kerala, North East India.</b>  Whether you seek the thrill of high-altitude mountaineering or the tranquility of alpine trekking, the Indian Himalayas offer an unparalleled experience. From vibrant birdlife to serene lakes nestled amidst towering peaks, our tours promise an exploration of nature's wonders. As a Delhi-based operator, we boast a complete international standard infrastructure, ensuring seamless travel experiences for our guests.</p>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="https://dummyimage.com/300x300/d1d1d1/fff" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Globe Trotting</h3>
                                    <p>Explore the wonders of the world. Our meticulously crafted itineraries invite you to discover the diverse cultures, breathtaking landscapes, and iconic landmarks across the globe. From the ancient wonders of Egypt to the vibrant streets of Tokyo, from the romantic charm of Paris to the awe-inspiring beauty of the Grand Canyon, our tours take you on unforgettable journeys to world-renowned destinations. Let us be your guide as you traverse continents, uncover hidden gems, and create memories that will last a lifetime.</p>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="https://dummyimage.com/300x300/d1d1d1/fff" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Educational Trips & Experiential Programs</h3>
                                    <p>TORNA organized programs to help expand young minds of Students. Explore the fascinating world of space exploration with visits to renowned agencies such as <b>NASA, ISRO, SHAR, and ESA.</b> In addition to these enriching experiences, we offer trips to recreational and amusement centers for a fun-filled adventure. Immerse in cultural immersion with visits to villages and foster cross-cultural understanding through interschool exchange programs. Spark curiosity, inspire learning, and create unforgettable memories with Torna Holidays' educational journeys."</p>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="https://dummyimage.com/300x300/d1d1d1/fff" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Accommodations</h3>
                                    <p>Experience a Spectrum of Accommodations with Our Hotel Reservation Services Indulge in a diverse array of lodging options with our comprehensive hotel reservation services. Whether you seek the cozy charm of homestays, the rustic allure of camps, the luxurious amenities of resorts and hotels, the regal ambiance of forts and palaces, the authentic hospitality of village homes, or the convenience of service apartments, we have something to suit every preference and budget. Let us help you find the perfect accommodation for your next adventure.</p>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="https://dummyimage.com/300x300/d1d1d1/fff" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Voyages of Revelry</h3>
                                    <p>The ultimate pre-wedding tour through Europe's hottest cities.  Get ready for non-stop fun with VIP club access, scenic river cruises, exquisite dining experiences, live entertainment, adrenaline-pumping activities like bungee jumping, and a relaxing island retreat. Don't miss out on this unforgettable bachelor party adventure – gather your squad and let's make memories to last a lifetime!</p>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="https://dummyimage.com/300x300/d1d1d1/fff" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Ladies Only Tours</h3>
                                    <p>Experience the camaraderie of fellow female travelers on our exclusive tours tailored to the interests and preferences of women.</p>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="https://dummyimage.com/300x300/d1d1d1/fff" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Senior Citizens Programs</h3>
                                    <p>Embrace the golden years with our specially curated tours catering to the unique needs and interests of senior travelers, ensuring comfort, safety, and unforgettable experiences.</p>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="https://dummyimage.com/300x300/d1d1d1/fff" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Transport</h3>
                                    <p>Begin your journey with comfort and convenience with our comprehensive transportation services. Whether you require the agility of cars, the versatility of SUVs, the spaciousness of mini-vans, or the capacity of coaches, we have a fleet to accommodate your every need. Our vehicles are meticulously maintained to ensure a safe and enjoyable travel experience for you and your companions. Let us take care of the logistics so you can focus on enjoying the ride.</p>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="https://dummyimage.com/300x300/d1d1d1/fff" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Visa, Forex, and Insurance Services</h3>
                                    <p>Simplify your travel preparations with our comprehensive assistance in visa processing, foreign exchange, and insurance coverage, ensuring a hassle-free journey from start to finish.</p>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="https://dummyimage.com/300x300/d1d1d1/fff" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection