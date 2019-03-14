<?php

Breadcrumbs::register('admin.playerrecordsusers.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.playerrecordsusers.management'), route('admin.playerrecordsusers.index'));
});

Breadcrumbs::register('admin.playerrecordsusers.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.playerrecordsusers.index');
    $breadcrumbs->push(trans('menus.backend.playerrecordsusers.create'), route('admin.playerrecordsusers.create'));
});

Breadcrumbs::register('admin.playerrecordsusers.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.playerrecordsusers.index');
    $breadcrumbs->push(trans('menus.backend.playerrecordsusers.edit'), route('admin.playerrecordsusers.edit', $id));
});
