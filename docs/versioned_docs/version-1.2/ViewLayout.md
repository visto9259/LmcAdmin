---
sidebar_position: 5
title: View & Layout
---
# View and layout scripts
LmcAdmin includes an admin layout and index view script, so LmcAdmin works out of the box. These view scripts are fully customizable, you can turn them off or render other scripts. All options are listed below.

## Override admin layout
You can define your own layout script. If you want a custom layout template, you must create a module where this layout is defined. Then the resolver can automatically find a version of the layout if you configure your module correctly. Say you have a module `MyAdmin`, create a module configuration to load view scripts for that module in the `module.config.php`:

```php
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    ),
```
The MyAdmin module must contain a `view` directory. Inside this directory, create another directory called `layout` and inside `layout` create a file `admin.phtml`. So this file is located (if your MyAdmin module is under the `module/` directory of your application) at `module/MyAdmin/view/layout/admin.phtml`.

Make sure MyAdmin is registered in the `application.config.php` and `LmcAdmin` is located *above* `MyAdmin`. Then your new admin template will be loaded.

## Override admin index view script
You can also define the script rendered when you visit `/admin`. The way to solve this is similar to changing the layout (see above), only the location of the view script is different. So create a new module, for example MyAdmin, and enable this configuration:

```php
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    ),
```
Then create the folders `lmc-admin/admin` inside the `view` directory. Inside `lmc-admin/admin`, create an `index.phtml` file. So this file is located (if your MyAdmin module is under the `module/` directory of your application) at `module/MyAdmin/view/lmc-admin/admin/index.phtml`.

Make sure MyAdmin is registered in the `application.config.php` and `LmcAdmin` is located *above* `MyAdmin`. Then your new index view script will be loaded.

## Rename admin layout
If you already have a `layout/admin` layout template and want to use another layout for LmcAdmin, you can rename the layout used. By default it is `layout/admin` but you can for example configure LmcAdmin to switch to `layout/backend`. You can enable this configuration to use another layout name:

```php
    'lmcadmin' => array(
        'admin_layout_template' => 'layout/backend'
    ),
```

## Disable layout
If you need a page with a controller where only the view script is rendered, you can disable the layout. Layout disabling works just like any other page outside LmcAdmin where you disable the layout. To accomplish this, you must terminate the view model in the controller:

```php
    public function indexAction()
    {
        $model = new ViewModel;
        $model->setTerminal(true);

        return $model;
    }
```

## Use normal `layout.phtml` layout
You can disable LmcAdmin to switch to the `layout/admin` layout at all. The routing and navigation still works, but the name of the layout script is untouched. You can enable this configuration to disable layout switching:

```php
    'lmcadmin' => array(
        'use_admin_layout' => false
    ),
```
