{{-- <div class="sticky-navigation">
    <div class="custom-container"><div class="gtranslate_wrapper"></div></div>
</div> --}}
<!-- Header section Start -->
<header class="main-header">    
    <div class="header-contaner">
        <div class="logo-section">
            <div class="mobile-bars" hidden></div>
            <a href="{{ url('/') }}" aria-level="Main logo"><img src="./assets/img/logo.png" class="img-fluid" width="120" height="86" alt="Torna Holidays Pvt Ltd"></a>
        </div>
        <div class="slide-navigation">
            <div class="navbar-wrapper">
                <ul class="navbar-block">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="dropdown-list"><a href="{{ route('aboutUs') }}">About Us</a>
                        <i class="drop-plus" hidden></i>
                        <ul class="sublist">
                            <li><a href="{{ route('aboutUs') }}#our-sec">Our Teams</a></li>
                            <li><a href="{{ route('aboutUs') }}#reco-sec">Recognitions</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('destinations') }}">Our Offerings</a></li>
                    <li><a href="{{ route('galleryPages') }}">Gallery</a></li>
                    <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
                </ul>
            </div>
            <ul class="social-media">
                <li><a href="/" aria-label="Read more about Torna Holidays Pvt Ltd facebook"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="/" aria-label="Read more about Torna Holidays Pvt Ltd Twitter"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="/" aria-label="Read more about Torna Holidays Pvt Ltd Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="/" aria-label="Read more about Torna Holidays Pvt Ltd WhatsApp"><i class="fa-brands fa-whatsapp"></i></a></li>
            </ul>
        </div>
    </div>
</header>
<!-- Header section end -->
<style>
    /* Navigation bar dropdown */
.sublist {visibility: hidden;opacity: 0;position: absolute;z-index: 1;background-color: #fff;width: 200px;box-shadow: var(--box-shadow);border-radius: 4px;top: 130%;transition: var(--transition);}
ul.sublist.active-list {visibility: visible;opacity: 1;}
.header-contaner ul.sublist li {display: block;padding: 0px 0px;position: relative;margin: auto 0;}
ul.sublist ul.sublist {left: 100%;top: 0;margin: 0 0;}
.sublist li.dropdown-list:after,li.dropdown-list:after {content: '\f107';font-family: 'FontAwesome';transition: var(--transition);}
.sublist li.dropdown-list:after {position: absolute;right: 10px;top: 8px;}
.sublist li.dropdown-list:hover:after{transform: rotate(-90deg);}
li.dropdown-list:hover:after{transform: rotate(-90deg);}
.header-contaner ul.sublist li a {
    display: flex;
    padding: 2px 15px 2px 10px;
    margin: 0 0;
    height: auto;
    line-height: normal;
    border-top: 1px solid lightgray;
    min-height: 40px;
    align-items: center;
}
/* .header-contaner ul.sublist li a:hover {background-color: rgb(var(--gold-bg));} */
@media (max-width: 768px){
    ul.sublist{background: transparent}
    .header-contaner ul.sublist li a{display: block; line-height: 40px}
    .sublist li.dropdown-list:after, li.dropdown-list:after{display: none;}
    .header-contaner ul:not(.social-media) li:before{display: none;}
    i.drop-plus {display: block !important;position: absolute;right: 10px;top: 10px;height: 25px;width: 25px;text-align: center;line-height: 20px;color: #fff;font-weight: 700;font-size: 28px;padding: 0px 0;background-color: transparent;}
    .sublist {position: relative;display: none;width: 100%;top: 100%;margin: 10px 0 0 !important;transition: var(--transition);}
    ul.sublist ul.sublist{left: 0 !important;margin: 0 0 !important}
    .sublist li.dropdown-list:after{display: none;}
    ul.sublist.active {display: block;opacity: 1;visibility: visible;}
}
@media (min-width: 768px){
    li.dropdown-list:hover > ul.sublist, li.dropdown-list:hover ul.sublist > ul.sublist , ul.sublist.active-list {visibility: visible;opacity: 1;}
}
/* Navigation bar dropdown End */
</style>
<script>
// Navigation bar dropdown
document.addEventListener('DOMContentLoaded', () => {
    // Code here runs after DOM content is fully loaded
    const dropdowns = document.querySelectorAll('.dropdown-list');
    dropdowns.forEach(dropdown => {
        const toggleBtn = dropdown.querySelector('.drop-plus');
        const sublist = dropdown.querySelector('.sublist');
        dropdown.addEventListener("mouseover", (event) => {
            const isDropdown = event.currentTarget === event.target;
            if (isDropdown) {
                sublist.classList.add('active-list');
            }
        });
        dropdown.addEventListener("mouseleave", () => {
            sublist.classList.remove('active-list');
        });
        if (toggleBtn && sublist) {
            toggleBtn.addEventListener('click', (event) => {
                sublist.classList.toggle('active');
                toggleBtn.textContent = sublist.classList.contains('active') ? '-' : '+';
                event.stopPropagation(); // Prevent event from bubbling up
            });
        } else {
            console.error('Toggle button or sublist not found in dropdown:', dropdown);
        }
        // Close dropdown when clicking outside
        document.addEventListener('click', () => {
            if (sublist) {
                sublist.classList.remove('active');
                toggleBtn.textContent = '+';
            }
        });
        // Prevent closing dropdown when clicking inside
        dropdown.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    });
});
// Navigation bar dropdown End

</script>