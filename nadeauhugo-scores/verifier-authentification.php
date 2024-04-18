<?php
require "./include/configuration.inc";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['message_erreur'] = "";
    foreach ($_POST as $element => $valeur) {
        $_POST[$element] = htmlspecialchars($valeur);
    }
    $code = $_POST['code'];
    $motPasse = $_POST['motdepasse'];
    $query = 'SELECT motdepasse , prenom, nomFamille  from usagers where code = ?';
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param('i', $code);
        $stmt->execute();
        $stmt->store_result();
        if (0 == $stmt->errno) {
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($motDePasse, $prenom, $nomfamille);
                $stmt->fetch();
            }
            if (password_verify($motPasse, $motDePasse)) {
                $_SESSION['active'] = true;
                $_SESSION['bienvenue'] = "Bienvenu $prenom $nomfamille";
                header("location: index.php");
            } else {
                $_SESSION["message_erreur"] = "le mot de passe ou le code n'ai pas bon";
                header("location: formulaire-authentification.php");
            }
        } else {
            $_SESSION["message_erreur"] = "le mot de passe ou le code n'ai pas bon";
            header("location: formulaire-authentification.php");
        }
    }
}

