@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.playerinformations.management') . ' | ' . trans('labels.backend.playerinformations.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.playerinformations.management') }}
        <small>{{ trans('labels.backend.playerinformations.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($playerinformations, ['route' => ['admin.playerinformations.update', $playerinformations], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-playerinformation']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.playerinformations.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.playerinformations.partials.playerinformations-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">

                {{-- Match Played --}}
                <div class="form-group">
                    {{ Form::label('played_match', trans('Match Played'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('played_match', null, ['class' => 'form-control box-size', 'placeholder' => trans('Match Played'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->



                {{-- total runs --}}
                <div class="form-group">
                    {{ Form::label('total_runs', trans('Total Runs'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('total_runs', null, ['class' => 'form-control box-size', 'placeholder' => trans('Total Runs'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->


                {{-- Total Wickets --}}
                <div class="form-group">
                    {{ Form::label('total_wickets', trans('Total Wickets'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('total_wickets', null, ['class' => 'form-control box-size', 'placeholder' => trans('Total Wickets'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->


                {{-- Speciality --}}
                <div class="form-group">
                    {{ Form::label('speciality', trans('Speciality'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('speciality', null, ['class' => 'form-control box-size', 'placeholder' => trans('Speciality'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->


                {{-- batsman type --}}
                <div class="form-group">
                    {{ Form::label('batsman_type', trans('Batsman Type'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('batsman_type', null, ['class' => 'form-control box-size', 'placeholder' => trans('Batsman Type'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->


                {{-- Bowler Type --}}
                <div class="form-group">
                    {{ Form::label('bowler_type', trans('Bowler Type'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('bowler_type', null, ['class' => 'form-control box-size', 'placeholder' => trans('Bowler Type'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- Age --}}
                <div class="form-group">
                    {{ Form::label('age', trans('Age'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('age', null, ['class' => 'form-control box-size', 'placeholder' => trans('Age'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

               

                


                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.playerinformations.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.playerinformations.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
