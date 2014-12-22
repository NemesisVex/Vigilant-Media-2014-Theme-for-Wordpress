<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage VigilantMedia2014
 * @subpackage VigilantMedia2014 1.0
 */

namespace VigilantMedia\WordPress\Themes\VigilantMedia2014;
?>
<?php get_header(); ?>

	<div class="row">

		<section class="col-md-8">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : // Start the Loop. ?>
					<?php the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); //Include the post format-specific template for the content. If you want to use this in a child theme, then include a file called called content-___.php (where ___ is the post format) and that will be used instead. ?>
				<?php endwhile; ?>
				<?php TemplateTags::paging_nav(); // Previous/next post navigation. ?>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); // If no content, include the "No posts found" template. ?>
			<?php endif; ?>

		</section><!-- #primary -->
		<?php get_sidebar(); ?>
	</div><!-- #main-content -->

<?php
get_footer();
