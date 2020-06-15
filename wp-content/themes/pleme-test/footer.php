<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pleme Theme
 */

?>
	</div><!-- #content -->
	<footer id="colophon" class="site-footer">
		<div class="site-footer-wrapper">
			<?php get_template_part( 'template-parts/footer/content','widgets' ); ?>
			<?php get_template_part( 'template-parts/footer/content','copyright' ); ?>
		</div>
		<div id="return-to-top"><i class="fas fa-chevron-up"></i></div> 
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
