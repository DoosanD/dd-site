<?php

/**
 * Template Name: Homepage
 * 
 * The template for displaying Homepage Template
 * 
 * @package D_Theme
 */
$pods_home = function_exists('pods') ? pods('home') : null;
get_header();
?>

<main id="primary" class="site-main">

    <!-- HERO SECTION -->
    <section class="home-section hero-section dd-section">
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
                                    <!-- <h1 class="entry-title"><?= $pods_home->display('hero_title') ?></h1> -->
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
    <section class="blog-section blog-home dd-section">
        <div class="container">
            <h2 class="h2-global">Popular Posts</h2>
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

                    <div class="blog-container-<?= $i; ?> dd-blog-container">

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

    <!-- RSS BANNER (SHORT NEWS) SECTION -->
    <section class="sbanner-section dd-section">
        <div class="container">
            <h2 class="sbanner-title h2-global">If the story doesn't make sense, follow the money.</h2>
            <?php
            // Use WordPress's built-in feed fetcher (SimplePie) - no API key required.
            if ( ! function_exists( 'fetch_feed' ) ) {
                include_once ABSPATH . WPINC . '/feed.php';
            }
            
            $feed_url = 'https://news.google.com/rss/search?q=when:24h+allinurl:bloomberg.com&hl=en-US&gl=US&ceid=US:en'; // BBC News RSS (no API key)
            $max_items = 8;
            
            $rss = fetch_feed( $feed_url );
            
            if ( ! is_wp_error( $rss ) ) {
                $max_items = $rss->get_item_quantity( $max_items );
                $rss_items = $rss->get_items( 0, $max_items );
            }
            
            if ( empty( $rss_items ) ) : ?>
                <p class="no-news">No news available right now.</p>
                <?php else : ?>
                    <div class="sbanner-grid">
                        <?php foreach ( $rss_items as $item ) : ?>
                            <article class="sbanner-item">
                                <a class="sbanner-a" href="<?php echo esc_url( $item->get_permalink() ); ?>" target="_blank" rel="noopener noreferrer">
                                    <?php echo esc_html( $item->get_title() ); ?>
                                </a>
                                <time class="sbanner-time" datetime="<?php echo esc_attr( $item->get_date( 'c' ) ); ?>">
                                    <?php echo esc_html( $item->get_date( 'M j, Y' ) ); ?>
                                </time>
                            </article>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>
                <!-- RSS BANNER (SHORT NEWS) SECTION -->

                <!-- BANNER SECTION -->
                <section class="banner-section dd-section"></section>
                <!-- BANNER SECTION -->
                
            </main><!-- #main -->
            
            <?php
get_footer();
