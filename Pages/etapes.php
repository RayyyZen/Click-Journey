<?php
    require_once '../PHP/accespages.php';
    accesPages("etapes.php","","");
?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Etapes");
    ?>

    <body>
        <?php 
            afficheHorizontal(1,1);
            afficherPanier();
        ?>

        <div class="section pageetapes">Etapes et Réservation</div>

        <div class="paragraph pageetapes">
        <?php echo '<form action="../PHP/formulaireetapes.php?nom='.$_GET['nom'].'" method="POST">'; ?>
                <div id="etapesformulaire" class="formulaire">
                    <label>Nombre de personnes :</label>
                    <?php
                        $value = 1;
                        if(isset($_GET['id']) && isset($_SESSION['personnes'.$_GET['id']])){
                            $value = $_SESSION['personnes'.$_GET['id']];
                        }
                        echo '<input type="number" id="personnes" name="personnes" value="'.$value.'" min="1" max="6" required>';
                    ?>
                    <label>Date de départ :</label>
                    <?php
                        $value = date("Y-m-d");
                        if(isset($_GET['id']) && isset($_SESSION['depart'.$_GET['id']])){
                            $value = $_SESSION['depart'.$_GET['id']];
                        }
                        echo '<input type="date" id="depart" name="depart" value="'.$value.'" min="'.date("Y-m-d").'">';
                    ?>
                    <label>Date de retour :</label>
                    <?php
                        $value = date('Y-m-d', strtotime('+ 1 days'));
                        if(isset($_GET['id']) && isset($_SESSION['retour'.$_GET['id']])){
                            $value = $_SESSION['retour'.$_GET['id']];
                        }
                        echo '<input type="date" id="retour" name="retour" value="'.$value.'" min="'.date("Y-m-d").'">';
                    ?>

                    <script type="text/javascript">
                        majDateRetour();
                        var depart = document.getElementById("depart");
                        depart.addEventListener('change', majDateRetour);
                        //On rappelle la fonction qui checke les dates dès qu'il y a un changement de date de depart
                        window.addEventListener('load', majDateRetour);
                        //On rappelle la fonction qui checke les dates dès qu'il y a un rechargement de la page
                    </script>

                    <label>Classe du vol :</label>
                    <?php
                        if(isset($_GET['id']) && isset($_SESSION['classe'.$_GET['id']])){
                            echo '<select data-extra="'.$_SESSION['classe'.$_GET['id']].'" name="classe" id="classe">';
                        }
                        else{
                            echo '<select name="classe" id="classe">';
                        }
                    ?>
                        <option value="economique">Economique</option>
                        <option value="premium">Premium</option>
                        <option value="buisiness">Buisiness</option>
                    </select>

                    <label>Assurance voyage :</label>
                    <?php
                        if(isset($_GET['id']) && isset($_SESSION['assurance'.$_GET['id']])){
                            echo '<select data-extra="'.$_SESSION['assurance'.$_GET['id']].'" name="assurance" id="assurance">';
                        }
                        else{
                            echo '<select name="assurance" id="assurance">';
                        }
                    ?>
                        <option value="non">Non</option>
                        <option value="oui">Oui</option>
                    </select>
                    <?php 
                    
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

                        $prix = $voyage['prix'];
                        echo '<input type="hidden" id="prix" value="'.$prix.'">';
                        $duree = $voyage['duree'];
                        echo '<input type="hidden" id="duree" value="'.$duree.'">';
                        //Ces inputs permettent au javascript d'accéder à leurs valeurs

                        echo '<input hidden type="text" name="montant" id="idmontant" value="'.$prix.'">';
                        //Ce input permet d'envoyer au serveur le montant total
                    ?>

                    <input type="submit" id='save' name="save" title="Engistrer les etapes" value="Confirmer" required>

                    <script type="text/javascript">
                        var champs = document.querySelectorAll("input, select");
                        var i;
                        montant();
                        for(i=0;i<champs.length;i++){
                            champs[i].addEventListener("change", montant);
                            //La fonction est appelée dès qu'il y a un changement dans un des champs
                        }
                        window.addEventListener("load", montant);
                    </script>

                    <script type="text/javascript">
                        <?php
                            if(isset($_GET['id'])){
                                echo 'window.addEventListener("load", () => afficheEtapes("'.$_GET['nom'].'", "'.$_GET['id'].'", "1"));';
                                //Le "1" donné en paramètre signifie que la page vient de se recharger et donc il faut appeler remplissageChamps()
                                echo 'setInterval(() => afficheEtapes("'.$_GET['nom'].'","'.$_GET['id'].'", "0"), 5000);';
                                //Appelle la fonction afficheEtapes() chaque 5 secondes pour voir s'il y a eu un ajout, une suppression ou un changement d'étapes
                            }
                            else{
                                echo 'window.addEventListener("load", () => afficheEtapes("'.$_GET['nom'].'", "", "1"));';
                                //Le "1" donné en paramètre signifie que la page vient de se recharger et donc il faut appeler remplissageChamps()
                                echo 'setInterval(() => afficheEtapes("'.$_GET['nom'].'","","0"), 5000);';
                                //Appelle la fonction afficheEtapes() chaque 5 secondes pour voir s'il y a eu un ajout, une suppression ou un changement d'étapes
                            }
                        ?>
                    </script>
                </div>
            </form>
        </div>
    </body>
</html>