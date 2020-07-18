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

    public function addRecipe($userId, $title, $prepTime, $method, $quantity, $ingredientName, $unit)
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipe = $recipeManager->addRecipe($userId, $title, $prepTime, $method, $quantity, $ingredientName, $unit);
        if ($recipe === false) {
            //throw exception 
            //doesn't work right, positive message when data not uploaded
            echo "cannot add recipe";
        }
        else {
            echo "recipe added successfully";
        }
    }
    
    public function changeRecipe($id)
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipe = $recipeManager->getRecipe($id);
        if ($recipe->getUserId() === $_SESSION['userId']) {
            $ingredientList = $recipeManager->getRecipeIngredients($id);
            require('view/backend/changerecipe.php');
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
            echo 'recipe deleted';
        }
        else {
            echo "You do not have the right to delete this recipe";
        }
    }
}