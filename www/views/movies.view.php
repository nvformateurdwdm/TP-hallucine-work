<?php 
ob_start();
echo $movies[0]->getImageUrl();
?>

<?php
for($i=0; $i < count($movies);$i++) : 
?>
<?php $imagePath = "image/" ?>
<div class="item">
    <img src="image/<?= $movies[$i]->getImageUrl(); ?>"
</div>
<?php endfor; ?>

<?php
$content = ob_get_clean();
$pageTitle = "Hallucine - Films";
require "template.php";
?>