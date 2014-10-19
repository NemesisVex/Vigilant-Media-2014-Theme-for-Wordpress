<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage VigilantMedia2014
 * @subpackage VigilantMedia2014 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see vigilantmedia2014_content_width()
 *
 * @subpackage VigilantMedia2014 1.0
 */

require get_template_directory() . '/lib/VigilantMedia2014_Filters.php';
require get_template_directory() . '/lib/VigilantMedia2014_Template_Tags.php';

add_filter( 'wp_page_menu_args', array( 'VigilantMedia2014_Filters', 'wp_page_menu_args' ) );

add_filter( 'wp_title', array( 'VigilantMedia2014_Filters', 'wp_title' ), 10, 2 );

add_action( 'after_setup_theme', array( 'VigilantMedia2014_Filters', 'after_setup_theme' ) );

add_action( 'widgets_init', array( 'VigilantMedia2014_Filters', 'widgets_init' ) );

add_action( 'wp_enqueue_scripts', array( 'VigilantMedia2014_Filters', 'wp_enqueue_scripts' ) );
