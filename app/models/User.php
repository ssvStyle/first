<?php

class User extends Model{
    
    
    public function authorization($login, $pass) {
        if ($login == 1 && $pass == 1) {
            $_SESSION['user_id'] = 'hsdfukhw4ei7y8y4ri3g4t3f7i4873tiw6te';
            $_SESSION['name'] = 'Сергей';
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

