<?php

/**************************************************
 * Disable Emojis
 **************************************************/
function disable_emojis_tinymce($plugins)
{
	if (is_array($plugins)) {
		$plugins = array_diff($plugins, array('wpemoji'));
	}
	return $plugins;
}

function disable_emoji_feature()
{

	// Prevent Emoji from loading on the front-end
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');

	// Remove from admin area also
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('admin_print_styles', 'print_emoji_styles');

	// Remove from RSS feeds also
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');

	// Remove from Embeds
	remove_filter('embed_head', 'print_emoji_detection_script');

	// Remove from emails
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

	// Disable from TinyMCE editor. Currently disabled in block editor by default
	add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');

	/** Finally, disable it from the database also, 
	 *  to prevent characters from converting
	 *  Earlier, there was a setting under Writings to do this
	 *  It is not ideal to get & update it here - but it works for now
	 */

	if ((int) get_option('use_smilies') === 1) {
		update_option('use_smilies', 0);
	}
}
add_action('init', 'disable_emoji_feature');
