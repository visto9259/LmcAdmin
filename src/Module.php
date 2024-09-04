<?php
declare(strict_types = 1);

namespace Lmc\Admin;

use Laminas\EventManager\EventInterface;
use Laminas\Mvc\MvcEvent;
use Laminas\Router\RouteMatch as V3RouteMatch;

class Module
{
    public function getConfig(): array
    {
        $provider = new ConfigProvider();

        return [
            'service_manager' => $provider->getDependencyConfig(),
            'view_manager' => $provider->getViewManagerConfig(),
            'lmc_admin' => $provider->getModuleConfig(),
            'controllers' => $provider->getControllerConfig(),
            'navigation' => $provider->getNavigationConfig(),
            'router' => $provider->getRouterConfig(),
            'listeners' => $provider->getListenerConfig(),
        ];
    }
}
