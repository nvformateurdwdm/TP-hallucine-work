<?php
require_once "models/HallucineManager.class.php";

class HallucineController{
    private $hallucineManager;

    public function __construct(){
        $this->hallucineManager = new HallucineManager;
    }

    public function showMovies(){
        $hm = $this->hallucineManager;
        $hm->requestMovies();
        $movies =$hm->getMovies();
        require "views/movies.view.php";
    }

    public function showMovie(int $movieId){

    }

    public function showCastings(){

    }
}
?>