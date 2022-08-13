<?php
    try{
        $database = connect("localhost", "hallucine", "root", "Admin-01");
    }catch(Exception $error){
        echo "Erreur de connexion à la BDD."."<br>";
        die("ERROR: ".$error->getMessage());
    }

    // $sql = "SELECT * FROM `movies`;";
    // $results = $database->query($sql);
    // $rows = $results->fetchAll(PDO::FETCH_BOTH);
    // foreach ($rows as $key => $value) {
    //     echo $key." ".$value["title"]."<br>";
    // }

    // $sqlCommand = $database->prepare("INSERT INTO `movies` (`title`, `image_url`, `runtime`, `description`, `release_date`) VALUES (?, ?, ?, ?, ?)");
    // $sqlCommandTitle = 'Nope';
    // $sqlCommandImageURL = 'nope.jpg';
    // $sqlCommandRuntime = '7200';
    // $sqlCommandDescription = 'Les habitants d’une vallée perdue du fin fond de la Californie sont témoins d’une découverte terrifiante à caractère surnaturel.';
    // $sqlCommandReleaseDate = '2022-08-26';
    
    // $sqlCommand->execute([$sqlCommandTitle, $sqlCommandImageURL, $sqlCommandRuntime, $sqlCommandDescription, $sqlCommandReleaseDate]);

    function connect($host, $dbname, $login, $password){
        return new PDO("mysql:host=".$host.";dbname=".$dbname, $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
?>