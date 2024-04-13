<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Site Metas -->
   <title>@yield("title")</title>
   <head>
   @include("include.head")
   </head>
   <body id="inner_page" >
      <!-- header -->
   @include("include.header")
   <section class="main_full inner_page">
    <div class="container-fluid">
      <div class="row">
         <div class="full">
           <h3>@yield("page_title")</h3>    
         </div>
      </div>
    </div>
  </section>
      <!-- end header -->
      @yield("content")
      <!-- footer -->
   @include("include.footer")      
      <!-- end footer -->
   @include("include.script")
     @yield("script")
   </body>
</html>
