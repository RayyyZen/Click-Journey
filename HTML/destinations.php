<?php session_start(); ?>

<!DOCTYPE html>

<html>
    <head>
        <title>Destinations | Star Tour</title>
        <meta charset="UTF-8">
        <meta name="description" content="Agence de voyage des lieux de tournage de la saga Star Wars">
        <meta name="author" content="Rayane M., Enzo F., Hugo N.">
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>

    <body>
        <div class="horizontal">
            <div class="nomSite"> <a href="index.php">Star Tour</a> </div>
            <div class="recherche">
                <form action="../PHP/recherche.php" method="post">
                    <input type="text" name="recherche" placeholder="Rechercher..." maxlength="30" required>
                </form>
            </div>
            <?php
                require_once '../PHP/affichage.php';
                afficheIcones();
            ?>
        </div>

        <div class="section">Destinations</div>

        <div class="paragraph">
            <p>
                &nbsp&nbsp&nbsp Fans de Star Wars et amateurs de paysages grandioses, embarquez pour une aventure intergalactique… sans quitter la Terre ! Des déserts brûlants de Tatooine aux forêts enchantées d’Endor, en passant par les palais majestueux de Naboo, découvrez les lieux réels qui ont donné vie aux mondes les plus iconiques de la saga.
                <br><br>&nbsp&nbsp&nbsp Préparez-vous à une immersion totale dans ces destinations extraordinaires, où chaque paysage vous rappellera une scène culte. Que vous soyez un Jedi en quête d’exploration ou un simple voyageur curieux, ces lieux vous transporteront au cœur de l’univers Star Wars.
            </p>

            <div class="group1">
                    <select name="Durée" class="filtrer">
                        <option value="Durée">Durée</option>
                        <option value="4jours">Moins de 4 jours</option>
                        <option value="4jours6">Entre 4 et 6 jours</option>
                        <option value="6jours8">Entre 6 et 8 jours</option>
                        <option value="jours8">Plus de 8 jours</option>
                    </select>

                    <select name="Prix" class="filtrer">
                        <option value="Prix">Prix</option>
                        <option value="euros500">Moins de 500 euros</option>
                        <option value="500euros1000">Entre 500 et 1000 euros</option>
                        <option value="1000euros1500">Entre 1000 et 1500 euros</option>
                        <option value="1500euros2000">Entre 1500 et 2000 euros</option>
                        <option value="euros2000">Plus de 2000 euros</option>
                    </select>

                    <select name="Continent" class="filtrer">
                        <option value="Continent">Continent</option>
                        <option value="Europe">Europe</option>
                        <option value="Afrique">Afrique</option>
                        <option value="Amérique">Amérique</option>
                        <option value="Asie">Asie</option>
                    </select>
            </div>

            <div class="group1">
                    <form action="../PHP/formulairerecherche.php" method="post" class="recherchedestinations">
                        <?php
                            if(isset($_GET['recherche'])){
                                echo '<input type="text" name="recherche" value="'.$_GET['recherche'].'" placeholder="Rechercher..." maxlength="27">';
                            }
                            else{
                                echo '<input type="text" name="recherche" value="" placeholder="Rechercher..." maxlength="27">';
                            }
                        ?>
                        <input type="submit" id='filtrer' name="filtrer" title="Filtrer" value="Filtrer" required>
                    </form>
            </div>

        

            
            
            <div class="group2">
                <ul>
                    <?php
                        if(isset($_GET['recherche'])){
                            afficheVoyages($_GET['recherche']);
                        }
                        else{
                            afficheVoyages('');
                        }
                    ?>
                </ul>
            </div>
        </div>
    </body>
</html>