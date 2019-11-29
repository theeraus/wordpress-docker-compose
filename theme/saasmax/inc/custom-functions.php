<?php

/*------------------------------
    CODESTER FRAMEWORK OPTIONS DATA
------------------------------*/
if ( !defined('CS_OPTIONS') ) {
    defined( 'SAASMAX_OPTIONS' )     or  define( 'SAASMAX_OPTIONS',     '_cs_options' );
    if ( ! function_exists( 'cs_get_option' ) ) {
        function cs_get_option( $option_name = '', $default = '' ) {

            $options = apply_filters( 'cs_get_option', get_option( SAASMAX_OPTIONS ), $option_name, $default );

            if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
                return $options[$option_name];
            } else {
                return ( ! empty( $default ) ) ? $default : null;
            }

        }
    }
}

/*-------------------------------
    BACKGROUND & OVERLAY
--------------------------------*/
if ( !function_exists('saasmax_any_background') ) {
    /**
     * [saasmax_any_background receved background data form option panel and return background data]
     * @param  [type] $background_data received background data form codester option ID.
     * @return $background string
     */
    function saasmax_any_background($background_data,$default='rgba(0,0,0,0)'){

        $background = cs_get_option($background_data);
        if ( !empty($background) ) {
            $background = $background;
        }else{
            $background = array();
        }
        if (array_key_exists('color', $background)) {
            $color = $background['color'];
        }else{
            $color = $default;
        }
        if (array_key_exists('image', $background)) {
            $image = $background['image'];
        }else{
            $image = get_template_directory_uri() .'/assets/img/pattarn.png';
        }
        if (array_key_exists('repeat', $background)) {
            $repeat = $background['repeat'];
        }else{
            $repeat = 'repeat';
        }
        if (array_key_exists('attachment', $background)) {
            $attachment = $background['attachment'];
        }else{
            $attachment = 'scroll';
        }
        if (array_key_exists('position', $background)) {
            $position = $background['position'];
        }else{
            $position = 'center center';
        }
        if (array_key_exists('size', $background)) {
            $size = $background['size'];
        }else{
            $size = 'auto';
        }
        if ( $size == 'initial' || $size == 'inherit' || $size == '' ) {
           $size = '';
        }else{
            $size = '/'.$size.'';
        }
        if (!empty($image)) {
            $background_image = " url($image) $repeat $attachment $position ".( isset($size) ? $size : " ")."";
        }else{
            $background_image = '';
        }
        
        $background = $color.$background_image;
        return $background;
    }
}

/*-------------------------------
    META BACKGROUND & OVERLAY
--------------------------------*/
if ( !function_exists('saasmax_meta_background') ) {
    /**
     * [saasmax_meta_background receved background data form option panel and return background data]
     * @param  [type] $background_data received background data form codester option ID.
     * @return $background string
     */
    function saasmax_meta_background($background_data, $default='#ffffff'){

        $background = $background_data;
        if ( !empty($background) ) {
            $background = $background;
        }else{
            $background = array();
        }
        if (array_key_exists('color', $background)) {
            $color = $background['color'];
        }else{
            $color = $default;
        }
        if (array_key_exists('image', $background)) {
            $image = $background['image'];
        }else{
            $image = get_template_directory_uri() .'/assets/img/pattarn.png';
        }
        if (array_key_exists('repeat', $background)) {
            $repeat = $background['repeat'];
        }else{
            $repeat = 'repeat';
        }
        if (array_key_exists('attachment', $background)) {
            $attachment = $background['attachment'];
        }else{
            $attachment = 'scroll';
        }
        if (array_key_exists('position', $background)) {
            $position = $background['position'];
        }else{
            $position = 'center center';
        }
        if (array_key_exists('size', $background)) {
            $size = $background['size'];
        }else{
            $size = 'auto';
        }
        if ( $size == 'initial' || $size == 'inherit' || $size == '' ) {
           $size = '';
        }else{
            $size = '/'.$size.'';
        }
        if (!empty($image)) {
            $background_image = " url($image) $repeat $attachment $position ".( isset($size) ? $size : " ")."";
        }else{
            $background_image = '';
        }
        
        $background = $color.$background_image;
        return $background;
    }
}

/*---------------------------
    PARSE META DATA
----------------------------*/
if ( !function_exists('saasmax_meta_data') ) {
    function saasmax_meta_data($get_data,$default = ''){
        $data = $get_data;
        if( !empty($data) ){
            $data = $data;
        }else{
            $data = $default;
        }
        return $data;
    }
}

/*---------------------------
    COLOR
----------------------------*/
if ( !function_exists('saasmax_any_color') ) {
    function saasmax_any_color($color_data,$default = ''){
        $color = cs_get_option($color_data);
        if( !empty($color) ){
            $color = $color;
        }else{
            $color = $default;
        }
        return $color;
    }
}

