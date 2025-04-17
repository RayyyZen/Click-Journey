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
            <form action="../PHP/formulaireinscription.php" method="POST" onsubmit="return formulaireInscription();">
                <div class="formulaire" id="forminscription">
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

                    <label for="nom">Nom : </label>
                    <div class="group5">
                        <?php 
                            if(isset($_GET['nom'])){
                                echo '<input type="text" id="nom" name="nom" title="Entrez le nom de la personne en majuscules" placeholder="Dark" value="'.$_GET['nom'].'" maxlength="20">';
                            }
                            else{
                                echo '<input type="text" id="nom" name="nom" title="Entrez le nom de la personne en majuscules" placeholder="Dark" maxlength="20">';
                            }
                        ?>
                        <p class="pclass">0/20</p>
                    </div>
                    
                    <label for="prenom">Prénom : </label>
                    <div class="group5">
                        <?php 
                            if(isset($_GET['prenom'])){
                                echo '<input type="text" id="prenom" name="prenom" title="Entrez le prénom de la personne en commençant par une majuscule" placeholder="Vador" value="'.$_GET['prenom'].'" maxlength="20">';
                            }
                            else{
                                echo '<input type="text" id="prenom" name="prenom" title="Entrez le prénom de la personne en commençant par une majuscule" placeholder="Vador" maxlength="20">';
                            }
                        ?>
                        <p class="pclass">0/20</p>
                    </div>
                    
                    <label for="mobile">Téléphone portable : </label>
                    <div class="group5">
                        <?php 
                            if(isset($_GET['mobile'])){
                                echo '<input type="tel" id="mobile" name="mobile" title="Entrez le numéro de téléphone portable de la personne" placeholder="0623456789" value="'.$_GET['mobile'].'" maxlength="10">';
                            }
                            else{
                                echo '<input type="tel" id="mobile" name="mobile" title="Entrez le numéro de téléphone portable de la personne" placeholder="0623456789" maxlength="10">';
                            }
                        ?>
                        <p class="pclass">0/10</p>
                    </div>

                    <label for="email">Adresse mail : </label>
                    <div class="group5">
                        <?php 
                            $texte = "Entrez l'adresse mail de la personne";
                            if(isset($_GET['email'])){
                                echo '<input type="email" id="email" name="email" title="'.$texte.'" placeholder="dark.vador@gmail.com" value="'.$_GET['email'].'" maxlength="40">';
                            }
                            else{
                                echo '<input type="email" id="email" name="email" title="'.$texte.'" placeholder="dark.vador@gmail.com" maxlength="40">';
                            }
                        ?>
                        <p class="pclass">0/40</p>
                    </div>
                    <?php
                        if(isset($_GET['erreur']) && $_GET['erreur'] == "email"){
                            echo '<i class="fa-solid fa-triangle-exclamation erreur"> '.$_GET['message'].'</i>';
                        }
                    ?>

                    <label for="mdp">Mot de passe : </label>
                    <div class="group5">
                        <input type="password" id="mdp" name="mdp" title="Entrez le mot de passe" placeholder="Mot de Passe" maxlength="20">
                        <p class="pclass">0/20</p>
                        <button type="button" name="montrer" id="montrer" onclick="montrerMdp('mdp','montrer','cacher')"><i class="fa-solid fa-eye-slash annuler"></i></button>
                        <button hidden type="button" name="cacher" id="cacher" onclick="cacherMdp('mdp','montrer','cacher')"><i class="fa-solid fa-eye annuler"></i></button>
                    </div>

                    <label for="cmdp">Confirmer mot de passe : </label>
                    <div class="group5">
                        <input type="password" id='cmdp' name="cmdp" title="Confirmer le mot de passe" placeholder="Mot de Passe" maxlength="20">
                        <p class="pclass">0/20</p>
                        <button type="button" name="cmontrer" id="cmontrer" onclick="montrerMdp('cmdp','cmontrer','ccacher')"><i class="fa-solid fa-eye-slash annuler"></i></button>
                        <button hidden type="button" name="ccacher" id="ccacher" onclick="cacherMdp('cmdp','cmontrer','ccacher')"><i class="fa-solid fa-eye annuler"></i></button>
                    </div>
                    <?php
                        if(isset($_GET['erreur']) && $_GET['erreur'] == "mdp"){
                            echo '<i class="fa-solid fa-triangle-exclamation erreur"> '.$_GET['message'].'</i>';
                        }
                    ?>
                    <a href="connexion.php" class="connectez-vous">Déjà un compte ? Connectez-vous !</a>
                    <input type="submit" id='sauvegarder' name="sauvegarder" title="Enregistrer la personne" value="S'inscrire">
                </div>
            </form>
        </div>

        <script type="text/javascript">
            var elements = document.querySelectorAll("input");
            var i;
            for(i=0;i<elements.length;i++){
                var p = elements[i].nextElementSibling;
                if(p != null && (p.className == "pclass" || p.className == "pclass1")){
                    elements[i].addEventListener("input",nbrCaracteres);
                }
            }
            window.addEventListener("load",nbrCaracteres);
        </script>

    </body>
</html>