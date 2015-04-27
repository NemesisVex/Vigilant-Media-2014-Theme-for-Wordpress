<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage VigilantMedia2014
 * @subpackage VigilantMedia2014 2.2
 */

namespace VigilantMedia\WordPress\Themes\VigilantMedia2014;
?>
<?php get_header(); ?>

	<div class="row">

		<section class="col-md-8">
		<?php while ( have_posts() ) : the_post(); // Start the Loop. ?>
			<?php get_template_part( 'content', get_post_format() ); // Include the post format-specific template for the content. If you want to use this in a child theme, then include a file called called content-___.php (where ___ is the post format) and that will be used instead. ?>
			<?php TemplateTags::post_nav(); // Previous/next post navigation. ?>
				<?php if ( comments_open() || get_comments_number() ) : // If comments are open or we have at least one comment, load up the comment template. ?>
					<?php comments_template(); ?>
				<?php endif; ?>
		<?php endwhile; ?>
		</section><!-- #content -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php
get_footer();
