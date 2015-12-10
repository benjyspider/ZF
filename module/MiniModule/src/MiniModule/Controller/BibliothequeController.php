<?php

namespace MiniModule\Controller;

use Zend\View\Helper\ViewModel;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BibliothequeController extends \Zend\Mvc\Controller\AbstractActionController {

    private static $data = array(
        "200" => "toto",
        "100" => "titi"
    );

    public function isbnAction() {
        $isbn = $this->getEvent()->getRouteMatch()->getParam('isbn');
        $viewModel = new ViewModel(array('isbn' => $isbn));
        if (!array_key_exists($isbn, self::$data)) {
            $viewModel->setTemplate('mini-module/pastrouve');
        } else {
            $viewModel->setTemplate('mini-module/info-livre');
            $viewModel->setVariables(array('auteur' => self::$data[$isbn]));
        }
        return $viewModel;
    }

    public function auteurAction() {
        $auteur = $this->getEvent()->getRouteMAtch()->getParam('auteur');
        $viewModel = new ViewModel(array('auteur' => $auteur));
        if (array_search($auteur, self::$data)) {
            $isbn = array_keys(self::$data, $auteur);
        } else {
            $viewModel->setTemplate('miniModule/info-livre');
            $viewModel->setVariables(array('isbn' => self::$data[$isbn]));
        }
        return $viewModel;
    }

}
