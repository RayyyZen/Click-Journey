<?php
    require_once '../PHP/accespages.php';
    accesPages("inscription.php");
?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Inscription");
    ?>

    <body>
        <?php afficheHorizontal(0,0); ?>
        
        <div class="section pageinscription">Inscription</div>
        <div class="paragraph pageinscription">
            <form action="../PHP/formulaireinscription.php" method="POST">
                <div class="formulaire">
                    <label>Civilité :</label>
                    <div class="choixradio">
                        <input type="radio" id="monsieur" name="civilite" value="Monsieur">
                        <label for="monsieur" class="civiliteLabel">Monsieur</label>
                        <input type="radio" id="madame" name="civilite" value="Madame">
                        <label for="madame" class="civiliteLabel">Madame</label>
                        <i class="fa-solid fa-pen-nib"></i>
                    </div>

                    <label for="lastname">Nom : </label>
                    <input type="text" id='nom' name="nom" title="Entrez le nom de la personne en majuscules" placeholder="Dark" pattern="[A-Z]{2,}" maxlength="20" required>
                    <label for="name">Prénom : </label>
                    <input type="text" id='prenom' name="prenom" title="Entrez le prénom de la personne en commençant par une majuscule" placeholder="Vador" pattern="[A-Za-z]{2,}" maxlength="20" required>
                    <label for="mobile">Téléphone portable : </label>
                    <input type="tel" id='mobile' name="mobile" title="Entrez le numéro de téléphone portable de la personne" pattern='[0-9]{10}' placeholder="0623456789" maxlength="10" required>
                    <label for="email">Adresse mail : </label>
                    <input type="email" id='email' name="email" title="Entrez l'adresse mail de la personne" placeholder="dark.vador@gmail.com" maxlength="40" required>
                    <label for="password">Mot de passe : </label>
                    <input type="password" id='mdp' name="mdp" title="Entrez le mot de passe" placeholder="Mot de Passe" pattern="[A-Za-z]{2,}" maxlength="20" required>
                    <label for="password">Confirmer mot de passe : </label>
                    <input type="password" id='cmdp' name="cmdp" title="Confirmer le mot de passe" placeholder="Mot de Passe" pattern="[A-Za-z]{2,}" maxlength="20" required>
                    <a href="connexion.php" class="connectez-vous">Déjà un compte ? Connectez-vous !</a>
                    <input type="submit" id='sauvegarder' name="sauvegarder" title="Enregistrer la personne" value="S'inscrire" required>
                </div>
            </form>
        </div>
    </body>
</html>