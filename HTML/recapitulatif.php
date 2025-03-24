<?php
    require_once '../PHP/accespages.php';
    accesPages("recapitulatif.php");
    session_start();
?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Acceuil");
    ?>

    <body>
        <?php afficheHorizontal(1,1); ?>

        <div class="section pageetapes">Récapitulatif</div>

        <div class="paragraph pageetapes">
            <?php afficheRecap() ?>
        </div>
    </body>
</html>