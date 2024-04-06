<?php

/**
 * Template Name: Homepage
 * 
 * The template for displaying Homepage Template
 * 
 * @package D_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="home-section hero-section">
        <div class="container">
            <h1><?= CFS()->get('hero_title'); ?></h1>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();
