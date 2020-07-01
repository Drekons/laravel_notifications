<?php


namespace Drek\Laravel\Notifications\Controllers;


use Drek\Laravel\Notifications\Services\Notifications\Repositories\NotificationsRepositoryInterface;
use Illuminate\Routing\Controller;

class NotificationsController extends Controller
{

    /**
     * @var NotificationsRepositoryInterface
     */
    private $notificationsRepository;

    public function __construct(NotificationsRepositoryInterface $notificationsRepository)
    {

        $this->notificationsRepository = $notificationsRepository;
    }

    public function index()
    {
        return $this->notificationsRepository->search()->toJson();
    }

    public function read(int $id)
    {
        $notification = $this->notificationsRepository->findProject($id);

        if (!$notification) {
            return response()->json(['status' => false]);
        }

        $notification = $this->notificationsRepository->updateFromArray($notification, ['read' => true]);

        return response()->json(['status' => (bool)$notification->read]);
    }

    public function destroy(int $id)
    {
        $notification = $this->notificationsRepository->findProject($id);

        if (!$notification) {
            return response()->json(['status' => false]);
        }

        $res = $this->notificationsRepository->delete($notification);

        return response()->json(['status' => $res]);
    }
}
