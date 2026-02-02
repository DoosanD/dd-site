<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
			<?php the_title(); ?>
		</h1>
		<img class="single-hero-img" src="<?php if (empty($single_hero)) {
			echo $single_hero_backup;
		} else {
			echo $single_hero;
		} ?>" alt="Hero Image">
	</section>

	<!-- Content Section -->

	<section class="single-content-section">
		<div class="post-content">
			<?php the_content(); ?>
		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();
