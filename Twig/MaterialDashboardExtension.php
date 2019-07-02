<?php
namespace Webbamboo\MaterialDashboard\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use Webbamboo\MaterialDashboard\Services\ConfigService;
use Symfony\Component\Routing\RouterInterface;
use Webbamboo\MaterialDashboard\Library\GraphWidget;
use Webbamboo\MaterialDashboard\Library\TableHelper;

class MaterialDashboardExtension extends AbstractExtension
{
    protected $config;
    protected $router;
    protected $tableHelper;

    public function __construct(ConfigService $config, RouterInterface $router, TableHelper $tableHelper)
    {
        $this->config = $config;
        $this->router = $router;
        $this->tableHelper = $tableHelper;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('sidebarBackground', [$this, 'sidebarBackground']),
            new TwigFunction('color', [$this, 'color']),
            new TwigFunction('menuHeader', [$this, 'menuHeader']),
            new TwigFunction('menuItems', [$this, 'menuItems']),
            new TwigFunction('userMenuItems', [$this, 'userMenuItems']),
            new TwigFunction('getItemRoute', [$this, 'getItemRoute']),
            new TwigFunction('materialGraph', [$this, 'materialGraph'], ['is_safe' => ['html']]),
            new TwigFunction('tableHelper', [$this, 'tableHelper'], ['is_safe' => ['html']])
        ];
    }
    public function tableHelper()
    {
        return $this->tableHelper;
    }
    
    public function materialGraph($data=null, $type='line', $options=null)
    {
        return new GraphWidget($data, $type, $options);
    }

    public function sidebarBackground()
    {
        return $this->config->sidebar_background;
    }
    public function color()
    {
        return $this->config->color;
    }

    public function menuHeader()
    {
        return $this->config->menu_header;
    }

    public function menuItems()
    {
        return $this->config->menu;
    }

    public function userMenuItems()
    {
        return $this->config->user_menu;
    }

    public function getItemRoute($path, $item)
    {
        $parameters = [];
        foreach($item['parameters'] as $parameterArray)
        {
            $parameters[$parameterArray['name']] = $parameterArray['value'];
        }
        return $this->router->generate($path, $parameters);
    }

    public function addTableRow(&$rows, $rowArray)
    {
        $rows = array_merge($rows, $rowArray);
    }
}