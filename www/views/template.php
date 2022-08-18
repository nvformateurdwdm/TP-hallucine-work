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
                    <li>Acteurs</li>
                    <li>Réalisateurs</li>
                </ul>
            </nav>
        </div>
        <div id="right">
        <select name="" id="" style="display:<?= isset($displayList) & $displayList ? "block" : "none"; ?>">
                <option value="title">Par titre</option>
                <option value="added_date">Par date d'ajout</option>
                <option value="release_date">Par date de sortie</option>
            </select>
            <!-- <div id="items"> -->
                <?= $content ?>
            <!-- </div> -->
        </div>
    </div>
</body>
</html>