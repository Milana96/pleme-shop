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
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php if ( have_posts() ) : ?>
			
				<!-- the loop -->
				<?php while ( have_posts() ) : the_post(); 
					get_template_part( 'template-parts/page/content', 'page' );

				

					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>

					<?php echo 'First name: ' .get_post_meta( get_the_ID(), 'contact_first-name', true ) ?><br>
					<?php echo 'Last name: ' .get_post_meta( get_the_ID(), 'contact_last-name', true ) ?><br>
					<?php echo 'Email: ' .get_post_meta( get_the_ID(), 'contact_email', true ) ?>

			
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
