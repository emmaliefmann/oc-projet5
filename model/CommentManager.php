<?php

namespace emmaliefmann\recipes\model;

class CommentManager extends Manager 
{
    public function addComment($recipeId, $author, $comment)
    {
        $sql = 'INSERT INTO comments(author, recipe_id, comment, creation_date) VALUES (?, ?, ?, NOW())';
        return $this->createQuery($sql, array($author, $recipeId, $comment));
    }

}