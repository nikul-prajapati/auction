<?php

Breadcrumbs::register('admin.playerinformations.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.playerinformations.management'), route('admin.playerinformations.index'));
});

Breadcrumbs::register('admin.playerinformations.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.playerinformations.index');
    $breadcrumbs->push(trans('menus.backend.playerinformations.create'), route('admin.playerinformations.create'));
});

Breadcrumbs::register('admin.playerinformations.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.playerinformations.index');
    $breadcrumbs->push(trans('menus.backend.playerinformations.edit'), route('admin.playerinformations.edit', $id));
});
