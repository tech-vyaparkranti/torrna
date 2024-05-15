@extends('layouts.webSite')
@section('title', 'About Us')
@section('content')
<div class="information-page-slider">
    <div class="information-content">
        <h1><a href="{{ url('/') }}">Home</a><span>About Us</span></h1>
    </div>
</div>
<div id="about">
    <div class="default-content pt-5 pb-3">
        <div class="custom-container">
            <div class="site-title pb-3">
                <h2 class="text-center">About Torna Leisures Pvt Ltd Services</h2>
            </div>
            <div class="midd-content">
                <p class="text-justify">Established in 1994, <b>Torna Leisures Pvt Ltd </b> has been a stalwart in the tourism industry, dedicated to creating memorable experiences for travelers worldwide. Specializing in both domestic and international tours, we cater to a diverse range of tourism segments, including adventure, leisure, cultural exploration, educational trips, cruise holidays, bike expeditions, camping excursions, and hikes. With a commitment to excellence and a passion for exploration, we have become synonymous with exceptional travel experiences tailored to suit every traveler's preferences.</p> 
                <p class="text-justify">As your one-stop destination for all travel solutions, we offer a comprehensive range of services to cater to your every need. From booking flights and accommodations to arranging transportation, handling forex transactions, securing visas, and providing insurance coverage, we take care of every detail so you can focus on making the most of your journey.</p>

                <h3>Our Philosophy:</h3>
                <p class="text-justify"><b>"Pro Bono Publico"</b> guides our mission to promote tourism for the public good while preserving India's natural beauty, cultural heritage, and ecological balance. We believe that tourism should not only enrich the traveler but also contribute positively to the communities and environments visited. Upholding this ethos, we continually strive to enhance the quality of our services while maintaining fair pricing for our customers.</p>
                <div class="site-title pt-2" id="our-sec">
                    <h2 class="text-left">Our Team</h2>
                </div>
                <div class="our-teams">
                    <div class="about-our-team">
                        <div class="about-our-item about-our-item-left">
                            <img src="assets/img/torna/managing-director.jpg" alt="team-01" height="200" width="200">
                        </div>
                        <div class="about-our-item about-our-item-right">
                            <h5>Managing Director</h5>
                            <h6>Major Satnam Singh</h6>
                            <i>Our dream for Torna will be bigger, Our ambition higher, Our commitment deeper &amp; So will be our achievement.</i>
                            <p class="text-justify">Profile Dummmy Content consectetur adipisicing elit. Expedita, odio consectetur. Aliquam error sed tempora mollitia illum corporis impedit eaque veniam vitae praesentium cumque minima unde, aperiam ipsa odit et voluptatibus sunt tempore, accusantium delectus laborum nihil vel molestiae sint.</p>
                        </div>
                    </div>
                    <div class="about-our-team">
                        <div class="about-our-item about-our-item-left">
                            <img src="assets/img/torna/jaspreet.jpg" alt="team-02" height="200" width="200">
                        </div>
                        <div class="about-our-item about-our-item-right">
                            <h5>Business Head</h5>
                            <h6>Jaipreet Kaur</h6>
                            <i>Our dream for Torna will be bigger, Our ambition higher, Our commitment deeper &amp; So will be our achievement.</i>
                            <p class="text-justify">Profile Dummmy Content consectetur adipisicing elit. Expedita, odio consectetur. Aliquam error sed tempora mollitia illum corporis impedit eaque veniam vitae praesentium cumque minima unde, aperiam ipsa odit et voluptatibus sunt tempore, accusantium delectus laborum nihil vel molestiae sint.</p>
                        </div>
                    </div>
                </div>
                <p class="text-justify"><b>At Torna Leisures Pvt Ltd, we invite you to embark on a journey of discovery, where every experience is crafted with care and passion. Let us be your guide to the wonders of India.</b></p>

                <img src="assets/img/logo.png" width="100" height="" class="img-fluid mb-2" style="width: 100px;" />
                <span><b>AN ICE AXE</b> - Symbolize our spirit to <i>Either Find Ways Or Make One.</i></span><br><br>
                <div class="table-block" id="reco-sec">
                    <div class="table-item">
                        <label>Welcome to Torna Leisures Pvt Ltd </label>
                    </div>
                    <div class="table-item">
                        <label>Your Gateway to Unforgettable Journeys**</label>
                    </div>
                    <div class="table-item">
                        <label>Exploring the World Since 1994</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.table-block {
    display: flex;
    grid-gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 1.5rem;
}
.table-block > .table-item {
    width: max(calc(100% / 3 - 8px), 300px);
    text-align: center;
    border: 1px solid lightgray;
}
.table-block > .table-item label {
    font: 500 16px/normal var(--monster-font);
    margin: 10px 5px 10px;
}
</style>
@endsection