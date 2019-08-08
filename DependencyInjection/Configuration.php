<?php
namespace Webbamboo\MaterialDashboard\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('material_dashboard');

        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('menu_header')
                    ->children()
                        ->scalarNode('title')->end()
                        ->scalarNode('anchor')->end()
                    ->end()
                ->end() // twitter
                ->scalarNode('notifications_enabled')->defaultValue(false)->end()
                ->scalarNode('sidebar_background')->defaultValue('../assets/img/sidebar-1.jpg')->end()
                ->scalarNode('color')->defaultValue('azure')->end()
                ->arrayNode('user_menu')
                    ->arrayPrototype()
                    ->children()
                        ->scalarNode('label')->end()
                        ->scalarNode('path')->end()
                            ->arrayNode('parameters')
                                ->arrayPrototype()
                                    ->children()
                                        ->scalarNode('name')->end()
                                        ->scalarNode('value')->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('menu')
                    ->arrayPrototype()
                    ->children()
                        ->scalarNode('label')->end()
                        ->scalarNode('icon')->end()
                        ->scalarNode('path')->end()
                        ->arrayNode('parameters')
                            ->arrayPrototype()
                                ->children()
                                    ->scalarNode('name')->end()
                                    ->scalarNode('value')->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}