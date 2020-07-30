<?php 

namespace emmaliefmann\recipes\controller;

class Admin

{
    private function buildUserObject($user) 
    {
        $userObject = new \emmaliefmann\recipes\model\User();
        $userObject->setId($user['id']);
        $userObject->setUserName($user['username']);
        $userObject->setEmail($user['email']);
        $userObject->setCreationDate($user['creation_date']);
        $userObject->setLevel($user['level']);
        return $userObject;
    }
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
                $user = $this->buildUserObject($dbResult);
                $_SESSION['active'] = true;
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['username'] = $user->getUserName();
                $_SESSION['userId'] = $user->getId();
                
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

    public function changePassword($password, $userId) 
    {
        $userManager = new \emmaliefmann\recipes\model\UserManager();
        $changePassword = $userManager->changePassword($password, $userId);
        //some sort of verification
        $this->signOut();
    }
    public function checkLogOut() 
    {
        require('view/backend/logout.php');
    }

    public function signOut()
    {
        session_destroy();
        header('location: index.php?action=allrecipes');
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