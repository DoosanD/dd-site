<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
		<h1 class="page-hero-title">
			404 - Page Not Found
		</h1>
		<img class="single-hero-img" src="<?php if (empty($single_hero)) {
			echo $single_hero_backup;
		} else {
			echo $single_hero;
		} ?>" alt="Hero Image">
	</section>

	<section class="error-404 not-found">
		<div class="container">
			<header class="page-header">
				<h2 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'd-theme'); ?></h2>
			</header><!-- .page-header -->

			<div class="page-content content-404">
				<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'd-theme'); ?>
				</p>

				<?php
				get_search_form();

				the_widget('WP_Widget_Recent_Posts');
				?>

				<div class="widget widget_categories">
					<h2 class="widget-title"><?php esc_html_e('Most Used Categories', 'd-theme'); ?></h2>
					<ul>
						<?php
						wp_list_categories(
							array(
								'orderby' => 'count',
								'order' => 'DESC',
								'show_count' => 1,
								'title_li' => '',
								'number' => 10,
							)
						);
						?>
					</ul>
				</div><!-- .widget -->

				<?php
				/* translators: %1$s: smiley */
				$d_theme_archive_content = '<p class="archive-p">' . sprintf(esc_html__('Try looking in the monthly archives. %1$s', 'd-theme'), convert_smilies(':)')) . '</p>';
				the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$d_theme_archive_content");

				the_widget('WP_Widget_Tag_Cloud');
				?>

			</div><!-- .page-content -->
		</div><!-- .container -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
