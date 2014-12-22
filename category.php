<?php
/**
 * The template for displaying Category pages
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

		<header class="archive-header">
			<h2 class="archive-title"><?php printf( __( 'Category Archives: %s', WP_TEXT_DOMAIN ), single_cat_title( '', false ) ); ?></h2>
		</header><!-- .archive-header -->

		<?php while ( have_posts() ) : // Start the Loop. ?>
			<?php the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); // Include the post format-specific template for the content. If you want to use this in a child theme, then include a file called called content-___.php (where ___ is the post format) and that will be used instead. ?>
		<?php endwhile; ?>
		<?php TemplateTags::paging_nav(); // Previous/next page navigation. ?>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); // If no content, include the "No posts found" template. ?>
	<?php endif; ?>

	</section>
	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
