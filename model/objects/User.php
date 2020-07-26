<?php 

namespace emmaliefmann\recipes\model\objects;

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

    public function setId()
    {
        $this->id = $id;
    }

    public function setUsername()
    {
        $this->userName = $userName;
    }

    public function setEmail()
    {
        $this->email = $email;
    }

    public function setCreationDate()
    {
        $this->creationDate = $creationDate;
    }

    public function setPassword()
    {
        $this->password = $password;
    }
    public function setLevel()
    {
        $this->level = $level;
    }
}