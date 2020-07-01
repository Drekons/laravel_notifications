<?php

namespace Drek\Laravel\Notifications\Services\Notifications\Repositories;

use Drek\Laravel\Notifications\Models\Notification;

class EloquentNotificationsRepository implements NotificationsRepositoryInterface
{

    public function find(int $id)
    {
        return Notification::whereId($id)->first();
    }

    public function search(int $limit = 20)
    {
        return Notification::paginate($limit);
    }

    public function createFromArray(array $data): Notification
    {
        $project = new Notification();
        $project->create($data);
        return $project;
    }

    public function updateFromArray(Notification $notification, array $data)
    {
        $notification->update($data);

        return $notification;
    }

    public function delete(Notification $notification)
    {
        return $notification->delete();
    }
}
