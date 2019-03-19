@extends('frontend.layouts.app')

@section('content')
    <div class="row">

        <div class="col-xs-16">

            <div class="panel panel-default">
                <div class="panel-heading">WELCOME TO CYGNET CRICKET LEAGUE</div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4 col-md-push-8" style="padding-left: 130px;">

                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="{{ $logged_in_user->picture }}" alt="Profile picture">
                                    </div><!--media-left-->

                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            {{ $logged_in_user->name }}<br/>
                                            <small>
                                                {{ $logged_in_user->email }}<br/>
                                                Joined {{ $logged_in_user->created_at->format('F jS, Y') }}
                                            </small>
                                        </h4>

                                        {{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => 'btn btn-info btn-xs']) }}

                                        @permission('view-backend')
                                            {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-xs']) }}
                                        @endauth
                                    </div><!--media-body-->
                                </li><!--media-->
                            </ul><!--media-list-->
<<<<<<< HEAD

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>Teams Name</h4>
                                </div><!--panel-heading-->

                                <div class="panel-body">
                                    <div>
                                       There are total 8 teams available. All team have 11 members and 4 extra players in each time. 
                                    </div>
                                    <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                    <a href="{{trans('/teams')}}" class ="btn btn-primary" role="button">View teams Name</a>
                                    </div> <!--col-md-6-->
                                </div> <!--form-group-->
 
                                </div><!--panel-body-->
                            </div><!--panel-->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>aaa</h4>
                                </div><!--panel-heading-->

                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.

                                     
                                </div><!--panel-body-->
                            </div><!--panel-->
                        </div><!--col-md-4-->

                        <div class="col-md-8 col-md-pull-4">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>aa</h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                            </p>

                                            

                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-xs-12-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Player Records</h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <div class="form-group">
                                            
                                            <p>It will display the detail information about the player records i.e what is the speciality and the past history about the profile</p>

                                            <div class="col-md-6 col-md-offset-4">
                                            <a href="{{trans('/player_record')}}" class ="btn btn-primary" role="button">View Player information</a>
                                            </div> <!--col-md-6-->
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-md-6-->

                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Teams Details after bid</h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime hiovwhdiohv heoid ihvn WKHVB    .</p>


                                            <div class="col-md-6 col-md-offset-4">
                                            <a href="{{trans('/Teamdetails')}}" class ="btn btn-primary" role="button">View Teams information</a>
                                            </div> <!--col-md-6-->
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-md-6-->

                                
=======
                            <form>
                                <a class="btn btn-info" href="{{trans('/details')}}">form</a>
                            </form>
                                                  
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
                            </div><!--row-->

                        </div><!--col-md-8-->

                    </div><!--row-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection