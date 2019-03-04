@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.details.management') . ' | ' . trans('labels.backend.details.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.details.management') }}
        <small>{{ trans('labels.backend.details.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($detail, ['route' => ['admin.details.update', $detail], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-detail']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.details.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.details.partials.details-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.details.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.details.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
