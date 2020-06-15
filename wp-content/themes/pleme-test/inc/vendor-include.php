<?php
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/theme-vendor/custom-header.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/theme-vendor/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/theme-vendor/jetpack.php';
}
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/theme-vendor/template-functions.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/theme-vendor/template-tags.php';
/**************************************************
 * Disable Emojis
 **************************************************/
require get_template_directory() . '/inc/theme-vendor/disable-emojis.php';
/**************************************************
 * Browser Detection
 **************************************************/
require get_template_directory() . '/inc/theme-vendor/browser-detection.php';
/**************************************************
 * SVG Logo in Customizer
 **************************************************/
require get_template_directory() . '/inc/theme-vendor/svg-logo.php';
/**************************************************
* Customizer Copyright
**************************************************/
require get_template_directory() . '/inc/theme-vendor/copyright.php';
/**************************************************
* Customizer Socila media
**************************************************/
require get_template_directory() . '/inc/theme-vendor/social.php';
/**************************************************
* Customizer Google analytics
**************************************************/
require get_template_directory() . '/inc/theme-vendor/google_analytics.php';
/**************************************************
* Theme SVG upload fix
**************************************************/
require get_template_directory() . '/inc/theme-vendor/svg_upload.php';
/**************************************************
* Theme sanitize functions
**************************************************/
require get_template_directory() . '/inc/theme-vendor/sanitize.php';
