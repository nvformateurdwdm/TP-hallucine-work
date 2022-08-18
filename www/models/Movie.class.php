<?php

class Movie{

    private int $_id;
    private string $_title;
    private string $_imageURL;
    private int $_runtime;
    private string $_description;
    private DateTime $_releaseDate;
    private DateTime $_addedDate;

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

    // public function getMovie(){
    //     $imagePath = "image/";
    //     $html = "<div class='item'>";
    //     $html .= "<img src='$imagePath" . $this->_imageURL . "' " . "alt='$this->_title'>";
    //     $html .= $this->_title."<br>";
    //     $html .= $this->_releaseDate->format("Y");
    //     $html .= "</div>";
    //     return $html;
    // }
    
}

?>