<?php
    $rech = $_POST['recherche'];
    if(!isset($_POST['recherche']) || $_POST['recherche'] == " "){
        header("Location: ../HTML/destinations.php");
    }
    else{
        header("Location: ../HTML/destinations.php?recherche=".$_POST['recherche']);
    }
?>