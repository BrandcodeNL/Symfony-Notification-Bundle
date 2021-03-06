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
     * @ORM\ManyToOne(targetEntity="BrandcodeNL\SymfonyNotificationBundle\Model\NotificationInterface")
     * @ORM\JoinColumn(name="notification_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $notification;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="BrandcodeNL\SymfonyNotificationBundle\Model\UserInterface")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status = false;

    public function getNotification():?NotificationInterface
    {
        return $this->notification;
    }
    public function setNotification(NotificationInterface $notification):UserNotificationInterface
    {
        $this->notification = $notification;
        return $this;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function setUser(UserInterface $user):UserNotificationInterface
    {
        $this->user = $user;
        return $this;
    }
    public function getStatus():?bool
    {
        return $this->status;
    }
    public function setStatus(bool $status): UserNotificationInterface
    {
        $this->status = $status;
        return $this;
    }
}