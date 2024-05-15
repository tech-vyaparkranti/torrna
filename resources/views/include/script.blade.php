<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
{{-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --}}
<script>window.gtranslateSettings = {"default_language":"en","languages":["en","de","es","ru","it","fr"],"wrapper_selector":".gtranslate_wrapper","flag_size":16,"flag_style":"3d"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/fn.js" defer></script>
<a class="footer-whatsapp" aria-label="Whatsapp Button" href="https://whatsapp.com/channel/0029Va7Teqj2ZjChEkCiU00a"><img src="./assets/img/whatsapp.png" alt="Whatsapp" class="img-fluid" height="" width="150"></a>
<a class="footer-whatsapp footer-call" aria-label="Phone Call Button" href="tel:+918447979902"><img src="./assets/img/phone-call.png" alt="Phone Call" class="img-fluid" height="" width="150"></a>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset("dashboard/assets/js/website.js")}}"></script>
<script>
function successMessage(success_message,reload=false){
Swal.fire({
    icon: 'success',
    title: 'Success',
    text: success_message
  }).then(function(){
      if (reload) {
      window.location.reload();
    }
  });
}
function errorMessage(error_message){
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: error_message             
  });
}
$(function() {
    $(window).on('scroll', function () {
		if ($(window).scrollTop() > 150) {
			$('.main-header').addClass('fixed-header');
		} else {
			$('.main-header').removeClass('fixed-header');
		}
	});
});
var togglemenu = document.querySelector('.mobile-bars');
togglemenu.addEventListener("click", function(){
	document.body.classList.toggle('open-menu');
})
var swiper = new Swiper(".main-slider", {
  spaceBetween: 30,
  effect: "fade",
  loop: true,
  autoplay: {
    delay: 4500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  zoom: {
      maxRatio: 1.2,
      minRation: 1
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
var swiper = new Swiper(".we-offer", {
  spaceBetween: 10,
  // effect: "fade",
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  zoom: {
      maxRatio: 1.2,
      minRation: 1
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    480: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
  },
});
var swiper = new Swiper(".testimonials", {
  spaceBetween: 30,
  // effect: "fade",
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  zoom: {
      maxRatio: 1.2,
      minRation: 1
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    480: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    640: {
      slidesPerView: 1,
      spaceBetween: 15,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 1,
      spaceBetween: 30,
    },
  },
});
var swiper = new Swiper(".recognitions-self", {
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    280: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    460: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    640: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 5,
      spaceBetween: 10,
    },
  },
});
</script>