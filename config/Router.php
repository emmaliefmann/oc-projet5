<?php 

namespace emmaliefmann\recipes\config;


class Router 
{
    public function run() {

        try {
            if (!isset($_GET['action'])) {
                require('view/frontend/home.php');
            }

            elseif (isset($_GET['action'])) {
                if ($_GET['action'] === 'home') {
                    //homepage with search, ordering options, select categories etc. 
                }
                elseif ($_GET['action'] === 'allrecipes') {
                    require('view/frontend/allrecipes.php');
                }
                elseif ($_GET['action'] === 'recipe') {
                    //if id is set, show recipe, if not, show list view 
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        //show receipe with corresponding id 
                    }
                    else {
                        //show a list view
                    }
                }

                elseif ($_GET['action'] === 'register') {
                    require('view/frontend/register.php');
                }
                elseif ($_GET['action'] === 'registeruser') {
                    $backend = new \emmaliefmann\recipes\controller\Backend();
                    $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $backend->registerNewUser($_POST['username'], $_POST['email'], $passwordHash);
                }
                elseif ($_GET['action'] === 'signin') {
                    
                    require('view/backend/signin.php');
                }
                elseif ($_GET['action'] === 'login') {
                    $backend = new \emmaliefmann\recipes\controller\Backend();
                    $backend->logIn($_POST['email'], $_POST['password']);
                }
                //-----MEMBERS ONLY
                elseif ($_GET['action'] === 'member') {
                    $backend = new \emmaliefmann\recipes\controller\Backend();
                    $login = $backend->checkLogin();
                    if ($login === false) {
                        echo "login";
                    }
                    elseif (isset($_GET['page']) && $_GET['page'] === 'dashboard' ) {
                        require('view/backend/dashboard.php');
                    }
                    elseif (isset($_GET['page']) && $_GET['page'] === 'newrecipe' ) {
                        require('view/backend/addrecipe.php');
                    }

                }
                
                //closing of elseif action isset
            }
            
        }
        catch(\Exception $e) {
            $errorMessage = $e->getMessage();
            require('view/errorview.php');
        }
    }
}
