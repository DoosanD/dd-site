<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package D_Theme
 */

?>

<footer id="colophon" class="site-footer">
	<div class="site-info">
		<div class="footer-logo"><?php the_custom_logo(); ?></div>
		<div class="container">
			<div class="footer-inner-holder">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'footer-menu',
					'menu_id' => 'footer-menu',
					'menu_class' => 'footer-content-list'
				));
				?>
			</div>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>