/*---------------------------
    OVERLALY
----------------------------*/
if ( !function_exists('saasmax_any_opacity') ) {
    function saasmax_any_opacity($opacity_data,$default = '65'){
        $opacity = cs_get_option($opacity_data);
        if ($opacity) {
            $opacity = $opacity;
        }else{
            $opacity = $default;
        }
        return $opacity;
    }
}

/*---------------------------
    SWITCH
----------------------------*/
if ( !function_exists('saasmax_any_switch') ) {
    function saasmax_any_switch($switch_data,$default = false){
        $switch = cs_get_option($switch_data);
        if ( $switch == true ) {
            $switch = $switch;
        }else{
            $switch = $default;
        }
        return $switch;
    }
}

/*---------------------------
    PARSE DATA
----------------------------*/
if ( !function_exists('saasmax_any_data') ) {
    function saasmax_any_data($get_data,$default = ''){
        $data = cs_get_option($get_data);
        if( !empty($data) ){
            $data = $data;
        }else{
            $data = $default;
        }
        return $data;
    }
}

/*---------------------------
    METABOX
-----------------------------*/
if ( !function_exists('saasmax_metabox_value') ) {
    function saasmax_metabox_value($meta_key){
        if (get_post_meta( get_the_ID(), $meta_key , true )) {
            $meta_value = get_post_meta( get_the_ID(), $meta_key , true );
        }else{
            $meta_value = array();
        }
        return $meta_value;
    }
}

/*----------------------------
    LOGO WITH STICKY
------------------------------*/
if ( !function_exists( 'saasmax_logo_with_sticky' ) ){
    function saasmax_logo_with_sticky(){
        $default_logo = get_theme_mod( 'custom_logo' );
        $default_logo = wp_get_attachment_image_url( $default_logo, 'full');

        $logo        = saasmax_any_data( 'logo','' );
        $logo        = wp_get_attachment_image_url( $logo, 'full');

        $sticky_logo = saasmax_any_data( 'sticky_logo','' );
        $sticky_logo = wp_get_attachment_image_url( $sticky_logo, 'full');

        if ( '' == $default_logo && isset($logo) ) {
            $default_logo = $logo;
        }

        if ( '' == $sticky_logo ) {
            $sticky_logo = $default_logo;
        }

        ?>
        <?php if ( !empty( $default_logo ) &&  !empty( $sticky_logo ) ) : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link default-logo">
                <img src="<?php echo esc_url( $default_logo ); ?>" alt="<?php the_title_attribute( array('echo' => false) ); ?>">
            </a>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link sticky-logo">
                <img src="<?php echo esc_url( $sticky_logo ); ?>" alt="<?php the_title_attribute( array('echo' => false) ); ?>">
            </a>
        <?php elseif( !empty( $default_logo ) && empty( $sticky_logo ) && saasmax_any_switch('sticky_menu') == true ): ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link">
                <img src="<?php echo esc_url( $default_logo ); ?>" alt="<?php the_title_attribute( array('echo' => false) ); ?>">
            </a>
        <?php else: ?>
        <h3>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo get_bloginfo('name'); ?>
            </a>
        </h3>
    <?php  endif;
    }
}

/*---------------------------
    DEFAULT LOGO
----------------------------*/
if ( !function_exists('saasmax_default_logo') ) {
    function saasmax_default_logo(){
        if (has_custom_logo()) :
            the_custom_logo('navbar-brand'); 
        else: ?>
        <h3>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo get_bloginfo('name'); ?>
            </a>
        </h3>
        <?php
        endif;
    }
}

/*---------------------------
    PRELOADER
----------------------------*/
if ( !function_exists('saasmax_preloader') ) {
    function saasmax_preloader(){

        $preloader       = cs_get_option('enable_preloader',true);
        $preloader_style = cs_get_option('prloader_style',$default = 'style_1');

        if ( $preloader == true ) {
            $preloader_switch = $preloader;
        }else{
            $preloader_switch = false;
        }
        ?>
        <?php
        if ( $preloader_switch == true ) {
            ?>
            <?php if( 'style_1' == $preloader_style ) : ?>
                <div class="preeloader">
                    <div class="loading">
                       <div class="loading-text">
                           <span class="loading-text-words">L</span>
                           <span class="loading-text-words">O</span>
                           <span class="loading-text-words">A</span>
                           <span class="loading-text-words">D</span>
                           <span class="loading-text-words">I</span>
                           <span class="loading-text-words">N</span>
                           <span class="loading-text-words">G</span>
                       </div>
                    </div>
               </div>
            <?php elseif( 'style_2' == $preloader_style ) : ?>
                <div class="preeloader">
                    <div class="loader-warp">
                        <span class="loader-span let1">l</span>
                        <span class="loader-span let2">o</span>
                        <span class="loader-span let3">a</span>
                        <span class="loader-span let4">d</span>
                        <span class="loader-span let5">i</span>
                        <span class="loader-span let6">n</span>
                        <span class="loader-span let7">g</span>
                    </div>
                </div>
            <?php elseif( 'style_3' == $preloader_style ) : ?>
                <div class="preeloader">
                    <div class="preloader-spinner"></div>
                </div>
            <?php endif; ?>
        <?php
        }
    }
}

