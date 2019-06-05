<?php


namespace BrandcodeNL\SymfonyNotificationBundle\Controller;


use BrandcodeNL\SymfonyNotificationBundle\Entity\NotificationLink;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class NotificationAjaxController extends Controller
{

    /**
     * @Route("/notification/ajax/read/all", name="notification_ajax_read_all", options={ "expose" = true })
     */
    public function setAllNotificationRead()
    {
        $manager = $this->getDoctrine()->getManager();
        $unread = $manager->getRepository(NotificationLink::class)->findNotificationLinks($this->getUser(), false);
        foreach ($unread as $notification) {
            $notification->setReadStatus(true);
        }
        $manager->flush();

        return new JsonResponse([
            'done' => true,
            'html' => $this->render('@notification_bundle/NotificationContainer.html.twig', [
                "refresh" => true,
            ])->getContent(),
        ]);
    }

    /**
     * @Route("/notification/ajax/read/{id}", name="notification_ajax_read", options={ "expose" = true })
     */
    public function setNotificationRead($id)
    {
        $manager = $this->getDoctrine()->getManager();
        $notification = $manager->getRepository(NotificationLink::class)->findOneById($id);
        $notification->addReadNotification($this->getUser());
        $manager->flush();

        return new JsonResponse([
            'done' => true,
            'html' => $this->render('@notification_bundle/NotificationContainer.html.twig', [
                "refresh" => true,
            ])->getContent(),
        ]);
    }

}