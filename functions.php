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

namespace VigilantMedia\WordPress\Themes\VigilantMedia2014;

const WP_TEXT_DOMAIN = 'vigilantmedia2014';

if (!function_exists( __NAMESPACE__ . '\\autoload' )) {
	function autoload( $class_name )
	{
		$class_name = ltrim($class_name, '\\');
		if ( strpos( $class_name, __NAMESPACE__ ) !== 0 ) {
			return;
		}

		$class_name = str_replace( __NAMESPACE__, '', $class_name );

		$path = get_template_directory() . '/lib' . str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';

		require_once($path);
	}
}

spl_autoload_register(__NAMESPACE__ . '\\autoload');
Setup::init();
