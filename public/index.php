<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


chdir(dirname(__DIR__));

require __DIR__.'/../vendor/autoload.php';
//require __DIR__.'/../module/MiniModule/src/MiniModule/Controller/IndexController.php';

// Run the application!

Zend\Mvc\Application::init(require 'config/application.config.php')->run();