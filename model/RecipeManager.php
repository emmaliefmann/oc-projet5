<?php

namespace emmaliefmann\recipes\model;

class RecipeManager extends Manager 
{
    private function buildObject($recipe) {
        $recipeObject = new \EmmaLiefmann\blog\model\Recipe();
        $recipeObject->setId($recipe['id']);
        $recipeObject->setuserId($recipe['user_id']);
        $recipeObject->setTitle($recipe['title']);
        $recipeObject->setPrepTime($recipe['prep_time']);
        $recipeObject->setMethod($recipe['method']);
        $recipeObject->setCreationDate($recipe['creation_date']);
    }
    
    public function getCategories()
    {
        $sql = 'SELECT `category` FROM categories';
        return $this->createQuery($sql);
    }

    public function getMemberRecipes() {
        //parameter from session data 
        //Sql where recipe id = session data 
        //return as objects
    }

    public function addRecipe($userId, $title, $prepTime, $method) {
        $sql = 'INSERT INTO recipes(`user_id`, title, prep_time, method, creation_date) VALUES(?, ?, ?, ?, NOW() )';
        return $this->createQuery($sql, array($userId, $title, $prepTime, $method));
    }

    /*
    addNewRecipe()
    updateRecipe()
    deleteRecipe()
    */

}