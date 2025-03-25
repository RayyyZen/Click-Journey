<?php
    function accesPages($page,$transaction){
        session_start();
        if($page == "admin.php"){
            if(!isset($_SESSION['statut']) || $_SESSION['statut'] != "Admin"){
                header("location: index.php");
            }
        }
        else if($page == "informations.php"){
            if(!isset($_SESSION['email'])){
                header("location: index.php");
            }
        }
        else if($page == "etapes.php"){
            if(!isset($_SESSION['email'])){
                header("location: connexion.php");
            }
        }
        else if($page == "recapitulatif.php"){
            if($transaction == "" && (!isset($_SESSION['personnes']) || $_SESSION['personnes'] == "")){
                header("location: connexion.php");
            }
            else if($transaction != "" && !isset($_SESSION['email'])){
                header("location: connexion.php");
            }
        }
        else{
            if(isset($_SESSION['email'])){
                header("location: index.php");
            }
        }
    }
?>