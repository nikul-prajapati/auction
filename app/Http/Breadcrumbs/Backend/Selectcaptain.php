<?php

Breadcrumbs::register('admin.selectcaptains.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.selectcaptains.management'), route('admin.selectcaptains.index'));
});

Breadcrumbs::register('admin.selectcaptains.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.selectcaptains.index');
    $breadcrumbs->push(trans('menus.backend.selectcaptains.create'), route('admin.selectcaptains.create'));
});

Breadcrumbs::register('admin.selectcaptains.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.selectcaptains.index');
    $breadcrumbs->push(trans('menus.backend.selectcaptains.edit'), route('admin.selectcaptains.edit', $id));
});
