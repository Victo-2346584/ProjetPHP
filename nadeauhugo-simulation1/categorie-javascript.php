<?php
/**
 * user: hugon
 * date: 2024-01-23
 * Time: 16:18
 */
require "./include/entete.inc";
?>
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-12 lg:grid-cols-12 lg:pt-20">
            <div class="mr-auto place-self-center lg:col-span-7">
                <p class="texte">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad doloribus, eius ex molestias natus neque reprehenderit similique temporibus! Et expedita facilis, iusto libero nihil ratione rerum! Nemo quibusdam repellat temporibus!</p>
                <p class="couleur">
                    fichier courant
                    <?php
                    echo basename(__FILE__, '.php')
                    ?>
                    .php
                </p>
            </div>
        </div>
    </section>
<?php
require "./include/pied-page.inc";