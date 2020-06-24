<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pleme Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="theme-color" content="#fff"> -->
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/png" href="<?php echo get_theme_mod('favicon_image'); ?>" />

	<?php wp_head(); ?>
	<?php echo wp_kses(get_theme_mod('google_analytics_code'), ['script' => []]); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'Pleme Theme'); ?></a>

		<header id="masthead" class="site-header">
			<div class="container">
				<div class="logo-menu-wrapper">
					<div class="site-logo-description">
						<div class="site-logo">
							<?php the_custom_logo(); ?>
						</div>
						<div class="site-branding">
							<?php if (is_front_page() && is_home()) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
							<?php
							endif;
							$kamaengine_description = get_bloginfo('description', 'display');
							if ($kamaengine_description || is_customize_preview()) : ?>
								<p class="site-description"><?php echo $kamaengine_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->
					</div>
					<!--#site-navigation menu animations: anim-left, anim-right, anim-top, anim-popup -->
					<nav id="site-navigation" class="main-navigation anim-left" role="navigation">
						<span class="hamburger menu-toggle">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</span>
						<?php wp_nav_menu(array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'main-header-menu'
						)); ?>
						<!--Custom cart start-->
						<?php global $woocommerce; ?>
						<a class="cart-icon" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('Pogledaj korpu'); ?>"><?php echo sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?></a>
						<!--Custom cart end-->
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</header><!-- #masthead -->
						
		<span class="close-subscribe">
		</span>				
		<div id="subscribe">
			<?php echo do_shortcode('[mc4wp_form id="961"]'); ?>
		</div>
		
		<div id="content" class="site-content">