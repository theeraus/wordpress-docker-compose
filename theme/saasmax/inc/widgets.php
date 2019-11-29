<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saasmax_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'saasmax' ),
		'id'            => 'main-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'saasmax' ),
		'before_widget' => '<div id="%1$s" class="single-widgets %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Sidebar', 'saasmax' ),
		'id'            => 'header-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'saasmax' ),
		'before_widget' => '<div id="%1$s" class="single-widgets %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 1', 'saasmax' ),
		'id'            => 'footer-sidebar-1',
		'description'   => esc_html__( 'Add footer widgets here.', 'saasmax' ),
		'before_widget' => '<div id="%1$s" class="single-widgets %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 2', 'saasmax' ),
		'id'            => 'footer-sidebar-2',
		'description'   => esc_html__( 'Add footer widgets here.', 'saasmax' ),
		'before_widget' => '<div id="%1$s" class="single-widgets %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 3', 'saasmax' ),
		'id'            => 'footer-sidebar-3',
		'description'   => esc_html__( 'Add footer widgets here.', 'saasmax' ),
		'before_widget' => '<div id="%1$s" class="single-widgets %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 4', 'saasmax' ),
		'id'            => 'footer-sidebar-4',
		'description'   => esc_html__( 'Add footer widgets here.', 'saasmax' ),
		'before_widget' => '<div id="%1$s" class="single-widgets %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'saasmax_widgets_init' );
