<?php
    session_start();
    $datedepart = new DateTime($_POST['depart']);
    $dateretour = new DateTime($_POST['retour']);
    $duree = $datedepart->diff($dateretour);
    if($datedepart >= $dateretour){
        header("Location: ../Pages/etapes.php?nom=".$_GET['nom']."&message=Les dates sont incohérentes&depart=".$_POST['depart']."&retour=".$_POST['retour']."&personnes=".$_POST['personnes']);
        exit(1);
    }
    else if($duree->days > 30){
        header("Location: ../Pages/etapes.php?nom=".$_GET['nom']."&message=La durée du voyage ne doit pas excéder 30 jours&depart=".$_POST['depart']."&retour=".$_POST['retour']."&personnes=".$_POST['personnes']);
        exit(1);
    }
    
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

    $classe = ["economique" => 10, "premium" => 20, "buisiness" => 30];
    $hebergement = ["hotel3" => 10, "hotel4" => 20, "hotel5" => 30, "appartement" => 20, "villa" => 30];
    $assurance = ["non" => 0, "oui" => 40];
    $repas = ["aucun" => 0, "petitdejeuner" => 20, "allinclusive" => 50];
    $activites = ["non" => 0, "oui" => 40];

    $prix = $voyage['prix'];
    $jours = $voyage['duree'];
    $etapes = $voyage['etapes'];

    $heber = ($hebergement[$_POST['hebergementetape1']] + $hebergement[$_POST['hebergementetape2']] + $hebergement[$_POST['hebergementetape3']])/3;
    $rep = ($repas[$_POST['repas1']] + $repas[$_POST['repas2']] + $repas[$_POST['repas3']])/3;
    $activ = ($activites[$_POST['activites1']] + $activites[$_POST['activites2']] + $activites[$_POST['activites3']])/3;

    $prix = $prix/$jours;
    $prix -= $hebergement['hotel3'] + $classe['economique'];

    $montant = ($prix + $heber + $rep + $activ + $classe[$_POST['classe']] + $assurance[$_POST['assurance']]) * $duree->days * $_POST['personnes'];

    $i = 0;

    while(isset($_SESSION['id'.$i])){
        $i++;
    }

    $_SESSION['id'.$i] = $i;
    $_SESSION['panier'.$i] = 0;
    $_SESSION['titre'.$i] = $_GET['nom'];
    $_SESSION['personnes'.$i] = $_POST['personnes'];
    $_SESSION['depart'.$i] = $_POST['depart'];
    $_SESSION['retour'.$i] = $_POST['retour'];
    $_SESSION['classe'.$i] = $_POST['classe'];
    $_SESSION['assurance'.$i] = $_POST['assurance'];
    $_SESSION['duree'.$i] = $duree->days;
    $_SESSION['montant'.$i] = $montant;

    for($j=1;$j<=3;$j++){
        $_SESSION['etape'.$j.$i] = $etapes[$j-1];
        $_SESSION['hebergementetape'.$j.$i] = $_POST['hebergementetape'.$j];
        $_SESSION['repas'.$j.$i] = $_POST['repas'.$j];
        $_SESSION['activites'.$j.$i] = $_POST['activites'.$j];
    }

    header('Location: ../Pages/recapitulatif.php?id='.$i);
?>