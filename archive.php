<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package D_Theme
 */

get_header();
$single_hero_backup = site_url() . '/wp-content/uploads/2024/04/Default_A_stunning_curvaceous_woman_with_cascading_locks_of_ha_3.jpg';
?>

<main id="primary" class="site-main">

	<!-- Hero Image Section -->

	<section class="post-hero">
		<h1 class="page-hero-title">
			<?php the_archive_title(); ?>
		</h1>
		<img class="single-hero-img" src="<?php echo $single_hero_backup; ?>" alt="Hero Image">
	</section>

	<!-- Blog Posts Section -->

	<section class="blog-posts-section">
		<div class="container">
			<div class="blog-posts-holder">
				<div class="blog-posts-main col-md-8">
					<?php
					if (have_posts()):
						while (have_posts()):
							the_post();
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
						global $wp_query;
						?>
						<div class="pagination">
							<?php
							echo paginate_links(array(
								'total' => $wp_query->max_num_pages,
								'current' => max(1, get_query_var('paged')),
								'prev_text' => __('« Previous', 'd-theme'),
								'next_text' => __('Next »', 'd-theme'),
							));
							?>
						</div>
						<?php
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
