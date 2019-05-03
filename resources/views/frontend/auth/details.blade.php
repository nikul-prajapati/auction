@extends('frontend.layouts.app')

@section('content')

<div class="panel-body">
    <!-- <div class="row"> -->

       <!--  <div class="col-md-8 col-md-offset-2"> -->

            <!-- <div class="panel panel-default"> -->
                <!-- <div class="panel-heading">{{ trans('labels.frontend.auth.register_box_title') }}
                </div>
 -->
               <!--  <div class="panel-body"> -->

                   <!--  @if ($errors->any()) -->
                  <!--   <div class="alert alert-danger"> -->
                        <!-- <ul>

                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach

                        </ul>
 -->
                 <!--    </div> -->
                    <!-- @endif -->

                
<div class="col-md-6" style="border-radius: 5px;margin-left:30%; ">


<form method="POST" action="{{route('details.store')}}"  class="form-horizontal" enctype="multipart/form-data"> 
{{csrf_field()}}
<h2 style="text-align: center;">Records</h2>
        <!-- <div class="form-group">
             @csrf
              <label for="match" class="col-md-4 control-label">Match:</label>
              <input type="text" class="col-md-6" name="match"  />
        </div> -->

        <div class="form-group">
          @csrf
<!--           <label class="col-md-4 control-label">First Name</label> <br> -->
               <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input  name="match" placeholder="match" class="form-control"  type="input" required>
               </div>
        </div>
        
        <!-- <div class="form-group">
        
              <label for="run" class="col-md-4 control-label">Run:</label>
              <input type="text" class="col-md-6" name="runs"/>

        </div> -->

        <div class="form-group">
               <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input  name="runs" placeholder="runs" class="form-control"  type="input" required>
               </div>
        </div>

        
        <!-- <div class="form-group">
        
              <label for="wicket" class="col-md-4 control-label">Wickets:</label>
              <input type="text" class="col-md-6" name="wickets"/>
        
        </div> -->

        <div class="form-group">
               <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input  name="wickets" placeholder="wicket" class="form-control"  type="input" required>
               </div>
        </div>

        <div class="form-group">
            <div class="input-group">
            <!-- <label for="type" class="input-group"></label> -->
            <span class="input-group-addon"><i class="fa fa-list-ul"></i></span>
            <select name="type" class="form-control" style="padding: 5px;"> 
                    

                    
                    <option value="Batsman">Batsman</option>
                    <option value="Bowler">Bowler</option>
                    <option value="All Rounder">All Rounder</option>

            </select>
</div>
        </div>

        <div class="form-group">
        <div class="input-group">
            <!--  <label for="Batsman" class="col-md-4 control-label">Batsman:</label> -->
            <span class="input-group-addon"><i class="fa fa-list-ul"></i></span>
             <select name="batsman" class="form-control" style="padding: 5px;">

                    
                    <option value="LeftHanded">Left Handed</option>
                    <option value="RightHanded">Right Handed</option>

             </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-list-ul"></i></span>
            <!-- <label for="bowler" class="col-md-4 control-label">Bowler: </label> -->
            <select name="bowler" class="form-control" style="padding: 5px;"> 

                    
                    <option value="pace bowler">Pace bowler</option>
                    <option value="spin bowler">Spin bowler</option>

             </select>
           </div>

        </div>

        <!-- <div class="form-group">
        
              <label for="run" class="col-md-4 control-label">Age:</label>
              <input type="text" class="col-md-6" name="age"/>

        </div> -->

        <div class="form-group">
               <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
                        <input  name="age" placeholder="age" class="form-control"  type="input" required>
               </div>
        </div>

        <div class="form-group" >
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-image"></i></span>
          <input type="file" name="filename[]" class="form-control" required>
          <!-- <div class="input-group-btn"> 
            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div> -->
        </div></div>

        

       <input type="hidden" class="col-md-6" name="users_id"  value={{$logged_in_user->id}} />
             


    <!-- <div class="col-md-6 col-md-offset-4">
       
        <button type="submit" class="btn btn-primary">Submit</button>  
    </div> -->

    <div class="form-group">
                        <div class="">
                            
                            <button type="submit" class="" style="width:49%;padding: 5px; background-color: #4CAF50;color:white;border:none;">Register</button>
                            <button type="Reset" class="" style="width:49%;padding: 5px; background-color: #4CAF50;color:white;border:none;">Reset</button>
                        </div>

                        <div class="">
                           
                            
                        </div>

                    </div>

                  
              

</form>            
 
      </div>

      <!-- </div>
      </div> -->


</div>
               <!-- </div> --><!-- panel body -->

            <!-- </div> --><!-- panel -->

        <!-- </div> --><!-- col-md-8 -->

    <!-- </div> --><!-- row -->
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