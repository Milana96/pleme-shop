<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' )[0];
			?>
			<img src="<?= $image ?>" class="logo">
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation anim-left">
			<button class="hamburger menu-toggle hamburger--collapse" aria-controls="primary-menu" aria-expanded="false">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'     =>  'main-menu',
					'before_container' => '$image'
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<?php $hero_image = get_template_directory_uri() . '/assets/images/background-image.jpg'; ?>
	<div id="content" class="site-content">
		<section id="hero" style="background-image: url(<?= $hero_image ?>)">
				
		</section>
