<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage VigilantMedia2014
 * @subpackage VigilantMedia2014 1.0
 */

namespace VigilantMedia\WordPress\Themes\VigilantMedia2014;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php if ( is_single() ) : ?>
		<?php the_title( '<h3 class="entry-title">', '</h1>' ); ?>
	<?php else : ?>
		<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
	<?php endif; ?>

		<div class="entry-meta">
			<ul class="list-inline entry-meta-list">
			<?php if ( 'post' == get_post_type() ) : ?>
				<?php TemplateTags::posted_on(); ?>
			<?php endif; ?>
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
				<li><span class="glyphicon glyphicon-comment"></span> <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', WP_TEXT_DOMAIN ), __( '1 Comment', WP_TEXT_DOMAIN ), __( '% Comments', WP_TEXT_DOMAIN ) ); ?></span></li>
			<?php endif; ?>
			<?php edit_post_link( __( 'Edit', WP_TEXT_DOMAIN ), '<li><span class="glyphicon glyphicon-pencil"></span> <span class="edit-link">', '</span></li>' ); ?>
			</ul>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', WP_TEXT_DOMAIN ) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', WP_TEXT_DOMAIN ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post-## -->
