<?php

Breadcrumbs::register('admin.purchaseorderdetails.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.purchaseorderdetails.management'), route('admin.purchaseorderdetails.index'));
});

Breadcrumbs::register('admin.purchaseorderdetails.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.purchaseorderdetails.index');
    $breadcrumbs->push(trans('menus.backend.purchaseorderdetails.create'), route('admin.purchaseorderdetails.create'));
});

Breadcrumbs::register('admin.purchaseorderdetails.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.purchaseorderdetails.index');
    $breadcrumbs->push(trans('menus.backend.purchaseorderdetails.edit'), route('admin.purchaseorderdetails.edit', $id));
});
