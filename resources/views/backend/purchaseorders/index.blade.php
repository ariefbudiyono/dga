@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.purchaseorders.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.purchaseorders.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.purchaseorders.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.purchaseorders.partials.purchaseorders-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="purchaseorders-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.purchaseorders.table.id') }}</th>
                            <th>{{ trans('labels.backend.purchaseorders.table.supplier') }}</th>
                            <th>{{ trans('labels.backend.purchaseorders.table.po_code') }}</th>
                            <th>{{ trans('labels.backend.purchaseorders.table.tgl') }}</th>
                            <th>{{ trans('labels.backend.purchaseorders.table.partial_first_delivery') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var dataTable = $('#purchaseorders-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.purchaseorders.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.purchaseorders.table')}}.id'},
                    {data: 'supplier', name: '{{config('module.purchaseorders.table')}}.supplier'},
                    {data: 'po_code', name: '{{config('module.purchaseorders.table')}}.po_code'},
                    {data: 'tgl', name: '{{config('module.purchaseorders.table')}}.tgl'},
                    {data: 'partial_first_delivery', name: '{{config('module.purchaseorders.table')}}.partial_first_delivery'},
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
