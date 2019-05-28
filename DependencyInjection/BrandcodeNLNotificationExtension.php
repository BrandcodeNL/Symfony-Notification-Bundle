<?php


namespace BrandcodeNL\NotificationBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class BrandcodeNLNotificationExtension extends extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        
        $config = $this->processConfiguration($configuration, $configs);
    }
    
}