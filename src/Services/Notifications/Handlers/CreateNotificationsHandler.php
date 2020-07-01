<?php


namespace Drek\Laravel\Notifications\Services\Notifications\Handlers;


use Carbon\Carbon;
use Drek\Laravel\Notifications\Models\Notification;
use Drek\Laravel\Notifications\Services\Notifications\Repositories\NotificationsRepositoryInterface;

class CreateNotificationsHandler
{

    /**
     * @var NotificationsRepositoryInterface
     */
    private $notificationsRepository;

    public function __construct(
        NotificationsRepositoryInterface $notificationsRepository
    )
    {
        $this->notificationsRepository = $notificationsRepository;
    }


    public function handle(array $data): Notification
    {
        $data['created_at'] = Carbon::create()->subDay();

        return $this->notificationsRepository->createFromArray($data);
    }
}
