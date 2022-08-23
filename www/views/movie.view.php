<?php

ob_start();
$movieId = strval($movie->getId());
$userId = strval($user->getId());

?>

<section id="movie_section">
    <div id="movie_section_content">
        <div id="movie_section_content_left">
            <img src="<?= IMAGE_PATH.$movie->getImageUrl(); ?>" alt="<?= $movie->getTitle(); ?>">
            <form id="form_rate" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]."?page=movie&action=1") ?>" method="post">
                <input type="<?= IS_DEBUG ? "text" : "hidden"; ?>" name="userId" class="" value="<?= $userId; ?>">
                <input type="<?= IS_DEBUG ? "text" : "hidden"; ?>" name="movieId" class="" value="<?= $movieId; ?>">
                <input type="text" placeholder="Noter ce film." name="rate" required value="<?= isset($movieUserRating) ? $movieUserRating : ""; ?>">
                <input type="submit" id='submit' value="<?= isset($movieUserRating) ? "update rate" : "rate"; ?>" >
            </form>
        </div>
        <div id="movie_section_content_right">
            <h2><?= $movie->getTitle(); ?></h2>
            <h3><?= $movie->getReleaseDate()->format("d-m-Y"); ?></h3>
            <div id="rating" data-attr="">
                <div id="progressBar"></div>
            </div>
            <h4>Genre : Horreur, Aventure</h4>
            <h4>Durée : <?= $movie->getRuntime(); ?></h4>
            <h4>Acteurs : Kad Merad, Marina Foïs, Kad Merad, Marina Foïs, Kad Merad, Marina Foïs, Kad Merad, Marina Foïs</h4>
            <h4>Scénariste : Kad Merad, Marina Foïs</h4>
            <h4>Réalisateur : Kad Merad, Marina Foïs</h4>
            <h3>Résumé :<br> <?= $movie->getDescription(); ?> </h3>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
$pageTitle = "Halluciné - ".$movie->getTitle();
$displayList = false;
$idBodyCss = "movie";
require "template.view.php";
?>