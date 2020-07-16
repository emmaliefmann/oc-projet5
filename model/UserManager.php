<?php

namespace emmaliefmann\recipes\model;

class UserManager extends Manager 
{
    public function login($email) 
    {
        $sql = 'SELECT * FROM users WHERE email = ? ';
        return $this->createQuery($sql, array($email));
    }
} 