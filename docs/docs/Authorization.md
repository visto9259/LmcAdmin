---
sidebar_position: 4
---
# Authorization

It is typical to implement some form of authorization to restrict access to admin functions to users with 
administrative privileges.

LmcAdmin does not prescribe a specific authorization framework.

However, LmcAdmin can enable authorization via [LmcRbacMvc](https://lm-commons.github.io/LmcRbac). 

## Authorization using LmcRbacMvc 

Configuration for LmcRbacMvc module is provided to easily configure LmcAdmin.
Authorization enables you to restrict access to `/admin` and every other page under LmcAdmin.

To enable access restriction with LmcRbacMvc, install the module and enable it in your application. 

There is a sample LmcRbacMvc configuration in the`config/lmcadmin.global.php.dist` file. 
Copy this file over to your `config/autoload` directory.

It provides LmcRbacMvc configuration to restrict access to users for the `/admin` route. 
Only users in the "admin" group are allowed to access LmcAdmin pages.

Uncomment the following lines:

```php
return [
    /**
     * Suggested LmcRbacMvc configuration for RBAC
     */
    'lmc_rbac' => [
        'guards' => [
            'Lmc\Rbac\Mvc\Guard\RouteGuard' => [
                'lmcadmin*' => ['admin'],
            ],
        ],
    ],
];
```

Instructions for further configuration of LmcRbacMvc are provided in the LmcRbacMvc [documentation](https://lm-commons.github.io/LmcRbacMvc).
