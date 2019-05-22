@extends('frontend.layouts.app')

@section('content')

<link rel="stylesheet" href="css/w3.css">

<link rel="stylesheet" href="css/forheading.css">

<div class="image-container" style="margin-top: 5%;"><!-- img/frontend/ss1.jpg -->

  <div class="text">

    Welcome to Josh

  </div>

</div>


<div class="w3-content w3-section" style="">
  <img class="mySlides w3-animate-fading" src="img/frontend/ss1.jpg" style="width:10p0%;height:500px;">
  <img class="mySlides w3-animate-fading" src="img/frontend/ss2.jpg" style="width:100%;height:500px;">
  <img class="mySlides w3-animate-fading" src="img/frontend/ss3.jpg" style="width:100%;height:500px;">
  <!-- <img class="mySlides" src="imgss3.jpg" style="width:100%"> -->

  
</div>



  @endsection

  @section('after-scripts')

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 6000);    
}
</script>


  @include('frontend.footer')

  @endsection

