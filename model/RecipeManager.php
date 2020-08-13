<?php

namespace emmaliefmann\recipes\model;

class RecipeManager extends Manager 
{
    private function buildRecipeObject($recipe) 
    {

        $recipeObject = new \emmaliefmann\recipes\model\Recipe();
        $recipeObject->setId($recipe['id']);
        $recipeObject->setuserId($recipe['user_id']);
        $recipeObject->setTitle($recipe['title']);
        $recipeObject->setPrepTime($recipe['prep_time']);
        $recipeObject->setMethod($recipe['method']);
        $recipeObject->setCreationDate($recipe['creation_date']);
        $recipeObject->setCategory($recipe['category']);
        $recipeObject->setImage($recipe['image']);
        $ingredients = $this->getRecipeIngredients($recipe['id']);
        $recipeObject->setIngredientList($ingredients);
        return $recipeObject;
    }

    private function buildIngredientObject($ingredient) 
    {
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

    public function getMemberRecipes($userId) 
    {
        $sql = 'SELECT * FROM recipes WHERE `user_id` = ?';
        $result = $this->createQuery($sql, array($userId));
        $recipeList = [];
        while ($recipe = $result->fetch()) {
            $recipeObject = $this->buildRecipeObject($recipe);
            array_push($recipeList, $recipeObject);
        }
       return $recipeList;
    }

    public function addRecipe($userId, $title, $prepTime, $category, $method, $ingredient, $image) 
    {
        // get the previous insert id, and increment
       $sql = 'SELECT `id` FROM `recipes` ORDER BY `id` DESC LIMIT 1';
       $result = $this->createQuery($sql);
        while ($prev = $result->fetch()) {
           $id = $prev['id']+1;
        };

        //get statements for ingredient insert
        $ingredientSql = [];
        for ($i=0; $i< count($ingredient); $i++) {
            $quantity = $ingredient[$i][0];
            $unit = $ingredient[$i][2];
            $ingName =  $ingredient[$i][1];
            $lines = "INSERT INTO ingredients(quantity, `ingredient_name`, unit, recipe_id) VALUES ('$quantity','$unit','$ingName',  '$id')"; 
            //ignore empty lines?
            array_push($ingredientSql, $lines);
            }; 
            $insertIngredients = implode(";", $ingredientSql);
            //insert everything into two tables
            $sql = "BEGIN;
                INSERT INTO recipes(`id`, `user_id`, title, prep_time, category, method, creation_date, image) VALUES('$id', '$userId', '$title', '$prepTime','$category','$method', NOW(), '$image');"
                . $insertIngredients."
                ;COMMIT;";

                return $this->createQuery($sql);
    }
       
    public function editRecipe($title, $prepTime, $method, $id)
    {
        $sql = 'UPDATE recipes SET `title`= ?, `prep_time`= ?, `method`=? WHERE `id`= ?';
        return $this->createQuery($sql, array($title, $prepTime, $method, $id));
    }
    public function getRecipe($id) 
    {
       $sql = 'SELECT * FROM recipes WHERE id = ?';
       $result = $this->createQuery($sql, [$id]);
       $recipe = $result->fetch();
       $ingredientList = $this->getRecipeIngredients($id);
       $recipeObject = $this->buildRecipeObject($recipe);
       
       
       return $recipeObject;
    }

    public function getAllIngredients() 
    {
        $sql = 'SELECT * FROM ingredients';
        $result = $this->createQuery($sql);
        $ingredientList = [];
        while ($ingredient = $result->fetch()) {
            $ingredientObject = $this->buildIngredientObject($ingredient);
            array_push($ingredientList, $ingredientObject);
        }
       return $ingredientList;
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

    public function deleteRecipe($id) 
    {
        $sql = 'DELETE FROM recipes WHERE id = ?';
        return $this->createQuery($sql, array($id));
    }
}
