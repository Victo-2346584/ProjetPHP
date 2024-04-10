let nom = document.getElementById('nom');

if (nom != null) {
    nom.onblur = validerNom;
}

let courriel = document.getElementById('courriel');

if (courriel != null) {
    courriel.onblur = validerCourriel;
}

let formulaireContact = document.getElementById('formulairecontact');

if (formulaireContact != null) {
    formulaireContact.addEventListener('submit', validerFormulaire);
} 

/**
 * Valide le nom et affiche le message d'erreur dans le DOM si non valide.
 *
 * @param {Event} event Événement qui a déclenché l'appel de la fonction.
 *
 * @return {bool} True si valide.
 */
function validerNom(event) {
    let valide  = false;
    let messageErreur = '';


    if (nom != null) {
        let valeur = nom.value;

        // si quelque chose a été entré comme valeur
        if (valeur) {
            if (valeur.length <= 255) {
                valide = true;
            }
            else {
                messageErreur = 'Le nom ne doit pas comporter plus de 255 caractères.';
            }
        }
        else {
            messageErreur = 'Le nom est requis.';
        }

        if (valide) {
            // s'assurer qu'il n'y a plus de trace d'une erreur qui serait survenue avant
        }
        else {
            afficherMessage(nom, messageErreur);
        }
    }
    else {
        console.log('Impossible de retrouver la case du nom dans le formulaire.');
    }

    return valide;
}

/**
 * Valide le courriel et affiche le message d'erreur dans le DOM si non valide.
 *
 * @param {Event} event Événement qui a déclenché l'appel de la fonction.
 *
 * @return {bool} True si valide.
 */
function validerCourriel(event) {
    let valide  = false;
    let messageErreur = '';


    if (courriel != null) {
        let valeur = courriel.value;

        // si quelque chose a été entré comme valeur
        if (valeur) {
            if (valeur.length <= 255) {
                // source de l'expression régulière : https://www.abstractapi.com/guides/email-validation-regex-javascript
                //let patron = /^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@[A-Za-z0-9.-]+$/gm;
                // source de l'expression régulière : https://www.tutorialspoint.com/how-to-validate-email-address-using-regexp-in-javascript
                let patron = /\S+@\S+\.\S+/;
                if (patron.test(valeur)) {
                    valide = true;
                }
                else {
                    messageErreur = "Le format du courriel n'est pas valide";
                }
            }
            else {
                messageErreur = 'Le courriel ne doit pas comporter plus de 255 caractères.';
            }
        }
        else {
            messageErreur = 'Le courriel est requis.';
        }

        if (valide) {
            // s'assurer qu'il n'y a plus de trace d'une erreur qui serait survenue avant
        }
        else {
            afficherMessage(courriel, messageErreur);
        }
    }
    else {
        console.log('Impossible de retrouver la case du courriel dans le formulaire.');
    }

    return valide;
}

/**
 * Valide le formulaire.
 *
 * @param {Event} event Événement qui a déclenché l'appel de la fonction.
 */
function validerFormulaire(event) {
    let nomValide = false;

    if (nom != null) {
        nomValide = validerNom(event);
    }
    
    if (courriel != null) {
        courrielValide = validerCourriel(event);
    }


    if (!nomValide || !courrielValide) {
        event.preventDefault(); // ceci annule la soumission du formulaire
    }
}

/**
 * Affiche, dans une balise sous le contrôle validé, le message d'erreur de validation ou du blanc si valide.
 *
 * @param {HtmlInputElement} baliseValidee Représentation objet de la balise HTML validée.
 * @param {String} message Message à afficher.
 */
function afficherMessage(baliseValidee, message) {
    let parent = baliseValidee.parentElement;
    let baliseMessage = null;

    if (parent != null) {
        let balisesMessage = parent.getElementsByClassName('message-erreur-formulaire');
        if (balisesMessage.length >  0) {
            baliseMessage = balisesMessage[0];
        }
        else {
            // s'il n'y avait pas de balise pour accueillir le message, on la crée. Il est préférable de la créer directement en HTML pour éviter que le formulaire bouge lorsqu'on vérifie s'il faut afficher un message.
            baliseMessage = document.createElement("p");
            baliseMessage.classList.add("message-erreur-formulaire");
            parent.appendChild(baliseMessage);
        }
        baliseMessage.innerHTML = message;
    }
}