/*--------------------------
    SCROLL TO TOP
----------------------------*/
if ( !function_exists('saasmax_scrolltop') ) {
    function saasmax_scrolltop(){

        $scroll_top_switch = cs_get_option('enable_scroll_top',true);
        if ($scroll_top_switch) {
            $scroll_top = $scroll_top_switch;
        }else{
            $scroll_top = false;
        }

        ?>
        <?php if( $scroll_top == true ) : ?>
            <!--SCROLL TO TOP-->
            <a href="#scrolltotop" class="scrolltotop"><i class="ti ti-angle-up"></i></a>
        <?php endif; 
    }
}

if ( !function_exists('saasmax_scroll_top_script') ) {
    function saasmax_scroll_top_script(){

        $scroll_top_switch  = cs_get_option('enable_scroll_top',true);
        $scroll_top_eassing = cs_get_option('scroll_top_eassing');
        if ($scroll_top_eassing) {
            $scroll_top_eassing = $scroll_top_eassing;
        }else{
            $scroll_top_eassing = 'easeOutExpo';
        }

        if ( $scroll_top_switch == true ) {
            $scroll_top_scripts = '
                jQuery(document).ready(function(){
                    jQuery("a.scrolltotop").on("click", function (event) {
                        var id = jQuery(this).attr("href");
                        var offset = 60;
                        var target = jQuery(id).offset().top - offset;
                        jQuery("html, body").animate({
                            scrollTop: target
                        }, 1500, "'.$scroll_top_eassing.'");
                        event.preventDefault();
                    });
                });
            ';
        }else{
            return false;
        }
        wp_add_inline_script( 'saasmax-active', $scroll_top_scripts );
    }
}
add_action( 'wp_enqueue_scripts', 'saasmax_scroll_top_script' );

/*---------------------------
    AFTER BODY
---------------------------*/
if ( !function_exists('saasmax_after_body_content') ) {
    function saasmax_after_body_content (){
        if (function_exists('saasmax_preloader')) {
            saasmax_preloader();
        }; 
        if (function_exists('saasmax_scrolltop')) {
            saasmax_scrolltop();
        }
    }
}
add_action( 'saasmax_after_body', 'saasmax_after_body_content' );

/*---------------------------
    MOBILE MENU
-----------------------------*/
if ( !function_exists('saasmax_mobile_menu') ) {
    function saasmax_mobile_menu(){

        $menu_style       = saasmax_any_data('mobile_menu_style','left');
        $contact_number   = saasmax_any_data('contact_number','#');
        $contact_location = saasmax_any_data('contact_location','#');
        $mobile_menu_scripts     = array(
            'style'    => $menu_style,
            'contact'  => $contact_number,
            'location' => $contact_location
        );
        wp_localize_script( 'saasmax-active', 'mobile_menu_scripts', $mobile_menu_scripts );
    }
}
add_action( 'wp_enqueue_scripts', 'saasmax_mobile_menu' );

/*---------------------------
    MENU STICKY
-----------------------------*/
if ( !function_exists('saasmax_menu_sticky') ) {
    function saasmax_menu_sticky(){
        if ( saasmax_any_switch('sticky_menu') == true ) {
            $menu_scripts = '
                jQuery(document).ready(function(){
                    jQuery("#mainmenu-area").sticky({
                        topSpacing: 0
                    });
                });
            ';
        }else{
            return false;
        }
        wp_add_inline_script( 'saasmax-active', $menu_scripts );
    }
}
add_action( 'wp_enqueue_scripts', 'saasmax_menu_sticky' );

/*---------------------------
    SIDEBAR STICKY
-----------------------------*/
if ( !function_exists('saasmax_sidebar_sticky') ) {
    function saasmax_sidebar_sticky(){
        if ( saasmax_any_switch('sticky_sidebar') == true ) {
            $sidebar_scripts = '
                jQuery(document).ready(function(){
                    jQuery(".content-area .col-md-8,.content-area .col-md-4").theiaStickySidebar({
                        additionalMarginTop: 30
                    });
                });
            ';
        }else{
            return false;
        }
        wp_add_inline_script( 'saasmax-active', $sidebar_scripts );
    }
}
add_action( 'wp_enqueue_scripts', 'saasmax_sidebar_sticky' );

