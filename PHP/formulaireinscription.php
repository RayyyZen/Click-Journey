<?php
    session_start();

    $civilite = $_POST['civilite'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $cmdp = $_POST['cmdp'];

    $json = file_get_contents('../JSON/utilisateurs.json');
    $utilisateurs = json_decode($json, true);

    if(!is_array($utilisateurs)){
        $utilisateurs = [];
    }

    $verifmail = 1;
    $i=0;
    foreach($utilisateurs as $util){
        if($util['email'] == $email){
            $verifmail = 0;
        }
        $i++;
    }

    if($verifmail == 0){
        header("Location: ../Pages/inscription.php?message=Compte déjà existant&erreur=email&civilite=".$civilite."&nom=".$nom."&prenom=".$prenom."&mobile=".$mobile."&email=".$email);
        exit(0);
    }

    $_SESSION['dateinscription'] = date("Y-m-j H:i:s");
    $_SESSION['dateconnexion'] = date("Y-m-j H:i:s");

    $nouveau = [
        "numero" => "$i",
        "statut" => "Utilisateur",
        "civilite" => "$civilite",
        "nom" => "$nom",
        "prenom" => "$prenom",
        "mobile" => "$mobile",
        "email" => "$email",
        "mdp" => "$mdp",
        "inscription" => $_SESSION['dateinscription'],
        "connexion" => $_SESSION['dateconnexion'],
    ];

    $utilisateurs[] = $nouveau;
    $nouveaujson = json_encode($utilisateurs, JSON_PRETTY_PRINT);

    file_put_contents('../JSON/utilisateurs.json',$nouveaujson);

    $_SESSION['numero'] = $i;
    $_SESSION['statut'] = "Utilisateur";
    $_SESSION['civilite'] = $civilite;
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['email'] = $email;
    $_SESSION['mobile'] = $mobile;
    $_SESSION['mdp'] = $mdp;

    header("Location: ../Pages/index.php");
?>