<?php

class Home extends Controller {
    
    function __construct($controller, $action) {
        parent::__construct($controller, $action);
        
    }
    public function indexAction() {
        $this->view->setData($this->Article->showAllArticles());
        $this->view->render('home/index');
    }
}

