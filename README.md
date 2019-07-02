
# Material Dashboard Theme Bundle For Symfony 
The rights of the Material Dashboard theme belong to [Creative Tim].  
This bundle is under heavy development and as such not suitable for production.
### Installation
composer require webbamboo/material-dashboard-symfony

### Widgets
## Card-stats

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

type can be: 
 - warning
 - success
 - danger
 - info


footer_icon can be: 
 - date_range
 - local_offer
 - update
 - warning

Usage example:

    {% include '@MaterialDashboard/widgets/card-stats.html.twig' with {
        'type': 'success', 
        'icon': 'timeline', 
        'category': 'Used Space', 
        'title': '49/50', 
        'small': 'GB', 
        'footer_icon': 'date_range', 
        'footer_content': 'Last 24 hours',
        'additionalFooterIconClass': 'text-warning'
    } %}

### Configuration

    #/config/packages/material_dashboard.yaml
    #Menu configuration:
    material_dashboard:
    ...
        menu:
          dashboard:
            icon: dashboard
            path: dashboard
            parameters:
              - { name: language, value: en }

icon comes from http://material.io


Color options:
 - purple
 - azure
 - green
 - orange
 - danger
 - rose

#/config/packages/material_dashboard.yaml
material_dashboard:
	color: azure

Sidebar background options: 

 - ../assets/img/sidebar-1.jpg
 - ../assets/img/sidebar-2.jpg
 - ../assets/img/sidebar-3.jpg
 - ../assets/img/sidebar-4.jpg

#/config/packages/material_dashboard.yaml
material_dashboard:
	sidebar-background: ../assets/img/sidebar-1.jpg

License
----

MIT
    [Creative Tim]: https://github.com/creativetimofficial/material-dashboard

