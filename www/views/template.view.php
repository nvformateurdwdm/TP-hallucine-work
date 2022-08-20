<?php
    include "head.php";
    // echo $_SESSION["test"];
    // session_start();
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
?>  

<body id="<?=$idBodyCss?>">
    <header>
        <div><h1><a href="index.php">HALLUCINE</a></h1></div>
        <div id="user"><?= isset($user) ? "Bienvenue, ". $user->getFirstname()." ".$user->getLastname()."<br><a href='index.php?page=logout'>Se déconnecter.</a>" : "<a href='index.php'>Se connecter.</a>"; ?></div>
    </header>
    <div id="container" class="container-fluid">
        <div class="row">
            <div id="left" class="col-sm-2 col-lg-3">
            <nav>
                <ul>
                    <li>Films</li>
                    <li>Acteurs</li>
                    <li>Réalisateurs</li>
                </ul>
            </nav>
        </div>
            <div id="right" class="col-sm-10 col-lg-9 container">
                <div class="row">
                    <select name="" id="sort" style="display:<?= isset($displayList) && $displayList ? "block" : "none"; ?>">
                        <option value="0" <?= isset($sort) && $sort == 0 ? "selected" : ""; ?> >Par titre</option>
                        <option value="1" <?= isset($sort) && $sort == 1 ? "selected" : ""; ?> >Par date de sortie</option>
                        <option value="2" <?= isset($sort) && $sort == 2 ? "selected" : ""; ?> >Par date d'ajout</option>
                    </select>
                </div>
                
                <?= $content ?>

        </div>
    </div>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="javascript/fw.js"></script>
    <script src="javascript/script.js"></script>
</body>
</html>