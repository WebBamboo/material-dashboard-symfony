<?php
namespace Webbamboo\MaterialDashboard\DependencyInjection;

use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use App\Webbamboo\MaterialDashboard\Services\ConfigService;
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
        $container->setParameter("material.menu_header", $config['menu_header']);
        $container->setParameter("material.sidebar_background", $config['sidebar_background']);
        $container->setParameter("material.color", $config['color']);
        $container->setParameter("material.menu", $config['menu']);
        $container->setParameter("material.user_menu", $config['user_menu']);
    }
}