<?php

namespace Webbamboo\MaterialDashboard\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Webbamboo\MaterialDashboard\Services\ConfigService;
use Webbamboo\MaterialDashboard\Library\TableFactory;
use Webbamboo\MaterialDashboard\Model\NotificationInterface;

class ExampleController extends AbstractController
{
    public function dashboard(TableFactory $tableFactory)
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

        $employeeStats = $tableFactory->create(
            'Employees Stats', 
            'New employees on 15th September, 2016', 
            TableFactory::HEADER_INFO, 
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
            "table" => $employeeStats
        ]);
    }

    public function profile()
    {
        return $this->render('@MaterialDashboard/example/profile.html.twig', [
            
        ]);
    }

    public function tableList()
    {
        return $this->render('@MaterialDashboard/example/table_list.html.twig', [
            
        ]);
    }

    public function typography()
    {
        return $this->render('@MaterialDashboard/example/typography.html.twig', [
            
        ]);
    }

    public function icons()
    {
        return $this->render('@MaterialDashboard/example/icons.html.twig', [
            
        ]);
    }

    public function maps()
    {
        return $this->render('@MaterialDashboard/example/maps.html.twig', [
            
        ]);
    }

    public function notifications()
    {
        return $this->render('@MaterialDashboard/example/notifications.html.twig', [
            
        ]);
    }

    public function rtl()
    {
        return $this->render('@MaterialDashboard/example/rtl.html.twig', [
            
        ]);
    }

    public function upgrade()
    {
        return $this->render('@MaterialDashboard/example/upgrade.html.twig', [
            
        ]);
    }

    public function externalCreativeTim() 
    {
        return $this->redirect('https://www.creative-tim.com/');
    }

    public function externalAboutUs() 
    {
        return $this->redirect('https://creative-tim.com/presentation');
    }

    public function externalBlog() 
    {
        return $this->redirect('http://blog.creative-tim.com/');
    }
    
    public function externalLicenses() 
    {
        return $this->redirect('https://www.creative-tim.com/license');
    }
}
