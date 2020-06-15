<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pleme Theme
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', 'single'); ?>

			<?php
			if (has_term('moda' || 'ljepota' || 'zivot' || 'aksesoari', 'category', null) == 1) { ?>
				<div class="buttons">
					<span class="previous-button more-link"><?php previous_post_link() ?></span>
					<span class="next-button more-link"><?php next_post_link() ?></span>
				</div>
			<?php }
			?>

		<?php
		// Default WP navigation
		// the_post_navigation();

		// Author informations
		// get_template_part( 'template-parts/post', 'author' );
		// Share links
		// the_share_post_links();
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
