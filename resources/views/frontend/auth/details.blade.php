@extends('frontend.layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('labels.frontend.auth.register_box_title') }}</div>

                <div class="panel-body">

                   
                    <div class="form-group">
                        {{ Form::label('match', trans('Match').'*', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('match', 'match', null, ['class' => 'form-control', 'placeholder' => trans('Match')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group--><br><br>

                    <div class="form-group">
                        {{ Form::label('runs', trans('Runs').'*', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('runs', 'runs', null, ['class' => 'form-control', 'placeholder' => trans('Runs')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group--><br><br>

                     <div class="form-group">
                        {{ Form::label('runs', trans('Wickets').'*', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('wickets', 'wickets', null, ['class' => 'form-control', 'placeholder' => trans('wickets')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group--><br><br>
                
                   <div class="form-group">
                        {{ Form::label('type', trans('Type').'*', ['class' => 'col-md-4 control-label']) }}
                       
                        <div class="col-md-4">
                          
                          <select name=""> 
                            <option value="Batsman">Batsman</option>
                            <option value="Bowler">Bowler</option>
                            <option value="All Rounder">All Rounder</option>
                          </select>                 
                        </div><!--col-md-6-->
                    </div><!--form-group--><br><br>
                

               <div class="form-group">
                        {{ Form::label('batsman', trans('Batsman').'*', ['class' => 'col-md-4 control-label']) }}
                       
                        <div class="col-md-4">
                          
                          <select name=""> 
                <option value="LeftHanded">Left Handed</option>
                <option value="RightHanded">Right Handed</option>
                </select>
                     
                        
                        </div><!--col-md-6-->
                    </div><!--form-group--><br><br>

                      <div class="form-group">
                        {{ Form::label('batsman', trans('Bowler').'*', ['class' => 'col-md-4 control-label']) }}
                       
                        <div class="col-md-4">
                          
                          <select type="text" value="" name=""> 
                <option value="pace bowler">Pace bowler</option>
                <option value="spin bowler">Spin bowler</option>
               

                </select>
                        
                        </div><!--col-md-6-->
                    </div><!--form-group--><br><br>


                

                    <div class="form-group">
                            <div class="col-xs-7">
                               <label class="col-md-12 control-label">
                                 {!! Form::checkbox('is_term_accept',1,false) !!}
                                 I accept {!! link_to_route('frontend.pages.show', trans('validation.attributes.frontend.register-user.terms_and_conditions').'*', ['page_slug'=>'terms-and-conditions']) !!} </label>

                         </div><!--form-group-->
                    </div><!--col-md-6-->

                    @if (config('access.captcha.registration'))
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::captcha() !!}
                                {{ Form::hidden('captcha_status', 'true') }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->
                    @endif

                     <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                         <a href="{{trans('/register/details')}}" class ="btn btn-primary" role="button">Submit</a>
                        </div> <!--col-md-6-->
                     </div> <!--form-group-->


                    {{ Form::close() }}

                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
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
@endsection