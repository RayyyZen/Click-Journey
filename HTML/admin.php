<?php
    require_once '../PHP/accespages.php';
    accesPages("admin.php");
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Admin | Star Tour</title>
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
                <input type="text" name="recherche" placeholder="Rechercher..." required>
            </form>
            </div>
            <?php
                require_once '../PHP/affichage.php';
                afficheIcones();
            ?>
        </div>

        <div class="section pageadmin">Page Administrateur</div>

        <div class ="paragraph pageadmin">
            <h3>Voici la liste des utilisateurs VIP</h3>

            <div class="tablediv">
                <table class="tableau" id="vip">
                    <?php
                        require_once '../PHP/affichage.php';
                        statutUtilisateurs("Admin");
                    ?>
                </table>
            </div>
            <div class="options">
                <div class="modifier">Modifier</div>
                <div class="bannir">Bannir</div>
            </div>

            <h3>Voici la liste des utilisateurs</h3>

            <div class="tablediv">
                <table class="tableau" id="utilisateur">
                    <?php
                        require_once '../PHP/affichage.php';
                        statutUtilisateurs("Utilisateur");
                    ?>
                </table>
            </div>
            <div class="options">
                <div class="modifier">Modifier</div>
                <div class="bannir">Bannir</div>
            </div>
            <div class="promouvoir">Promouvoir</div>

            <h3>Voici la liste des utilisateurs BANNIS</h3>

            <div class="tablediv">
                <table class="tableau" id="bannis">
                    <?php
                        require_once '../PHP/affichage.php';
                        statutUtilisateurs("Banni");
                    ?>
                </table>
            </div>
            <div class="options">
                <div class="modifier">Modifier</div>
                <div class="bannir">Débannir</div>
            </div>

        </div>
    </body>
</html>