<?php

abstract class Model{
    private static $pdo;

    // private static function setBdd(){
    //     self::$pdo = new PDO("mysql:host=localhost;dbname=biblio2;charset=utf8","root","");
    //     self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    // }

    protected function _getDatabase(){
        if(self::$pdo === null){
            try{
                self::$pdo = self::_connect("localhost", "hallucine", "root", "Admin-01");
            }catch(Exception $error){
                echo "Erreur de connexion à la BDD.<br>";
                die("ERROR: ".$error->getMessage());
            }
        }
        return self::$pdo;
    }

    private static function _connect($host, $dbname, $login, $password){
        $db = new PDO("mysql:host=".$host.";dbname=".$dbname, $login, $password);
        // , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}