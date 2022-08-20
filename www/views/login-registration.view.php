<?php

ob_start();

?>

<section id="login-registration">
    <div id="login-registration_section_content">
        <form action="index.php?page=login" method="POST">
            <h1>Connexion</h1>
    
            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit" id='submit' value='LOGIN' >
            
        </form>
    </div>
</section>

<?php
$content = ob_get_clean();
$pageTitle = "Halluciné - Login";
$displayList = false;
// $idBodyCss = "movie";
require "template.view.php";
?>