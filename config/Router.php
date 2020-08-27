<?php 

namespace emmaliefmann\recipes\config;

class Router 
{
    public function run() {

        try {
            if (!isset($_GET['action'])) {
                require("view/frontend/home.php");
            }
            elseif (isset($_GET['action'])) {
                if ($_GET['action'] === 'home') {
                    require("view/frontend/home.php");
                } 
                elseif ($_GET['action'] === 'aboutus') {
                    require("view/frontend/aboutus.php");
                }
                elseif ($_GET['action'] === 'allrecipes') {
                    $frontend = new \emmaliefmann\recipes\controller\Frontend();
                    $recipes = $frontend->getAllRecipes();
                    
                }
                elseif ($_GET['action'] === 'recipe') {
                    $frontend = new \emmaliefmann\recipes\controller\Frontend();
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $frontend->getRecipe($_GET['id']);
                    }
                    else {
                        header("location: index.php?action=allrecipes");
                    }
                }
                elseif($_GET['action'] === 'message') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if ($_GET['id'] == 23) {
                            require('view/redirects/signin.php');
                        } elseif ($_GET['id'] == 26) {
                            require('view/redirects/noright.php');
                        } elseif ($_GET['id'] == 29) {
                            require('view/redirects/newaccount.php');
                        } elseif ($_GET['id']== 30) {
                            require('view/redirects/success.php');
                        } elseif ($_GET['id'] == 34) {
                            require('view/redirects/delete.php');
                        } elseif ($_GET['id'] == 36) {
                            require('view/redirects/wronglogin.php');
                        } elseif ($_GET['id'] == 37) {
                            require('view/redirects/inactiveaccount.php');
                        }
                    } else {
                        $frontend = new \emmaliefmann\recipes\controller\Frontend();
                        $recipes = $frontend->getAllRecipes(); 
                    }
                }
                elseif ($_GET['action'] === 'addcomment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if( isset($_SESSION['username'])) {
                            $frontend = new \emmaliefmann\recipes\controller\Frontend();
                            $title = $frontend->getTitle($_GET['id']);
                            $comment = $frontend->addComment($_GET['id'], $_SESSION['username'], $_POST['comment'], $title);
                        } else {
                            header('location: index.php?action=message&id=23');
                        }
                    }
                    else {
                        require('view/frontend/notfound.php');
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
                       header('location: index.php?action=message&id=23');
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
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            $backend = new \emmaliefmann\recipes\controller\Backend();
                            $backend->changeRecipe($_GET['id']);
                        } else {
                            header('location: index.php?action=member&page=dashboard');
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
                                    header('location: index.php?action=message&id=26');
                                }
                            }
                        } else {
                            throw new \Exception('Recipe not found');
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
                            header('location: index.php?action=member&page=dashboard');
                        }
                    }

                    elseif (isset($_GET['page']) && $_GET['page'] === 'deleterecipe') {
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            if ($_POST['delete'] === 'true') {
                                $backend = new \emmaliefmann\recipes\controller\Backend();
                                
                                $backend->deleteRecipe($_GET['id']); 
                            } elseif ($_POST['delete'] === 'false') {
                                header("location: index.php?action=member&page=dashboard");
                            } else {
                                $id = $_GET['id'];
                                header("location: index.php?action=member&page=deletethis&id=$id");
                            }
                        }
                    }
                    elseif (isset($_GET['page']) && $_GET['page'] === 'newrecipe') {
                        $backend = new \emmaliefmann\recipes\controller\Backend();
                        $backend->newRecipe();
                    }
                     elseif (isset($_GET['page']) && $_GET['page'] === 'editrecipe') {
                        $backend = new \emmaliefmann\recipes\controller\Backend();
                       
                        if (isset($_GET['id']) && $_GET['id'] > 0) {
                            if (!empty($_POST['title']) && !empty($_POST['prep-time'])&& !empty($_POST['category'])&& !empty($_POST['method'])) {
                                $backend->editRecipe($_GET['id'], $_POST['title'], $_POST['prep-time'], $_POST['category'], $_POST['method'], $_POST['ingredients']);
                            } else {
                                $id = $_GET['id'];
                                header("location: index.php?action=member&page=changerecipe&id=$id");
                            }
                        }
                        else {
                            throw new \Exception('Unable to edit this recipe. Id not present');
                        }
                    }
                
                    elseif (isset($_GET['page']) && $_GET['page'] === 'addrecipe') {
                        $ingredients = $_POST['ingredient'];
                        if (!empty($_POST['title']) && !empty($_POST['prep-time'])&& !empty($_POST['method'])&& !empty($_POST['ingredient'])) {
                            $ingredients = $_POST['ingredient'];
                            $backend = new \emmaliefmann\recipes\controller\Backend();
                            $image = $backend->getImageName($_POST['files']);
                            $backend->addRecipe($_SESSION['userId'], $_POST['title'], $_POST['prep-time'], $_POST['category'], $_POST['method'], $ingredients, $image);
                        }
                        else {
                            header('location: index.php?action=member&page=newrecipe');
                        }
                    }
                    elseif (isset($_GET['page']) && $_GET['page'] === 'admin') {
                        $admin = new \emmaliefmann\recipes\controller\Admin();
                        $check = $admin->checkAdmin($_SESSION['userId']);
                            if ($check === false) {
                                header("location: index.php?action=message&id=26");   
                            } 
                            elseif(!isset($_GET['req'])) {
                                $admin->dashboard();
                                }

                            elseif(isset($_GET['req']) && $_GET['req'] === 'suspendthisaccess') {
                                require('view/backend/suspenduser.php');
                            }  elseif(isset($_GET['req']) && $_GET['req'] === 'suspendaccess') {   
                                if (isset($_GET['id']) && $_GET['id'] > 0) {
                                    //check form 
                                    if ($_POST['delete'] === 'true') {
                                        $admin->suspendAccess($_GET['id']);
                                    } else {
                                        $admin->dashboard();
                                    }
                                } else {
                                    throw new \Exception("Cannot suspend access. User Id not found");
                                }
                            } elseif(isset($_GET['req']) && $_GET['req'] == 'allowaccess') {   
                                if (isset($_GET['id']) && $_GET['id'] > 0) {
                                    $admin->allowAccess($_GET['id']);
                                } else {
                                    throw new \Exception("Cannot allow access. User Id not found");
                                }
                            } elseif(isset($_GET['req']) && $_GET['req'] === 'deletethiscom') { 
                                require('view/backend/deletecomment.php');  
                            } elseif (isset($_GET['req']) && $_GET['req'] === 'deletecomment') {
                                if (isset($_GET['id']) && $_GET['id'] > 0) {
                                    if ($_POST['delete'] === 'true') {
                                        $admin->deleteComment($_GET['id']);
                                    } else {
                                        $admin->dashboard();
                                    }
                                } else {
                                    
                                    throw new \Exception("Cannot Delete comment. Comment not found");
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
