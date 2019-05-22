@extends('frontend.layouts.app')

@section('content')

<!--     <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('labels.frontend.auth.login_box_title') }}</div>

                <div class="panel-body">

                    {{ Form::open(['route' => 'frontend.auth.login', 'class' => 'form-horizontal']) }}

                    <div class="form-group">
                        {{ Form::label('email', trans('validation.attributes.frontend.register-user.email'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', trans('validation.attributes.frontend.register-user.password'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('remember') }} {{ trans('labels.frontend.auth.remember_me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit(trans('labels.frontend.auth.login_button'), ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) }}

                            {{ link_to_route('frontend.auth.password.reset', trans('labels.frontend.passwords.forgot_password')) }}
                        </div>
                    </div>

                    {{ Form::close() }}

                    <div class="row text-center">

                    </div>
                </div>

            </div>

        </div>

    </div> -->
<!-- 
    background-image: url(/img/frontend/forbg.jpg); -->
       

<div class="col-md-5" style="border-radius: 5px; margin-left:30%; background-color: white;margin-bottom: 6%;margin-top: 28px; ">
    <!-- <div class="panel panel-default"> -->
   <!--  <div class="panel-heading">{{ trans('Login') }}</div> -->
    <!-- <div class="wrapper" style=""> -->    


{{ Form::open(['route' => 'frontend.auth.login', 'class' => 'form-horizontal']) }}

<!-- <form class="form-horizontal" action="{{route('frontend.auth.login')}}" method="post"> -->

<h2 style="text-align: center;">Login</h2>




    <div class="form-group">
 <!--  <label class="col-md-4 control-label">Email</label>  --> 
  <div class="">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}

<!-- <input type="email" name="email" class="form-control" placeholder="Email Address" required>
 -->
  <!-- <input  name="password_confirmation" placeholder="confirm password" class="form-control"  type="password"> -->
  <!-- <input  name="first_name" placeholder="First Name" class="form-control"  type="text"> -->

    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
<!--   <label class="col-md-4 control-label" >Password</label>  -->
    <div class="">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <!-- <input name="last_name" placeholder="Last Name" class="form-control"  type="text"> -->
  {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
<!-- 
<input type="password" name="password" placeholder="password" class="form-control" required> -->

    </div>

  </div>

</div>
<div class="form-group">
                            <!-- <div class="col-xs-7"> -->
                                <label class="col-md-12 control-label">
 <a href="http://127.0.0.1:8000/password/reset" style="">Forgot Your Password?</a> 

</label>
    </div>
<!--   {{ link_to_route('frontend.auth.password.reset', trans('labels.frontend.passwords.forgot_password')) }} -->


            <!-- <div class="form-group"> -->
                        <!-- <div class="col-md-8"> -->
                           <!--  {{ Form::submit(trans('labels.frontend.auth.login_button'), 
                                ['class' => 'btn btn-primary', 'style' => 'margin-right:15px;width:100%;']) }}<br><br> -->

                   <!--  <button style="width: 50%;padding: 4px; border-radius: 3px;" class="btn-primary">SIGN UP</button> -->
<!-- 
                    <input type="button" class="btn-primary"> -->
                            
                        <!-- </div> -->


                        <div class="form-group">
                        <div class="col-md-5">

                            <!-- <button type="submit" class="" style="width:100%;padding: 8px; background-color: #4CAF50;color:white;border:none;">Login</button> -->
                           
                            <button type="submit" class="btnn">Login</button>
                        </div>
                       
                        <div class="col-md-5">
                        
                            <button type="Reset" class="btnn">Reset</button>

                       <!--  </div> -->
                    </div>


                    </div>

   {{ Form::close() }}

</div>
</div>
</div>
</div>



@endsection

@section('after-scripts')
@include('frontend.footer')
@endsection 