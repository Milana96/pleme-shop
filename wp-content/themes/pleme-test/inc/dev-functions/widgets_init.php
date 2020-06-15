<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kamaengine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'Pleme Theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'Pleme Theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
        'name' => esc_html__('Footer column 1', 'Pleme Theme'),
        'id' => 'footer-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer column 2', 'Pleme Theme'),
        'id' => 'footer-2',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer column 3', 'Pleme Theme'),
        'id' => 'footer-3',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer column 4', 'Pleme Theme'),
        'id' => 'footer-4',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action( 'widgets_init', 'kamaengine_widgets_init' );