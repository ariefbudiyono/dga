@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.warehouses.management') . ' | ' . trans('labels.backend.warehouses.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.warehouses.management') }}
        <small>{{ trans('labels.backend.warehouses.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($warehouses, ['route' => ['admin.warehouses.update', $warehouse], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-warehouse']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.warehouses.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.warehouses.partials.warehouses-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.warehouses.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.warehouses.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
