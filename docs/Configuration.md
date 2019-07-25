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

3._color_ segment
This is the theme color option. Possible options are:

- purple
- azure
- green
- orange
- danger
- rose

4._menu_ and _user\_menu_ segment
The menu and user_menu segments are a yaml array containing all menu entries. Lets look in the example menu entry:

    example_dashboard:
        label: Home
        icon: dashboard
        parameters:
            - { name: language, value: en }		

-_example\_dashboard_ is the route name
-_label_ is the label in the menu
-_icon_ is a material icon name. You can see all [material icons here](http://material.io/)
-_parameters_ is a key => value array of the route parameters, same as you would supply to Twig's path() and url() functions

The menu segment applies to the left menu and the user_menu applies to the drop-down menu in the upper right corner