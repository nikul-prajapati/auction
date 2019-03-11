@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.playerrecords.management') . ' | ' . trans('labels.backend.playerrecords.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.playerrecords.management') }}
        <small>{{ trans('labels.backend.playerrecords.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($playerrecord, ['route' => ['admin.playerrecords.update', $playerrecord], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-playerrecord']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.playerrecords.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.playerrecords.partials.playerrecords-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.playerrecords.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.playerrecords.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
