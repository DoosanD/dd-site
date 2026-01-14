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
				<ul class="footer-content-list">
					<li class="footer-content-year">©<?php echo date("Y"); ?></li>
					<li><a href="" class="footer-content-link">About</a></li>
					<li><a href="" target="_blank" rel="noopener noreferrer" class="footer-content-link">Privacy Policy</a></li>
					<li><a href="" target="_blank" rel="noopener noreferrer" class="footer-content-link">Contact</a></li>
					<li><a href="" target="_blank" rel="noopener noreferrer" class="footer-content-link">LinkedIn</a></li>
					<li><a href="" target="_blank" rel="noopener noreferrer" class="footer-content-link">Twitter</a></li>
				</ul>
			</div>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>