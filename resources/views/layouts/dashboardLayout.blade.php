<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="dashboard/assets/"
  data-template="vertical-menu-template-free"
>
  @include("Dashboard.include.header")

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @include("Dashboard.include.asideMenu")
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->


          @include("Dashboard.include.nav")
          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @yield("content")
            <!-- / Content -->

            <!-- Footer -->
            @include("Dashboard.include.footer")
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

     

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="dashboard/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="dashboard/assets/vendor/libs/popper/popper.js"></script>
    <script src="dashboard/assets/vendor/js/bootstrap.js"></script>
    <script src="dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="dashboard/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="dashboard/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $(document).ready(function(){
        let currentLocation = window.location;
        $(".menu-link").each(function(){
          if($(this).prop("href")==currentLocation){
            $(this).parent().addClass("active");
            
          }
        });
      });
      let success_message = "{{ session('success')}}";
      let error_message = "{{ session('error')}}";
      $(document).ready(function(){
        if(success_message){
          successMessage(success_message);
        }else if(error_message){
          errorMessage(error_message);
        }
      });
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
      function scrollToDiv(id){
        if(id){
          $("html, body").animate({ scrollTop: $("#elementID").offset().top }, "slow");
        }else{
          $("html, body").animate({ scrollTop: 0 }, "slow");
        }        
      }
    </script>
  </body>
  
  
     <!-- include summernote css/js-->
     <script src="{{ asset('dashboard/summernote-0.8.18-dist/summernote-lite.min.js') }}"></script>
     <link href="{{ asset('dashboard/summernote-0.8.18-dist/summernote-lite.min.css') }}" rel="stylesheet">
      
         
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  @yield("script")
</html>
