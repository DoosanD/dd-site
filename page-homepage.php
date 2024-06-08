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

    <!-- <h1><?= CFS()->get('hero_title'); ?></h1> -->
    <section class="home-section hero-section">
        <?php
        // Start the WordPress loop
        $args = array(
            'posts_per_page' => 1, // Only retrieve the latest post
            'orderby' => 'date',
            'order'   => 'DESC'
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post(); ?>

                <div class="container">
                    <div class="col-md-6">
                        <div class="hero-image-holder">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', array('class' => 'hero-post-image')); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </div>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                            <div class="entry-footer">
                                <span class="posted-on"><?php the_date(); ?></span>
                                <span class="byline"><?php the_author(); ?></span>
                            </div>
                        </article>
                    </div>
                </div>

        <?php }
        } else {
            echo '<p class="no-post-p">No posts found.</p>';
        }

        // Restore original post data
        wp_reset_postdata();
        ?>

    </section>

</main><!-- #main -->

<?php
get_footer();
