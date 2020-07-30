<?php 

namespace emmaliefmann\recipes\controller;

class Frontend 
{
    public function getRecipe($id) 
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        
        $recipe = $recipeManager->getRecipe($id);
        //$ingredientList = $recipeManager->getRecipeIngredients($id);
        //comments
        $commentManager = new \emmaliefmann\recipes\model\CommentManager();
        $comments = $commentManager->getrecipeComments($id);
        //add clause to check recipe is in the db
        
        require('view/frontend/singleview.php');
    }

    public function getAllRecipes()
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $commentManager = new \emmaliefmann\recipes\model\CommentManager();
        $recipes = $recipeManager->getAllRecipes();
        $categories = $recipeManager->getCategories();
        $ingredientList = $recipeManager->getAllIngredients();
        require('view/frontend/allrecipes.php');
    }

    public function addComment($recipeId, $author, $comment)
    {
        $commentManager = new \emmaliefmann\recipes\model\CommentManager();
        $comment = $commentManager->addComment($recipeId, $author, $comment);

        if($comment === false) {
            echo "comment not added";
        }
        else {
            echo "comment added";
        }
    }
}