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
                            <div class="entry-content-main">
                                <p class="entry-content-main-p">
                                    <?php echo wp_trim_words(get_the_excerpt(), 29, '...'); ?>
                                </p>
                            </div>
                            <div class="entry-footer-main">
                                <span class="posted-on"><?php the_date('j M, Y'); ?></span>
                                <span class="byline">by <?php the_author(); ?></span>
                                <!-- <span class="hero-category"><?php the_category() ?></span> -->
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
            <div class="typewriter">
                <h2 class="h2-global"><?= $pods_home->display(name: 'blog_title') ?></h2>
            </div>
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
                    $date = get_the_date('j M, Y');
                    ?>

                    <div class="blog-container-<?= $i; ?> dd-blog-container">
                        <a class="blog-card-link" href="<?php the_permalink(); ?>">
                            <article class="dd-blog-article col-md-4" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="blog-image-holder">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('full', array('class' => 'blog-post-image')); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="entry-header">
                                    <h3 class="entry-title main-link-style" style="--font-color:#000;">
                                        <?php the_title(); ?>
                                    </h3>
                                </div>
                                <div class="entry-content">
                                    <p class="entry-content-p">
                                        <?php echo wp_trim_words(get_the_excerpt(), 29, '...'); ?>
                                    </p>
                                </div>
                                <div class="entry-footer">
                                    <span class="posted-on"><?php echo esc_html($date); ?></span>
                                    <span class="byline">by <?php the_author(); ?></span>
                                </div>
                            </article>
                        </a>
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
            <div class="typewriter">
                <h2 class="sbanner-title h2-global"><?= $pods_home->display('rss_title') ?></h2>
            </div>
            <?php
            // Use WordPress's built-in feed fetcher (SimplePie) - no API key required.
            if (!function_exists('fetch_feed')) {
                include_once ABSPATH . WPINC . '/feed.php';
            }

            $feed_url = 'https://rss.nytimes.com/services/xml/rss/nyt/World.xml';
            $max_items = 8;
            $rss_items = [];

            $rss = fetch_feed($feed_url);

            $feed_image = '';
            if (!is_wp_error($rss)) {
                $max_items = $rss->get_item_quantity($max_items);
                $rss_items = $rss->get_items(0, $max_items);
                if (method_exists($rss, 'get_image_url')) {
                    $feed_image = $rss->get_image_url();
                }
            }

            if (empty($rss_items)): ?>
                <p class="no-news">No news available right now.</p>
            <?php else: ?>


                <div class="sbanner-grid">
                    <?php foreach ($rss_items as $item): ?>
                        <?php
                        $image_url = '';

                        // 1) Try enclosure (common for podcasts/images)
                        $enclosure = $item->get_enclosure();
                        if ($enclosure) {
                            $image_url = $enclosure->get_link();
                        }

                        // 2) Try media:thumbnail (media RSS)
                        if (empty($image_url)) {
                            $media = $item->get_item_tags('http://search.yahoo.com/mrss/', 'thumbnail');
                            if (!empty($media[0]['attribs']['']['url'])) {
                                $image_url = $media[0]['attribs']['']['url'];
                            }
                        }

                        // 3) Fallback: extract first <img> from description/content
                        if (empty($image_url)) {
                            $desc = $item->get_description();
                            if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $desc, $matches)) {
                                $image_url = $matches[1];
                            }
                        }

                        // 4) Last resort: use stock image from media library
                        if (empty($image_url)) {
                            $image_url = wp_get_attachment_image_url(71, 'thumbnail'); // Replace 71 with your stock image attachment ID
                        }
                        ?>

                        <a class="sbanner-a" href="<?php echo esc_url($item->get_permalink()); ?>" target="_blank"
                            rel="noopener noreferrer">
                            <article class="sbanner-item">
                                <?php if (!empty($image_url)): ?>
                                    <div class="sbanner-item-image">
                                        <img class="rss-img" width="253" height="253" src="<?php echo esc_url($image_url); ?>"
                                            alt="<?php echo esc_attr($item->get_title()); ?>">
                                    </div>
                                <?php endif; ?>

                                <?php echo esc_html($item->get_title()); ?>
                                <time class="sbanner-time" datetime="<?php echo esc_attr($item->get_date('c')); ?>">
                                    <?php echo esc_html($item->get_date('j M, Y')); ?>
                                </time>
                            </article>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- RSS BANNER (SHORT NEWS) SECTION -->

    <!-- NEWSLETTER SECTION -->
    <section class="newsletter-section dd-section">
        <div class="container">
            <div class="newsletter-container">
                <div class="typewriter">
                    <h2 class="h2-global"><?= $pods_home->display('newsletter_title') ?></h2>
                </div>
                <form class="newsletter-form" action="#" method="post">
                    <input type="email" name="email" class="newsletter-input" placeholder="Enter your email address"
                        required>
                    <div class="newsletter-btn-holder">
                        <button type="submit" class="newsletter-btn"><span>Join The List</span></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- NEWSLETTER SECTION -->

</main><!-- #main -->

<?php
get_footer();
