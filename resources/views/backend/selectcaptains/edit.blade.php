@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.selectcaptains.management') . ' | ' . trans('labels.backend.selectcaptains.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.selectcaptains.management') }}
        <small>{{ trans('labels.backend.selectcaptains.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($selectcaptains, ['route' => ['admin.selectcaptains.update', $selectcaptains], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-selectcaptain']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.selectcaptains.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.selectcaptains.partials.selectcaptains-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->
             <h4 class="col-md-2">Select Team Name</h4>
        <select class="btn btn-primary dropdown-toggle" data-toggle="dropdown" name="teams_id" required="required">
          <option  label="select"></option>
           @foreach($team as $role)
           <option  value="<?php echo $role->id ?>">
           {{$role->Team_name}}</option>
          @endForeach
        </select><br><br>
       

       <h4 class="col-md-2">Select Captain Name</h4>
        <select class="btn btn-primary"  data-toggle="dropdown" name="users_id" required="required">
        <option value="$selectcaptains"></option>
        @foreach($user as $rol)
           <option value="<?php echo $rol->id ?>">
           {{$rol->first_name}}</option>
          @endForeach
        </select>

 
            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.selectcaptains.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.selectcaptains.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
