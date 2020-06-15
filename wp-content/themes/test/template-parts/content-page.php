<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Test
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	
	</header><!-- .entry-header -->

	<?php test_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'test' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
		<footer class="entry-footer">
			
		</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
