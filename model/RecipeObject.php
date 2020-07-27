<?php 

namespace emmaliefmann\recipes\model;

class RecipeObject extends Recipe
{
    
public function buildRecipeObject($recipe) 
    {
        $recipeObject = new \stdClass();
        $recipeObject->setId($recipe['id']);
        $recipeObject->setuserId($recipe['user_id']);
        $recipeObject->setTitle($recipe['title']);
        $recipeObject->setPrepTime($recipe['prep_time']);
        $recipeObject->setMethod($recipe['method']);
        $recipeObject->setCreationDate($recipe['creation_date']);
        return $recipeObject;
    }
}
