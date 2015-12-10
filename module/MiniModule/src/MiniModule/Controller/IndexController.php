<?php

namespace MiniModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\Factory;
use Zend\Form\Form;
use Zend\View\Model\ViewModel;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IndexController extends AbstractActionController {

//    public function indexAction(){
//        return array('nom' => 'tintin');
//    }
    public function indexAction() {
        return array();
    }

    public function gmapsAction() {
        $markers = array(
            'Mozzat Web Team' => '17.516684,79.961589',
            'Home Town' => '16.916684,80.683594'
        );  //markers location with latitude and longitude

        $config = array(
            'sensor' => 'true', //true or false
            'div_id' => 'map', //div id of the google map
            'div_class' => 'grid_6', //div class of the google map
            'zoom' => 5, //zoom level
            'width' => "600px", //width of the div
            'height' => "300px", //height of the div
            'lat' => 16.916684, //lattitude
            'lon' => 80.683594, //longitude 
            'animation' => 'none', //animation of the marker
            'markers' => $markers       //loading the array of markers
        );

        $map = $this->getServiceLocator()->get('GMaps\Service\GoogleMap'); //getting the google map object using service manager
        $map->initialize($config);                                         //loading the config   
        $html = $map->generate();                                          //genrating the html map content  
        return new \Zend\View\Model\ViewModel(array('map_html' => $html));                  //passing it to the view
    }

    public function formAction() {
        $services = $this->getServiceLocator();
        $form = $services->get('MiniModule\Form\Authentification');
        return array('form' => $form);
    }

    public function formvalidatorAction() {
        $services = $this->getServiceLocator();
        $form = $services->get('MiniModule\Form\Authentification');
//        return array('form' => $form);
        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $vm = new ViewModel();
                $vm->setVariables($form->getData());
                $vm->setTemplate('mini-module/index/formvalidatort');
                return $vm;
            }
        }
        $form->setAttribute('action', $this->url()->fromRoute('action', array('action' => 'formvalidator')));
        return array('form' => $form);
    }

    public function formvalidatortAction() {
        return array('login' => $_GET['log']);
    }
    
    public function formfilter(){
        
    }
    
    public function formfiltert(){
        return array('login' => $_GET['log']);
    }
}
