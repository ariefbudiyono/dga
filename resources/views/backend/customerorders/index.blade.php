@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.customerorders.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.customerorders.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.customerorders.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.customerorders.partials.customerorders-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="customerorders-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.customerorders.table.id') }}</th>
                            <th>{{ trans('labels.backend.customerorders.table.factory') }}</th>
                            <th>{{ trans('labels.backend.customerorders.table.no_po') }}</th>
                            <th>{{ trans('labels.backend.customerorders.table.tgl') }}</th>                            
                            <th>{{ trans('labels.backend.customerorders.table.createdat') }}</th>
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
            
            var dataTable = $('#customerorders-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.customerorders.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.customerorders.table')}}.id'},
                    {data: 'factory', name: '{{config('module.customerorders.table')}}.factory.id'},
                    {data: 'no_po', name: '{{config('module.customerorders.table')}}.no_po',
                    "render": function(data, type, row, meta){
            if(type === 'display'){
                data = '<a href="' + '{{ route("admin.customerorderdetails.create") }}' + '">' + data + '</a>';
            }

            return data;
         }
                    },
                    {data: 'tgl', name: '{{config('module.customerorders.table')}}.tgl'},
                    {data: 'created_at', name: '{{config('module.customerorders.table')}}.created_at'},
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
