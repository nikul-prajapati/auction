@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.selectcaptains.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.selectcaptains.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.selectcaptains.management') }}</h3>

            <div class="box-tools pull-right">
<<<<<<< HEAD
                @include('backend.select_captains.partials.selectcaptains-header-buttons')
=======
                @include('backend.selectcaptains.partials.selectcaptains-header-buttons')
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="selectcaptains-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.selectcaptains.table.id') }}</th>
                            <th>{{ trans('labels.backend.selectcaptains.table.createdat') }}</th>
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
<<<<<<< HEAD
            var dataTable = $('#select_captains-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.select_captains.get") }}',
=======
            var dataTable = $('#selectcaptains-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.selectcaptains.get") }}',
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.selectcaptains.table')}}.id'},
                    {data: 'created_at', name: '{{config('module.selectcaptains.table')}}.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
<<<<<<< HEAD
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columnsF: [ 0, 1 ]  }},
=======
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1 ]  }},
>>>>>>> ac05c5a21c931d217e05f9713175aa9a694eef49
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
