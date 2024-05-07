<?php
require "./include/configuration.inc";
require "./include/entete.inc";
?>
<?php
if (isset($_SESSION['message_erreur'])) {
    echo($_SESSION['message_erreur']);
}
$query = "SELECT nom,description , icone FROM jeux";
$result = $mysqli->query($query);
if ($result == null) {
    echo "Nous sommes désolée, les scores ne peut pas êtres afficher";
} else {
    if ($result->num_rows > 0) {
        // sorte les lignes et les mets dans le bon format
        echo '<div class="jeux">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="unscore case" onclick="afficherPopup3Secondes(`ca marche`)"> <p>' . $row['nom'] . '</p><p> description :  ' . $row['description'] . ' </p><i class="' . $row['icone'] . '"></i></div>';
        }
        echo '</div>';
    } else {
        echo "Il n'y a pas de thème";
    }
}
?>


<?php
if (isset($_SESSION['active'])) {
    echo '<div class="unscore"><a href="formulaire-jeu.php">ajouter un jeu</a></div>';
}
?>


    </section> <!-- end meilleurs scores -->

<?php
$_SESSION['message_erreur'] = "";
require "./include/pieds_de_page.inc";
require "./include/nettoyage.inc";