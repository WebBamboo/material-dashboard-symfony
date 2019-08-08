<?php
namespace Webbamboo\MaterialDashboard\DependencyInjection;

use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Webbamboo\MaterialDashboard\Services\ConfigService;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;

class MaterialDashboardExtension extends Extension
{
    private $config;

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yaml');

        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);  
        $this->config = $config;
        $container->setParameter("material.menu_header", $this->getDefaultsIfUnset($config, 'menu_header'));
        $container->setParameter("material.sidebar_background", $this->getDefaultsIfUnset($config, 'sidebar_background'));
        $container->setParameter("material.color", $this->getDefaultsIfUnset($config, 'color'));
        $container->setParameter("material.menu", $this->getDefaultsIfUnset($config, 'menu'));
        $container->setParameter("material.user_menu", $this->getDefaultsIfUnset($config, 'user_menu'));
        $container->setParameter("material.notifications_enabled", $this->getDefaultsIfUnset($config, 'notifications_enabled'));
    }

    private function getDefaultsIfUnset($config, $property)
    {
        $defaults = [
            'menu_header' => [
                'title' => 'Material Dashboard',
                'anchor' => '/'
            ],
            'sidebar_background' => '/bundles/materialdashboard/img/sidebar-1.jpg',
            'color' => 'green',
            'menu' => [
                'example_dashboard' => [
                    'label' => 'Home',
                    'icon' => 'dashboard',
                    'parameters' => [ 'name' => 'language', 'value' => 'en' ]
                ]
            ],
            'user_menu' => [
                'example_profile' => [
                    'label' => 'Profile',
                    'parameters' => [ 'name' => 'language', 'value' => 'en' ]
                ]
            ],
            'notifications_enabled' => false
        ];

        return isset($config[$property]) ? $config[$property] : $defaults[$property];
    }
}