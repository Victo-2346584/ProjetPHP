<?php
require "./include/configuration.inc";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['message_erreur'] = "";
    foreach ($_POST as $element => $valeur) {
        $_POST[$element] = htmlspecialchars($valeur);
    }

    $nom = $_POST['nom_jeu'];
    $description = $_POST['description_jeu'];
    $icone = $_POST['icone_jeu'];

    $messageErreur = '';

    if (empty($nom)) {
        $messageErreur = "Le nom est vide.";
    } else if (strlen($nom) > 255) {
        $messageErreur = "Le nom est trop long.";
    }
    if (empty($icone)) {
        $messageErreur .= "Le icone est vide.";
    } else if ($icone > 255) {
        $messageErreur .= "Le icone est trop long.";
    }
    if (empty($description)) {
        $messageErreur .= "Le description est vide.";
    } else if (strlen($description) > 255) {
        $messageErreur .= "Le description est trop long.";
    }
    if ($messageErreur == "") {
        $requete = "INSERT INTO jeux (nom, description, icone) VALUES(?,?,?)";
        $stmt = $mysqli->prepare($requete);

        if ($stmt) {
            $stmt->bind_param('sss', $nom, $description, $icone);
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
        header("Location: formulaire-jeu.php");
    } else {
        $_SESSION['message_erreur'] = "l'enregistrement s'est bien passé";
        header("Location: jeux.php");
    }

} else {
    require "./include/entete.inc";
    echo "Veuillez utiliser le formulaire de contact pour cette opération.";
    require "./include/pieds_de_page.inc";
}

require "./include/nettoyage.inc";
