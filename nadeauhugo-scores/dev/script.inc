<?php
$query = "SELECT scores.id AS id, joueurs.pseudonyme AS joueur, scores.points AS lescore, jeux.nom AS jeu, jeux.icone AS icone
FROM scores
INNER JOIN joueurs ON scores.joueur_id = joueurs.id
INNER JOIN jeux ON scores.jeu_id = jeux.id
ORDER BY lescore desc 
limit 3;";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
// sorte les lignes et les mets dans le bon format
    echo '<div class="scores">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="unscore anime"><p class="joueur">' . $row["joueur"] . '</p><p class="lescore">' . $row["lescore"] . '</p><i class="' . $row["icone"] . '"></i><p>10 janvier 2024</p><p class="jeu">' . $row["jeu"] . '</p>             <button><a href="details-score.php?id=' . $row["id"] . '">Détails</a></button></div>';
    }
    echo '</div>';
} else {
    echo "0 results";
}
?>