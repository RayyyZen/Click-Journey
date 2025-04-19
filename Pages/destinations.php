<?php session_start(); ?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Destinations");
    ?>

    <body>
        <?php 
            afficheHorizontal(1,1);
            afficherPanier();
        ?>

        <div class="section">Destinations</div>

        <div class="paragraph">
            <p>
                &nbsp&nbsp&nbsp Fans de Star Wars et amateurs de paysages grandioses, embarquez pour une aventure intergalactique… sans quitter la Terre ! Des déserts brûlants de Tatooine aux forêts enchantées d’Endor, en passant par les palais majestueux de Naboo, découvrez les lieux réels qui ont donné vie aux mondes les plus iconiques de la saga.
                <br><br>&nbsp&nbsp&nbsp Préparez-vous à une immersion totale dans ces destinations extraordinaires, où chaque paysage vous rappellera une scène culte. Que vous soyez un Jedi en quête d’exploration ou un simple voyageur curieux, ces lieux vous transporteront au cœur de l’univers Star Wars.
            </p>

            <?php
                if(isset($_GET['duree'])){
                    echo '<input type="hidden" id="dureeGet" value="'.$_GET['duree'].'">';
                }
                if(isset($_GET['prix'])){
                    echo '<input type="hidden" id="prixGet" value="'.$_GET['prix'].'">';
                }
                if(isset($_GET['continent'])){
                    echo '<input type="hidden" id="continentGet" value="'.$_GET['continent'].'">';
                }
                //Ces hidden inputs servent à communiquer leur valeurs au javascript
            ?>

            <form action="../PHP/formulairerecherche.php" method="post" class="recherchedestinations">
                <div class="group3">
                    <div class="group1">
                        <select name="duree" id="duree" class="filtrer">
                            <option value="duree">Durée</option>
                            <option value="4jours">Moins de 4 jours</option>
                            <option value="4jours6">Entre 4 et 6 jours</option>
                            <option value="6jours8">Entre 6 et 8 jours</option>
                            <option value="jours8">Plus de 8 jours</option>
                        </select>

                        <select name="prix" id="prix" class="filtrer">
                            <option value="prix">Prix</option>
                            <option value="euros500">Moins de 500 euros</option>
                            <option value="500euros1000">Entre 500 et 1000 euros</option>
                            <option value="1000euros1500">Entre 1000 et 1500 euros</option>
                            <option value="1500euros2000">Entre 1500 et 2000 euros</option>
                            <option value="euros2000">Plus de 2000 euros</option>
                        </select>

                        <select name="continent" id="continent" class="filtrer">
                            <option value="continent">Continent</option>
                            <option value="Europe">Europe</option>
                            <option value="Afrique">Afrique</option>
                            <option value="Amérique">Amérique</option>
                            <option value="Asie">Asie</option>
                        </select>

                        <button type="button" name="annuler" class="annuler" onclick="annulerFiltre()"><i class="fa-solid fa-ban"></i></button>
                    </div>

                    <div class="group1">

                        <?php
                            if(isset($_GET['recherche'])){
                                echo '<input type="text" name="recherche" value="'.$_GET['recherche'].'" placeholder="Rechercher..." maxlength="27">';
                            }
                            else{
                                echo '<input type="text" name="recherche" value="" placeholder="Rechercher..." maxlength="27">';
                            }
                        ?>
                        <input type="submit" id='filtrer' name="filtrer" title="Filtrer" value="Filtrer" required>
                    </div>

                    
                </div>
            </form>

            <div class="group4">
                <select name="trier" id="trier" class="filtrer">
                    <option value="trier">Trier</option>
                    <option value="prixcroissant">Prix croissant</option>
                    <option value="prixdecroissant">Prix décroissant</option>
                    <option value="dureecroissante">Durée croissante</option>
                    <option value="dureedecroissante">Durée décroissante</option>
                </select>
            </div>

            <script type="text/javascript">
                if(document.getElementById("dureeGet") != null){
                    document.getElementById("duree").value = document.getElementById("dureeGet").value;
                }
                if(document.getElementById("prixGet") != null){
                    document.getElementById("prix").value = document.getElementById("prixGet").value;
                }
                if(document.getElementById("continentGet") != null){
                    document.getElementById("continent").value = document.getElementById("continentGet").value;
                }
            </script>

            <div class="group2">
                <ul id="voyages">
                    <?php
                        if(isset($_GET['recherche'])){
                            afficheVoyages($_GET['recherche'],$_GET['duree'],$_GET['prix'],$_GET['continent']);
                        }
                        else{
                            afficheVoyages('','','','');
                        }
                    ?>
                </ul>
            </div>

            <script type="text/javascript">
                triVoyages();
                var element = document.getElementById("trier");
                element.addEventListener('change', triVoyages);
                window.addEventListener('load', triVoyages);
            </script>

    </body>
</html>