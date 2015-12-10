<?php
require "./vendor/autoload.php";


$route = \Zend\Mvc\Router\Http\Segment::factory(
        array(
            'route'=>'/:chemin',
            'constraints' => array(
                'chemin' => '[a-zA-Z]+',
            ))

);


$req = new \Zend\Http\Request();

$req->setUri('http://monsite/st');

$match = $route->match($req);

if ($match !== null) {

//echo $match­>getParam('param1')."\n";
echo "ok \n";
    
} else {

echo "ressource non connue \n";

}
