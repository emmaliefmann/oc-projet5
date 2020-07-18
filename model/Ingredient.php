<?php 

namespace emmaliefmann\recipes\model;

class Ingredient 
{
    private $id;
    private $quantity;
    private $ingredientName;
    private $unit;
    private $recipeId;

    public function getId()
    {
        return $this->id;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getIngredientName()
    {
        return $this->ingredientName;
    }
    public function getUnit()
    {
        return $this->unit;
    }
    public function getRecipeId()
    {
        return $this->recipeId;
    }

    public function setId($id) 
    {
        $this->id = $id;
    }
    public function setQuantity($quantity) 
    {
        $this->quantity = $quantity;
    }
    public function setIngredientName($ingredientName) 
    {
        $this->ingredientName = $ingredientName;
    }
    public function setUnit($unit) 
    {
        $this->unit = $unit;
    }
    public function setRecipeId($recipeId) 
    {
        $this->recipeId = $recipeId;
    }

} 