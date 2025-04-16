<?php
    require_once '../PHP/accespages.php';
    accesPages("informations.php","");
?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Informations");
    ?>

    <body>
        <?php afficheHorizontal(1,1); ?>

        <div class="section pageinformations">Informations</div>

        <div class="paragraph paragraphinformations">
            <form action="../PHP/formulaireinformations.php" method="POST" onsubmit="return formulaireInformations();">
                <div class="formulaire" id="forminformations">
            
                    <?php afficheCivilite(); ?>
                    
                    <label>Nom :</label>
                    <div class="group">
                        <?php echo '<input type="text" id="nom" name="nom" data-extra="'.$_SESSION['nom'].'" value="'.$_SESSION['nom'].'" maxlength="20" disabled>'; ?>
                        <p hidden id="pnom" class="pclass1">0/20</p>
                        <button type="button" id="buttonnom" onclick="changement('nom','sauvegardernom','restaurernom','buttonnom','pnom')"><i class="fa-solid fa-pen-nib"></i></button>
                        <button hidden type="submit" id="sauvegardernom"><i class="fa-solid fa-check"></i></button>
                        <button hidden type="button" id="restaurernom" onclick="restaurer('nom','sauvegardernom','restaurernom','buttonnom','pnom')"><i class="fa-solid fa-xmark"></i></button>
                    </div>

                    <label>Prénom :</label>
                    <div class="group">
                        <?php echo '<input type="text" id="prenom" name="prenom" data-extra="'.$_SESSION['prenom'].'" value="'.$_SESSION['prenom'].'" maxlength="20" disabled>'; ?>
                        <p hidden id="pprenom" class="pclass1">0/20</p>
                        <button type="button" id="buttonprenom" onclick="changement('prenom','sauvegarderprenom','restaurerprenom','buttonprenom','pprenom')"><i class="fa-solid fa-pen-nib"></i></button>
                        <button hidden type="submit" id="sauvegarderprenom"><i class="fa-solid fa-check"></i></button>
                        <button hidden type="button" id="restaurerprenom" onclick="restaurer('prenom','sauvegarderprenom','restaurerprenom','buttonprenom','pprenom')"><i class="fa-solid fa-xmark"></i></button>
                    </div>

                    <label>Téléphone :</label>
                    <div class="group">
                        <?php echo '<input type="text" id="mobile" name="mobile" data-extra="'.$_SESSION['mobile'].'" value="'.$_SESSION['mobile'].'" maxlength="10" disabled>'; ?>
                        <p hidden id="pmobile" class="pclass1">0/10</p>
                        <button type="button" id="buttonmobile" onclick="changement('mobile','sauvegardermobile','restaurermobile','buttonmobile','pmobile')"><i class="fa-solid fa-pen-nib"></i></button>
                        <button hidden type="submit" id="sauvegardermobile"><i class="fa-solid fa-check"></i></button>
                        <button hidden type="button" id="restaurermobile" onclick="restaurer('mobile','sauvegardermobile','restaurermobile','buttonmobile','pmobile')"><i class="fa-solid fa-xmark"></i></button>
                    </div>

                    <label>Adresse mail :</label>
                    <div class="group">
                        <?php echo '<input type="text" id="email" name="email" value='.$_SESSION['email'].' disabled>'; ?>
                    </div>

                    <label>Date d'inscription :</label>
                    <div class="group">
                        <?php echo '<div class="champdate">'.$_SESSION['dateinscription'].'</div>'; ?>
                    </div>

                    <label>Dernière connexion :</label>
                    <div class="group">
                        <?php echo '<div class="champdate">'.$_SESSION['dateconnexion'].'</div>'; ?>
                    </div>

                    <label>Réservations :</label>
                    <?php afficheReservations() ?>

                    <a href="../PHP/suppression.php">Supprimer mon compte</a>
                </div>
            </form>
        </div>

        <script type="text/javascript">
            function changement(id,idsauvegarder,idrestaurer,idbutton,idp){
                if(document.getElementById("buttoncivilite").hidden || document.getElementById("buttonnom").hidden || document.getElementById("buttonprenom").hidden || document.getElementById("buttonmobile").hidden){
                    return ;
                }
                
                var input = document.getElementById(id);
                var sauvegarder = document.getElementById(idsauvegarder);
                var restaurer = document.getElementById(idrestaurer);
                var button = document.getElementById(idbutton);
                var p = document.getElementById(idp);

                input.disabled = false;
                sauvegarder.hidden = false;
                restaurer.hidden = false;
                button.hidden = true;
                p.hidden = false;
            }

            function restaurer(id,idsauvegarder,idrestaurer,idbutton,idp){
                var input = document.getElementById(id);
                var sauvegarder = document.getElementById(idsauvegarder);
                var restaurer = document.getElementById(idrestaurer);
                var button = document.getElementById(idbutton);
                var p = document.getElementById(idp);

                input.value = input.dataset.extra;
                input.disabled = true;
                sauvegarder.hidden = true;
                restaurer.hidden = true;
                button.hidden = false;
                p.hidden = true;
            }
        </script>

    <script type="text/javascript">
        function changementCivilite(){
            if(document.getElementById("buttoncivilite").hidden || document.getElementById("buttonnom").hidden || document.getElementById("buttonprenom").hidden || document.getElementById("buttonmobile").hidden){
                return ;
            }
            
            var inputMonsieur = document.getElementById("monsieur");
            var inputMadame = document.getElementById("madame");
            var sauvegarder = document.getElementById("sauvegardercivilite");
            var restaurer = document.getElementById("restaurercivilite");
            var button = document.getElementById("buttoncivilite");

            inputMonsieur.disabled = false;
            inputMadame.disabled = false;
            sauvegarder.hidden = false;
            restaurer.hidden = false;
            button.hidden = true;
        }

        function restaurerCivilite(){
            var inputMonsieur = document.getElementById("monsieur");
            var inputMadame = document.getElementById("madame");
            var sauvegarder = document.getElementById("sauvegardercivilite");
            var restaurer = document.getElementById("restaurercivilite");
            var button = document.getElementById("buttoncivilite");

            if(inputMonsieur.dataset.extra == "Monsieur"){
                inputMonsieur.checked = true;
                inputMadame.checked = false;
            }
            else{
                inputMonsieur.checked = false;
                inputMadame.checked = true;
            }

            inputMonsieur.disabled = true;
            inputMadame.disabled = true;
            sauvegarder.hidden = true;
            restaurer.hidden = true;
            button.hidden = false;
        }
    </script>

    <script type="text/javascript">
        var elements = document.querySelectorAll("input");
        var i;
        function nbrCaracteres(){
            var chaine;
            for(i=3;i<elements.length;i++){
                chaine = elements[i].nextElementSibling.textContent.split('/');
                elements[i].nextElementSibling.textContent = elements[i].value.length + "/" + chaine[1];
            }
        }
        for(i=3;i<elements.length;i++){
            elements[i].addEventListener("input",nbrCaracteres);
        }
        window.addEventListener("load",nbrCaracteres);
    </script>
    </body>
</html>