---
sidebar_position: 2
---
# Routes
LmcAdmin defines a single route named `lmcadmin`, which is a `Laminas\Router\Http\Literal` route and mapped to the url `/admin`. 
You can create child routes under `lmcadmin` so you can enable urls like `/admin/users` or `/admin/roles/permissions`.

## Add child route
To register a route as child route, the following example takes the option you name the route `users`. 
The complete path should look like `/admin/users`, so `users` is a literal route with the route value `/users`. 
Say you want this route to connect to the `MyAdminModule\Controller\UsersController` controller and the `index` action, 
create this config in your `module.config.php`:

```php
'router' => [
    'routes' => [
        'lmcadmin' => [
            'child_routes' => [
                'users' => [
                    'type' => Laminas\Router\Http\Literal::class,
                    'options' => [
                        'route' => '/users',
                        'defaults' => [
                            'controller' => MyAdminModule\Controller\UsersController::class,
                            'action'     => 'index',
                        ],
                    ],
                ],
            ],
        ],
    ],
],
```

## Change the `/admin` url
If you want your admin interface at `/backend` or something else, you must override the value of the route. In the 
following config, the `/admin` route value is replaced with `/backend`. Make sure this is enabled in a config where the 
module is registered ***after*** LmcAdmin (otherwise, the config will not overwrite LmcAdmin's configuration):

```php
'router' => [
    'routes' => [
        'lmcadmin' => [
            'options' => [
                'route'    => '/backend',
         ],
    ],
],
```

## Change the controller behind `/admin`
By default, the `/admin` url links to the `LmcAdmin\Controller\AdminController` controller.
`LmcAdmin\Controller\AdminController` is an simple action that only returns a simple view script. 
If you want, for example, to create a dashboard on the admin index page, you probably need to point the route to 
another controller. 
In the following config, the `lmcadmin` route's controller is replaced with `MyAdminModule/Controller/AdminController` 
and the action is set to `dashboard`. 
Make sure this is enabled in a config where the module is registered ***later*** LmcAdmin (otherwise, the config will 
not overwrite LmcAdmin's configuration):

```php
'router' => [
    'routes' => [
        'lmcadmin' => [
            'options' => [
                'defaults' => [
                    'controller' => MyModule\Controller\AdminController::class,
                    'action'     => 'dashboard',
                ],
            ],
        ],
    ],
],
```
