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

                <h3 class="titreadmins">Liste des Administrateurs</h3>

                <div class="tablediv">
                    <table class="tableau" id="vip">
                        <?php statutUtilisateurs("Admin"); ?>
                    </table>
                </div>

                <?php
                    if(isset($_GET['statut']) && $_GET['statut'] == "Admin"){
                        echo '<p class="fa-solid fa-triangle-exclamation erreur1"> '.$_GET['message'].'</p>';
                    }
                ?>

                <h3 class="titreutilisateurs">Liste des Utilisateurs</h3>

                <div class="tablediv">
                    <table class="tableau" id="utilisateur">
                        <?php statutUtilisateurs("Utilisateur"); ?>
                    </table>
                </div>

                <?php
                    if(isset($_GET['statut']) && $_GET['statut'] == "Utilisateur"){
                        echo '<p class="fa-solid fa-triangle-exclamation erreur1"> '.$_GET['message'].'</p>';
                    }
                ?>

                <h3 class="titrebannis">Liste des Bannis</h3>

                <div class="tablediv">
                    <table class="tableau" id="bannis">
                        <?php statutUtilisateurs("Banni"); ?>
                    </table>
                </div>

                <?php
                    if(isset($_GET['statut']) && $_GET['statut'] == "Banni"){
                        echo '<p class="fa-solid fa-triangle-exclamation erreur1"> '.$_GET['message'].'</p>';
                    }
                ?>

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