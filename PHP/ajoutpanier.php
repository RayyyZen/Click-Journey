<?php
    session_start();
    $id = $_GET['id'];
    if(isset($_SESSION["panier".$id])){
        $_SESSION["panier".$id] = 1;
    }
    header("Location: ../Pages/index.php");
?>