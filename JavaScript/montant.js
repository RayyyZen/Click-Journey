function montant(){
        var classe = {"economique" : 10, "premium" : 20, "buisiness" : 30};
        var hebergement = {"hotel3" : 10, "hotel4" : 20, "hotel5" : 30, "appartement" : 20, "villa" : 30};
        var assurance = {"non" : 0, "oui" : 40};
        var repas = {"aucun" : 0, "petitdejeuner" : 20, "allinclusive" : 50};
        var activites = {"non" : 0, "oui" : 40};

        var depart = document.getElementById("depart");
        var retour = document.getElementById("retour");
        
        var hebergementetape1 = document.getElementById("hebergementetape1");
        var hebergementetape2 = document.getElementById("hebergementetape2");
        var hebergementetape3 = document.getElementById("hebergementetape3");

        var repas1 = document.getElementById("repas1");
        var repas2 = document.getElementById("repas2");
        var repas3 = document.getElementById("repas3");

        var activites1 = document.getElementById("activites1");
        var activites2 = document.getElementById("activites2");
        var activites3 = document.getElementById("activites3");

        var elementclasse = document.getElementById("classe");
        var elementassurance = document.getElementById("assurance");
        var elementpersonnes = document.getElementById("personnes");

        var dateDepart = new Date(depart.value);
        var dateRetour = new Date(retour.value);

        var jours = Math.floor((dateRetour - dateDepart) / (1000*60*60*24));

        var heber = (hebergement[hebergementetape1.value] + hebergement[hebergementetape2.value] + hebergement[hebergementetape3.value])/3;
        var rep = (repas[repas1.value] + repas[repas2.value] + repas[repas3.value])/3;
        var activ = (activites[activites1.value] + activites[activites2.value] + activites[activites3.value])/3;

        var elementprix = document.getElementById("prix");
        var prix = parseInt(elementprix.value);

        var elementduree = document.getElementById("duree");
        var duree = parseInt(elementduree.value);

        prix = prix/duree;
        prix -= hebergement["hotel3"] + classe["economique"];

        var montant = (prix + heber + rep + activ + classe[elementclasse.value] + assurance[elementassurance.value]) * jours * parseInt(elementpersonnes.value);

        var confirmer = document.getElementById("save");
        confirmer.value = "Confirmer " + montant + "€";
    }