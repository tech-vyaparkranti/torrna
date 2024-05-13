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
                                    <div class="view-button text-left">
                                        <a href="javascript:void(0)" class="rounded" type="button" data-bs-toggle="modal" data-bs-target="#destinationModal">Enquiry now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/travelbrace/himalayan-hikes.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Mountaineering Expeditions</h3>
                                    <p><b>Ultimate adventure with TORNA.</b> Our expert guides and seasoned climbers lead you to conquer some of the world's most challenging peaks, offering a thrilling blend of adrenaline and achievement. With a strong focus on safety and meticulous planning, we ensure every climber is equipped for success, from beginners to seasoned alpinists. Join us and experience the awe-inspiring beauty of the mountains like never before, as you push your limits and reach new heights with Torna.</p>
                                    <div class="view-button text-left">
                                        <a href="javascript:void(0)" class="rounded" type="button" data-bs-toggle="modal" data-bs-target="#destinationModal">Enquiry now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/travelbrace/Mountaineering-Expeditions.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Drivista</h3>
                                    <p>Unleash your wanderlust on thrilling driving holidays across India and beyond, exploring hidden gems and iconic landmarks alike from the driver's seat of our premium bikes or SUVs. Experience the exhilaration of diverse landscapes, from off-the-beaten-path villages to rugged Himalayan terrain, with expert guides and comfortable camping setups ensuring a seamless journey. Whether you're embarking on a camel safari through Rajasthan's deserts or conquering high altitudes on a Jeep adventure, Drivista promises unforgettable experiences for the road warrior in you. Plus, discover the thrill of overland journeys in overseas destinations, where every turn becomes a new adventure waiting to be explored."</p>
                                    <div class="view-button text-left">
                                        <a href="javascript:void(0)" class="rounded" type="button" data-bs-toggle="modal" data-bs-target="#destinationModal">Enquiry now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/travelbrace/drivista1.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Wild Life Tours</h3>
                                    <p>Extraordinary journey with Torna take you to some of the world's finest wildlife destinations in <b>India, Nepal and Africa.</b> Witness the raw beauty of nature and encounter diverse species in their natural habitats. In India, our tours lead you to renowned sanctuaries such as <b>Ranthambore National Park,</b> home to the majestic Bengal tiger, and <b>Jim Corbett National Park, Rajaji National Parkwhere</b> the elusive leopard roams free. In <b>Africa,</b> experience the awe-inspiring landscapes of <b>Serengeti National Park, Tanzania, and Maasai Mara National Reserve, Kenya,</b> where you can witness the great migration of wildebeests and zebras. Let us guide you on an unforgettable wildlife adventure, where every moment promises to be an encounter with the extraordinary.</p>
                                    <div class="view-button text-left">
                                        <a href="javascript:void(0)" class="rounded" type="button" data-bs-toggle="modal" data-bs-target="#destinationModal">Enquiry now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/travelbrace/rajaji-national-park.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Great Indian Journeys</h3>
                                    <p>Our expertise lies in crafting exceptional adventure tours across <b>Ladakh, Kashmir, Garhwal & Kumaon, Himachal Pradesh, Gujarat, Rajasthan, Kerala, North East India.</b>  Whether you seek the thrill of high-altitude mountaineering or the tranquility of alpine trekking, the Indian Himalayas offer an unparalleled experience. From vibrant birdlife to serene lakes nestled amidst towering peaks, our tours promise an exploration of nature's wonders. As a Delhi-based operator, we boast a complete international standard infrastructure, ensuring seamless travel experiences for our guests.</p>
                                    <div class="view-button text-left">
                                        <a href="javascript:void(0)" class="rounded" type="button" data-bs-toggle="modal" data-bs-target="#destinationModal">Enquiry now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/travelbrace/Great-Indian-Journeys.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Globe Trotting</h3>
                                    <p>Explore the wonders of the world. Our meticulously crafted itineraries invite you to discover the diverse cultures, breathtaking landscapes, and iconic landmarks across the globe. From the ancient wonders of Egypt to the vibrant streets of Tokyo, from the romantic charm of Paris to the awe-inspiring beauty of the Grand Canyon, our tours take you on unforgettable journeys to world-renowned destinations. Let us be your guide as you traverse continents, uncover hidden gems, and create memories that will last a lifetime.</p>
                                    <div class="view-button text-left">
                                        <a href="javascript:void(0)" class="rounded" type="button" data-bs-toggle="modal" data-bs-target="#destinationModal">Enquiry now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/travelbrace/Globe-Trotting.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Educational Trips & Experiential Programs</h3>
                                    <p>TORNA organized programs to help expand young minds of Students. Explore the fascinating world of space exploration with visits to renowned agencies such as <b>NASA, ISRO, SHAR, and ESA.</b> In addition to these enriching experiences, we offer trips to recreational and amusement centers for a fun-filled adventure. Immerse in cultural immersion with visits to villages and foster cross-cultural understanding through interschool exchange programs. Spark curiosity, inspire learning, and create unforgettable memories with Torna Holidays' educational journeys."</p>
                                    <div class="view-button text-left">
                                        <a href="javascript:void(0)" class="rounded" type="button" data-bs-toggle="modal" data-bs-target="#destinationModal">Enquiry now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/travelbrace/Educational-Trips-&-Experiential-Programs.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Accommodations</h3>
                                    <p>Experience a Spectrum of Accommodations with Our Hotel Reservation Services Indulge in a diverse array of lodging options with our comprehensive hotel reservation services. Whether you seek the cozy charm of homestays, the rustic allure of camps, the luxurious amenities of resorts and hotels, the regal ambiance of forts and palaces, the authentic hospitality of village homes, or the convenience of service apartments, we have something to suit every preference and budget. Let us help you find the perfect accommodation for your next adventure.</p>
                                    <div class="view-button text-left">
                                        <a href="javascript:void(0)" class="rounded" type="button" data-bs-toggle="modal" data-bs-target="#destinationModal">Enquiry now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/travelbrace/accomodation1.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Voyages of Revelry</h3>
                                    <p>The ultimate pre-wedding tour through Europe's hottest cities.  Get ready for non-stop fun with VIP club access, scenic river cruises, exquisite dining experiences, live entertainment, adrenaline-pumping activities like bungee jumping, and a relaxing island retreat. Don't miss out on this unforgettable bachelor party adventure – gather your squad and let's make memories to last a lifetime!</p>
                                    <div class="view-button text-left">
                                        <a href="javascript:void(0)" class="rounded" type="button" data-bs-toggle="modal" data-bs-target="#destinationModal">Enquiry now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/travelbrace/Voyages-of-Revelry.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Ladies Only Tours</h3>
                                    <p>Experience the camaraderie of fellow female travelers on our exclusive tours tailored to the interests and preferences of women.</p>
                                    <div class="view-button text-left">
                                        <a href="javascript:void(0)" class="rounded" type="button" data-bs-toggle="modal" data-bs-target="#destinationModal">Enquiry now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/travelbrace/Ladies-Only-Tours.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Senior Citizens Programs</h3>
                                    <p>Embrace the golden years with our specially curated tours catering to the unique needs and interests of senior travelers, ensuring comfort, safety, and unforgettable experiences.</p>
                                    <div class="view-button text-left">
                                        <a href="javascript:void(0)" class="rounded" type="button" data-bs-toggle="modal" data-bs-target="#destinationModal">Enquiry now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/travelbrace/Senior-Citizens-Programs.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Transport</h3>
                                    <p>Begin your journey with comfort and convenience with our comprehensive transportation services. Whether you require the agility of cars, the versatility of SUVs, the spaciousness of mini-vans, or the capacity of coaches, we have a fleet to accommodate your every need. Our vehicles are meticulously maintained to ensure a safe and enjoyable travel experience for you and your companions. Let us take care of the logistics so you can focus on enjoying the ride.</p>
                                    <div class="view-button text-left">
                                        <a href="javascript:void(0)" class="rounded" type="button" data-bs-toggle="modal" data-bs-target="#destinationModal">Enquiry now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/travelbrace/Transport1.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 offerings-container">
                        <div class="offerings-block">
                            <div class="offerings-content">
                                <div class="offerings-content-inner">
                                    <h3>Visa, Forex, and Insurance Services</h3>
                                    <p>Simplify your travel preparations with our comprehensive assistance in visa processing, foreign exchange, and insurance coverage, ensuring a hassle-free journey from start to finish.</p>
                                    <div class="view-button text-left">
                                        <a href="javascript:void(0)" class="rounded" type="button" data-bs-toggle="modal" data-bs-target="#destinationModal">Enquiry now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offerings-figure">
                                <img src="assets/img/travelbrace/visa-assistance.jpg" class="img-fluid rounded" width="" height="" alt="Bikaner" />
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="destinationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
            <div class="contact-form-area mb-2">
                <div class="midd-content section-title mb-3">
                    <h3>Get in touch</h3>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <form enctype="multipart/form-data" method="POST" id="contactUsForm" action="javascript:">
                    @csrf
                    <input type="hidden" name="country_code" value="" id="country_code_id">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="First name" required>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Last name" required>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email ID" required>
                                <div class="invalid-feedback">Please provide a valid Email.</div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="phone_number">Phone</label>
                                <input type="tel" pattern="^[1-9][0-9]*$" class="form-control"
                                    id="phone_numbers" name="phone_number" required>
                                <div class="invalid-feedback">Please provide a valid phone number.</div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" maxlength="1000" minlength="30" required rows="3"></textarea>
                                <div class="invalid-feedback">Please provide a message.</div>
                            </div>
                        </div>
                        <x-input-with-label-element id="captcha" type="text" label="Captcha" name="captcha"
                            required placeholder="Captcha"></x-input-with-label-element>
                        <div class="col-md-8 col-sm-12 mb-3">
                            <div class="row">
                                <div class="col-md-6 pt-4">
                                    <img src="{{ captcha_src() }}" class="img-thumbnail h-100"
                                        id="captcha_img_id">
                                </div>
                                <div class="col-md-6 pt-4 view-button">
                                    <button type="button" class="btn default-btn btn-block font-weight-bold"
                                        onclick="refreshCapthca('captcha_img_id','captcha')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                        </svg>
                                        Refresh
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" value="" id="tnc"
                                    required>
                                <label class="form-check-label" for="tnc">Agree to terms and
                                    conditions</label>
                                <div class="invalid-feedback">You must agree before submitting.</div>
                            </div>
                        </div>
                    </div>
                    <div class="view-button">
                        <button class="default-btn" id="submitButton" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
        $("#contactUsForm").on("submit", function() {
            var form = new FormData(this);

            $("#submitButton").attr("disable", true);
            $.ajax({
                type: 'post',
                url: '{{ route('saveContactUsDetails') }}',
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        successMessage(response.message, true);
                    } else {
                        errorMessage(response.message ?? "Something went wrong.");
                        $("#submitButton").attr("disable", false);
                        refreshCapthca('captcha_img_id', 'captcha');
                    }
                },
                failure: function(response) {
                    errorMessage(response.message ?? "Something went wrong.");
                    $("#submitButton").attr("disable", false);
                    refreshCapthca('captcha_img_id', 'captcha');
                },
                error: function(response) {
                    errorMessage(response.message ?? "Something went wrong.");
                    $("#submitButton").attr("disable", false);
                    refreshCapthca('captcha_img_id', 'captcha');
                }
            });
        });
        // var phone_number = window.intlTelInput(document.querySelector("#phone_number"), {
        //     separateDialCode: true,
        //     preferredCountries: ["in"],
        //     hiddenInput: "full",
        //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        // });
    </script>
@endsection
