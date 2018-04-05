<?php

class Registration extends Controller{
    
    //protected $error;
    
    function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }
    
    public function indexAction($error) {
        $this->view->setData($error);
        $this->view->render('registration/index');
    }
    public function newuserAction() {
       $error = $this->User->registration($_POST);
        if ($error == array()) {
            $this->view->render('newuser/index');
        } else {
            $this->indexAction($error);
        }
    }
}
