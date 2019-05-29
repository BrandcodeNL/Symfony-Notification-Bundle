<?php


namespace BrandcodeNL\SymfonyNotificationBundle\Entity;

use BrandcodeNL\SymfonyNotificationBundle\Entity\Notification;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="BrandcodeNL\SymfonyNotificationBundle\Repository\NotificationLinkRepository")
 */
class NotificationLink
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

    public function getNotification():?Notification
    {
        return $this->notification;
    }
    public function setNotification($notification):self
    {
        $this->notification = $notification;
        return $this;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user):self
    {
        $this->user = $user;
        return $this;
    }
    public function getReadStatus():?bool
    {
        return $this->readStatus;
    }
    public function setReadStatus($readStatus): self
    {
        $this->readStatus = $readStatus;
        return $this;
    }
}