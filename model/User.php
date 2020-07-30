<?php 

namespace emmaliefmann\recipes\model;

class User 
{
    private $id;
    private $userName;
    private $email;
    private $creationDate;
    private $password;
    private $level;
    
    

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->userName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function getLevel()
    {
        return $this->level;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUsername($userName)
    {
        $this->userName = $userName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setLevel($level)
    {
        $this->level = $level;
    }
}