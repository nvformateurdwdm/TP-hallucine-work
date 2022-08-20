<?php

$getDebug = isset($_GET["debug"]) && $_GET["debug"] == "true" ? true : false;
define("IS_DEBUG", $_SERVER["HTTP_HOST"] == "localhost" || $getDebug ? true : false);

/** DATABASE **/
define("HOST", "localhost");
define("LOGIN", "root");
define("DB_NAME", "hallucine");
define("PASSWORD", "Admin-01");

define("IMAGE_PATH", "image/");
?>