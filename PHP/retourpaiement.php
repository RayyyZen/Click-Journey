<?php
    session_start();
    
    $etapes = [
        [
            "hebergement" => $_SESSION['hebergementetape1'],
            "repas" => $_SESSION['repas1'],
            "activites" => $_SESSION['activites1'],
        ],
        [
            "hebergement" => $_SESSION['hebergementetape2'],
            "repas" => $_SESSION['repas2'],
            "activites" => $_SESSION['activites2'],
        ],
        [
            "hebergement" => $_SESSION['hebergementetape3'],
            "repas" => $_SESSION['repas3'],
            "activites" => $_SESSION['activites3'],
        ]
    ];

    $voyage = [
        "titre" => $_SESSION['titre'],
        "personnes" => $_SESSION['personnes'],
        "depart" => $_SESSION['depart'],
        "retour" => $_SESSION['retour'],
        "classe" => $_SESSION['classe'],
        "assurance" => $_SESSION['assurance'],
        "etapes" => $etapes,
    ];

    $nouveau = [
        "status" => $_GET['status'],
        "transaction" => $_GET['transaction'],
        "utilisateur" => $_SESSION['email'],
        "voyage" => $voyage,
    ];

    $json = file_get_contents('../JSON/transactions.json');
    $transactions = json_decode($json, true);

    if(!is_array($transactions)){
        $transactions = [];
    }

    $transactions[] = $nouveau;
    $nouveaujson = json_encode($transactions, JSON_PRETTY_PRINT);

    file_put_contents('../JSON/transactions.json',$nouveaujson);

    unset($_SESSION['personnes']);
    unset($_SESSION['depart']);
    unset($_SESSION['retour']);
    unset($_SESSION['classe']);
    unset($_SESSION['assurance']);
    unset($_SESSION['duree']);
    unset($_SESSION['montant']);

    for($i=1;$i<=3;$i++){
        unset($_SESSION['hebergementetape'.$i]);
        unset($_SESSION['repas'.$i]);
        unset($_SESSION['activites'.$i]);
    }

    header("Location: ../HTML/index.php");
?>