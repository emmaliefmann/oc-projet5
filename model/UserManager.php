<?php

namespace emmaliefmann\recipes\model;

class UserManager extends Manager 
{
    public function buildUserObject($user) 
    {
        $userObject = new \emmaliefmann\recipes\model\User();
        $userObject->setId($user['id']);
        $userObject->setUserName($user['username']);
        $userObject->setEmail($user['email']);
        $userObject->setCreationDate($user['creation_date']);
        $userObject->setLevel($user['level']);
        $userObject->setActive($user['active']);
        return $userObject;
    }

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

    public function changePassword($password, $userId)
    {
        $sql ='UPDATE users SET `password`=? WHERE `id`= ?';
        return $this->createQuery($sql, array($password, $userId));

    }
    public function getLevel($userId)
    { 
        $sql = 'SELECT `level` FROM `users` WHERE `id`=?';
        return $this->createQuery($sql, [$userId]);
        
    }

    public function getAllUsers()
    {
        $sql = 'SELECT * FROM users ORDER BY `creation_date` DESC';
        $result = $this->createQuery($sql);
        $allUsers = [];
        while ($user = $result->fetch()) {
            $userObject = $this->buildUserObject($user);
            array_push($allUsers, $userObject);
        }
        return $allUsers;
    }
    
    public function allowAccess($user)
    {
        $sql = 'UPDATE users SET `active`="active" WHERE id= ?';
        return $this->createQuery($sql, array($user));
    }
    public function suspendAccess($user)
    {
        $sql = 'UPDATE users SET `active`="suspended" WHERE id= ?';
        return $this->createQuery($sql, array($user));
    }
} 