@extends('frontend.layouts.app')

@section('content')
    @if ($errors->any())            
     <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
             @endforeach
      </ul>
     @endif

<div class="col-md-6" style="border-radius: 5px;margin-left:30%;background-color: white;">

<form method="POST" action="{{route('details.store')}}"  class="form-horizontal" enctype="multipart/form-data"> 
      {{csrf_field()}}
<h2 style="text-align: center;">Records</h2>
        

        <div class="form-group">
                  @csrf
               <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input  name="match" placeholder="match" class="form-control"  type="input">
               </div>
        </div>

        <div class="form-group">
               <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input  name="runs" placeholder="runs" class="form-control"  type="input">
               </div>
        </div>

        <div class="form-group">
               <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input  name="wickets" placeholder="wicket" class="form-control"  type="input">
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

         <input type="hidden" class="col-md-6" name="users_id"  value={{$logged_in_user->id}}  /> 
       

        <div class="form-group">
               <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input  name="age" placeholder="age" class="form-control"  type="input">
               </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"> <i class="fa fa-list-ol"></i></span>
          <input type="file" name="filename[]" class="form-control" required>
          
        </div>

        

    <div class="form-group">
        <br>
                            
             <button type="submit" class="" style="width:47%;padding: 6px; background-color: #4CAF50;color:white;border:none;margin-left: 2%;border-radius: 3px">Register</button>
              <button type="Reset" class="" style="width:47%;padding: 6px; background-color: #4CAF50;color:white;border:none;border-radius: 3px;">Reset</button>
        
    </div>

</form>            
 
</div>
      
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