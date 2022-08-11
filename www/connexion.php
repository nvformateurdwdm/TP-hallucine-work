<?php
    $database = new PDO("mysql:host=localhost;dbname=hallucine", "root", "Admin-01");
    $sql = "SELECT * FROM `movies`;";
    $results = $database->query($sql);
    while ($row = $results->fetch()) {
        echo $row["title"]."<br>";
    }
?>