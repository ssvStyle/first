<?php

class Controller extends Application {
    protected $_controller, $_action;
    public $view, $signin;
        function __construct($controller, $action) {
            parent::__construct();
            $this->_controller = $controller;
            $this->_action = $action;
            $this->view = new View();
            $this->signin = new User();
            $this->signin->authorization($_POST['login'], $_POST['pass']);
            $this->signin->logout($_POST['logout']);
    }
    

}