<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MiniModule;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Router\Http\Literal;
use Zend\Mvc;


class Module implements ConfigProviderInterface, BootstrapListenerInterface, AutoloaderProviderInterface
{

    public function getConfig()
    {
        return include __DIR__ . "/config/module.config.php";
    }

    public function onBootstrap(EventInterface $e) {
// $e­>getTarget() renvoit Zend\MVC\Application
//            $sm = $e->getTarget()->getServiceManager();
//            $view = $sm->get('ViewManager');
//            $resolv = new \Zend\View\Resolver\TemplateMapResolver(array(
//                'error' => __DIR__ . '/view/error.phtml',
//                'layout/layout' => __DIR__.'/view/layout.phtml',
//                )
//            );
//            $view->getRenderer()->setResolver( $resolv );
        $application = $e->getTarget();
        $event = $application->getEventManager();
        $event->attach(MvcEvent::EVENT_DISPATCH_ERROR, function (MvcEvent $e) {
            error_log('DISPATCH_ERROR : ' . $e->getError());
            error_log($e->getControllerClass() . ' ' . $e->getController());
        });
        $event->attach(MvcEvent::EVENT_RENDER_ERROR, function (MvcEvent $e) {
            error_log('RENDER_ERROR : ' . $e->getError());
        });

        $event->attach(MvcEvent::EVENT_RENDER, function (MvcEvent $e) {
            $services = $e->getApplication()->getServiceManager();
//            $form = $services->get('MiniModule\Form\Authentification');
            $session = $services->get('session');
            $rightViewModel = new ViewModel();
            if (!isset($session->user)) {
                $form = $services->get('MiniModule\Form\Authentification');
                $formUser = $services->get('MiniModule\Form\NewUser');
                $rightViewModel->setVariables(array('form' => $form, 'newUserForm' => $formUser));
                $rightViewModel->setTemplate('layout/form-auth');
            } else {
                $rightViewModel->setVariables(array('user' => $session->user));
                $rightViewModel->setTemplate('layout/info-auth');
            }
            $view = $e->getViewModel(); // c'est le viewModel qui contient le layout (top viewModel)
//            $formViewManager = new ViewModel(array('form' => $form));
//            $formViewManager->setTemplate('layout/form-auth');
//            $view->addChild($formViewManager, 'formulaireAuth');
            $view->addChild($rightViewModel, 'formulaireAuth');
        });
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

//$sm= $application->getServiceManager();
//$router= $sm->get('Router');
//$router->addRoute('principale', Literal::factory(array(
//    'route'=>'/',
//    'defaults' => array(
//        'controller' => 'index',
//        'action' => 'index',
//        )
//    )
//    )
//    );
//}
}
