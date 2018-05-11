<?php

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class SendMail {
    //private $SendEmail;
    
    public static function Send($too, $header, $text) {
        $SendEmail = new PHPMailer;
                $SendEmail->CharSet = 'UTF-8';
                $SendEmail->isSMTP();
                $SendEmail->Host = SMPTHOST;//smpt server
                $SendEmail->SMTPAuth = true;
                $SendEmail->Username = EMAILUSERNAME; // Ваш логин
                $SendEmail->Password = EMAILPASS; // Ваш пароль
                $SendEmail->SMTPSecure = 'ssl';
                $SendEmail->Port = 465;
                $SendEmail->setFrom(EMAILUSERNAME); // Ваш Email
                $SendEmail->isHTML(true);
                
                $SendEmail->addAddress($too);
                $SendEmail->Subject = $header; // Заголовок письма
                $SendEmail->Body =  $text;
                $SendEmail->send();
    }
}