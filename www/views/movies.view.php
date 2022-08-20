<?php

ob_start();

?>

<div id="items" class="row">

<?php
for($i=0; $i < count($movies);$i++) : 

    // echo $movies[$i]->getId();
?>

<div class="item col">
    <a href="index.php?page=movie&movieid=<?= $movies[$i]->getId(); ?>">
    <img src="<?= IMAGE_PATH.$movies[$i]->getImageUrl(); ?>" alt="<?= $movies[$i]->getTitle(); ?>">
        <br>
        <?= $movies[$i]->getTitle(); ?>
        <br>
        <?= $movies[$i]->getReleaseDate()->format("Y"); ?>
    </a>
</div>
    
<?php endfor; ?>

</div>

<?php
$content = ob_get_clean();
$pageTitle = "Halluciné - Films";
$idBodyCss = "movies";
require "template.view.php";
?>