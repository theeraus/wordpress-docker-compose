<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @Package SaasMax
 */

get_header();

if ( is_active_sidebar( 'main-sidebar' ) ) {
    $saasmax_layout      = 'col-md-8';
    $saasmax_post_layout = 'col-md-12 col-sm-12 col-xs-12';
}else{
    $saasmax_layout      = 'col-md-12';
    $saasmax_post_layout = 'col-md-12 col-xs-12';
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
                <div class="<?php echo esc_attr( $saasmax_layout ); ?>">
                    <div class="blog-posts-list">
                        <div class="row blog-masonry blog__grid">

                            <?php if ( have_posts() ) : ?>  

                            <?php while ( have_posts() ) : the_post(); ?>
                                <div class="<?php echo esc_attr( $saasmax_post_layout ); ?>">
                                    <?php  get_template_part( 'template-parts/content/content', get_post_format() ); ?>
                                </div>
                            <?php endwhile; ?>

                            <?php else: ?> 

                            <div class="col-md-12">
                                <?php get_template_part( 'template-parts/content/content', 'none' ); ?>
                            </div>

                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="post-pagination">                        
                        <?php saasmax_pagination(); ?>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php
get_footer();