@extends("layouts.webSiteInner")
@section("title","Parivartan Welfare Association")
@section("page_title",$page_title??"")
@section("content")

      <!-- section -->
      <section class="layout_padding section">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="form_cont">
                    <form method="post" action="#">
                       <fieldset> 
                          <div class="field">
                            <label>Email</label>
                             <input type="email" name="email" placeholder="Email" autocomplete="off">
                          </div>
                          <div class="field">
                             <input type="password" name="password" placeholder="Password" autocomplete="off">
                          </div>
                          
                          <div class="field center">
                            <button type="submit" >Login</button>
                       </div></fieldset>
                    </form>
                </div>
             </div>
          </div>
        </div>
      </section>
      <!-- end section -->
      @endsection