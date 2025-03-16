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
                <div class="recherchedestinations">
                    <form action="../PHP/destinations.php" method="post">
                        <input type="text" name="recherche" placeholder="Rechercher..." maxlength="27" required>
                    </form>
                </div>
            </div>

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

            <input type="submit" id='filtrer' name="filtrer" title="Filtrer" value="Filtrer" requiered>
            
            <div class="group2">
                <ul>
                    <li>
                        <div class="endroit">
                            <img src="../Data/destination1.png" class="imagedestination">
                            <p>
                                Tataouine (Tunisie)<br>Durée : 3 jours<br>Prix : 480€<br><br>
                                Plongez dans l'ambiance mythique de Tatooine en explorant 
                                les dunes infinies du désert du Sahara. 
                                À Matmata, découvrez les habitations troglodytes qui ont servi de maison à Luke Skywalker, 
                                tandis qu'à Tozeur, vous pourrez admirer les vastes plaines de sel de Chott el Jerid, 
                                là où la ferme des Lars a été construite. Une expérience hors du temps sous le soleil brûlant du Maghreb !
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="endroit">
                            <img src="../Data/destination2.png" class="imagedestination">
                            <p>
                                Skye (Irlande)<br>Durée : 3 jours<br>Prix : 620€<br><br>
                                Perchée au large des côtes irlandaises, Skellig Michael est un joyau de la nature et du patrimoine. 
                                C'est ici que Luke Skywalker s'est exilé dans la nouvelle trilogie. 
                                L'île est connue pour ses monastères anciens et ses falaises abruptes offrant une vue spectaculaire sur l'Atlantique.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="endroit">
                            <img src="../Data/destination3.png" class="imagedestination">
                            <p>
                                Guilin (Chine)<br>Durée : 5 jours<br>Prix : 980€<br><br>
                                Les paysages verdoyants et montagneux de Kashyyyk, la planète des Wookiees, 
                                sont inspirés par les sublimes formations karstiques de Guilin en Chine. 
                                Ces montagnes émergeant des rivières ont un charme féerique, 
                                parfait pour une immersion totale dans un décor digne de La Revanche des Sith.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="endroit">
                            <img src="../Data/destination4.png" class="imagedestination">
                            <p>
                                Californie (États-Unis)<br>Durée : 7 jours<br>Prix : 1950€<br><br>
                                Bienvenue sur la lune forestière d'Endor ! 
                                Rendez-vous dans le Redwood National Park, où les séquoias géants offrent un décor majestueux aux péripéties des Ewoks. 
                                Ce parc national est une destination parfaite pour les amoureux de la nature et des randonnées inoubliables sous ces arbres millénaires.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="endroit">
                            <img src="../Data/destination5.png" class="imagedestination">
                            <p>
                                Crait (Bolivie)<br>Durée : 7 jours<br>Prix : 1750€<br><br>
                                Direction le Salar de Uyuni, le plus grand désert de sel au monde ! 
                                Ce paysage unique, où le ciel et la terre se confondent lors de la saison des pluies, 
                                a servi d'inspiration pour la planète Crait (Les Derniers Jedi). Un décor surnaturel pour une expérience hors du commun.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="endroit">
                            <img src="../Data/destination6.png" class="imagedestination">
                            <p>
                                Naboo (Italie)<br>Durée : 5 jours<br>Prix : 1400€<br><br>
                                Plongez dans l'élégance de Naboo en visitant le Palais Royal de Caserte, 
                                un chef-d'œuvre baroque qui a servi de décor au palais de la reine Amidala. 
                                Puis, direction le lac de Côme, où vous pourrez revivre la romance entre Anakin et Padmé dans un cadre paradisiaque.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="endroit">
                            <img src="../Data/destination7.png" class="imagedestination">
                            <p>
                                Phang Nga (Thaïlande)<br>Durée : 7 jours<br>Prix : 1800€<br><br>
                                La célèbre baie de Phang Nga, avec ses formations rocheuses calcaires spectaculaires, 
                                a servi d'inspiration pour la planète Kashyyyk (le monde des Wookiees) dans La Revanche des Sith.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="endroit">
                            <img src="../Data/destination8.png" class="imagedestination">
                            <p>
                                Krafiac (Island)<br>Durée : 6 jours<br>Prix : 2100€<br><br>
                                Les scènes enneigées de Starkiller Base dans Le Réveil de la Force ont été tournées en Islande, 
                                notamment près du volcan Krafla et des glaciers de Eyjafjallajökull. 
                                Ce pays offre des paysages extraterrestres avec ses champs de lave, geysers et cascades majestueuses.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="endroit">
                            <img src="../Data/destination9.png" class="imagedestination">
                            <p>
                                Abu Dhabi (Émirats Arabes Unis)<br>Durée : 7 jours<br>Prix : 2550€<br><br>
                                Si vous rêvez d'explorer Jakku, la planète désertique de Rey, direction Abu Dhabi, 
                                où les dunes infinies du désert de Rub al-Khali ont servi de décor au film Le Réveil de la Force. 
                                Cet endroit magique est parfait pour une aventure saharienne inoubliable.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="endroit">
                            <img src="../Data/destination10.png" class="imagedestination">
                            <p>
                                Wadi Rum (Jordanie)<br>Durée : 6 jours<br>Prix : 2100€<br><br>
                                Envie d'explorer un décor digne d'une planète lointaine ? 
                                Direction Wadi Rum, en Jordanie, un désert spectaculaire qui a servi de décor pour la planète Pasaana dans L'Ascension de Skywalker. 
                                Avec ses immenses falaises de grès rouge, ses vallées lunaires et son sable doré, 
                                cet endroit offre une expérience hors du temps, parfaite pour les aventuriers en quête de paysages grandioses.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="endroit">
                            <img src="../Data/destination11.png" class="imagedestination">
                            <p>
                                Atoll de Laamu (Maldives)<br>Durée : 9 jours<br>Prix : 2600€<br><br>
                                Si vous rêvez d'un décor tropical digne d'un film de science-fiction, alors les Maldives sont faites pour vous ! 
                                Cet archipel paradisiaque a servi d'inspiration pour Scarif, 
                                la planète océanique fortifiée dans Rogue One : A Star Wars Story. Avec ses lagons turquoise, 
                                ses plages de sable blanc et ses récifs coralliens, ce lieu est un véritable Eden… bien plus paisible que dans le film !
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="endroit">
                            <img src="../Data/destination12.png" class="imagedestination">
                            <p>
                                Alpes suisses<br>Durée : 6 jours<br>Prix : 1800€<br><br>
                                Avant sa destruction tragique par l'Étoile de la Mort, 
                                la planète Alderaan était un monde paisible aux paysages majestueux. 
                                Si vous souhaitez découvrir une version réelle de ce paradis perdu, 
                                rendez-vous dans les Alpes suisses ! Avec leurs pics enneigés, 
                                leurs vallées verdoyantes et leurs lacs scintillants, 
                                elles rappellent les décors idylliques que l'on aperçoit 
                                brièvement avant la destruction d'Alderaan dans Un Nouvel Espoir.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>