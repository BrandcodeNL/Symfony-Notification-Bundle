# Symfony-Notification-Bundle

This bundle houses some default resources for managing and displaying facebook style notifications on your website.

The first step to using this bundle is to extend the notification entity in this bundle

```php
<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BrandcodeNL\SymfonyNotificationBundle\Entity\Notification as BaseNotification;

class Notification extends BaseNotification
{
}
```

You then link this notification to another entity by implementing the UserNotificationInterface on the entity you want linked and adding 
the following lines to the config.yml/doctrine.yml file.
```yaml
doctrine:
    orm: 
        resolve_target_entities:
            BrandcodeNL\SymfonyNotificationBundle\Model\UserNotificationInterface: Path\To\Your\Entity

```

There are some default routes included within this bundle for setting notifications to read, to use these you will have 
to include their routes in the routes.yml file.
```yaml
brandcodenl_symfony_notification_bundle_routing:
    resource: "@BrandcodeNLNotificationBundle/Controller"
    prefix: /
    type: annotation
```

If you wish to use any of the default views provided by this bundle you will have to register a path for them in the config.yml/twig.yml file.
Note that the name has to be  brandcodenl_notification_bundle for the container view to work.
```yaml
twig:    
    paths:
        '%kernel.project_dir%/vendor/brandcodenl/symfony-notification-bundle/Resources/Views': brandcodenl_notification_bundle
```


