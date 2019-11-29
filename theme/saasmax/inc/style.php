<?php

/*------------------------------
    HEADER BACKGROUND
-------------------------------*/
if(!function_exists('saasmax_header_background_image_load')){
    function saasmax_header_background_image_load(){

        if (is_page() ) {
            // Page Meta Data
            $page_meta_array         = saasmax_metabox_value('_saasmax_page_metabox');

            // Page Header Meta
            $enable_header_styleing  = isset( $page_meta_array['enable_header_styleing'] ) ? $page_meta_array['enable_header_styleing'] : false;
            $menu_align              = isset( $page_meta_array['menu_align'] ) ? $page_meta_array['menu_align'] : 'center';
            $menu_color              = isset( $page_meta_array['menu_color'] ) ? $page_meta_array['menu_color'] : '#ffffff';
            $menu_hover              = isset( $page_meta_array['menu_hover'] ) ? $page_meta_array['menu_hover'] : '#00C1B1';
            $menu_sticky_color       = isset( $page_meta_array['menu_sticky_color'] ) ? $page_meta_array['menu_sticky_color'] : '#404873';
            $menu_sticky_hover_color = isset( $page_meta_array['menu_sticky_hover_color'] ) ? $page_meta_array['menu_sticky_hover_color'] : '#00C1B1';

            // Page Barner Meta
            $enable_overlay          = isset( $page_meta_array['enable_overlay'] ) ? $page_meta_array['enable_overlay'] : true;
            $custom_overlay          = isset( $page_meta_array['custom_overlay'] ) ? $page_meta_array['custom_overlay'] : array('color' => '#000000');
            $overlay_opacity         = isset( $page_meta_array['overlay_opacity'] ) ? $page_meta_array['overlay_opacity'] : '65';

            // Page Footer Meta
            $enable_footer_styleing = isset( $page_meta_array['enable_footer_styleing'] ) ? $page_meta_array['enable_footer_styleing'] : false;
            $footer_background      = isset( $page_meta_array['footer_background'] ) ? $page_meta_array['footer_background'] : 'rgba(0,0,0,0.01)';
            $footer_overlay         = isset( $page_meta_array['footer_overlay'] ) ? $page_meta_array['footer_overlay'] : 'rgba(0,0,0,0.01)';
            $footer_overlay_opacity = isset( $page_meta_array['footer_overlay_opacity'] ) ? $page_meta_array['footer_overlay_opacity'] : '01';
            $footer_bottom_bg       = isset( $page_meta_array['footer_bottom_bg'] ) ? $page_meta_array['footer_bottom_bg']: 'rgba(0,0,0,0.01)';
            $text_color             = isset( $page_meta_array['text_color'] ) ? $page_meta_array['text_color'] : 'rgba(0,0,0,0.01)';
            $hidding_color          = isset( $page_meta_array['hidding_color'] ) ? $page_meta_array['hidding_color'] : 'rgba(0,0,0,0.01)';
            $a_color                = isset( $page_meta_array['a_color'] ) ? $page_meta_array['a_color'] : 'rgba(0,0,0,0.01)';
            $a_hover                = isset( $page_meta_array['a_hover'] ) ? $page_meta_array['a_hover'] : 'rgba(0,0,0,0.01)';

            // Page Custom Css Meta
            $page_cs_css             = isset( $page_meta_array['page_cs_css'] ) ? $page_meta_array['page_cs_css'] : '';
        }

        // Header Background
        $blog_barner = cs_get_option('blog_page_barner');
        $blog_barner = wp_get_attachment_image_url( $blog_barner, 'full' );
        if( is_page() && has_post_thumbnail()){
            $header_background = get_the_post_thumbnail_url(null, 'large' );
        }elseif( !empty( $blog_barner ) ){
            $header_background = $blog_barner;
        }else{
            $header_background = get_header_image();
        }
        $custom_css = "
            .barner-area-bg {
                background-image: url($header_background);
            }
        ";

        // Header Text Color
        $header_text_color = saasmax_any_color( 'header_textcolor', $default = '#ffffff' );
        
        if( !empty( $header_text_color ) && isset( $header_text_color ) ){            
            $header_text_color = $header_text_color;
        }else{
            $header_text_color = get_header_textcolor();
            $header_text_color = '#'.$header_text_color;
        }
        $custom_css .="
            .barner-area{
                text-align:".saasmax_any_data('header_text_align',$default='center').";
            }
            .page-title h1,
            .page-title,
            .breadcumb,
            .breadcumb a{
                color:".$header_text_color.";
            }
        ";

        // Text Logo Color
        $custom_css .="
            .navbar-header h3 a{
                color:".saasmax_any_color('logo_color',$default='#ffffff').";
            }
            .is-sticky .navbar-header h3 a{
                color:".saasmax_any_color('sticky_logo_color',$default='#333333').";
            }
        ";

        // Text Logo Color On Mobile
        $custom_css .="
            @media (max-width: 991px) and (min-width: 768px){
                .navbar-header h3 a {
                    color:".saasmax_any_color('mobile_logo_color',$default='#333333').";
                }
                .is-sticky .navbar-header h3 a {
                    color:".saasmax_any_color('mobile_sticky_logo_color',$default='#00C1B1').";
                }
            }
            @media only screen and (max-width: 767px){
                .navbar-header h3 a {
                    color:".saasmax_any_color('mobile_logo_color',$default='#333333').";
                }
                .is-sticky .navbar-header h3 a {
                    color:".saasmax_any_color('mobile_sticky_logo_color',$default='#00C1B1').";
                }
            }
        ";

        if ( is_page() && $enable_overlay == true ) {
            // Barner Overlay
            $custom_css .="
                .barner-area-bg::after{
                    background:".saasmax_meta_background($custom_overlay).";
                    opacity:.".saasmax_meta_data($overlay_opacity).";
                }
            ";
        }else{
            // Barner Overlay
            $custom_css .="
                .barner-area-bg::after{
                    background:".saasmax_any_background('blog_page_overlay',$default='#000000').";
                    opacity:.".saasmax_any_opacity('blog_page_overlay_opacity',$default = '65').";
                }
            ";
        }

        // Preloader        
        $custom_css .="
            .preeloader{
                background:".saasmax_any_background('preloader_bg', $default = '#ffffff').";
                color:".saasmax_any_color( 'preloader_text_color', $default = '#202020' ).";
            }
            .preloader-spinner{
                border-color:".saasmax_any_color( 'preloader_text_color', $default = '#202020' ).";
            }
        ";

        if(saasmax_any_data('custom_css')){
            $custom_css .=saasmax_any_data('custom_css');            
        }
        if ( is_page() ) {
            $custom_css .=saasmax_meta_data($page_cs_css);
        }

        if ( is_page() && $enable_header_styleing == true ) {

            // Menu Align
            if ( $menu_align == 'left' ) {
                $custom_css .="
                    #main-nav{
                        margin-left:inherit;
                    }
                ";
            }
            if ( $menu_align == 'center' ) {
                $custom_css .="
                    #main-nav{
                        text-align:".$menu_align.";
                    }
                ";
            }
            if ( $menu_align == 'right' ) {
                $custom_css .="
                    #main-nav{
                        margin-right:inherit;
                    }
                ";
            }
        }else{

            // Menu Align
            if ( saasmax_any_data('menu_align') == 'left' ) {
                $custom_css .="
                    #main-nav{
                        margin-left:inherit;
                    }
                ";
            }
            if ( saasmax_any_data('menu_align') == 'center' ) {
                $custom_css .="
                    #main-nav{
                        text-align:".saasmax_any_data('menu_align').";
                    }
                ";
            }
            if ( saasmax_any_data('menu_align') == 'right' ) {
                $custom_css .="
                    #main-nav{
                        margin-right:inherit;
                    }
                ";
            }
        }

        // Menu Background Color
        $custom_css .="
            .mainmenu-area-bg {
                background: ".saasmax_any_background('menu_bg',$default='#ffffff').";
                opacity: .".saasmax_any_opacity('bg_opacity',$default='01').";
            }
        ";

        // Sticky Menu Background Color
        $custom_css .="
			.is-sticky .mainmenu-area-bg {
                background: ".saasmax_any_background('sticky_bg',$default='#ffffff').";
			 	opacity: .".saasmax_any_opacity('sticky_bg_opacity',$default='99').";
			}
        ";
        
        if ( is_page() && $enable_header_styleing == true ) {
            // Menu Color        
            $custom_css .="
                ul#nav li a {
                    color: ".saasmax_meta_data($menu_color).";
                }
            ";

            // Sticky Menu Color        
            $custom_css .="
                .is-sticky ul#nav li a,
                ul#nav li li a {
                    color: ".saasmax_meta_data($menu_sticky_color).";
                }
            ";

            // Menu Hover Color
            $custom_css .="
                ul#nav li a:hover,
                ul#nav li.active > a,
                ul#nav li.current-menu-parent > a,
                ul#nav li.current-menu-item > a,
                ul#nav li.hover > a,
                ul#nav li ul li.hover > a{
                    color: ".saasmax_meta_data($menu_hover).";
                }
            ";


            // Sticky Menu Hover Color
            $custom_css .="
                .is-sticky ul#nav li > a:hover,
                .is-sticky ul#nav li ul li > a:hover,
                .is-sticky ul#nav li.active > a,
                .is-sticky ul#nav li.hover > a,
                .is-sticky ul#nav li.current-menu-parent > a,
                .is-sticky ul#nav li.current-menu-item > a {
                    color: ".saasmax_meta_data($menu_sticky_hover_color).";
                }
            ";
        }else{
            // Menu Color        
            $custom_css .="
    			ul#nav li a {
    				color: ".saasmax_any_color('menu_color',$default='#ffffff').";
    			}
            ";

            // Sticky Menu Color        
            $custom_css .="
                .is-sticky ul#nav li a,
                ul#nav li li a {
                    color: ".saasmax_any_color('menu_sticky_color',$default='#404873').";
                }
            ";

            // Menu Hover Color
            $custom_css .="
                ul#nav li a:hover,
                ul#nav li.active > a,
                ul#nav li.current-menu-parent > a,
                ul#nav li.current-menu-item > a,
                ul#nav li.hover > a,
                ul#nav li ul li.hover > a{
                    color: ".saasmax_any_color('menu_hover',$default='#00C1B1').";
                }
            ";


            // Sticky Menu Hover Color
            $custom_css .="
                .is-sticky ul#nav li > a:hover,
                .is-sticky ul#nav li ul li > a:hover,
                .is-sticky ul#nav li.active > a,
                .is-sticky ul#nav li.hover > a,
                .is-sticky ul#nav li.current-menu-parent > a,
                .is-sticky ul#nav li.current-menu-item > a {
                    color: ".saasmax_any_color('menu_sticky_hover_color',$default='#00C1B1').";
                }
            ";
        }
        
        // Menu Bottom Border Color
        $custom_css .="
            .mainmenu-area{
                border-color:".saasmax_any_color('menu_border_color',$default='rgba(255, 255, 255, 0.15)').";
            }
        ";

        // Mobile Mobile Menu Background
        $custom_css .="
            @media (min-width: 768px) and (max-width: 991px) {
                .mainmenu-area{
                    border-color:".saasmax_any_color('mobile_menu_border_color',$default='rgba(255, 255, 255, 0.15)').";
                }
                .mainmenu-area-bg {
                    background: ".saasmax_any_background('mobile_menu_bg', $default='#ffffff').";
                    opacity: .".saasmax_any_opacity('mobile_bg_opacity', $default='99').";
                }
                .is-sticky .mainmenu-area-bg {
                    background: ".saasmax_any_background('mobile_sticky_bg', $default='#ffffff').";
                    opacity: .".saasmax_any_opacity('mobile_sticky_bg_opacity', $default='99').";
                }

                .menu-toggle.full {
                    color: ".saasmax_any_color('mobile_menu_hamberger_color', $default='#292929')." !important;
                    border-color:".saasmax_any_color('mobile_menu_hamberger_color', $default='#292929').";
                }
                .line {
                    stroke: ".saasmax_any_color('mobile_menu_hamberger_color', $default='#292929').";
                }

                .is-sticky .menu-toggle.full {
                    color: ".saasmax_any_color('mobile_sticky_menu_hamberger_color', $default='#00C1B1').";
                    border-color: ".saasmax_any_color('mobile_sticky_menu_hamberger_color', $default='#00C1B1').";
                }
                .is-sticky .line {
                    stroke: ".saasmax_any_color('mobile_sticky_menu_hamberger_color', $default='#00C1B1').";
                }
                ul#nav li a {
                    color: ".saasmax_any_color('mobile_menu_color', $default='#00C1B1')." !important;
                }
                .is-sticky ul#nav li a{
                    color: ".saasmax_any_color('mobile_menu_hover', $default='#00C1B1').";
                }

                ul#nav .current-menu-parent > a,
                .current-menu-parent > a,
                ul#nav li.has-sub.open > a,
                ul#nav li a:hover,
                ul#nav li.active > a,
                ul#nav li.current-menu-item > a,
                ul#nav li.hover > a,
                ul#nav li.open.menu-item-has-children > a {
                    background: ".saasmax_any_color('mobile_menu_hover_background', $default='#00C1B1')." !important;
                    color: ".saasmax_any_color('mobile_menu_hover', $default='#ffffff')." !important;
                }
            }
            @media only screen and (max-width: 767px) {
                .mainmenu-area{
                    border-color:".saasmax_any_color('mobile_menu_border_color',$default='rgba(255, 255, 255, 0.15)').";
                }
                .mainmenu-area-bg {
                    background: ".saasmax_any_background('mobile_menu_bg', $default='#ffffff').";
                    opacity: .".saasmax_any_opacity('mobile_bg_opacity', $default='99').";
                }
                .is-sticky .mainmenu-area-bg {
                    background: ".saasmax_any_background('mobile_sticky_bg', $default='#ffffff').";
                    opacity: .".saasmax_any_opacity('mobile_sticky_bg_opacity', $default='99').";
                }

                .menu-toggle.full {
                    color: ".saasmax_any_color('mobile_menu_hamberger_color', $default='#292929')." !important;
                    border-color:".saasmax_any_color('mobile_menu_hamberger_color', $default='#292929').";
                }
                .line {
                    stroke: ".saasmax_any_color('mobile_menu_hamberger_color', $default='#292929').";
                }

                .is-sticky .menu-toggle.full {
                    color: ".saasmax_any_color('mobile_sticky_menu_hamberger_color', $default='#00C1B1').";
                    border-color: ".saasmax_any_color('mobile_sticky_menu_hamberger_color', $default='#00C1B1').";
                }
                .is-sticky .line {
                    stroke: ".saasmax_any_color('mobile_sticky_menu_hamberger_color', $default='#00C1B1').";
                }
                ul#nav li a {
                    color: ".saasmax_any_color('mobile_menu_color', $default='#00C1B1')." !important;
                }
                .is-sticky ul#nav li a{
                    color: ".saasmax_any_color('mobile_menu_hover', $default='#00C1B1').";
                }

                ul#nav .current-menu-parent > a,
                .current-menu-parent > a,
                ul#nav li.has-sub.open > a,
                ul#nav li a:hover,
                ul#nav li.active > a,
                ul#nav li.current-menu-item > a,
                ul#nav li.hover > a,
                ul#nav li.open.menu-item-has-children > a {
                    background: ".saasmax_any_color('mobile_menu_hover_background', $default='#00C1B1')." !important;
                    color: ".saasmax_any_color('mobile_menu_hover', $default='#ffffff')." !important;
                }
            }
        ";


        if ( is_page() && !empty( $footer_background ) && $enable_footer_styleing == true ) {
            // Footer Background & Overlay
            $custom_css.="
                .footer-area-bg{
                    background:".saasmax_meta_background($footer_background).";
                }
                .footer-area-bg:after{
                    background:".saasmax_meta_background($footer_overlay).";
                    opacity:.".saasmax_meta_data($footer_overlay_opacity).";
                }
                ";
        }else{
            // Footer Background & Overlay
            $custom_css.="
                .footer-area-bg{
                    background:".saasmax_any_background('footer_bg',$default='#182044').";
                }
                .footer-area-bg:after{
                    background:".saasmax_any_background('footer_overlay',$default='#182044').";
                    opacity:".saasmax_any_opacity('footer_overlay_opacity',$default='50').";
                }
            ";
        }

        //Footer Bottom Padding        
        $custom_css .="
            .footer-bottom{
                padding: ".saasmax_any_data('footer_bottom_padding',$default='30')."px 0;
            }
        ";

        if ( is_page() && !empty( $footer_bottom_bg ) && $enable_footer_styleing == true  ) {
            // Footer Bottom Background
            $custom_css .="
                .footer-bottom-bg{
                    background: ".saasmax_meta_background($footer_bottom_bg).";
                }
            ";
        }else{
            // Footer Bottom Background
            $custom_css .="
                .footer-bottom-bg{
                    background: ".saasmax_any_background('footer_bottom_bg', $default='#182044').";
                }
            ";
        }


        if ( is_page() && !empty($text_color) && $enable_footer_styleing == true  ) {
            // Footer Content Color
            $custom_css .="
                .footer-area{
                    color:".saasmax_meta_data($text_color).";
                }
                .footer-area h1,
                .footer-area h2,
                .footer-area h3,
                .footer-area h4,
                .footer-area h5,
                .footer-area h6{
                    color:".saasmax_meta_data($hidding_color).";
                }
                .footer-top .single-widgets h3::after{
                    background:".saasmax_meta_data($hidding_color).";
                }
            ";
        }else{
            // Footer Content Color
            $custom_css .="
                .footer-area{
                    color:".saasmax_any_color( 'text_color' , $default = '#b9c9ff' ).";
                }
                .footer-area h1,
                .footer-area h2,
                .footer-area h3,
                .footer-area h4,
                .footer-area h5,
                .footer-area h6{
                    color:".saasmax_any_color( 'hidding_color' , $default = '#ffffff' ).";
                }
                .footer-top .single-widgets h3::after{
                    background:".saasmax_any_color( 'hidding_color' , $default = '#ffffff' ).";
                }
            ";
        }

        if ( is_page() && !empty($a_color) && $enable_footer_styleing == true ) {
            // Footer Link Color
            $custom_css .="
                .footer-area a{
                    color:".saasmax_meta_data( $a_color ).";
                }
                .footer-area a:hover{
                    color:".saasmax_meta_data($a_hover).";
                }   
            ";
        }else{
            // Footer Link Color
            $custom_css .="
                .footer-area a{
                    color:".saasmax_any_color( 'a_color', $default='#ffffff').";
                }
                .footer-area a:hover{
                    color:".saasmax_any_color('a_hover', $default='#f12874').";
                }   
            ";
        }

        // Footer Social Profile
        $custom_css.="
            .footer-social-bookmark ul li a{
                color: ".saasmax_any_color('social_color',$default='#ffffff').";
            }
            .footer-social-bookmark ul li a:hover {
                color: ".saasmax_any_color('social_hover_color',$default='#f12874').";
                background: ".saasmax_any_color('social_color',$default='#ffffff').";
                border-color: ".saasmax_any_color('social_color',$default='#ffffff').";
            }
        ";

        // Single Blog Page 
        if ( saasmax_any_switch('show_dropcaps',false) == true ) {

            $custom_css.="
                .single .format-standard .post-content > p:first-of-type {
                    overflow: hidden;
                }

                .single .format-standard .post-content > p:first-of-type::first-letter {
                    color: #00C1B1;
                    float: left;
                    font-size: 90px;
                    font-weight: 600;
                    margin-right: 10px;
                    line-height: 1;
                    overflow: hidden;
                    clear: both;
                }
            ";
        }

        wp_add_inline_style( 'saasmax-main-style', $custom_css );

    }
}
add_action( 'wp_enqueue_scripts', 'saasmax_header_background_image_load' );