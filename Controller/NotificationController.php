<?php


namespace BrandcodeNL\SymfonyNotificationBundle\Controller;


use BrandcodeNL\SymfonyNotificationBundle\Entity\UserNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class NotificationController extends AbstractController
{

    /**
     * @Route("/notification/read/all", name="notification_read_all")
     */
    public function setAllNotificationRead(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $unread = $manager->getRepository(UserNotification::class)->findUserNotifications($this->getUser(), false);
        foreach ($unread as $notification) {
            $notification->setstatus(true);
        }
        $manager->flush();

        return new RedirectResponse($request->headers->get('referer'));
    }

    /**
     * @Route("/notification/read/{id}", name="notification_read")
     */
    public function setNotificationRead(Request $request, $id)
    {
        $manager = $this->getDoctrine()->getManager();
        $notification = $manager->getRepository(UserNotification::class)->findOneById($id);
        $notification->addReadNotification($this->getUser());
        $manager->flush();

        return new RedirectResponse($request->headers->get('referer'));
    }

}