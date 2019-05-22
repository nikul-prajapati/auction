@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.biddings.management') . ' | ' . trans('labels.backend.biddings.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.biddings.management') }}
        <small>{{ trans('labels.backend.biddings.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.biddings.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-bidding']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.biddings.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.biddings.partials.biddings-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">

                    <div class="form-group">
                    {{ Form::label('name', trans('name'), ['class' => 'col-lg-2 control-label required']) }}
                   
                    <div class="col-lg-10">
                        @foreach($users as $value) 
                        <label for="name" class="col-md-4 control-label" name="id">{{$value['first_name']}}</label> 
                        <input type="hidden" class="col-md-6" name="users_id"  value= "<?php echo $value['id'] ?>"  />
                        
                       @endforeach
                   </div><!--col-lg-10-->
                </div><!--form control-->
                

                <div class="form-group">
                {{ Form::label('Image', trans('Image'), ['class' => 'col-lg-2 control-label required']) }}
                <div class="col-lg-10">
                @foreach($users as $xyz)
                <img src="{{ URL::asset('img/frontend/pics/'.$xyz['filename']) }}" height="80px" width="90px" align="center" alt="Any alt text"/>
                @endForeach
                 </div><!--col-lg-10-->
                </div><!--form control-->

                
                {{-- Price --}}
                <div class="form-group">
                    {{ Form::label('price', trans('price'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('price', null, ['class' => 'form-control box-size', 'placeholder' => trans('price'), 'required' => 'required' , 'price' => 'min:200']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                

                {{-- Select Team Name --}}
                <div class="form-group">
                    {{ Form::label('Select Team Name', trans('Select Team Name'), ['class' => 'col-lg-2 control-label required']) }}
                <div class="col-lg-10">
               <!--  <h4 class="col-md-2">Select Team Name</h4> -->
                <select class="btn btn-primary dropdown-toggle" data-toggle="dropdown" name="teams_id">
                  <option>select</option>
                   @foreach($data as $role)
                   <option  value="<?php echo $role->id ?>">
                   {{$role->Team_name}}</option>
                  @endForeach
                </select><br><br>
                </div><!--col-lg-10-->
                </div><!--form control-->
       



                  {{ $users->links('backend.bids.pagination') }}

                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.biddings.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.biddings.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']), ['onClick'=>'event()'] }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection

@section('after-scripts')

<!-- <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>

<script type="text/javascript">
    $('form').submit(function event()  {
    event.preventDefault();
    $.ajax({
        url: '/Backend/Bidding/Biddings/store',
        type: 'post',
        data: $('form').serialize(), // Remember that you need to have your csrf token included
        dataType: 'json',
        
    });
});
</script> -->

@endsection