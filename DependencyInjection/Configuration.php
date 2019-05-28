<?php


namespace BrandcodeNL\NotificationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
        
    public function getConfigTreeBuilder()
    {
        $treebuilder = new TreeBuilder();
        $rootNode = $treebuilder->root('brandcodenl_notification');
        
        $rootNode
            ->children()
                ->integerNode('max_read_notifications')
                ->integerNode('max_unread_notifications')
            ->end()
        ;
        
        return $treebuilder;
    }
    
}