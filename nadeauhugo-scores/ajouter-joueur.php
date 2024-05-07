<?php
require "./include/configuration.inc";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['message_erreur'] = "";
    foreach ($_POST as $element => $valeur) {
        $_POST[$element] = htmlspecialchars($valeur);
    }

    $pseudonyme = $_POST['pseudonyme'];
    $nomFamille = $_POST['nomFamille'];
    $prenom = $_POST['prenom'];
    $jeu = $_POST['jeu'];
    $messageErreur = '';

    if (empty($pseudonyme)) {
        $messageErreur = "Le pseudonyme est vide.";
    } else if (strlen($pseudonyme) > 255) {
        $messageErreur = "Le pseudonyme est trop long.";
    }
    if (empty($nomFamille)) {
        $messageErreur .= "Le nom de famille est vide.";
    } else if ($nomFamille > 255) {
        $messageErreur .= "Le nom de famille est trop long.";
    }
    if (empty($prenom)) {
        $messageErreur .= "Le prenom est vide.";
    } else if (strlen($prenom) > 255) {
        $messageErreur .= "Le prenom est trop long.";
    }
    $requete = "SELECT id FROM jeux WHERE id=?";
    $stmt = $mysqli->prepare($requete);

    if ($stmt) {
        $stmt->bind_param('i', $jeu);
        $stmt->execute();
        $stmt->store_result();

        if (0 == $stmt->errno) {
            if (0 == $stmt->num_rows) {
                $messageErreur = 'La jeu choisie n\'est pas valable.';
            }
        } else {
            $messageErreur = 'Il n\'est pas possible de valider la catégorie (code 1).';
            log_debug($stmt->error);
        }
        $stmt->close();
    } else {
        $messageErreur = 'Il n\'est pas possible de valider la catégorie (code 2).';
        log_debug($mysqli->error);
    }
    if ($messageErreur == "") {
        $requete = 'INSERT INTO joueurs(pseudonyme, nomfamille, prenom, jeu_id, dateinscription, avatar) VALUES (?,?,?,?,now(), null);';
        $stmt = $mysqli->prepare($requete);
        if ($stmt) {
            $stmt->bind_param('sssi', $pseudonyme, $nomFamille, $prenom, $jeu);
            $stmt->execute();
            echo $nomFwsamille;

            if ($stmt->errno == 0) {
                $_SESSION['operation_reussie'] = true;
                $_SESSION['message_operation'] = "Le client a été ajouté avec succès !";
            } else {
                $messageErreur = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le client (code " . $stmt->errno . "    " . $stmt->error . ").";
            }

            $stmt->close();
        } else {
            $messageErreur = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le client (code 2).";
        }
    }

    if ($messageErreur != "") {
        require "./include/entete.inc";

        echo "<h1>$messageErreur</h1>";
        require "./include/pieds_de_page.inc";
    } else {
        $_SESSION['message_erreur'] = "l'enregistrement s'est bien passé";
        header("Location: index.php");
    }

} else {
    require "./include/entete.inc";
    echo "Veuillez utiliser le formulaire de contact pour cette opération.";
    require "./include/pieds_de_page.inc";
}

require "./include/nettoyage.inc";
