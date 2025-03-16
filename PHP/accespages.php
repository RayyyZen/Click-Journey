<?php
    function accesPages($page){
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
        else{
            if(isset($_SESSION['email'])){
                header("location: index.php");
            }
        }
    }
?>