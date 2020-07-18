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
        return $commentObject;
    }
    public function addComment($recipeId, $author, $comment)
    {
        $sql = 'INSERT INTO comments(author, recipe_id, comment, creation_date) VALUES (?, ?, ?, NOW())';
        return $this->createQuery($sql, array($author, $recipeId, $comment));
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

    

}