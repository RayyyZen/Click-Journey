<?php session_start(); ?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Acceuil");
    ?>

    <body>
        <?php 
            afficheHorizontal(1,1);
            afficherPanier();
        ?>

        <div class="section">Qui sommes-nous ?</div>

        <div class="paragraph">
            <p>
                &nbsp&nbsp&nbsp Star Tour est une agence de voyage fondée en 2006, spécialisée dans les lieux cultes de Star Wars.
                Nous vous proposons des séjours uniques sur les sites de tournage emblématiques de la saga la plus célèbre de toute la galaxie.
                <br><br>&nbsp&nbsp&nbsp Choisissez votre destination en fonction du prix, de la durée du voyage et de vos envies, puis laissez-nous nous occuper du reste !
                Grâce à nos experts passionnés, nous vous garantissons une expérience immersive et riche en découvertes.
                <br><br>&nbsp&nbsp&nbsp Nos agents sont à votre écoute tout au long de votre aventure pour vous guider et vous plonger dans l'univers fascinant de Star Wars.
                Sur place, de nombreuses activités vous attendent afin de vous faire vivre des sensations inoubliables.
                <br><br>&nbsp&nbsp&nbsp Que la Force soit avec vous pour ce voyage exceptionnel !
            </p>
            <div class="image-container">
                <img src="../Data/lieustarwars1.jpg" class="image1">
                <img src="../Data/lieustarwars2.jpg" class="image2">
            </div>
        </div>

        <div class="section">Nos destinations</div>

        <div class="paragraph">
            <p>
                &nbsp&nbsp&nbsp Fans de Star Wars et amateurs de paysages grandioses, embarquez pour une aventure intergalactique… sans quitter la Terre ! Des déserts brûlants de Tatooine aux forêts enchantées d'Endor, en passant par les palais majestueux de Naboo, découvrez les lieux réels qui ont donné vie aux mondes les plus iconiques de la saga.
                <br><br>&nbsp&nbsp&nbsp Préparez-vous à une immersion totale dans ces destinations extraordinaires, où chaque paysage vous rappellera une scène culte. Que vous soyez un Jedi en quête d'exploration ou un simple voyageur curieux, ces lieux vous transporteront au cœur de l'univers Star Wars.
            </p>

            <?php affiche3voyages(); ?>

            <a href="destinations.php">Voir toutes nos destinations</a>
        </div>

        <div class="section">Pourquoi nous choisir ?</div>

        <div class="paragraph">
            <p>
                &nbsp&nbsp&nbsp Avec près de 20 ans d'expérience dans l'organisation de voyages à travers plus de 10 pays sur plusieurs continents, nous avons su perfectionner notre art et offrir à nos clients des aventures sur-mesure, inoubliables et pleines de découvertes. 
                <br><br>&nbsp&nbsp&nbsp Grâce à plus de 400 voyages réalisés et un taux de satisfaction supérieur à 95%, nous avons su gagner la confiance de milliers de voyageurs, leur forgeant des souvenirs impérissables.
                <br><br>&nbsp&nbsp&nbsp Notre expertise nous permet de sélectionner des destinations exclusives, alliant authenticité, découverte et immersion totale. Chaque voyage est conçu pour offrir une expérience unique, en vous accompagnant à chaque étape pour que vous puissiez profiter pleinement de votre aventure.     
                <br><br>&nbsp&nbsp&nbsp Avec nous, vous optez pour une organisation sans faille, un service personnalisé et des moments magiques, gravés à jamais. Nous vous offrons bien plus qu'un simple voyage : une véritable expérience de vie, que vous n'oublierez jamais.
            </p>
        </div>

        <div class="section">A propos de nous</div>

        <div class="paragraph">
            <p>
                &nbsp&nbsp&nbsp Star Tour a été fondé par trois passionnés d'un univers mythique : Enzo, Rayane et Hugo. Unis par leur amour commun pour Star Wars, ils ont décidé de partager cette passion en créant des aventures uniques, où l'univers de la saga rencontre des destinations réelles spectaculaires.
                <br><br>&nbsp&nbsp&nbsp Avec une vision commune : offrir à chaque voyageur une expérience forte et marquante, Star Tour est né. Leur objectif ? Permettre à chacun de vivre un voyage qui dépasse l'ordinaire, en explorant les lieux réels qui ont inspiré les mondes de Star Wars, tout en plongeant dans l'univers fascinant de la saga.
                <br><br>&nbsp&nbsp&nbsp Star Tour est plus qu'une simple agence de voyage. C'est une aventure où la passion et la découverte s'entrelacent pour créer des souvenirs impérissables.
            </p>
        </div>
    </body>
</html>