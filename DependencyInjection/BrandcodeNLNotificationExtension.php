<?php


namespace BrandcodeNL\NotificationBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class BrandcodeNLNotificationExtension extends extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container, 
            new FileLocator(__DIR__.'/../Resources/Config')
        );
        
        $loader->load('config.yml');
        
        $configuration = new Configuration();
        
        $config = $this->processConfiguration($configuration, $configs);
    }
    
}