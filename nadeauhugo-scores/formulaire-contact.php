<?php
require "./include/configuration.inc";
require "./include/entete.inc";
$_SESSION['message_operation'] = "";
?>
<?php if (isset($_SESSION['active'])) {
    echo '<p><a href="./contact.php"><button>liste</button></a></p>';
} ?>
    <div class="column">
        <form method="post" action="traiter-contact.php" id="formulaire" name="formulaireContact"
              class="formulaire_contact">
            <div>
                <label for="nom">Nom *</label>
                <input type="text" id="nom" class="imput" name="nom_usager" maxlength="100">
            </div>

            <div>
                <label for="courriel">Courriel *</label>
                <input type="email" id="courriel" class="imput" name="courriel_usager">
            </div>
            <div>
                <label for="sujet">Sujet *</label>
                <input type="text" id="sujet" class="imput" name="sujet_usager" maxlength="100">
            </div>
            <div>
                <label for="message">Message *</label>
                <textarea id="message" class="imput" name="message_usager"></textarea>
            </div>
            <button type="submit">soumettre</button>
        </form>
    </div>

    </section> <!-- end s-intro -->

<?php
require "./include/pieds_de_page.inc";
require "./include/nettoyage.inc";