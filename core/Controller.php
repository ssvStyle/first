<?php

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Controller extends Application {
    protected $_controller, $_action;
    public $view, $User, $Articles, $EntryModel, $SendEmail;
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
            $this->SendEmail = new PHPMailer;
                $this->SendEmail->CharSet = 'UTF-8';
                $this->SendEmail->isSMTP();
                $this->SendEmail->Host = SMPTHOST;//smpt server
                $this->SendEmail->SMTPAuth = true;
                $this->SendEmail->Username = EMAILUSERNAME; // Ваш логин
                $this->SendEmail->Password = EMAILPASS; // Ваш пароль
                $this->SendEmail->SMTPSecure = 'ssl';
                $this->SendEmail->Port = 465;
                $this->SendEmail->setFrom(EMAILUSERNAME); // Ваш Email
                $this->SendEmail->isHTML(true);
    }
    

}