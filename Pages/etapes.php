<?php
    require_once '../PHP/accespages.php';
    accesPages("etapes.php","");
    session_start();
?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Etapes");
    ?>

    <body>
        <?php afficheHorizontal(1,1); ?>

        <div class="section pageetapes">Etapes et Réservation</div>

        <div class="paragraph pageetapes">
        <?php echo '<form action="../PHP/formulaireetapes.php?nom='.$_GET['nom'].'" method="POST">'; ?>
                <div class="formulaire">
                    <label>Nombre de personnes :</label>
                    <?php
                        $value=1;
                        if(isset($_GET['personnes'])){
                            $value = $_GET['personnes'];
                        }
                        echo '<input type="number" id="personnes" name="personnes" value="'.$value.'" min="1" max="6" required>';
                    ?>
                    <label>Date de départ :</label>
                    <?php
                        $value=date("Y-m-d");
                        if(isset($_GET['depart'])){
                            $value = $_GET['depart'];
                        }
                        echo '<input type="date" id="depart" name="depart" value="'.$value.'" min="'.date("Y-m-d").'">';
                    ?>
                    <label>Date de retour :</label>
                    <?php
                        $value=date('Y-m-d', strtotime('+ 1 days'));
                        if(isset($_GET['retour'])){
                            $value = $_GET['retour'];
                        }
                        echo '<input type="date" id="retour" name="retour" value="'.$value.'" min="'.date("Y-m-d").'">';
                    ?>

                    <script type="text/javascript">
                        var depart = document.getElementById("depart");
                        var retour = document.getElementById("retour");
                        majDateRetour();
                        depart.addEventListener('change', majDateRetour);
                        //On rappelle la fonction qui checke les dates dès qu'il y a un changement de date de depart
                        window.addEventListener('load', majDateRetour);
                        //On rappelle la fonction qui checke les dates dès qu'il y a un rechargement de la page
                    </script>

                    <?php
                        if(isset($_GET['message'])){
                            echo '<i class="fa-solid fa-triangle-exclamation erreur"> '.$_GET['message'].'</i>';
                        }
                    ?>
                    <label>Classe du vol :</label>
                    <select name="classe" id="classe">
                        <option value="economique">Economique</option>
                        <option value="premium">Premium</option>
                        <option value="buisiness">Buisiness</option>
                    </select>
                    <label>Assurance voyage :</label>
                    <select name="assurance" id="assurance">
                        <option value="non">Non</option>
                        <option value="oui">Oui</option>
                    </select>
                    <?php 
                        afficheEtapes($_GET['nom']);
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
                    ?>
                    <input type="submit" id='save' name="save" title="Engistrer les etapes" value="Confirmer" required>

                    <script type="text/javascript">
                        var champs = document.querySelectorAll("input, select");
                        var i;
                        montant();
                        for(i=0;i<champs.length;i++){
                            champs[i].addEventListener("change", montant);
                        }
                        window.addEventListener("load", montant);
                    </script>
                </div>
            </form>
        </div>
    </body>
</html>