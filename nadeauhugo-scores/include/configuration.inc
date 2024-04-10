<?php
session_start();
include "include/ma-bibliotheque.php";
try {

    $mysqli = new mysqli("127.0.0.1", "root", "mysql", "scores_hugonadeau");
    define('DEVEL', false);
} catch (Exception $e) {
    die('&Eacute;chec lors de la connexion &agrave; la base de donn&eacute;es.');
}


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
?>

