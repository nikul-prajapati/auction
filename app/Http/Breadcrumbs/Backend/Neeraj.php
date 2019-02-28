<?php

Breadcrumbs::register('admin.neerajs.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.neerajs.management'), route('admin.neerajs.index'));
});

Breadcrumbs::register('admin.neerajs.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.neerajs.index');
    $breadcrumbs->push(trans('menus.backend.neerajs.create'), route('admin.neerajs.create'));
});

Breadcrumbs::register('admin.neerajs.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.neerajs.index');
    $breadcrumbs->push(trans('menus.backend.neerajs.edit'), route('admin.neerajs.edit', $id));
});
