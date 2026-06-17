<?php
abstract class Modele{
    private static $pdo = null;
    protected static function getPDO(){
        if(self::$pdo === null){
            self::$pdo = new PDO(
                "mysql:host=localhost;dbname=mydb;charset=utf8",
                "root",
                ""
            );
            self::$pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }
        return self::$pdo;
    }
}