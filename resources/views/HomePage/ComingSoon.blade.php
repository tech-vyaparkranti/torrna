<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comming Soon</title>
</head>
<body>
 <!-- PRELOADER -->
 <div class="preloader">
       
    <!-- SPINNER -->
    <div class="spinner">
     
      <div class="bounce-1"></div>
      <div class="bounce-2"></div>
      <div class="bounce-3"></div>
      
    </div>
    <!-- /SPINNER -->
    
</div>
<!-- /PRELOADER -->    <!-- navigation -->

<!-- end navigation -->
    <div class="hero"><br><br>
    <div class="front-content text-center">
        <div class="container-mid">
            <img class="img-responsive logo" style="width: 100%;max-width: 400px;" src="assets/img/comming-soon.png" alt="image">
            <h1>We're Coming Soon..</h1>
            <p class="subline">We're working on our new website. <a href="{{ url('/') }}"><i class="fa fa-link"></i>&nbsp;Return to Home</a></p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Torna Holidays Pvt Ltd | Design by <a href="https://vyaparkranti.com">Vyapar Kranti</a></p>
        </div>
        <!-- /FOOTER -->
    </div>
</div>
<style>

@import url("https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800&amp;display=swap");
.hero {
font-family: jost;
background: url(./assets/img/reviewbg.png);
background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;
height: 100vh;
text-align: center;
}
a {
    text-decoration: none;
    color: #022f5d;
}
</style>

@include('include/script')
    
</body>
</html>