/*---------------------------
    FOOTER STICKY
-----------------------------*/
if ( !function_exists('saasmax_footer_sticky') ) {
    function saasmax_footer_sticky(){
        if ( saasmax_any_switch('sticky_footer') == true && saasmax_any_switch('hide_footer') == false ) {
            $footer_scripts = '
                jQuery(document).ready(function(){
                    var window_width = jQuery(window).width();
                    if (window_width > 900) {
                        jQuery(".footer-area").footerReveal({
                            shadow: false,
                            zIndex: -999
                        });
                        var footer_area = jQuery(".footer-area");
                        footer_area.prev().css({
                            "background": "#ffffff",
                        });
                    }
                });
            ';
        }else{
            return false;
        }
        wp_add_inline_script( 'saasmax-active', $footer_scripts );
    }
}
add_action( 'wp_enqueue_scripts', 'saasmax_footer_sticky' );

/*------------------------------
    SOCIAL PROFILE LINK
-------------------------------*/
if ( !function_exists('saasmax_social_links') ) {
    function saasmax_social_links(){
        $social_links = cs_get_option('social_bookmark');
        if (count($social_links)) {
        ?>
        <div class="social-profile">
            <ul>
                <?php foreach ($social_links as $single_link) : ?>
                <li><a href="<?php echo esc_url( $single_link['bookmark_url'] ); ?>" target="_blank"><i class="<?php echo esc_attr( $single_link['bookmark_icon'] ); ?>"></i></a></li>  
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
        }
    }
}

/*------------------------------
    FOOTER COPYRIGHT
-------------------------------*/
if ( !function_exists('saasmax_copyright') ) {
    function saasmax_copyright(){
        $link = 'themeforest.net/user/quomodotheme';
        if (cs_get_option('copyright_text')) {
            $copyright_text = cs_get_option('copyright_text');
        }else{
           $copyright_text = sprintf( __( 'Copyright 2019 %s All Right Reserved', 'saasmax' ),'<a href="'.esc_url( $link ).'">QuomodoTheme</a>' );
        } 
        echo wp_kses( $copyright_text, wp_kses_allowed_html( 'post' ) );
    }
}

