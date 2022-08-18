<?php

require_once "Model.class.php";
require_once "Movie.class.php";
require_once "Casting.class.php";

class HallucineManager extends Model{
    private $_movies;

    public function requestMovies(){
        $_movies = array();
        $sql = "SELECT * FROM `movies`;";

        $request = $this->_getDatabase()->prepare($sql);
        $request->execute();
        $rows = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();

        foreach ($rows as $key => $value) {
            $movie = new Movie($value["id"], $value["title"], $value["image_url"], $value["runtime"], $value["description"], $value["release_date"], $value["added_date"]);
            //$this->ajoutLivre($l);
            // $this->livres[] = $livre; >>> autre possibilité d'ajout dans un tab ?...
            $this->_movies[] = $movie;
        }
        // var_dump($this->_movies);
    }

    public function getMovies(){
        // var_dump($this->_movies);
        return $this->_movies;
    }
    
}



?>