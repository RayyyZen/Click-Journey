<?php
    $rech = $_POST['recherche'];
    if(!isset($_POST['recherche']) || $_POST['recherche'] == " "){
        header("Location: ../Pages/destinations.php");
    }
    else{
        header("Location: ../Pages/destinations.php?recherche=".$_POST['recherche']);
    }
?>