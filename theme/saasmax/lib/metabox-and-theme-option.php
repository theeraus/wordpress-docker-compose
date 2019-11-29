<?php

define( 'CS_ACTIVE_SHORTCODE', false );
define( 'CS_ACTIVE_TAXONOMY', false );
define( 'CS_ACTIVE_CUSTOMIZE', false );
define( 'CS_ACTIVE_METABOX', true  );
define( 'CS_ACTIVE_FRAMEWORK', true );


if ( !function_exists('saasmax_theme_metaboxes') ) {
	/**
	 * [saasmax_theme_metaboxes description]
	 * @param  [type] $metaboxes [get all metaboxes form cs framework]
	 * @return [type]            [new all defined metaboxes array]
	 */
	function saasmax_theme_metaboxes( $metaboxes ) {
		/**
		 * [$options remove pre defined all old metaboxes]
		 * @var array
		 */
		$metaboxes      = array();
		/**
		 * 	Add New Metabox In $options array.
		 */

		$metaboxes[]    = array(
			'id'        => '_saasmax_page_metabox',
			'title'     => esc_html__( 'Page Options', 'saasmax' ),
			'post_type' => 'page',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => array(

				// begin section
				array(
					'id'     => 'page_header',
					'type'   => 'group',
					'title'  => esc_html__( 'Page Header Option', 'saasmax' ),
					'name'   => 'page_header_meta',
					'fields' => array(
						array(
							'id'      => 'enable_barner',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Barner', 'saasmax' ),
							'desc'    => esc_html__( 'If you want to show or hide page barner you can set here by toggle ( YES / NO ).', 'saasmax' ),
							'default' => true,
						),
						array(
							'id'         => 'enable_title',
							'type'       => 'switcher',
							'title'      => esc_html__( 'Enable Custom Title', 'saasmax' ),
							'desc'       => esc_html__( 'If you need custom page title you can set here.', 'saasmax' ),
							'default'    => false,
							'dependency' => array( 'enable_barner|enable_barner', '==|==', 'true|true' ),
						),
						array(
							'id'         => 'custom_title',
							'type'       => 'text',
							'title'      => esc_html__( 'Custom Page Title', 'saasmax' ),
							'desc'       => esc_html__( 'Set your preferred custom page title.', 'saasmax' ),
							'dependency' => array( 'enable_title|enable_barner', '==|==', 'true|true' ),
							'default'    => 'Your Title Here',
						),
						array(
							'id'         => 'enable_overlay',
							'type'       => 'switcher',
							'title'      => esc_html__( 'Enable Overlay', 'saasmax' ),
							'default'    => false,
							'dependency' => array( 'enable_barner', '==', 'true' ),
						),
						array(
							'id'      => 'custom_overlay',
							'type'    => 'background',
							'title'   => esc_html__( 'Barner Overlay', 'saasmax' ),
							'desc'    =>	esc_html__( 'Use a transparen image if you don\'t want use image you can set color', 'saasmax' ),		
							'default' => array(
								'image'      => SAASMAX_ROOT_IMAGE . '/pattarn.png',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#000000',
							),
							'dependency' => array( 'enable_overlay|enable_barner', '==|==', 'true|true' ),
						),
						array(
							'id'         => 'overlay_opacity',
							'type'       => 'number',
							'title'      => esc_html__( 'Overlay Opacity', 'saasmax' ),
							'desc'       => esc_html__( 'Please use max value 90 in decimel. and minimum value 0.1', 'saasmax' ),
							'default'    => '50',
							'dependency' => array( 'enable_overlay|enable_barner', '==|==', 'true|true' ),
						),
					),
				),
				// end sections


		    	// begin section
			    array(
					'id'     => 'page_menu',
					'type'   => 'group',
					'title'  => esc_html__( 'Topbar & Main Menu', 'saasmax' ),
					'name'   => 'page_menu_meta',
					'fields' => array(
						array(
							'id'      => 'enable_header_styleing',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Menu Custom Style ?', 'saasmax' ),
							'desc'    => esc_html__( 'If you want to change any header style you can check here it will be appear on this page.', 'saasmax' ),
							'default' => false,
						),
						array(
							'id'      => 'menu_width',
							'type'    => 'select',
							'title'   => esc_html__( 'Menu Container Width', 'saasmax' ),
							'desc'    => esc_html__( 'Set the menu with form here you can set ( FULLWIDTH / CONTAINER )', 'saasmax' ),
							'options' => array(
								'container'                 => esc_html__( 'Container', 'saasmax' ),
								'container container__full' => esc_html__( 'Container Full Width', 'saasmax' ),
								'container-fluid'           => esc_html__( 'Full Width', 'saasmax' ),
						  	),
							'default' => 'container',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'menu_align',
							'type'    => 'select',
							'title'   => esc_html__( 'Menu Text Align', 'saasmax' ),
							'desc'    => esc_html__( 'Set the menu text align from here', 'saasmax' ),
							'options' => array(
								'left'   =>	'Left',
								'center' =>	'Center',
								'right'  =>	'Right',
						  	),
							'default' => 'center',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'menu_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Color', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu color by color picker', 'saasmax' ),
							'default' => '#ffffff',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'menu_hover',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Hover Color', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu hover color by color picker', 'saasmax' ),
							'default' => '#00C1B1',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'menu_sticky_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Sticky Color', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu sticky color by color picker', 'saasmax' ),
							'default' => '#404873',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'menu_sticky_hover_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Sticky Hover Color', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu sticky hover color by color picker', 'saasmax' ),
							'default' => '#00C1B1',
							'dependency' => array( 'enable_header_styleing', '==', 'true' ),
						),
					),
			    ),
			    // end sections

		    	// begin section
			    array(
					'id'     => 'page_footer',
					'type'   => 'group',
					'title'  => esc_html__( 'Page Footer Option', 'saasmax' ),
					'name'   => 'page_footer_meta',
					'fields' => array(
					    array(
							'id'      => 'hide_footer',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Hide Footer ?', 'saasmax' ),
							'desc'    => esc_html__( 'If you want do not show the footer you can set here by ( YES / NO ).', 'saasmax' ),
							'default' => false,
					    ),
						array(
							'id'      => 'enable_footer_styleing',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Footer Styleing', 'saasmax' ),
							'desc'    => esc_html__( 'If you need custom style in page footer you can style here.', 'saasmax' ),
							'default' => false,
						),
						array(
							'id'      => 'footer_background',
							'type'    => 'background',
							'title'   => esc_html__( 'Footer Background', 'saasmax' ),
							'desc'    => esc_html__( 'Set the footer backgound color from here and select image. Note: if image and color you can use at a time ( if not found image automatically get the color.)', 'saasmax' ),
							'default' => array(
								'image'      => SAASMAX_ROOT_IMAGE . '/pattarn.png',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => 'cover',
								'color'      => 'rgba(0,0,0,0.01)',
							),
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'footer_overlay',
							'type'    => 'background',
							'title'   => esc_html__( 'Footer Background Overlay', 'saasmax' ),
							'desc'    => esc_html__( 'Upload a transparent image or cholse your color t set the footer background overlay', 'saasmax' ),
							'default' => array(
								'image'      => SAASMAX_ROOT_IMAGE . '/pattarn.png',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => 'rgba(0,0,0,0.01)',
							),
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'footer_overlay_opacity',
							'type'    => 'number',
							'title'   => esc_html__( 'Overlay Opacity', 'saasmax' ),
							'desc'    => esc_html__( 'Set the background footer background overlay opacity input the max value 90 in decimel.', 'saasmax' ),
							'default' => '01',
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'footer_bottom_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Footer Bottom Background', 'saasmax' ),
							'desc'    => esc_html__( 'Upload a new background image to set the footer bottom background.', 'saasmax' ),
							'default' => array(
								'image'      => SAASMAX_ROOT_IMAGE . '/pattarn.png',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => 'rgba(0,0,0,0.01)',
							),
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'text_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Footer Text Color', 'saasmax' ),
							'desc'    => esc_html__( 'Set footer text color form here.', 'saasmax' ),
							'default' => 'rgba(0,0,0,0.01)',
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'hidding_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Footer Hidding Color', 'saasmax' ),
							'desc'    => esc_html__( 'Set footer footer hidding color form here.', 'saasmax' ),
							'default' => 'rgba(0,0,0,0.01)',
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'a_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Footer links color', 'saasmax' ),
							'desc'    => esc_html__( 'Set the footer area link color', 'saasmax' ),
							'default' => 'rgba(0,0,0,0.01)',
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
						array(
							'id'      => 'a_hover',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Footer links Hover color', 'saasmax' ),
							'desc'    => esc_html__( 'Set the footer area link hover color', 'saasmax' ),
							'default' => 'rgba(0,0,0,0.01)',
							'dependency' => array( 'enable_footer_styleing', '==', 'true' ),
						),
					),
			    ),
			    // end sections

		    	// begin section
			    array(
					'id'     => 'page_custom_css',
					'type'   => 'group',
					'title'  => esc_html__( 'Page Custom Css', 'saasmax' ),
					'name'   => 'page_css_meta',
					'fields' => array(
						array(
							'id'      => 'page_cs_css',
							'type'    => 'textarea',
							'title'   => esc_html__( 'Write Custom Css Here', 'saasmax' ),
							'desc'    => esc_html__( 'Write custom css here with css selector.', 'saasmax' ),
							'default' => '',
						),
					),
			    ),
			    // end sections
		    ),
		);

		return $metaboxes;
	}
}

