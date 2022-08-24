<?php

require_once "models/User.class.php";
session_start();

// session_destroy();
require "config.php";

require_once "controllers/HallucineController.controller.php";
$hallucineController = new HallucineController();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $params = array();
    parse_str($_SERVER["QUERY_STRING"], $params);

    switch ($params['page']) {
        case 'login':
            $hallucineController->showLoginRegistration("login");
            break;
        case 'movie':
            $hallucineController->showMovie($params['movieid']);
            // switch ($params['action']) {
            //     case HallucineModel::MOVIE_USER_GET_RATING:
                    
            //         break;
            //     case HallucineModel::MOVIE_USER_UPDATE_RATE:
                    
            //         break;
            //     case HallucineModel::MOVIE_USER_DELETE_RATE:
                    
            //         break;
            //     default:
            //         echo "cas de rating non géré...";
            //         break;
            // }
                    
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
        if(IS_DEBUG){echo $_GET['page']."<br>";}
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
