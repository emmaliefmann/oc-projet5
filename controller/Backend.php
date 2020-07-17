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

    public function addRecipe($userId, $title, $prepTime, $method, $recipeTitle, $quantity, $ingredientName, $unit)
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipe = $recipeManager->addRecipe($userId, $title, $prepTime, $method, $recipeTitle, $quantity, $ingredientName, $unit);
        if ($recipe === false) {
            //throw exception 
            echo "cannot add recipe";
        }
        else {
            echo "recipe added successfully";
        }
    }
    
}