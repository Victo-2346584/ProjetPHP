<?php
require "./include/configuration.inc";

if (isset($_POST)) {
    $_SESSION['message_erreur'] = "";
    foreach ($_POST as $element => $valeur) {
        $_POST[$element] = htmlspecialchars($valeur);
    }

    $nom = $_POST['nom_usager'];
    $message = $_POST['message_usager'];
    $courriel = $_POST['courriel_usager'];
    $sujet = $_POST['sujet_usager'];
    $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

    $messageErreur = '';

    if (empty($courriel)) {
        $messageErreur = "Le courriel est vide. ";
    } else if (strlen($courriel) > 255) {
        $messageErreur = "Le courriel est trop long. ";
    } else if (!preg_match($pattern, $courriel)) {
        $messageErreur = "Le courriel n'est pas au bon format. ";
    }
    if (empty($nom)) {
        $messageErreur .= "Le nom est vide. ";
    } else if (strlen($nom) > 255) {
        $messageErreur .= "Le nom est trop long. ";
    }
    if (empty($message)) {
        $messageErreur .= "Le message est vide. ";
    }
    if (empty($sujet)) {
        $messageErreur .= "Le sujet est vide. ";
    } else if (strlen($sujet) > 255) {
        $messageErreur .= "Le sujet est trop long. ";
    }
    if ($messageErreur == "") {
        $requete = 'INSERT INTO contacts (nom, courriel, sujet, message) VALUES (?,?,?,?)';
        $stmt = $mysqli->prepare($requete);

        if ($stmt) {
            $stmt->bind_param('ssss', $nom, $courriel, $sujet, $message);
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


    if ($messageErreur != "") {
        $_SESSION['message_erreur'] = $messageErreur;
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message_erreur'] = "L'enregistrement s'est bien passé, mais l'email ne sera pas envoyé.";
        header("Location: index.php");
        exit();
    }

} else {
    require "./include/entete.inc";
    echo "Veuillez utiliser le formulaire de contact pour cette opération.";
    require "./include/pieds_de_page.inc";
}

require "./include/nettoyage.inc";
?>
 