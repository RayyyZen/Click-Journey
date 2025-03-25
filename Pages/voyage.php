<?php session_start(); ?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Voyage");
    ?>

    <body>
        <?php 
            afficheHorizontal(1,1);
            afficheInfosVoyage($_GET['nom']);
        ?>
    </body>
</html>