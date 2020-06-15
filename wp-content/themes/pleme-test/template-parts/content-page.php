<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pleme Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	</header><!-- .entry-header -->

	<?php kamaengine_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
/////////////////// Check if this is the right way for doing this!!!!
		// if (is_product_category())  {
			get_template_part( 'template-parts/shop/content', 'category' );
		// } else {
			// get_template_part( 'template-parts/content', 'page' );
		// }
		the_content();
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
