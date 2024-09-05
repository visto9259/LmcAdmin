---
sidebar_position: 5
title: View & Layout
---
# View and layout scripts
LmcAdmin includes an admin layout and index view script, so LmcAdmin works out of the box. These view scripts are fully 
customizable, you can turn them off or render other scripts. 
All options are listed below.

## Use the applications's default layout

You can disable LmcAdmin from using its own layout via configuration and the application's default layout
will be used.
The routing and navigation still works, but the applicaiton's default layout script will be used. 

You can modify the configuration to disable the usage of LmcAdmin layout. 

In `config/autoload/lmcadmin.global.php`:

```php
return [
    'lmc_admin' => [
        'use_admin_layout' => false
    ],
];
```

## Override the LmcAdmin layout
You can provide your own admin layout script. 

First create a layout view script in your application and define the View Manager template map to list 
your custom layout script. Then modify the LmcAdmin configuration to define the layout that LmcAdmin will use:

In `config/autoload/lmcadmin.global.php`:

```php
return [
    'lmc_admin' => [
        'admin_layout_template' => 'myapp/myadminlayout',
    ],
];
```

And in your module config:

```php
return [
    'view_manager' => [
        'template_map' => [
            'myapp/myadminlayout' => '/path/to/your/layout/template/script'
        ],
    ],
];
```

## Override the view script for the `AdminController` index action

You can also define the script rendered when you visit `/admin` which defaults to `AdminController::indexAction()`

`AdminController::indexAction()` will return a View Model using the template `lmc-admin/admin/index`.

Therefore, you can override the template via the View Manager template map.

In your module config:

```php
return [
    'view_manager' => [
        'template_map' => [
            'lmc-admin/admin/index' => '/path/to/your/template/script'
        ],
    ],
];
```
Make sure your module is registered in the `modules.config.php` ***after*** `LmcAdmin` to override LmcAdmin configuration.

## Disable layout
If you need a page within an admin controller where only the view script is rendered, 
you can disable the layout. 
Layout disabling works just like any other page outside LmcAdmin where you disable the layout. 
To accomplish this, you must terminate the view model in your controller:

```php
class MyAdminController extends AbstractActionController
 {
    public function indexAction()
    {
        $model = new ViewModel;
        $model->setTerminal(true);
        return $model;
    }
}
```
