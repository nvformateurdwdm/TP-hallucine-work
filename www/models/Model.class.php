<?php

abstract class Model{
    private static $pdo;

    // private static function setBdd(){
    //     self::$pdo = new PDO("mysql:host=localhost;dbname=biblio2;charset=utf8","root","");
    //     self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    // }

    protected function _getDatabase(){
        if(self::$pdo === null){
            self::_connect("localhost", "hallucine", "root", "Admin-01");
        }
        return self::$pdo;
    }

    private static function _connect($host, $dbname, $login, $password){
        return new PDO("mysql:host=".$host.";dbname=".$dbname, $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}