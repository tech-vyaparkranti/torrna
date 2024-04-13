$(document).ready(function () {
    homePageDestinations();
    homePageServices();
    testimonials();

    
});
function homePageDestinations(){
    $.ajax({
        type: 'get',
        url: 'get-home-page-dd',
        data: {
        },
        success: function (response) {
            if (response.length) {
                let data = "";
                response.forEach(element => {
                    data += '<div class="swiper-slide mb-4">' +
                        '<div class="destinations-block">' +
                        '<img src="' + site_url + element.destination_image + '" class="img-fluid" width="" height="" alt="' + element.destination_name + '">' +
                        '<span class="destinations-title">' + element.destination_name + '</span>' +
                        '</div>' +
                        '</div>';
                });
                if (data) {
                    $("#destinations").html(data);
                }
            }
        },
        failure: function (response) {

        }
    });
}
function homePageServices(){
    $.ajax({
        type: 'get',
        url: 'get-home-page-services',
        data: {
        },
        success: function (response) {
            if (response.length) {
                let data = "";
                response.forEach(element => {
                    data +=
                        '<div class="col-md-4 mb-4">' +
                        '<div class="our-block">' +
                        '<div class="our-block-figure">' +
                        '<i class="fs-2 ' + element.service_icon + '"></i>' +
                        '</div>' +
                        '<div class="our-content">' +
                        '<h4 class="our-title">' + element.service_name + '</h4>' +
                        '<p class="mb-0">' + element.service_details + '</p>' +
                        '</div>' +
                        '</div >' +
                        '</div >';
                });
                if (data) {
                    $("#ourServices").html(data);
                }
            }
        },
        failure: function (response) {

        }
    });
}
function testimonials(){
    $.ajax({
        type: 'get',
        url: 'get-testimonials-home-page',
        data: {
        },
        success: function (response) {
            if (response.length) {
                let data = "";
                response.forEach(element => {
                    data +=
                        '<div class="swiper-slide">'+
                        '<div class="testimonials-block text-center">'+
                        '<img src="'+element.client_image+'" class="img-fluid" width="150" height="150" alt="Client Image">'+
                            '<span class="testimonials-title">'+element.client_name+'</span>'+
                            '<p>'+element.review_text+'</p>'+
                            '</div>'+
                            '</div>';
                });
                if (data) {
                    $("#testimonialsData").html(data);
                }
            }
        },
        failure: function (response) {

        }
    });
}