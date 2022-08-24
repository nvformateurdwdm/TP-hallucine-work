<?php

require_once "Model.class.php";
require_once "Movie.class.php";
require_once "User.class.php";
require_once "MovieUserRating.class.php";
require_once "Casting.class.php";

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

    const MOVIE_USER_RATE = 0;
    const MOVIE_USER_UPDATE_RATE = 1;
    const MOVIE_USER_DELETE_RATE = 2;

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
        return $this->_movie;
    }

    public function getMovie(){
        // var_dump($this->_movies);
        return $this->_movie;
    }

    public function requestMovieUserRating(int $userId, int $movieId): ?MovieUserRating{
        $sql = "SELECT *  FROM `movies_users_ratings` WHERE `user_id` = $userId AND `movie_id` = $movieId;";
        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
        if(count($rows) > 0){
            $value = $rows[0];
            $movieUserRating = new MovieUserRating($value["id"], $value["user_id"], $value["movie_id"], $value["rate"]);
            return $movieUserRating;
        }else{
            return NULL;
        }
    }

    public function setMovieUserRating(int $userId, int $movieId, int $rate){
        $sql = "INSERT INTO `movies_users_ratings` (`user_id`, `movie_id`, `rate`) VALUES ('$userId', '$movieId', '$rate')";
        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
        var_dump($rows);
    }

    public function updateMovieUserRating(int $movieUserRatingId, int $rate){
        $sql = "UPDATE `movies_users_ratings` SET `rate` = $rate WHERE `movies_users_ratings`.`id` = $movieUserRatingId;";
        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
        var_dump($rows);
    }

    public function deleteMovieUserRating(int $movieUserRatingId){
        $sql = "UPDATE `movies_users_ratings` SET `rate` = $rate WHERE `movies_users_ratings`.`id` = $movieUserRatingId;";
        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
        var_dump($rows);
    }

    // public function requestMovieUserRate(int $movieId, int $userId, int $rate, int $action = MOVIE_USER_RATE): ?MovieUserRating{

    //     switch ($action) {
    //         case self::MOVIE_USER_RATE:
    //             $sql = "INSERT INTO `movies_users_ratings` (`user_id`, `movie_id`, `rate`) VALUES ('$userId', '$movieId', '$rate')";
    //             break;
    //         case self::MOVIE_USER_UPDATE_RATE:
    //             $sql = $sql = "UPDATE `movies_users_ratings` SET `rate` = '$rate' WHERE `movies_users_ratings`.`id` = 8";
    //             break;
    //         case self::MOVIE_USER_DELETE_RATE:
                
    //             break;
    //         default:
    //             echo "rate non géré...";
    //             break;
    //     }

    //     $sql = "SELECT *  FROM `movies_users_ratings` WHERE `user_id` = $userId AND `movie_id` = $movieId;";
    //     $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
    //     if(count($rows) > 0){
    //         $value = $rows[0];
    //         $movieUserRating = new MovieUserRating($value["id"], $value["user_id"], $value["movie_id"], $value["rate"]);
    //         return $movieUserRating;
    //     }else{
    //         return NULL;
    //     }
    // }
    
}



?>