<?php

Breadcrumbs::register('admin.details.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.details.management'), route('admin.details.index'));
});

Breadcrumbs::register('admin.details.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.details.index');
    $breadcrumbs->push(trans('menus.backend.details.create'), route('admin.details.create'));
});

Breadcrumbs::register('admin.details.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.details.index');
    $breadcrumbs->push(trans('menus.backend.details.edit'), route('admin.details.edit', $id));
});
