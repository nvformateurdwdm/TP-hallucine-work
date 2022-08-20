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