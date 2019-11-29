<?php

/*---------------------------------------
	DEFINE FILE FOLDER ROOT
-----------------------------------------*/
define( 'SAASMAX_ROOT', get_template_directory() );
define( 'SAASMAX_ROOT_URI', get_template_directory_uri() );
define( 'SAASMAX_ROOT_IMAGE', SAASMAX_ROOT_URI .'/assets/img' );
define( 'SAASMAX_ROOT_CSS', SAASMAX_ROOT_URI .'/assets/css' );
define( 'SAASMAX_ROOT_JS', SAASMAX_ROOT_URI .'/assets/js' );
define( 'SAASMAX_ROOT_PLUGINS', SAASMAX_ROOT_URI .'/plugins' );
 
/*----------------------------------------
	THEME VERSION CONTROL
-----------------------------------------*/
if ( site_url() == "http://localhost/saasmax" ) {
	define("SAASMAX_VERSION", time());
}else {
    define("SAASMAX_VERSION", "1.0.0");
}

/*----------------------------------------
	ADD THEME AFTER SETUP FUNCTIONALITY
-----------------------------------------*/
if (file_exists(SAASMAX_ROOT . '/inc/setup.php')) {
	require_once(SAASMAX_ROOT . '/inc/setup.php');
}

/*----------------------------------------
	ADD THEME WIDGET FUNCTIONALITY
-----------------------------------------*/
if (file_exists(SAASMAX_ROOT . '/inc/widgets.php')) {
	require_once(SAASMAX_ROOT . '/inc/widgets.php');
}

/*----------------------------------------
 * IMPLEMENT ALL SCRIPTS
-----------------------------------------*/
if (file_exists(SAASMAX_ROOT . '/inc/scripts.php')) {
	require_once(SAASMAX_ROOT . '/inc/scripts.php');
}

/*----------------------------------------
 * 	CUSTOM TEMPLATE TAGS FOR THIS THEME.
 ----------------------------------------*/
 if (file_exists( SAASMAX_ROOT . '/inc/template-tags.php' )) {
 	require_once( SAASMAX_ROOT . '/inc/template-tags.php' );
 }

/*--------------------------------------
	FUNCTIONS WHICH ENHANCE THE THEME BY HOOKING INTO WORDPRESS.
----------------------------------------*/
if (file_exists( SAASMAX_ROOT . '/inc/template-functions.php' )) {
	require_once( SAASMAX_ROOT . '/inc/template-functions.php' );
}

/*--------------------------------------
	FUNCTIONS FOR THEME OPTIONS STYEING.
----------------------------------------*/
if (file_exists( SAASMAX_ROOT . '/inc/style.php' )) {
	require_once( SAASMAX_ROOT . '/inc/style.php' );
}

/*--------------------------------------
	CUSTOM FUNCTIONS .
----------------------------------------*/
if (file_exists( SAASMAX_ROOT .'/inc/custom-functions.php' )) {
	require_once( SAASMAX_ROOT .'/inc/custom-functions.php' );
}
/*--------------------------------------
	CUSTOM NAV WALKER .
----------------------------------------*/
if (file_exists( SAASMAX_ROOT .'/inc/nav-menu-walker.php' )) {
	require_once( SAASMAX_ROOT .'/inc/nav-menu-walker.php' );
}
/*--------------------------------------
	THEME OPTON & CUSTOMIZER ADDITIONS.
----------------------------------------*/
if (file_exists(SAASMAX_ROOT . '/inc/customizer.php')) {
	require_once( SAASMAX_ROOT . '/inc/customizer.php' );
}

if (file_exists(SAASMAX_ROOT . '/lib/metabox-and-theme-option.php')) {
	require_once( SAASMAX_ROOT . '/lib/metabox-and-theme-option.php' );
}

/*--------------------------------------
	REQUIRED PLUGINS.
----------------------------------------*/
if (file_exists(SAASMAX_ROOT . '/inc/required-plugins.php')) {
	require_once( SAASMAX_ROOT . '/inc/required-plugins.php' );
}

/*--------------------------------------
	WOOCOMMERCE
----------------------------------------*/
if (class_exists('WooCommerce')) {
	require_once( SAASMAX_ROOT . '/inc/woocommerce.php' );
}
