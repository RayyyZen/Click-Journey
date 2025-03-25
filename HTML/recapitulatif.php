<?php
    require_once '../PHP/accespages.php';
    if(isset($_GET['transaction'])){
        accesPages("recapitulatif.php",$_GET['transaction']);
    }
    else{
        accesPages("recapitulatif.php","");
    }
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
            <?php
                if(isset($_GET['transaction'])){
                    afficheRecap($_GET['transaction']);
                }
                else{
                    afficheRecap("");
                }
            ?>
        </div>
    </body>
</html>