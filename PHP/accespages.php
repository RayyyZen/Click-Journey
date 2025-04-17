<?php
    function accesPages($page,$transaction,$id){
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
            if($transaction == "" && (!isset($_SESSION['id'.$id]) || $_SESSION['id'.$id] == "")){
                header("location: connexion.php");
            }
            else if($transaction != "" && !isset($_SESSION['email'])){
                header("location: connexion.php");
            }
        }
        else if($page == "panier.php"){
            $i = 0;
            $panier = 0;
            while(isset($_SESSION['panier'.$i])){
                if($_SESSION['panier'.$i] == 1){
                    $panier = 1;
                }
                $i++;
            }
            if($panier == 0){
                header("location: index.php");
            }
        }
        else{
            if(isset($_SESSION['email'])){
                header("location: index.php");
            }
        }
    }
?>