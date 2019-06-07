<?php


namespace BrandcodeNL\SymfonyNotificationBundle\Twig;

use BrandcodeNL\SymfonyNotificationBundle\Entity\UserNotification;
use Doctrine\ORM\EntityManagerInterface;
use Twig\TwigFunction;

use Twig\Extension\AbstractExtension;


class UserNotificationExtension extends AbstractExtension
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
        return $this->entityManager->getRepository(UserNotification::class)->findUserNotifications($user, $read);
    }
}