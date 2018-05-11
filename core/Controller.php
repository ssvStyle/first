<?php

class Controller extends Application {
    protected $_controller, $_action;
    public $view, $User, $Articles, $EntryModel;
        function __construct($controller, $action) {
            parent::__construct();
            $this->_controller = $controller;
            $this->_action = $action;
            $this->Article = new Articles();
            $this->view = new View();
            $this->User = new User();
                if (isset($_POST['login']) && isset($_POST['pass'])){
                    $this->User->authorization($_POST['login'], $_POST['pass']);
                
                }
            isset($_POST['logout']) ? $this->User->logout($_POST['logout']) : false;
            $this->EntryModel = new EntryModel();
    }
    

}