<?php

class About extends Controller {
    
    function __construct($controller, $action) {
        parent::__construct($controller, $action);
        
    }
    public function indexAction() {
        $this->view->render('about/index');
    }
}

