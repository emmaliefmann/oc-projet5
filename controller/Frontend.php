<?php 
namespace emmaliefmann\recipes\controller;
class Frontend 
{
    public function getRecipe($id) 
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        
        $recipe = $recipeManager->getRecipe($id);
        if ($recipe->getId()=== null) {
            require('view/frontend/notfound.php');
        } else {
            $commentManager = new \emmaliefmann\recipes\model\CommentManager();
            $comments = $commentManager->getrecipeComments($id);
            require('view/frontend/singleview.php');
        }
    }

    public function getAllRecipes()
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $commentManager = new \emmaliefmann\recipes\model\CommentManager();
        $recipes = $recipeManager->getAllRecipes();
        $categories = $recipeManager->getCategories();
        require('view/frontend/allrecipes.php');
    }

    public function addComment($recipeId, $author, $comment)
    {
        $commentManager = new \emmaliefmann\recipes\model\CommentManager();
        $comment = $commentManager->addComment($recipeId, $author, $comment);

        if($comment === false) {
            throw new \Exception('Cannot add this comment');
        }
        else {
            echo "comment added";
        }
    }
}