<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MiniModule\Form\Element;


use Zend\Form\Element;
use Zend\InputFilter\InputProviderInterface;

/**
 * Description of Password
 *
 * @author user
 */
class Password extends \Zend\Form\Element\Password implements \Zend\InputFilter\InputProviderInterface {
        public function __construct() {
        $options = array(
            'label' => 'password',
        );
        parent::__construct('password', $options);
        $this->setAttribute('size', 12);
    }
    
    
    public function getInputSpecification() {

        return array(
            'required' => true,
        );
    }

}
