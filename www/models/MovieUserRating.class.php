<?php

class MovieUserRating{

    private int $_id;
    private int $_userId;
    private int $_movieId;
    private int $_rate;

    public function __construct($id, $userId, $movieId, $rate){
        $this->_id = $id;
        $this->_userId = $userId;
        $this->_movieId = $movieId;
        $this->_rate = $rate;
    }

    public function getId(){return $this->_id;}
    public function getUserId(){return $this->_userId;}
    public function getMovieId(){return $this->_movieId;}
    public function getRate(){return $this->_rate;}

}

?>