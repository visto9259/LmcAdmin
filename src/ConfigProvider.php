<?php
declare(strict_types = 1);

namespace Lmc\Admin;

use Laminas\ServiceManager\Factory\InvokableFactory;
use Lmc\Admin\Listener\LayoutTemplateSelectListener;
use Lmc\Admin\Listener\LayoutTemplateSelectListenerFactory;
use Lmc\Admin\Options\ModuleOptions;
use Lmc\Admin\Options\ModuleOptionsFactory;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencyConfig(),
            'view_manager' => $this->getViewManagerConfig(),
            'lmc_admin'    => $this->getModuleConfig(),
            'controllers'  => $this->getControllerConfig(),
            'router'       => $this->getRouterConfig(),
        ];
    }

    public function getDependencyConfig(): array
    {
        return [
            'factories' => [
                'admin_navigation'                  => Navigation\Service\AdminNavigationFactory::class,
                ModuleOptions::class                => ModuleOptionsFactory::class,
                LayoutTemplateSelectListener::class => LayoutTemplateSelectListenerFactory::class,
            ],
        ];
    }

    public function getViewManagerConfig(): array
    {
        return [
            'template_path_stack' => [
                __DIR__ . '/../view',
            ],
            'template_map'        => [
                'lmc-admin/admin/index' => __DIR__ . '/../view/lmc/admin/index.phtml',
                'layout/lmcadmin'       => __DIR__ . '/../view/lmc/layout/admin.phtml',
            ],
        ];
    }

    public function getModuleConfig(): array
    {
        return [];
    }

    public function getNavigationConfig(): array
    {
        return [
            'admin' => [],
        ];
    }

    public function getControllerConfig(): array
    {
        return [
            'factories' => [
                Controller\AdminController::class => InvokableFactory::class,
            ],
        ];
    }

    public function getListenerConfig(): array
    {
        return [
            LayoutTemplateSelectListener::class,
        ];
    }

    public function getRouterConfig(): array
    {
        return [
            'routes' => [
                'lmcadmin' => [
                    'type'    => 'literal',
                    'options' => [
                        'route'    => '/admin',
                        'defaults' => [
                            'controller' => Controller\AdminController::class,
                            'action'     => 'index',
                        ],
                    ],
                    'may_terminate' => true,
                ],
            ],
        ];
    }
}