add_filter( 'cs_metabox_options', 'saasmax_theme_metaboxes' );


if ( !function_exists('saasmax_theme_option_panel') ) {

	/**
	 * [saasmax_theme_option_panel description]
	 * @param  [type] $options [get all option form cs framework]
	 * @return [array]          [new all defined options array]
	 */
	function saasmax_theme_option_panel( $options ) {
		/**
		 * [$options remove pre defined all old options]
		 * @var array
		 */
		$options      = array();
		/**
		 * 	Add New Option In $options array.
		 */

		/* HEADER */
		$options[]   = array(
			'name'     => 'header_section',
			'title'    => esc_html__( 'Header Section', 'saasmax' ),
			'icon'     => 'fa fa-home',
			'sections' => array(

			    // sub section
			    array(
					'name'     => 'theme_header_style',
					'title'    => esc_html__( 'Header Style', 'saasmax' ),
					'icon'     => 'fa fa-credit-card',
					'fields'   => array(
						array(
							'id'      => 'enable_header_style',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Header Style', 'saasmax' ),
							'desc'    => esc_html__( 'If you want to enable or disable header style you can set ( YES / NO )', 'saasmax' ),
							'default' => false,
						),
						array(
							'id'        => 'header_style',
							'type'      => 'image_select',
							'title'     => esc_html__( 'Header Style', 'saasmax' ),
							'desc'    	=> esc_html__( 'Select the header style which you want to show on your website.', 'saasmax' ),
							'options'   => array(
								'header-1'    => SAASMAX_ROOT_IMAGE . '/header/header_1.png',
								'header-2'    => SAASMAX_ROOT_IMAGE . '/header/header_2.png',
								'header-3'    => SAASMAX_ROOT_IMAGE . '/header/header_3.png',
								'header-4'    => SAASMAX_ROOT_IMAGE . '/header/header_4.png',
							),
							'default'   => 'header-1',
						),
					),
				),

			    // sub section
			    array(
					'name'     => 'top_bar',
					'title'    => esc_html__( 'Top Bar', 'saasmax' ),
					'icon'     => 'fa fa-bars',
					'fields'   => array(
						array(
							'id'      => 'enable_topbar',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Topbar', 'saasmax' ),
							'desc'    => esc_html__( 'If you want to enable or disable topbar you can set ( YES / NO )', 'saasmax' ),
							'default' => false,
						),
						array(
							'id'         => 'phone_number',
							'type'       => 'text',
							'title'      => esc_html__( 'Phone Number', 'saasmax' ),
							'desc'       => esc_html__( 'Set the topbar contact phone number.', 'saasmax' ),
							'default'    => '+8801744430440',
							'dependency' => array( 'enable_topbar', '==', 'true' ),
						),
						array(
							'id'         => 'email_address',
							'type'       => 'text',
							'title'      => esc_html__( 'Email Address', 'saasmax' ),
							'desc'       => esc_html__( 'Set the topbar contact email address.', 'saasmax' ),
							'default'    => 'mehedidb@gmail.com',
							'dependency' => array( 'enable_topbar', '==', 'true' ),
						),
						array(
							'id'         => 'enable_social',
							'type'       => 'switcher',
							'title'      => esc_html__( 'Enable Social', 'saasmax' ),
							'desc'       => esc_html__( 'If you want to enable or disable top bar social profile you can set ( YES / NO )', 'saasmax' ),
							'default'    => false,
							'dependency' => array( 'enable_topbar', '==', 'true' ),
						),
					),
				),

			    // sub section
			    array(
					'name'     => 'mainmenu',
					'title'    => esc_html__( 'Main Menu', 'saasmax' ),
					'icon'     => 'fa fa-sitemap',
					'fields'   => array(
						array(
							'id'      => 'sticky_menu',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Sticky Menu ?', 'saasmax' ),
							'desc'    => esc_html__( 'If you want to enable or disable menu sticky in header section you can set ( YES / NO )', 'saasmax' ),
							'default' => true,
						),
						array(
							'id'      => 'enable_search',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Search Button', 'saasmax' ),
							'desc'    => esc_html__( 'If you want to enable or disable search button in menu section you can set ( YES / NO )', 'saasmax' ),
							'default' => false,
						),
						array(
							'id'      => 'enable_offcanvas',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable OffCanvas Sidebar Button', 'saasmax' ),
							'desc'    => esc_html__( 'If you want to enable or disable offcanvas button in menu section you can set ( YES / NO )', 'saasmax' ),
							'default' => false,
						),
						array(
							'id'      => 'enable_cart_bubtton',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Curt Button', 'saasmax' ),
							'desc'    => esc_html__( 'If you want to enable or disable cart button in menu section you can set ( YES / NO )', 'saasmax' ),
							'default' => false,
						),
						array(
							'id'      => 'enable_action',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Action Button', 'saasmax' ),
							'desc'    => esc_html__( 'If you want to enable or disable action button in menu section you can set ( YES / NO )', 'saasmax' ),
							'default' => false,
						),
						array(
							'id'         => 'button_text',
							'type'       => 'text',
							'title'      => esc_html__( 'Button Text', 'saasmax' ),
							'desc'       => esc_html__( 'Set the button text here', 'saasmax' ),
							'dependency' => array( 'enable_action', '==', 'true' ),
							'default' => 'Sign Up',
						),
						array(
							'id'         => 'button_url',
							'type'       => 'text',
							'title'      => esc_html__( 'Button Link', 'saasmax' ),
							'desc'       => esc_html__( 'Set the button link here', 'saasmax' ),
							'dependency' => array( 'enable_action', '==', 'true' ),
							'default' => 'https://facebook.com/mehedidb',
						),
						array(
							'id'      => 'menu_width',
							'type'    => 'select',
							'title'   => esc_html__( 'Menu Container Width', 'saasmax' ),
							'desc'    => esc_html__( 'Set the menu with form here you can set ( FULLWIDTH / CONTAINER )', 'saasmax' ),
							'options' => array(
								'container'                 => esc_html__( 'Container', 'saasmax' ),
								'container container__full' => esc_html__( 'Container Full Width', 'saasmax' ),
								'container-fluid'           => esc_html__( 'Full Width', 'saasmax' ),
						  	),
							'default' => 'container',
						),
						array(
							'id'      => 'menu_align',
							'type'    => 'select',
							'title'   => esc_html__( 'Menu Text Align', 'saasmax' ),
							'desc'    => esc_html__( 'Set the menu text align from here', 'saasmax' ),
							'options' => array(
								'left'   =>	'Left',
								'center' =>	'Center',
								'right'  =>	'Right',
						  	),
							'default' => 'center',
						),
						array(
							'id'      => 'menu_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Menu Background', 'saasmax' ),
							'desc'    => esc_html__( 'Set the menu background form here.', 'saasmax' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#ffffff',
							),
						),
						array(
							'id'      => 'bg_opacity',
							'type'    => 'number',
							'title'   => esc_html__( 'Background Opacity', 'saasmax' ),
							'desc'    => esc_html__( 'Set the menu background opacity here use max value 99 and minimux value 1 in decimel.', 'saasmax' ),
							'default' => '01',
						),
						array(
							'id'      => 'sticky_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Menu Sticky Background', 'saasmax' ),
							'desc'    => esc_html__( 'Set the menu sticky background form here.', 'saasmax' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#ffffff',
							),
						),
						array(
							'id'      => 'sticky_bg_opacity',
							'type'    => 'number',
							'title'   => esc_html__( 'Sticky Background Opacity', 'saasmax' ),
							'desc'    => esc_html__( 'Set the menu sticky background opacity here use max value 99 and minimux value 1 in decimel.', 'saasmax' ),
							'default' => '99',
						),
						array(
							'id'      => 'menu_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Color', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu color by color picker', 'saasmax' ),
							'default' => '#ffffff',
						),
						array(
							'id'      => 'menu_hover',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Hover Color', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu hover color by color picker', 'saasmax' ),
							'default' => '#00C1B1',
						),
						array(
							'id'      => 'menu_sticky_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Sticky Color', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu sticky color by color picker', 'saasmax' ),
							'default' => '#404873',
						),
						array(
							'id'      => 'menu_sticky_hover_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Sticky Hover Color', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu sticky hover color by color picker', 'saasmax' ),
							'default' => '#00C1B1',
						),
						array(
							'id'      => 'menu_border_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Border Color', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu border bottom color by color picker', 'saasmax' ),
							'default' => 'rgba(255,255,255,.15)',
						),
					),
				),


				// sub section 1
				array(
					'name'     => 'mobile_menu',
					'title'    => esc_html__( 'Mobile Menu', 'saasmax' ),
					'icon'     => 'fa fa-mobile',
					'fields'   => array(

						array(
							'id'      => 'mobile_menu_style',
							'type'    => 'select',
							'title'   => esc_html__( 'Mobile Menu Style', 'saasmax' ),
							'desc'    => esc_html__( 'Set the mobile menu style form here.', 'saasmax' ),
							'options' => array(
								'static' => esc_html__( 'Menu Postion Top', 'saasmax' ),
								'left'   => esc_html__( 'Menu Postion Left', 'saasmax' ),
								'right'  => esc_html__( 'Menu Postion Right', 'saasmax' ),
						  	),
							'default' => 'left',
						),
						array(
							'id'         => 'contact_number',
							'type'       => 'text',
							'title'      => esc_html__( 'Contact Phone', 'saasmax' ),
							'desc'       => esc_html__( 'Set the mobile menu contact phone no.', 'saasmax' ),
							'default'    => '+8801744430440',
							'dependency' => array( 'mobile_menu_style', 'any', 'left,right' ),
						),
						array(
							'id'         => 'contact_location',
							'type'       => 'text',
							'title'      => esc_html__( 'Contact Link', 'saasmax' ),
							'desc'       => esc_html__( 'Set the mobile menu contact link here.', 'saasmax' ),
							'default'    => 'http://themeforest.net/user/quomodothemes',
							'dependency' => array( 'mobile_menu_style', 'any', 'left,right' ),
						),

						array(
							'id'      => 'mobile_menu_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Menu Background', 'saasmax' ),
							'desc'    => esc_html__( 'Set the menu background form here.', 'saasmax' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#00C1B1',
							),
						),
						array(
							'id'      => 'mobile_bg_opacity',
							'type'    => 'number',
							'title'   => esc_html__( 'Background Opacity', 'saasmax' ),
							'desc'    => esc_html__( 'Set the menu background opacity here use max value 99 and minimux value 1 in decimel.', 'saasmax' ),
							'default' => '99',
						),
						array(
							'id'      => 'mobile_sticky_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Menu Sticky Background', 'saasmax' ),
							'desc'    => esc_html__( 'Set the menu sticky background form here.', 'saasmax' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#ffffff',
							),
						),
						array(
							'id'      => 'mobile_sticky_bg_opacity',
							'type'    => 'number',
							'title'   => esc_html__( 'Sticky Background Opacity', 'saasmax' ),
							'desc'    => esc_html__( 'Set the menu sticky background opacity here use max value 99 and minimux value 1 in decimel.', 'saasmax' ),
							'default' => '99',
						),
						array(
							'id'      => 'mobile_menu_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Color', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu color by color picker', 'saasmax' ),
							'default' => '#00C1B1',
						),
						array(
							'id'      => 'mobile_menu_hover',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Active & Hover Color', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu item active &hover color by color picker', 'saasmax' ),
							'default' => '#ffffff',
						),
						array(
							'id'      => 'mobile_menu_hover_background',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Active Background Color', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu active background color by color picker', 'saasmax' ),
							'default' => '#00C1B1',
						),
						array(
							'id'      => 'mobile_menu_hamberger_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( ' Menu Hambarger Background', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu hamberger background color by color picker', 'saasmax' ),
							'default' => '#292929',
						),
						array(
							'id'      => 'mobile_sticky_menu_hamberger_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Sticky Menu Hambarger Background', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu hamberger color by color picker', 'saasmax' ),
							'default' => '#00C1B1',
						),
						array(
							'id'      => 'mobile_menu_border_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Menu Bottom Border Color', 'saasmax' ),
							'desc'   => esc_html__( 'Set the menu border bottom color by color picker', 'saasmax' ),
							'default' => 'rgba(255,255,255,.15)',
						),
					)
				),

				// sub section 1
				array(
					'name'     => 'logos',
					'title'    => esc_html__( 'Logo Upload', 'saasmax' ),
					'icon'     => 'fa fa-file-image-o',
					'fields'   => array(
						array(
							'id'      => 'logo',
							'type'    => 'image',
							'title'   => esc_html__( 'Upload Main Logo', 'saasmax' ),
							'desc'    => esc_html__( 'Upload main logo width 180px and height 65px.', 'saasmax' ),
							'default' => '',
							'help'    => esc_html__( 'Note: Please use logo image max width: 250px and max height 100px.', 'saasmax' ),
						),
						array(
							'id'      => 'sticky_logo',
							'type'    => 'image',
							'title'   => esc_html__( 'Upload Sticky Logo', 'saasmax' ),
							'desc'    => esc_html__( 'Upload sticky logo width 180px and height 65px.', 'saasmax' ),
							'default' => '',
							'help'    => esc_html__( 'Note: Please use logo image max width: 250px and max height 100px.', 'saasmax' ),
						),
						array(
							'id'      => 'logo_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Text Logo Color', 'saasmax' ),
							'desc'    => esc_html__( 'Set the text logo color by color picker.', 'saasmax' ),
							'default' => '#ffffff',
						),
						array(
							'id'      => 'sticky_logo_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Text Logo Sticky Color', 'saasmax' ),
							'desc'    => esc_html__( 'Set the text logo sticky color by color picker.', 'saasmax' ),
							'default' => '#333333',
						),
						array(
							'id'      => 'mobile_logo_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Text Logo Color On Mobile', 'saasmax' ),
							'desc'    => esc_html__( 'Set the text logo color by color picker.', 'saasmax' ),
							'default' => '#333333',
						),
						array(
							'id'      => 'mobile_sticky_logo_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Text Logo Sticky Color On Mobile', 'saasmax' ),
							'desc'    => esc_html__( 'Set the text logo sticky color by color picker.', 'saasmax' ),
							'default' => '#00C1B1',
						),
					)
				),

			    // sub section 3
			    array(
					'name'     => 'sub_header_3',
					'title'    => 'Favicon Icon',
					'icon'     => 'fa fa-image',
					'fields'   => array(
						array(
							'id'    => 'favicon_icon',
							'type'  => 'image',
							'title' => 'Set the favicon icon size ( 16px x 16px )',
						),
					),
				),

			),
		);
		
		/* BLOG PAGE */
		$options[]    = array(
		    'name'      => 'blog_page_section',
		    'title'     => 'Blog Page Setting',
		    'icon'      => 'fa fa-book',
		    'type'      => 'group',
		    'fields'    => array(
		      	array(
					'id'      => 'blog_page_title',
					'type'    => 'text',
					'title'   => esc_html__( 'Blog Page Title', 'saasmax' ),	
					'desc'    => esc_html__( 'Set the main blog page title here like ( Our Blog )', 'saasmax' ),
					'default' => 'Blog Page',
		    	),
		     	 array(
					'id'      => 'blog_page_barner',
					'type'    => 'image',
					'title'   => 'Blog Page Barner',	
					'desc'    => 'Set the main blog page barner image size (1920px x 1280px ) or ( 1920px x 1080px )',
					'default' => '',
		    	),
				array(
					'id'      => 'blog_page_overlay',
					'type'    => 'background',
					'title'   => esc_html__( 'Blog Page Overlay', 'saasmax' ),
					'desc'    => esc_html__( 'Upload a transparent image or cholse your color t set the blog page header overlay', 'saasmax' ),
					'default' => array(
						'image'      => SAASMAX_ROOT_IMAGE . '/pattarn.png',
						'repeat'     => 'repeat',
						'position'   => 'center center',
						'attachment' => 'scroll',
						'size'       => '',
						'color'      => '#000000',
					),
				),
		      	array(
			        'id'    => 'blog_page_overlay_opacity',
			        'type'  => 'number',
			        'title' => esc_html__( 'Blog Page Overlay Opacity', 'saasmax' ),	
			        'desc' => esc_html__( 'Set the main blog page overlay opacity max value is 90 in decimel', 'saasmax' ),
			        'default' => 50,
		    	),
		      	array(
			        'id'    => 'header_textcolor',
			        'type'  => 'color_picker',
			        'title' => esc_html__( 'Header Text Color', 'saasmax' ),	
			        'desc' => esc_html__( 'Set the header text color by color picker. NOTE: You can also change header text color form customizer panel.', 'saasmax' ),
			        'default' => '#ffffff',
		    	),
		      	array(
			        'id'    => 'header_text_align',
			        'type'  => 'select',
			        'title' => esc_html__( 'Header Text Align', 'saasmax' ),	
			        'desc' => esc_html__( 'Set the header text alignment ( Left / Roght / Center )', 'saasmax' ),
					'options' => array(
						'left'   =>	'Left',
						'center' =>	'Center',
						'right'  =>	'Right',
				  	),
					'default' => 'center',
		    	),
		      	array(
			        'id'    => 'blog_excerpt_word',
			        'type'  => 'number',
			        'title' => esc_html__( 'Blog Excerpt Word', 'saasmax' ),	
			        'desc' => esc_html__( 'Set the words that how many words you want to show in every blog post item.', 'saasmax' ),
					'default' => '50',
		    	),
			    array(
					'id'      => 'sticky_sidebar',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Sticky Sidebar ?', 'saasmax' ),
					'desc'    => esc_html__( 'You can set sitcky blog page sidebar here. just set ( YES / NO ) for off OR on.', 'saasmax' ),
					'default' => true,
			    ),
			    array(
					'id'      => 'show_dropcaps',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Show Dropcaps ?', 'saasmax' ),
					'desc'    => esc_html__( 'If you on dropcaps it will be appear in single blog page. just set ( YES / NO ) for off OR on.', 'saasmax' ),
					'default' => false,
			    ),
		    )
		);

		/* PRELOADER */
		$options[]    = array(
		    'name'      => 'preloader_section',
		    'title'     => esc_html__( 'Preloader ON / OFF', 'saasmax' ),
		    'icon'      => 'fa fa-spinner',
		    'fields'    => array(
				array(
					'id'      => 'enable_preloader',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Enable Preloader', 'saasmax' ),
					'desc'    => esc_html__( 'If you want to enable or disable preloader you can set ( YES / NO )', 'saasmax' ),
					'default' => true,
				),
				array(
					'id'      => 'prloader_style',
					'type'    => 'image_select',
					'title'   => esc_html__( 'Select Preloader Style', 'saasmax' ),
					'desc'    => esc_html__( 'You can set specifc preloader style in every page form here.', 'saasmax' ),
					'options' => array(
						'style_1' =>	SAASMAX_ROOT_IMAGE . '/loader/loader_1.png',
						'style_2' =>	SAASMAX_ROOT_IMAGE . '/loader/loader_2.png',
						'style_3' =>	SAASMAX_ROOT_IMAGE . '/loader/loader_3.png',
					),
					'default'	=>	'style_1',
					'dependency' => array( 'enable_preloader', '==', 'true' ),
				),
				array(
					'id'      => 'preloader_bg',
					'type'    => 'background',
					'title'   => esc_html__( 'Preloader Background', 'saasmax' ),
					'desc'    => esc_html__( 'Upload a new background image or select color to set the preloader background.', 'saasmax' ),
					'default' => array(
						'image'      => SAASMAX_ROOT_IMAGE . '/pattarn.png',
						'repeat'     => 'repeat',
						'position'   => 'center center',
						'attachment' => 'scroll',
						'size'       => '',
						'color'      => '#ffffff',
					),
				),
				array(
					'id'      => 'preloader_text_color',
					'type'    => 'color_picker',
					'title'   => esc_html__( 'Preloader Text Color', 'saasmax' ),
					'desc'    => esc_html__( 'Set the preloader text color', 'saasmax' ),
					'default' => '#000000'
				),
		    ),
		);

		/* SCROLL TOP */
		$options[]    = array(
		    'name'      => 'scrolltotop_section',
		    'title'     => esc_html__( 'Scroll Top Button', 'saasmax' ),
		    'icon'      => 'fa fa-arrow-up',
		    'fields'    => array(
				array(
					'id'      => 'enable_scroll_top',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Enable Scroll Top', 'saasmax' ),
					'desc'    => esc_html__( 'If you want to enable or disable scroll to top button you can set ( YES / NO )', 'saasmax' ),
					'default' => true,
				),
				array(
					'id'      => 'scroll_top_eassing',
					'type'    => 'select',
					'title'   => esc_html__( 'Scroll Top Animation', 'saasmax' ),
					'desc'    => esc_html__( 'You can set specifc eassing animation style in every page form here.', 'saasmax' ),
					'options' => array(
						'easeInSine'       =>	'easeInSine',
						'easeOutSine'      =>	'easeOutSine',
						'easeInOutSine'    =>	'easeInOutSine',
						'easeInQuad'       =>	'easeInQuad',
						'easeOutQuad'      =>	'easeOutQuad',
						'easeInOutQuad'    =>	'easeInOutQuad',
						'easeInCubic'      =>	'easeInCubic',
						'easeOutCubic'     =>	'easeOutCubic',
						'easeInOutCubic'   =>	'easeInOutCubic',
						'easeInQuart'      =>	'easeInQuart',
						'easeOutQuart'     =>	'easeOutQuart',
						'easeInOutQuart'   =>	'easeInOutQuart',
						'easeInQuint'      =>	'easeInQuint',
						'easeOutQuint'     =>	'easeOutQuint',
						'easeInOutQuint'   =>	'easeInOutQuint',
						'easeInExpo'       =>	'easeInExpo',
						'easeOutExpo'      =>	'easeOutExpo',
						'easeInOutExpo'    =>	'easeInOutExpo',
						'easeInCirc'       =>	'easeInCirc',
						'easeOutCirc'      =>	'easeOutCirc',
						'easeInOutCirc'    =>	'easeInOutCirc',
						'easeInBack'       =>	'easeInBack',
						'easeOutBack'      =>	'easeOutBack',
						'easeInOutBack'    =>	'easeInOutBack',
						'easeInElastic'    =>	'easeInElastic',
						'easeOutElastic'   =>	'easeOutElastic',
						'easeInOutElastic' =>	'easeInOutElastic',
						'easeInBounce'     =>	'easeInBounce',
						'easeOutBounce'    =>	'easeOutBounce',
						'easeInOutBounce'  =>	'easeInOutBounce',
					),
					'dependency' => array( 'enable_scroll_top', '==', 'true' ),
					'default'=>'easeOutExpo',
				),
		    ),
		);

		/* FOOTER */
		$options[]    = array(
		    'name'      => 'footer_section',
		    'title'     => esc_html__( 'Footer Section', 'saasmax' ),
		    'icon'      => 'fa fa-cog',
		    'sections'    => array(

		    	// Start Section.
				array(
					'name'     => 'sub_footer_1',
					'title'    => esc_html__( 'Footer Color & Background', 'saasmax' ),
					'icon'     => 'fa fa-paint-brush',
					'fields'   => array(
					    array(
							'id'      => 'hide_footer',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Hide Footer ?', 'saasmax' ),
							'desc'    => esc_html__( 'If you want do not show the footer you can set here by ( YES / NO ).', 'saasmax' ),
							'default' => false,
					    ),
					    array(
							'id'      => 'sticky_footer',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Sticky Footer ?', 'saasmax' ),
							'desc'    => esc_html__( 'You can set footer sticky here. just set ( YES / NO ).', 'saasmax' ),
							'default' => false,
					    ),
						array(
							'id'      => 'footer_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Footer Background', 'saasmax' ),
							'desc'    => esc_html__( 'Upload a new background image to set the footer background.', 'saasmax' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'no-repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => 'cover',
								'color'      => '#182044',
							),
						),
						array(
							'id'      => 'footer_overlay',
							'type'    => 'background',
							'title'   => esc_html__( 'Footer Background Overlay', 'saasmax' ),
							'desc'    => esc_html__( 'Upload a transparent image or cholse your color t set the footer background overlay', 'saasmax' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#182044',
							),
						),
						array(
							'id'      => 'footer_overlay_opacity',
							'type'    => 'number',
							'title'   => esc_html__( 'Overlay Opacity', 'saasmax' ),
							'desc'    => esc_html__( 'Set the background footer background overlay opacity input the max value 90 in decimel.', 'saasmax' ),
							'default' => '50',
						),
						array(
							'id'      => 'footer_bottom_bg',
							'type'    => 'background',
							'title'   => esc_html__( 'Footer Bottom Background', 'saasmax' ),
							'desc'    => esc_html__( 'Upload a new background image to set the footer bottom background.', 'saasmax' ),
							'default' => array(
								'image'      => '',
								'repeat'     => 'repeat',
								'position'   => 'center center',
								'attachment' => 'scroll',
								'size'       => '',
								'color'      => '#182044',
							),
						),
						array(
							'id'      => 'text_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Footer Text Color', 'saasmax' ),
							'desc'    => esc_html__( 'Set footer text color form here.', 'saasmax' ),
							'default' => '#b9c9ff',
						),
						array(
							'id'      => 'hidding_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Footer Hidding Color', 'saasmax' ),
							'desc'    => esc_html__( 'Set footer footer hidding color form here.', 'saasmax' ),
							'default' => '#ffffff',
						),
						array(
							'id'      => 'a_color',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Footer links color', 'saasmax' ),
							'desc'    => esc_html__( 'Set the footer area link color', 'saasmax' ),
							'default' => '#b9c9ff',
						),
						array(
							'id'      => 'a_hover',
							'type'    => 'color_picker',
							'title'   => esc_html__( 'Footer links Hover color', 'saasmax' ),
							'desc'    => esc_html__( 'Set the footer area link hover color', 'saasmax' ),
							'default' => '#00C1B1',
						),
					),
				),
				// End Section.

				// Start Section.
				array(
					'name'     => 'sub_footer_2',
					'title'    => esc_html__( 'Footer Bottom Style', 'saasmax' ),
					'icon'     => 'fa fa-bars',
					'fields'   => array(
						array(
							'id'      => 'footer_bottom_style',
							'type'    => 'image_select',
							'title'   => esc_html__( 'Select Footer Bottom Style', 'saasmax' ),
							'desc'    => esc_html__( 'You can chose and select footer bottom type here..', 'saasmax' ),
							'options' => array(
								'style_1' =>	SAASMAX_ROOT_IMAGE . '/footer/footer_1.png',
								'style_2' =>	SAASMAX_ROOT_IMAGE . '/footer/footer_2.png',
								'style_3' =>	SAASMAX_ROOT_IMAGE . '/footer/footer_3.png',
							),
							'default'	=>	'style_1',
						),
						array(
							'id'      => 'footer_bottom_padding',
							'type'    => 'number',
							'title'   => esc_html__( 'Footer Bottom Space', 'saasmax' ),
							'desc'    => esc_html__( 'Set the space ( top / bottom ) in footer bottom.', 'saasmax' ),
							'default'	=>	'30',
						),
					),
				),
				// End Section.

				// Start Section.
				array(
					'name'     => 'sub_footer_3',
					'title'    => esc_html__( 'Footer Copyright', 'saasmax' ),
					'icon'     => 'fa fa-copyright',
					'fields'   => array(
						array(
							'id'       => 'copyright_text',
							'type'     => 'wysiwyg',
							'title'    => esc_html__( 'Footer Copyright', 'saasmax' ),
							'desc'     => esc_html__( 'Set the footer copyright text','saasmax' ),
							'settings' => array(
							    'textarea_rows' => 10,
							    'tinymce'       => true,
							    'media_buttons' => false,
						  	),
						  	'default' => 'Copryright &copy; QuomodoTheme All Right Reserved.',
						),
					),
				),
				// End Section.
		    ),
		);	

		/* SOCIAL */
		$options[]    = array(
		    'name'      => 'social_section',
		    'title'     => esc_html__( 'Social Section', 'saasmax' ),
		    'icon'      => 'fa fa-share-alt',
		    'fields'    => array(
				array(
					'id'           => 'social_bookmark',
					'type'         => 'group',
					'title'        => esc_html__( 'Add Social Bookmark', 'saasmax' ),	
					'button_title' => esc_html__( 'Add New Bookmark', 'saasmax' ),
					'desc'         => esc_html__( 'Set the social bookmark icon and link here. Esay to use it just click the add icon button and search your social icon and set the url for the profile .', 'saasmax' ),   
					'fields'       => array(
						array(
							'id'      => 'bookmark_icon',
							'type'    => 'icon',
							'title'   => esc_html__( 'Social Icon', 'saasmax' ),
							'desc'    => esc_html__( 'Set the social profile icon like ( facebook, twitter, linkedin, youtube ect. )', 'saasmax' ),
							'default' => 'fa fa-facebook'
					    ),
					    array(
							'id'      => 'bookmark_url',
							'type'    => 'text',
							'title'   => esc_html__( 'Profile Url', 'saasmax' ),
							'desc'    => esc_html__( 'Type the social profile url lik http://facebook.com/yourpage. also you can add (facebook, twitter, linkedin, youtube etc.)', 'saasmax' ),
							'default' => 'http://facebook.com/quomodosoft'
					    ),
				  	),
				),
			    array(
					'id'      => 'enable_footer_social',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Enable Footer Social', 'saasmax' ),
					'desc'    => esc_html__( 'Set the footer social hide or not.', 'saasmax' ),
					'default' => false,
			    ),
			    array(
					'id'         => 'social_color',
					'type'       => 'color_picker',
					'title'      => esc_html__( 'Footer Social Color', 'saasmax' ),
					'desc'       => esc_html__( 'Set the footer social bookmark color from here.', 'saasmax' ),
					'default'    => '#ffffff',
					'dependency' => array( 'enable_footer_social', '==', 'true' ),
			    ),
			    array(
					'id'         => 'social_hover_color',
					'type'       => 'color_picker',
					'title'      => esc_html__( 'Footer Social Hover Color', 'saasmax' ),
					'desc'       => esc_html__( 'Set the footer social bookmark hover color from here.', 'saasmax' ),
					'default'    => '#00C1B1',
					'dependency' => array( 'enable_footer_social', '==', 'true' ),
			    ),
		    ),
		);


    	/* CUSTOM CSS */
	    $options[] = array(
			'name'   => 'custom_css_section',
			'title'  => esc_html__( 'Custom Css', 'saasmax' ),
			'icon'   => 'fa fa-css3',
			'fields' => array(
				array(
					'id'      => 'custom_css',
					'type'    => 'textarea',
					'title'   => esc_html__( 'Write Custom Css Here', 'saasmax' ),
					'desc'    => esc_html__( 'Write custom css here with css selector. this css will be applied in all pages and post.', 'saasmax' ),
				),
			),
	    );

		/* BACKUPS */
		$options[]    = array(
		    'name'      => 'backup_section',
		    'title'     => esc_html__( 'Backup Options', 'saasmax' ),
		    'icon'      => 'fa fa-share-square-o',
		    'fields'    => array(
			    array(
					'id'         => 'backup_options',
					'type'		 => 'backup',
					'title'      => esc_html__( 'Backup Your All Options', 'saasmax' ),
					'desc'       => esc_html__( 'If you want to take backup your option you can backup here.', 'saasmax' ),
			    ),
		    ),
		);

	  	return $options;
	}
}

add_filter( 'cs_framework_options', 'saasmax_theme_option_panel' );