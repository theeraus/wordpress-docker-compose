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
    <div class="post-details">
        <div class="post-quote"><div class="fa fa-quote-left"></div></div>
        <?php 
            if ( get_the_title() ) {
                the_title( '<h3 class="post-title">', '</h3>' );
            }
        ?>
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

        <?php saasmax_post_author(); ?>

    </div>
</article><!-- #post-<?php the_ID(); ?> -->