<?php


namespace BrandcodeNL\SymfonyNotificationBundle\Model;


interface UserNotificationInterface
{
    public function getNotification():?NotificationInterface;
   
    public function setNotification(NotificationInterface $notification):self;
   
    public function getUser();
    
    public function setUser(UserInterface $user):self;
  
    public function getstatus():?bool;
    
    public function setstatus(bool $status): self;
   
}