<?php
add_action('customize_register', 'kamaengine_register_google_analytics');
/*
 * Register social media in customizer
 */
function kamaengine_register_google_analytics($wp_customize)
{
	//Google analytics
	$wp_customize->add_section('google_analytics', array(
		'title'      => __('Google analytics code', 'Pleme Theme'),
		'description'    => __('Enter your google analytics code', 'Pleme Theme'),
		'priority'   => 501,
	));
	$wp_customize->add_setting('google_analytics_code', array(
		'default'   => '',
		'sanitize_callback' => 'textarea_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'google_analytics', array(
		'label'    => __('Google analytics', 'Pleme Theme'),
		'section'  => 'google_analytics',
		'settings' => 'google_analytics_code',
		'type'     => 'textarea',
	)));
}
