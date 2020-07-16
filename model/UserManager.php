<?php

namespace emmaliefmann\recipes\model;

class UserManager extends Manager 
{
    public function login($email) 
    {
        $sql = 'SELECT * FROM users WHERE email = ? ';
        return $this->createQuery($sql, array($email));
    }

    public function register($username, $email, $password)
    {
        $sql ='INSERT INTO  users(username, email, creation_date, `password`) VALUES(?, ?, NOW(), ? )';
        return $this->createQuery($sql, array($username, $email, $password));
    }
} 