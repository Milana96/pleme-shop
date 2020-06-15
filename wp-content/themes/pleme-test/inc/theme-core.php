<?php
/**************************************************
* All theme options and functions
*
* Disable gutenberg for posts
**************************************************/
add_filter('use_block_editor_for_post', '__return_false', 10);
/**************************************************
* Disable gutenberg for post types
**************************************************/
add_filter('use_block_editor_for_post_type', '__return_false', 10);
/**************************************************
* Disable gutenberg style in Front
**************************************************/
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
/**************************************************
 * Get social media
 **************************************************/
require get_template_directory() . '/inc/theme-functions/get_social.php';
/**************************************************
 * Share posts function
 **************************************************/
require get_template_directory() . '/inc/theme-functions/share_post.php';
/**************************************************
 * Theme paginations
 **************************************************/
require get_template_directory() . '/inc/theme-functions/get_pagination.php';
/**************************************************
 * Trim archive title
 **************************************************/
require get_template_directory() . '/inc/theme-functions/trim_archive_title.php';