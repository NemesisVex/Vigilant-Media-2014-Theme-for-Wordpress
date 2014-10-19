<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 10/14/14
 * Time: 9:31 PM
 */

class VigilantMedia2014_Filters {

	public function __construct() {

	}

	public static function after_setup_theme() {
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );


	}

	public static function widgets_init() {
//	require get_template_directory() . '/inc/widgets.php';
//	register_widget( 'Musicwhore2014_Ephemera_Widget' );

		register_sidebar( array(
			'name'          => __( 'Primary Sidebar', 'vigilantmedia2014' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Main sidebar that appears on the left.', 'vigilantmedia2014' ),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => __( 'Content Sidebar', 'vigilantmedia2014' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Additional sidebar that appears on the right.', 'vigilantmedia2014' ),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => __( 'Footer Widget Area', 'vigilantmedia2014' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Appears in the footer section of the site.', 'vigilantmedia2014' ),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );
	}

	public static function wp_enqueue_scripts() {
		wp_enqueue_style( 'musicwhore2014-style', get_stylesheet_uri() );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	public static function wp_page_menu_args( $args ) {
		$args['show_home'] = false;
		$args['container'] = false;
		$args['menu_class'] = 'nav navbar-nav';
		return $args;
	}

	public static function wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() ) {
			return $title;
		}

		// Add the site name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			$title = "$title $sep " . sprintf( __( 'Page %s', 'vigilantmedia2014' ), max( $paged, $page ) );
		}

		return $title;
	}
}