<?php
    try{
        $database = connect("localhost", "hallucine", "root", "Admin-01");
    }catch(Exception $error){
        echo "Erreur de connexion à la BDD."."<br>";
        die("ERROR: ".$error->getMessage());
    }

    $sql = "SELECT * FROM `movies`;";
    $results = $database->query($sql);
    var_dump($results->fetch(PDO::FETCH_NUM))."<br>";
    while ($row = $results->fetch()) {
        echo $row["title"]."<br>";
    }

    function connect($host, $dbname, $login, $password){
        return new PDO("mysql:host=".$host.";dbname=".$dbname, $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
?>