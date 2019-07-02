<?php
namespace Webbamboo\MaterialDashboard\Services;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ConfigService
{
    public $menu_header;
    public $sidebar_background;
    public $color;
    public $menu;
    public $user_menu;

    public function __construct(ParameterBagInterface $params)
    {
        $this->menu_header = $params->get("material.menu_header");
        $this->sidebar_background = $params->get("material.sidebar_background");
        $this->color = $params->get("material.color");
        $this->menu = $params->get("material.menu");
        $this->user_menu = $params->get("material.user_menu");
    }
}