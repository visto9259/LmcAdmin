---
sidebar_position: 3
---
# Navigation
LmcAdmin provides a dedicated navigation structure for the admin interface. 
By default, LmcAdmin initiates a [Bootstrap](https://getbootstrap.com) layout on top the main admin navigation. 
These admin buttons are customizable.

## Add a page
The admin structure requires at least a `label` for the navigation element and a `route` or `url` parameter for the link to be created. The `route` will use the `url()` view helper to construct a link. It is recommended to use [routes](Routes) in your child pages of LmcAdmin and therefore it is straightforward to use the `route` parameter in the navigation configuration.

In the following example, there is a navigation element called "Users" and points to `lmcadmin/users` as a route. 
This page is configured as follows:

```php
'navigation' => [
    'admin' => [
        'my-module' => [
            'label' => 'Users',
            'route' => 'lmcadmin/users',
         ],
    ],
],
```

The navigation in LmcAdmin uses `Laminas\Navigation` and more information about the configuration of this component is 
located in the [Laminas Navigation](https://docs.laminas.dev/laminas-navigation/) reference guide.
