@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.playerinformations.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.playerinformations.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.playerinformations.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.playerinformations.partials.playerinformations-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="playerinformations-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.playerinformations.table.id') }}</th>
                            <th>{{ trans('First name') }}</th>
                            <th>{{ trans('Played match') }}</th>
                            <th>{{ trans('Total runs') }}</th>
                            <th>{{ trans('Total wickets') }}</th>
                            <th>{{ trans('Speciality') }}</th>
                            <th>{{ trans('Batsman type') }}</th>

                            <th>{{ trans('Bowler type') }}</th>
                            <th>{{ trans('Age') }}</th>
                            <th>{{ trans('Is_captain') }}</th>
                            <th>{{ trans('labels.backend.playerinformations.table.createdat') }}</th>
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
            var dataTable = $('#playerinformations-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.playerinformations.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.playerinformations.table')}}.id'},
                    {data: 'first_name', name: '{{config('module.users.table')}}.first_name'},
                    {data: 'played_match', name: '{{config('module.playerinformations.table')}}.played_match'},
                    {data: 'total_runs', name: '{{config('module.playerinformations.table')}}.total_runs'},
                    {data: 'total_wickets', name: '{{config('module.playerinformations.table')}}.total_wickets'},
                    {data: 'speciality', name: '{{config('module.playerinformations.table')}}.speciality'},
                    {data: 'batsman_type', name: '{{config('module.playerinformations.table')}}.batsman_type'},
                    {data: 'bowler_type', name: '{{config('module.playerinformations.table')}}.bowler_type'},
                    {data: 'age', name: '{{config('module.playerinformations.table')}}.age'},
                    {data: 'Is_captain', name: '{{config('module.playerinformations.table')}}.Is_captain'},
                    {data: 'created_at', name: '{{config('module.playerinformations.table')}}.created_at'},
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
