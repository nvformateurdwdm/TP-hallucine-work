<?php
require_once "models/HallucineModel.class.php";

class HallucineController{
    private $_hallucineModel;

    public function __construct(){
        $this->_hallucineModel = new HallucineModel;
    }

    public function showLoginRegistration($part){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $this->_hallucineModel->requestLogin();
            $loginStatus = $this->_hallucineModel->getLoginStatus();
            switch ($loginStatus) {
                case HallucineModel::LOGIN_USER_NOT_FOUND:
                    require "views/login-registration.view.php";
                    break;
                case HallucineModel::LOGIN_INCORRECT_PASSWORD:
                    require "views/login-registration.view.php";
                    break;
                case HallucineModel::LOGIN_OK:
                    $this->showMovies(0);
                    break;
                default:
                    # code...
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
        $hm->requestMovie($movieId);
        $movie = $hm->getMovie();
        require "views/movie.view.php";
    }

    public function showCastings(){

    }
}
?>