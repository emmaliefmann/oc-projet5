<?php 

namespace emmaliefmann\recipes\controller;

class Backend 
{
    private function getCategories()
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $categories = $recipeManager->getCategories();
        
        return $categories;
    }
    public function newRecipe()
    {
        $categories=$this->getCategories();
        require("view/backend/addrecipe.php");
    }

    public function getImageName($image) 
    {
        if(empty ($image)) {
            $image = "uploads/recipes/generic.jpg";
        } else {
            $name = substr($image, strpos($image, "projet5/"));
            $image = "uploads/recipes/$image";
        }
        return $image;
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
            header('location: index.php?action=message&id=30');
        }
    }

    public function changeRecipe($id)
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipe = $recipeManager->getRecipe($id);
        $categories = $this->getCategories();
        if ($recipe->getUserId() === $_SESSION['userId']) {
            require('view/backend/changerecipe.php');
        }
        else {
            header('location: index.php?action=message&id=26');
        }
    }

    public function editRecipe($id, $title, $prepTime, $category, $method, $ingredient) 
    {
        $recipeManager = new \emmaliefmann\recipes\model\RecipeManager();
        $recipe = $recipeManager->getRecipe($id);
        if ($recipe->getUserId() === $_SESSION['userId']) {
            $update = $recipeManager->editRecipe($id, $title, $prepTime, $category, $method, $ingredient);
            if($update === null) {
                throw new \Exception('Cannot update the recipe');
            }
            else {
                header('location: index.php?action=message&id=30');
            }

        }
        else {
            header('location: index.php?action=message&id=26');
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
            
            header('location: index.php?action=message&id=34');
        }
        else {
            header('location:index.php?action=message&id=26');
        }
    }
}
