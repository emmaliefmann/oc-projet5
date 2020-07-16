<?php

namespace emmaliefmann\recipes\model;

class Manager 
{
    protected function dbConnect()
    {  
        $config = include(__DIR__.'/../config/config.php');
        $db = new \PDO($config['DB_HOST'], $config['DB_USER'], $config['DB_PASSWORD']);
        return $db;

    }

    protected function createQuery($sql, $parameters=null)
    {
        if($parameters)
        {
            $result=$this->dbConnect()->prepare($sql);
            $result->execute($parameters);

            return $result;
        }

        $result=$this->dbConnect()->query($sql);
        return $result;
    }

}