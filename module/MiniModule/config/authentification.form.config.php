<?php

return array(
            'elements' => array(
                array(
                    'spec' => array(
                        'type' => 'Zend\Form\Element\Text',
                        'name' => 'log',
                        'attributes' => array(
                        ),
                        'options' => array(
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
        );
//        $factory = new \Zend\Form\Factory();
//        $form = $factory->createForm($configForm);