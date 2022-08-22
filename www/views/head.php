<?php
    if(isset($_SESSION['user'])){
        var_dump($_SESSION['user']);
        require_once "models/User.class.php";
        $user = $_SESSION['user'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="style/styles.css" rel="stylesheet">
    <title><?= isset($pageTitle) ? $pageTitle : "TP Halluciné" ?></title>
</head>