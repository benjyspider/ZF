<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MiniModule;

use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature;
use Zend\Mvc\Router\Http\Literal;
use Zend\Mvc;

class Module implements BootstrapListenerInterface, ConfigProviderInterface{
        
public function getConfig()
{
    return include __DIR__.'/config/module.config.php';
}

public function onBootstrap(EventInterface $e)
{
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
$event->attach(\Zend\Mvc\MvcEvent::EVENT_DISPATCH_ERROR, function(Mvc\MvcEvent $e) {
    error_log("Render _ error capturé :".$e->getError());
//error_log( $e->getError() );
//error_log( $e->getControllerClass().' '.$e->getController() );
});
}

public function getAutoloaderConfig()
{
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