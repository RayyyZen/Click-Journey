<?php
    require_once '../PHP/accespages.php';
    accesPages("connexion.php","");
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
            <form action="../PHP/formulaireconnexion.php" method="POST" onsubmit="return formulaireConnexion();">
                <div class="formulaire">
                    <label for="idPersonne">Adresse mail :</label>
                    <div class="group5">
                        <?php
                            $texte = "Entrez l'identifiant de la personne";
                            if(isset($_GET['erreur']) && $_GET['erreur'] == "mdp"){
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

                    <label for="password">Mot de passe :</label>
                    <div class="group5">
                        <input type="password" id='mdp' name="mdp" title="Entrez le mot de passe" placeholder="Mot de Passe" maxlength="20"> 
                        <p class="pclass">0/20</p>
                        <button type="button" name="montrer" id="montrer" onclick="montrerMdp('mdp','montrer','cacher')"><i class="fa-solid fa-eye-slash annuler"></i></button>
                        <button hidden type="button" name="cacher" id="cacher" onclick="cacherMdp('mdp','montrer','cacher')"><i class="fa-solid fa-eye annuler"></i></button>
                    </div>
                    <?php
                        if(isset($_GET['erreur']) && $_GET['erreur'] == "mdp"){
                            echo '<i class="fa-solid fa-triangle-exclamation erreur"> '.$_GET['message'].'</i>';
                        }
                    ?>
                    <a href="inscription.php" class="inscrivez-vous">Pas de compte ? Inscrivez-vous !</a>
                    <input type="submit" id='save' name="save" title="Engistrer la personne" value="Se connecter">
                </div>
            </form>
        </div>

        <script type="text/javascript">
            var elements = document.querySelectorAll("input");
            var i;
            function nbrCaracteres(){
                var chaine;
                for(i=0;i<elements.length;i++){
                    chaine = elements[i].nextElementSibling.textContent.split('/');
                    elements[i].nextElementSibling.textContent = elements[i].value.length + "/" + chaine[1];
                }
            }
            for(i=0;i<elements.length;i++){
                elements[i].addEventListener("input",nbrCaracteres);
            }
            window.addEventListener("load",nbrCaracteres);
        </script>

        <script type="text/javascript">
            function montrerMdp(id,idmontrer,idcacher){
                var mdp = document.getElementById(id);
                var montrer = document.getElementById(idmontrer);
                var cacher = document.getElementById(idcacher);

                mdp.type = "text";
                montrer.hidden = true;
                cacher.hidden = false;
            }
            function cacherMdp(id,idmontrer,idcacher){
                var mdp = document.getElementById(id);
                var montrer = document.getElementById(idmontrer);
                var cacher = document.getElementById(idcacher);

                mdp.type = "password";
                montrer.hidden = false;
                cacher.hidden = true;
            }
        </script>
    </body>
</html>