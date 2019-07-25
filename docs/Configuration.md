## Configuration

In 'config/packages/' create a file called: _materialdashboard.yaml_

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




