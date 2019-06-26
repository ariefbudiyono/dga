<?php

Breadcrumbs::register('admin.customerorders.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.customerorders.management'), route('admin.customerorders.index'));
});

Breadcrumbs::register('admin.customerorders.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.customerorders.index');
    $breadcrumbs->push(trans('menus.backend.customerorders.create'), route('admin.customerorders.create'));
});

Breadcrumbs::register('admin.customerorders.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.customerorders.index');
    $breadcrumbs->push(trans('menus.backend.customerorders.edit'), route('admin.customerorders.edit', $id));
});
