<?php
    require_once '../PHP/accespages.php';
    accesPages("connexion.php");
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Connexion | Star Tour</title>
        <meta charset="UTF-8">
        <meta name="description" content="Agence de voyage des lieux de tournage de la saga Star Wars">
        <meta name="author" content="Rayane M., Enzo F., Hugo N.">
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    </head>

    <body>
        <div class="horizontal">
            <div class="nomSite"> <a href="index.php">Star Tour</a> </div>
        </div>

        <div class="section pageconnexion">Connexion</div>

        <div class="paragraph pageconnexion">
            <form action="../PHP/formulaireconnexion.php" method="POST">
                <div class="formulaire">
                    <label for="idPersonne">Adresse mail :</label>
                    <input type="email" id='email' name="email" title="Entrez l'identifiant de la personne" placeholder="dark.vador@gmail.com" maxlength="40" requiered>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id='mdp' name="mdp" title="Entrez le mot de passe" placeholder="Mot de Passe" maxlength="20" requiered> 
                    <!--pattern="[A-Za-z]{2,}"-->
                    <a href="inscription.php" class="inscrivez-vous">Pas de compte ? Inscrivez-vous !</a>
                    <input type="submit" id='save' name="save" title="Engistrer la personne" value="Se connecter" requiered>
                </div>
            </form>
        </div>
    </body>
</html>