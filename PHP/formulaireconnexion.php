<?php
    session_start();

    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    if($email === "" || $mdp === ""){
        header("Location: ../HTML/connexion.php");
        exit(1);
    }

    $json = file_get_contents('../JSON/utilisateurs.json');
    $utilisateurs = json_decode($json, true);

    if(!is_array($utilisateurs)){
        $utilisateurs = [];
    }

    $compteExistant = 0;
    foreach($utilisateurs as $util){
        foreach($util as $key => $elm){
            switch($key){
                case "email" :
                    $emailUtilisateur = $elm;
                    break;
                case "mdp" :
                    $mdpUtilisateur = $elm;
                    break;
                case "statut" :
                    $statut = $elm;
                    break;
                case "civilite" :
                    $civilite = $elm;
                    break;
                case "nom" :
                    $nom = $elm;
                    break;
                case "prenom" :
                    $prenom = $elm;
                    break;
                case "mobile" :
                    $mobile = $elm;
                    break;
            }
        }
        if($email == $emailUtilisateur && $mdp == $mdpUtilisateur){
            $compteExistant = 1;
            break;
        }
    }

    if($compteExistant == 0 || $statut == "Banni"){
        header("Location: ../HTML/connexion.php");
        exit(1);
    }

    $_SESSION['statut'] = $statut;
    $_SESSION['civilite'] = $civilite;
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['email'] = $email;
    $_SESSION['mobile'] = $mobile;
    $_SESSION['mdp'] = $mdp;

    header("Location: ../HTML/index.php");
?>