<?php
    require_once '../PHP/accespages.php';
    accesPages("informations.php");
?>

<!DOCTYPE html>

<html>
    <?php
        require_once '../PHP/affichage.php';
        afficheHead("Informations");
    ?>

    <body>
        <?php afficheHorizontal(1,1); ?>

        <div class="section pageinformations">Informations</div>

        <div class="paragraph paragraphinformations">
            
            <?php afficheCivilite(); ?>
            
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

            <a href="../PHP/suppression.php">Supprimer mon compte</a>
        </div>
    </body>
</html>