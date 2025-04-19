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
        else if($page == "voyage.php"){
            if(!isset($_GET['nom'])){
                header("location: index.php");
            }
            else{//On checke si le nom du voyage existe
                $json = file_get_contents('../JSON/voyages.json');
                $tabvoyages = json_decode($json, true);

                if(!is_array($tabvoyages)){
                    $tabvoyages = [];
                }
                $veriftitre = 0;
                foreach($tabvoyages as $voyage){
                    if($voyage['titre'] == $_GET['nom']){
                        $veriftitre = 1;
                        break;
                    }
                }
                if($veriftitre == 0){
                    header("location: index.php");
                }
            }
        }
        else if($page == "etapes.php"){
            if(!isset($_SESSION['email'])){
                header("location: connexion.php");
            }
            else if(!isset($_GET['nom'])){
                header("location: index.php");
            }
            else{ //On checke si le nom du voyage existe
                $json = file_get_contents('../JSON/voyages.json');
                $tabvoyages = json_decode($json, true);

                if(!is_array($tabvoyages)){
                    $tabvoyages = [];
                }
                $veriftitre = 0;
                foreach($tabvoyages as $voyage){
                    if($voyage['titre'] == $_GET['nom']){
                        $veriftitre = 1;
                        break;
                    }
                }
                if($veriftitre == 0){
                    header("location: index.php");
                }
            }
        }
        else if($page == "recapitulatif.php"){
            if((isset($_GET['transaction']) && !isset($_GET['num'])) || (!isset($_GET['transaction']) && isset($_GET['num']))){
                header("location: index.php");
            }
            else if($transaction == "" && (!isset($_SESSION['id'.$id]) || $_SESSION['id'.$id] == "")){
                header("location: connexion.php");
            }
            else if($transaction != ""){
                if(!isset($_SESSION['email'])){
                    header("location: connexion.php");
                }
                else { //On checke si le numéro de transaction existe
                    $json = file_get_contents('../JSON/transactions.json');
                    $transactions = json_decode($json, true);

                    if(!is_array($transactions)){
                        $transactions = [];
                    }
                    $veriftransaction = 0;
                    foreach($transactions as $tr){
                        if($tr['transaction'] == $transaction){
                            $veriftransaction = 1;
                            break;
                        }
                    }
                    if($veriftransaction == 0){
                        header("location: index.php");
                    }
                }
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
        else{ //Dans ce else il y a la page connexion et inscription
            if(isset($_SESSION['email'])){
                header("location: index.php");
            }
        }
    }
?>