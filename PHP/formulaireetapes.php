<?php
    session_start();
    $datedepart = new DateTime($_POST['depart']);
    $dateretour = new DateTime($_POST['retour']);
    $duree = $datedepart->diff($dateretour);
    $montant = (float)$_POST['montant'];
    
    $json = file_get_contents('../JSON/voyages.json');
    $tabvoyages = json_decode($json, true);

    if(!is_array($tabvoyages)){
        $tabvoyages = [];
    }

    foreach($tabvoyages as $voyage){
        if($voyage['titre'] == $_GET['nom']){
            break;
        }
    }
    $etapes = $voyage['etapes'];

    $i = 0;

    while(isset($_SESSION['id'.$i])){
        $i++;
        // On cherche le prochain numéro id à remplir
    }

    $_SESSION['id'.$i] = $i;
    $_SESSION['panier'.$i] = 0;
    // Le = 0 veut dire que le voyage n'est pas encore ajouté au panier
    $_SESSION['titre'.$i] = $_GET['nom'];
    $_SESSION['personnes'.$i] = $_POST['personnes'];
    $_SESSION['depart'.$i] = $_POST['depart'];
    $_SESSION['retour'.$i] = $_POST['retour'];
    $_SESSION['classe'.$i] = $_POST['classe'];
    $_SESSION['assurance'.$i] = $_POST['assurance'];
    $_SESSION['duree'.$i] = $duree->days;
    $_SESSION['montant'.$i] = $montant;

    $j=1;
    while(isset($_POST['hebergementetape'.$j])){
        $_SESSION['etape'.$j.$i] = $etapes[$j-1];
        $_SESSION['hebergementetape'.$j.$i] = $_POST['hebergementetape'.$j];
        $_SESSION['repas'.$j.$i] = $_POST['repas'.$j];
        $_SESSION['activites'.$j.$i] = $_POST['activites'.$j];
        $j++;
    }

    header('Location: ../Pages/recapitulatif.php?id='.$i);
?>