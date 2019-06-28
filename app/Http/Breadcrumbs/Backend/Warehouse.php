<?php

Breadcrumbs::register('admin.warehouses.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.warehouses.management'), route('admin.warehouses.index'));
});

Breadcrumbs::register('admin.warehouses.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.warehouses.index');
    $breadcrumbs->push(trans('menus.backend.warehouses.create'), route('admin.warehouses.create'));
});

Breadcrumbs::register('admin.warehouses.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.warehouses.index');
    $breadcrumbs->push(trans('menus.backend.warehouses.edit'), route('admin.warehouses.edit', $id));
});
