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
?>

<main id="primary" class="site-main">

	<!-- Hero Image Section -->

	<section class="post-hero">
		<img class="single-hero-img" src="<?php echo $single_hero; ?>" alt="Hero Image">
	</section>

	<!-- Title Section -->

	<section class="single-main-section">
		<div class="post-title container">
			<h1 class="post-title-h1"><?php single_post_title(); ?></h1>
			<div class="post-title-description">
				<p class="post-date">
					Published on:
					<?php echo get_the_date(); ?>
				</p>
				<p class="post-author">
					By:
					<?php the_author(); ?>
				</p>
				<p class="post-category">
					<?php the_category(); ?>
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
