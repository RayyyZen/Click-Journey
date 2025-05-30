<?php
    sleep(2);

    $action = $_POST['action'];
    $numero = $_POST['numero'];

    $json = file_get_contents('../JSON/utilisateurs.json');
    $utilisateurs = json_decode($json, true);

    if(!is_array($utilisateurs)){
        $utilisateurs = [];
    }

    //Le &$util à la place de $util c'est parce que dans le foreach $util est une copie donc si on le change $utilisateurs ne change pas alors que &$util le fait changer
    foreach($utilisateurs as &$util){
        if($util['numero'] == $numero){
            switch($action){
                case "retrograder" :
                    $util['statut'] = "Utilisateur";
                    break;
                case "bannir" :
                    $util['statut'] = "Banni";
                    break;
                case "promouvoir" :
                    $util['statut'] = "Admin";
                    break;
                case "debannir" :
                    $util['statut'] = "Utilisateur";
                    break;
                case "modifier" :
                    break;
            }
        }
    }
    
    $nouveaujson = json_encode($utilisateurs, JSON_PRETTY_PRINT);

    file_put_contents('../JSON/utilisateurs.json',$nouveaujson);
?>