<?php 

namespace emmaliefmann\recipes\controller;

class Frontend 
{
    public function getRecipe($id) 
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipe = $recipeManager->getRecipe($id);
        //add clause to check recipe is in the db
        $ingredientList = $recipeManager->getRecipeIngredients($id);
        require('view/frontend/singleview.php');
    }

    
}