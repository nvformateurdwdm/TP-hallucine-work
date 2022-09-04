<?php

$getDebug = isset($_GET["debug"]) && $_GET["debug"] == "true" ? true : false;
define("IS_DEBUG", ($_SERVER["HTTP_HOST"] == "localhost" || $_SERVER["HTTP_HOST"] == "192.168.0.50") || $getDebug ? true : false);

switch ($_SERVER["HTTP_HOST"]) {
    case '192.168.0.50':
        $password = "admin-Vedhome01";
        break;
    case 'localhost':
        $password = "Admin-01";
        break;
    default:
        $password = "";
        break;
}

/** DATABASE **/
define("HOST", $_SERVER["HTTP_HOST"]);
define("LOGIN", "root");
define("DB_NAME", "hallucine_work");
define("PASSWORD", $password);

define("IMAGE_PATH", "image/");
?>