/*----------------------------
    PAGE TITLE
-----------------------------*/
if ( !function_exists('saasmax_title') ) {
    function saasmax_title(){

        if ( is_page() ) {
            $page_meta_array = saasmax_metabox_value('_saasmax_page_metabox');
            $enable_title    = isset( $page_meta_array['enable_title'] ) ? $page_meta_array['enable_title'] : false;
            $custom_title    = isset( $page_meta_array['custom_title'] ) ? $page_meta_array['custom_title'] : '';
        }

        $saasmax_blog_title = saasmax_any_data( 'blog_page_title' ); ?>
        <div class="barner-area white">
            <div class="barner-area-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        
                        <?php if ( (is_home() && is_front_page()) || is_page_template( 'blog-classic.php' ) ) : ?>

                        <div class="page-title">
                            <?php if( $saasmax_blog_title == !'' ): ?>
                                <h1><?php echo esc_html( $saasmax_blog_title ); ?></h1>
                            <?php else: ?>
                            <h1>
                                <?php esc_html_e('Blog Page','saasmax'); ?>
                            </h1>
                            <?php endif; ?>
                            <?php if (get_bloginfo( 'description')) :?>
                            <p>
                                <?php bloginfo( 'description' ); ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        
                        <?php elseif( class_exists("WooCommerce") && is_shop() ): ?>

                        <div class="page-title">                            
                            <h1><?php echo esc_html__( 'Shop Page', 'saasmax' ); ?></h1>
                            <?php if ( the_archive_description() ) : ?>
                            <p><?php the_archive_description(); ?></p>
                            <?php endif; ?>
                        </div>

                        <?php elseif(is_page()): ?>
                        
                        <div class="page-title">
                            <h1>
                                <?php
                                    if ( $enable_title == true && !empty($custom_title) ) {
                                        echo esc_html( $custom_title );
                                    }else{
                                       wp_title( $sep = ' ');
                                    }
                                 ?>
                            </h1>
                        </div>
                        <div class="breadcumb">
                            <?php if (function_exists('bcn_display')) {
                                bcn_display();
                            } ?>
                        </div>

                        <?php elseif(is_single()): ?>

                        <div class="page-title">
                            <h1>
                                <?php wp_title( $sep = ' '); ?>
                            </h1>
                        </div>
                        <div class="breadcumb">
                            <?php saasmax_posted_on(); ?>
                        </div>

                        <?php elseif(is_archive()): ?>

                        <div class="page-title">
                            <h1>
                                <?php the_archive_title(); ?>
                            </h1>
                        </div>
                        <div class="breadcumb">
                            <p>
                                <?php the_archive_description(); ?>
                            </p>
                        </div>

                        <?php else: ?>

                        <div class="page-title">
                            <h1>
                                <?php wp_title( $sep = ' '); ?>
                            </h1>
                        </div>
                        <div class="breadcumb">
                            <p>
                                <?php bloginfo( 'description' ); ?>
                            </p>
                        </div>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}


/*------------------------------
    COMMENT FORM FIELD
-------------------------------*/
if( ! function_exists('saasmax_comment_form_default_fields') ){

    function saasmax_comment_form_default_fields($fields){
        global $aria_req;
        $commenter     = wp_get_current_commenter();
        $req           = get_option( 'require_name_email' );
        $aria_req      = ($req ? " aria-required='true' " : '');
        $required_text = ' ';    
        $fields        =  array(
            'author'   => '<div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="author" value="'.esc_attr( $commenter['comment_author'] ).'" '.$aria_req.' placeholder="'.esc_attr__( 'Your Name *', 'saasmax' ).'">
                            </div>',
            'email'    => '<div class="col-sm-6">
                                <input type="email" name="email" value="'.esc_attr( $commenter['comment_author_email'] ).'" '.$aria_req.' placeholder="'.esc_attr__( 'Your Email *', 'saasmax' ).'">
                            </div>
                        </div>
                    </div>',
            'url'      => '<div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="url" name="url" value="'.esc_url( $commenter['comment_author_url'] ).'" '.$aria_req.' placeholder="'.esc_attr__( 'Your Website', 'saasmax' ).'">
                                    </div>
                                </div>
                            </div>'
        );
        return $fields;
    }
}
add_filter('comment_form_default_fields', 'saasmax_comment_form_default_fields');


/*-----------------------------------------
    OVERWRITE COMMENT FORM DEFAULT
-------------------------------------------*/
if( ! function_exists('saasmax_comment_form_defaults') ){

    function saasmax_comment_form_defaults( $defaults ) {
        global $aria_req;
        $defaults = array(
            'class_form'    => 'comment-form',
            'title_reply'   => esc_html__( 'Leave A Comment', 'saasmax' ),
            'comment_field' => '<div class="form-group mb0">
                                    <textarea name="comment" placeholder="'.esc_attr__( 'Your Comment', 'saasmax' ).'" '.$aria_req.' rows="10"></textarea>    
                                </div>',
            'comment_notes_before'  => '',
            'label_submit'  => esc_html__( 'Post Comment', 'saasmax' ),
        );
        return $defaults;
    }    
}
add_filter( 'comment_form_defaults', 'saasmax_comment_form_defaults' );


/*------------------------------
    CUSTOM COMMENT
--------------------------------*/
if ( !function_exists('saasmax_comment') ) {
    function saasmax_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>

            <?php if( get_comment_type() == 'pingback' || get_comment_type() == 'trackback' ): ?>
        <li id="comment-<?php comment_ID() ?>" class="single-comment pingback-comment">

            <div class="comment-details">
                <div class="comment-meta">
                    <h4><?php comment_author_link(); ?></h4>
                    <a class="comment-date" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                        <?php printf( esc_html__('%1s','saasmax'), get_comment_date() ); ?>
                    </a>
                </div>
                <div class="comment-content">
                    <?php wpautop( comment_text() ); ?>
                </div>
                <div class="comment-edit">
                    <?php  edit_comment_link( esc_html__( 'Edit Comment', 'saasmax' ) ); ?>
                </div>
            </div>

            <?php endif; ?>

            <?php if( get_comment_type() == 'comment' ) : ?>
        <li id="comment-<?php comment_ID() ?>" class="single-comment">
            <div class="comment-details">
                <div class="comment-author">
                    <?php
                        $avatar_size = 100;
                        if ( $comment->comment_parent != '0' ) {
                            $avatar_size = 80; 
                        } 
                        echo get_avatar( $comment->comment_author_email,$avatar_size );
                    ?>
                </div>
                <div class="comment-meta">
                    <div class="comment-left-meta">
                        <h4 class="author-name"><?php comment_author_link(); ?></h4>
                        <a class="comment-date" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                            <?php printf( esc_html__('%1s','saasmax'), get_comment_date() ); ?>
                        </a>
                    </div>
                </div>
                <div class="comment-content">
                    <?php wpautop( comment_text() ); ?>
                </div>
                <div class="comment-reply">
                    <?php
                        comment_reply_link( 
                            array_merge(
                                $args,
                                array(
                                    'depth'      => $depth, 
                                    'max_depth'  => $args['max_depth'],
                                    'reply_text' => '<i class="fa fa-reply"></i>'.esc_html__( 'Reply', 'saasmax' ), 
                                )
                            )
                        );
                    ?>
                </div>
                <?php  if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.','saasmax' ); ?></em><br/>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        <?php
    }
}

