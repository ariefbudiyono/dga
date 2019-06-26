<?php

Breadcrumbs::register('admin.factories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.factories.management'), route('admin.factories.index'));
});

Breadcrumbs::register('admin.factories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.factories.index');
    $breadcrumbs->push(trans('menus.backend.factories.create'), route('admin.factories.create'));
});

Breadcrumbs::register('admin.factories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.factories.index');
    $breadcrumbs->push(trans('menus.backend.factories.edit'), route('admin.factories.edit', $id));
});
