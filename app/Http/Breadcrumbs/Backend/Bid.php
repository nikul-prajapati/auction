<?php

Breadcrumbs::register('admin.bids.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.bids.management'), route('admin.bids.index'));
});

Breadcrumbs::register('admin.bids.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.bids.index');
    $breadcrumbs->push(trans('menus.backend.bids.create'), route('admin.bids.create'));
});

Breadcrumbs::register('admin.bids.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.bids.index');
    $breadcrumbs->push(trans('menus.backend.bids.edit'), route('admin.bids.edit', $id));
});
