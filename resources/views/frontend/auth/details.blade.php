@extends('frontend.layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('labels.frontend.auth.register_box_title') }}
                </div>

                <div class="panel-body">

                    @if ($errors->any())
                  <!--   <div class="alert alert-danger"> -->
                        <ul>

                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                 <!--    </div> -->
                    @endif

<form method="POST" action="{{route('details.store')}}"  class="form-horizontal"> 

        <div class="form-group">
             @csrf
              <label for="match" class="col-md-4 control-label">Match:</label>
              <input type="text" class="col-md-6" name="match"  />
        </div>
        
        <div class="form-group">
        
              <label for="run" class="col-md-4 control-label">Run:</label>
              <input type="text" class="col-md-6" name="runs"/>

        </div>
        
        <div class="form-group">
        
              <label for="wicket" class="col-md-4 control-label">Wickets:</label>
              <input type="text" class="col-md-6" name="wickets"/>
        
        </div>

        <div class="form-group">

            <label for="type" class="col-md-4 control-label">Type:</label>
            <select name="type" class="col-md-6" style="padding: 5px;"> 
                    
                    <option value="Batsman">Batsman</option>
                    <option value="Bowler">Bowler</option>
                    <option value="All Rounder">All Rounder</option>

            </select>

        </div>

        <div class="form-group">
        
             <label for="Batsman" class="col-md-4 control-label">Batsman:</label>
             <select name="batsman" class="col-md-6" style="padding: 5px;">

                    <option value="LeftHanded">Left Handed</option>
                    <option value="RightHanded">Right Handed</option>

             </select>


        </div>

        <div class="form-group">

            <label for="bowler" class="col-md-4 control-label">Bowler: </label>
            <select name="bowler" class="col-md-6" style="padding: 5px;"> 

                    <option value="pace bowler">Pace bowler</option>
                    <option value="spin bowler">Spin bowler</option>

             </select>
                        

        </div>

        <div class="form-group">
        
              <label for="run" class="col-md-4 control-label">Age:</label>
              <input type="text" class="col-md-6" name="age"/>

        

    <div class="col-md-6 col-md-offset-4">
       
        <button type="submit" class="btn btn-primary">Submit</button>  
    </div>

</form>            
 
      </div>
      </div>
      </div>


         
         

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

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
            // To Use Select2
            Backend.Select2.init();
        });
    </script>
@endsection