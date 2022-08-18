<?php 
ob_start();
// var_dump($movies[0]->getTitle());
?>

<?php
for($i=0; $i < count($movies);$i++) : 
?>

<div class="item">
    <img src="image/<?= $movies[$i]->getImageUrl(); ?>">
    <?= $movies[$i]->getTitle(); ?>
    <br>
    <?= $movies[$i]->getReleaseDate()->format("Y"); ?>
</div>

<?php endfor; ?>

<?php
$content = ob_get_clean();
$pageTitle = "Halluciné - Films";
require "template.php";
?>