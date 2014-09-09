<?php
/**
 * Custom template tags for Twenty Fourteen
 *
 * @package WordPress
 * @subpackage VigilantMedia2014
 * @subpackage VigilantMedia2014 1.0
 */

if ( ! function_exists( 'vigilantmedia2014_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @subpackage VigilantMedia2014 1.0
 */
function vigilantmedia2014_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$pagination_args = array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'vigilantmedia2014' ),
		'next_text' => __( 'Next &rarr;', 'vigilantmedia2014' ),
		'type' => 'list',
		'list_class' => 'pagination',
	);
	$links = ( function_exists( 'bootstrap_paginate_links' ) ) ? bootstrap_paginate_links($pagination_args) : paginate_links( $pagination_args );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h4 class="screen-reader-text sr-only"><?php _e( 'Posts navigation', 'vigilantmedia2014' ); ?></h4>
		<div class="pagination loop-pagination">
			<?php echo $links; ?>
		</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;

if ( ! function_exists( 'vigilantmedia2014_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @subpackage VigilantMedia2014 1.0
 */
function vigilantmedia2014_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}

	?>
	<nav class="navigation post-navigation" role="navigation">
		<h4 class="screen-reader-text sr-only"><?php _e( 'Post navigation', 'vigilantmedia2014' ); ?></h4>
		<div class="nav-links">
			<ul class="pager">
			<?php if ( is_attachment() ) : ?>
				<li><?php previous_post_link( '%link', __( '<span class="meta-nav">Published In</span>%title', 'vigilantmedia2014' ) ); ?></li>
			<?php else : ?>
				<li><?php previous_post_link( '%link', __( '<span class="meta-nav" title="Previous Post: %title">Previous</span>', 'vigilantmedia2014' ) ); ?></li>
				<li><?php next_post_link( '%link', __( '<span class="meta-nav" title="Next Post: %title">Next</span>', 'vigilantmedia2014' ) ); ?></li>
			<?php endif; ?>
			</ul>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'vigilantmedia2014_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @subpackage VigilantMedia2014 1.0
 */
function vigilantmedia2014_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<li><span class="glyphicon glyphicon-star"></span> <span class="featured-post">' . __( 'Sticky', 'vigilantmedia2014' ) . '</span></li>';
	}

	// Set up and print post meta information.
		printf( '<li><span class="glyphicon glyphicon-calendar"></span> <span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span></li><li><span class="glyphicon glyphicon-user"></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span></li>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
}
endif;

/**
 * Find out if blog has more than one category.
 *
 * @subpackage VigilantMedia2014 1.0
 *
 * @return boolean true if blog has more than 1 category
 */
function vigilantmedia2014_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'vigilantmedia2014_category_count' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'vigilantmedia2014_category_count', $all_the_cool_cats );
	}

	if ( 1 !== (int) $all_the_cool_cats ) {
		// This blog has more than 1 category so vigilantmedia2014_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so vigilantmedia2014_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in vigilantmedia2014_categorized_blog.
 *
 * @subpackage VigilantMedia2014 1.0
 */
function vigilantmedia2014_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'vigilantmedia2014_category_count' );
}
add_action( 'edit_category', 'vigilantmedia2014_category_transient_flusher' );
add_action( 'save_post',     'vigilantmedia2014_category_transient_flusher' );

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 *
 * @subpackage VigilantMedia2014 1.0
 */
function vigilantmedia2014_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
	<?php
		if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'page-templates/full-width.php' ) ) ) {
			the_post_thumbnail( 'vigilantmedia2014-full-width' );
		} else {
			the_post_thumbnail();
		}
	?>
	</div>

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>">
	<?php
		if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'page-templates/full-width.php' ) ) ) {
			the_post_thumbnail( 'vigilantmedia2014-full-width' );
		} else {
			the_post_thumbnail();
		}
	?>
	</a>

	<?php endif; // End is_singular()
}
