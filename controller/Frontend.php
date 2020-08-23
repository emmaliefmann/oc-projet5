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

    public function addComment($recipeId, $author, $comment, $title)
    {
        $commentManager = new \emmaliefmann\recipes\model\CommentManager();
        $comment = $commentManager->addComment($recipeId, $author, $comment, $title);
    //header('location: index.php?action=recipe&id='.$recipeId.'#comments');
    }
    
    public function getTitle($id)
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipe = $recipeManager->getRecipe($id);
        return $recipe->getTitle();
    }

    public function titleLimit($title)
    {
        
          if (strlen($title) > 40) {
            $new = substr($title, 0, 40)."...";
            
        } else {
          $new = $title;
          } 
          return $new;
    }
}