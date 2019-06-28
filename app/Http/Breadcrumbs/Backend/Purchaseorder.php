<?php

Breadcrumbs::register('admin.purchaseorders.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.purchaseorders.management'), route('admin.purchaseorders.index'));
});

Breadcrumbs::register('admin.purchaseorders.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.purchaseorders.index');
    $breadcrumbs->push(trans('menus.backend.purchaseorders.create'), route('admin.purchaseorders.create'));
});

Breadcrumbs::register('admin.purchaseorders.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.purchaseorders.index');
    $breadcrumbs->push(trans('menus.backend.purchaseorders.edit'), route('admin.purchaseorders.edit', $id));
});