/*--------------------------
    POSTS PAGINATION
---------------------------*/
if ( !function_exists('saasmax_pagination') ) {
    function saasmax_pagination(){
        the_posts_pagination(array(
            'screen_reader_text' => ' ',
            'prev_text'          => '<i class="ti-arrow-left"></i>',
            'next_text'          => '<i class="ti-arrow-right"></i>',
            'type'               => 'list',
            'mid_size'           => 1,
        ));
    }
}

/*------------------------
    POSTS PAGINATION CUSTOM
-------------------------*/
if ( !function_exists('saasmax_custom_pagination') ) {
    function saasmax_custom_pagination($query_name ){
        echo '<nav class="navigation pagination"><div class="nav-links">';
        echo paginate_links(array(
            'prev_text'          => '<i class="ti-arrow-left"></i>',
            'next_text'          => '<i class="ti-arrow-right"></i>',
            'screen_reader_text' => ' ',
            'mid_size'           => 1,
            'base'               => get_pagenum_link(1) . '%_%',
            'format'             => 'page/%#%',
            'current'            => max( 1, get_query_var('paged') ),
            'total'              => $query_name->max_num_pages,
            'prev_next'          => true,
            'type'               => 'list',
        ));
        echo '</div></nav>';
    }
}

/*------------------------
    POSTS NAVIGATION
--------------------------*/
if ( !function_exists('saasmax_navigation') ) {
    function saasmax_navigation(){
        the_posts_navigation(array(
            'screen_reader_text' => ' ',        
            'prev_text'          => '<i class="ti ti-angle-double-left"></i> '.esc_html__( 'Older posts', 'saasmax' ),
            'next_text'          => esc_html__( 'Newer posts', 'saasmax' ).' <i class="ti ti-angle-double-right"></i>',
        )); 
    }
}

/*------------------------
    SINGLE POST NAVIGATION
--------------------------*/
if ( !function_exists('saasmax_single_navigation') ) {
    function saasmax_single_navigation(){
        the_post_navigation( array(
            'screen_reader_text' => ' ',  
            'prev_text'          => '<i class="ti ti-angle-double-left"></i> '.esc_html__( 'Prev Post', 'saasmax' ),
            'next_text'          => esc_html__( 'Next Post', 'saasmax' ).' <i class="ti ti-angle-double-right"></i>',
        ));
    }
}

/*----------------------
    SINGLE POST NAVIGATION
------------------------*/
if ( !function_exists('saasmax_post_navigation') ) {
    function saasmax_post_navigation(){
        global $post;
        $next_post = get_adjacent_post(false, '', false);
        $prev_post = get_adjacent_post(false, '', true);
        ?>
        <div class="single-post-navigation">

            <?php if( !empty($prev_post) ): ?>
            <div class="prev-post">
                <a href="<?php echo esc_url( get_permalink($prev_post->ID) ); ?>">
                    <div class="arrow-link">
                        <i class="fa fa-arrow-left"></i>
                    </div>
                    <div class="title-with-link">
                        <span><?php esc_html_e( 'Prev Post', 'saasmax' ) ?></span>
                        <h3><?php echo esc_html( wp_trim_words( $prev_post->post_title, 4, '.' ) ); ?></h3>
                    </div>
                </a>
            </div>
            <?php endif; ?>

            <div class="single-post-navigation-center-grid">
                <a href="<?php echo esc_url( home_url('/') ) ?>"><i class="fa fa-th-large"></i></a>
            </div>

            <?php if( !empty($next_post) ): ?>
            <div class="next-post">
                <a href="<?php echo esc_url( get_permalink($next_post->ID) ); ?>">
                    <div class="title-with-link">
                        <span><?php esc_html_e( 'Next Post', 'saasmax' ) ?></span>
                        <h3><?php echo esc_html( wp_trim_words( $next_post->post_title, 4, '.' ) ); ?></h3>
                    </div>
                    <div class="arrow-link">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                </a>
            </div>
            <?php endif; ?>

        </div>
    <?php
    }
}

/*------------------------
    COMMENTS PAGINATION
-------------------------*/
if ( !function_exists('saasmax_comments_pagination') ) {
    function saasmax_comments_pagination(){
        the_comments_pagination(array(
            'screen_reader_text' => ' ',
            'prev_text'          => '<i class="ti-arrow-left"></i>',
            'next_text'          => '<i class="ti-arrow-right"></i>',
            'type'               => 'list',
            'mid_size'           => 1,
        ));
    }
}

/*------------------------
    COMMENTS NAVIGATION
-------------------------*/
if ( !function_exists('saasmax_comments_navigation') ) {
    function saasmax_comments_navigation(){
        the_comments_navigation(array(
            'screen_reader_text' => ' ',
            'prev_text'          => '<i class="ti ti-angle-double-left"></i> '.esc_html__( 'Older Comments', 'saasmax' ),
            'next_text'          => esc_html__( 'Newer Comments', 'saasmax' ).' <i class="ti ti-angle-double-right"></i>',
        ));
    }
}

