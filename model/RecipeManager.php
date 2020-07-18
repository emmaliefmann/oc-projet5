<?php

namespace emmaliefmann\recipes\model;

class RecipeManager extends Manager 
{
    private function buildRecipeObject($recipe) {
        $recipeObject = new \emmaliefmann\recipes\model\Recipe();
        $recipeObject->setId($recipe['id']);
        $recipeObject->setuserId($recipe['user_id']);
        $recipeObject->setTitle($recipe['title']);
        $recipeObject->setPrepTime($recipe['prep_time']);
        $recipeObject->setMethod($recipe['method']);
        $recipeObject->setCreationDate($recipe['creation_date']);
        return $recipeObject;
    }
    private function buildIngredientObject($ingredient) {
        $ingredientObject = new \emmaliefmann\recipes\model\Ingredient();
        $ingredientObject->setId($ingredient['id']);
        $ingredientObject->setQuantity($ingredient['quantity']);
        $ingredientObject->setIngredientName($ingredient['ingredient_name']);
        $ingredientObject->setUnit($ingredient['unit']);
        $ingredientObject->setRecipeId($ingredient['recipe_id']);
        return $ingredientObject;
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

    public function addRecipe($userId, $title, $prepTime, $method, $quantity, $ingredientName, $unit) 
    {
        $sql = 
        'BEGIN; 
        INSERT INTO recipes(`user_id`, title, prep_time, method, creation_date) VALUES(?, ?, ?, ?, NOW() );
        INSERT INTO ingredients(quantity, `ingredient_name`, unit, recipe_id) VALUES (?, ?, ?, LAST_INSERT_ID());
        COMMIT';
        return $this->createQuery($sql, array($userId, $title, $prepTime, $method, $quantity, $ingredientName, $unit));
    }

    public function getRecipe($id) 
    {
       $sql = 'SELECT * FROM recipes WHERE id = ?';
       $result = $this->createQuery($sql, [$id]);
       $recipe = $result->fetch();
       return $this->buildRecipeObject($recipe);
    }

    public function getAllRecipes() 
    {
        $sql = 'SELECT * FROM recipes';
        $result = $this->createQuery($sql);
        $recipeList = [];
        while ($recipe = $result->fetch()) {
            $recipeObject = $this->buildRecipeObject($recipe);
            array_push($recipeList, $recipeObject);
        }
       return $recipeList;
    }

    public function getRecipeIngredients($recipeId) 
    {
       $sql = 'SELECT * FROM ingredients WHERE recipe_id = ?';
       $result = $this->createQuery($sql, [$recipeId]);
       $ingredientList = [];
        while ($ingredient = $result->fetch()) {
            $ingredientObject = $this->buildIngredientObject($ingredient);
            array_push($ingredientList, $ingredientObject);
        }
       return $ingredientList;
    }

    public function deleteRecipe($id) {
        $sql = 'DELETE FROM recipes WHERE id = ?';
        return $this->createQuery($sql, array($id));
    }

    
    // public function getRecipe($id) 
    // {
    //     //sql half works, only returns first ingredient in
    //    $sql = 'SELECT * FROM ingredients JOIN recipes ON recipes.title = ingredients.recipe_title WHERE recipes.id = ?';
    //    $result = $this->createQuery($sql, [$id]);
    //    $recipe = $result->fetch();
    //    return $this->buildRecipeObject($recipe);
    // }
    //can this feed into second SQL function, which would launch request for ingredients? 
    //Then build recipe object? with a foreach loop over the ingredients list? 
}