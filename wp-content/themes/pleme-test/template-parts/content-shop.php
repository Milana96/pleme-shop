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
	<?php kamaengine_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		?>
		<div class="shop" id="shop">
			<?php
			if (have_rows('shop')) :
				// Loop through rows.
				while (have_rows('shop')) : the_row();
					// Case: row section layout.
					if (get_row_layout() == 'general') :
						$full_section = get_sub_field('full_section');
			?>
						<div class="shop-text">
							<h1><?php echo esc_html($full_section['top_section_text']['heading_1']); ?></h1>
							<h4><?php echo esc_html($full_section['top_section_text']['heading_2']); ?></h4>
						</div>
						<img src='<?php echo esc_url($full_section['image']['url']) ?>' alt='<?php echo esc_attr($full_section['image']['alt']) ?>' />
			<?php
					endif;
				endwhile;
			endif;
			?>
		</div>
		<h1 class="heading">Najtraženiji proizvodi</h1>
		<?php
		the_content();
		?>
		
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->