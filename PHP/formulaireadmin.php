<?php
    session_start();

    sleep(2);

    $numero = $_POST['numero'];
    $civilite = $_POST['civilite'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $json = file_get_contents('../JSON/utilisateurs.json');
    $utilisateurs = json_decode($json, true);

    if(!is_array($utilisateurs)){
        $utilisateurs = [];
    }

    $verifmail = 1;

    foreach($utilisateurs as $util){
        if($util['email'] == $email && $util['numero'] != $numero){
            $verifmail = 0;
        }
        if($util['numero'] == $numero){
            $statut = $util['statut'];
        }
    }

    if($verifmail == 0){
        echo ($statut);
        //Je echo le statut pour avoir sa valeur en js avec xhr.responseText afin de savoir sous quel tableau écrire "Mail déjà existant"
        exit(0);
    }

    foreach($utilisateurs as &$util){
        if($util['numero'] == $numero){
            $util['civilite'] = $civilite;
            $util['nom'] = $nom;
            $util['prenom'] = $prenom;
            $util['email'] = $email;
            $util['mobile'] = $mobile;
        }
    }

    $nouveaujson = json_encode($utilisateurs, JSON_PRETTY_PRINT);

    file_put_contents('../JSON/utilisateurs.json',$nouveaujson);

    if($_SESSION['numero'] == $numero){ //Ca veut dire que l'admin a change ses propres attributs depuis la page admin
        $_SESSION['civilite'] = $civilite;
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['email'] = $email;
        $_SESSION['mobile'] = $mobile;
    }

    echo "1";
?>