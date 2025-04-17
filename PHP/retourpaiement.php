<?php
    session_start();


    $i = 0;
    $voy = [];
    $totalmontant = 0;

    while(isset($_SESSION['panier'.$i])) {
        if($_SESSION['panier'.$i] == 1){
            $etapes = [
                [
                    "etapetitre" => $_SESSION['etape1' . $i],
                    "hebergement" => $_SESSION['hebergementetape1' . $i],
                    "repas" => $_SESSION['repas1' . $i],
                    "activites" => $_SESSION['activites1' . $i]
                ],
                [
                    "etapetitre" => $_SESSION['etape2' . $i],
                    "hebergement" => $_SESSION['hebergementetape2' . $i],
                    "repas" => $_SESSION['repas2' . $i],
                    "activites" => $_SESSION['activites2' . $i]
                ],
                [
                    "etapetitre" => $_SESSION['etape3' . $i],
                    "hebergement" => $_SESSION['hebergementetape3' . $i],
                    "repas" => $_SESSION['repas3' . $i],
                    "activites" => $_SESSION['activites3' . $i]
                ]
            ];
        
            $voyage = [
                "titre" => $_SESSION['titre' . $i],
                "personnes" => $_SESSION['personnes' . $i],
                "depart" => $_SESSION['depart' . $i],
                "retour" => $_SESSION['retour' . $i],
                "duree" => $_SESSION['duree' . $i],
                "classe" => $_SESSION['classe' . $i],
                "assurance" => $_SESSION['assurance' . $i],
                "montant" => $_SESSION['montant' . $i],
                "etapes" => $etapes,
            ];
        
            $voy[] = $voyage;

            $totalmontant += $_SESSION['montant' . $i];
        }
        $i++;
    }

    $nouveau = [
        "status" => $_GET['status'],
        "transaction" => $_GET['transaction'],
        "utilisateur" => $_SESSION['email'],
        "totalmontant" => $totalmontant,
        "voyage" => $voy,
    ];

    $json = file_get_contents('../JSON/transactions.json');
    $transactions = json_decode($json, true);

    if(!is_array($transactions)){
        $transactions = [];
    }

    $transactions[] = $nouveau;
    $nouveaujson = json_encode($transactions, JSON_PRETTY_PRINT);

    file_put_contents('../JSON/transactions.json',$nouveaujson);

    if($_GET['status'] == "denied"){
        header("Location: ../Pages/panier.php");
        exit(1);
    }

    $id = 0;
    while(isset($_SESSION['panier'.$id])){
        unset($_SESSION['id'.$id]);
        unset($_SESSION['panier'.$id]);
        unset($_SESSION['titre'.$id]);
        unset($_SESSION['personnes'.$id]);
        unset($_SESSION['depart'.$id]);
        unset($_SESSION['retour'.$id]);
        unset($_SESSION['classe'.$id]);
        unset($_SESSION['assurance'.$id]);
        unset($_SESSION['duree'.$id]);
        unset($_SESSION['montant'.$id]);

        for($i=1;$i<=3;$i++){
            unset($_SESSION['hebergementetape'.$i.$id]);
            unset($_SESSION['repas'.$i.$id]);
            unset($_SESSION['activites'.$i.$id]);
        }
        $id++;
    }
    header("Location: ../Pages/informations.php");
?>