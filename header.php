<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package D_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<div class="container section-container">
				<div class="header-content">
					<div class="site-branding --d-flex-center">
						<?php the_custom_logo(); ?>
					</div><!-- .site-branding -->

					<nav id="site-navigation" class="d-navigation navbar-default navbar">

						<div class="search-container">
							<?php get_search_form(); ?>
						</div>

						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed d-x-collapse" data-toggle="collapse"
								data-target="#d-collapse-menu">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

						<div class="collapse navbar-collapse" id="d-collapse-menu">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'menu-1',
								'menu_id' => 'primary-menu'
							));
							?>
						</div>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</header><!-- #masthead -->