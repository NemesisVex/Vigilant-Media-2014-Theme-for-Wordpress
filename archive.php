<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage VigilantMedia2014
 * @subpackage VigilantMedia2014 2.1
 */
?>
<?php get_header(); ?>

<div class="row">

	<section class="col-md-8">

	<?php if ( have_posts() ) : ?>

		<header>
			<h2>
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: %s', 'vigilantmedia2014' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: %s', 'vigilantmedia2014' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'vigilantmedia2014' ) ) ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: %s', 'vigilantmedia2014' ), get_the_date( _x( 'Y', 'yearly archives date format', 'vigilantmedia2014' ) ) ); ?>
				<?php else : ?>
					<?php _e( 'Archives', 'vigilantmedia2014' ); ?>
				<?php endif; ?>
			</h2>
		</header><!-- .page-header -->

		<?php while ( have_posts() ) : the_post(); // Start the Loop. ?>
			<?php get_template_part( 'content', get_post_format() ); // Include the post format-specific template for the content. If you want to use this in a child theme, then include a file called called content-___.php (where ___ is the post format) and that will be used instead. ?>
		<?php endwhile; ?>
		<?php VigilantMedia2014_Template_Tags::paging_nav(); // Previous/next page navigation. ?>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); // If no content, include the "No posts found" template. ?>
	<?php endif; ?>

	</section><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
