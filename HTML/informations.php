<?php
    require_once '../PHP/accespages.php';
    accesPages("informations.php");
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Informations | Star Tour</title>
        <meta charset="UTF-8">
        <meta name="description" content="Agence de voyage des lieux de tournage de la saga Star Wars">
        <meta name="author" content="Rayane M., Enzo F., Hugo N.">
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>

    <body>
        <div class="horizontal">
            <div class="nomSite"> <a href="index.php">Star Tour</a> </div>
            <?php
                require_once '../PHP/affichage.php';
                afficheIcones();
            ?>
        </div>

        <div class="section pageinformations">Informations</div>

        <div class="paragraph paragraphinformations">
            
            <?php
                require_once '../PHP/affichage.php';
                afficheCivilite();
            ?>
            
            <label>Nom :</label>
            <div class="group">
                <?php echo '<input type="text" id="nom" value='.$_SESSION['nom'].' disabled>'; ?>
                <i class="fa-solid fa-pen-nib"></i>
            </div>

            <label>Prénom :</label>
            <div class="group">
                <?php echo '<input type="text" id="prenom" value='.$_SESSION['prenom'].' disabled>'; ?>
                <i class="fa-solid fa-pen-nib"></i>
            </div>

            <label>Adresse mail :</label>
            <div class="group">
                <?php echo '<input type="text" id="mail" value='.$_SESSION['email'].' disabled>'; ?>
                <i class="fa-solid fa-pen-nib"></i>
            </div>

            <label>Téléphone :</label>
            <div class="group">
                <?php echo '<input type="text" id="telephone" value='.$_SESSION['mobile'].' disabled>'; ?>
                <i class="fa-solid fa-pen-nib"></i>
            </div>

        </div>
    </body>
</html>