<?php

/**
 * Template Name: About
 * 
 * The template for displaying About Template
 * 
 * @package D_Theme
 */

get_header();
$single_hero = get_the_post_thumbnail_url();
$single_hero_backup = site_url() . '/wp-content/uploads/2024/04/Default_A_stunning_curvaceous_woman_with_cascading_locks_of_ha_3.jpg';
$pods = function_exists('pods') ? pods('inner_pages') : null;
?>

<main id="primary" class="site-main">

    <!-- Hero Image Section -->

    <section class="post-hero">
        <h1 class="page-hero-title">
            <?= get_the_title(); ?>
        </h1>
        <img class="single-hero-img" src="<?php if (empty($single_hero)) {
            echo $single_hero_backup;
        } else {
            echo $single_hero;
        } ?>" alt="Hero Image">
    </section>

    <!-- About Content Section -->

    <section class="about-content-section">
        <div class="container">
            <div class="about-content-holder">
                <div class="about-content-main">
                    <?= the_content(); ?>
                </div>
            </div>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();
