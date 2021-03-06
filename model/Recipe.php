<?php 

namespace emmaliefmann\recipes\model;

class Recipe 
{
    private $id;
    private $userId;
    private $title;
    private $prepTime;
    private $method;
    private $creationDate;
    private $category;
    private $image;
    private $ingredientList;

    public function getId()
    {
        return $this->id;
    }
    public function getUserId()
    {
        return $this->userId;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getPrepTime()
    {
        return $this->prepTime;
    }
    public function getMethod()
    {
        return $this->method;
    }
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function getCategory() 
    {
        return $this->category;
    }
    public function getImage() 
    {
        return $this->image;
    }
    public function getIngredientList()
    {
        return $this->ingredientList;
    }
    public function setId($id) 
    {
        $this->id = $id;
    }
    public function setUserId($userId) 
    {
        $this->userId = $userId;
    }
    public function setTitle($title) 
    {
        $this->title = $title;
    }
    public function setPrepTime($prepTime) 
    {
        $this->prepTime = $prepTime;
    }
    public function setMethod($method) 
    {
        $this->method = $method;
    }
    public function setCreationDate($creationDate) 
    {
        $this->creationDate = $creationDate;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function setIngredientList($ingredientList)
    {
        $this->ingredientList = $ingredientList;
    }
} 