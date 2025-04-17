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