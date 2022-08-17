<?php

require_once "Model.class.php";
require_once "Movie.class.php";
require_once "Casting.class.php";

class HallucineManager extends Model{
    private Array $_movies;

    public function requestMovies(){
        $_movies = new Array();
        $sql = "SELECT * FROM `movies`;";
        // $results = $database->query($sql);
        // $rows = $results->fetchAll(PDO::FETCH_ASSOC);

        $request = $this->_getDatabase()->prepare($sql);
        $request->execute();
        $rows = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();

        foreach($rows as $movie){
            $m = new Movie($value["id"], $value["title"], $value["image_url"], $value["runtime"], $value["description"], $value["release_date"], $value["added_date"]);
            //$this->ajoutLivre($l);
            // $this->livres[] = $livre; >>> autre possibilité d'ajout dans un tab ?...
            array_push($_movies, $m);
        }
    }

    public function getMovies(){
        return $this->$_movies;
    }
    
}



?>