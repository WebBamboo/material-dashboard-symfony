---
title: Usage
---

## Usage
###Importing the base layout in twig

In order to use the base layout in your template add the following code at the beginning of your twig templates:

<code>
    &#123;% extends &#x22;@MaterialDashboard/base.html.twig&#x22; %&#125;
</code>

**We've defined the following Twig blocks:**

<code>
    &#123;% block meta_title %&#125;
</code>

<code>
    &#123;% block stylesheets %&#125;
</code>

<code>
    &#123;% block sidebar %&#125;
</code>

<code>
	&#123;% block search_bar %&#125;
</code>

<code>
    &#123;% block notifications %&#125;
</code>

<code>
    &#123;% block body %&#125;
</code>

<code>
    &#123;% block javascripts %&#125;
</code>

###Card stats dashboard widget

![cardstats.png]({{site.baseurl}}/cardstats.png)

You can use it by placing the following in your code templete:
<code>
    &#123;% include '@MaterialDashboard/widgets/card-stats.html.twig' with  &#123;
    'type': 'success', 
    'icon': 'timeline', 
    'category': 'Used Space', 
    'title': '49/50', 
    'small': 'GB', 
    'footer_icon': 'date_range', 
    'footer_content': 'Last 24 hours',
    'additionalFooterIconClass': 'text-warning'
&#125; %&#125;
</code>
The options are the following:
***type*** can be:
* warning
* success
* danger
* info


***icon*** can be:
Any icon from [material.io](http://material.io)


***category*** can be: free text

***title*** can be: free text

***small*** can be: free text

***footer\_icon*** can be:
* date\_range
* local\_offer
* update
* warning

***footer\_content*** can be: free text

***additionalFooterIconClass*** can be: any bootstrap text color class, eg. text-warning, text-success, text-info, text-primary etc.

The widget generates the following twig template:
```
<div class="card card-stats">
    <div class="card-header card-header-{{ type }} card-header-icon">
        <div class="card-icon">
        <i class="material-icons">{{ icon }}</i>
        </div>
        <p class="card-category">{{ category }}</p>
        <h3 class="card-title">{{ title }}
        <small>{{ small }}</small>
        </h3>
    </div>
    <div class="card-footer">
        <div class="stats">
        <i class="material-icons text-danger">{{ footer_icon }}</i>
        {{ footer_content|raw }}
        </div>
    </div>
</div>
```

### Table Helper
In order to make rendering of styled tables easier I've created a helper class that does all the styling for you, of course you can always style your own tables following the [Material Dashboard](https://demos.creative-tim.com/material-dashboard/examples/dashboard.html) examples.

How to use the table helper for easier rendering:
```
<?php
//src/Controller/DashboardController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Webbamboo\MaterialDashboard\Library\TableFactory;

class DashboardController extends AbstractController {
	   public function index(TableFactory $tableFactory)
     {
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
										"table" => $employeeStats
						]);
	    }
}
```
The factory create method accepts the following parameters:
```
?string $title, ?string $subtitle, ?string $style, ?array $rows, ?array $th
```

***Title***: Title of the table widget

***Subtitle***: Subtitle of the table widget

***Style***: Can be one of the following constants accessible from all classes implementing TableInterface or from the TableInterface directly: HEADER_INFO, HEADER_PRIMARY, HEADER_WARNING, HEADER_DANGER. ex. TableInterface::HEADER_INFO, TableFactory::HEADER_INFO, TableFactory::HEADER_INFO 

***Rows***: An array of arrays containing the table rows

***Th***: An array of strings specifying the table header


**In order to use the table in your Twig template you do the following:**

<code>
    &#123;&#123; tableRender(table) &#125;&#125;
</code>

You can use the table.render() function directly but that way you will have to use the Twig raw filter to render the html.

{% include footer_menu.html %}