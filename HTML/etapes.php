<?php
    require_once '../PHP/accespages.php';
    accesPages("etapes.php","");
    session_start();
?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Acceuil");
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
                        $value=date("Y-m-d");
                        if(isset($_GET['retour'])){
                            $value = $_GET['retour'];
                        }
                        echo '<input type="date" id="retour" name="retour" value="'.$value.'" min="'.date("Y-m-d").'">';
                    ?>
                    <?php
                        if(isset($_GET['message'])){
                            echo '<i class="fa-solid fa-triangle-exclamation erreur"> '.$_GET['message'].'</i>';
                        }
                    ?>
                    <label>Classe du vol :</label>
                    <select name="classe">
                        <option value="economique">Economique</option>
                        <option value="premium">Premium</option>
                        <option value="buisiness">Buisiness</option>
                    </select>
                    <label>Assurance voyage :</label>
                    <select name="assurance">
                        <option value="non">Non</option>
                        <option value="oui">Oui</option>
                    </select>
                    <?php afficheEtapes($_GET['nom']) ?>
                    <input type="submit" id='save' name="save" title="Engistrer les etapes" value="Confirmer" required>
                </div>
            </form>
        </div>
    </body>
</html>