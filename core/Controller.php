<?php

class Controller extends Application {
    protected $_controller, $_action;
    public $view, $User;
        function __construct($controller, $action) {
            parent::__construct();
            $this->_controller = $controller;
            $this->_action = $action;
            $this->view = new View();
            $this->User = new User();
            $this->User->authorization($_POST['login'], $_POST['pass']);
            $this->User->logout($_POST['logout']);
    }
    

}