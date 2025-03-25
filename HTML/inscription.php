<?php
    require_once '../PHP/accespages.php';
    accesPages("inscription.php","");
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
                        <?php
                            if(isset($_GET['civilite']) && $_GET['civilite'] == "Monsieur"){
                                echo '<input type="radio" id="monsieur" name="civilite" value="Monsieur" checked>';
                            }
                            else{
                                echo '<input type="radio" id="monsieur" name="civilite" value="Monsieur">';
                            }
                        ?>
                        <label for="monsieur" class="civiliteLabel">Monsieur</label>
                        <?php
                            if(isset($_GET['civilite']) && $_GET['civilite'] == "Madame"){
                                echo '<input type="radio" id="madame" name="civilite" value="Madame" checked>';
                            }
                            else{
                                echo '<input type="radio" id="madame" name="civilite" value="Madame">';
                            }
                        ?>
                        <label for="madame" class="civiliteLabel">Madame</label>
                    </div>
                    <?php
                        if(isset($_GET['erreur']) && $_GET['erreur'] == "civilite"){
                            echo '<i class="fa-solid fa-triangle-exclamation erreur"> '.$_GET['message'].'</i>';
                        }
                    ?>
                    <label for="lastname">Nom : </label>
                    <?php 
                        if(isset($_GET['nom'])){
                            echo '<input type="text" id="nom" name="nom" title="Entrez le nom de la personne en majuscules" placeholder="Dark" value="'.$_GET['nom'].'" pattern="[A-Za-z]{2,}" maxlength="20" required>';
                        }
                        else{
                            echo '<input type="text" id="nom" name="nom" title="Entrez le nom de la personne en majuscules" placeholder="Dark" pattern="[A-Za-z]{2,}" maxlength="20" required>';
                        }
                    ?>
                    <label for="name">Prénom : </label>
                    <?php 
                        if(isset($_GET['prenom'])){
                            echo '<input type="text" id="prenom" name="prenom" title="Entrez le prénom de la personne en commençant par une majuscule" placeholder="Vador" value="'.$_GET['prenom'].'" pattern="[A-Za-z]{2,}" maxlength="20" required>';
                        }
                        else{
                            echo '<input type="text" id="prenom" name="prenom" title="Entrez le prénom de la personne en commençant par une majuscule" placeholder="Vador" pattern="[A-Za-z]{2,}" maxlength="20" required>';
                        }
                    ?>
                    <label for="mobile">Téléphone portable : </label>
                    <?php 
                        if(isset($_GET['mobile'])){
                            echo '<input type="tel" id="mobile" name="mobile" title="Entrez le numéro de téléphone portable de la personne" pattern="[0-9]{10}" placeholder="0623456789" value="'.$_GET['mobile'].'" maxlength="10" required>';
                        }
                        else{
                            echo '<input type="tel" id="mobile" name="mobile" title="Entrez le numéro de téléphone portable de la personne" pattern="[0-9]{10}" placeholder="0623456789" maxlength="10" required>';
                        }
                    ?>
                    <label for="email">Adresse mail : </label>
                    <?php 
                        $texte = "Entrez l'adresse mail de la personne";
                        if(isset($_GET['email'])){
                            echo '<input type="email" id="email" name="email" title="'.$texte.'" placeholder="dark.vador@gmail.com" value="'.$_GET['email'].'" maxlength="40" required>';
                        }
                        else{
                            echo '<input type="email" id="email" name="email" title="'.$texte.'" placeholder="dark.vador@gmail.com" maxlength="40" required>';
                        }
                        if(isset($_GET['erreur']) && $_GET['erreur'] == "email"){
                            echo '<i class="fa-solid fa-triangle-exclamation erreur"> '.$_GET['message'].'</i>';
                        }
                    ?>
                    <label for="password">Mot de passe : </label>
                    <input type="password" id='mdp' name="mdp" title="Entrez le mot de passe" placeholder="Mot de Passe" pattern="[A-Za-z]{2,}" maxlength="20" required>
                    <label for="password">Confirmer mot de passe : </label>
                    <input type="password" id='cmdp' name="cmdp" title="Confirmer le mot de passe" placeholder="Mot de Passe" pattern="[A-Za-z]{2,}" maxlength="20" required>
                    <?php
                        if(isset($_GET['erreur']) && $_GET['erreur'] == "mdp"){
                            echo '<i class="fa-solid fa-triangle-exclamation erreur"> '.$_GET['message'].'</i>';
                        }
                    ?>
                    <a href="connexion.php" class="connectez-vous">Déjà un compte ? Connectez-vous !</a>
                    <input type="submit" id='sauvegarder' name="sauvegarder" title="Enregistrer la personne" value="S'inscrire" required>
                </div>
            </form>
        </div>
    </body>
</html>