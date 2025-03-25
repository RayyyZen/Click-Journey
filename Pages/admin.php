<?php
    require_once '../PHP/accespages.php';
    accesPages("admin.php","");
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

        </div>
    </body>
</html>