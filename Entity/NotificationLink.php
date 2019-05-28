<?php


namespace BrandcodeNL\NotificationBundle\Entity;

use BrandcodeNL\NotificationBundle\Entity\Notification;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class NotificationLink
{

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="BrandcodeNL\NotificationBundle\Model\NotificationInterface", inversedBy="notificationLink")
     * @ORM\JoinColumn(name="notification_id", referencedColumnName="id")
     */
    private $notification;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="BrandcodeNL\NotificationBundle\Model\UserInterface")
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