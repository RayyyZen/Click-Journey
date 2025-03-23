<?php
    session_start();
    $email = $_SESSION['email'];

    $json = file_get_contents('../JSON/utilisateurs.json');
    $utilisateurs = json_decode($json, true);

    if(!is_array($utilisateurs)){
        $utilisateurs = [];
    }
    foreach($utilisateurs as $key => $util){
        if($util['email'] == $email){
            unset($utilisateurs[$key]);
            break;
        }
    }

    $_SESSION = [];

    $nouveaujson = json_encode($utilisateurs, JSON_PRETTY_PRINT);

    file_put_contents('../JSON/utilisateurs.json',$nouveaujson);

    header("location: ../HTML/index.php");
?>