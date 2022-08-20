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