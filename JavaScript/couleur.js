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

function appliquerCouleur() {
    //console.log(document.cookie);
    var couleur = trouverCookie("couleur");
    var elements = document.querySelectorAll('body *');
    //Pour prendre touts les elements a l'interieur de la balise body
    var body = document.getElementsByTagName("body");
    var i;
    var background;
    var color;

    //J'associe a chaque couleur bleue une couleur de noir specifique pour pouvoir passer du noir au bleu tout en sachant quelle couleur bleue a ete utilisee pour chaque truc parce qu'ils n ont pas tous le meme bleu
    if (couleur == "bis") {
        body[0].style.backgroundImage = 'url("../Data/espace.jpg")';
        for (i=0;i<elements.length;i++) {
            background = window.getComputedStyle(elements[i]).backgroundColor;
            //Pour avoir la couleur de fond de l'element
            color = window.getComputedStyle(elements[i]).color;
            //Pour avoir la couleur de l'element
            switch (background) {
                case "rgb(55, 194, 225)":
                    elements[i].style.backgroundColor = "rgb(255, 255, 255)";
                    break;
                case "rgb(48, 149, 203)":
                    elements[i].style.backgroundColor = "rgb(255, 255, 254)";
                    break;
                case "rgb(107, 180, 214)":
                    elements[i].style.backgroundColor = "rgb(0, 0, 2)";
                    break;
                case "rgb(230, 221, 198)":
                    elements[i].style.backgroundColor = "rgb(255, 255, 253)";
                    break;
                case "rgb(48, 149, 203)":
                    elements[i].style.color = "rgb(0, 0, 1)";
                    break;
            }
            
            if(elements[i].classList.contains("section") || elements[i].matches('input[type="submit"]')){
                elements[i].style.color = "white";
                elements[i].style.borderColor = "white";
            }
            else if(elements[i].classList.contains("inscrivez-vous") || elements[i].classList.contains("connectez-vous")){
                elements[i].style.color = "black";
            }
        }
        var elements = document.querySelectorAll('.paragraphinformations a');
        var i;
        for(i=0;i<elements.length-1;i++){
            elements[i].style.color = "white";
        }
        var element = document.querySelector('#utilisateur tr:nth-child(1)');
        if(element != null){
            element.style.backgroundColor = "rgb(107, 180, 214)";
        }
        var elmt = document.querySelector('.titreutilisateurs');
        if(elmt != null){
            elmt.style.background = "rgb(48, 149, 203)";
        }
    }
    else {
        body[0].style.backgroundImage = 'url("../Data/blue_sky.jpg")';
        for (i=0;i<elements.length;i++) {
            background = window.getComputedStyle(elements[i]).backgroundColor;
            color = window.getComputedStyle(elements[i]).color;
            switch (background) {
                case "rgb(255, 255, 255)":
                    elements[i].style.backgroundColor = "rgb(55, 194, 225)";
                    break;
                case "rgb(255, 255, 254)":
                    elements[i].style.backgroundColor = "rgb(48, 149, 203)";
                    break;
                case "rgb(0, 0, 2)":
                    elements[i].style.backgroundColor = "rgb(107, 180, 214)";
                    break;
                case "rgb(255, 255, 253)":
                    elements[i].style.backgroundColor = "rgb(230, 221, 198)";
                    break;
                case "rgb(0, 0, 1)":
                    elements[i].style.color = "rgb(48, 149, 203)";
                    break;
            }
            
            if(elements[i].classList.contains("section") || elements[i].matches('input[type="submit"]')){
                elements[i].style.color = "black";
                elements[i].style.borderColor = "rgb(107, 180, 214)";
            }
            else if(elements[i].classList.contains("inscrivez-vous") || elements[i].classList.contains("connectez-vous")){
                elements[i].style.color = "rgb(48, 149, 203)";
            }
        }
        var elements = document.querySelectorAll('.paragraphinformations a');
        var i;
        for(i=0;i<elements.length-1;i++){
            elements[i].style.color = "black";
        }
        var element = document.querySelector('#utilisateur tr:nth-child(1)');
        if(element != null){
            element.style.backgroundColor = "rgb(107, 180, 214)";
        }
        var elmt = document.querySelector('.titreutilisateurs');
        if(elmt != NULL){
            elmt.style.background = "rgb(48, 149, 203)";
        }
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