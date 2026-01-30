<?php

/**
 * Template Name: Blog
 * 
 * The template for displaying Blog Template
 * 
 * @package D_Theme
 */

get_header();
$single_hero = get_the_post_thumbnail_url();
$single_hero_backup = site_url() . '/wp-content/uploads/2024/04/Default_A_stunning_curvaceous_woman_with_cascading_locks_of_ha_3.jpg';
?>

<main id="primary" class="site-main">

    <!-- Hero Image Section -->

    <section class="post-hero">
        <img class="single-hero-img" src="<?php if (empty($single_hero)) {
            echo $single_hero_backup;
        } else {
            echo $single_hero;
        } ?>" alt="Hero Image">
    </section>

    <!-- Blog Posts Section -->

    <section class="blog-posts-section">
        <div class="container">
            <div class="blog-posts-holder">
                <div class="blog-posts-main col-md-8">
                    <?php
                    $blog_query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 10,
                    ));

                    if ($blog_query->have_posts()):
                        while ($blog_query->have_posts()):
                            $blog_query->the_post();
                            ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>

                                <?php
                                // Set your fallback image ID here (get this from Media Library)
                                $fallback_image_id = 71; // Replace 123 with your actual image ID
                        
                                if (has_post_thumbnail()):
                                    // Show featured image if it exists
                                    ?>
                                    <div class="blog-post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                                        </a>
                                    </div>
                                <?php elseif ($fallback_image_id):
                                    // Show fallback image if no featured image
                                    $fallback_image = wp_get_attachment_image($fallback_image_id, 'medium', false, ['alt' => get_the_title()]);
                                    if ($fallback_image):
                                        ?>
                                        <div class="blog-post-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo $fallback_image; ?>
                                            </a>
                                        </div>
                                        <?php
                                    endif;
                                endif;
                                ?>
                                <div class="blog-post-information">

                                    <h2 class="blog-post-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>

                                    <div class="blog-post-meta">
                                        <span class="blog-post-date">
                                            <?php echo get_the_date(); ?>
                                        </span>
                                        <span class="blog-post-author">by
                                            <?php the_author(); ?>
                                        </span>
                                    </div>

                                    <div class="blog-post-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>

                                </div>
                            </article>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                        ?>
                        <p>
                            <?php esc_html_e('No posts found.', 'd-theme'); ?>
                        </p>
                        <?php
                    endif;
                    ?>
                </div>
                <div class="blog-posts-sidebar col-md-4">
                    <?php get_template_part('template-parts/template-part', 'sidebar'); ?>
                </div>
            </div>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();
