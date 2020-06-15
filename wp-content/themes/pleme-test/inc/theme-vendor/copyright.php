<?php 

add_action( 'customize_register', 'kamaengine_register_theme_customizer' );
/*
 * Register copyright in customizer
 */
function kamaengine_register_theme_customizer( $wp_customize ) {
	// Create custom panel.
	$wp_customize->add_panel( 'text_blocks', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Footer', 'Pleme Theme' ),
		'description'    => __( 'Set editable text for certain content.', 'Pleme Theme' ),
	) );
	// Add Footer Text
	// Add section.
	$wp_customize->add_section( 'custom_copiyright' , array(
		'title'    => __('Change Footer Text','Pleme Theme'),
		'panel'    => 'text_blocks',
		'priority' => 10
	) );
	// Add setting
	$wp_customize->add_setting( 'footer_copyright', array(
		 'default'           => __( '© Copyright KamaEngineTheme '. date("Y"), 'Pleme Theme' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'custom_copiyright',
		    array(
		        'label'    => __( 'Copiyright', 'Pleme Theme' ),
		        'section'  => 'custom_copiyright',
		        'settings' => 'footer_copyright',
		        'type'     => 'text'
		    )
	    )
	);
 	// Sanitize text
	function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}
}