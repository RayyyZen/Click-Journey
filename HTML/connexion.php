<?php
    require_once '../PHP/accespages.php';
    accesPages("connexion.php");
?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Connexion");
    ?>

    <body>
        <?php afficheHorizontal(0,0); ?>

        <div class="section pageconnexion">Connexion</div>

        <div class="paragraph pageconnexion">
            <form action="../PHP/formulaireconnexion.php" method="POST">
                <div class="formulaire">
                    <label for="idPersonne">Adresse mail :</label>
                    <input type="email" id='email' name="email" title="Entrez l'identifiant de la personne" placeholder="dark.vador@gmail.com" maxlength="40" required>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id='mdp' name="mdp" title="Entrez le mot de passe" placeholder="Mot de Passe" maxlength="20" required> 
                    <!--pattern="[A-Za-z]{2,}"-->
                    <a href="inscription.php" class="inscrivez-vous">Pas de compte ? Inscrivez-vous !</a>
                    <input type="submit" id='save' name="save" title="Engistrer la personne" value="Se connecter" required>
                </div>
            </form>
        </div>
    </body>
</html>