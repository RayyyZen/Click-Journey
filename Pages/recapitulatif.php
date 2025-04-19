<?php
    require_once '../PHP/accespages.php';
    if(isset($_GET['transaction'])){
        accesPages("recapitulatif.php",$_GET['transaction'],"");
    }
    else{
        accesPages("recapitulatif.php","",$_GET['id']);
    }
?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Récapitulatif");
    ?>

    <body>
        <?php 
            afficheHorizontal(1,1);
            afficherPanier();
        ?>

        <div class="section pageetapes">Récapitulatif</div>

        <div class="paragraph pageetapes">
            <?php
                if(isset($_GET['transaction'])){
                    afficheRecap($_GET['transaction'],"",$_GET['num']);
                }
                else{
                    afficheRecap("",$_GET['id'],"");
                }
            ?>
        </div>
    </body>
</html>