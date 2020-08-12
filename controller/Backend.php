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
    public function addRecipe($userId, $title, $prepTime, $category, $method, $ingredient)
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipe = $recipeManager->addRecipe($userId, $title, $prepTime, $category, $method, $ingredient);
        print_r($recipe);
        if ($recipe === false || $recipe === null ) {
            //throw exception 
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
            //$ingredientList = $recipeManager->getRecipeIngredients($id);
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
                echo "recipe not added";
                //throw exception? 
            }
            else {
                echo "recipe updated";
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
            echo 'recipe deleted';
        }
        else {
            echo "You do not have the right to delete this recipe";
        }
    }
}
