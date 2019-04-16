@extends ('backend.layouts.app')

@section ('title', trans('biddings_management') . ' | ' . trans('create'))

@section('page-header')
    <h1>
        {{ trans(' Bidding Management') }}
        <small>{{ trans('create') }}</small>
    </h1>
@endsection

@section('content')

<!--<script src="js/jquery.min.js" /></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<div class="body">

<div id="element">

    {{ Form::open(['route' => 'admin.biddings.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-bidding']) }}

        <div class="box box-info">
           <div class="box-header with-border">
              <h3 class="box-title">{{ trans('Biddings create') }}</h3>
                <div class="box-tools pull-right">
                    @include('backend.biddings.partials.biddings-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->


          
            <div class="box-body">
                <div class="form-group"> 
                    {{ Form::label('users_id', trans('Name:'), ['class' => 'col-lg-2 control-label']) }}
                    <div class="col-md-1">
                        @foreach($users as $value)
                        <label for="name" class="col-md-4 control-label" >{{$value->first_name}}
                        </label>
                        @endforeach
                    </div><!--col-lg-10-->
                </div><!--form control-->


                {{-- Price --}}
                <div class="form-group">
                    {{ Form::label('price', trans('Price:'), ['class' => 'col-lg-2 control-label required']) }}
                    <div class="col-md-5">
                        {{ Form::text('price', null, ['class' => 'form-control box-size', 'placeholder' => trans('price'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                 </div><!--form control-->

                <div class="form-group">
                 {{ Form::label('Select team', trans('Team'), ['class' => 'col-lg-2 control-label required']) }}
                <div class="col-md-5">
                <select data-toggle="dropdown" name="teams_id" class="btn btn-primary dropdown-toggle" aria-expanded="false" style="width: 30%;">
                  <option>select</option>
                   @foreach($data as $role)
                   <option  value="<?php echo $role->id ?>">
                   {{$role->Team_name}}</option>
                  @endForeach
                </select><br><br>
            </div></div>


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


  <button id="go-button">Enable Full Screen</button>

</div>  <!-- element -->
</div>

@endsection
