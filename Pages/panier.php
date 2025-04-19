<?php
    require_once '../PHP/accespages.php';
    accesPages("panier.php","","");
?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Panier");
    ?>

    <body>
        
        <?php afficheHorizontal(1,1); ?>

        <div class="section pagepanier">Panier</div>

        <div class ="paragraph pagepanier">
            
            <?php
                $json = file_get_contents('../JSON/voyages.json');
                $tabvoyages = json_decode($json, true);
        
                if(!is_array($tabvoyages)){
                    $tabvoyages = [];
                }

                $id = 0;
                $montant = 0;
                echo '<table class="paniertab">';
                while(isset($_SESSION['panier'.$id])){
                    if($_SESSION['panier'.$id] == 1){
                        foreach($tabvoyages as $voyage){
                            if($voyage['titre'] == $_SESSION['titre'.$id]){
                                break;
                            }
                        }
                        echo '<tr>';
                        echo '<td><img src="'.$voyage['image'].'" class="image345"></td>';
                        echo '<td>Personnes : '.$_SESSION['personnes'.$id].'<br>Départ : '.$_SESSION['depart'.$id].'<br>Retour : '.$_SESSION['retour'.$id].'<br>Durée : '.$_SESSION['duree'.$id].' jours<br>Montant : '.$_SESSION['montant'.$id].'€<br></td>';
                        echo '<td><a href="../PHP/supprimerpanier.php?id='.$id.'"><i class="fa-solid fa-square-minus"></i></a></td>';
                        echo '</tr>';
                        $montant += $_SESSION['montant'.$id];
                    }
                    $id++;
                }
                echo '</table>';
                require_once '../PHP/paiement.php';
                payer($montant);
            ?>
        </div>
    </body>
</html>