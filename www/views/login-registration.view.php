<?php

ob_start();

?>

<?php
    include "head.php";
    $idBodyCss = "login-registration";
?>

<body id="<?=$idBodyCss?>">
<section id="login-registration_section">
    <div id="login-registration_section_content">
        <form id="$part" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?page=$part") ?>" method="POST">
            <h1>Connexion</h1>

            <!-- <label><b>email</b></label> -->
            <input type="text" placeholder="Votre email" name="email" required value="<?= IS_DEBUG ? "nicolas.vedrine@gmail.com" : ""; ?>">

            <!-- <label><b>Mot de passe</b></label> -->
            
            <input type="password" placeholder="Votre mot de passe" name="password" required value="<?= IS_DEBUG ? "1234" : ""; ?>">
            <br>

            <input type="submit" id='submit' value='<?= $part; ?>' >
        </form>
    </div>
</section>

</body>


<?php
$content = ob_get_clean();
$pageTitle = "Halluciné - ".$part;
$displayList = false;
?>


<?= $content ?>
</html>