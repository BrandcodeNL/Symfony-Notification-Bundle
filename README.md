# Symfony-Notification-Bundle

This bundle offers some default resources for managing and displaying (user bound) facebook like notifications on your website.

## Configure the bundle

1. Create your own notification entity and extend the notification entity in this bundle. 

```php
<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BrandcodeNL\SymfonyNotificationBundle\Entity\Notification as BaseNotification;

class Notification extends BaseNotification
{
    /**
     * @ORM\OneToMany(targetEntity="BrandcodeNL\SymfonyNotificationBundle\Entity\UserNotification", mappedBy="notification", cascade={"remove"})
     */
    private $userNotifications = [];
        
    public function getUserNotifications(): ?array 
        {
            return($this->userNotifications);
        }
            
        public function setUserNotifications(array $userNotifications): self
        {
            $this->userNotifications = $userNotifications;                
        }
            
        public function addUserNotification(UserNotification $userNotification): self
        {
            array_push($this->userNotifications, $userNotification);
            return $this;
        }
}
```
>While an empty notification class will also work, it is recommended to use this template as it will delete all links between 
the notification and your users when it is deleted. You may want to add something similar to your user class. Remember to 
change the mappedBy field to user when copy pasting the code for user use.

To link the notifications to your own User entity, implement the BrandcodeNL\SymfonyNotificationBundle\Model\UserInterface in your Entity. After add the following config following lines to your config.yml/doctrine.yml file.
```yaml
doctrine:
    orm: 
        resolve_target_entities:
            BrandcodeNL\SymfonyNotificationBundle\Model\UserInterface: Path\To\Your\Entity

```

There are some default routes included within this bundle for setting notifications to the status 'read', to use these you will have to include these routes in the routes.yml file.
```yaml
brandcodenl_symfony_notification_bundle_routing:
    resource: "@BrandcodeNLNotificationBundle/Controller"
    prefix: /
    type: annotation
```

If you wish to use any of the default views provided by this bundle you can include them in your views:
```twig
 {% include '@BrandcodeNLNotification/NotificationContainer.html.twig' %} 
```


