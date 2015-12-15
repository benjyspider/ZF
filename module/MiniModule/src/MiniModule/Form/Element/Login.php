<?php

namespace MiniModule\Form\Element;

use Zend\Form\Element;
use Zend\InputFilter\InputProviderInterface;

class Login extends \Zend\Form\Element\Text implements \Zend\InputFilter\InputProviderInterface {

    public function __construct() {
        $options = array(
            'label' => 'login',
        );
        parent::__construct('login', $options);
        $this->setAttribute('size', 12);
    }

    public function getInputSpecification() {

        return array(
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'Zend\I18n\Validator\Alpha',
                ),
            ),
            'filters' => array(
                array(
                    'name' => 'Zend\I18n\Filter\Alpha'
                ),
            ),
        );
    }

}
