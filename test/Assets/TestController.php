<?php

namespace LmcTest\Admin\Assets;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class TestController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel();
        $view->setTemplate('home/index');
        return $view;
    }

    public function terminateAction()
    {
        $view = new ViewModel();
        $view->setTerminal(true);
        $view->setTemplate('home/index');
        return $view;
    }
}
