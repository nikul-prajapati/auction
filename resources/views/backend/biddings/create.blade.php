@extends ('backend.layouts.app')

@section ('title', trans('biddings management') . ' | ' . trans('create'))


<!-- <script src="query.min.js"></script> -->

@section('page-header')
    <h1>
        {{ trans('biddings management') }}
        <small>{{ trans('biddings create') }}</small>
    </h1>
@endsection

@section('content')

<div id="element"> 

    <!-- {{ Form::open(['route' => 'admin.biddings.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-bidding']) }} -->

    <form method="POST" action="{{route('admin.biddings.store')}}"  class="form-horizontal" id="create-bidding"> 


        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('biddings create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.biddings.partials.biddings-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">


                
                    <!-- <div class="form-group">
                    <label class="col-lg-2 control-label">Player Name:</label>
                    <div class="col-lg-10">
                    @foreach($users as $value) 
                    
                    <input type="hidden" class="col-md-5" name="users_id"  value= "<?php echo $value['id'] ?>"  />
                    <label for="name" class="form-control" name="id">{{$value['first_name']}}</label> </div>
                   @endforeach
                   </div> --><!--col-lg-10-->

                   <div class="form-group">
                     <label class="control-label col-sm-2"><b>Picture:</b></label>
                <div class="col-lg-10">
                @foreach($users as $xyz)
                <img src="{{ URL::asset('img/frontend/pics/'.$xyz['filename']) }}" style="border-radius: 5px" height="80px" width="90px"alt="Any alt text"/>
                @endForeach
                  </div> 
                </div>
              
              <div class="form-group">
                      <!-- <div class="">
                      <div class="input-group"> -->
                        <label class="control-label col-sm-2"><b>Player name:</b></label>
                      <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span> -->
                      <!-- {{ Form::input('email', 'email', null, ['class' => 'form-control']) }} -->
                      @foreach($users as $value) 
                      <div class="col-sm-3">
                      <input type="hidden" name="users_id" value="<?php echo $value['id'] ?>">
                      <label for="name" class="form-control" name="id">{{$value['first_name']}}</label>
                      @endforeach
                      
                        </div>
                        </div>
                     <!--  </div>
                    </div> -->

                
                <!-- <div class="form-group">
                <div class="col-lg-10">
                @foreach($users as $xyz)
                <img src="{{ URL::asset('img/frontend/pics/'.$xyz['filename']) }}" height="80px" width="90px"alt="Any alt text"/>
                @endForeach
                  </div> 
                </div> -->
                
                {{-- Price --}}
                <!-- <div class="form-group">
                    {{ Form::label('price', trans('price'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('price', null, ['class' => 'form-control box-size', 'placeholder' => trans('price'), 'required' => 'required' , 'price' => 'min:200']) }} -->
                    <!-- </div> --><!--col-lg-10-->
                <!-- </div> --><!--form control-->

                <div class="form-group">
                    <label class="control-label col-sm-2"><b>Price:</b></label>
                     <div class="col-sm-3">
                        <input type="text" name="price" style="width: 100%;padding: 4px;" placeholder="enter price" required>
                     </div>   
                </div>

                
                <!-- <div class="form-group"> -->
            <!--   <label style="margin-left: 121px;">select team:</label> -->
 
                <!-- <select class="btn btn-primary dropdown-toggle" data-toggle="dropdown" name="teams_id" class="">
                  <option>select</option>
                   @foreach($data as $role)
                   <option  value="<?php echo $role->id ?>">
                   {{$role->Team_name}}</option>
                  @endForeach
                </select><br><br></div> -->

                <div class="form-group">
                    
                    <label class="control-label col-sm-2"><b>Team:</b></label>

                    <select class="btn btn-primary dropdown-toggle" data-toggle="dropdown" name="teams_id" class="dropdown-menu" 
                    style="width: 12%;margin-left: 13px;">
                         <option>select</option>
                         @foreach($data as $role)
                        <option  value="<?php echo $role->id ?>">
                        {{$role->Team_name}}</option>
                        @endForeach
                    </select>
                    
                </div> 
       


                  {{ $users->links('backend.bids.pagination') }}

                <div class="form-group">
                 
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.biddings.index', trans('cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('create'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}

    <button id="go-button">Enable Full Screen</button>

</div><!-- element -->

@endsection

@section('after-scripts')

<script type="text/javascript">

// $("#ajax").click(function(event) 
// {
//     event.preventDefault();

//     $.ajax({
//         type: "post",
//         url: "{{ url('addFavorites') }}",
//         dataType: "json",
//         data: $('#ajax').serialize(),
//         success: function(data){
//               alert("Data Save: " + data);
//         },
//         error: function(data){
//              alert("Error")
//         }
//     });
// });


       
/* Get into full screen */
function GoInFullscreen(element) {
  if(element.requestFullscreen)
    element.requestFullscreen();
  else if(element.mozRequestFullScreen)
    element.mozRequestFullScreen();
  else if(element.webkitRequestFullscreen)
    element.webkitRequestFullscreen();
  else if(element.msRequestFullscreen)
    element.msRequestFullscreen();
}

/* Get out of full screen */
function GoOutFullscreen() {
  if(document.exitFullscreen)
    document.exitFullscreen();
  else if(document.mozCancelFullScreen)
    document.mozCancelFullScreen();
  else if(document.webkitExitFullscreen)
    document.webkitExitFullscreen();
  else if(document.msExitFullscreen)
    document.msExitFullscreen();
}

/* Is currently in full screen or not */
function IsFullScreenCurrently() {
  var full_screen_element = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || null;
  
  // If no element is in full-screen
  if(full_screen_element === null)
    return false;
  else
    return true;
}

$("#go-button").on('click', function() {
  if(IsFullScreenCurrently())
    GoOutFullscreen();
  else
    GoInFullscreen($("#element").get(0));
});

$(document).on('fullscreenchange webkitfullscreenchange mozfullscreenchange MSFullscreenChange', function() {
  if(IsFullScreenCurrently()) {
    $("#element span").text('Full Screen Mode Enabled');
    $("#go-button").text('Disable Full Screen');
  }
  else {
    $("#element span").text('Full Screen Mode Disabled');
    $("#go-button").text('Enable Full Screen');
  }
});



</script>
@endsection

