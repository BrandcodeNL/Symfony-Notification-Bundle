<?php


namespace BrandcodeNL\SymfonyNotificationBundle\Controller;


use BrandcodeNL\SymfonyNotificationBundle\Entity\UserNotification;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class NotificationAjaxController extends AbstractController
{

    /**
     * @Route("/notification/ajax/read/all", name="notification_ajax_read_all", options={ "expose" = true })
     */
    public function setAllNotificationRead(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $unread = $manager->getRepository(UserNotification::class)->findUserNotifications($this->getUser(), false);
        foreach ($unread as $notification) {
            $notification->setReadStatus(true);
        }
        $manager->flush();

        return new RedirectResponse($request->headers->get('referer'));
    }

    /**
     * @Route("/notification/ajax/read/{id}", name="notification_ajax_read", options={ "expose" = true })
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