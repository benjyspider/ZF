<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
    'router' => array(
        'routes' => array(
            'bibliotheque' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'MiniModule\Controller\Index',
                        'action' => 'index'
                    ),
                ),
            ),
            'action' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/:action',
                    'constraints' => array(),
                    'defaults' => array(
                        'controller' => 'MiniModule\Controller\Index',
                        'action' => 'index'
                    ),
                ),
            ),
            'livre' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/livre',
                    'defaults' => array(
                        'controller' => 'MiniModule\Controller\Bibliotheque',
                        'action' => 'index',
                    )
                ),
                'child_routes' => array(
                    'isbn' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/[:isbn]',
                            'constraints' => array(
                                'isbn' => '[0-9_-]+',
                            ),
                            'defaults' => array(
                                'action' => 'isbn',
                            ),
                        ),
                    ),
                    'auteur' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/[:auteur]',
                            'constraints' => array(
                                'auteur' => '[a-zA-Z]+',
                            ),
                            'defaults' => array(
                                'action' => 'auteur',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            '404' => __DIR__ . '/../view/404.phtml',
            'error' => __DIR__ . '/../view/error.phtml',
            'errorlog' => __DIR__ . '/../view/errorlog.phtml',
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'layout/form-auth' => __DIR__ . '/../view/layout/formAuth.phtml',
            'layout/info-auth' => __DIR__ . '/../view/layout/infoAuth.phtml',
            'mini-module/index/index' => __DIR__ . '/../view/mini-module/index/index.phtml',
//            'mini-module/index/gmaps' => __DIR__ . '/../view/mini-module/index/index.phtml',
            'mini-module/index/form' => __DIR__ . '/../view/mini-module/index/form.phtml',
            'mini-module/index/formvalidator' => __DIR__ . '/../view/mini-module/index/formvalidator.phtml',
            'mini-module/index/formvalidatort' => __DIR__ . '/../view/mini-module/index/formvalidatort.phtml',
            'mini-module/index/formfilter' => __DIR__ . '/../view/mini-module/index/formfilter.phtml',
            'mini-module/index/formfiltert' => __DIR__ . '/../view/mini-module/index/formfiltert.phtml',
            'mini-module/bibliotheque/index' => __DIR__ . '/../view/mini-module/index/index.phtml',
            'mini-module/bibliotheque/isbn' => __DIR__ . '/../view/livre/livre.phtml',
            'mini-module/bibliotheque/auteur' => __DIR__ . '/../view/livre/livre.phtml',
            'layout/form-auth' => __DIR__ . '/../view/layout/formAuth.phtml',
            'layout/info-auth' => __DIR__ . '/../view/layout/infoAuth.phtml',
        ),
        'template_path_stack' => array(__DIR__ . '/../view/',),
    ),
    'controllers' => array(
        'invokables' => array(
            'MiniModule\Controller\Index' => 'MiniModule\Controller\IndexController',
            'MiniModule\Controller\Bibliotheque' => 'MiniModule\Controller\BibliothequeController',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'MiniModule\Form\Authentification' => 'MiniModule\Form\AuthentificationFormFactory',
            'MiniModule\Form\NewUser' => 'MiniModule\Form\NewUserFormFactory',
            'DbAdapterFactory' => 'MiniModule\Services\Factory\DbAdapterFactory',
        ),
        'services' => array(
            /* ajouter un service de session */
            'session' => new \Zend\Session\Container('minimodule'),
            'config_authentification_form' => include __DIR__ . '/authentification.form.config.php',
            'mini-module\form\config' => include __DIR__ . '/form.config.php',
        ),
    ),
);
