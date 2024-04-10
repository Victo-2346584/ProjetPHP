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
        require_once "./dev/script.inc"
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