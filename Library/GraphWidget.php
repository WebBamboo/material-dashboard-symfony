<?php
namespace App\Webbamboo\MaterialDashboard\Library;

class GraphWidget
{
    public $id;
    public $data;
    public $options;
    public $type;

    const TYPE_LINE = 'line';
    const TYPE_BAR = 'bar';

    public function __construct(?array $data, $type=self::TYPE_LINE, ?array $options)
    {
        $this->id = $this->getUid();
        $this->data = $data;
        $this->type = $type;
        if($options)
        {
            $this->options = $options;
        }
        else
        {
            $this->options = (object)[
                'low' => 0,
                'high' => 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                'chartPadding' => (object)[
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0
                ],
            ];
        }
    }

    public function renderChart()
    {
        $chartOptions = '<script>window.'. $this->id. 'Options = ' . json_encode($this->options) . ';</script>';
        $chartData = $this->data ? '<script>window.'. $this->id. 'Data = ' . json_encode($this->data) . ';</script>' : '<script>window.'. $this->id. 'Data = [];</script>';
        $html = '<div class="ct-chart" id="' . $this->id . '" data-chartid="true" data-type="'. $this->type .'"></div>';

        return $chartOptions . $chartData . $html;
    }

    private function getUid($length=10)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}