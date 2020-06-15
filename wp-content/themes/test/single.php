<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Test
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		function get_next_prev_url($post, $prev_next) {
			if ( ! empty( $post ) ) :
				echo '<a href="' . get_permalink( $post->ID ) . '">';
					echo  '<p>' . get_the_title($post->ID) . '</p>';
					echo '<img src="' . get_the_post_thumbnail_url($post->ID, 'thumbnail') . '">';
					echo '<p class="prev-next-button">'  .$prev_next. '</p>';
				echo '</a>';
			endif; 
		}

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			echo '<div class="prev-next">';
				get_next_prev_url(get_previous_post(), 'Previous');
				get_next_prev_url(get_next_post(), 'Next');
			echo '</div>';

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
