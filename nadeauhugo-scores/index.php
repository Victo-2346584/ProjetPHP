<?php
require "./include/configuration.inc";
require "./include/entete.inc";

?>


    <!-- meilleurs scores
    ================================================== -->
    <section class="couleur2 section row23">

        <div class="themes">

            <?php if (isset($_SESSION['message_erreur'])) {
                echo($_SESSION['message_erreur']);
            } ?>
        </div>

        <!--  <div class="scores">
                <div class="unscore anime"><p class="joueur">Joueur X</p><p class="lescore">1000</p><i class="fa-solid fa-star"></i><p>10 janvier 2024</p><p class="jeu">Jeu A</p> </div>
                <div class="unscore anime"><p class="joueur">Joueur Y</p><p class="lescore">987</p><i class="fa-solid fa-star"></i><p>10 janvier 2024</p><p class="jeu">Jeu B</p></div>
                <div class="unscore anime"><p class="joueur">Joueur Z</p><p class="lescore">836</p><i class="fa-solid fa-star"></i><p>10 janvier 2024</p><p class="jeu">Jeu C</p></div>
          </div>-->
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
    </section> <!-- end meilleurs scores -->

    <!-- # deuxième section
    ================================================== -->
    <section class=" couleur3 section contraste">

        <div class="row">
            <div class="column lg-12">
                <h2 class="text-pretitle">Sous-titre</h2>

                <p class="text-huge-title">
                    Titre
                </p>
            </div>
        </div>

        <div class="row">
            <div class="column">
                Texte colonne 1
            </div> <!-- end column -->
            <div class="column">
                Texte colonne 2
            </div> <!-- end column -->
        </div> <!-- end row -->

    </section>
<?php
$_SESSION['message_erreur'] = "";
require "./include/pieds_de_page.inc";
require "./include/nettoyage.inc";