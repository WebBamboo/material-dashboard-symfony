## Configuration

In 'config/packages/' create a file called: _material\_dashboard.yaml_

Example configuration:

    material_dashboard:
      menu_header:
          title: Material Dashboard
          anchor: /
      sidebar_background: /bundles/materialdashboard/img/sidebar-1.jpg
      color: green 
      menu:
          example_dashboard:
              label: Home
              icon: dashboard
              parameters:
                  - { name: language, value: en }
      user_menu:
          example_profile:
              label: Profile
              parameters:
                  - { name: language, value: en }
                  
## Step by step explanation
1._menu\_header_ segment
![menuheader.png]({{site.baseurl}}/docs/menuheader.png)

This applies to the Header of the left menu. In my example the text of the header is "Material Dashboard" and the anchor points to "/"

2._sidebar\_background_ segment

This tells the sidebar which image to use. Available options included in the dashboard are
- /bundles/materialdashboard/img/sidebar-1.jpg
- /bundles/materialdashboard/img/sidebar-2.jpg
- /bundles/materialdashboard/img/sidebar-3.jpg
- /bundles/materialdashboard/img/sidebar-4.jpg



