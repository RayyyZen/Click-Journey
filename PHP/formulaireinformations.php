<?php
    session_start();

    $civilite = $_POST['civilite'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    $json = file_get_contents('../JSON/utilisateurs.json');
    $utilisateurs = json_decode($json, true);

    if(!is_array($utilisateurs)){
        $utilisateurs = [];
    }

    foreach($utilisateurs as &$util){
        if($util['email'] == $email){
            $util['civilite'] = $civilite;
            $util['nom'] = $nom;
            $util['prenom'] = $prenom;
            $util['mobile'] = $mobile;
        }
    }

    $nouveaujson = json_encode($utilisateurs, JSON_PRETTY_PRINT);

    file_put_contents('../JSON/utilisateurs.json',$nouveaujson);

    $_SESSION['civilite'] = $civilite;
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['mobile'] = $mobile;

    header("Location: ../Pages/informations.php");
?>