<?php
    function afficheHead($page){
        echo '<head>';
        echo '<title>'.$page.' | Star Tour</title>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="description" content="Agence de voyage des lieux de tournage de la saga Star Wars">';
        echo '<meta name="author" content="Rayane M., Enzo F., Hugo N.">';
        echo '<link id="css" rel="stylesheet" type="text/css" href="../CSS/style.css">';
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">';
        echo '<script src="../JavaScript/couleur.js" type="text/javascript"></script>';
        if($page == "Etapes"){
            echo '<script src="../JavaScript/dateretour.js" type="text/javascript"></script>';
            echo '<script src="../JavaScript/montant.js" type="text/javascript"></script>';
        }
        else if($page == "Destinations"){
            echo '<script src="../JavaScript/annuler.js" type="text/javascript"></script>';
            echo '<script src="../JavaScript/tri.js" type="text/javascript"></script>';
        }
        else if($page == "Inscription" || $page == "Connexion"){
            echo '<script src="../JavaScript/formulaire.js" type="text/javascript"></script>';
        }
        else if($page == "Informations" || $page == "Admin"){
            echo '<script src="../JavaScript/formulaire.js" type="text/javascript"></script>';
            echo '<script src="../JavaScript/informations.js" type="text/javascript"></script>';
        }
        echo '</head>';
    }
    
    function afficheIcones(){
        if(isset($_SESSION['nom'])){
            echo '<div class="informations"> <a href="informations.php" class="fa-solid fa-user"></a> </div>';
            echo '<div class="deconnexion"> <a href="../PHP/deconnexion.php" class="fa-solid fa-right-from-bracket"></a> </div>';
            if($_SESSION['statut'] == "Admin"){
                echo '<div class="admin"> <a href="admin.php" class="fa-solid fa-user-tie"></a> </div>';
            }
        }
        else{
            echo "<div class='inscription'> <a href='inscription.php'>S'inscrire</a> </div>";
            echo "<div class='connexion montre'> <a href='connexion.php'>Se connecter</a> </div>";
        }

    }

    function afficherPanier(){
        $i = 0;
        $panier = 0;
        while(isset($_SESSION['panier'.$i])){
            if($_SESSION['panier'.$i] == 1){
                $panier = 1;
            }
            $i++;
        }

        if($panier == 1){
            echo '<a href="../Pages/panier.php" class="panier"><i class="fa-solid fa-cart-shopping"></i></a>';
        }
    }

    function afficheHorizontal($recherche,$icone){
        echo '<script>document.addEventListener("DOMContentLoaded", appliquerCouleur);</script>';
        /*Je fais ca au lieu d'appeler directement la fonction pour que le script attende que tous les elements html soient charges pour appeler la fonction pour eviter les bugs*/
        echo '<div class="horizontal">';
        echo '<div class="nomSite"> <a href="index.php">Star Tour</a> </div>';
        if($recherche == 1){
            echo '<div class="recherche montre2">';
            echo '<form action="../PHP/formulairerecherche.php" method="post">';
            echo '    <input type="text" name="recherche" placeholder="Rechercher...">';
            echo '</form>';
            echo '</div>';
        }
        echo '<button type="button" name="couleur" class="couleur" onclick="changerCouleur()"><i class="fa-solid fa-circle-half-stroke"></i></button>';
        if($icone == 1){
            afficheIcones();
        }
        echo '</div>';
    }

    function afficheCivilite(){
        echo '<label>Civilité :</label>';
        echo '<div class="choixradio">';
        if($_SESSION['civilite'] == "Monsieur"){
            echo '    <input type="radio" id="monsieur" name="civilite" data-extra="Monsieur" value="Monsieur" checked disabled>';
            echo '    <label for="monsieur" class="civiliteLabel">Monsieur</label>';
            echo '    <input type="radio" id="madame" name="civilite" data-extra="Monsieur" value="Madame" disabled>';
        }
        else{
            echo '    <input type="radio" id="monsieur" name="civilite" data-extra="Madame" value="Monsieur" disabled>';
            echo '    <label for="monsieur" class="civiliteLabel">Monsieur</label>';
            echo '    <input type="radio" id="madame" name="civilite" data-extra="Madame" value="Madame" checked disabled>';
        }
        echo '    <label for="madame" class="civiliteLabel">Madame</label>';
        echo '    <div class="changerChamps">';
        echo '        <button type="button" id="buttoncivilite" onclick="changementCivilite()"><i class="fa-solid fa-pen-nib"></i></button>';
        echo '        <button hidden type="submit" id="sauvegardercivilite"><i class="fa-solid fa-check"></i></button>';
        echo '        <button hidden type="button" id="restaurercivilite" onclick="restaurerCivilite()"><i class="fa-solid fa-xmark"></i></button>';
        echo '    </div>';
        echo '</div>';
    }

    function statutUtilisateurs($tableau){

        $json = file_get_contents('../JSON/utilisateurs.json');
        $utilisateurs = json_decode($json, true);

        if(!is_array($utilisateurs)){
            $utilisateurs = [];
        }

        echo '<tr>';
        echo '    <th></th>';
        echo '    <th>Numéro</th>';
        echo '    <th>Civilité</th>';
        echo '    <th>Nom</th>';
        echo '    <th>Prénom</th>';
        echo '    <th>Adresse mail</th>';
        echo '    <th>Téléphone</th>';
        echo '</tr>';

        foreach($utilisateurs as $util){
            if($util['statut'] == $tableau){
                echo '<tr>';
                echo '    <td>';
                if($_SESSION['numero'] == $util['numero']){
                    echo '        <a id="etoile/'.$util['numero'].'" href="../PHP/boutonadmin.php?action=etoile&email='.$util['email'].'" class="fa-solid fa-star boutonadmin"></a>';
                }
                if($tableau == "Admin" && $_SESSION['numero'] != $util['numero']){
                    echo '        <a id="retrograder/'.$util['numero'].'" href="../PHP/boutonadmin.php?action=retrograder&email='.$util['email'].'" class="fa-solid fa-circle-user boutonadmin"></a>';
                }
                if($tableau == "Utilisateur"){
                    echo '        <a  id="promouvoir/'.$util['numero'].'"href="../PHP/boutonadmin.php?action=promouvoir&email='.$util['email'].'" class="fa-solid fa-hammer boutonadmin"></a>';
                }
                if($tableau != "Banni" && $_SESSION['numero'] != $util['numero']){
                    echo '        <a id="bannir/'.$util['numero'].'" href="../PHP/boutonadmin.php?action=bannir&email='.$util['email'].'" class="fa-regular fa-trash-can boutonadmin"></a>';
                }
                if($tableau == "Banni"){
                    echo '        <a id="debannir/'.$util['numero'].'" href="../PHP/boutonadmin.php?action=debannir&email='.$util['email'].'" class="fa-solid fa-rotate-right boutonadmin"></a>';
                }
                //echo '        <a href="../PHP/boutonadmin.php?action=modifier&email='.$util['email'].'" class="fa-regular fa-pen-to-square boutonadmin"></a>';
                echo '        <button type="button" id="button/'.$util['numero'].'" onclick="changementAdmin('.$util['numero'].')"><i class="fa-regular fa-pen-to-square"></i></button>';
                echo '        <button hidden type="submit" id="sauvegarder/'.$util['numero'].'"><i class="fa-solid fa-check"></i></button>';
                echo '        <button hidden type="button" id="restaurer/'.$util['numero'].'" onclick="restaurerAdmin('.$util['numero'].')"><i class="fa-solid fa-xmark"></i></button>';
                echo '        <button hidden type="button" id="chargement/'.$util['numero'].'"><i class="fas fa-spinner fa-spin"></i></button>';
                echo '    </td>';

                echo '    <td>'.'<input type="text" id="'.$util['numero'].'" name="numero" data-extra="'.$util['numero'].'" value="'.$util['numero'].'" maxlength="1" disabled>'.'</td>';

                echo '    <td><select id="civilite/'.$util['numero'].'" data-extra="'.$util['civilite'].'" name="civilite" disabled>';
                echo '        <option value="Monsieur">Monsieur</option>';
                echo '        <option value="Madame">Madame</option>';
                echo "    </select></td>";

                echo '    <td>'.'<input type="text" id="nom/'.$util['numero'].'" name="nom" data-extra="'.$util['nom'].'" value="'.$util['nom'].'" maxlength="20" disabled>'.'</td>';
                echo '    <td>'.'<input type="text" id="prenom/'.$util['numero'].'" name="prenom" data-extra="'.$util['prenom'].'" value="'.$util['prenom'].'" maxlength="20" disabled>'.'</td>';
                echo '    <td>'.'<input type="email" id="email/'.$util['numero'].'" name="email" data-extra="'.$util['email'].'" value="'.$util['email'].'" maxlength="40" disabled>'.'</td>';
                echo '    <td>'.'<input type="tel" id="mobile/'.$util['numero'].'" name="mobile" data-extra="'.$util['mobile'].'" value="'.$util['mobile'].'" maxlength="10" disabled>'.'</td>';                
                echo '</tr>';
            }
        }
    }

    function rechercheVoyages($voyage,$recherche){
        if($recherche == '' || strpos(strtolower($voyage['titre']),strtolower($recherche)) !== false || strpos(strtolower($voyage['ville']),strtolower($recherche)) !== false || strpos(strtolower($voyage['pays']),strtolower($recherche)) !== false){
            return 1;
        }
        return 0;
    }

    function dureeVoyages($voyage,$duree){
        if($duree == '' || $duree == "duree" || ($duree == "4jours" && $voyage['duree'] < 4) || ($duree == "4jours6" && $voyage['duree'] >= 4 && $voyage['duree'] < 6) || ($duree == "6jours8" && $voyage['duree'] >= 6 && $voyage['duree'] < 8) || ($duree == "jours8" && $voyage['duree'] >= 8)){
            return 1;
        }
        return 0;
    }

    function prixVoyages($voyage,$prix){
        if($prix == '' || $prix == "prix" || ($prix == "euros500" && $voyage['prix'] < 500) || ($prix == "500euros1000" && $voyage['prix'] >= 500 && $voyage['prix'] < 1000) || ($prix == "1000euros1500" && $voyage['prix'] >= 1000 && $voyage['prix'] < 1500) || ($prix == "1500euros2000" && $voyage['prix'] >= 1500 && $voyage['prix'] < 2000) || ($prix == "euros2000" && $voyage['prix'] >= 2000)){
            return 1;
        }
        return 0;
    }

    function continentVoyages($voyage,$continent){
        if($continent == '' || $continent == "continent" || $continent == $voyage['continent']){
            return 1;
        }
        return 0;
    }

    function afficheVoyages($recherche,$duree,$prix,$continent){

        $json = file_get_contents('../JSON/voyages.json');
        $tabvoyages = json_decode($json, true);
        $i = 0;

        if(!is_array($tabvoyages)){
            $tabvoyages = [];
        }
        foreach($tabvoyages as $voyage){
            if(rechercheVoyages($voyage,$recherche) && dureeVoyages($voyage,$duree) && prixVoyages($voyage,$prix) && continentVoyages($voyage,$continent)){
                //Pour les versions anciennes de PHP il faut remplacer la fonction str_contains() par strpos()
                echo '<li id="'.$voyage['prix'].','.$voyage['duree'].','.$i.'">';
                echo '    <a href="../Pages/voyage.php?nom='.$voyage['titre'].'" class="endroit">';
                echo '        <img src="'.$voyage['image'].'" class="imagedestination">';
                echo '        <p class=titredestination>'.$voyage['titre'].'</p>';
                echo "        <p>".$voyage['ville']." (".$voyage['pays'].")";
                echo "        <br>Durée : ".$voyage['duree']." jours";
                echo "        <br>A partir de : ".$voyage['prix']."€";
                echo "        </p>";
                echo '    </a>';
                echo '</li>';
                $i++;
            }
        }
    }

    function afficheInfosVoyage($nom){
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

        echo '<div class="section pagevoyage">Voyage</div>';

        echo '<div class="paragraph pagevoyage">';
        echo '<table class="destinationvoyage">';
        echo '        <tr>';
        echo '            <td><img src="'.$voyage['image'].'" class="image345voyage"></td>';
        echo '            <td>';
        echo '            <p class=titredestination>'.$voyage['titre'].'</p>';
        echo "            <p>".$voyage['ville']." (".$voyage['pays'].")";
        echo "            <br>Durée : ".$voyage['duree']." jours";
        echo "            <br>Prix : ".$voyage['prix']."€";
        echo '           </td>';
        echo '        </tr>';
        echo '</table>';
        echo ($voyage['description']);
        echo '<a href="etapes.php?nom='.$nom.'" class="lienetapes">Réserver</a>';
        echo '</div>';
    }

    function affiche3voyages(){
        $json = file_get_contents('../JSON/voyages.json');
        $tabvoyages = json_decode($json, true);

        if(!is_array($tabvoyages)){
            $tabvoyages = [];
        }

        echo '<table class="destination">';
        $i=0;
        foreach($tabvoyages as $voyage){
            
            echo '<tr>';
            echo '    <td><a href="../Pages/voyage.php?nom='.$voyage['titre'].'" class="lienvoyage"><img src="'.$voyage['image'].'" class="image345"></a></td>';
            echo '    <td><a href="../Pages/voyage.php?nom='.$voyage['titre'].'" class="lienvoyage">'.$voyage['description'].'</a></td>';
            echo '</tr>';
            
            $i++;
            if($i>=3){
                break;
            }
        }
        echo '</table>';
    }

    function afficheEtapes($nom,$id){
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
            echo '<p class="titreetapes">Etape '.$i.' : '.$etape.'</p>';
            echo '<label>Hébergement :</label>';
            if($id != "" && isset($_SESSION['hebergementetape'.$i.$id])){
                echo '<select data-extra="'.$_SESSION['hebergementetape'.$i.$id].'" name="hebergementetape'.$i.'" id="hebergementetape'.$i.'">';
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
            }
            else{
                echo '<select name="activites'.$i.'" id="activites'.$i.'">';
            }
            echo '  <option value="non">Non</option>';
            echo '  <option value="oui">Oui</option>';
            echo '</select>';
            $i++;
        }
    }

    function afficheChamp($texte) {
        switch($texte){
            case "hotel3" :
                echo "<div class='champ'>Hôtel 3 étoiles</div>";
                break;
            case "hotel4" :
                echo "<div class='champ'>Hôtel 4 étoiles</div>";
                break;
            case "hotel5" :
                echo "<div class='champ'>Hôtel 5 étoiles</div>";
                break;
            case "appartement" :
                echo "<div class='champ'>Appartement</div>";
                break;
            case "villa" :
                echo "<div class='champ'>Villa</div>";
                break;
            case "oui" :
                echo "<div class='champ'>Oui</div>";
                break;
            case "non" :
                echo "<div class='champ'>Non</div>";
                break;
            case "aucun" :
                echo "<div class='champ'>Aucun</div>";
                break;
            case "petitdejeuner" :
                echo "<div class='champ'>Petit-déjeuner</div>";
                break;
            case "allinclusive" :
                echo "<div class='champ'>All-inclusive</div>";
                break;
            case "economique" :
                echo "<div class='champ'>Economique</div>";
                break;
            case "premium" :
                echo "<div class='champ'>Premium</div>";
                break;
            case "buisiness" :
                echo "<div class='champ'>Buisiness</div>";
                break;
        }
    }

    function afficheRecap($transaction,$id,$num) {
        if($transaction != ""){
            //Si on est dans cette condition ca veut dire qu'on a accédé au récap depuis la page d'informations
            $json = file_get_contents('../JSON/transactions.json');
            $transactions = json_decode($json, true);

            if(!is_array($transactions)){
                $transactions = [];
            }

            foreach($transactions as $tr){
                if($tr['transaction'] == $transaction){
                    break;
                }
            }

            $voyage = $tr['voyage'][$num];
            $etapes = $voyage['etapes'];

            echo 'Numéro de transaction :';
            echo '<div class="champ">'.$tr['transaction'].'</div>';
            echo 'Titre du voyage :';
            echo '<div class="champ1">'.$voyage['titre'].'</div>';
            echo 'Montant total :';
            echo '<div class="champ">'.$voyage['montant'].'€</div>';
            echo 'Nombre de personnes :';
            echo '<div class="champ">'.$voyage['personnes'].'</div>';
            echo 'Date de départ :';
            echo '<div class="champ">'.$voyage['depart'].'</div>';
            echo 'Date de retour :';
            echo '<div class="champ">'.$voyage['retour'].'</div>';
            echo 'Durée du voyage :';
            echo '<div class="champ">'.$voyage['duree'].' jours</div>';
            echo 'Classe du vol :';
            echo (afficheChamp($voyage['classe']));
            echo 'Assurance voyage :';
            echo (afficheChamp($voyage['assurance']));

            for($i=1;$i<=3;$i++){
                echo '<p class="titreetapes">Etape '.$i.' : '.$etapes[$i-1]['etapetitre'].'</p>';
                echo 'Hébergement :';
                echo (afficheChamp($etapes[$i-1]['hebergement']));
                echo 'Repas :';
                echo (afficheChamp($etapes[$i-1]['repas']));
                echo 'Activités et excursions :';
                echo (afficheChamp($etapes[$i-1]['activites']));
            }
            echo "<a href='../Pages/informations.php' class='lienretour'>Retour</a>";
        }
        else{
            //Si on est dans cette condition ca veut dire qu'on a accédé au récap depuis la page d'étapes
            echo 'Titre du voyage :';
            echo '<div class="champ1">'.$_SESSION['titre'.$id].'</div>';
            echo 'Montant total :';
            echo '<div class="champ">'.$_SESSION['montant'.$id].'€</div>';
            echo 'Nombre de personnes :';
            echo '<div class="champ">'.$_SESSION['personnes'.$id].'</div>';
            echo 'Date de départ :';
            echo '<div class="champ">'.$_SESSION['depart'.$id].'</div>';
            echo 'Date de retour :';
            echo '<div class="champ">'.$_SESSION['retour'.$id].'</div>';
            echo 'Durée du voyage :';
            echo '<div class="champ">'.$_SESSION['duree'.$id].' jours</div>';
            echo 'Classe du vol :';
            echo (afficheChamp($_SESSION['classe'.$id]));
            echo 'Assurance voyage :';
            echo (afficheChamp($_SESSION['assurance'.$id]));

            for($i=1;$i<=3;$i++){
                echo '<p class="titreetapes">Etape '.$i.' : '.$_SESSION['etape'.$i.$id].'</p>';
                echo 'Hébergement :';
                echo (afficheChamp($_SESSION['hebergementetape'.$i.$id]));
                echo 'Repas :';
                echo (afficheChamp($_SESSION['repas'.$i.$id]));
                echo 'Activités et excursions :';
                echo (afficheChamp($_SESSION['activites'.$i.$id]));
            }
            
            echo "<a href='../PHP/ajoutpanier.php?id=".$id."' class='lienretour'>Ajouter au panier</a>";
            echo "<a href='../Pages/etapes.php?id=".$id."&nom=".$_SESSION['titre'.$id]."' class='lienretour'>Retour</a>";
        }
    }

    function afficheReservations(){
        $json = file_get_contents('../JSON/transactions.json');
        $transactions = json_decode($json, true);

        if(!is_array($transactions)){
            $transactions = [];
        }

        foreach($transactions as $tr){
            if($tr['utilisateur'] == $_SESSION['email'] && $tr['status'] == "accepted"){
                $i = 0;
                foreach($tr['voyage'] as $voy){
                    echo '<a href="../Pages/recapitulatif.php?transaction='.$tr['transaction'].'&num='.$i.'">'.$voy['titre'].'</a>';
                    $i++;
                }
            }
        }
    }
?>