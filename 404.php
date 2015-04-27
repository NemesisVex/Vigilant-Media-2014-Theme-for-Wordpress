<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage VigilantMedia2014
 * @subpackage VigilantMedia2014 2.2
 */

namespace VigilantMedia\WordPress\Themes\VigilantMedia2014;
?>
<?php get_header(); ?>

	<div class="row">

		<div class="col-md-8">

			<header class="page-header">
				<h2 class="page-title"><?php _e( 'Not Found', WP_TEXT_DOMAIN ); ?></h2>
			</header>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', WP_TEXT_DOMAIN ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->

		</div><!-- #content -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php
get_footer();
