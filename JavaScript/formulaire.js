function formulaireInscription() {
    var inscription = document.querySelectorAll("input");
    var champs = Array.from(inscription);
    var nouveau = document.createElement("p");
    nouveau.className = "fa-solid fa-triangle-exclamation erreur";
    nouveau.textContent = "";
    var i;

    if (!champs[0].checked && !champs[1].checked) {
        if(document.getElementById("erreurcivilite") == null){
            nouveau.id = "erreurcivilite";
            nouveau.textContent = " Choisissez une civilité";
            var parent = champs[1].parentNode;
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    if (champs[2].value.trim() == "" || /[^a-zA-Z]/.test(champs[2].value)) {
        if(document.getElementById("erreurnom") == null){
            nouveau.id = "erreurnom";
            nouveau.textContent = " Nom invalide (caracteres speciaux exclus)";
            var parent = champs[2].parentNode;
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    if (champs[3].value.trim() == "" || /[^a-zA-Z]/.test(champs[3].value)) {
        if(document.getElementById("erreurprenom") == null){
            nouveau.id = "erreurprenom";
            nouveau.textContent = " Prenom invalide (caracteres speciaux exclus)";
            var parent = champs[3].parentNode;
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    if (champs[4].value.trim() == "" || /[^0-9]/.test(champs[4].value) || champs[4].value.length != 10) {
        if(document.getElementById("erreurmobile") == null){
            nouveau.id = "erreurmobile";
            nouveau.textContent = " Numero invalide (10 chiffres)";
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

        if (champs[6].value.trim() == "" || champs[6].value.includes('"') || champs[6].value.includes("'")) {
            if(document.getElementById("erreurmdp") == null){
                nouveau.id = "erreurmdp";
                var car1 = "'";
                var car2 = '"';
                nouveau.textContent = " Mot de passe invalide (" + car1 + " et " + car2 + " exclus)";
                var parent = champs[6].parentNode;
                parent.parentNode.insertBefore(nouveau, parent.nextSibling);
            }
            return false;
        }

    if (champs[7].value != champs[6].value) {
        if(document.getElementById("erreurcmdp") == null){
            nouveau.id = "erreurcmdp";
            nouveau.textContent = " Les mots de passes ne sont pas identiques";
            var parent = champs[7].parentNode;
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    return true;
}

function formulaireConnexion(){
    var connexion = document.querySelectorAll("input");
    var champs = Array.from(connexion);
    var nouveau = document.createElement("p");
    nouveau.className = "fa-solid fa-triangle-exclamation erreur";
    nouveau.textContent = "";
    var i;

    if (champs[0].value.trim() == "" || /[^a-zA-Z0-9@.]/.test(champs[0].value)) {
        if(document.getElementById("erreurmail") == null){
            nouveau.id = "erreurmail";
            nouveau.textContent = " Mail invalide (caracteres speciaux exclus)";
            var parent = champs[0].parentNode;
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    if (champs[1].value.trim() == "" || champs[1].value.includes('"') || champs[1].value.includes("'")) {
        if(document.getElementById("erreurmdp") == null){
            nouveau.id = "erreurmdp";
            var car1 = "'";
            var car2 = '"';
            nouveau.textContent = " Mot de passe invalide (" + car1 + " et " + car2 + " exclus)";
            var parent = champs[1].parentNode;
            parent.parentNode.insertBefore(nouveau, parent.nextSibling);
        }
        return false;
    }

    return true;
}

function formulaireInformations(){
    var informations = document.querySelectorAll("input");
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

    for(i=0;i<informations.length;i++){
        informations[i].disabled = false;
    }

    return true;
}

function formulaireAdmin(){
    var admin = document.querySelectorAll("input");
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

    var numero = champs[i-1].value;

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

    var civilite = document.getElementById("civilite/" + numero);
    civilite.disabled = true;
    champs[i-1].disabled = true;
    champs[i-1].readonly = true;
    //Pour plus de securite
    champs[i].disabled = true;
    champs[i+1].disabled = true;
    champs[i+2].disabled = true;
    champs[i+3].disabled = true;

    var etoile = document.getElementById("etoile/" + numero);
    var retrograder = document.getElementById("retrograder/" + numero);
    var promouvoir = document.getElementById("promouvoir/" + numero);
    var bannir = document.getElementById("bannir/" + numero);
    var debannir = document.getElementById("debannir/" + numero);

    if(etoile != null){ etoile.style.display = "none"; }
    if(retrograder != null){ retrograder.style.display = "none"; }
    if(promouvoir != null){ promouvoir.style.display = "none"; }
    if(bannir != null){ bannir.style.display = "none"; }
    if(debannir != null){ debannir.style.display = "none"; }

    var sauvegarder = document.getElementById("sauvegarder/" + numero);
    var restaurer = document.getElementById("restaurer/" + numero);
    var button = document.getElementById("button/" + numero);
    var chargement = document.getElementById("chargement/" + numero);

    sauvegarder.hidden = true;
    restaurer.hidden = true;
    button.hidden = true;
    chargement.hidden = false;

    setTimeout(() => {
        champs[i-1].disabled = false;
        champs[i-1].readOnly = true;
        civilite.disabled = false;
        civilite.readOnly = true;
        champs[i].disabled = false;
        champs[i].readOnly = true;
        champs[i+1].disabled = false;
        champs[i+1].readOnly = true;
        champs[i+2].disabled = false;
        champs[i+2].readOnly = true;
        champs[i+3].disabled = false;
        champs[i+3].readOnly = true;
        document.querySelector(".formulaireadmin").submit();
    }, 3000);

    return false;
}

function nbrCaracteres(){
    var chaine;
    for(i=0;i<elements.length;i++){
        var p = elements[i].nextElementSibling;
        if(p != null && (p.className == "pclass" || p.className == "pclass1")){
            chaine = p.textContent.split('/');
            p.textContent = elements[i].value.length + "/" + chaine[1];
        }
    }
}

function montrerMdp(id,idmontrer,idcacher){
    var mdp = document.getElementById(id);
    var montrer = document.getElementById(idmontrer);
    var cacher = document.getElementById(idcacher);

    mdp.type = "text";
    montrer.hidden = true;
    cacher.hidden = false;
}

function cacherMdp(id,idmontrer,idcacher){
    var mdp = document.getElementById(id);
    var montrer = document.getElementById(idmontrer);
    var cacher = document.getElementById(idcacher);

    mdp.type = "password";
    montrer.hidden = false;
    cacher.hidden = true;
}