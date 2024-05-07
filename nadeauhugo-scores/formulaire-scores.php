<?php
require "./include/configuration.inc";
require "./include/entete.inc";
$_SESSION['message_operation'] = "";
// Récupère les données du formulaires que la page de traitement a stockées dans une variable de session.
// Code emprunté. Inspiré de : https://stackoverflow.com/questions/5576619/php-redirect-with-post-data
if (isset($_SESSION['POST'])) {
    $donneesSaisies = $_SESSION['POST'];
    $_SESSION['POST'] = null;
}
// Fin du code emprunté
// initialiser les données pour remplir la liste déroulante
$requete = "SELECT id, nom FROM jeux ORDER BY id";
$resultat = $mysqli->query($requete);
$requeteJoueur = "SELECT id, pseudonyme  FROM joueurs ORDER BY id";
$resultatJoueur = $mysqli->query($requeteJoueur);

if (!$resultat) {
    echo "<p class='message-erreur'>Nous sommes désolés, un problème nous empêche d'afficher le formulaire correctement.</p>";
    echo_debug($mysqli->error);
} elseif (!$resultatJoueur) {
    echo "<p class='message-erreur'>Nous sommes désolés, un problème nous empêche d'afficher le formulaire correctement.</p>";
    echo_debug($mysqli->error);
} else {
    ?>
    <section class="couleur1 s-intro">
        <p><a class="btn" href="./contact.php">liste</a></p>
        <div class="s-intro__content">
            <?php if (isset($_SESSION['message_erreur'])) {
                echo($_SESSION['message_erreur']);
            } ?>
            <form method="post" action="traiter-scores.php" id="formulaire" name="formulaireScore">
                <div>
                    <label for="Jeu">Jeu *</label>
                    <select id="Jeu" name="Jeu" required>
                        <?php
                        if ($mysqli->affected_rows > 0) {
                            echo "<option value=''>Veuillez choisir...</option>";
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

                <div>
                    <label for="joueur">Joueur *</label>
                    <select id="joueur" name="joueur" required>
                        <?php
                        if ($mysqli->affected_rows > 0) {
                            echo "<option value=''>Veuillez choisir...</option>";
                            while ($enreg = $resultatJoueur->fetch_row()) {

                                // chaque option de la liste déroulante affichera le titre de la catégorie et retournera son id
                                echo "<option value='$enreg[0]'>$enreg[1]</option>";
                            }
                        } else {
                            // le message apparaîtra à la place des options de la liste déroulante
                            echo "<option value=''>Il n'y a présentement aucune catégorie dans le système.</option>";
                        }

                        $resultatJoueur->free();
                        ?>
                    </select>
                </div>
                <div>
                    <label for="scores">scores *</label>
                    <input type="number" id="scores" class="imput" name="scores" max="2005" required>
                </div>
                <div>
                    <label for="commentaire">commentaire *</label>
                    <input type="text" id="commentaire" class="imput" name="commentaire" maxlength="255" required>
                </div>
                <button type="submit">soumettre</button>
            </form>
        </div>

    </section> <!-- end s-intro -->

    <?php
}
require "./include/pieds_de_page.inc";
require "./include/nettoyage.inc";
 