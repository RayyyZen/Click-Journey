//Fonction qui cherche la valeur d'un cookie dont le nom est "nomcookie"
function trouverCookie(nomcookie) {
    var cookieDecode = decodeURIComponent(document.cookie);
    //Pour que le cookie soit lisible meme en presence de caracteres speciaux
    var tabcookie = cookieDecode.split(';');
    //Pour isoler chaque cookie dans une case du tableau
    var tab;
    var i;
    var chaine;
    for(i=0;i<tabcookie.length;i++){
        chaine = tabcookie[i].trim();
        //Pour enlever tous les espaces en surplus
        tab = chaine.split('=');
        //Pour isoler le nom du cookie de sa valeur
        if(tab[0] == nomcookie){
            return tab[1];
        }
    }
    return "";
}

function appliquerCouleur(){
    var couleur = trouverCookie("couleur");
    var element = document.getElementById("css");
    //J'associe a chaque couleur bleue une couleur de noir specifique pour pouvoir passer du noir au bleu tout en sachant quelle couleur bleue a ete utilisee pour chaque truc parce qu'ils n ont pas tous le meme bleu
    if (couleur == "bis") {
        element.href = "../CSS/stylebis.css";
    }
    else {
        element.href = "../CSS/style.css";
    }
}

//Fonction appelée lors du clic sur le bouton de changement de couleur
function changerCouleur() {
    var couleur = trouverCookie("couleur");
    var i;
    if (couleur == "bis") {
        document.cookie = "couleur=base; path=/";
    } else {
        document.cookie = "couleur=bis; path=/";
    }
    //Le path=/ c'est pour que le cookie soit accessible sur tout le site et pas seulement à la page ou il est déclenché
    appliquerCouleur();
}

// Appliquer la couleur lors du chargement de la page
window.addEventListener('load', appliquerCouleur);