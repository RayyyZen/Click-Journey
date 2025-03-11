<?php
$email = $_POST["email"];
$mdp = $_POST["mot_de_passe"];
if(($email == "enzo@gmail.com") && ($mdp == "1234"))
    echo "identification réussi";
else
    header("Location: ../HTML/connexion.html");
?>