if ( !function_exists('saasmax_related_posts_query') ) {
    /**
     * [saasmax_related_posts_query for use in the loop, list 5 post titles related to first tag on current post]
     * @return [type] string
     */
    function saasmax_related_posts_query(){

        global $post;
        $tags = wp_get_post_tags($post->ID);
        if ( $tags ) {
            $first_tag = $tags[0]->term_id;
            $args = array(
                        'tag__in'             => array($first_tag),
                        'post__not_in'        => array($post->ID),
                        'posts_per_page'      =>2,
                        'ignore_sticky_posts' =>1
                    );
            $related_query = new WP_Query($args); 
            if( $related_query->have_posts() ) { ?>
                <div class="related-post-warapper">
                    <h3><?php esc_html_e( 'Related Posts', 'saasmax' ); ?></h3>
                    <div class="related-post">
                        <div class="row">
                            <?php                                    
                                while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="single-post-item xs-mb50">
                                            <?php the_post_thumbnail(); ?>
                                            <div class="post-details">
                                                <?php saasmax_single_category_retrip(); ?>
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <?php 
                                                    saasmax_post_ago_bottom_meta();
                                                    echo sprintf('<a class="post_readmore" href="%1$s">'.esc_html__( 'Read More', 'saasmax' ).'</a>', get_the_permalink());
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
    }
}

/*----------------------------------
    SINGLE POST / PAGES LINK PAGES
------------------------------------*/
if ( !function_exists('saasmax_link_pages') ) {
    function saasmax_link_pages(){
        wp_link_pages( array(
            'before'           => '<div class="page-links post-pagination"><p>' . esc_html__( 'Pages:', 'saasmax' ).'</p><ul><li>',
            'separator'        => '</li><li>',
            'after'            => '</li></ul></div>',
            'next_or_number'   => 'number',
            'nextpagelink'     => esc_html__( 'Next Page', 'saasmax'),
            'previouspagelink' => esc_html__( 'Prev Page', 'saasmax' ),
        ));
    }
}

/*----------------------------
    SEARCH FORM
------------------------------*/
if ( !function_exists('saasmax_search_form') ) {
    function saasmax_search_form( $is_button=true , $search_buttton=true ) {
        ?>
        <div class="search-form">
            <form id="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="text" id="search" placeholder="<?php esc_attr_e('Search ...', 'saasmax'); ?>" name="s">
                <?php if( $search_buttton == true ) : ?>
                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                <?php endif; ?>
            </form>
            <?php if( $is_button==true ) : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="home_btn"> <?php esc_html_e('Back to home Page', 'saasmax'); ?> </a>
            <?php endif; ?>
        </div>
        <?php
    }
}

/*-------------------------------------
    SEARCH PAGE SEARCH FORM
-------------------------------------*/
if ( !function_exists('saasmax_search_page_search_form') ) {
    function saasmax_search_page_search_form() {
        ?>
        <div class="search-form">            
            <form action="<?php echo esc_url(home_url('/')); ?>" method="get" _lpchecked="1">
                <input type="text" name="s" class="form-control search-field" id="search" placeholder="<?php esc_attr_e('Enter here your search query', 'saasmax'); ?>" value="<?php echo get_search_query(); ?>">
                <button type="submit" class="search-submit search_btn"> <?php esc_html_e('Search', 'saasmax') ?> </button>
            </form>
        </div>
        <?php
    }
}

/*------------------------------
    POST PASSWORD FORM
-------------------------------*/
if ( !function_exists('saasmax_password_form') ) {
    function saasmax_password_form($form) {
    global $post;
    $label  =   'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $form =   '<form class="protected-post-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
                    <span>'.esc_html__( "To view this protected post, enter the password below:", 'saasmax' ).'</span>
                    <input name="post_password" id="' . $label . '" type="password"  placeholder="'.esc_attr__( "Enter Password", 'saasmax' ).'">
                    <input type="submit" name="Submit" value="'.esc_attr__( "Submit",'saasmax' ).'">
                </form>';
    return $form;
    }
}
add_filter( 'the_password_form', 'saasmax_password_form' );

/*-------------------------------
    ADD CATEGORY NICENAMES IN BODY AND POST CLASS
--------------------------------*/
if ( !function_exists('saasmax_post_class') ) {
   function saasmax_post_class( $classes ) {
    
        global $post;
        if ( 'page' === get_post_type() ) {
            if(!has_post_thumbnail()) {
                $classes[] = 'no-post-thumbnail';
            }
        }

        if ( 'post' === get_post_type() ) {
            if ( !function_exists('post_like_count_and_social') ) {
                $classes[] = 'no-social-count';
            }

            if ( is_page_template( 'blog-classic.php' ) ) {
                $classes[] = 'blog-classic';
            }

            if ( is_single() ) {
                $classes[] = 'single-post-item';
            }else{
                $classes[] = 'single-post-item mb50';
            }
        }
        return $classes;
    }
}
add_filter( 'post_class', 'saasmax_post_class' );

/*-------------------------------
    DAY LINK TO ARCHIVE PAGE
---------------------------------*/
if ( !function_exists('saasmax_day_link') ) {
    function saasmax_day_link() {
        $archive_year   = get_the_time('Y');
        $archive_month  = get_the_time('m');
        $archive_day    = get_the_time('d');
        echo get_day_link( $archive_year, $archive_month, $archive_day);
    }
}

/*--------------------------------
    GET COMMENT COUNT TEXT
----------------------------------*/
if ( !function_exists('saasmax_comment_count_text') ) {
    function saasmax_comment_count_text($post_id) {
        $comments_number = get_comments_number($post_id);
        if($comments_number==0) {
            $comment_text = esc_html__('No comment', 'saasmax');
        }elseif($comments_number == 1) {
            $comment_text = esc_html__('One comment', 'saasmax');
        }elseif($comments_number > 1) {
            $comment_text = $comments_number.esc_html__(' Comments', 'saasmax');
        }
        echo esc_html($comment_text);
    }
}

/*-------------------------------------
    EXCERPT CUSTOM LENGTH
---------------------------------------*/
function saasmax_excerpt_custom_lenth($value){
    if (saasmax_any_data( 'blog_excerpt_word' )) {
        $value = saasmax_any_data( 'blog_excerpt_word' );
    }else{
        $value = 50;
    }
    return $value;
}
add_filter( 'excerpt_length', 'saasmax_excerpt_custom_lenth' );

/**
 * Remove schema attributes from custom logo html
 *
 * @param string $html
 * @return string
 */
function saasmax_remove_custom_logo_schema_attr( $html ) {
    return str_replace( array( 'itemprop="url"', 'itemprop="logo"' ), '', $html );
}
add_filter( 'get_custom_logo', 'saasmax_remove_custom_logo_schema_attr' );


/**
 * Remove schema attributes from oembed iframe html
 *
 * @param string $html
 * @return string
 */
function saasmax_remove_oembed_schema_attr($return, $data, $url){
    if( is_object( $data ) ){
        $return = str_ireplace(
            array( 
                'frameborder="0"',
                'scrolling="no"',
                'frameborder="no"',
            ),
            '',
            $return
        );
    }
    return $return;
}
add_filter( 'oembed_dataparse', 'saasmax_remove_oembed_schema_attr', 10, 3 );


/**
 * saasmax_move_comment_field_to_bottom () Remove cookie field and move comment field bottom.
 * @param  $fields array()
 * @return return comment form fields
 */
function saasmax_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    unset( $fields['cookies'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'saasmax_move_comment_field_to_bottom' );


/**
 * saasmax_archive_count_span() This code filters the Archive widget to include the post count inside the link
 * @param  [type] $links
 * @return [type] $string 
 */
function saasmax_archive_count_span($links) {
    $links = str_replace('</a>&nbsp;(', ' <span>', $links);
    $links = str_replace(')', '</span></a>', $links);
    return $links;
}
add_filter('get_archives_link', 'saasmax_archive_count_span');

function saasmax_archive_dropdown_count_span($links) {
    $links = str_replace('&nbsp;(', ' (', $links);
    $links = str_replace('</span></a></option>', ')</option>', $links);
    return $links;
}
add_filter('get_archives_link', 'saasmax_archive_dropdown_count_span');


/**
 * saasmax_category_count_span() category count show in a span.
 * @param  [type] $links
 * @return [type] $string
 */
function saasmax_category_count_span($links) {
    $links = str_replace('</a> (', ' <span>', $links);
    $links = str_replace(')', '</span></a>', $links);
    return $links;
}
add_filter('wp_list_categories', 'saasmax_category_count_span');

function saasmax_category_dropdown_count_span($links) {
    $links = str_replace('&nbsp;(', ' <span>', $links);
    $links = str_replace(')</option>', '</span></option>', $links);
    return $links;
}
add_filter('wp_list_categories', 'saasmax_category_dropdown_count_span');


/**
 * [saasmax_custom_form_class_attr Add a custom class in contact form 7 $class .= ' class-name';]
 * @param  [type] $class
 * @return [type] string
 */
function saasmax_custom_form_class_attr( $class ) {
    return $class;
}
add_filter( 'wpcf7_form_class_attr', 'saasmax_custom_form_class_attr' );


/**
* Remove Contact Form 7 Unwanted P Tag.
**/
add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});


/**
 * Importing Demo Content
 */
if ( class_exists('OCDI_Plugin') ) {
    require_once( dirname(__FILE__) . '/importer.php' );
}