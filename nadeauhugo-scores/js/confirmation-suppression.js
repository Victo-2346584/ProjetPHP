// associe la fonction confirmerSuppression() au clic sur un lien
// il est nécessaire d'utiliser l'événement DOMContentLoaded seulement si le script n'a pas été chargé avec l'attribut defer
document.addEventListener("DOMContentLoaded", function (event) {
    // l'événement doit provenir de la balise <a> qui contient l'attribut href
    // ajuster le sélecteur selon votre projet
    let liensConfirmation = document.querySelectorAll("a.confirmation");


    for (let lienConfirmation of liensConfirmation) {
        lienConfirmation.onclick = afficherBoiteConfirmation;
    }
});

/**
 * Fait apparaître une boîte de confirmation.
 * @author Christiane Lagacé <christianelagace.com>
 *
 * @param {Event} event.
 *
 * @return {type} Return value description.
 */

function afficherBoiteConfirmation(event) {
    // Aucune soumission tant que l'usager n'a pas confirmé.
    event.preventDefault();

    const href = retrouverHrefLien(event);


    afficherPopupConfirmation("Désirez-vous vraiment supprimer cet item?", href);
}