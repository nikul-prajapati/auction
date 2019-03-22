@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.bids.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.bids.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('Bidding') }}</h3>

            <form method="POST" action=""  class="form-horizontal"> 

                <div class="form-group">
                

                  @foreach($users as $value) 
                    <label for="name" class="col-md-4 control-label">Player Name:</label>
                    <label for="name" class="col-md-4 control-label">{{$value->first_name}}</label>
                   <!--  <input type="text" class="col-md-6" name="name"  /> --> </div>
                   @endforeach


                <div class="form-group">
                    <label for="bprice" class="col-md-4 control-label">Base Price:</label>
                    <input type="text" class="col-md-6" value="200 points" disabled="disabled"  /></div>

                <div class="form-group">    
                    <label for="Name" class="col-md-4 control-label">Purchase Price:</label>
                    <input type="text" class="col-md-6" name="pprice"  /></div>

                <div class="form-group">

                    <label for="Team" class="col-md-4 control-label">Team: </label>
                    <select name="team_id" class="col-md-6" style="padding: 4px;"> 
                            <option>select</option>

                            @foreach($data as $role)

                                <option value="<?php echo $role->id ?>">
                                {{$role->Team_name}}</option>

                            @endforeach

                    </select>
                </div>   
                
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Submit</button>  
                </div>
                {{ $users->links() }}

               






             
        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
               
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        //Below written line is short form of writing $(document).ready(function() { })
        $(function() {
            var dataTable = $('#bids-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.bids.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.bids.table')}}.id'},
                    {data: 'created_at', name: '{{config('module.bids.table')}}.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
