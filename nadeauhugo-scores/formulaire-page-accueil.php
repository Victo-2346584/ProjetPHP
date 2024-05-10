<?php
require "./include/configuration.inc";
require "./include/entete.inc";
$_SESSION['message_operation'] = "";
if (!isset($_SESSION['active'])) {
    header("location: index.php");
}
?>
    <div class="s-intro__content">
        <form method="post" action="enregistrer-page-accueil.php" class="formulaire_contact">
            <button type="submit">Enregister modification</button>
            <div class="ligne-formulaire">
                <label for="text">texte *</label>
                <textarea id="text" class="tinymce" name="TinyMCE"></textarea>
            </div>

        </form>
    </div>

    </section> <!-- end s-intro -->

<?php
require "./include/pieds_de_page.inc";
require "./include/nettoyage.inc";
 