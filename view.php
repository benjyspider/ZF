<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require './vendor/autoload.php';

$vm = new \Zend\View\Model\ViewModel();

$vm->setVariables( array('nom' => 'tintin'));

$vm->setTemplate( 'liste' );

$rendu = new \Zend\View\Renderer\PhpRenderer();
echo $rendu->render( $vm );