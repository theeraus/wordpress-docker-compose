<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @Package SaasMax
 */

get_header();

if ( is_active_sidebar( 'main-sidebar' ) ) {
	$saasmax_single_post_layout = 'col-md-8';
}else{
	$saasmax_single_post_layout = 'col-md-10 col-md-offset-1';
}
?>
<?php 
    if (function_exists('saasmax_title')) {
        saasmax_title();
    }
?>
<div class="content-area section-padding">
    <div class="container">
        <div class="row">
			<div class="<?php echo esc_attr( $saasmax_single_post_layout ); ?>">
				<?php while ( have_posts() ) : the_post(); ?>
                    <?php
    					get_template_part( 'template-parts/content/content', get_post_format() );
                        if ( wp_count_posts('post')->publish > 1 ) {
                            saasmax_post_navigation();
                        }
                        saasmax_related_posts_query();
                        get_template_part( 'template-parts/post/author-bio' );
                        if ( comments_open() || get_comments_number() ) :
                            comments_template(); 
                        endif;
                    ?>
                <?php endwhile; ?>
			</div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php
get_footer();