<?php

class Registration extends Controller{
    
    //protected $addNewUser;
    
    function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }
    
    public function indexAction() {
        $error = $this->User->registration($_POST);
        if ($error == array()) {
            $this->view->render('newuser/index');
        } else {
        $this->view->setData($error);
        $this->view->render('registration/index');
        }
    }
}
