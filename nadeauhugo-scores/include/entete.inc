<?php
/**
 * @author  <christiane.lagace@hotmail.com>
 * user: hugon
 * date: 2024-01-23
 * Time: 16:18
 */

?>
<!DOCTYPE html>
<html lang="fr-CA">
<head>
    <title><?php if (!isset($titre)) echo "scores";
        else {
            echo $titre;
        } ?></title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php if (!isset($description)) echo "scores"; else {
        echo $description;
    } ?>"/>
    <meta name="author" content="hugo Na"/>
    <link rel="icon" href="favicon.ico"/>
    <link rel="apple-touch-icon" href="apple-touch-icon.png"/>
    <link rel="stylesheet" href="css/vendor.css?v2">
    <link rel="stylesheet" href="css/styles.css?v2">
    <link rel="stylesheet" href="css/ajustements.css?v2">
    <link rel="stylesheet" href="css/mes-styles.css?v2">
    <link rel="stylesheet" href="ma-bibliotheque-popup/style.css?v2">
    <script src="ma-bibliotheque-popup/script.js" defer></script>
    <script src="js/confirmation-suppression.js" defer></script>
    <script src="https://kit.fontawesome.com/7a3ae742a8.js" crossorigin="anonymous"></script>
    <?php
    require_once 'include/ma-bibliotheque.php';
    inclureJsPropreALaPageActuelle();
    ?>
</head>
<body id="top">
<?php
if (isset($nomPage) && $nomPage == "formulaire-jeu.php" && !isset($_SESSION['active'])) {
    echo '<div class="container">';
    echo "Vous ne disposez pas des droits requis pour accéder à cette page.";
    echo '<p><a class="btn btn-primary" href="index.php">Retour à l\'accueil</a></p>';
    echo '</div>';

    require 'pieds_de_page.inc';

    require 'nettoyage.inc';
    die();
}
?>
<!-- page wrap -->
<div class="s-pagewrap">

    <!-- # site header -->
    <header class="couleur1 fixe s-header">

        <div class="s-header__block">
            <div class="s-header__branding">
                <p class="site-title">
                    <a href="index.php" rel="home">Scores</a>
                </p>
                <p class="sous-titre">La plateforme incontournable pour suivre les exploits des joueurs !<sup> <a
                                href="#nbp1">1</a></sup></p>
            </div>
            <a class="s-header__menu-toggle" href="#"><span>Menu</span></a>
        </div> <!-- end s-header__block -->

        <div class="row s-header__nav-wrap couleur1">
            <nav class="s-header__nav">
                <ul>
                    <li class="<?php if (isset($nomPage) && $nomPage == "jeux.php") echo "actif"; ?>"><a
                                href="jeux.php">Jeux</a></li>
                    <li class="<?php if (isset($nomPage) && $nomPage == "a-venir.php") echo "actif"; ?>"><a
                                href="a-venir.php">Joueurs</a>
                    </li>
                    <li class="<?php if (isset($nomPage) && $nomPage == "index.php") echo "actif"; ?>"><a
                                href="index.php">Scores</a></li>
                    <li class="<?php if (isset($nomPage) && $nomPage == "a-propos.php") echo "actif"; ?>"><a
                                href="a-propos.php">À propos</a>
                    </li>
                    <li class="<?php if (isset($nomPage) && $nomPage == "formulaire-contact.php") echo "actif"; ?>"><a
                                href="formulaire-contact.php">Contact</a></li>
                    <li class="<?php if (isset($nomPage) && $nomPage == "themes.php") echo "actif"; ?>"><a
                                href="themes.php">Thèmes</a></li>
                    <li class="<?php if (isset($nomPage)) {
                        if (isset($_SESSION['active'])) {
                            if ($_SESSION['active']) {
                                if ($nomPage == "deconnecter.php") {
                                    echo "actif";
                                }
                            } else {
                                if ($nomPage == "formulaire-authentification.php") {
                                    echo "actif";
                                }
                            }
                        }
                    } else {
                        if ($nomPage == "formulaire-authentification.php") {
                            echo "actif";
                        }
                    } ?>">
                        <?php
                        if (isset($_SESSION['active'])) {
                            echo '<a href="deconnecter.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>';
                        } else {
                            echo '<a href="formulaire-authentification.php"><i class="fa-solid fa-right-to-bracket"></i></a></li>';
                        } ?>
                </ul>
            </nav> <!-- end s-header__nav -->
        </div> <!-- end s-header__nav-wrap -->
    </header> <!-- end s-header -->

    <!-- intro -->
    <section class="couleur1 s-intro">
        <div class="themes">
            <?php if (isset($_SESSION['bienvenue'])) {
                echo($_SESSION['bienvenue']);
            } ?>
        </div>
        <div class="s-intro__content">
            <div class="s-intro__text">
                <h1 class="couleur1 s-intro__text-huge">
                    <?php
                    if (!isset($h1)) {
                        echo "scores";
                    } else {
                        echo $h1;
                    }

                    ?>
                </h1>
            </div>
            <div class="s-intro__bg"></div>
        </div>

    </section> <!-- end s-intro -->
    <section class="couleur2 section row23">

        <div class="row">
            <div class="column">
                <h2 class="text-pretitle">Tableau de bord</h2>
                <p class="text-huge-title">Meilleurs scores</p>
                <?php
                if (isset($texte))

                    echo "<div class='size'>$texte</div";
                ?>
            </div>
        </div>