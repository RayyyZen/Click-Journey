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

            <form action="../PHP/formulaireadmin.php" method="POST" class="formulaireadmin" onsubmit="return formulaireAdmin();">

                <h3 class="titreadmins">Voici la liste des Administrateurs</h3>

                <div class="tablediv">
                    <table class="tableau" id="vip">
                        <?php statutUtilisateurs("Admin"); ?>
                    </table>
                </div>

                <h3 class="titreutilisateurs">Voici la liste des Utilisateurs</h3>

                <div class="tablediv">
                    <table class="tableau" id="utilisateur">
                        <?php statutUtilisateurs("Utilisateur"); ?>
                    </table>
                </div>

                <h3 class="titrebannis">Voici la liste des Bannis</h3>

                <div class="tablediv">
                    <table class="tableau" id="bannis">
                        <?php statutUtilisateurs("Banni"); ?>
                    </table>
                </div>

            </form>

        </div>

        <script type="text/javascript">
            function f(){
                var civilite = document.getElementsByName("civilite");
                var i;
                for(i=0;i<civilite.length;i++){
                    civilite[i].value = civilite[i].dataset.extra;
                }
            }
            window.addEventListener("load",f);
        </script>
    </body>
</html>