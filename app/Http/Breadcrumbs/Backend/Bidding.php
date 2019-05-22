<?php

Breadcrumbs::register('admin.biddings.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.biddings.management'), route('admin.biddings.index'));
});

Breadcrumbs::register('admin.biddings.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.biddings.index');
    $breadcrumbs->push(trans('menus.backend.biddings.create'), route('admin.biddings.create'));
});

Breadcrumbs::register('admin.biddings.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.biddings.index');
    $breadcrumbs->push(trans('menus.backend.biddings.edit'), route('admin.biddings.edit', $id));
});
