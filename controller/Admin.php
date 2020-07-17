<?php 

namespace emmaliefmann\recipes\controller;

class Admin

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
                $_SESSION['userId'] = $dbResult['id'];
                header('location: index.php?action=member&page=dashboard');
                
            }
            else {
                //require('view/backend/signin.php');
                echo "wrong password";
            }
        }
        else {
            echo "wrong username";
        }
    }

    public function registerNewUser( $username, $email, $password)
    {
        $userManager = new \emmaliefmann\recipes\model\UserManager();
        $registration = $userManager->register($username, $email, $password);

        if ($registration === false) {
            throw new \Exception('Cannot register new user');
        }
        else {
            echo 'Your account has been created';
        }
    }
}