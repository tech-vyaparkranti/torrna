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
                    <div class="about-our-team d-flex align-items-top  col-sm-12 col-12">
                        <div class="about-our-item about-our-item-left">
                            <img src="assets/img/torna/managing-director.jpg" alt="team-01" height="200" width="200">
                        </div>
                        <div class="about-our-item about-our-item-right  col-sm-12 col-12">
                            <h5>Managing Director</h5>
                            <h6>Major Satnam Singh</h6>
                            <i>Our dream for Torna will be bigger, Our ambition higher, Our commitment deeper &amp; So will be our achievement.</i>
                            {{-- <p class="text-justify">Profile Dummmy Content consectetur adipisicing elit. Expedita, odio consectetur. Aliquam error sed tempora mollitia illum corporis impedit eaque veniam vitae praesentium cumque minima unde, aperiam ipsa odit et voluptatibus sunt tempore, accusantium delectus laborum nihil vel molestiae sint.</p> --}}
                        </div>
                    </div>
                    <div class="about-our-team d-flex align-items-top">
                        <div class="about-our-item about-our-item-left  col-sm-12 col-12">
                            <img src="assets/img/torna/jaspreet.jpg" alt="team-02" height="200" width="200">
                        </div>
                        <div class="about-our-item about-our-item-right  col-sm-12 col-12">
                            <h5>Business Head</h5>
                            <h6>Jaipreet Kaur</h6>
                            {{-- <i>Our dream for Torna will be bigger, Our ambition higher, Our commitment deeper &amp; So will be our achievement.</i> --}}
                            <p class="text-justify">Mrs. Jaipreet Kaur, the Business Head of Rammy International Tours, is a seasoned professional with a rich background in the travel industry. A graduate from Guru Nanak Dev University (GNDU) in Punjab, Mrs. Kaur has been a pivotal figure in the travel sector since co-founding TORNA HOLIDAYS in 1994.</p>
                            <p class="text-justify">Her expertise and leadership have been instrumental in shaping the diverse offerings of Rammy
                                International Tours. Mrs. Kaur has been at the helm of numerous successful travel products, including
                                the unique "Trip to NASA," and specialized packages like the "Royal Indian Wedding". She has also
                                managed and executed a wide range of group tours to destinations such as Sri Lanka, Europe, Australia,
                                New Zealand, Kashmir, Ladakh, the Andamans, Kerala, Goa, Rajathan, North East and many more.</p>
                            <p class="text-justify">Mrs. Kaur's approach to business is characterized by her commitment to operational excellence. She
                                meticulously oversees every detail of the company’s operations, striving for zero errors and ensuring
                                that each tour is executed with the precision and excellence akin to military standards. Her dedication to
                                these principles has significantly contributed to the company's reputation for delivering high-quality
                                travel experiences.</p>
                        </div>
                    </div>
                    <div class="about-our-team d-flex align-items-top">
                        <div class="about-our-item about-our-item-left col-sm-12 col-12">
                            <img src="assets/img/torna/Ramnik-Kaur.jpg" alt="team-02" height="200" width="200">
                        </div>
                        <div class="about-our-item about-our-item-right col-sm-12 col-12">
                            <h5>Operation Head</h5>
                            <h6>Ramnik Kaur</h6>
                            {{-- <i>Our dream for Torna will be bigger, Our ambition higher, Our commitment deeper &amp; So will be our achievement.</i> --}}
                            <p class="text-justify">Ramnik is a highly skilled professional specializing in social media marketing and product curation. She holds a degree from Vivekanand University in Delhi and a postgraduate qualification in Digital Marketing
                            and Advanced Advertising from St. Xavier's University in Bombay.</p>
                            <p class="text-justify">In her current role, Ramnik is responsible for overseeing the social media marketing efforts of her company, leveraging her expertise to enhance online presence and engagement. Her keen
                            understanding of digital trends and innovative advertising strategies ensures that the company’s
                            marketing campaigns are both effective and cutting-edge.</p>
                            <p class="text-justify">Additionally, Ramnik excels in curating products, meticulously crafting offerings that resonate with the target audience. Her ability to combine creative insight with analytical precision makes her an invaluable asset in driving the company’s marketing initiatives forward.</p>
                        </div>
                    </div>
                    <div class="about-our-team d-flex align-items-top">
                        <div class="about-our-item about-our-item-left  col-sm-12 col-12">
                            <img src="assets/img/torna/Avneet-Kaur.jpg" alt="team-02" height="200" width="200">
                        </div>
                        <div class="about-our-item about-our-item-right  col-sm-12 col-12">
                            <h5>Marketing Head</h5>
                            <h6>Avneet Kaur</h6>
                            {{-- <i>Our dream for Torna will be bigger, Our ambition higher, Our commitment deeper &amp; So will be our achievement.</i> --}}
                            <p class="text-justify">Avneet Kaur is a distinguished professional in the travel and startup sectors. She is a graduate of Delhi University and holds an IATA qualification, underscoring her expertise in the aviation and travel
                            industries. Avneet has gained valuable experience through her roles at British Airways, Expedia, and
                            Amadeus, where she developed a comprehensive understanding of global travel operations.</p>
                            <p class="text-justify">Currently, Avneet oversees the operations of her company, ensuring seamless and efficient
                                management of travel services. Her extensive travel experience enriches her professional insights,
                                allowing her to cater to a diverse clientele with precision.</p>
                            <p class="text-justify">In addition to her role in travel operations, Avneet is now based in Doha, where she works as an Investor
                                Relations and Startup Community Manager with Startup Grind Qatar. She has also formed a partnership
                                with Founders Majlis, furthering her involvement in the startup ecosystem. Through these roles, Avneet
                                supports and nurtures entrepreneurial ventures, fostering innovation and collaboration within the
                                startup community.</p>
                            <p class="text-justify">Avneet is renowned for her dexterity in handling clientele with utmost professionalism and courtesy.
                                Her exceptional interpersonal skills and commitment to client satisfaction ensure that every interaction
                                is handled with the highest degree of respect and efficiency, making her a valued asset in any team she
                                is part of.</p>
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