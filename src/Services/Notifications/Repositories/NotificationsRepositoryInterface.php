<?php

namespace Drek\Laravel\Notifications\Services\Notifications\Repositories;

use Drek\Laravel\Notifications\Models\Notification;

interface NotificationsRepositoryInterface
{
    public function find(int $id);

    public function search(int $limit = 20);

    public function createFromArray(array $data): Notification;

    public function updateFromArray(Notification $notification, array $data);

    public function delete(Notification $notification);
}
