@extends('layouts.webSite')
@section('title', 'Contact Us')
@section('content')
    <div class="information-page-slider">
        <div class="information-content">
            <h1><a href="{{ url('/') }}">Home</a><span>Contact Us</span></h1>
        </div>
    </div>
    <div id="about">
        <div class="default-content pt-4 pb-5">
            <div class="custom-container">
                <div class="site-title pb-4">
                    <h2 class="text-center">Contact Us</h2>
                </div>
                <!-- Contact Area Strat -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="contact-form-area mb-2">
                            <div class="midd-content section-title mb-3">
                                <h3>Get in touch</h3>
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
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="map-area">
                            <!-- google-map-area start -->
                            <div class="google-map-area mb-20">
                                <!--  Map Section -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.3072791881236!2d77.0411475755514!3d28.590557175687533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1ac5b5855555%3A0x35344351c8fb0b51!2sMalhan%20Plaza!5e0!3m2!1sen!2sin!4v1711104976373!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Area End -->
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
