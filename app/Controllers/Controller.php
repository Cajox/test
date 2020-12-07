<?php
namespace App\Controllers;

use eftec\bladeone\BladeOne;

class Controller{

    public $view;

    function __construct()
    {
        $this->createView();
    }

    protected function createView()
    {
        $views = __DIR__."/../../views";
        $cache = __DIR__ . '/../../cache';
        $this->view = new BladeOne($views,$cache,BladeOne::MODE_DEBUG);
    }


    public function render($view, $data = array())
    {
        echo $this->view->run($view, $data);
        return true;
    }

}