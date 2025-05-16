function formulaireInformations(){
    var informations = document.querySelectorAll("input");
    //Pour avoir tous les elements input de la page
    var champs = Array.from(informations);
    var nouveau = document.createElement("p");
    nouveau.className = "fa-solid fa-triangle-exclamation erreur";
    nouveau.textContent = "";
    var i;

    //champs[0] le premier input, correspond a la barre de recherche
    if (!champs[1].checked && !champs[2].checked) {
        if(document.getElementById("erreurcivilite") == null){
            nouveau.id = "erreurcivilite";
            nouveau.textContent = " Choisissez une civilité";
            var parent = champs[2].parentNode;
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    if (champs[3].value.trim() == "" || /[^a-zA-Z]/.test(champs[3].value)) {
        if(document.getElementById("erreurnom") == null){
            nouveau.id = "erreurnom";
            nouveau.textContent = " Nom invalide (caracteres speciaux exclus)";
            var parent = champs[3].parentNode;
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    if (champs[4].value.trim() == "" || /[^a-zA-Z]/.test(champs[4].value)) {
        if(document.getElementById("erreurprenom") == null){
            nouveau.id = "erreurprenom";
            nouveau.textContent = " Prenom invalide (caracteres speciaux exclus)";
            var parent = champs[4].parentNode;
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    if (champs[5].value.trim() == "" || /[^a-zA-Z0-9@.]/.test(champs[5].value)) {
        if(document.getElementById("erreurmail") == null){
            nouveau.id = "erreurmail";
            nouveau.textContent = " Mail invalide (caracteres speciaux exclus)";
            var parent = champs[5].parentNode;
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    if (champs[6].value.trim() == "" || /[^0-9]/.test(champs[6].value) || champs[6].value.length != 10) {
        if(document.getElementById("erreurmobile") == null){
            nouveau.id = "erreurmobile";
            nouveau.textContent = " Numero invalide (10 chiffres)";
            var parent = champs[6].parentNode;
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    return true;
    //Ca veut dire que le formulaire est bon à envoyer
}

function boutonsInformations(id,idbutton,idchargement,valeur1,valeur2){
    //Les valeurs 1 et 2 correspondent à des booléens qui en fonction de l'état de la requete permettent d'afficher ou cacher des boutons
    document.getElementById(idchargement).hidden = valeur1;
    document.getElementById(idbutton).hidden = valeur2;

    var boutons = document.getElementsByTagName("button");
    var i;
    for(i=0;i<boutons.length;i++){//Pour i=0, bouton[i] est associé au bouton de changement de thème de couleurs
        if(boutons[i].id != "chargement"+id){
            boutons[i].disabled = valeur2;
            //Pour désactiver tous les boutons à part celui de chargement
        }
    }
}

function soumettre(id,idsauvegarder,idrestaurer,idbutton,idp,idchargement){

    if(formulaireInformations() == false){
        //Pour checker si le formulaire est bon
        return ;
    }

    var input;
    var informations = document.querySelectorAll("input");
    for(i=0;i<informations.length;i++){
        informations[i].disabled = true;
        //Pour désactiver tous les champs de la page d'informations lors de l'envoi de la requête
    }

    if(window.XMLHttpRequest){
        var xhr = new XMLHttpRequest();
    }
    else{
        var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhr.onreadystatechange = function(){
        document.getElementById(idsauvegarder).hidden = true;
        document.getElementById(idrestaurer).hidden = true;
        if(id != "civilite"){
            document.getElementById(idp).hidden = true;
            //Comme civilite n'est pas un champ de texte il n y a pas de nombre de caractères à compter
        }

        if(xhr.readyState == 4){
            if(id == "civilite"){//Il y a distinction entre le cas de civilite et les autres cas car civilite est un input radio contrairement aux autres
                input = document.getElementsByName(id);
                //input est un tableau d'inputs qui représente l'input de "Monsieur" pour input[0] et l'input de "Madame" pour input[1]
                //Le dataset.extra contient la valeur de l'input
                if((xhr.status != 200 && input[0].dataset.extra == "Monsieur") || (xhr.status == 200 && input[0].checked == true)){
                    input[0].checked = true;
                    input[0].dataset.extra = "Monsieur";
                    input[1].checked = false;
                    input[1].dataset.extra = "Monsieur";
                }
                else{
                    input[0].checked = false;
                    input[0].dataset.extra = "Madame";
                    input[1].checked = true;
                    input[1].dataset.extra = "Madame";
                }
            }
            else{
                input = document.getElementById(id);
                if(xhr.status != 200){
                    input.value = input.dataset.extra;
                }
                else if(xhr.status == 200 && xhr.responseText == "0"){
                    //Ca veut dire que le nouveau mail modifié existe déjà pour un autre compte
                    input.value = input.dataset.extra;
                    document.getElementById("erreurmailexistant").hidden = false;
                    //Pour afficher le message d'erreur
                }
                else{
                    input.dataset.extra = input.value;
                }
            }
            
            boutonsInformations(id,idbutton,idchargement,true,false);

            var erreurnom = document.getElementById("erreurnom");
            var erreurprenom = document.getElementById("erreurprenom");
            var erreurmobile = document.getElementById("erreurmobile");
            var erreurmail = document.getElementById("erreurmail");

            if(erreurnom != null){ erreurnom.remove() ; }
            if(erreurprenom != null){ erreurprenom.remove() ; }
            if(erreurmobile != null){ erreurmobile.remove() ; }
            if(erreurmail != null){ erreurmail.remove() ; }
            //Pour supprimer les anciens messages d'erreurs s'ils existent
        }
        else{
            boutonsInformations(id,idbutton,idchargement,false,true);
            document.getElementById("erreurmailexistant").hidden = true;
            //Pour cacher le message "Mail déjà existant" s'il est affiché
        }
    }

    xhr.open("POST","../PHP/formulaireinformations.php",true);
    var inputs = document.getElementsByTagName("input");
    var i,chaine;
    //inputs[0] correspond à la barre de recherche, inputs[1] à l'input "Monsieur" et inputs[2] à l'input "Madame"
    if(inputs[1].checked){
        chaine = "civilite=Monsieur";
    }
    else{
        chaine = "civilite=Madame";
    }
    for(i=3;i<inputs.length;i++){
        chaine += "&" + inputs[i].name+"="+inputs[i].value;
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Afin de pouvoir envoyer les données en Post sous la forme "a=1&b=2...."
    xhr.send(chaine);
}

function formulaireAdmin(){
    var admin = document.querySelectorAll("input");
    //Pour avoir tous les elements input de la page
    var champs = Array.from(admin);
    var nouveau = document.createElement("p");
    nouveau.className = "fa-solid fa-triangle-exclamation erreur1";
    nouveau.textContent = "";
    var i;

    //champs[0] le premier input, correspond a la barre de recherche
    for(i=1;i<champs.length;i++){
        if(champs[i].disabled == false){
            break;
        }
    }
    //Comme ca je recupere le input qui contient le nom de la personne dont je suis entrain de changer les champs

    if (champs[i].value.trim() == "" || /[^a-zA-Z]/.test(champs[i].value)) {
        if(document.getElementById("erreurnom") == null){
            nouveau.id = "erreurnom";
            nouveau.textContent = " Nom invalide (caracteres speciaux exclus)";
            var parent = champs[i].closest("div");
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    if (champs[i+1].value.trim() == "" || /[^a-zA-Z]/.test(champs[i+1].value)) {
        if(document.getElementById("erreurprenom") == null){
            nouveau.id = "erreurprenom";
            nouveau.textContent = " Prenom invalide (caracteres speciaux exclus)";
            var parent = champs[i+1].closest("div");
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    if (champs[i+2].value.trim() == "" || /[^a-zA-Z0-9@.]/.test(champs[i+2].value)) {
        if(document.getElementById("erreurmail") == null){
            nouveau.id = "erreurmail";
            nouveau.textContent = " Mail invalide (caracteres speciaux exclus)";
            var parent = champs[i+2].closest("div");
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    if (champs[i+3].value.trim() == "" || /[^0-9]/.test(champs[i+3].value) || champs[i+3].value.length != 10) {
        if(document.getElementById("erreurmobile") == null){
            nouveau.id = "erreurmobile";
            nouveau.textContent = " Numero invalide (10 chiffres)";
            var parent = champs[i+3].closest("div");
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    return true;
    //Ca veut dire que le formulaire est bon à envoyer
}

function boutonsAdmin(numero,valeur1,valeur2){
    //Affiche ou cache des boutons en fonction de l'état de la requete
    var etoile = document.getElementById("etoile_" + numero);
    var retrograder = document.getElementById("retrograder_" + numero);
    var promouvoir = document.getElementById("promouvoir_" + numero);
    var bannir = document.getElementById("bannir_" + numero);
    var debannir = document.getElementById("debannir_" + numero);

    if(etoile.dataset.extra == "1"){ etoile.hidden = valeur2; }
    if(retrograder.dataset.extra == "1"){ retrograder.hidden = valeur2; }
    if(promouvoir.dataset.extra == "1"){ promouvoir.hidden = valeur2; }
    if(bannir.dataset.extra == "1"){ bannir.hidden = valeur2; }
    if(debannir.dataset.extra == "1"){ debannir.hidden = valeur2; }
    //Si un bouton a pour valeur de dataset.extra la valeur "1" cela veut dire que le bouton est censé avoir un effet sur l'utilisateur par exemple pour un utilisateur déjà banni il n'aura pas de bouton bannir car il l'est déjà

    var button = document.getElementById("button_" + numero);
    button.hidden = valeur2;
    var chargement = document.getElementById("chargement_" + numero);
    chargement.hidden = valeur1;

    var boutons = document.getElementsByTagName("button");
    var i;
    for(i=0;i<boutons.length;i++){//Pour i=0 boutons[i] correspond au bouton de changement de thème de couleurs
        if(boutons[i].id != "chargement_"+numero){
            boutons[i].disabled = valeur2;
        }
    }
}

function soumettreAdmin(){

    if(formulaireAdmin() == false){
        //Pour checker si le formulaire est bon
        return ;
    }

    var admin = document.querySelectorAll("input");
    //Pour avoir tous les elements input de la page
    var champs = Array.from(admin);
    var i,j;

    //champs[0] le premier input, correspond a la barre de recherche
    for(i=1;i<champs.length;i++){
        if(champs[i].disabled == false){
            //Pour trouver quelle ligne des tableaux d'utilisateurs (quel id) a été modifié
            break;
        }
    }

    var numero = champs[i-1].value;//C'est l'id de l'utilisateurs dont les informations ont été modifiées
    var civilite = document.getElementById("civilite_"+numero);//Parce que l'élément civilité est un select pas un input

    for(j=i;j<i+4;j++){
        champs[j].disabled = true;
        //Pour désactiver tous les inputs
    }
    civilite.disabled = true;

    if(window.XMLHttpRequest){
        var xhr = new XMLHttpRequest();
    }
    else{
        var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            if(xhr.status == 200 && xhr.responseText != "1"){
                //Si on arrive dans cette condition c'est que le mail modifié existe déjà pour un autre compte
                //champs[i+2] correspond au champ du mail
                champs[i+2].value = champs[i+2].dataset.extra;
                document.getElementById("erreurmailexistant"+xhr.responseText).hidden = false;
                
            }
            else if(xhr.status == 200){
                for(j=i;j<i+4;j++){
                    champs[j].dataset.extra = champs[j].value;
                }
                civilite.dataset.extra = civilite.value;
            }
            else{
                for(j=i;j<i+4;j++){
                    champs[j].value = champs[j].dataset.extra;
                }
                civilite.value = civilite.dataset.extra;
            }

            boutonsAdmin(numero,true,false);
        }
        else{
            var sauvegarder = document.getElementById("sauvegarder_" + numero);
            sauvegarder.hidden = true;
            var restaurer = document.getElementById("restaurer_" + numero);
            restaurer.hidden = true;

            document.getElementById("erreurmailexistantAdmin").hidden = true;
            document.getElementById("erreurmailexistantUtilisateur").hidden = true;
            document.getElementById("erreurmailexistantBanni").hidden = true;

            boutonsAdmin(numero,false,true);
        }
    }

    xhr.open("POST","../PHP/formulaireadmin.php",true);
    var chaine = "numero="+numero+"&civilite="+civilite.value;
    for(j=i;j<i+4;j++){
        chaine += "&" + champs[j].name+"="+champs[j].value;
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Afin de pouvoir envoyer les données en Post sous la forme "a=1&b=2...."
    xhr.send(chaine);
}

function changementStatut(action,numero){
    var boutons = document.querySelectorAll("button");
    var i;
    for(i=0;i<boutons.length;i++){
        if(boutons[i].hidden && boutons[i].id.split('_')[0] == "button"){
            return ;
            //Si un changement est déjà en cours rien ne se passe
        }
    }

    var bouton = document.getElementById(action+"_"+numero).parentNode;
    var ligne = bouton.parentNode;//C'est la ligne qui contient les informations de l'utilisateur qui va changer de tableau en fonction de l'action
    
    if(window.XMLHttpRequest){
        var xhr = new XMLHttpRequest();
    }
    else{
        var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    var retrograder = document.getElementById("retrograder_" + numero);
    var promouvoir = document.getElementById("promouvoir_" + numero);
    var bannir = document.getElementById("bannir_" + numero);
    var debannir = document.getElementById("debannir_" + numero);
    var t;//Cette variable correspond au tableau dans lequel l'utilisateur va être ajouté en fonction du bouton cliqué
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            if(xhr.status == 200){
                if(action == "retrograder"){
                    t = "Utilisateur";
                    promouvoir.hidden = false;
                    promouvoir.dataset.extra = "1";
                }
                else if(action == "promouvoir"){
                    t = "Admin";
                    retrograder.hidden = false;
                    retrograder.dataset.extra = "1";
                }
                else if(action == "bannir"){
                    t = "Banni";
                    debannir.hidden = false;
                    debannir.dataset.extra = "1";
                    promouvoir.hidden = true;
                    promouvoir.dataset.extra = "0";
                    retrograder.hidden = true;
                    retrograder.dataset.extra = "0";
                }
                else if(action == "debannir"){
                    t = "Utilisateur";
                    bannir.hidden = false;
                    bannir.dataset.extra = "1";
                    promouvoir.hidden = false;
                    promouvoir.dataset.extra = "1";
                }
                document.getElementById(action+"_"+numero).hidden = true;
                document.getElementById(action+"_"+numero).dataset.extra = "0";

                var l = document.getElementById("ligne_"+t);
                //Pour avoir l'element qui correspond à la première ligne (th) du tableau dans lequel on va mettre l'utilisateur
                var parent = l.parentNode;
                var lignes = parent.children;
                var i,verif=0;
                for(i=1;i<lignes.length;i++){ //Le cas i=0 représente l'entête du tableau avec l'intitulé de chaque colonne
                    if(parseInt(lignes[i].dataset.extra) > parseInt(numero)){//dataset.extra contient le numéro d'id de chaque utilisateur sur la ligne
                        parent.insertBefore(ligne,lignes[i]);
                        verif = 1;
                        break;
                    }
                }
                if(verif == 0){//Alors il faudra l'ajouter à la fin car son numéro d'id est le plus grand
                    parent.appendChild(ligne);
                }
                //Pour rajouter le nouvel élément mais dans l'ordre croissant des numéros (ids)
            }

            boutonsAdmin(numero,true,false);
        }
        else{
            var sauvegarder = document.getElementById("sauvegarder_" + numero);
            sauvegarder.hidden = true;
            var restaurer = document.getElementById("restaurer_" + numero);
            restaurer.hidden = true;

            document.getElementById("erreurmailexistantAdmin").hidden = true;
            document.getElementById("erreurmailexistantUtilisateur").hidden = true;
            document.getElementById("erreurmailexistantBanni").hidden = true;

            boutonsAdmin(numero,false,true);
        }
    }
    
    xhr.open("POST","../PHP/boutons.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Afin de pouvoir envoyer les données en Post sous la forme "a=1&b=2...."
    xhr.send("action="+action+"&numero="+numero);
}