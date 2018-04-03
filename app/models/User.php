<?php

class User extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function authorization($login, $pass) {
        $pass = md5($pass);
        $result = $this->query("SELECT * FROM users WHERE phone='".$login."' AND pass='".$pass."' LIMIT 1")->fetchALL(PDO::FETCH_ASSOC);
             if ($login == $result[0]['phone'] && $pass == $result[0]['pass']) {
				$_SESSION['user_id'] = hash('tiger128,4', $result[0][id]);
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
}

