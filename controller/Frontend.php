<?php 

namespace emmaliefmann\recipes\controller;

class Frontend 
{
    public function getRecipe($id) 
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipe = $recipeManager->getRecipe($id);
        require('view/frontend/singleview.php');

    }
}