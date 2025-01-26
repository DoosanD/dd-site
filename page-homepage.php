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
    <!-- Iddle timer 26.01.2025 074 -->
    <!-- HERO SECTION -->
    <section class="home-section hero-section">
        <?php
        // Start the WordPress loop
        $args = array(
            'posts_per_page' => 1, // Only retrieve the latest post
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post(); ?>

                <div class="container">
                    <div class="col-md-6">
                        <div class="hero-image-holder">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('full', array('class' => 'hero-post-image')); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <article class="dd-hero-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-header">
                                <a href="<?php the_permalink(); ?>" class="post-title-a main-link-style"
                                    style="--font-color:#000;">
                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                </a>
                            </div>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                            <div class="entry-footer">
                                <!-- <span class="posted-on"><?php the_date(); ?></span> -->
                                <span class="byline">by <?php the_author(); ?></span>
                                <span class="hero-category"><?php the_category() ?></span>
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
    <!-- HERO SECTION END-->

    <!-- BLOG SECTION -->
    <section class="blog-section blog-home">
        <div class="container">
            <?php
            // Start the WordPress loop
            $args = array(
                'posts_per_page' => 3, // Number of posts per page
                'orderby' => 'date', // Order by date (most recent first)
                'order' => 'DESC', // Order descending
                'category_name' => 'popular' // Replace 'your-category-slug' with the slug of your category
            );

            $query = new WP_Query($args);


            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $i++;
                    ?>

                    <div class="blog-container-<?= $i; ?>">

                        <article class="dd-blog-article col-md-4" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="blog-image-holder">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('full', array('class' => 'blog-post-image')); ?>
                                <?php endif; ?>
                            </div>
                            <div class="entry-header">
                                <a href="<?php the_permalink(); ?>" class="post-title-a main-link-style"
                                    style="--font-color:#000;">
                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                </a>
                            </div>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                            <div class="entry-footer">
                                <!-- <span class="posted-on"><?php the_date(); ?></span> -->
                                <span class="byline">by <?php the_author(); ?></span>
                            </div>
                        </article>

                    </div>

                <?php }
            } else {
                echo '<p class="no-post-p">No posts found.</p>';
            }

            // Restore original post data
            wp_reset_postdata();
            ?>
        </div>
    </section>
    <!-- BLOG SECTION -->

    <!-- BANNER SECTION -->
    <section class="banner-section"></section>
    <!-- BANNER SECTION -->

</main><!-- #main -->

<?php
get_footer();
