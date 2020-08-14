<?php 
namespace emmaliefmann\recipes\controller;
class Admin

{
    public function checkLogin() 
    {
        if (isset($_SESSION['active'])) {
            if ($_SESSION['active'] === "active") {
            $login = true ;
            } else {
            $login = false;
            } 
        } else {
                $login = false;
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
                $user = $userManager->buildUserObject($dbResult);
                $_SESSION['active'] = $user->getActive();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['username'] = $user->getUserName();
                $_SESSION['userId'] = $user->getId();
                $_SESSION['level'] = $user->getLevel();
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

    public function checkAdmin() 
    {
        
        if ($_SESSION['level'] === "admin") {
            $admin = true;
        } else {
            $admin = false;
        }
        return $admin;
    }
    public function dashboard()
    {
        $userManager = new \emmaliefmann\recipes\model\UserManager();
        $users = $userManager->getAllUsers();
        require('view/backend/admindashboard.php');
    }

    public function allowAccess($user)
    {
        $userManager = new \emmaliefmann\recipes\model\UserManager();
       
        $allow = $userManager->allowAccess($user);
        if ($allow === null) {
            echo "not working";
        } else {
            echo "success";
        }
    }

    public function suspendAccess($user)
    {
        $userManager = new \emmaliefmann\recipes\model\UserManager();
       
        $suspend = $userManager->suspendAccess($user);
        if ($suspend === null) {
            echo "not working";
        } else {
            echo "success";
        }
    }
}