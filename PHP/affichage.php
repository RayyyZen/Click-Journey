<?php
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
            echo "<div class='connexion'> <a href='connexion.php'>Se connecter</a> </div>";
        }
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
        echo '    <th>Civilité</th>';
        echo '    <th>Nom</th>';
        echo '    <th>Prénom</th>';
        echo '    <th>Adresse mail</th>';
        echo '    <th>Téléphone</th>';
        echo '</tr>';

        foreach($utilisateurs as $util){
            foreach($util as $key => $elm){
                switch($key){
                    case "statut" :
                        $statut = $elm;
                        break;
                    case "civilite" :
                        $civilite = $elm;
                        break;
                    case "nom" :
                        $nom = $elm;
                        break;
                    case "prenom" :
                        $prenom = $elm;
                        break;
                    case "email" :
                        $email = $elm;
                        break;
                    case "mobile" :
                        $mobile = $elm;
                        break;
                }
            }
            if($statut == $tableau){
                echo '<tr>';
                echo '    <td>'.$civilite.'</td>';
                echo '    <td>'.$nom.'</td>';
                echo '    <td>'.$prenom.'</td>';
                echo '    <td>'.$email.'</td>';
                echo '    <td>'.$mobile.'</td>';
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
            if(str_contains(strtolower($voyage['ville']),strtolower($recherche)) || str_contains(strtolower($voyage['pays']),strtolower($recherche))){
                echo '<li>';
                echo '    <div class="endroit">';
                echo '        <img src="'.$voyage['image'].'" class="imagedestination">';
                echo "        <p>".$voyage['ville']." (".$voyage['pays'].")";
                echo "        <br>Durée : ".$voyage['duree']." jours";
                echo "        <br>Prix : ".$voyage['prix']."€";
                echo "        <br><br>".$voyage['description']." </p>";
                echo '    </div>';
                echo '</li>';
            }
        }
    }
?>