<?php

Breadcrumbs::register('admin.suppliers.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.suppliers.management'), route('admin.suppliers.index'));
});

Breadcrumbs::register('admin.suppliers.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.suppliers.index');
    $breadcrumbs->push(trans('menus.backend.suppliers.create'), route('admin.suppliers.create'));
});

Breadcrumbs::register('admin.suppliers.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.suppliers.index');
    $breadcrumbs->push(trans('menus.backend.suppliers.edit'), route('admin.suppliers.edit', $id));
});
