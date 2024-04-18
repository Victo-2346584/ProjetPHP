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
        <div class="s-intro__content">
            <?php if (isset($_SESSION['message_erreur'])) {
                echo($_SESSION['message_erreur']);
                $_SESSION['message_erreur'] = "";
            } ?>
            <form method="post" action="verifier-authentification.php">
                <div class="ligne-formulaire">
                    <label for="code">* Code : </label>
                    <input type="text" id="code" name="code" required>
                </div>
                <div class="ligne-formulaire">
                    <label for="motdepasse">* Mot de passe : </label>
                    <input type="password" id="motdepasse" name="motdepasse" required>
                </div>
                <div class="ligne-formulaire">
                    <input type="submit" id="soumettre" name="soumettre" value="Soumettre">
                </div>
            </form>
        </div>

    </section> <!-- end s-intro -->

<?php
require "./include/pieds_de_page.inc";
require "./include/nettoyage.inc";
