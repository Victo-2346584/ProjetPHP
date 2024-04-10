<?php
/**
 * user: hugon
 * date: 2024-02-09
 * Time: 10:28
 */
?>
<?php
require "./include/entete.inc";
?>
<!-- Start block -->
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-12 lg:grid-cols-12 lg:pt-20">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
                Mon blogue de programmation</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Que ce
                soit en PHP, en SwiftUI, en JavaScript ou autre, je partage mes découvertes de programmation avec vous
                en toute humilité.</p>
            <p class="couleur">
                fichier courant
                <?php
                echo basename(__FILE__, '.php')
                ?>
            </p>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="./images/hero.png" alt="hero image">
        </div>
    </div>
</section>
<!-- End block -->
<!-- Start block -->
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-16 lg:py-8 lg:px-6">
        <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-0">
            <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Principales
                catégories</h2>
        </div>
        <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
            <div class="categorie flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                <h3 class="mb-4 text-2xl font-semibold couleur">PHP</h3>
                <a href="/categorie-php.php"
                   class="bouton focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center couleur">Consulter</a>
            </div>
            <div class="categorie flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                <h3 class="mb-4 text-2xl font-semibold couleur">SwiftUI</h3>
                <a href="/categorie-swiftui.php"
                   class="bouton focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center couleur">Consulter</a>
            </div>
            <div class="categorie flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                <h3 class="mb-4 text-2xl font-semibold couleur">JavaScript</h3>
                <a href="/categorie-javascript.php"
                   class="bouton focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center couleur">Consulter</a>
            </div>
        </div>
    </div>
</section>
<!-- End block -->
<?php
require "./include/pied-page.inc";