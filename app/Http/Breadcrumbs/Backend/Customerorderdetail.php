<?php

Breadcrumbs::register('admin.customerorderdetails.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.customerorderdetails.management'), route('admin.customerorderdetails.index'));
});

Breadcrumbs::register('admin.customerorderdetails.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.customerorderdetails.index');
    $breadcrumbs->push(trans('menus.backend.customerorderdetails.create'), route('admin.customerorderdetails.create'));
});

Breadcrumbs::register('admin.customerorderdetails.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.customerorderdetails.index');
    $breadcrumbs->push(trans('menus.backend.customerorderdetails.edit'), route('admin.customerorderdetails.edit', $id));
});
