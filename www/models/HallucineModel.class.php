<?php

require_once "Model.class.php";
require_once "Movie.class.php";
require_once "Casting.class.php";
require_once "User.class.php";
// require_once "config.php";

class HallucineModel extends Model{
    private $_user;
    private int $_loginStatus;
    private $_movies;
    private $_movie;

    const SORT_MOVIES_BY_TITLE = 0;
    const SORT_MOVIES_BY_RELEASE_DATE = 1;
    const SORT_MOVIES_BY_ADDED_DATE = 2;

    const LOGIN_USER_NOT_FOUND = 0;
    const LOGIN_INCORRECT_PASSWORD = 1;
    const LOGIN_OK = 2;

    public function requestLogin($email, $password){
        $email = $this->_checkInput($email);
        $sql = "SELECT *  FROM `users` WHERE `email` = '$email'";
        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
        if(count($rows) == 0){
            $this->_loginStatus = self::LOGIN_USER_NOT_FOUND;
            return;
        }else{
            $value = $rows[0];
            if ($value["password"] !== $password) {
                $this->_loginStatus = self::LOGIN_INCORRECT_PASSWORD;
                return;
            } else {
                $this->_user = new User($value["id"], $value["firstname"], $value["lastname"], $value["email"], $value["password"], $value["sex"]);
                $_SESSION['user'] = $this->_user;
                $this->_loginStatus = self::LOGIN_OK;
            }
        }
    }

    public function getUser(){return $this->_user;}

    public function getLoginStatus(){return $this->_loginStatus;}

    private function _checkInput($input){
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        if(IS_DEBUG){
            // echo $input;
            // echo "<br>";
        }
        return $input;
    }
    
    public function requestMovies(int $sort = self::SORT_MOVIES_BY_TITLE){
        $_movies = array();
        switch ($sort) {
            case self::SORT_MOVIES_BY_TITLE:
                $sql = "SELECT * FROM `movies` ORDER BY title;";
                break;
            case self::SORT_MOVIES_BY_RELEASE_DATE:
                $sql = "SELECT * FROM `movies` ORDER BY release_date;";
                break;
            case self::SORT_MOVIES_BY_ADDED_DATE:
                $sql = "SELECT * FROM `movies` ORDER BY added_date;";
                break;
            default:
                $sql = "SELECT * FROM `movies`;";
                break;
        }

        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);

        // nbLoops = IS_DEBUG ? 5 : 1; // en prévision de la pagination.

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
        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
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