<?php
    include "head.php";
?>  

<body id="<?=$idBodyCss?>">
    <header>HALLUCINE</header>
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
                    <select name="" id="sort" style="display:<?= isset($displayList) & $displayList ? "block" : "none"; ?>">
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