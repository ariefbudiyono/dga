@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.customerorders.management') . ' | ' . trans('labels.backend.customerorders.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.customerorders.management') }}
        <small>{{ trans('labels.backend.customerorders.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($customerorders, ['route' => ['admin.customerorders.update', $customerorders], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-customerorder']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.customerorders.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.customerorders.partials.customerorders-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.customerorders.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.customerorders.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
