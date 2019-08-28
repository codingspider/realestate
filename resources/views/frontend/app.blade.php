<!DOCTYPE html>
<html lang="en">
    
	@include('frontend.head')
    <body> 

        <!-- layout-->
        <div id="layout">
            <!-- Login Client -->
            <div class="jBar">
              <div class="container">            
                  <div class="row"> 
					<?php if(empty(Auth::user()->id)) {  ?>				  
                      <form role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}           
                          <div class="col-md-2">
                              <h1>Login Area</h1> 
                          </div>
						 
                          <div class="col-md-4"> 
                              <input type="email" name="email" placeholder="Your Email" required>
                          </div>
                          <div class="col-md-3">
                              <input type="password" name="password" placeholder="Your Password" required>                          
                          </div>
                          <div class="col-md-3">
                              <input type="submit" class="botton" value="Sign in">
                              <span>Our</span>
                              <a href="{{url('/registration/page')}}" class="botton"> Register </a>
                          </div>
                      </form> 
					<?php } else {  ?>
 <div class="col-md-4"> </div>					
 <div class="col-md-4"> </div>					
<div class="col-md-3">
                              
                              <a href="{{url('/logout')}}" class="botton"> Logout </a>
                          </div>
<?php } ?>					
                      <p class="jTrigger downarrow">Close Login</p>
                  </div>
              </div>
            </div>
            <span class="jRibbon jTrigger up">Login</span>
            <div class="line"></div>
            <!-- End Login Client -->

            @include('frontend.header')
            @include('frontend.slider')

            

            <!-- content info -->
            <div class="content_info">
                <div class="container">
                    <!-- Newsletter Box --> 

					@yield('content')
 
                    
                </div>
                <!-- End Container -->
            </div>
            <!-- End content info-->

           @include('frontend.footer')
        </div>
        <!-- End layout-->
   
        <!-- ======================= JQuery libs =========================== -->
        <!-- Core JS Libraries -->
               
        <!--Nav-->
        <script type="text/javascript" src="{{url('assets/frontend/js/nav/tinynav.js')}}"></script> 
        <script type="text/javascript" src="{{url('assets/frontend/js/nav/superfish.js')}}"></script>  
        <script type="text/javascript" src="{{url('assets/frontend/js/nav/hoverIntent.js')}}"></script>              
        <!--Totop-->
        <script type="text/javascript" src="{{url('assets/frontend/js/totop/jquery.ui.totop.js')}}" ></script>  
        <!--Slide-->
        <script type="text/javascript" src="{{url('assets/frontend/js/slide/camera.js')}}" ></script>      
        <script type='text/javascript' src="{{url('assets/frontend/js/slide/jquery.easing.1.3.min.js')}}"></script> 
        <!--owlcarousel-->
        <script type='text/javascript' src="{{url('assets/frontend/js/owlcarousel/owl.carousel.js')}}"></script> 
        <!--efect_switcher-->
        <script type='text/javascript' src="{{url('assets/frontend/js/efect_switcher/jquery.content-panel-switcher.js')}}"></script>         
        <!--Theme Options-->
        <script type="text/javascript" src="{{url('assets/frontend/js/theme-options/jquery.cookies.js')}}"></script> 
        <!-- Bootstrap.js-->
        <script src="{{url('assets/frontend/js/bootstrap/bootstrap.js')}}"></script>
        <!--fUNCTIONS-->
        <script type="text/javascript" src="{{url('assets/frontend/js/main.js')}}"></script>
        <!-- ======================= End JQuery libs =========================== -->
    </body>

<!-- Mirrored from html.imaginacionweb.net/fullstate/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Dec 2016 08:50:41 GMT -->
</html>