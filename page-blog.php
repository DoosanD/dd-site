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

    <!-- Blog Posts Section -->

    <section class="blog-posts-section">
        <div class="container">
            <div class="blog-posts-holder">
                <div class="blog-posts-main col-md-8">
                    <?php
                    // Get current page number
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    $blog_query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 10,
                        'paged' => $paged, // Add this line
                    ));

                    if ($blog_query->have_posts()):
                        while ($blog_query->have_posts()):
                            $blog_query->the_post();
                            ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
                                <?php
                                $fallback_image_id = 71;
                                if (has_post_thumbnail()):
                                    ?>
                                    <div class="blog-post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('full', ['alt' => get_the_title(), 'class' => 'blog-post-thumbnail-img']); ?>
                                        </a>
                                    </div>
                                <?php elseif ($fallback_image_id):
                                    $fallback_image = wp_get_attachment_image($fallback_image_id, 'full', false, ['alt' => get_the_title(), 'class' => 'blog-post-thumbnail-img']);
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
                                        <a href="<?php the_permalink(); ?>" class="blog-post-link">
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

                        // Add pagination links here
                        ?>
                        <div class="pagination">
                            <?php
                            echo paginate_links(array(
                                'total' => $blog_query->max_num_pages,
                                'current' => $paged,
                                'prev_text' => __('« Previous', 'd-theme'),
                                'next_text' => __('Next »', 'd-theme'),
                            ));
                            ?>
                        </div>
                        <?php

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
