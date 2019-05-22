@extends('frontend.layouts.app')

@section('content')

<link rel="stylesheet" href="css/info.css">

<div class="container" style="background-image: url('img/frontend/logo.png');">
	
  <h1 style="box-shadow: 2px 7px 12px;padding: 8px;">About Cygnet Group</h1><br>

    <div class="col-md-7"><h3><u>Cygnet Infotech is a Global Technology Solution Provider</u></h3></div>
    <br><br>

    <div class="row"><br><br>

    <div class="col-md-6" style="margin-top:25px;">

			<p style="text-align:justify;">Cygnet Infotech is one of the most trusted names in the IT space delivering technology solutions across 35 countries. 
			Born out of a vision to create a software development company where quality, innovation and personalized services trump low cost,
			makeshift solutions, Cygnet enables its clients to digitize, scale and transform in to high performance businesses.
			Cygnet has deep industry and business process expertise, global resources, and a proven track record in developing creative
			technology solutions. Cygnet can mobilize the right people, skills and technologies that help to improve business performance.</p>
	</div>

<div class="col-md-6" style="border:0.5px solid black;">

<img class="mySlides w3-animate-fading" src="img/frontend/aboutmap.jpg" 
 style="width:100%;height:300px;">



</div>
</div>


@endsection

@section('after-scripts')

@include('frontend.footer')

@endsection