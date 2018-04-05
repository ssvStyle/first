<?php

class User extends Model{
    protected $login, $email, $phone, $pass, $error;
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function authorization($login, $pass) {
        $pass = md5($pass);
        $result = $this->query("SELECT * FROM users WHERE phone='".$login."' AND pass='".$pass."' LIMIT 1")->fetchALL(PDO::FETCH_ASSOC);
             if ($login == $result[0]['phone'] && $pass == $result[0]['pass']) {
				$_SESSION['user_id'] = hash('tiger128,4', $result[0]['id']);
				$_SESSION['name'] = $result[0]['name'];
				$_SESSION['phone'] = $result[0]['phone'];
				$_SESSION['email'] = $result[0]['email'];
			}
    }
    public function logout($logout) {
        if ($logout === 'exit') {
        $_SESSION = array();
	setcookie (session_name(), '', time()-1000, '/');
	session_destroy();
        }
    }
    public function registration($param) {
        $this->checkUserName($param['name']);
        $this->checkUserEmail($param['email']);
        $this->checkUserLogin($param['phone']);
        $this->checkUserPass($param['pass'], $param['passConfirm']);
            if ($this->error == array()) {
                //add too DB
        } else {
            return $this->error;
        }
    }
    
    protected function checkUserName ($name){
        $regName = '#^[A-Z]{1}[a-z]{2,14}\s[A-Z]{1}[a-z]{2,14}$|^[A-Za-z]{3,14}$|^[А-Я]{1}[а-я]{2,14}\s[А-Я]{1}[а-я]{2,14}$|^[А-Я]{1}[а-я]{2,14}$|^[А-Яа-я]{3,14}$#u';
                if (empty($name)){
                    $this->error[] = '<img src="'.PROOT.'img/err.png" width="15px"> Login empty !!!';
                } else if(preg_match($regName, $name) === 1){
                    $this->login = $name;
                } else {
                    $this->error[] = '<img src="'.PROOT.'img/err.png" width="15px"> Login invalid !!!';
                }
    }
    protected function checkUserLogin($login) {
        $regPhone = '#^0{1}[3-9]{1}[0-9]{1}[0-9]{7}$#u';
        if (empty($login)){
                    $this->error[] = '<img src="'.PROOT.'img/err.png" width="15px"> Phone empty !!!';
                } else if(preg_match($regPhone, $login) === 1){
                    $this->phone = $login;
                } else {
                    $this->error[] = '<img src="'.PROOT.'img/err.png" width="15px"> Phone invalid !!!';
                }
        
    }
    protected function checkUserEmail($email) {
                if (empty($email)){
                     $this->error[] = '<img src="'.PROOT.'img/err.png" width="15px"> Email empty !!!';
                } else if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $this->email = $email;
                }  else {
                    $this->error[] = '<img src="'.PROOT.'img/err.png" width="15px"> Email invalid !!!';
                }
    }
    protected function checkUserPass($pass, $passConfirm) {
        if (empty($pass) || empty($passConfirm)){
                $this->error[] = '<img src="'.PROOT.'img/err.png" width="15px"> Password or password confirm empty !!!';
            } else if(strlen($pass) < 6){
                $this->error[] = '<img src="'.PROOT.'img/err.png" width="15px"> Short password !!!';;
            } else if(preg_match('#^\s+#u', $pass)) {
                $this->error[] = '<img src="'.PROOT.'img/err.png" width="15px"> Пробел не может быть паролем !!!';
            } else if(preg_match('#^\s+|^[А-Яа-я]+|^\s[А-Яа-я]|^\s[А-Яа-я]\s+|^[0-9]{1,15}$#u', $pass)) {
                $this->error[] = '<img src="'.PROOT.'img/err.png" width="15px"> Только латинский алфавит и цифры !!!';
            } else if ($pass !== $passConfirm) {
                $this->error[] = '<img src="'.PROOT.'img/err.png" width="15px"> Пароли не совпадают !!!';
            } else {
                $this->pass = $pass;
            }
        
    }
}

