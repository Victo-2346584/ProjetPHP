<?php
require "./include/configuration.inc";
require "./include/entete.inc";
?>
    <section class="couleur2 section">
        <?php
            $query = "SELECT nom,dateajout FROM themes ORDER BY themes.dateajout ASC";
            $result = $mysqli->query($query);
            if($result ==null)
            {
                echo"Nous sommes désolée, les scores ne peut pas êtres afficher";
            }
            else{
                if ($result->num_rows > 0) {
                // sorte les lignes et les mets dans le bon format
                echo '<div class="themes">';
                    while($row = $result->fetch_assoc()) {
                    echo '<p>Thème ' . ucfirst($row["nom"]) .  ' - ajouté le ' . $row["dateajout"].'</p>';
                    }
                    echo '</div>';
                }
                else {
                    echo "Il n'y a pas de thème";
                }
            }
        ?>


    </section> <!-- end meilleurs scores -->

<?php
require "./include/pieds_de_page.inc";
require "./include/nettoyage.inc";