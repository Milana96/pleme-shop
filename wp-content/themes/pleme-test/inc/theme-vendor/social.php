<?php 
add_action( 'customize_register', 'kamaengine_register_theme_social' );
/*
 * Register social media in customizer
 */
function kamaengine_register_theme_social( $wp_customize ) {
	// Create custom panel.
	$wp_customize->add_panel( 'social_media', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Social Media', 'Pleme Theme' ),
		'description'    => __( 'Set social media.', 'Pleme Theme' ),
	) );
	// Social media settings
   $socials = array(
		[
			'label' => 'Facebook',
			'section' => 'theme_fb_media',
			'img' => 'theme_fb_media_img',
			'url' => 'theme_fb_media_url',
			'kamaengine_url' => 'https://www.facebook.com/',
		],
		[
			'label' => 'Instagram',
			'section' => 'theme_insta_media',
			'img' => 'theme_insta_media_img',
			'url' => 'theme_insta_media_url',
			'kamaengine_url' => 'https://www.instagram.com/',
		],
		[
			'label' => 'Twitter',
			'section' => 'theme_tw_media',
			'img' => 'theme_tw_media_img',
			'url' => 'theme_tw_media_url',
			'kamaengine_url' => 'https://twitter.com/',
		],
		[
			'label' => 'LinkedIn',
			'section' => 'theme_in_media',
			'img' => 'theme_in_media_img',
			'url' => 'theme_in_media_url',
			'kamaengine_url' => 'https://www.linkedin.com/',
		],
		[
			'label' => 'YouTube',
			'section' => 'theme_yt_media',
			'img' => 'theme_yt_media_img',
			'url' => 'theme_yt_media_url',
			'kamaengine_url' => 'https://www.youtube.com/',
		],
		[
			'label' => 'Google',
			'section' => 'theme_g_media',
			'img' => 'theme_g_media_img',
			'url' => 'theme_g_media_url',
			'kamaengine_url' => 'https://www.google.com/',
		],
		[
			'label' => 'Snapchat',
			'section' => 'theme_snap_media',
			'img' => 'theme_snap_media_img',
			'url' => 'theme_snap_media_url',
			'kamaengine_url' => 'https://www.snapchat.com/',
		],
		[
			'label' => 'Tumblr',
			'section' => 'theme_tumblr_media',
			'img' => 'theme_tumblr_media_img',
			'url' => 'theme_tumblr_media_url',
			'kamaengine_url' => 'https://www.tumblr.com/',
		],
		[
			'label' => 'Pinterest',
			'section' => 'theme_pinterest_media',
			'img' => 'theme_pinterest_media_img',
			'url' => 'theme_pinterest_media_url',
			'kamaengine_url' => 'https://www.pinterest.com/',
		],
		[
			'label' => 'Reddit',
			'section' => 'theme_reddit_media',
			'img' => 'theme_reddit_media_img',
			'url' => 'theme_reddit_media_url',
			'kamaengine_url' => 'https://www.reddit.com/',
		],
		[
			'label' => 'Flickr',
			'section' => 'theme_flickr_media',
			'img' => 'theme_flickr_media_img',
			'url' => 'theme_flickr_media_url',
			'kamaengine_url' => 'https://www.flickr.com/',
		],
		[
			'label' => 'Behance',
			'section' => 'theme_behance_media',
			'img' => 'theme_behance_media_img',
			'url' => 'theme_behance_media_url',
			'kamaengine_url' => 'https://www.behance.net/',
		],
	);

    foreach ($socials as $key => $social) {
		// Add section
		$wp_customize->add_section( $social['section'] , array(
			'title'    => __($social['label'],'Pleme Theme'),
			'panel'    => 'social_media',
			'priority' => $$key
		) );

		// Add settings
		$wp_customize->add_setting( $social['url'], array(
			'default' => __( $social['kamaengine_url'], 'Pleme Theme' ),
			'sanitize_callback' => 'text_sanitize',
		) );
		$wp_customize->add_setting($social['img'], array(
			'transport'         => 'refresh',
			'height'         => 150,
		));
		
		// Add controls
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			$social['section'],
				array(
					'label'    => __( $social['label'] . ' URL', 'Pleme Theme' ),
					'section'  => $social['section'],
					'settings' => $social['url'],
					'type'     => 'text'
				)
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $social['img'], array(
			'label'             => __($social['label'] . ' Image', 'Pleme Theme'),
			'section'           => $social['section'],
			'settings'          => $social['img'],    
		))); 
	}
	
}