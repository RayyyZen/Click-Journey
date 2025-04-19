<?php
    session_start();
    $numero = $_SESSION['numero'];

    $json = file_get_contents('../JSON/utilisateurs.json');
    $utilisateurs = json_decode($json, true);

    if(!is_array($utilisateurs)){
        $utilisateurs = [];
    }
    foreach($utilisateurs as $key => $util){
        if($util['numero'] == $numero){
            unset($utilisateurs[$key]);
            break;
        }
    }

    $_SESSION = [];

    $nouveaujson = json_encode($utilisateurs, JSON_PRETTY_PRINT);

    file_put_contents('../JSON/utilisateurs.json',$nouveaujson);

    header("location: ../Pages/index.php");
?>