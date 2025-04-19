<?php
    require_once '../PHP/accespages.php';
    accesPages("voyage.php","","");
?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Voyage");
    ?>

    <body>
        <?php 
            afficheHorizontal(1,1);
            afficherPanier();
            afficheInfosVoyage($_GET['nom']);
        ?>
    </body>
</html>