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
                    
                    <label for="nom">Nom :</label>
                    <div class="group">
                        <?php echo '<input type="text" id="nom" name="nom" data-extra="'.$_SESSION['nom'].'" value="'.$_SESSION['nom'].'" maxlength="20" disabled>'; ?>
                        <p hidden id="pnom" class="pclass1">0/20</p>
                        <button type="button" id="buttonnom" onclick="changement('nom','sauvegardernom','restaurernom','buttonnom','pnom')"><i class="fa-solid fa-pen-nib"></i></button>
                        <button hidden type="submit" id="sauvegardernom"><i class="fa-solid fa-check"></i></button>
                        <button hidden type="button" id="restaurernom" onclick="restaurer('nom','sauvegardernom','restaurernom','buttonnom','pnom')"><i class="fa-solid fa-xmark"></i></button>
                    </div>

                    <label for="prenom">Prénom :</label>
                    <div class="group">
                        <?php echo '<input type="text" id="prenom" name="prenom" data-extra="'.$_SESSION['prenom'].'" value="'.$_SESSION['prenom'].'" maxlength="20" disabled>'; ?>
                        <p hidden id="pprenom" class="pclass1">0/20</p>
                        <button type="button" id="buttonprenom" onclick="changement('prenom','sauvegarderprenom','restaurerprenom','buttonprenom','pprenom')"><i class="fa-solid fa-pen-nib"></i></button>
                        <button hidden type="submit" id="sauvegarderprenom"><i class="fa-solid fa-check"></i></button>
                        <button hidden type="button" id="restaurerprenom" onclick="restaurer('prenom','sauvegarderprenom','restaurerprenom','buttonprenom','pprenom')"><i class="fa-solid fa-xmark"></i></button>
                    </div>

                    <label for="mobile">Téléphone :</label>
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
            var elements = document.querySelectorAll("input");
            var i;
            for(i=0;i<elements.length;i++){
                if(elements[i].nextElementSibling != null && (elements[i].nextElementSibling.className == "pclass" || elements[i].nextElementSibling.className == "pclass1")){
                    elements[i].addEventListener("input",nbrCaracteres);
                }
            }
            window.addEventListener("load",nbrCaracteres);
        </script>

    </body>
</html>