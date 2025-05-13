<?php
    require_once '../PHP/accespages.php';
    accesPages("admin.php","","");
?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Admin");
    ?>

    <body>
        
        <?php 
            afficheHorizontal(1,1);
            afficherPanier();
        ?>

        <div class="section pageadmin">Page Administrateur</div>

        <div class ="paragraph pageadmin">

            <form action="../PHP/formulaireadmin.php" method="POST" class="formulaireadmin" id="formulaireadmin">

                <h3 class="titreadmins">Liste des Administrateurs</h3>

                <div class="tablediv">
                    <table class="tableau" id="vip">
                        <?php statutUtilisateurs("Admin"); ?>
                    </table>
                </div>

                <div hidden id="erreurmailexistantAdmin"> <p class="fa-solid fa-triangle-exclamation erreurmail"> Mail déjà existant</p> </div>

                <h3 class="titreutilisateurs">Liste des Utilisateurs</h3>

                <div class="tablediv">
                    <table class="tableau" id="utilisateur">
                        <?php statutUtilisateurs("Utilisateur"); ?>
                    </table>
                </div>

                <div hidden id="erreurmailexistantUtilisateur"> <p class="fa-solid fa-triangle-exclamation erreurmail"> Mail déjà existant</p> </div>

                <h3 class="titrebannis">Liste des Bannis</h3>

                <div class="tablediv">
                    <table class="tableau" id="bannis">
                        <?php statutUtilisateurs("Banni"); ?>
                    </table>
                </div>

                <div hidden id="erreurmailexistantBanni"> <p class="fa-solid fa-triangle-exclamation erreurmail"> Mail déjà existant</p> </div>

            </form>

        </div>

        <script type="text/javascript">
            function civilite(){
                var civilite = document.getElementsByName("civilite");
                var i;
                for(i=0;i<civilite.length;i++){
                    civilite[i].value = civilite[i].dataset.extra;
                }
            }
            window.addEventListener("load",civilite);
            //On fait ca pour civilité parce que civilite est un select pas un input
        </script>

        <script type="text/javascript">
            document.getElementById("formulaireadmin").addEventListener("submit", function(e) {
                e.preventDefault(); //Pour éviter que la page se recharge à l'appui de la touche "ENTREE"
            });
        </script>
        
    </body>
</html>