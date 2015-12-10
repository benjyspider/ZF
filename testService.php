<?php
namespace Upjv\LicPro;
//use Zend\ServiceManager\Config;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require"./vendor/autoload.php";

class LicencePro{
    
    static $nbrInstance = 0;
    //var $toto;
    
    function __construct(){
        self::$nbrInstance++;
        //$this->toto = 'truc';
    }
    
    function __destruct(){
        self::$nbrInstance--;
    }
    
    static function getNbrInstance(){
        return self::$nbrInstance;
    }
}

/*$obj = new LicencePro();
echo LicencePro::getNbrInstance();
unset($obj);
echo LicencePro::getNbrInstance();*/

/*$config = array(
    'invokables' => array(
        'Upjv\LicPro\LicencePro' => 'Upjv\LicPro\LicencePro',
    ),
    'shared' => array(
        'promo' =>false,
    ),
);*/

//$config = include './conf.php';



$sm = new \Zend\ServiceManager\ServiceManager();
$smc = new \Zend\ServiceManager\Config(include './conf.php');
$smc->configureServiceManager($sm);

//$sm->setInvokableClass('promo', 'Upjv\LicPro\LicencePro');
//$sm->setShared('promo', false);

$obj = $sm->get('promo');
echo LicencePro::getNbrInstance()."\n";
$obj = $sm->get('promo');
echo LicencePro::getNbrInstance()."\n";
