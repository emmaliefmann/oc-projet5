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
                    $frontend = new \emmaliefmann\recipes\controller\Frontend();
                    $recipes = $frontend->getAllRecipes();
                }
                elseif ($_GET['action'] === 'recipe') {
                    //if id is set, show recipe, if not, show list view 
                    $frontend = new \emmaliefmann\recipes\controller\Frontend();
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $frontend->getRecipe($_GET['id']);
                    }
                    else {
                        //show a list view
                        echo "no recipe id";
                    }
                }

                elseif ($_GET['action'] === 'addcomment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if( isset($_SESSION['username'])) {
                            $frontend = new \emmaliefmann\recipes\controller\Frontend();
                            $comment = $frontend->addComment($_GET['id'], $_SESSION['username'], $_POST['comment']);
                        }
                        else {
                            
                            echo "you need to sign in to leave a comment";
                            //link to sign in or register
                        }
                    }
                    else {
                        echo "page not found";
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
                        $backend = new \emmaliefmann\recipes\controller\Backend();
                        $backend->dashboard($_SESSION['userId']);
                    }
                    
                    elseif (isset($_GET['page']) && $_GET['page'] === 'changepassword') {
                        require('view/backend/changepassword.php');
                    }
                    elseif (isset($_GET['page']) && $_GET['page'] === 'newpassword') {
                        $admin = new \emmaliefmann\recipes\controller\Admin();
                        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $admin->changePassword($passwordHash, $_SESSION['userId']);
                    }
                    
                    elseif (isset($_GET['page']) && $_GET['page'] === 'changerecipe') {
                        $backend = new \emmaliefmann\recipes\controller\Backend();
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            if ($_SESSION['level'] === "admin" ) {
                            $recipe = $backend->changeRecipe($_GET['id']);
                            } else {
                                $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
                                $recipe = $recipeManager->getRecipe($_GET['id']);
                                if ($recipe->getUserId() === $_SESSION['userId']) {
                                    $recipe = $backend->changeRecipe($_GET['id']);
                                } else {
                                    echo "You can only modify your own recipes";
                                }
                            }
                        }
                         else {
                            echo "recipe not found";
                            //redirect home 
                        }
                    }
                    elseif (isset($_GET['page']) && $_GET['page'] === 'deletethis') {
                        $backend = new \emmaliefmann\recipes\controller\Backend();
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            if ($_SESSION['level'] === "admin" ) {
                                $backend->deleteRecipeCheck();
                            } else {
                                $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
                                $recipe = $recipeManager->getRecipe($_GET['id']);
                                if ($recipe->getUserId() === $_SESSION['userId']) {
                                    $backend->deleteRecipeCheck();
                                } else {
                                    echo "no right";
                                }
                                //compare with session ID 
                                //if match show form, if not "echo you do not have the right
                            }
                            
                        }
                        else {
                            echo "recipe not found";
                        }
                    }
                    elseif (isset($_GET['page']) && $_GET['page'] === 'logout') {
                        $admin = new \emmaliefmann\recipes\controller\Admin();
                        $admin->checkLogOut();
                    }
                    elseif(isset($_GET['page']) && $_GET['page'] === 'signout') {
                        $admin = new \emmaliefmann\recipes\controller\Admin();
                        if ($_POST['delete'] === 'true') {
                            $admin->signOut();
                        }
                        else {
                            echo 'not logged out';
                        }
                    }

                    elseif (isset($_GET['page']) && $_GET['page'] === 'deleterecipe') {
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            if ($_POST['delete'] === 'true') {
                                $backend = new \emmaliefmann\recipes\controller\Backend();
                                $backend->deleteRecipe($_GET['id']); 
                            }
                            else {
                                echo "post not deleted";
                            }
                        }
                    }

                    
                    elseif (isset($_GET['page']) && $_GET['page'] === 'newrecipe') {
                        //to set number of fields in javascript
                        //if (isset($_GET['ing']) && $_GET['ing'] > 0) { 
                            $backend = new \emmaliefmann\recipes\controller\Backend();
                            $backend->getCategories();
                        //}
                        // else {
                        //     echo "go back to prev page";
                        // }
                           
                    }

                     elseif (isset($_GET['page']) && $_GET['page'] === 'editrecipe') {
                        $backend = new \emmaliefmann\recipes\controller\Backend();
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            if (!empty($_POST['title']) && !empty($_POST['prep-time'])&& !empty($_POST['method'])) {
                                $backend->editRecipe($_GET['id'], $_POST['title'], $_POST['prep-time'], $_POST['method']);
                            }
                            else {
                                echo "emptyField, go back to editing page";
                            }
                        }
                        else {
                            echo "recipe not found";
                        }
                    }
                    
                
                    elseif (isset($_GET['page']) && $_GET['page'] === 'addrecipe') {
                        
                        print_r($_POST['image']);
                        
                        //check there are no empty fields 
                        //check $session is set??
                        $ingredients = $_POST['ingredient'];
                        
                        if (!empty($_POST['title']) && !empty($_POST['prep-time'])&& !empty($_POST['method'])&& !empty($_POST['ingredient'])) {
                            $backend = new \emmaliefmann\recipes\controller\Backend();
                            if(!isset ($_POST['image'])) {
                                $image = $_POST['image'];
                            } else {
                                $image = "uploads/recipes/generic.jpg";
                            }
                            $backend->addRecipe($_SESSION['userId'], $_POST['title'], $_POST['prep-time'], $_POST['category'], $_POST['method'], $_POST['ingredient'], $image);
                        }
                        else {
                            echo "empty field somewhere";
                        }
                    }
                    elseif (isset($_GET['page']) && $_GET['page'] === 'admin') {
                        //create checkAdmin() boolean 
                        $admin = new \emmaliefmann\recipes\controller\Admin();
                        $check = $admin->checkAdmin();
                        if ($check === false) {
                            header("location: index.php?action=member&page=dashboard");      
                        } elseif(!isset($_GET['req'])) {
                            $admin->dashboard();
                            //validation form first
                            
                        }  elseif(isset($_GET['req']) && $_GET['req'] === 'suspendthisaccess') {
                            require('view/backend/suspenduser.php');
                        }  elseif(isset($_GET['req']) && $_GET['req'] === 'suspendaccess') {   
                            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                if ($_POST['delete'] === 'true') {
                                    $admin->suspendAccess($_GET['id']);
                                } else {
                                    echo "not suspended";
                                }
                            } else {
                                $admin->dashboard();
                            }
                        } elseif(isset($_GET['req']) && $_GET['req'] === 'allowaccess') {   
                            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                $admin->allowAccess($_GET['id']);
                            } else {
                                $admin->dashboard();
                            }
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
