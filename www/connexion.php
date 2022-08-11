<?php
    try{
        $database = connect("localhost", "hallucine", "root", "Admin-01");
    }catch(Exception $error){
        echo "Erreur de connexion à la BDD."."<br>";
        die("ERROR: ".$error->getMessage());
    }

    $sql = "SELECT * FROM `movies`;";
    $results = $database->query($sql);
    $rows = $results->fetchAll(PDO::FETCH_BOTH);
    //var_dump($results->fetchAll()[0])."<br>";
    // while ($row = $results->fetch()) {
    //     echo $row["title"]."<br>";
    // }
    foreach ($rows as $key => $value) {
        echo $key." ".$value["title"]."<br>";
    }

    $sql = "INSERT INTO `movies` (`id`, `title`, `image_url`, `runtime`, `description`, `release_date`) VALUES (NULL, 'Nope', 'nope.jpg', '7200', 'Les habitants d’une vallée perdue du fin fond de la Californie sont témoins d’une découverte terrifiante à caractère surnaturel.', '2022-08-26')";
    echo $sql;
    $database->query($sql);

    function connect($host, $dbname, $login, $password){
        return new PDO("mysql:host=".$host.";dbname=".$dbname, $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
?>