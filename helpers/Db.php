<?php

class Db
{
    public static function getConnection(){
        $pathDbConfigs = $_SERVER["DOCUMENT_ROOT"]."/configs/database.php";
        $configs = include($pathDbConfigs);
        $dsn = "mysql:host={$configs["host"]};dbname={$configs["db"]}";
        $db = new PDO($dsn, $configs["user"], $configs["password"]);
        return $db;
    }
}