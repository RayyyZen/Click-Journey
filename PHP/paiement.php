<?php
    function payer($montant){
        require_once 'getapikey.php';

        $transaction = uniqid();
        //Génére un numéro de transaction aléatoire
        $vendeur = 'MI-1_F';
        $host = $_SERVER['HTTP_HOST'];
        //Récupère le "localhost:XXXX", le serveur local de l'utilisateur
        $chemin = dirname($_SERVER['SCRIPT_NAME']);
        //Récupère le répertoire du script en cours
        $chemin = rtrim($chemin, '/');
        //Nettoie le chemin au cas ou il y a un double '//'
        $retour = 'http://'.$host.$chemin.'/../PHP/retourpaiement.php?paiement=0';

        $api_key = getAPIKey($vendeur);

        $control = md5($api_key . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $retour . "#");

        echo "<form action='https://www.plateforme-smc.fr/cybank/' method='POST' class='formulaire'>";
        echo "    <input type='hidden' name='transaction' value='".$transaction."'>";
        echo "    <input type='hidden' name='montant' value='".$montant."'>";
        echo "    <input type='hidden' name='vendeur' value='".$vendeur."'>";
        echo "    <input type='hidden' name='retour' value='".$retour."'>";
        echo "    <input type='hidden' name='control' value='".$control."'>";
        echo "    <input type='submit' value='Payer ".$montant."€'>";
        echo "</form>";
    }
?>