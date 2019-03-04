<?php

namespace App\Listeners\Backend\TeamCategories;

/**
 * Class BlogCategoryEventListener.
 */
class TeamEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'teams';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->teams->id)
            ->withText('trans("history.backend.teams.created") <strong>'.$event->teams->name.'</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->teams->id)
            ->withText('trans("history.backend.teams.updated") <strong>'.$event->teams->name.'</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->teams->id)
            ->withText('trans("history.backend.teams.deleted") <strong>'.$event->teams->name.'</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\teams\TeamCreated::class,
            'App\Listeners\Backend\teams\TeamEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\teams\TeamUpdated::class,
            'App\Listeners\Backend\teams\TeamEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\teams\TeamDeleted::class,
            'App\Listeners\Backend\teams\TeamEventListener@onDeleted'
        );
    }
}
