<?php
$query = "SELECT `courriel`, `nom`, `sujet`, `message` FROM `contacts`;";
require "../include/configuration.inc";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
// sorte les lignes et les mets dans le bon format
    echo '<div class="scores">';
    while($row = $result->fetch_assoc()) {
        echo '<div class="unscore anime"><p class="courriel">' . $row["courriel"] . '</p><p class="nom">' . $row["nom"] .'</p><p class="sujet">' . $row["sujet"]. '</p><p class="message">' . $row["message"];
    }
    echo '</div>';
} else {
    echo "0 results";
}
?>