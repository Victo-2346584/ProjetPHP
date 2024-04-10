
<?php


require "./include/configuration.inc";
require "./include/entete.inc";

?>


    <!-- meilleurs scores
    ================================================== -->
    <section class="couleur2 section row23">

        <div class="row">
            <div class="column">
                <h2 class="text-pretitle">Tableau de bord</h2>
                <p class="text-huge-title">Meilleurs scores</p>
                <p>Le site est important pour afficher les scores des joueurs. Ils est surtout important, car il va me donner une note</p>
            </div>
        </div>

        <!--  <div class="scores">
                <div class="unscore anime"><p class="joueur">Joueur X</p><p class="lescore">1000</p><i class="fa-solid fa-star"></i><p>10 janvier 2024</p><p class="jeu">Jeu A</p> </div>
                <div class="unscore anime"><p class="joueur">Joueur Y</p><p class="lescore">987</p><i class="fa-solid fa-star"></i><p>10 janvier 2024</p><p class="jeu">Jeu B</p></div>
                <div class="unscore anime"><p class="joueur">Joueur Z</p><p class="lescore">836</p><i class="fa-solid fa-star"></i><p>10 janvier 2024</p><p class="jeu">Jeu C</p></div>
          </div>-->
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if($id<0 ||$id>20){
                header("Location: pas.php");
                exit();
            }
            $query = "SELECT joueurs.pseudonyme AS joueur,
               jeux.nom AS jeu,
               scores.points,
               scores.message
        FROM scores
        JOIN joueurs ON scores.joueur_id = joueurs.id
        JOIN jeux ON scores.jeu_id = jeux.id
        WHERE scores.id = $id";

            $result = $mysqli->query($query);
            if ($result == null){
                header("Location: pas.php");
                exit();
            }
            if ($result ->num_rows> 0) {
            // sorte les lignes et les mets dans le bon format
                echo '<div class="scoresDetails st">';
                while($row = $result->fetch_assoc()) {
                    echo '<div class="unscore anime"><p class="joueur">' . $row["joueur"] . '</p><p class="lescore">' . $row["points"]. '.</p>'.'<p class="message">' . $row["message"].'</p>'.'<i class="fa-solid fa-star"></i><p>10 janvier 2024</p><p class="jeu">' . $row["jeu"] . '</div>';
                }
                echo '</div>';
            } else {
                echo "0 results";
            }
        }
        else {
            header("Location: pas.php");
            exit();
        }



?>
    </section>
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
require "./include/pieds_de_page.inc";
require "./include/nettoyage.inc";

