<?php


namespace AppBundle\Twig;

use BrandcodeNL\NotificationBundle\Entity\NotificationLink;
use Doctrine\ORM\EntityManagerInterface;
use Twig\TwigFunction;

use Twig\Extension\AbstractExtension;


class NotificationExtension extends AbstractExtension
{

    private $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    public function getFunctions(): array
    {
        return array(
            new TwigFunction('getNotifications', array($this, 'getNotifications'))
        );
    }

    public function getNotifications($user, $read)
    {
        return $this->entityManager->getRepository(NotificationLink::class)->findNotificationLinks($user, $read);
    }
}