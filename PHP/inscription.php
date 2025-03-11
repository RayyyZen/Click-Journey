<?php
$nom = $_POST["nom_de_famille"];
$prenom = $_POST["prenom"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$mot_de_passe = $_POST["mot_de_passe"];
$c_mot_de_passe = $_POST["c_mot_de_passe"];

if($mot_de_passe != $c_mot_de_passe)
    header("Location : ../HTML/inscription.html");
?>