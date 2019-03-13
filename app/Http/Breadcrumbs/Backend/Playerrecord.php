<?php

Breadcrumbs::register('admin.playerrecords.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.playerrecords.management'), route('admin.playerrecords.index'));
});

Breadcrumbs::register('admin.playerrecords.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.playerrecords.index');
    $breadcrumbs->push(trans('menus.backend.playerrecords.create'), route('admin.playerrecords.create'));
});

Breadcrumbs::register('admin.playerrecords.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.playerrecords.index');
    $breadcrumbs->push(trans('menus.backend.playerrecords.edit'), route('admin.playerrecords.edit', $id));
});
