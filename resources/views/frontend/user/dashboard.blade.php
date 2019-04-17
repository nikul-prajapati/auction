@extends('frontend.layouts.app')

@section('content')


    <div class="row">

        <div class="col-xs-16">

            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 20px;">

                    <marquee direction="left" behavior="slide">WELCOME TO CYGNET CRICKET LEAGUE</marquee></div>

                    

                   

                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4 col-md-push-8" style="padding-left: 130px;">

                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">

                         

                                        <img style="border-radius: 7px;" class="media-object" src="img/frontend/profile-picture/virat.jpg" height="80px" width="90px" alt="Profile picture">

                                    </div><!--media-left-->

                                    <div class="media-body" style="border:1px solid grey;padding: 2px;border-radius: 3px">
                                        <h4 class="media-heading">
                                            {{ $logged_in_user->name }}<br/>
                                            <small>
                                                {{ $logged_in_user->email }}<br/>
                                               <!--  Joined {{ $logged_in_user->created_at->format('F jS, Y') }} -->
                                            </small>
                                        </h4>

                                        {{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => 'btn btn-info btn-xs']) }}

                                        @permission('view-backend')
                                            {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-xs']) }}
                                        @endauth
                                    </div><!--media-body-->
                                </li><!--media-->
                            </ul><!--media-list-->

                           
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>Check your team</h4>
                                </div><!--panel-heading-->

                                <div class="panel-body">
                                    <div>
                                    User can check here in which team player has been selected. Results will declare after auction.
                                    </div>

                                   <!--  <div class="form-group"> -->
                                   <!--  <div class="col-md-6 col-md-offset-4"> -->
                                    <a href="{{trans('/Teamdetails')}}" class ="btn btn-primary" role="button">View Team</a>
                                    <!-- </div> --> <!--col-md-6-->
                               <!--  </div> --> <!--form-group-->
 
                                     
                                </div><!--panel-body-->
                                    
                            </div><!--panel-->
                        </div><!--col-md-4-->

                        <div class="col-md-8 col-md-pull-4">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>New Registered User?</h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <p>For Cygnetians another chance to play cricket and show their talent by this platform ! Fillup some details of previous played matches.
                                            </p>

                                            <a class="btn btn-primary" href="{{trans('/details')}}">Enter record</a>

                                            

                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-xs-12-->
                            </div><!--row-->

                            <div class="col-md-12">
                                <div class="row">
 <!--                                   <div class="col-md-12"> -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Check Filled records</h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                           
                                            
                                            <p>It will display the detail information about the player records which is already entered by cygnetian.</p>

                                            <!-- <div class="col-md-6 col-md-offset-4"> -->
                                            <a href="{{trans('/player_record')}}" class ="btn btn-primary" role="button">View information</a>
                                           <!--  </div> --> <!--col-md-6-->
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-md-6-->
                            </div>
                        </div></div>

                        <div class="col-md-8">
                                <div class="row">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>List of teams </h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                           
                                            <p>Register yourself in cricket tournament and one of below team will select you at time of auction </p>

                                            <a href="{{trans('/teams')}}" class ="btn btn-primary" role="button">Check all teams</a>
                                           <!--  </div> --> <!--col-md-6-->
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-md-6-->
                            </div>
                        
                        </div>
      
                          



                    </div><!--row-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->

@endsection
