<?php

namespace Webbamboo\MaterialDashboard\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Webbamboo\MaterialDashboard\Services\ConfigService;
use Webbamboo\MaterialDashboard\Library\TableHelper;

class ExampleController extends AbstractController
{
    public $tableHelper;

    public function __construct(TableHelper $tableHelper)
    {
        $this->tableHelper = $tableHelper;
    }

    /**
     * @Route("/example/", name="example_dashboard")
     */
    public function dashboard()
    {
        $graphOne = [
            'labels' => ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
            'series' => [[12, 17, 7, 17, 23, 18, 38]]
        ];
        $graphTwo = [
            'labels' => ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D'],
            'series' => [[542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]]
        ];
        $graphTwoOptions = [
            'low' => 0,
            'high' => 1000, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            'chartPadding' => (object)[
                'top' => 0,
                'right' => 0,
                'bottom' => 0,
                'left' => 0
            ],
        ];
        $graphThree = [
            'labels' => ['12p', '3p', '6p', '9p', '12p', '3a', '6a', '9a'],
            'series' => [
                [230, 750, 450, 300, 280, 240, 200, 190]
            ]
        ];

        $this->tableHelper->init(
            'Employees Stats', 
            'New employees on 15th September, 2016', 
            TableHelper::HEADER_INFO, 
            [
                [1, "Dakota Rice", "$36,728", "Niger"],
                [2, "Minerva Hooper", "$23,789", "Curaçao"],
                [3, "Sage Rodriguez", "$56,142", "Netherlands"],
                [4, "Philip Chaney", "$38,735", "Korea, South"],
            ], 
            [ 'ID', 'Name', 'Salary', 'Country' ]
        );
        
        return $this->render('@MaterialDashboard/example/dashboard.html.twig', [
            "graphOne" => $graphOne,
            "graphTwo" => $graphTwo,
            "graphTwoOptions" => $graphTwoOptions,
            "graphThree" => $graphThree,
            "table" => $this->tableHelper
        ]);
    }

    /**
     * @Route("/example/profile/", name="example_profile")
     */
    public function profile()
    {
        return $this->render('@MaterialDashboard/example/profile.html.twig', [
            
        ]);
    }

    /**
     * @Route("/example/controller/php", name="example_controller_php")
     */
    public function index(ConfigService $config)
    {
        dump($config);
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ExampleControllerPhpController.php',
        ]);
    }
}
