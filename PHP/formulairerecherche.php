<?php
    $rech = $_POST['recherche'];
    if(!isset($_POST['recherche']) || $_POST['recherche'] == " "){
        header("Location: ../Pages/destinations.php");
    }
    else{
        $recherche = $_POST['recherche'];
        $duree = "duree";
        $prix = "prix";
        $continent = "continent";
        if(isset($_POST['duree'])){
            $duree = $_POST['duree'];
        }
        if(isset($_POST['prix'])){
            $prix = $_POST['prix'];
        }
        if(isset($_POST['continent'])){
            $continent = $_POST['continent'];
        }
        header("Location: ../Pages/destinations.php?recherche=".$recherche."&duree=".$duree."&prix=".$prix."&continent=".$continent);
    }
?>