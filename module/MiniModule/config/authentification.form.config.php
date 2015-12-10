<?php

return array(
    'elements' => array(
        array(
            'spec' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'login',
                'attributes' => array(
                ),
                'options' => array(
                    'label' => 'login'
                ),
            ),
        ),
        array(
            'spec' => array(
                'type' => 'Zend\Form\Element\Password',
                'name' => 'mdp',
                'attributes' => array(
                ),
                'options' => array(
                    'label' => 'mdp'
                ),
            ),
        ),
        array(
            'spec' => array(
                'type' => 'Zend\Form\Element\Submit',
                'name' => 'submit',
                'attributes' => array(
                    'value' => 'test'
                ),
            ),
        ),
    ),
    'input_filter' => array(
        'login' => array(
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
        ),
    ),
);
//        $factory = new \Zend\Form\Factory();
//        $form = $factory->createForm($configForm);