<?php
require "./include/configuration.inc";
require "./include/entete.inc";


?>
    <section class="couleur1 s-intro">

        <div class="s-intro__content">

            <?php
            $query = "SELECT courriel, nom, sujet, message FROM contacts;";
            $result = $mysqli->query($query);

            if ($result->num_rows > 0) {
// sorte les lignes et les mets dans le bon format
                echo '<div class="scores">';
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="unscore anime"><p class="courriel">' . $row["courriel"] . '</p><p class="nom">' . $row["nom"] . '</p><p class="sujet">' . $row["sujet"] . '</p><p class="message">' . $row["message"];
                }
                echo '</div>';
            } else {
                echo "0 results";
            }
            ?>
        </div>

    </section> <!-- end s-intro -->

<?php
require "./include/pieds_de_page.inc";
require "./include/nettoyage.inc";