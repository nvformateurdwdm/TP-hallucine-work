<?php

session_start();

// session_destroy();
require "config.php";

require_once "controllers/HallucineController.controller.php";
$hallucineController = new HallucineController();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $params = explode("=", filter_var($_SERVER["QUERY_STRING"]));
    switch ($params[1]) {
        case "login":
            $hallucineController->showLoginRegistration("login");
            break;
        default:
            
            break;
    }
}else{
    if(empty($_GET['page'])){
        if(isset($_SESSION['user'])){
            $hallucineController->showMovies(0);
        }else{
            $hallucineController->showLoginRegistration("login");
        }
    } else {
        if(IS_DEBUG){echo $_GET['page'];}
        switch($_GET['page']){
            case "login":
                $hallucineController->showLoginRegistration("login");
            break;
            case "logout":
                session_destroy();
                $hallucineController->showLoginRegistration("login");
            break;
            case "movies":
                $sort = isset($_GET['sort']) ? $_GET['sort'] : 0;
                $hallucineController->showMovies($sort);
            break;
            case "movie" :
                $movieId = $_GET['movieid'];
                $hallucineController->showMovie($movieId);
            break;
            case "castings" :
                
            break;
            default:
                echo "Cas de page non géré...";
            break;
        }
    }
}

?>
