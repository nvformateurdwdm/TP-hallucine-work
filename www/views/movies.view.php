<?php 
ob_start();
// var_dump($movies[0]->getTitle());
?>

<?php
for($i=0; $i < count($movies);$i++) : 
?>

<a href="index.php?page=movie&movieid=<?= $movies[$i]->getId(); ?>">
    <div class="item" >
        <img src="image/<?= $movies[$i]->getImageUrl(); ?>">
        <br>
        <?= $movies[$i]->getTitle(); ?>
        <br>
        <span class="item_date"><?= $movies[$i]->getReleaseDate()->format("Y"); ?></span>
    </div>
</a>

<?php endfor; ?>

<?php
$content = ob_get_clean();
$pageTitle = "Halluciné - Films";
require "template.php";
?>