<?php
    $recherche = $_POST['recherche'];
    $duree = "duree";
    $prix = "prix";
    $continent = "continent";
    //La fonction trim() enleve les espaces
    if(trim($_POST['recherche']) == ""){
        $recherche = "";
    }
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
?>