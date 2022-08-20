<?php

require "config.php";

require_once "controllers/HallucineController.controller.php";
$hallucineController = new HallucineController();

if(empty($_GET['page'])){
    // require "views/accueil.view.php";
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 0;
    $hallucineController->showMovies($sort);
} else {
    switch($_GET['page']){
        case "login": 
            $hallucineController->showLogin();
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

?>
