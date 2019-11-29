<?php

/**
 * [saasmax_customize_register auto refresh for custom logo]
 * @param  [type] $wp_customize [array]
 * @return [type]               [array]
 */
function saasmax_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'custom_logo' )->transport = 'refresh';
}
add_action( 'customize_register', 'saasmax_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function saasmax_customize_preview_js() {
	wp_enqueue_script( 'saasmax-customizer', SAASMAX_ROOT_JS . '/customizer.js', array( 'customize-preview' ), SAASMAX_VERSION, true );
}
add_action( 'customize_preview_init', 'saasmax_customize_preview_js' );