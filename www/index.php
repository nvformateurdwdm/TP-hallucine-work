<?php
require_once "controllers/HallucineController.controller.php";
$hallucineController = new HallucineController();

// if(empty($_GET['page'])){
//     require "views/accueil.view.php";
// } else {
//     switch($_GET['page']){
//         case "accueil" : require "views/accueil.view.php";
//         break;
//         case "livres" : $livreController->afficherLivres();
//         break;
//     }
// }

if(empty($_GET['page'])){
    // require "views/accueil.view.php";
} else {
    switch($_GET['page']){
        case "movie" :
            $movieId = $_GET['movieid'];
            // require "views/accueil.view.php";
        break;
        case "livres" :
            
        break;
    }
}

$hallucineController->showMovies();

?>
