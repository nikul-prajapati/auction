@extends('frontend.layouts.app')
.

@section('content')
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('labels.frontend.auth.register_box_title') }}
                </div>

                <div class="panel-body">

                    <div class="card uper">

                    <div class="card-header"> add share</div>
                    <div class="card-body"> 

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>

                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>
                    @endif

<form method="POST" action="{{route('details.store')}}"  class="form-horizontal"> 

        <div class="form-group">
             @csrf
              <label for="match">match</label>
              <input type="text" class="form-control" name="match"  />
        </div>
        
        <div class="form-group">
        
              <label for="run">run:</label>
              <input type="text" class="form-control" name="runs"/>

          </div>
        
        <div class="form-group">
        
              <label for="wicket">wickets:</label>
              <input type="text" class="form-control" name="wickets"/>
        
          </div>

        <div class="form-group">

            <label for="type">Type</label>
            <select name="type" class="form-group"> 
                    
                    <option value="Batsman">Batsman</option>
                    <option value="Bowler">Bowler</option>
                    <option value="All Rounder">All Rounder</option>

            </select>

        </div>

        <div class="form-group">
        
             <label for="Batsman">batsman</label>
             <select name="batsman" class="form-group">select  

                    <option value="LeftHanded">Left Handed</option>
                    <option value="RightHanded">Right Handed</option>

             </select>


        </div>

        <div class="form-group">

            <label for="bowler">bowler </label>
            <select name="bowler"> 

                <option value="pace bowler">Pace bowler</option>
                <option value="spin bowler">Spin bowler</option>

             </select>
                        

        </div>
              
        <button type="submit" class="btn btn-primary">submit data</button>  
          
</form>            
 
      </div>
      </div>
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
            // To Use Select2
            Backend.Select2.init();
        });
    </script>
@endsection