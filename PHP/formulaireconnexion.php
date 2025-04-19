<?php
    session_start();

    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    if($email === "" || $mdp === ""){
        header("Location: ../Pages/connexion.php");
        exit(1);
    }

    $json = file_get_contents('../JSON/utilisateurs.json');
    $utilisateurs = json_decode($json, true);

    if(!is_array($utilisateurs)){
        $utilisateurs = [];
    }

    $compteExistant = 0;
    foreach($utilisateurs as &$util){
        if($util['email'] == $email && $util['mdp'] == $mdp){
            $compteExistant = 1;
            $util['connexion'] = date("Y-m-j H:i:s");
            break;
        }
        else if($util['email'] == $email && $util['mdp'] != $mdp){
            $compteExistant = -1;
            break;
        }
    }

    if($compteExistant == -1){
        header("Location: ../Pages/connexion.php?message=Mot de passe incorrect&erreur=mdp&email=".$email);
    }
    else if($compteExistant == 0){
        header("Location: ../Pages/connexion.php?message=Compte inexistant&erreur=email&email=".$email);
    }
    else if($util['statut'] == "Banni"){
        header("Location: ../Pages/connexion.php?message=Ce compte est banni&erreur=mdp&email=".$email);
    }
    else{
        $_SESSION['numero'] = $util['numero'];
        $_SESSION['statut'] = $util['statut'];
        $_SESSION['civilite'] = $util['civilite'];
        $_SESSION['nom'] = $util['nom'];
        $_SESSION['prenom'] = $util['prenom'];
        $_SESSION['email'] = $util['email'];
        $_SESSION['mobile'] = $util['mobile'];
        $_SESSION['mdp'] = $util['mdp'];
        $_SESSION['dateinscription'] = $util['inscription'];
        $_SESSION['dateconnexion'] = $util['connexion'];

        $nouveaujson = json_encode($utilisateurs, JSON_PRETTY_PRINT);
        file_put_contents('../JSON/utilisateurs.json',$nouveaujson);

        header("Location: ../Pages/index.php");
    }
?>