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
	<div class="post-hero">
		<img src="<?php echo esc_url($single_hero); ?>" alt="Hero Image">
	</div>
	<h1 class="post-title"><?php single_post_title(); ?></h1>
	</div>
	<div class="post-content"><?php the_content(); ?></div>

</main><!-- #main -->

<?php
get_footer();
