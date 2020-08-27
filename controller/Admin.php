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
                $active = $user->getActive();
                if ($active = "active") {
                    $_SESSION['active'] = $user->getActive();
                    $_SESSION['email'] = $user->getEmail();
                    $_SESSION['username'] = $user->getUserName();
                    $_SESSION['userId'] = $user->getId();
                    $_SESSION['level'] = $user->getLevel();
                    header('location: index.php?action=member&page=dashboard');
                } else {
                    header('location: index.php?action=message&id=37');
                }
            }
            else {
                //wrong password
                header("location: index.php?action=message&id=36");
            }
        }
        else {
            //wrong username
            header("location: index.php?action=message&id=36");
        }
    }

    public function changePassword($password, $userId) 
    {
        $userManager = new \emmaliefmann\recipes\model\UserManager();
        $changePassword = $userManager->changePassword($password, $userId);
        $this->signOut();
    } 
    public function checkLogOut() 
    {
        require('view/backend/logout.php');
    }

    public function signOut()
    {
        session_destroy();
        header('location: index.php?action=home');
    }

    public function registerNewUser( $username, $email, $password)
    {
        $userManager = new \emmaliefmann\recipes\model\UserManager();
        $registration = $userManager->register($username, $email, $password);
        $check = $userManager->getLastUser();
        $result = $check->fetch();
        if ($result['username'] === $username) {
            header("location: index.php?action=message&id=29");
        }
        else {
            throw new \Exception('Cannot register new user');
        }
    }

    public function checkAdmin($userId) 
    {
        $userManager = new \emmaliefmann\recipes\model\UserManager();
        $result = $userManager->getLevel($userId);
        $test = $result->fetch();
        if ($test['level'] === "admin") {
            $admin = true;
        } else {
            $admin = false;
        }
        return $admin;
    }
    public function dashboard()
    {
        $userManager = new \emmaliefmann\recipes\model\UserManager();
        $commentManager = new \emmaliefmann\recipes\model\CommentManager();
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipes = $recipeManager->getAllRecipes();
        $recipeIds = [];
        foreach ($recipes as $recipe) {
            $id = $recipe->getId();
            array_push($recipeIds, $id);
        }
        $groupComments = [];
        foreach ($recipeIds as $id) {
            $comments = $commentManager->getRecipeComments($id);
            array_push($groupComments, $comments);
        }
        $users = $userManager->getAllUsers();
        $comments = $commentManager->getAllComments();
        
        require('view/backend/admindashboard.php');
    }

    public function allowAccess($user)
    {
        $userManager = new \emmaliefmann\recipes\model\UserManager();
        $allow = $userManager->allowAccess($user);
        if ($allow === null) {
            throw new \Exception('Cannot allow access for this user');
        } else {
            header('location: index.php?action=member&page=dashboard');
        }
    }

    public function deleteComment($id)
    {
        $commentManager = new \emmaliefmann\recipes\model\CommentManager();
        $result = $commentManager->getComment($id);
        $comment = $result->fetch();
        if ($comment === false) {
            throw new \Exception('Cannot find this comment');
        } else {
            $commentManager->deleteComment($id);
            header('location: index.php?action=message&id=34');
        }
    }

    public function suspendAccess($user)
    {
        $userManager = new \emmaliefmann\recipes\model\UserManager();
       
        $suspend = $userManager->suspendAccess($user);
        if ($suspend === null) {
            throw new \Exception('Cannot suspend access for this user');
        } else {
            header('location: index.php?action=member&page=dashboard');
        }
    }
}