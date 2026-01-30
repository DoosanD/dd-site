<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

	<!-- Title Section -->

	<section class="single-main-section">
		<div class="post-title container">
			<h1 class="post-title-h1"><?php single_post_title(); ?></h1>
			<div class="post-title-description">
				<p class="post-author">
					<?php
					$post = get_post();
					$author_id = $post->post_author;
					$author_name = get_the_author_meta('display_name', $author_id);
					echo !empty($author_name) ? $author_name : 'Unknown Author';
					?>
				</p>
				<p class="post-date">
					<?php echo get_the_date(); ?>
				</p>
				<p class="post-category">
					<?php
					$categories = get_the_category();
					if (!empty($categories)) {
						foreach ($categories as $category) {
							echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="category-link">' . esc_html($category->name) . '</a>';
						}
					}
					?>
				</p>
			</div>
		</div>
	</section>

	<!-- Content Section -->

	<section class="single-content-section">
		<div class="post-content"><?php the_content(); ?></div>
	</section>


</main><!-- #main -->

<?php
get_footer();
