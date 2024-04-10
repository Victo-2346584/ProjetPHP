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
?>
    <section class="couleur1 s-intro">
        <p><a href="./contact.php">
                <button>liste</button>
            </a></p>
        <div class="s-intro__content">
            <?php if (isset($_SESSION['message_erreur'])) {
                echo($_SESSION['message_erreur']);
            } ?>
            <form method="post" action="traiter-jeu.php" id="formulaire" name="formulaireJeux">
                <div>
                    <label for="nom">Nom *</label>
                    <input type="text" id="nom" class="imput" name="nom_jeu" maxlength="100"
                           value="<?php echo $donneesSaisies['nom_jeu'] ?? '' ?>">
                </div>

                <div>
                    <label for="description">Description *</label>
                    <input type="text" id="description" class="imput" name="description_jeu" maxlength="255"
                           value="<?php echo $donneesSaisies['description_jeu'] ?? '' ?>">
                </div>
                <div>
                    <label for="icone">icone *</label>
                    <input type="text" id="icone" class="imput" name="icone_jeu" maxlength="255"
                           value="<?php echo $donneesSaisies['icone_jeu'] ?? '' ?>">
                </div>
                <button type="submit">soumettre</button>
            </form>
        </div>

    </section> <!-- end s-intro -->

<?php
require "./include/pieds_de_page.inc";
require "./include/nettoyage.inc";