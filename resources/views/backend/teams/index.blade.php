@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.teams.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.teams.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.teams.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.teams.partials.teams-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="teams-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.teams.table.id') }}</th>
                            <th>{{ trans('labels.backend.teams.table.Team_name') }}</th>
                            <th>{{ trans('Base Points') }}</th>
                            <th>{{ trans('Available points') }}</th>
                            <th>{{ trans('labels.backend.teams.table.createdat') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
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
            var dataTable = $('#teams-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.teams.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.teams.table')}}.id'},
                    {data: 'Team_name', name: '{{config('module.teams.table')}}.Team_name'},
                    {data: 'Base_points', name: '{{config('module.teams.table')}}.Base_points'},
                    {data: 'Available_points', name: '{{config('module.teams.table')}}.Available_points'},
                    {data: 'created_at', name: '{{config('module.teams.table')}}.created_at'},
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
