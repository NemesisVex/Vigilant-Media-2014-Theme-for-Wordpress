<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage VigilantMedia2014
 * @subpackage VigilantMedia2014 2.1
 */

namespace VigilantMedia\WordPress\Themes\VigilantMedia2014;
?>
<?php get_header(); ?>

<div class="row">

	<section id="primary" class="content-area col-md-8">

	<?php if ( have_posts() ) : ?>

<header>
	<h2><?php printf( __( 'Search Results for: %s', WP_TEXT_DOMAIN ), get_search_query() ); ?></h2>
</header><!-- .page-header -->

	<?php while ( have_posts() ) : // Start the Loop. ?>
		<?php the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); // Include the post format-specific template for the content. If you want to use this in a child theme, then include a file called called content-___.php (where ___ is the post format) and that will be used instead. ?>
	<?php endwhile; ?>
	<?php TemplateTags::paging_nav(); // Previous/next post navigation. ?>

<?php else : ?>
	<?php get_template_part( 'content', 'none' ); // If no content, include the "No posts found" template. ?>

<?php endif; ?>

	</section><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
