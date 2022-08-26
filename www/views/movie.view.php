<?php

ob_start();

$params = ($_SERVER["QUERY_STRING"]);

if(isset($user)){
    $movieId = strval($movie->getId());
    $userId = strval($user->getId());
    if(isset($movieUserRating)){
        $action = HallucineModel::MOVIE_USER_UPDATE_RATE;
    }else{
        $action = HallucineModel::MOVIE_USER_RATE;
    }
}

// var_dump($movieUserRating);



?>

<section id="movie_section">
    <div id="movie_section_content">
        <div id="movie_section_content_left">
            <img src="<?= IMAGE_PATH.$movie->getImageUrl(); ?>" alt="<?= $movie->getTitle(); ?>">
            <form id="form_rate" action="<?= htmlspecialchars($_SERVER["PHP_SELF"])."?$params" ?>" method="post" style="display:<?= isset($user) ? "block" : "none"; ?>" >
                <input type="<?= IS_DEBUG ? "text" : "hidden"; ?>" name="userId" value="<?= $userId; ?>">
                <input type="<?= IS_DEBUG ? "text" : "hidden"; ?>" name="movieId" value="<?= $movieId; ?>">
                <input style="display:<?= isset($movieUserRating) ? "block" : "none"; ?>" type="<?= IS_DEBUG ? "text" : "hidden"; ?>" name="movieUserRatingId" value="<?= isset($movieUserRating) ? $movieUserRating->getId() : "" ?>">
                <input type="<?= IS_DEBUG ? "text" : "hidden"; ?>" name="action" value="<?= $action ?>">
                <input type="number" placeholder="Noter ce film." name="rate" pattern="[0-9]" value="<?= isset($movieUserRating) ? $movieUserRating->getRate() : (IS_DEBUG ? random_int(5, 80) : ""); ?>">
                <input type="submit" id='submit' value="<?= isset($movieUserRating) ? "Update rate" : "Rate"; ?>" >
            </form>
        </div>
        <div id="movie_section_content_right">
            <h2><?= $movie->getTitle(); ?></h2>
            <h3><?= $movie->getReleaseDate()->format("d-m-Y"); ?></h3>
            <div id="rating" data-attr="<?= $movie->getRate() ?>">
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