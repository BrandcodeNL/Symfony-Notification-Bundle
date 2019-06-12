<?php


namespace BrandcodeNL\SymfonyNotificationBundle\Model;


interface UserNotificationInterface
{
    public function getNotification():?Notification;
   
    public function setNotification(NotifcationInterface $notification):self;
   
    public function getUser();
    
    public function setUser(UserInterface $user):self;
  
    public function getReadStatus():?bool;
    
    public function setReadStatus(bool $readStatus): self;
   
}