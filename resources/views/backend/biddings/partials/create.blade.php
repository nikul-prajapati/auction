@extends ('backend.layouts.app')


@section ('title', trans('labels.backend.biddings.management') . ' | ' . trans('labels.backend.biddings.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.biddings.management') }}
        <small>{{ trans('labels.backend.biddings.create') }}</small>
    </h1>
@endsection

@section('content')
    <div class="alert alert-success" role="success">
    {{ Form::open([ 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-bidding']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.biddings.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.biddings.partials.biddings-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">

                <div id="parentdiv">
                 @include('backend.biddings.create_form')
             </div>

             <div id="aa">
                  <input type="hidden" class="col-md-6" name="pages" id="pages"  value="{{ $users->currentPage() }}"  />
                </div>




                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.biddings.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.biddings.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->

            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
</div>
@endsection

@section('after-scripts')



<script type="text/javascript">
    alert('ss');
    $( document ).ready(function() {
    console.log( "ready!" );
});
    // jQuery, bind an event handler or use some other way to trigger ajax call.
$('#create-bidding').submit(function( event ) {
    console.log('test');
    event.preventDefault();
    console.log('in');
    $.ajax({
        url: '/Backend/Bidding/Biddings/store',
        type: 'post',
        data: $('#create-bidding').serialize(), // Remember that you need to have your csrf token included
        dataType: 'json',
        success: function(_response){
                         console.log(response);
                         $('#page').val(response.page++);
                      //$('.alert').show();
                     // $('.alert').html(result.success);
                     //document.getElementById("myForm").reset();
                     //window.location.href=result.url;
                  },
        error: function( _response ){
            // Handle error
        }
    });
});
</script>

@endsection