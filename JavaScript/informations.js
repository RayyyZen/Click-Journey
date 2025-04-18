function changement(id,idsauvegarder,idrestaurer,idbutton,idp){
    if(document.getElementById("buttoncivilite").hidden || document.getElementById("buttonnom").hidden || document.getElementById("buttonprenom").hidden || document.getElementById("buttonmobile").hidden){
        return ;
    }
    
    var input = document.getElementById(id);
    var sauvegarder = document.getElementById(idsauvegarder);
    var restaurer = document.getElementById(idrestaurer);
    var button = document.getElementById(idbutton);
    var p = document.getElementById(idp);

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
}

function changementCivilite(){
    if(document.getElementById("buttoncivilite").hidden || document.getElementById("buttonnom").hidden || document.getElementById("buttonprenom").hidden || document.getElementById("buttonmobile").hidden){
        return ;
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
        if(button[i].hidden && button[i].id.split('/')[0] == "button"){
            return ;
        }
    }

    var civilite = document.getElementById("civilite/" + numero);
    var nom = document.getElementById("nom/" + numero);
    var prenom = document.getElementById("prenom/" + numero);
    var mobile = document.getElementById("mobile/" + numero);

    civilite.disabled = false;
    nom.disabled = false;
    prenom.disabled = false;
    mobile.disabled = false;

    var etoile = document.getElementById("etoile/" + numero);
    var retrograder = document.getElementById("retrograder/" + numero);
    var promouvoir = document.getElementById("promouvoir/" + numero);
    var bannir = document.getElementById("bannir/" + numero);
    var debannir = document.getElementById("debannir/" + numero);

    //J'utilise ca a la place de hidden = true car hidden marche pas sur les balises a
    if(etoile != null){ etoile.style.display = "none"; }
    if(retrograder != null){ retrograder.style.display = "none"; }
    if(promouvoir != null){ promouvoir.style.display = "none"; }
    if(bannir != null){ bannir.style.display = "none"; }
    if(debannir != null){ debannir.style.display = "none"; }

    var sauvegarder = document.getElementById("sauvegarder/" + numero);
    var restaurer = document.getElementById("restaurer/" + numero);
    var button = document.getElementById("button/" + numero);

    sauvegarder.hidden = false;
    restaurer.hidden = false;
    button.hidden = true;
}

function restaurerAdmin(numero){
    var civilite = document.getElementById("civilite/" + numero);
    var nom = document.getElementById("nom/" + numero);
    var prenom = document.getElementById("prenom/" + numero);
    var mobile = document.getElementById("mobile/" + numero);

    civilite.disabled = true;
    nom.disabled = true;
    prenom.disabled = true;
    mobile.disabled = true;

    civilite.value = civilite.dataset.extra;
    nom.value = nom.dataset.extra;
    prenom.value = prenom.dataset.extra;
    mobile.value = mobile.dataset.extra;

    var etoile = document.getElementById("etoile/" + numero);
    var retrograder = document.getElementById("retrograder/" + numero);
    var promouvoir = document.getElementById("promouvoir/" + numero);
    var bannir = document.getElementById("bannir/" + numero);
    var debannir = document.getElementById("debannir/" + numero);

    if(etoile != null){ etoile.style.display = "inline"; }
    if(retrograder != null){ retrograder.style.display = "inline"; }
    if(promouvoir != null){ promouvoir.style.display = "inline"; }
    if(bannir != null){ bannir.style.display = "inline"; }
    if(debannir != null){ debannir.style.display = "inline"; }

    var sauvegarder = document.getElementById("sauvegarder/" + numero);
    var restaurer = document.getElementById("restaurer/" + numero);
    var button = document.getElementById("button/" + numero);

    sauvegarder.hidden = true;
    restaurer.hidden = true;
    button.hidden = false;

    var erreurnom = document.getElementById("erreurnom");
    var erreurprenom = document.getElementById("erreurprenom");
    var erreurmobile = document.getElementById("erreurmobile");

    if(erreurnom != null){ erreurnom.remove() ; }
    if(erreurprenom != null){ erreurprenom.remove() ; }
    if(erreurmobile != null){ erreurmobile.remove() ; }
}