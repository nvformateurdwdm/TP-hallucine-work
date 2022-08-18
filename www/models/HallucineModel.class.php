<?php

require_once "Model.class.php";
require_once "Movie.class.php";
require_once "Casting.class.php";

class HallucineModel extends Model{
    private $_movies;
    private $_movie;

    public function requestMovies(){
        $_movies = array();
        $sql = "SELECT * FROM `movies` ORDER BY title;";

        $request = $this->_getDatabase()->prepare($sql);
        $request->execute();
        $rows = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();

        foreach ($rows as $key => $value) {
            $movie = new Movie($value["id"], $value["title"], $value["image_url"], $value["runtime"], $value["description"], $value["release_date"], $value["added_date"]);
            $this->_movies[] = $movie;
        }
        // var_dump($this->_movies);
    }

    public function getMovies(){
        // var_dump($this->_movies);
        return $this->_movies;
    }

    public function requestMovie(int $movieId){
        $sql = "SELECT * FROM `movies` WHERE id = $movieId;";
        $request = $this->_getDatabase()->prepare($sql);
        $request->execute();
        $rows = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        $value = $rows[0];

        $movie = new Movie($value["id"], $value["title"], $value["image_url"], $value["runtime"], $value["description"], $value["release_date"], $value["added_date"]);
        $this->_movie = $movie;
    }

    public function getMovie(){
        // var_dump($this->_movies);
        return $this->_movie;
    }
    
}



?>