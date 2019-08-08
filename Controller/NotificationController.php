<?php
namespace Webbamboo\MaterialDashboard\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Webbamboo\MaterialDashboard\Model\NotificationInterface;
use Webbamboo\MaterialDashboard\Services\ConfigService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class NotificationController extends AbstractController
{
    public function latest(Request $request, ConfigService $config)
    {
        if(!$config->notifications_enabled)
        {
            throw new \Exception("Notifications are disabled");
        }
        $repository = $this->getDoctrine()->getManager()->getRepository(NotificationInterface::class);
        $latestNotification = $repository->findOneBy(['user' => $this->getUser()], ['id' => 'DESC'], 1, 0);
        if($latestNotification)
        {
            return new JsonResponse(['created' => $latestNotification->getCreated()->getTimestamp()]);
        }
        return new JsonResponse(['created' => 0]);
    }

    public function all(Request $request, ConfigService $config)
    {
        if(!$config->notifications_enabled)
        {
            throw new \Exception("Notifications are disabled");
        }
        $repository = $this->getDoctrine()->getManager()->getRepository(NotificationInterface::class);
        $allNotifications = $repository->findBy(['user' => $this->getUser()], ['id' => 'DESC']);
        $response = [];
        foreach($allNotifications as $notification)
        {
            $response[] = [
                'data' => $notification->getData(),
                'description' => $notification->getDescription(),
                'created' => $notification->getCreated()
            ];
        }
        return $this->render('@MaterialDashboard/notification/layout.html.twig', ['notifications' => $response]);
    }
}