<?php

namespace emmaliefmann\recipes\model;

class CommentManager extends Manager 
{
    private function buildCommentObject($comment)
    {
        $commentObject = new \emmaliefmann\recipes\model\Comment();
        $commentObject->setId($comment['id']);
        $commentObject->setAuthor($comment['author']);
        $commentObject->setComment($comment['comment']);
        $commentObject->setCreationDate($comment['creation_date']);
        $commentObject->setRecipeId($comment['recipe_id']);
        $commentObject->setRecipeTitle($comment['recipe_title']);
        return $commentObject;
    }
    public function addComment($recipeId, $author, $comment, $title)
    {
        $sql = 'INSERT INTO comments(author, recipe_id, comment, recipe_title, creation_date) VALUES (?, ?, ?, ?, NOW())';
        return $this->createQuery($sql, array($author, $recipeId, $comment, $title));
    }

    public function getRecipeComments($id)
    {
        $sql = 'SELECT * FROM comments WHERE recipe_id = ?';
        $result = $this->createQuery($sql,array($id));
        $comments = [];
        while ($comment = $result->fetch()) {
            $commentObject = $this->buildCommentObject($comment);
            array_push($comments, $commentObject);
        }
       return $comments;
    }

    public function getAllComments() 
    {
        $sql = 'SELECT * FROM comments ORDER BY `recipe_id` DESC';
        $result = $this->createQuery($sql);
        $comments = [];
        while ($comment = $result->fetch()) {
            $commentObject = $this->buildCommentObject($comment);
            array_push($comments, $commentObject);
        }
        return $comments;
    }
    
    public function deleteComment($id)
    {
        $sql = 'DELETE FROM comments WHERE `id`= ?';
        return $this->createQuery($sql, array($id));
    }
}