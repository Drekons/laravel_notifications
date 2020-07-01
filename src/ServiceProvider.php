<?php

namespace Drek\Laravel\Notifications;

use Drek\Laravel\Notifications\Services\Notifications\Repositories\EloquentNotificationsRepository;
use Drek\Laravel\Notifications\Services\Notifications\Repositories\NotificationsRepositoryInterface;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->bind(NotificationsRepositoryInterface::class , EloquentNotificationsRepository::class);
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/notifications.php');
        $this->loadMigrationsFrom(__DIR__ . '/../migrates/');
    }
}
