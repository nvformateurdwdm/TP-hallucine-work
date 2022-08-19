<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/styles.css" rel="stylesheet">
    <title><?= isset($pageTitle) ? $pageTitle : "TP Halluciné" ?></title>
</head>

<body>
    <header>HALLUCINE</header>
    <div id="container">
        <div id="left">
            <nav>
                <ul>
                    <li>Films</li>
                    <li>Castings</li>
                </ul>
            </nav>
        </div>
        <div id="right">
        <select name="" id="sort" style="display:<?= isset($displayList) & $displayList ? "block" : "none"; ?>">
            
            <option value="0" <?= isset($sort) && $sort == 0 ? "selected" : ""; ?> >Par titre</option>
            <option value="1" <?= isset($sort) && $sort == 1 ? "selected" : ""; ?> >Par date de sortie</option>
            <option value="2" <?= isset($sort) && $sort == 2 ? "selected" : ""; ?> >Par date d'ajout</option>
        </select>
        <span id="back"style="display:<?= isset($displayList) && $displayList ? "none" : "block"; ?>">Retour</span>
            <!-- <div id="items"> -->
                <?= $content ?>
            <!-- </div> -->
        </div>
    </div>
    <script src="javascript/fw.js"></script>
    <script src="javascript/script.js"></script>
</body>
</html>