<?php


namespace BrandcodeNL\SymfonyNotificationBundle\Entity;

use BrandcodeNL\SymfonyNotificationBundle\Entity\Notification;
use BrandcodeNL\SymfonyNotificationBundle\Model\UserInterface;
use BrandcodeNL\SymfonyNotificationBundle\Model\NotificationInterface;
use BrandcodeNL\SymfonyNotificationBundle\Model\UserNotificationInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="BrandcodeNL\SymfonyNotificationBundle\Repository\UserNotificationRepository")
 */
class UserNotification implements UserNotificationInterface
{

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="BrandcodeNL\SymfonyNotificationBundle\Entity\Notification")
     */
    private $notification;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="BrandcodeNL\SymfonyNotificationBundle\Model\UserInterface")
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $readStatus = false;

    public function getNotification():?NotificationInterface
    {
        return $this->notification;
    }
    public function setNotification(NotficationInterface $notification):self
    {
        $this->notification = $notification;
        return $this;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function setUser(UserInterface $user):self
    {
        $this->user = $user;
        return $this;
    }
    public function getReadStatus():?bool
    {
        return $this->readStatus;
    }
    public function setReadStatus(bool $readStatus): self
    {
        $this->readStatus = $readStatus;
        return $this;
    }
}