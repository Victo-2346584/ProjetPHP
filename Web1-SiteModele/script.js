let element = document.querySelectorAll('h1');
element[0].classList.add("exercice");
//De quel type d'objets s'agit-il?  h1#H1.titresite
// Combien y a-t-il d'éléments qui ont été retrouvés (combien de balises <h1>)? 1 car utiliser id
// Que voyez-vous dans la propriété classList du premier élément? DOMTokenList(1) 0 : "titresite" length : 1 value : "titresite"
// Que voyez-vous dans la propriété innerText?  le texte dans le h1
let bouton = document.querySelectorAll('.btn');
for (let pas = 0; pas < bouton.length; pas++) {
    bouton[pas].classList.add("fa-solid" );
    bouton[pas].classList.add("fa-sailboat");
}