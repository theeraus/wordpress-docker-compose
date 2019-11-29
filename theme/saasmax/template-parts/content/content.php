<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @Package SaasMax
 */

?>
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
    <div class="post-content-wrap">
        <?php if ( 'post' === get_post_type() && is_single() ) {
            saasmax_single_post_top_meta();
        } ?>
        <?php saasmax_post_thumbnail(); ?>
        <div class="post-details">
            <?php 
                if ( !is_single() ) {
                    saasmax_comment_author();
                }
            ?>
            <?php 
                if ( 'post' === get_post_type() && !is_single() ) {
                    saasmax_top_meta();
                }
            ?>
            <?php 
                if ( get_the_title() ) {
                    if ( ! is_single() ) {
                        the_title( '<h3 class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
                    }
                }
            ?>
            <?php if ( get_the_content() ) :  ?>
            <div class="post-content fix">
                <?php
                    if ( is_single() ) {
                        the_content( sprintf(
                            wp_kses(
                                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'saasmax' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ) );
                    }else{
                        the_excerpt();
                    }
                    if ( is_single() ) {
                        saasmax_link_pages();
                    }
                ?>
            </div>
            <?php endif; ?>
            <?php
                if ( !is_single() ) {
                    saasmax_readmore();
                }
                if( is_single() ) {            
                    if(function_exists('saasmax_post_footer_meta')){
                        saasmax_post_footer_meta();
                    }
                }
            ?>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->