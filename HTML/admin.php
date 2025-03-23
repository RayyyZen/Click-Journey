<?php
    require_once '../PHP/accespages.php';
    accesPages("admin.php");
?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Admin");
    ?>

    <body>
        
        <?php afficheHorizontal(1,1); ?>

        <div class="section pageadmin">Page Administrateur</div>

        <div class ="paragraph pageadmin">
            <h3>Voici la liste des ADMINISTRATEURS</h3>

            <div class="tablediv">
                <table class="tableau" id="vip">
                    <?php statutUtilisateurs("Admin"); ?>
                </table>
            </div>

            <h3>Voici la liste des UTILISATEURS</h3>

            <div class="tablediv">
                <table class="tableau" id="utilisateur">
                    <?php statutUtilisateurs("Utilisateur"); ?>
                </table>
            </div>

            <h3>Voici la liste des BANNIS</h3>

            <div class="tablediv">
                <table class="tableau" id="bannis">
                    <?php statutUtilisateurs("Banni"); ?>
                </table>
            </div>

        </div>
    </body>
</html>