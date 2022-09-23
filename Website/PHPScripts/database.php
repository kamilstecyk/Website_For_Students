<?php

    $config = require_once 'config.php';
    $connection = @new mysqli($config['host'],$config['user'],$config['password'],$config['database']);

    try
    {


        if($connection->connect_errno != 0)
        {
            echo "Error";
            throw new Exception("you cannot connect with database :( Please notify us about this error and try later");
            
        }
        else
        {
            return true;
        }
    }
    catch(Exception $e)
    {
        echo " Unfortunately ".$e->getMessage();
        return 0;
    }

?>