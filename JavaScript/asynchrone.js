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
}

function soumettre(id,idsauvegarder,idrestaurer,idbutton,idp,idchargement){

    if(formulaireInformations() == false){
        return ;
    }

    var informations = document.querySelectorAll("input");
    for(i=0;i<informations.length;i++){
        informations[i].disabled = true;
    }

    if(window.XMLHttpRequest){
        var xhr = new XMLHttpRequest();
    }
    else{
        var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            if(id == "civilite"){
                input = document.getElementsByName(id);
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
                    input.value = input.dataset.extra;
                    document.getElementById("erreurmailexistant").hidden = false;
                }
                else{
                    input.dataset.extra = input.value;
                }
            }
            
            document.getElementById(idchargement).hidden = true;
            document.getElementById(idsauvegarder).hidden = true;
            document.getElementById(idrestaurer).hidden = true;
            document.getElementById(idbutton).hidden = false;
            if(id != "civilite"){
                document.getElementById(idp).hidden = true;
            }
            var button = document.getElementsByTagName("button");
            button[0].disabled = false;

            var erreurnom = document.getElementById("erreurnom");
            var erreurprenom = document.getElementById("erreurprenom");
            var erreurmobile = document.getElementById("erreurmobile");
            var erreurmail = document.getElementById("erreurmail");

            if(erreurnom != null){ erreurnom.remove() ; }
            if(erreurprenom != null){ erreurprenom.remove() ; }
            if(erreurmobile != null){ erreurmobile.remove() ; }
            if(erreurmail != null){ erreurmail.remove() ; }
        }
        else{
            document.getElementById(idchargement).hidden = false;
            document.getElementById(idsauvegarder).hidden = true;
            document.getElementById(idrestaurer).hidden = true;
            document.getElementById(idbutton).hidden = true;
            document.getElementById("erreurmailexistant").hidden = true;
            if(id != "civilite"){
                document.getElementById(idp).hidden = true;
            }
            var button = document.getElementsByTagName("button");
            button[0].disabled = true;
        }
    }
    xhr.open("POST","../PHP/formulaireinformations.php",true);
    inputs = document.getElementsByTagName("input");
    var i;
    var chaine;
    //input[0] correspond à la barre de recherche, input[1] au bouton Monsieur et input[2] au bouton Madame
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

    return true;
}

function soumettreAdmin(){

    if(formulaireAdmin() == false){
        return ;
    }

    var admin = document.querySelectorAll("input");
    //Pour avoir tous les elements input de la page
    var champs = Array.from(admin);
    var i,j;

    //champs[0] le premier input, correspond a la barre de recherche
    for(i=1;i<champs.length;i++){
        if(champs[i].disabled == false){
            break;
        }
    }

    var numero = champs[i-1].value;
    var chaineCivilite = "civilite_"+numero;
    var civilite = document.getElementById(chaineCivilite);

    for(j=i;j<i+4;j++){
        champs[j].disabled = true;
    }

    civilite.disabled = true;

    if(window.XMLHttpRequest){
        var xhr = new XMLHttpRequest();
    }
    else{
        var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    var etoile = document.getElementById("etoile_" + numero);
    var retrograder = document.getElementById("retrograder_" + numero);
    var promouvoir = document.getElementById("promouvoir_" + numero);
    var bannir = document.getElementById("bannir_" + numero);
    var debannir = document.getElementById("debannir_" + numero);

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            if(xhr.status == 200 && xhr.responseText != "1"){
                console.log(xhr.responseText);
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

            if(etoile != null){ etoile.style.display = "inline"; }
            if(retrograder != null){ retrograder.style.display = "inline"; }
            if(promouvoir != null){ promouvoir.style.display = "inline"; }
            if(bannir != null){ bannir.style.display = "inline"; }
            if(debannir != null){ debannir.style.display = "inline"; }

            var button = document.getElementById("button_" + numero);
            button.hidden = false;
            var chargement = document.getElementById("chargement_" + numero);
            chargement.hidden = true;

            var couleur = document.getElementsByTagName("button");
            couleur[0].disabled = false;
        }
        else{
            if(etoile != null){ etoile.style.display = "none"; }
            if(retrograder != null){ retrograder.style.display = "none"; }
            if(promouvoir != null){ promouvoir.style.display = "none"; }
            if(bannir != null){ bannir.style.display = "none"; }
            if(debannir != null){ debannir.style.display = "none"; }

            var sauvegarder = document.getElementById("sauvegarder_" + numero);
            var restaurer = document.getElementById("restaurer_" + numero);
            var button = document.getElementById("button_" + numero);
            var chargement = document.getElementById("chargement_" + numero);

            sauvegarder.hidden = true;
            restaurer.hidden = true;
            button.hidden = true;
            chargement.hidden = false;

            var couleur = document.getElementsByTagName("button");
            couleur[0].disabled = true;

            document.getElementById("erreurmailexistantAdmin").hidden = true;
            document.getElementById("erreurmailexistantUtilisateur").hidden = true;
            document.getElementById("erreurmailexistantBanni").hidden = true;
        }
    }
    xhr.open("POST","../PHP/formulaireadmin.php",true);
    var chaine = "numero="+numero+"&civilite="+civilite.value;
    for(j=i;j<i+4;j++){
        chaine += "&" + champs[j].name+"="+champs[j].value;
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send(chaine);
}