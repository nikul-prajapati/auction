@extends('frontend.layouts.app')

@section('content')
<div class="container">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif
    <div class="row">
    
<!-- 
    <div class="row"> -->

     <!--    <div class="col-md-8 col-md-offset-2"> -->

          <!--   <div class="panel panel-body"> -->
                <!-- <div class="panel-heading">{{ trans('labels.frontend.auth.register_box_title') }}</div> -->
                

       <!--          <div class="col-md-10"> -->

        <div class="col-md-6" style="border-radius: 5px; background-color:white;margin-left:30%; ">
                    
                    <h2 style="text-align: center;">Registration</h2>

                    {{ Form::open(['route' => 'frontend.auth.register', 'class' => 'form-horizontal']) }}

                    <!-- <div class="form-group">
                         {{ Form::label('first_name', trans('validation.attributes.frontend.register-user.firstName').'*', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('name', 'first_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
                        </div>
                    </div>
 -->

                <div class="form-group">
                    <!-- <div class="col-md-8 inputGroupContainer"> -->
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input  name="first_name" placeholder="First Name" class="form-control"  type="input">
                        </div>
                      </div>
                   <!--  </div> -->



                    <!-- <div class="form-group">
                        {{ Form::label('last_name', trans('validation.attributes.frontend.register-user.lastName').'*', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('name', 'last_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.lastName')]) }}
                        </div>
                    </div>
 -->
                    <div class="form-group">
                    <!-- <div class="col-md-8 inputGroupContainer"> -->
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input  name="last_name" placeholder="last Name" class="form-control"  type="input">
                        </div>
                      </div>
                  <!--   </div> -->




                    <!-- <div class="form-group">
                        {{ Form::label('email', trans('validation.attributes.frontend.register-user.email').'*', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                        </div>
                    </div>
 -->

            <div class="form-group">
                   <!--  <div class="col-md-8 inputGroupContainer"> -->
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-open-o"></i></span>
                      <input  name="email" placeholder="email" class="form-control"  type="email">
                        </div>
                      </div>
                    <!-- </div> -->


                    <!-- <div class="form-group">
                        {{ Form::label('password', trans('validation.attributes.frontend.register-user.password').'*', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
                        </div>
                    </div> -->


            <div class="form-group">
                    <!-- <div class="col-md-8 inputGroupContainer"> -->
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                      <input  name="password" placeholder="password" class="form-control"  type="password">
                        </div>
                      </div>
                    <!-- </div> -->


                   <!--  <div class="form-group">
                        {{ Form::label('password_confirmation', trans('validation.attributes.frontend.register-user.password_confirmation').'*', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.password_confirmation')]) }}
                        </div>
                    </div>
 -->        

                 <div class="form-group">
                  <!--   <div class="col-md-8 inputGroupContainer"> -->
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                      <input  name="password_confirmation" placeholder="confirm password" class="form-control"  type="password">
                        </div>
                      </div>
                    <!-- </div> -->



                    

                    <div class="form-group">
                            <!-- <div class="col-xs-7"> -->
                               <label class="col-md-12 control-label">
                                 {!! Form::checkbox('is_term_accept',1,false) !!}
                                 I accept {!! link_to_route('frontend.pages.show', trans('validation.attributes.frontend.register-user.terms_and_conditions').'*', ['page_slug'=>'terms-and-conditions']) !!} </label>

                        <!--  </div> -->
                    </div>

                    @if (config('access.captcha.registration'))
                        <div class="form-group">
                            <!-- <div class="col-md-6 col-md-offset-4"> -->
                                {!! Form::captcha() !!}
                                {{ Form::hidden('captcha_status', 'true') }}
                           <!--  </div> -->
                        </div>
                    @endif

                    <div class="form-group">
                        <div class="col-md-5">
                            <!-- {{ Form::submit(trans('labels.frontend.auth.register_button'), ['class' => 'btn btn-primary'] ) }} -->
                            <button type="submit" class="" style="width:100%;padding: 8px; background-color: #4CAF50;color:white;border:none;">Register</button>
                        </div>
                        <div class="col-md-5">
                           <!--  {{ Form::submit(trans('labels.frontend.auth.register_button'), ['class' => 'btn btn-primary'] ) }} -->
                            <button type="Reset" class="" style="width:100%;padding: 8px; background-color: #4CAF50;color:white;border:none;">Reset</button>
                        </div>

                    </div>

                    {{ Form::close() }}

                </div>

            </div>

        </div>

    </div>
@endsection

@section('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif

    <script type="text/javascript">

        $(document).ready(function() {
            // To Use Select2
            Backend.Select2.init();
        });
    </script>
    @include('frontend.footer')
@endsection