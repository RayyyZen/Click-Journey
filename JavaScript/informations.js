function boutonsModifier(id,value){
    var boutonsModifier = document.querySelectorAll("button");
    var i;
    for(i=1;i<boutonsModifier.length;i++){//boutonsModifier[0] correspond au bouton de changement de thème de couleurs
        if(boutonsModifier[i].id != "chargement"+id && boutonsModifier[i].id != "sauvegarder"+id && boutonsModifier[i].id != "restaurer"+id){
            boutonsModifier[i].disabled = value;
            //Désactiver ou activer tous les boutons de changement
        }
    }
}

function changement(id,idsauvegarder,idrestaurer,idbutton,idp){
    if(document.getElementById("buttoncivilite").hidden || document.getElementById("buttonnom").hidden || document.getElementById("buttonprenom").hidden || document.getElementById("buttonemail").hidden || document.getElementById("buttonmobile").hidden){
        return ;
        //Si un changement est déjà en cours rien ne se passe
    }
    
    var input = document.getElementById(id);
    var sauvegarder = document.getElementById(idsauvegarder);
    var restaurer = document.getElementById(idrestaurer);
    var button = document.getElementById(idbutton);
    var p = document.getElementById(idp);
    document.getElementById("erreurmailexistant").hidden = true;

    input.disabled = false;
    sauvegarder.hidden = false;
    restaurer.hidden = false;
    button.hidden = true;
    p.hidden = false;

    boutonsModifier(id,true);
}

function restaurer(id,idsauvegarder,idrestaurer,idbutton,idp){
    var input = document.getElementById(id);
    var sauvegarder = document.getElementById(idsauvegarder);
    var restaurer = document.getElementById(idrestaurer);
    var button = document.getElementById(idbutton);
    var p = document.getElementById(idp);

    input.value = input.dataset.extra;
    input.disabled = true;
    sauvegarder.hidden = true;
    restaurer.hidden = true;
    button.hidden = false;
    p.hidden = true;

    var erreurnom = document.getElementById("erreurnom");
    var erreurprenom = document.getElementById("erreurprenom");
    var erreurmobile = document.getElementById("erreurmobile");
    var erreurmail = document.getElementById("erreurmail");

    if(erreurnom != null){ erreurnom.remove() ; }
    if(erreurprenom != null){ erreurprenom.remove() ; }
    if(erreurmobile != null){ erreurmobile.remove() ; }
    if(erreurmail != null){ erreurmail.remove() ; }

    boutonsModifier(id,false);
}

function changementCivilite(){
    if(document.getElementById("buttoncivilite").hidden || document.getElementById("buttonnom").hidden || document.getElementById("buttonprenom").hidden || document.getElementById("buttonmobile").hidden){
        return ;
        //Si un changement est déjà en cours rien ne se passe
    }
    
    var inputMonsieur = document.getElementById("monsieur");
    var inputMadame = document.getElementById("madame");
    var sauvegarder = document.getElementById("sauvegardercivilite");
    var restaurer = document.getElementById("restaurercivilite");
    var button = document.getElementById("buttoncivilite");

    inputMonsieur.disabled = false;
    inputMadame.disabled = false;
    sauvegarder.hidden = false;
    restaurer.hidden = false;
    button.hidden = true;

    boutonsModifier("civilite",true);
}

function restaurerCivilite(){
    var inputMonsieur = document.getElementById("monsieur");
    var inputMadame = document.getElementById("madame");
    var sauvegarder = document.getElementById("sauvegardercivilite");
    var restaurer = document.getElementById("restaurercivilite");
    var button = document.getElementById("buttoncivilite");

    if(inputMonsieur.dataset.extra == "Monsieur"){
        inputMonsieur.checked = true;
        inputMadame.checked = false;
    }
    else{
        inputMonsieur.checked = false;
        inputMadame.checked = true;
    }

    inputMonsieur.disabled = true;
    inputMadame.disabled = true;
    sauvegarder.hidden = true;
    restaurer.hidden = true;
    button.hidden = false;

    boutonsModifier("civilite",false);
}

function boutonsChangement(numero,value1,value2){
    var civilite = document.getElementById("civilite_" + numero);
    var nom = document.getElementById("nom_" + numero);
    var prenom = document.getElementById("prenom_" + numero);
    var email = document.getElementById("email_" + numero);
    var mobile = document.getElementById("mobile_" + numero);

    civilite.disabled = value2;
    nom.disabled = value2;
    prenom.disabled = value2;
    email.disabled = value2;
    mobile.disabled = value2;

    var etoile = document.getElementById("etoile_" + numero);
    var retrograder = document.getElementById("retrograder_" + numero);
    var promouvoir = document.getElementById("promouvoir_" + numero);
    var bannir = document.getElementById("bannir_" + numero);
    var debannir = document.getElementById("debannir_" + numero);

    //J'utilise ca a la place de hidden = true car hidden marche pas sur les balises a
    if(etoile.dataset.extra == "1"){ etoile.hidden = value1; }
    if(retrograder.dataset.extra == "1"){ retrograder.hidden = value1; }
    if(promouvoir.dataset.extra == "1"){ promouvoir.hidden = value1; }
    if(bannir.dataset.extra == "1"){ bannir.hidden = value1; }
    if(debannir.dataset.extra == "1"){ debannir.hidden = value1; }

    var sauvegarder = document.getElementById("sauvegarder_" + numero);
    var restaurer = document.getElementById("restaurer_" + numero);
    var button = document.getElementById("button_" + numero);

    sauvegarder.hidden = value2;
    restaurer.hidden = value2;
    button.hidden = value1;

    var erreurnom = document.getElementById("erreurnom");
    var erreurprenom = document.getElementById("erreurprenom");
    var erreurmobile = document.getElementById("erreurmobile");
    var erreurmail = document.getElementById("erreurmail");

    if(erreurnom != null){ erreurnom.remove() ; }
    if(erreurprenom != null){ erreurprenom.remove() ; }
    if(erreurmobile != null){ erreurmobile.remove() ; }
    if(erreurmail != null){ erreurmail.remove() ; }
}

function changementAdmin(numero){
    var button = document.querySelectorAll("button");
    var i,verif=1;
    for(i=0;i<button.length;i++){
        if(button[i].hidden && button[i].id.split('_')[0] == "button"){
            verif = 0;
        }
        if(button[i].id.split('_')[1] != numero){
            button[i].disabled = true;
        }
        //Pour griser tous les autres boutons le temps de faire les modifications
    }

    if(verif == 0){
        //Si un changement est déjà en cours rien ne se passe
        return;
    }

    boutonsChangement(numero,true,false);

    document.getElementById("erreurmailexistantAdmin").hidden = true;
    document.getElementById("erreurmailexistantUtilisateur").hidden = true;
    document.getElementById("erreurmailexistantBanni").hidden = true;
}

function restaurerAdmin(numero){
    var button = document.querySelectorAll("button");
    var i;
    for(i=0;i<button.length;i++){
        if(button[i].id.split('_')[1] != numero){
            button[i].disabled = false;
        }
    }

    var civilite = document.getElementById("civilite_" + numero);
    var nom = document.getElementById("nom_" + numero);
    var prenom = document.getElementById("prenom_" + numero);
    var email = document.getElementById("email_" + numero);
    var mobile = document.getElementById("mobile_" + numero);

    civilite.value = civilite.dataset.extra;
    nom.value = nom.dataset.extra;
    prenom.value = prenom.dataset.extra;
    email.value = email.dataset.extra;
    mobile.value = mobile.dataset.extra;

    boutonsChangement(numero,false,true);
}