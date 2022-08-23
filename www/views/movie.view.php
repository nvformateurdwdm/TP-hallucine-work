<?php

ob_start();

if(isset($movieUserRating)){
    $movieId = strval($movieUserRating->getId());
    $userId = strval($movieUserRating->getId());
}

?>

<section id="movie_section">
    <div id="movie_section_content">
        <div id="movie_section_content_left">
            <img src="<?= IMAGE_PATH.$movie->getImageUrl(); ?>" alt="<?= $movie->getTitle(); ?>">
            <form id="form_rate" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]."?page=movie&action=1") ?>" method="post" style="display:<?= isset($movieUserRating) ? "block" : "none"; ?>" >
                <input type="<?= IS_DEBUG ? "text" : "hidden"; ?>" name="userId" class="" value="<?= isset($movieUserRating) ? $movieUserRating->getUserId() : "" ; ?>">
                <input type="<?= IS_DEBUG ? "text" : "hidden"; ?>" name="movieId" class="" value="<?= isset($movieUserRating) ? $movieUserRating->getMovieId() : "" ; ?>">
                <input type="text" placeholder="Noter ce film." name="rate" required value="<?= isset($movieUserRating) ? $movieUserRating->getRate() : ""; ?>">
                <input type="submit" id='submit' value="<?= isset($movieUserRating) ? "Update rate" : "Rate"; ?>" >
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