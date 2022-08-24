<?php
require_once "models/HallucineModel.class.php";

class HallucineController{
    private $_hallucineModel;

    public function __construct(){
        $this->_hallucineModel = new HallucineModel;
    }

    public function showLoginRegistration($part){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $this->_hallucineModel->requestLogin($_POST["email"], $_POST["password"]);
            $loginStatus = $this->_hallucineModel->getLoginStatus();
            switch ($loginStatus) {
                case HallucineModel::LOGIN_USER_NOT_FOUND:
                case HallucineModel::LOGIN_INCORRECT_PASSWORD:
                    require "views/login-registration.view.php";
                    break;
                case HallucineModel::LOGIN_OK:
                    $_SESSION['user'] = serialize($this->_hallucineModel->getUser());
                    $this->showMovies(0);
                    break;
                default:
                    echo "Cas de login non géré...";
                    break;
            }
        }else{
            require "views/login-registration.view.php";
        }
    }

    public function showMovies($sort){
        $hm = $this->_hallucineModel;
        $hm->requestMovies($sort);
        $movies = $hm->getMovies();
        require "views/movies.view.php";
    }

    public function showMovie(int $movieId){
        $hm = $this->_hallucineModel;
        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
        }

        $hm->requestMovie($movieId);
        $movie = $hm->getMovie();

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            switch ($_POST['action']) {
                case HallucineModel::MOVIE_USER_RATE:
                        $hm->setMovieUserRating($_POST['userId'], $_POST['movieId'], $_POST['rate']);
                    break;
                    case HallucineModel::MOVIE_USER_UPDATE_RATE:
                        $hm->updateMovieUserRating($_POST['movieUserRatingId'], $_POST['rate']);
                    break;
                    case HallucineModel::MOVIE_USER_DELETE_RATE:
                    
                    break;
                    default:
                        echo "cas de rating non géré...";
                    break;
                }
            $movieUserRating = $hm->requestMovieUserRating($user->getId(), $movie->getId());
        }else{
            if(isset($user)){
                $movieUserRating = $hm->requestMovieUserRating($user->getId(), $movie->getId());
            }
        }
        require "views/movie.view.php";
    }

    public function showCastings(){
        
    }
}
?>