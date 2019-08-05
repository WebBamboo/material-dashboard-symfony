<?php
namespace Webbamboo\MaterialDashboard\Library;

use Webbamboo\MaterialDashboard\Library\TableHelper;
use Webbamboo\MaterialDashboard\Library\TableInterface;

class TableFactory implements TableInterface{
    private $templating;

    public function __construct( \Twig_Environment $templating )
    {
        $this->templating = $templating;
    }

    public function create(?string $title, ?string $subtitle, ?string $style, ?array $rows, ?array $th): TableHelper 
    {
        $tableHelper = new TableHelper($this->templating);
        $tableHelper->init($title, $subtitle, $style, $rows, $th);

        return $tableHelper;
    }
}