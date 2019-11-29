<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @Package SaasMax
 */

get_header();

if ( is_active_sidebar( 'main-sidebar' ) ) {
    $saasmax_layout = 'col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1';
}else{
    $saasmax_layout = 'col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1';
}
?>
<?php 
	if ( function_exists('saasmax_title') ) {
		saasmax_title();
	}
?>
<div class="content-area section-padding">
    <div class="container">
        <div class="row">
			<div class="<?php echo esc_attr( $saasmax_layout ); ?>">
				<div class="error-404 not-found center">
					<div class="content-header">
						<h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'saasmax' ); ?></h3>
					</div>

					<div class="error-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'saasmax' ); ?></p>
						<div class="page-search">
							<?php saasmax_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();