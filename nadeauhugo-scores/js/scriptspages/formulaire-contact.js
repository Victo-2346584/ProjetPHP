let nom = document.getElementById('nom');

if (nom != null) {
    nom.addEventListener('blur', validerNom);
}

let courriel = document.getElementById('courriel');

if (courriel != null) {
    courriel.addEventListener('blur', validerCourriel);
}

let sujet = document.getElementById('sujet');

if (sujet != null) {
    sujet.addEventListener('blur', validerSujet);
}

let message = document.getElementById('message');

if (message != null) {
    message.addEventListener('blur', validerMessage);
}

let formulaireContact = document.getElementById('formulaire');

if (formulaireContact != null) {
    formulaireContact.addEventListener('submit', validerFormulaire);
}

function validerCourriel(event) {
    let valide = false;
    let messageErreur = '';
    let courriel = document.getElementById('courriel');
    if (courriel != null) {
        let valeur = courriel.value;
        if (valeur) {
            if (valeur.length <= 255) {
                let patron = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
                if (patron.test(valeur)) {
                    valide = true;
                } else {
                    messageErreur = "Le format du courriel n'est pas valide";
                }
            } else {
                messageErreur = 'Le courriel ne doit pas comporter plus de 255 caractères.';
            }
        } else {
            messageErreur = 'Le courriel est requis.';
        }
        if (messageErreur == "") {
            if (courriel.classList.contains("controle-erreur")) {
                courriel.classList.remove("controle-erreur");
                enleverMessage(courriel);
            }
        } else {
            afficherMessage(courriel, messageErreur);
            courriel.classList.add("controle-erreur");
        }
    } else {
        console.log('Impossible de retrouver la case du courriel dans le formulaire.');
    }
    return valide;
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

function validerSujet(event) {
    let valide = false;
    let messageErreur = '';
    let sujet = document.getElementById('sujet');
    if (sujet != null) {
        let valeur = sujet.value;
        if (valeur) {
            valide = true;
        } else {
            messageErreur = 'Le sujet est requis.';
        }
        if (messageErreur == "") {
            if (sujet.classList.contains("controle-erreur")) {
                sujet.classList.remove("controle-erreur");
                enleverMessage(sujet);
            }
        } else {
            afficherMessage(sujet, messageErreur);
            sujet.classList.add("controle-erreur");
        }
    } else {
        console.log('Impossible de retrouver la case du sujet dans le formulaire.');
    }
    return valide;
}

function validerMessage(event) {
    let valide = false;
    let messageErreur = '';
    let message = document.getElementById('message');
    if (message != null) {
        let valeur = message.value;
        if (valeur.length > 0) {
            valide = true;
        } else {
            messageErreur = 'Le message est requis.';
        }
        if (messageErreur == "") {
            if (message.classList.contains("controle-erreur")) {
                message.classList.remove("controle-erreur");
                enleverMessage(message);
            }
        } else {
            afficherMessage(message, messageErreur);
            message.classList.add("controle-erreur");
        }
    } else {
        console.log('Impossible de retrouver la case du message dans le formulaire.');
    }
    return valide;
}

function enleverMessage(baliseValidee) {
    let parent = baliseValidee.parentElement;
    if (parent !== null) {
        let balisesMessage = parent.getElementsByClassName('message-erreur-formulaire');
        for (let i = 0; i < balisesMessage.length; i++) {
            balisesMessage[i].remove();
        }
    }
}

function validerFormulaire(event) {
    let nomValide = validerNom();
    let courrielValide = validerCourriel();
    let sujetValide = validerSujet();
    let messageValide = validerMessage();
    if (!nomValide || !courrielValide || !sujetValide || !messageValide) {
        event.preventDefault(); // Annule la soumission du formulaire
    }
}

function afficherMessage(baliseValidee, message) {
    let parent = baliseValidee.parentElement;
    let baliseMessage = null;
    if (parent != null) {
        let balisesMessage = parent.getElementsByClassName('message-erreur-formulaire');
        if (balisesMessage.length > 0) {
            baliseMessage = balisesMessage[0];
        } else {
            baliseMessage = document.createElement("p");
            baliseMessage.classList.add("message-erreur-formulaire");
            parent.appendChild(baliseMessage);
        }
        baliseMessage.innerHTML = message;
    }
}
