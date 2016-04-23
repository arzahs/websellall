<?php



ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once("helpers/Router.php");
require_once("helpers/Db.php");
session_start();

$router = new Router();
$router->run();