<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{-- {{ Form::label('name', trans('labels.backend.blogs.title'), ['class' => 'col-lg-2 control-label required']) }} --}}

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{-- {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.blogs.title'), 'required' => 'required']) }} --}}
        </div><!--col-lg-10-->
    </div><!--form-group-->
</div><!--box-body-->

@section("after-scripts")
    <script>

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
