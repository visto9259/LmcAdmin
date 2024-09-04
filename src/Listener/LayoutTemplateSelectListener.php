<?php

namespace Lmc\Admin\Listener;

use Laminas\EventManager\AbstractListenerAggregate;
use Laminas\EventManager\EventManagerInterface;
use Laminas\Mvc\MvcEvent;
use Lmc\Admin\Options\ModuleOptions;

class LayoutTemplateSelectListener extends AbstractListenerAggregate
{

    public function __construct(protected ModuleOptions $moduleOptions)
    {
    }

    /**
     * @inheritDoc
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, [$this, 'selectLayoutBasedOnRoute'], $priority);
    }

    public function selectLayoutBasedOnRoute(MvcEvent $event): void
    {
        if (!$this->getModuleOptions()->getUseAdminLayout()) {
            return;
        }

        $routeMatch = $event->getRouteMatch();
        $controller = $event->getTarget();
        if (!str_starts_with($routeMatch->getMatchedRouteName(), 'lmcadmin')
            || $controller->getEvent()->getResult()->terminate()
        ) {
            return;
        }
        $controller->layout($this->getModuleOptions()->getAdminLayoutTemplate());
    }

    private function getModuleOptions(): ModuleOptions
    {
        return $this->moduleOptions;
    }
}
