<?php

Breadcrumbs::register('admin.players.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.players.management'), route('admin.players.index'));
});

Breadcrumbs::register('admin.players.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.players.index');
    $breadcrumbs->push(trans('menus.backend.players.create'), route('admin.players.create'));
});

Breadcrumbs::register('admin.players.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.players.index');
    $breadcrumbs->push(trans('menus.backend.players.edit'), route('admin.players.edit', $id));
});
