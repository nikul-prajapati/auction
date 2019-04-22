@extends('frontend.layouts.app')

@section('content')

    <div class="row">
    <div class="col-md-7 col-md-offset-2">       
            <div class="contact_us">
              <div class="contact_us_fon">
              <div class="contact_us_left">
          
              <div class="contact_us_big_text">
                  <span class="contact_us_big_text">contact<span class="red_text">us</span></span>
              </div>
              
              <div class="contact_us_small_text mail">  16-Swastik Society,Sardar Patel Stadium Rd, Navrangpura,Ahmedabad, Gujarat 380009</div>
              <div class="contact_us_small_text adress"> phone: 9876543210</div>
              <div class="contact_us_small_text phone_number">contact@cygnetinfotech.com</div>    
          
            </div>
      
    <div class="contact_us_right">
      
      <div class="contact_us_icons">
        <a href="#"><div class="icon icon_facebook"></div></a> 
        <a href="#"><div class="icon icon_twitter"></div></a> 
        <a href="#"><div class="icon icon_google_plus"></div></a> 
        <a href="#"><div class="icon icon_linkedin"></div></a> 
      </div>   
      
    </div>
    </div>
    </div>
    </div>
    </div>


@endsection

@section('after-scripts')

@include('frontend.footer')

@endsection