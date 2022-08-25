<?php

class Movie{

    private int $_id;
    private string $_title;
    private string $_imageURL;
    private int $_runtime;
    private string $_description;
    private DateTime $_releaseDate;
    private DateTime $_addedDate;

    private int $_rate = 0;

    public function __construct($id, $title, $imageURL, $runtime, $description, $releaseDate, $addedDate){
        $this->_id = $id;
        $this->_title = $title;
        $this->_imageURL = $imageURL;
        $this->_runtime = $runtime;
        $this->_description = $description;
        $this->_releaseDate = new DateTime($releaseDate);
        $this->_addedDate = new DateTime($addedDate);

        // var_dump($this->_releaseDate->format("Y"));
    }

    public function getId(){return $this->_id;}
    public function getTitle(){return $this->_title;}
    public function getImageUrl(){return $this->_imageURL;}
    public function getRuntime(){return $this->_runtime;}
    public function getDescription(){return $this->_description;}
    public function getReleaseDate(){return $this->_releaseDate;}
    public function getAddedDate(){return $this->_addedDate;}

    public function getRate(){return $this->_rate;}
    public function setRate(int $rate){$this->_rate = $rate;}
    
}

?>