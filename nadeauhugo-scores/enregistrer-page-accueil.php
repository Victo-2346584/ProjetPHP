<?php
require "./include/configuration.inc";
$html = $_POST['TinyMCE'];
$requete = "UPDATE `pages` SET `texte`=? WHERE `id`=1";
$stmt = $mysqli->prepare($requete);

if ($stmt) {
    $stmt->bind_param('s', $html);
    $stmt->execute();

    if ($stmt->errno == 0) {
        $_SESSION['operation_reussie'] = true;
        $_SESSION['message_erreur'] = "Le texte a été ajouté avec succès !";
    } else {
        $_SESSION['message_erreur'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le  texte.";
    }

    $stmt->close();
} else {
    $_SESSION['message_erreur'] = "Nous sommes désolés, un problème technique nous empêche d'enregistrer le texte.";
}
header("location: index.php");
require "./include/nettoyage.inc";