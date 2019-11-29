<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @Package SaasMax
 *
 * Template Name: Composer
 */
get_header();

$page_meta_array = saasmax_metabox_value('_saasmax_page_metabox');
$enable_barner   = isset( $page_meta_array['enable_barner'] ) ? $page_meta_array['enable_barner'] : true;

?>
	<?php 
		if ( is_page_template() ) {
			if ( $enable_barner == true ) {
				saasmax_title();
			}
		}
	?>

    <div class="content-area clearfix">
		<?php
			while ( have_posts() ) : the_post();

				the_content();

			endwhile;
		?>
	</div>
	
<?php
get_footer();