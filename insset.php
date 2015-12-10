<?php
namespace Upjv;
require './vendor/autoload.php';
use Zend\ServiceManager\ServiceManager;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of insset
 *
 * @author user
 */
class insset {


$sm = new ServiceManager();

$sm­>setFactory('db', function() {

try {

} catch (Exception $e) {

}

return $db;

});

$db = $sm­>get('db');

if ( $argc > 1 )

{

$nom = $argv[1];

echo "ajout $nom\n";

$db­>exec('INSERT INTO "Client" ("Nom") VALUES (\''.$nom.'\')');

}

$autre = $sm­>get('db');

$stat = $autre­>query('SELECT * FROM Client');

while ( $result = $stat­>fetch() ) {

echo 'Nom : '.$result['Nom']."\n";

}
}
