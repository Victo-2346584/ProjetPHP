<?php
session_start();
include "include/ma-bibliotheque.php";

define('HEBERGEMENT_LOCAL', true);

if (HEBERGEMENT_LOCAL) {
    $serveurBD = '127.0.0.1';
    $usagerBD = 'root';
    $motDePasseBD = 'mysql';
    $nomBD = 'scores_hugonadeau';
} else {
    $serveurBD = '127.0.0.1';
    $usagerBD = 'apache';
    $motDePasseBD = 'password';
    $nomBD = 'scores_hugonadeau';
}

try {

    $mysqli = new mysqli($serveurBD, $usagerBD, $motDePasseBD, $nomBD);
    define('DEVEL', false);
} catch (Exception $e) {
    die('&Eacute;chec lors de la connexion &agrave; la base de donn&eacute;es.');
    header();
}

if ($mysqli != null) {


    $mysqli->set_charset("utf8mb4");
    $nomPage = basename($_SERVER['SCRIPT_NAME']);

    $query = "SELECT * FROM pages  WHERE url = '$nomPage';";
    $result = $mysqli->query($query);
    $row = $result->fetch_row();
    if ($row == null) {

    } else {
        if ($row > 0) {


            $id = $row[0];
            $url = $row[1];
            $titre = $row[2];
            $description = $row[3];
            $h1 = $row[4];
            $modification = $row[5];
        } else {
            echo "0 results";
        }
    }
} else {
    header('location:../pas.php');
}
?>


?>

