<?php
    session_start();
    
    sleep(2);
    
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
        if(($util['numero'] != $_SESSION['numero']) && ($util['email'] == $email)){
            echo "0";
            //J'affiche 0 pour avoir cette valeur dans le xhr.textContent afin de savoir que le mail changé existe déjà pour un autre compte
            exit(0);
        }
    }

    foreach($utilisateurs as &$util){
        if($util['numero'] == $_SESSION['numero']){
            $util['civilite'] = $civilite;
            $util['nom'] = $nom;
            $util['prenom'] = $prenom;
            $util['email'] = $email;
            $util['mobile'] = $mobile;
        }
    }

    $nouveaujson = json_encode($utilisateurs, JSON_PRETTY_PRINT);

    file_put_contents('../JSON/utilisateurs.json',$nouveaujson);

    $_SESSION['civilite'] = $civilite;
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['email'] = $email;
    $_SESSION['mobile'] = $mobile;

    echo "1";
?>