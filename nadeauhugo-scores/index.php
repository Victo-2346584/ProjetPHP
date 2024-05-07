<?php
require "./include/configuration.inc";
require "./include/entete.inc";
if (!isset($mysqli)) {
    echo "<h1>Le site est indisponible en se moments</h1>";
    die();
}
?>
    <div class="formulaire_score">
        <a class="btn" href="formulaire-scores.php">Formulaire scores</a>
    </div>
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
        echo '<div class="unscore anime size"><p class="joueur">' . $row["joueur"] . '</p><p class="lescore">' . $row["lescore"] . '</p><i class="' . $row["icone"] . '"></i><p>10 janvier 2024</p><p class="jeu">' . $row["jeu"] . '</p>      <a href="details-score.php?id=' . $row["id"] . '" class="btn">Détails</a></div>';
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
                <h2 class="text-pretitle">Formulaire D'inscription</h2>
                <p class="text-huge-title">
                    formulaire
                </p>
            </div>
        </div>

        <?php
        $requete = "SELECT id, nom FROM jeux ORDER BY id";
        $resultat = $mysqli->query($requete);
        if (!$resultat) {
            echo "<p class='message-erreur'>Nous sommes désolés, un problème nous empêche d'afficher le formulaire correctement.</p>";
            echo_debug($mysqli->error);
        } else {
            ?>
            <div>
                <form method="post" action="ajouter-joueur.php" id="formulaire" name="formulaireJoueur">
                    <div>
                        <label for="pseudonyme">pseudonyme *</label>
                        <input name="pseudonyme" id="pseudonyme" type="text" maxlength="255" required>
                    </div>
                    <div>
                        <label for="nomFamille">Nom de famille *</label>
                        <input name="nomFamille" id="nomFamille" type="text" maxlength="255" required>
                    </div>
                    <div>
                        <label for="prenom">prénom *</label>
                        <input name="prenom" id="prenom" type="text" maxlength="255" required>
                    </div>
                    <div>
                        <label for="jeu">jeu *</label>
                        <select id="jeu" name="jeu" required>
                            <?php
                            if ($mysqli->affected_rows > 0) {
                                echo "<option value=''>Veuillez choisir jeu favori</option>";
                                while ($enreg = $resultat->fetch_row()) {

                                    // chaque option de la liste déroulante affichera le titre de la catégorie et retournera son id
                                    echo "<option value='$enreg[0]'>$enreg[1]</option>";
                                }
                            } else {
                                // le message apparaîtra à la place des options de la liste déroulante
                                echo "<option value=''>Il n'y a présentement aucune catégorie dans le système.</option>";
                            }

                            $resultat->free();
                            ?>
                        </select>
                    </div>
                    <button type="submit">Soumettre l'inscription</button>
                </form>
            </div>
            <?php
        }
        ?>
        <?php
        if (isset($_SESSION['active'])) {
            if ($_SESSION['active']) {
                echo '<a class="btn" href="formulaire-page-accueil.php">Formulaire de page</a>';
            }
        }
        ?>
    </section>
<?php
$_SESSION['message_erreur'] = "";
require "./include/pieds_de_page.inc";
require "./include/nettoyage.inc";