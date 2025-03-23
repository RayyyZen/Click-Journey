<?php
    function afficheHead($page){
        echo '<head>';
        echo '<title>'.$page.' | Star Tour</title>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="description" content="Agence de voyage des lieux de tournage de la saga Star Wars">';
        echo '<meta name="author" content="Rayane M., Enzo F., Hugo N.">';
        echo '<link rel="stylesheet" type="text/css" href="../CSS/style.css">';
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">';
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

    function afficheHorizontal($recherche,$icone){
        echo '<div class="horizontal">';
        echo '<div class="nomSite"> <a href="index.php">Star Tour</a> </div>';
        if($recherche == 1){
            echo '<div class="recherche">';
            echo '<form action="../PHP/formulairerecherche.php" method="post">';
            echo '    <input type="text" name="recherche" placeholder="Rechercher..." required>';
            echo '</form>';
            echo '</div>';
        }
        if($icone == 1){
            afficheIcones();
        }
        echo '</div>';
    }

    function afficheCivilite(){

        echo '<label>Civilité :</label>';
        echo '<div class="choixradio">';
        if($_SESSION['civilite'] == "Monsieur"){
            echo '    <input type="radio" id="monsieur" name="civilite" value="Monsieur" checked disabled>';
            echo '    <label for="monsieur" class="civiliteLabel">Monsieur</label>';
            echo '    <input type="radio" id="madame" name="civilite" value="Madame" disabled>';
        }
        else{
            echo '    <input type="radio" id="monsieur" name="civilite" value="Monsieur" disabled>';
            echo '    <label for="monsieur" class="civiliteLabel">Monsieur</label>';
            echo '    <input type="radio" id="madame" name="civilite" value="Madame" checked disabled>';
        }
        echo '    <label for="madame" class="civiliteLabel">Madame</label>';
        echo '    <i class="fa-solid fa-pen-nib"></i>';
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
                if($_SESSION['email'] == $util['email']){
                    echo '        <a href="../PHP/boutonadmin.php?action=etoile&email='.$util['email'].'" class="fa-solid fa-star boutonadmin"></a>';
                }
                if($tableau == "Admin" && $_SESSION['email'] != $util['email']){
                    echo '        <a href="../PHP/boutonadmin.php?action=retrograder&email='.$util['email'].'" class="fa-solid fa-circle-user boutonadmin"></a>';
                }
                if($tableau == "Utilisateur"){
                    echo '        <a href="../PHP/boutonadmin.php?action=promouvoir&email='.$util['email'].'" class="fa-solid fa-hammer boutonadmin"></a>';
                }
                if($tableau != "Banni" && $_SESSION['email'] != $util['email']){
                    echo '        <a href="../PHP/boutonadmin.php?action=bannir&email='.$util['email'].'" class="fa-regular fa-trash-can boutonadmin"></a>';
                }
                if($tableau == "Banni"){
                    echo '        <a href="../PHP/boutonadmin.php?action=debannir&email='.$util['email'].'" class="fa-solid fa-rotate-right boutonadmin"></a>';
                }
                //echo '        <a href="../PHP/boutonadmin.php?action=modifier&email='.$util['email'].'" class="fa-regular fa-pen-to-square boutonadmin"></a>';
                echo '    </td>';
                echo '    <td>'.$util['civilite'].'</td>';
                echo '    <td>'.$util['nom'].'</td>';
                echo '    <td>'.$util['prenom'].'</td>';
                echo '    <td>'.$util['email'].'</td>';
                echo '    <td>'.$util['mobile'].'</td>';
                echo '</tr>';
            }
        }
    }

    function afficheVoyages($recherche){

        $json = file_get_contents('../JSON/voyages.json');
        $tabvoyages = json_decode($json, true);

        if(!is_array($tabvoyages)){
            $tabvoyages = [];
        }
        foreach($tabvoyages as $voyage){
            if(str_contains(strtolower($voyage['titre']),strtolower($recherche)) || str_contains(strtolower($voyage['ville']),strtolower($recherche)) || str_contains(strtolower($voyage['pays']),strtolower($recherche))){
                echo '<li>';
                echo '    <a href="../HTML/voyage.php?nom='.$voyage['titre'].'" class="endroit">';
                echo '        <img src="'.$voyage['image'].'" class="imagedestination">';
                echo '        <p class=titredestination>'.$voyage['titre'].'</p>';
                echo "        <p>".$voyage['ville']." (".$voyage['pays'].")";
                echo "        <br>Durée : ".$voyage['duree']." jours";
                echo "        <br>Prix : ".$voyage['prix']."€";
                echo "        </p>";
                echo '    </a>';
                echo '</a></li>';
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
        echo '<a href="etapes.php">Réserver</a>';
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
            echo '    <td><a href="../HTML/voyage.php?nom='.$voyage['titre'].'" class="lienvoyage"><img src="'.$voyage['image'].'" class="image345"></a></td>';
            echo '    <td><a href="../HTML/voyage.php?nom='.$voyage['titre'].'" class="lienvoyage">'.$voyage['description'].'</a></td>';
            echo '</tr>';
            
            $i++;
            if($i>=3){
                break;
            }
        }
        echo '</table>';
    }
?>