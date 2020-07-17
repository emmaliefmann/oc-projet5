<?php

namespace emmaliefmann\recipes\model;

class RecipeManager extends Manager 
{
    private function buildObject($recipe) {
        $recipeObject = new \emmaliefmann\recipes\model\Recipe();
        $recipeObject->setId($recipe['id']);
        $recipeObject->setuserId($recipe['user_id']);
        $recipeObject->setTitle($recipe['title']);
        $recipeObject->setPrepTime($recipe['prep_time']);
        $recipeObject->setMethod($recipe['method']);
        $recipeObject->setCreationDate($recipe['creation_date']);
        return $recipeObject;
    }
    
    public function getCategories()
    {
        $sql = 'SELECT `category` FROM categories';
        return $this->createQuery($sql);
    }

    public function getMemberRecipes() 
    {
        //parameter from session data 
        //Sql where recipe id = session data 
        //return as objects
    }

    public function addRecipe($userId, $title, $prepTime, $method, $recipeTitle, $quantity, $ingredientName, $unit) 
    {
        $sql = 
        'BEGIN; 
        INSERT INTO recipes(`user_id`, title, prep_time, method, creation_date) VALUES(?, ?, ?, ?, NOW() );
        INSERT INTO ingredients(recipe_title, quantity, `ingredient_name`, unit) VALUES (?, ?, ?, ?);
        COMMIT';
        return $this->createQuery($sql, array($userId, $title, $prepTime, $method, $recipeTitle, $quantity, $ingredientName, $unit));
    }
    
    public function getRecipe($id) 
    {
        //sql half works, only returns first ingredient in
       $sql = 'SELECT * FROM ingredients JOIN recipes ON recipes.title = ingredients.recipe_title WHERE recipes.id = ?';
       $result = $this->createQuery($sql, [$id]);
       $recipe = $result->fetch();
       return $this->buildObject($recipe);
    }

}