<?php 

namespace emmaliefmann\recipes\model;

class Comment 
{
    private $id;
    private $author;
    private $comment;
    private $creationDate;
    private $recipeId;
    private $recipeTitle;

    public function getId()
    {
        return $this->id;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getComment()
    {
        return $this->comment;
    }
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    public function getRecipeId()
    {
        return $this->recipeId;
    }
    public function getRecipeTitle()
    {
        return $this->recipeTitle;
    }

    public function setId($id) 
    {
        $this->id = $id;
    }
    public function setAuthor($author) 
    {
        $this->author = $author;
    }
    public function setComment($comment) 
    {
        $this->comment = $comment;
    }
    public function setCreationDate($creationDate) 
    {
        $this->creationDate = $creationDate;
    }
    public function setRecipeId($recipeId) 
    {
        $this->recipeId = $recipeId;
    }
    public function setRecipeTitle($recipeTitle)
    {
        $this->recipeTitle = $recipeTitle;
    }

} 