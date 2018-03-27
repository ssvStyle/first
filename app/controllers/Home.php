<?php

class Home extends Controller {
    
    function __construct($controller, $action) {
        parent::__construct($controller, $action);
        
    }
    public function indexAction() {
        $this->view->render('home/index');
    }
    public function successAction() {
        //$this->view->render('home/index');
        //$method= 'this is the success method';
    }
}

