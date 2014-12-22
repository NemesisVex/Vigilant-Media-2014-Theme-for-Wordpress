<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage VigilantMedia2014
 * @subpackage VigilantMedia2014 2.2
 */

namespace VigilantMedia\WordPress\Themes\VigilantMedia2014;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<nav class="navbar navbar-default navbar-static-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-nav"><?php /*_e( 'Primary Menu', WP_TEXT_DOMAIN );*/ ?>
							<a class="screen-reader-text skip-link sr-only" href="#content"><?php _e( 'Skip to content', WP_TEXT_DOMAIN ); ?></a>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand"><?php bloginfo( 'name' ); ?></a>
					</div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_id' => 'bs-nav', 'container_class' => 'collapse navbar-collapse', 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'vigilantmedia2014_page_menu' ) ); ?>
				</div>
			</nav>
		</div>
	</header><!-- #masthead -->

	<div class="container">
