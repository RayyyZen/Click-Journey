<?php
    session_start();

    $i = 0;
    $voy = [];
    $totalmontant = 0;
    $j = 1;

    while(isset($_SESSION['panier'.$i])) {
        if($_SESSION['panier'.$i] == 1){
            $etapes = [];
            while(isset($_SESSION['hebergementetape'.$j.$i])){
                $etapes [] = 
                [
                    "etapetitre" => $_SESSION['etape'.$j.$i],
                    "hebergement" => $_SESSION['hebergementetape'.$j.$i],
                    "repas" => $_SESSION['repas'.$j.$i],
                    "activites" => $_SESSION['activites'.$j.$i]
                ];
                $j++;
            }
        
            $voyage = [
                "titre" => $_SESSION['titre'.$i],
                "personnes" => $_SESSION['personnes'.$i],
                "depart" => $_SESSION['depart'.$i],
                "retour" => $_SESSION['retour'.$i],
                "duree" => $_SESSION['duree'.$i],
                "classe" => $_SESSION['classe'.$i],
                "assurance" => $_SESSION['assurance'.$i],
                "montant" => $_SESSION['montant'.$i],
                "etapes" => $etapes,
            ];
        
            $voy[] = $voyage;

            $totalmontant += $_SESSION['montant'.$i];
        }
        $i++;
    }

    $nouveau = [
        "status" => $_GET['status'],
        "transaction" => $_GET['transaction'],
        "utilisateur" => $_SESSION['numero'],
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

        $i=1;
        while(isset($_SESSION['hebergementetape'.$i.$id])){
            unset($_SESSION['hebergementetape'.$i.$id]);
            unset($_SESSION['repas'.$i.$id]);
            unset($_SESSION['activites'.$i.$id]);
            $i++;
        }

        $id++;
    }
    header("Location: ../Pages/informations.php");
?>