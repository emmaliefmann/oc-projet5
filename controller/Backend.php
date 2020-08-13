<?php 

namespace emmaliefmann\recipes\controller;

class Backend 
{
    public function getCategories()
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $categories = $recipeManager->getCategories();
        require('view/backend/addrecipe.php');
    }

    public function dashboard($userId) {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipeList = $recipeManager->getMemberRecipes($userId);
        require('view/backend/dashboard.php');
    }
    public function addRecipe($userId, $title, $prepTime, $category, $method, $ingredient, $image)
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipe = $recipeManager->addRecipe($userId, $title, $prepTime, $category, $method, $ingredient, $image);
        
        if ($recipe === false || $recipe === null ) {
            throw new \Exception('Cannot add the recipe');
        } else {
            $message = "recipe added successfully";
            header('location: index.php?action=member&page=dashboard');
        }
    }
    
    public function changeRecipe($id)
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipe = $recipeManager->getRecipe($id);
        if ($recipe->getUserId() === $_SESSION['userId']) {
            require('view/backend/changerecipe.php');
        }
        else {
            echo "you do not have the right to edit this recipe";
        }
    }

    public function editRecipe($id, $title, $prepTime, $method) 
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipe = $recipeManager->getRecipe($id);
        if ($recipe->getUserId() === $_SESSION['userId']) {
            $update = $recipeManager->editRecipe($title, $prepTime, $method, $id);
            if($update === null) {
                throw new \Exception('Cannot update the recipe');
            }
            else {
                $message = "recipe added successfully";
                header('location: index.php?action=member&page=dashboard');
            }

        }
        else {
            echo "you do not have the right to edit this recipe";
        }
    }

    public function deleteRecipeCheck() 
    {
        require('view/backend/deleterecipe.php');
    }

    public function deleteRecipe($id) {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipe = $recipeManager->getRecipe($id);
        if ($recipe->getUserId() === $_SESSION['userId']) {
            //delete recipe
            $recipeManager->deleteRecipe($id);
            $message = 'recipe deleted';
            header('location: index.php?action=member&page=dashboard');
        }
        else {
            echo "You do not have the right to delete this recipe";
        }
    }
}
