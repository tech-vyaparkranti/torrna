@extends('layouts.webSite')
@section('title', 'Gallery')
@section('content')
<div class="information-page-slider">
    <div class="information-content">
        <h1><a href="{{ url('/') }}">Home</a><span>Gallery</span></h1>
    </div>
</div>
<div id="about">
    <div class="default-content pt-4 pb-5">
        <div class="custom-container">
            <div class="site-title pb-4">
                <h2 class="text-center">Glimpse of Happiness</h2>
            </div>
            <div class="shuffle_wrapper text-center pt-3 pb-4 d-none">
                <button class="default-btn" id='all'><span>All</span></button>
                @if (isset($filter_category))
                    @foreach ($filter_category as $item)
                    <button class="default-btn filter" data-filter_category="{{ $item->filter_category }}" ><span>{{ $item->filter_category }}</span></button>
                    @endforeach
                    @else
                    <button class="default-btn" id='btn-travel'><span>Travel</span></button>
                    <button class="default-btn" id='btn-travel_one'><span>Travel One</span></button>
                @endif
                
            </div>
            <div class="row my-shuffle-container">
                @if (empty($galleryImages)) 
                @foreach ($galleryImages as $item)
                <div class="mb-3 col-md-4 col-sm-6 picture-item" data-groups='["{!!  $item->filter_category !!}"]'><img src="{{ $item->local_image?url($item->local_image):$item->image_link}}" class="img-fluid" width="" height="" alt="Destinations"></div>
                @endforeach
    
            @else
                <div class="mb-3 col-md-4 col-sm-6 picture-item" data-groups='["travel"]'>
                    <img src="assets/img/torna/tehri-garhwal-rishikesh-149362424074-orijgp-400x400.jpg" class="img-fluid" width="" height="" alt="Destinations">
                </div>
                <div class="mb-3 col-md-4 col-sm-6 picture-item" data-groups='["travel"]'>
                    <img src="assets/img/torna/the-couple-traveller.jpg" class="img-fluid" width="" height="" alt="Destinations">
                </div>
                <div class="mb-3 col-md-4 col-sm-6 picture-item" data-groups='["travel_one"]'>
                    <img src="assets/img/torna/action-america-architecture-378570-1-scaled-400x400.jpg" class="img-fluid" width="" height="" alt="Destinations">
                </div>
                <div class="mb-3 col-md-4 col-sm-6 picture-item" data-groups='["travel_one"]'>
                    <img src="assets/img/torna/Africa-desktop-wallpapers-HD-400x400.jpg" class="img-fluid" width="" height="" alt="Destinations">
                </div>
                <div class="mb-3 col-md-4 col-sm-6 picture-item" data-groups='["travel_one"]'>
                    <img src="assets/img/torna/america-architecture-blue-sky-1239162-1-scaled-400x400.jpg" class="img-fluid" width="" height="" alt="Destinations">
                </div>
                <div class="mb-3 col-md-4 col-sm-6 picture-item" data-groups='["travel_one"]'>
                    <img src="assets/img/torna/copenhagen-3966079_1920-400x400.jpg" class="img-fluid" width="" height="" alt="Destinations">
                </div>
                <div class="mb-3 col-md-4 col-sm-6 picture-item" data-groups='["travel_one"]'>
                    <img src="assets/img/torna/destination-bangalore-south-india-400x400.jpg" class="img-fluid" width="" height="" alt="Destinations">
                </div>
                <div class="mb-3 col-md-4 col-sm-6 picture-item" data-groups='["travel_one"]'>
                    <img src="assets/img/torna/metro-3714296_1920-1-400x400.jpg" class="img-fluid" width="" height="" alt="Destinations">
                </div>
                <div class="mb-3 col-md-4 col-sm-6 picture-item" data-groups='["travel_one"]'>
                    <img src="assets/img/torna/MSC-Divina-cruise-ship-in-Dubrovnik-400x400.jpg" class="img-fluid" width="" height="" alt="Destinations">
                </div>
                <div class="mb-3 col-md-4 col-sm-6 picture-item" data-groups='["travel_one"]'>
                    <img src="assets/img/torna/tehri-garhwal-rishikesh-149362424074-orijgp-400x400.jpg" class="img-fluid" width="" height="" alt="Destinations">
                </div>
                <div class="col-1@sm my-sizer-element"></div>
            @endif
                
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery-1.12.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/6.1.0/shuffle.min.js"></script>
<script>
var gallary_page = window.location.pathname;
var split_name = gallary_page.split("/").pop();
const getpage = () => {
    var Shuffle = window.Shuffle;
    var element = document.querySelector('.my-shuffle-container');
    var sizer = element.querySelector('.my-sizer-element');
    var shuffleInstance = new Shuffle(element, {
        itemSelector: '.picture-item'
    });
    // shuffleInstance.filter('animal');
    $("#all").on("click", function () {
        shuffleInstance.filter();
    });
    $("#btn-travel").on("click", function () {
        shuffleInstance.filter('travel');
    });
    $("#btn-travel_one").on("click", function () {
        shuffleInstance.filter('travel_one');
    });
    $(".filter").on("click", function () {
        let filterData = $(this).data("filter_category");
        shuffleInstance.filter(filterData);
    });
}
if(split_name == 'gallery'){
    getpage();
}
</script>
@endsection