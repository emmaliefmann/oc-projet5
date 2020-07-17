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
                    $frontend = new \emmaliefmann\recipes\controller\Frontend();
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        //show receipe with corresponding id 
                        $recipe = $frontend->getRecipe($_GET['id']);
                    }
                    else {
                        //show a list view
                        echo "no recipe id";
                    }
                }

                elseif ($_GET['action'] === 'register') {
                    require('view/frontend/register.php');
                }
                elseif ($_GET['action'] === 'registeruser') {
                    $admin = new \emmaliefmann\recipes\controller\Admin();
                    $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $admin->registerNewUser($_POST['username'], $_POST['email'], $passwordHash);
                }
                elseif ($_GET['action'] === 'signin') {
                    
                    require('view/backend/signin.php');
                }
                elseif ($_GET['action'] === 'login') {
                    $admin = new \emmaliefmann\recipes\controller\Admin();
                    $admin->logIn($_POST['email'], $_POST['password']);
                }
                //-----MEMBERS ONLY
                elseif ($_GET['action'] === 'member') {
                    $admin = new \emmaliefmann\recipes\controller\Admin();
                    $login = $admin->checkLogin();
                    if ($login === false) {
                       header('location: index.php?action=signin');
                    }
                    elseif (isset($_GET['page']) && $_GET['page'] === 'dashboard') {
                        require('view/backend/dashboard.php');
                    }
                    elseif (isset($_GET['page']) && $_GET['page'] === 'newrecipe') {
                        $backend = new \emmaliefmann\recipes\controller\Backend();
                        $backend->getCategories();   
                    }
                    elseif (isset($_GET['page']) && $_GET['page'] === 'addrecipe') {
                        
                        //check there are no empty fields 
                        //check $session is set??
                        if (!empty($_POST['title']) && !empty($_POST['prep-time'])&& !empty($_POST['method'])) {
                            $backend = new \emmaliefmann\recipes\controller\Backend();
                            $backend->addRecipe($_SESSION['userId'], $_POST['title'], $_POST['prep-time'], $_POST['method'], $_POST['title'], $_POST['quantity'], $_POST['ingredient'], $_POST['unit']);
                            //$backend->addRecipeIngredients();
                        }
                        else {
                            echo "empty field somewhere";
                        }
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
