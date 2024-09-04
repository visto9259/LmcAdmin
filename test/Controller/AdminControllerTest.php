<?php

namespace LmcTest\Admin\Controller;

use Laminas\Test\PHPUnit\Controller\AbstractControllerTestCase;

class AdminControllerTest extends AbstractControllerTestCase
{
    /*
    public function setUp(): void
    {
        $this->setApplicationConfig(
            include __DIR__ . '/../test.application.config.php'
        );
        parent::setUp();
    }
    */

    public function testIndexAction(): void
    {
        $this->setApplicationConfig(
            include __DIR__ . '/../test.application.config.php'
        );
        $this->dispatch('/admin');
        $this->assertResponseStatusCode(200);
        $this->assertTemplateName('layout/lmcadmin');
    }

    public function testIndexAction2(): void
    {
        $this->setApplicationConfig(
            [
                'modules' => [
                    'Laminas\Navigation',
                    'Laminas\Router',
                    'Lmc\Admin',
                ],
                'module_listener_options' => [
                    'config_glob_paths' => [
                        __DIR__ . '/testing.config.php',
                    ],
                    'module_paths' => [
                    ],
                ],
            ]
        );
        $this->dispatch('/admin');
        $this->assertResponseStatusCode(200);
        $this->assertTemplateName('layout/layout');
    }
}
