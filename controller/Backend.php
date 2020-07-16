<?php 

namespace emmaliefmann\recipes\controller;

class Backend

{
    public function checkLogin() 
    {
        if (!isset($_SESSION['active'])) {
            $login = false ;
        }
        else {
            $login = $_SESSION['active'];
        }
        return $login;
    }

    public function logIn($email, $password)
    {
        $userManager = new \emmaliefmann\recipes\model\UserManager();
        $loginAttempt = $userManager->login($email);
        $dbResult = $loginAttempt->fetch();
        if ($dbResult) {
            
            $userInput = $password;
            $dbPassword = $dbResult['password'];
            $check = password_verify($userInput, $dbPassword);
            if ($check) {
                $_SESSION['active'] = true;
                $_SESSION['email'] = $email ;
                $_SESSION['name'] = $dbResult['username'];
                echo "correct password";
                
            }
            else {
                //require('view/backend/signin.php');
                echo password_hash('password', PASSWORD_DEFAULT);
                
            }
        }
        else {
            echo "wrong username";
        }
    }
}