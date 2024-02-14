<?php
 require "./include/entete.inc";
?>

        <!-- intro
        ================================================== -->
        <section class="couleur1 s-intro">

                <div class="s-intro__content">
                    <div class="s-intro__text">
                        <h1 class=" couleur1 s-intro__text-huge">
                            Scores
                        </h1>
                    </div>
                    <div class="s-intro__bg"></div>
                </div>

        </section> <!-- end s-intro -->

        <!-- meilleurs scores
        ================================================== -->
        <section class="couleur2 section">

             <div class="row">
                 <div class="column">
                     <h2 class="text-pretitle">Tableau de bord</h2>
                     <p class="text-huge-title">Meilleurs scores</p>
                     <p>Le site est important pour afficher les scores des joueurs. Ils est surtout important, car il va me donner une note</p>
                 </div>
             </div>

             <div class="scores">
                 <div class="unscore anime"><p class="joueur">Joueur X</p><p class="lescore">1000</p><i class="fa-solid fa-star"></i><p>10 janvier 2024</p><p class="jeu">Jeu A</p> </div>
                 <div class="unscore anime"><p class="joueur">Joueur Y</p><p class="lescore">987</p><i class="fa-solid fa-star"></i><p>10 janvier 2024</p><p class="jeu">Jeu B</p></div>
                 <div class="unscore anime"><p class="joueur">Joueur Z</p><p class="lescore">836</p><i class="fa-solid fa-star"></i><p>10 janvier 2024</p><p class="jeu">Jeu C</p></div>
             </div>

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
require "./include/pieds_de_page.inc";