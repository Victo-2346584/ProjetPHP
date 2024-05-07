<?php
require "./include/configuration.inc";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['message_erreur'] = "";
    foreach ($_POST as $element => $valeur) {
        $_POST[$element] = htmlspecialchars($valeur);
    }

    $jeux = $_POST['jeux'];
    $joueur = $_POST['joueur'];
    $commentaire = $_POST['commentaire'];
    $score = $_POST['scores'];

    $messageErreur = '';

    $requete = "SELECT id FROM jeux WHERE id=?";
    $stmt = $mysqli->prepare($requete);

    if ($stmt) {
        $stmt->bind_param('i', $jeux);
        $stmt->execute();
        $stmt->store_result();

        if (0 == $stmt->errno) {
            if (0 == $stmt->num_rows) {
                $messageErreur = 'La catégorie choisie n\'est pas valable.';
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
    $requete = "SELECT id FROM joueurs WHERE id=?";
    $stmt = $mysqli->prepare($requete);

    if ($stmt) {
        $stmt->bind_param('i', $joueur);
        $stmt->execute();
        $stmt->store_result();

        if (0 == $stmt->errno) {
            if (0 == $stmt->num_rows) {
                $messageErreur = 'La catégorie choisie n\'est pas valable.';
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
    if (strlen($commentaire) > 255) {
        $messageErreur = "Le commentaire est trop long.";
    }
    if ($score > 2005) {
        $messageErreur .= "Le $score est trop gros.";
    }

    if ($messageErreur == "") {
        $requete = 'INSERT INTO scores (joueur_id, jeu_id, points, message) VALUES(?,?,?,?)';
        $stmt = $mysqli->prepare($requete);

        if ($stmt) {
            $stmt->bind_param('iiis', $jeux, $joueur, $score, $commentaire);
            $stmt->execute();

            if ($stmt->errno == 0) {
                $_SESSION['operation_reussie'] = true;
                $_SESSION['message_operation'] = "Le client a été ajouté avec succès !";

            } else {
                $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le client (code " . $stmt->errno . ").";
            }

            $stmt->close();
        } else {
            $_SESSION['message_operation'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le client (code 2).";
        }
    }
    echo($messageErreur);

    if ($messageErreur != "") {
        $_SESSION['POST'] = $_POST;
        header("Location: formulaire-scores.php");
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

 