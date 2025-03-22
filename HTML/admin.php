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
            <h3>Voici la liste des utilisateurs VIP</h3>

            <div class="tablediv">
                <table class="tableau" id="vip">
                    <?php statutUtilisateurs("Admin"); ?>
                </table>
            </div>
            <div class="options">
                <div class="modifier">Modifier</div>
                <div class="bannir">Bannir</div>
            </div>

            <h3>Voici la liste des utilisateurs</h3>

            <div class="tablediv">
                <table class="tableau" id="utilisateur">
                    <?php statutUtilisateurs("Utilisateur"); ?>
                </table>
            </div>
            <div class="options">
                <div class="modifier">Modifier</div>
                <div class="bannir">Bannir</div>
            </div>
            <div class="promouvoir">Promouvoir</div>

            <h3>Voici la liste des utilisateurs BANNIS</h3>

            <div class="tablediv">
                <table class="tableau" id="bannis">
                    <?php statutUtilisateurs("Banni"); ?>
                </table>
            </div>
            <div class="options">
                <div class="modifier">Modifier</div>
                <div class="bannir">Débannir</div>
            </div>

        </div>
    </body>
</html>