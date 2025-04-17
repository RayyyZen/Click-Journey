<?php
    session_start();

    if(isset($_GET['id']) && isset($_SESSION['panier'.$_GET['id']])){
        $_SESSION['panier'.$_GET['id']] = 0;
    }

    header("Location: ../Pages/panier.php");
?>