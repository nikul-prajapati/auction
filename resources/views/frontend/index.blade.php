@extends('frontend.layouts.app')

@section('content')

<link rel="stylesheet" href="css/w3.css">


<div class="jumbotron text-cente" style="box-shadow: 3px 3px 3px;margin-top: -25px;">
  <h1>Welcome to cygnet cricket league</h1> 
</div>
<div class="body">

<div class="w3-content w3-section" style="">
  <img class="mySlides w3-animate-fading" src="img/frontend/ss1.jpg" style="width:100%;height:450px;">
  <img class="mySlides w3-animate-fading" src="img/frontend/ss2.jpg" style="width:100%;height:450px;">
  <img class="mySlides w3-animate-fading" src="img/frontend/ss3.jpg" style="width:100%;height:450px;">
</div>
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
  setTimeout(carousel, 7000);    
}
</script>

  @endsection


