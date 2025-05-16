function triVoyages(){
    var element = document.getElementById("trier");
    var elementvoyages = document.getElementById("voyages");
    var i,j,chaine1,chaine2,prix1,prix2,duree1,duree2;
    var voyages = Array.from(elementvoyages.children);
    //la variable "voyages" contient tous les voyages affichés sur la page
    if(element == null || element.value == "trier" || voyages == null){
        return ;
    }

    for(i=0;i<voyages.length;i++){
        for(j=0;j<voyages.length;j++){
            if(i!=j){
                chaine1 = voyages[i].id.split(',');
                //Voir l'id des voyages dans la fonction afficheVoyages() dans le fichier affichage.php
                prix1 = parseInt(chaine1[0]);
                duree1 = parseInt(chaine1[1]);

                chaine2 = voyages[j].id.split(',');
                prix2 = parseInt(chaine2[0]);
                duree2 = parseInt(chaine2[1]);

                if((element.value == "prixcroissant" && prix2 > prix1) || (element.value == "prixdecroissant" && prix2 < prix1) || (element.value == "dureecroissante" && duree2 > duree1) || (element.value == "dureedecroissante" && duree2 < duree1)){
                    var tmp = voyages[i];
                    voyages[i] = voyages[j];
                    voyages[j] = tmp;
                }
            }
        }
    }

    for(i=0;i<voyages.length;i++){
        elementvoyages.appendChild(voyages[i]);
    }
}