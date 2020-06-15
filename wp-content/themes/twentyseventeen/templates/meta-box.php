<?php
/**
 * Template Name: Meta box page
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
           <!-- Display only custom post type (new post type) on page New Post Type -->

            <?php if( 'new_post_type' == get_post_type()) : ?>

                <?php while ( have_posts() ) : the_post(); ?>
                <?php endwhile; ?>

            <?php endif; ?>	

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();?>


