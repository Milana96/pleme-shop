<?php
/**
 * Template Name: Custom page
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
<?php
	$args = array(
	'author_name' => 'pleme',
    'meta_key'   => 'Mood',
    'meta_value' => 'something'
);

// the query
$the_query = new WP_Query( $args ); ?>
 
<?php if ( $the_query->have_posts() ) : ?>
 
    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php get_template_part( 'template-parts/post/content', get_post_format() );?>
 
    <?php endwhile; ?>
    <!-- end of the loop -->
 
    <!-- pagination here -->
 
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

			
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
