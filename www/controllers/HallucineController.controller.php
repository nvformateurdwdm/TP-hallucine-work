<?php
require_once "models/HallucineModel.class.php";

class HallucineController{
    private $_hallucineModel;

    public function __construct(){
        $this->_hallucineModel = new HallucineModel;
    }

    public function showMovies(){
        $hm = $this->_hallucineModel;
        $hm->requestMovies();
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