<?php
    include "connexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include "head.php";
?>
<body>
    <header>HALLUCINE</header>
    <div id="container">
        <div id="left">
            <nav>
                <ul>
                    <li>Films</li>
                    <li>Acteurs</li>
                    <li>Réalisateurs</li>
                </ul>
            </nav>
        </div>
        <div id="right">
            <select name="" id="">
                <option value="title">Par titre</option>
                <option value="added_date">Par date d'ajout</option>
                <option value="release_date">Par date de sortie</option>
            </select>
            <div id="items">
                <?php
                    $sql = "SELECT * FROM `movies`;";
                    $results = $database->query($sql);
                    $rows = $results->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $key => $value) {
                        // echo $key." ".$value["title"]."<br>";
                        $movie = new Movie($value["id"], $value["title"], $value["image_url"], $value["runtime"], $value["description"], $value["release_date"], $value["added_date"]);
                        echo $movie->getMovie();
                    }

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

                        public function getMovie(){
                            $imagePath = "image/";
                            $html = "<div class='item'>";
                            $html .= "<img src='$imagePath" . $this->_imageURL . "' " . "alt='$this->_title'>";
                            $html .= $this->_title."<br>";
                            $html .= $this->_releaseDate->format("Y");
                            $html .= "</div>";
                            // var_dump($html);
                            return $html;
                        }
                    }

                ?>
            </div>
        </div>
    </div>
    <img src="" class= alt="">
</body>
</html>