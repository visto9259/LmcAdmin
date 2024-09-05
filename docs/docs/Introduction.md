---
sidebar_position: 1
---
# Getting Started
LmcAdmin is a low-level module that helps Laminas MVC Framework developers to create an admin interface. 
The module allows to have a uniform layout, navigation structure and routing scheme. 
You can create controllers routed as a child of LmcAdmin, so you can easily change the (root) url, access control 
and other properties. 
The navigation is also flexible, to allow you having a structure built of pages in the admin interface with menus, 
breadcrumbs and other links.

## Requirements

- PHP 8.1 and later
- Laminas MVC 3.0 or later

## Installation

Install the module:

$ composer require lm-commons/lmc-admin

You will be prompted by the laminas-component-installer plugin to inject LM-Commons\LmcAdmin.

:::note[Manual installation:]

Enable the module by adding `Lmc\admin` key to your `application.config.php` or `modules.config.php` file for Laminas MVC
applications.
:::

Customize the module by copy-pasting
the `config/lmcadmin.global.php.dist` file to your `config/autoload` folder.


