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
}

function changementAdmin(numero){
    var button = document.querySelectorAll("button");
    var i;
    for(i=0;i<button.length;i++){
        if(button[i].hidden && button[i].id.split('_')[0] == "button"){
            return ;
            //Si un changement est déjà en cours rien ne se passe
        }
    }

    var civilite = document.getElementById("civilite_" + numero);
    var nom = document.getElementById("nom_" + numero);
    var prenom = document.getElementById("prenom_" + numero);
    var email = document.getElementById("email_" + numero);
    var mobile = document.getElementById("mobile_" + numero);

    civilite.disabled = false;
    nom.disabled = false;
    prenom.disabled = false;
    email.disabled = false;
    mobile.disabled = false;

    var etoile = document.getElementById("etoile_" + numero);
    var retrograder = document.getElementById("retrograder_" + numero);
    var promouvoir = document.getElementById("promouvoir_" + numero);
    var bannir = document.getElementById("bannir_" + numero);
    var debannir = document.getElementById("debannir_" + numero);

    //J'utilise ca a la place de hidden = true car hidden marche pas sur les balises a
    if(etoile.dataset.extra == "1"){ etoile.hidden = true; }
    if(retrograder.dataset.extra == "1"){ retrograder.hidden = true; }
    if(promouvoir.dataset.extra == "1"){ promouvoir.hidden = true; }
    if(bannir.dataset.extra == "1"){ bannir.hidden = true; }
    if(debannir.dataset.extra == "1"){ debannir.hidden = true; }

    var sauvegarder = document.getElementById("sauvegarder_" + numero);
    var restaurer = document.getElementById("restaurer_" + numero);
    var button = document.getElementById("button_" + numero);

    sauvegarder.hidden = false;
    restaurer.hidden = false;
    button.hidden = true;

    document.getElementById("erreurmailexistantAdmin").hidden = true;
    document.getElementById("erreurmailexistantUtilisateur").hidden = true;
    document.getElementById("erreurmailexistantBanni").hidden = true;

    var erreurnom = document.getElementById("erreurnom");
    var erreurprenom = document.getElementById("erreurprenom");
    var erreurmobile = document.getElementById("erreurmobile");
    var erreurmail = document.getElementById("erreurmail");

    if(erreurnom != null){ erreurnom.remove() ; }
    if(erreurprenom != null){ erreurprenom.remove() ; }
    if(erreurmobile != null){ erreurmobile.remove() ; }
    if(erreurmail != null){ erreurmail.remove() ; }
}

function restaurerAdmin(numero){
    var civilite = document.getElementById("civilite_" + numero);
    var nom = document.getElementById("nom_" + numero);
    var prenom = document.getElementById("prenom_" + numero);
    var email = document.getElementById("email_" + numero);
    var mobile = document.getElementById("mobile_" + numero);

    civilite.disabled = true;
    nom.disabled = true;
    prenom.disabled = true;
    email.disabled = true;
    mobile.disabled = true;

    civilite.value = civilite.dataset.extra;
    nom.value = nom.dataset.extra;
    prenom.value = prenom.dataset.extra;
    email.value = email.dataset.extra;
    mobile.value = mobile.dataset.extra;

    var etoile = document.getElementById("etoile_" + numero);
    var retrograder = document.getElementById("retrograder_" + numero);
    var promouvoir = document.getElementById("promouvoir_" + numero);
    var bannir = document.getElementById("bannir_" + numero);
    var debannir = document.getElementById("debannir_" + numero);

    if(etoile.dataset.extra == "1"){ etoile.hidden = false; }
    if(retrograder.dataset.extra == "1"){ retrograder.hidden = false; }
    if(promouvoir.dataset.extra == "1"){ promouvoir.hidden = false; }
    if(bannir.dataset.extra == "1"){ bannir.hidden = false; }
    if(debannir.dataset.extra == "1"){ debannir.hidden = false; }

    var sauvegarder = document.getElementById("sauvegarder_" + numero);
    var restaurer = document.getElementById("restaurer_" + numero);
    var button = document.getElementById("button_" + numero);

    sauvegarder.hidden = true;
    restaurer.hidden = true;
    button.hidden = false;

    var erreurnom = document.getElementById("erreurnom");
    var erreurprenom = document.getElementById("erreurprenom");
    var erreurmobile = document.getElementById("erreurmobile");
    var erreurmail = document.getElementById("erreurmail");

    if(erreurnom != null){ erreurnom.remove() ; }
    if(erreurprenom != null){ erreurprenom.remove() ; }
    if(erreurmobile != null){ erreurmobile.remove() ; }
    if(erreurmail != null){ erreurmail.remove() ; }
}