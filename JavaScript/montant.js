function montant(){
    var classe = {"economique" : 10, "premium" : 20, "buisiness" : 30};
    var hebergement = {"hotel3" : 10, "hotel4" : 20, "hotel5" : 30, "appartement" : 20, "villa" : 30};
    var assurance = {"non" : 0, "oui" : 40};
    var repas = {"aucun" : 0, "petitdejeuner" : 20, "allinclusive" : 50};
    var activites = {"non" : 0, "oui" : 40};

    var depart = document.getElementById("depart");
    var retour = document.getElementById("retour");

    var elementclasse = document.getElementById("classe");
    var elementassurance = document.getElementById("assurance");
    var elementpersonnes = document.getElementById("personnes");

    var dateDepart = new Date(depart.value);
    var dateRetour = new Date(retour.value);

    var jours = Math.floor((dateRetour - dateDepart) / (1000*60*60*24));
    var nbrElements=1,heber=0,rep=0,activ=0;

    while(document.getElementById("hebergementetape"+nbrElements) != null){
        heber += hebergement[document.getElementById("hebergementetape"+nbrElements).value];
        rep += repas[document.getElementById("repas"+nbrElements).value];
        activ += activites[document.getElementById("activites"+nbrElements).value];
        nbrElements++;
    }
    nbrElements--;
    if(nbrElements == 0){
        nbrElements = 1;
    }
    heber = heber / nbrElements;
    rep = rep / nbrElements;
    activites = activites / nbrElements;

    var elementprix = document.getElementById("prix");
    prix = parseInt(elementprix.value);

    var elementduree = document.getElementById("duree");
    var duree = parseInt(elementduree.value);

    prix = prix/duree;
    if(document.getElementById("hebergementetape"+nbrElements) != null){
        prix -= hebergement["hotel3"];
    }
    prix -= classe["economique"];

    var montant = (prix + heber + rep + activ + classe[elementclasse.value] + assurance[elementassurance.value]) * jours * parseInt(elementpersonnes.value);
    montant = parseFloat(montant.toFixed(2));
    //Pour ne prendre que les deux premiers chiffres après la virgule

    var confirmer = document.getElementById("save");
    confirmer.value = "Confirmer " + montant + "€";
    var idmontant = document.getElementById("idmontant");
    idmontant.value = montant;
}

function remplissageChamps(){//Cette fonction permet de pré remplir les options si l'utilisateur a cliqué sur le bouton retour depuis la page récapitulative
    var select = document.querySelectorAll("select");
    var i;
    for(i=0;i<select.length;i++){
        if(select[i].dataset.extra){
            select[i].value = select[i].dataset.extra;
        }
    }
    montant();
    //Pour mettre à jour le montant
}

function afficheEtapes(nom,id,value){
    if(window.XMLHttpRequest){
        var xhr = new XMLHttpRequest();
    }
    else{
        var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            if(xhr.status == 200){
                var parent = document.createElement("div");
                parent.innerHTML = xhr.responseText;
                //Le script php qui reçoit la requête, affiche toutes les options en HTML que je stocke dans l'élement "parent"
                var enfants = parent.children;
                var submit = document.getElementById("save");
                var etapes = document.getElementsByName("etape");
                //etapes contient les etapes qui sont actuellement affichés sur la page de réservation
                var i,clone;
                var enfantstaille = enfants.length, etapestaille = etapes.length;
                //Je les stocke dans une variable parce que les deux changent pendant les boucles
                if(enfantstaille <= etapestaille){
                    for(i=0;i<etapestaille;i++){
                        if(i<enfantstaille){
                            etapes[i].querySelector("p").textContent = enfants[i].querySelector("p").textContent;
                            //Au cas où le nom de l'étape a changé
                        }
                        else{
                            etapes[i].remove();
                        }
                    }
                }
                else{
                    for(i=0;i<enfantstaille;i++){
                        if(i<etapestaille){
                            etapes[i].querySelector("p").textContent = enfants[i].querySelector("p").textContent;
                            //Au cas où le nom de l'étape a changé
                        }
                        else{
                            clone = enfants[i].cloneNode(true);
                            //Pour cloner l'étape à ajouter aux étapes déjà affichés
                            document.getElementById("etapesformulaire").insertBefore(clone,submit);
                            //J'insère la nouvelle étape juste avant le bouton de soumission du formulaire
                        }
                    }
                }
                if(value == 1){//Si c'est vrai alors la page vient de se recharger donc il faut remplir le champ en fonction de ce qui a deja ete rempli
                    remplissageChamps();
                }
                var champs = document.querySelectorAll("input, select");
                var i;
                for(i=0;i<champs.length;i++){
                    champs[i].addEventListener("change", montant);
                    //La fonction est appelée dès qu'il y a un changement dans un des champs
                }
                window.addEventListener("load", montant);

                montant();
            }
        }
    }

    xhr.open("POST","../PHP/afficheetapes.php",true);
    var chaine = "nom="+nom+"&id="+id;
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //Afin de pouvoir envoyer les données en Post sous la forme "a=1&b=2...."
    xhr.send(chaine);
}