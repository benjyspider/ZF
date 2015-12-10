<?php
require "./vendor/autoload.php";

$myEventManager = new \Zend\EventManager\EventManager();

$listener = function($e) {
	$p = $e->getParams();
	echo "Bonjour $p[0]\n";
};
$autre = function($e) {
	echo "bye\n";
};

$myEventManager->attach('lundi', $listener,1);
$myEventManager->attach('lundi', $autre,2);

$myEventManager->trigger('lundi', null, array('Nous sommes lundi'));
