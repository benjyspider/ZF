<?php
namespace MiniModule\Form;

use Zend\Form\Factory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Form\Element\Submit;
use Zend\Form\Form;


class AuthentificationFormFactory implements  FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
//        $config = $serviceLocator->get('config_authentification_form');
//        $factory = new Factory();
//        $form = $factory->createForm( $config );
        $form = new Form();
        $form->add( new \MiniModule\Form\Element\Login());
        $form->add( new \MiniModule\Form\Element\Password());
        $form->add( new Submit( 'submit') );
        return $form;
    }
}