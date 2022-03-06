<?php

require_once '../database/Connection.php';

abstract class DAOFactory{

    public static $connection;

    public static function getDAOFactory(){
        self::$connection = new Connection();
    }

    public static function Connection(){
        return self::$connection = new Connection();
    }
}


