let nom = document.getElementById('nom');

if (nom != null) {
    nom.addEventListener('blur', validerNom);
}

let description = document.getElementById('description');

if (description != null) {
    description.addEventListener('blur', validerDescription);
}

let icone = document.getElementById('icone');

if (icone != null) {
    icone.addEventListener('blur', validerIcone);
}

let formulaire = document.getElementById('formulaire');

if (formulaire != null) {
    formulaire.addEventListener('submit', validerFormulaire);
}

function validerNom(event) {
    let valide = false;
    let messageErreur = '';

    let nom = document.getElementById('nom');

    if (nom != null) {
        let valeur = nom.value;

        if (valeur) {
            valide = true;
            if (valeur.length > 255) {
                messageErreur = 'Le nom ne doit pas comporter plus de 255 caractères.';
            }
        } else {
            messageErreur = 'Le nom est requis.';
        }

        if (messageErreur == "") {
            if (nom.classList.contains("controle-erreur")) {
                nom.classList.remove("controle-erreur");
                enleverMessage(nom);
            }
        } else {
            afficherMessage(nom, messageErreur);
            nom.classList.add("controle-erreur");
        }
    } else {
        console.log('Impossible de retrouver la case du nom dans le formulaire.');
    }
    return valide;
}

function validerDescription(event) {
    let valide = false;
    let messageErreur = '';

    let description = document.getElementById('description');

    if (description != null) {
        let valeur = description.value;

        if (valeur) {
            valide = true;
            if (valeur.length > 255) {
                messageErreur = 'La description ne doit pas comporter plus de 255 caractères.';
            }
        } else {
            messageErreur = 'La description est requise.';
        }

        if (messageErreur == "") {
            if (description.classList.contains("controle-erreur")) {
                description.classList.remove("controle-erreur");
                enleverMessage(description);
            }
        } else {
            afficherMessage(description, messageErreur);
            description.classList.add("controle-erreur");
        }
    } else {
        console.log('Impossible de retrouver la case de la description dans le formulaire.');
    }
    return valide;
}

function validerIcone(event) {
    let valide = false;
    let messageErreur = '';

    let icone = document.getElementById('icone');

    if (icone != null) {
        let valeur = icone.value;

        if (valeur) {
            valide = true;
            if (valeur.length > 255) {
                messageErreur = 'L\'icône ne doit pas comporter plus de 255 caractères.';
            }
        } else {
            messageErreur = 'L\'icône est requise.';
        }

        if (messageErreur == "") {
            if (icone.classList.contains("controle-erreur")) {
                icone.classList.remove("controle-erreur");
                enleverMessage(icone);
            }
        } else {
            afficherMessage(icone, messageErreur);
            icone.classList.add("controle-erreur");
        }
    } else {
        console.log('Impossible de retrouver la case de l\'icône dans le formulaire.');
    }
    return valide;
}

function enleverMessage(baliseValidee) {
    let parent = baliseValidee.parentElement;

    if (parent !== null) {
        let balisesMessages = parent.getElementsByClassName('message-erreur-formulaire');
        for (let i = 0; i < balisesMessages.length; i++) {
            balisesMessages[i].remove();
        }
    }
}

function validerFormulaire(event) {
    let nomValide = validerNom();
    let descriptionValide = validerDescription();
    let iconeValide = validerIcone();

    if (!nomValide || !descriptionValide || !iconeValide) {
        event.preventDefault();
    }
}

function afficherMessage(baliseValidee, message) {
    let parent = baliseValidee.parentElement;
    let baliseMessage = null;

    if (parent != null) {
        let balisesMessages = parent.getElementsByClassName('message-erreur-formulaire');
        if (balisesMessages.length > 0) {
            baliseMessage = balisesMessages[0];
        } else {
            baliseMessage = document.createElement("p");
            baliseMessage.classList.add("message-erreur-formulaire");
            parent.appendChild(baliseMessage);
        }
        baliseMessage.innerHTML = message;
    }
}