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


                
                
                    <!-- <label for="name" class="col-md-4 control-label">Player Name:</label>
                    @foreach($users as $value) 
                    <input type="hidden" class="col-md-6" name="users_id"  value= "<?php echo $value->id ?>" disabled="disabled" /> </div>
                    <label for="name" class="col-md-4 control-label" name="id">{{$value->first_name}}</label>
                   @endforeach
 -->



                <div class="form-group">
                    {{ Form::label('users_id', trans('name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        @foreach($users as $value)
                        <label for="name" class="col-md-4 control-label" >{{$value->first_name}}</label>
                        @endforeach
                    </div><!--col-lg-10-->
                </div><!--form control-->


                {{-- Price --}}
                <div class="form-group">
                    {{ Form::label('price', trans('price'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('price', null, ['class' => 'form-control box-size', 'placeholder' => trans('price'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                

                <h4 class="col-md-2">Select Team Name</h4>
                <select class="btn btn-primary dropdown-toggle" data-toggle="dropdown" name="teams_id">
                  <option>select</option>
                   @foreach($data as $role)
                   <option  value="<?php echo $role->id ?>">
                   {{$role->Team_name}}</option>
                  @endForeach
                </select><br><br>
       

                {{ $users->links('backend.bids.pagination') }}



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
@endsection
