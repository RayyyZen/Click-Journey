<?php
    session_start();

    $nom = $_POST['nom'];
    $id = $_POST['id'];

    $json = file_get_contents('../JSON/voyages.json');
    $tabvoyages = json_decode($json, true);

    if(!is_array($tabvoyages)){
        $tabvoyages = [];
    }

    foreach($tabvoyages as $voyage){
        if($voyage['titre'] == $nom){
            break;
        }
    }
    $i=1;
    foreach($voyage['etapes'] as $etape){
        echo '<div name="etape" class="etape">';
        echo '<p class="titreetapes">Etape '.$i.' : '.$etape.'</p>';

        echo '<label>Hébergement :</label>';
        if($id != "" && isset($_SESSION['hebergementetape'.$i.$id])){
            echo '<select data-extra="'.$_SESSION['hebergementetape'.$i.$id].'" name="hebergementetape'.$i.'" id="hebergementetape'.$i.'">';
            //Le data-extra sert à remplir le input si le client arrive sur la page d'étapes pour changer ses anciens choix
        }
        else{
            echo '<select name="hebergementetape'.$i.'" id="hebergementetape'.$i.'">';
        }
        echo '  <option value="hotel3">Hôtel 3 étoiles</option>';
        echo '  <option value="hotel4">Hôtel 4 étoiles</option>';
        echo '  <option value="hotel5">Hôtel 5 étoiles</option>';
        echo '  <option value="appartement">Appartement</option>';
        echo '  <option value="villa">Villa</option>';
        echo '</select>';

        echo '<label>Repas :</label>';
        if($id != "" && isset($_SESSION['repas'.$i.$id])){
            echo '<select data-extra="'.$_SESSION['repas'.$i.$id].'" name="repas'.$i.'" id="repas'.$i.'">';
            //Le data-extra sert à remplir le input si le client arrive sur la page d'étapes pour changer ses anciens choix
        }
        else{
            echo '<select name="repas'.$i.'" id="repas'.$i.'">';
        }
        echo '  <option value="aucun">Aucun</option>';
        echo '  <option value="petitdejeuner">Petit-déjeuner</option>';
        echo '  <option value="allinclusive">All-inclusive</option>';
        echo '</select>';

        echo '<label>Activités et excursions :</label>';
        if($id != "" && isset($_SESSION['activites'.$i.$id])){
            echo '<select data-extra="'.$_SESSION['activites'.$i.$id].'" name="activites'.$i.'" id="activites'.$i.'">';
            //Le data-extra sert à remplir le input si le client arrive sur la page d'étapes pour changer ses anciens choix
        }
        else{
            echo '<select name="activites'.$i.'" id="activites'.$i.'">';
        }
        echo '  <option value="non">Non</option>';
        echo '  <option value="oui">Oui</option>';
        echo '</select>';
        echo '</div>';
        $i++;
    }
?>