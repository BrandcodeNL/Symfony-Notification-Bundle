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
}
```

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


