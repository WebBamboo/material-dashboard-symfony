<?php
namespace Webbamboo\MaterialDashboard\Library;

class TableHelper
{
    public $title;
    public $subtitle;
    public $rows = [];
    public $th;
    /*
     * Available options are: info, primary, warning, danger
     */
    public $style;

    const HEADER_INFO = 'info';
    const HEADER_PRIMARY = 'primary';
    const HEADER_WARNING = 'warning';
    const HEADER_DANGER = 'danger';
    

    private $templating;

    public function __construct( \Twig_Environment $templating )
    {
        $this->templating = $templating;
    }

    public function init(?string $title, ?string $subtitle, ?string $style, ?array $rows, ?array $th)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->rows = $rows ?: [];
        $this->th = $th ?: [];
        $this->style = $style ?: self::HEADER_INFO;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    public function addRow()
    {
        $args = func_get_args();
        $this->rows[] = $args;
    }

    public function addRows($rows)
    {
        $this->rows[] = $rows;
    }

    public function setHeaderCells()
    {
        $args = func_get_args();
        $this->th = $args;
    }

    public function render()
    {
        return $this->templating->render('@MaterialDashboard/widgets/card-table.html.twig', [
            'headerStyle' => $this->getHeaderStyle(),
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'th' => $this->th,
            'rows' => $this->rows
        ]);
    }

    public function getHeaderStyle()
    {
        return sprintf("card-header-%s", $this->style);
    }
}