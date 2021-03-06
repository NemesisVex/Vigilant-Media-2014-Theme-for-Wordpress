<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage VigilantMedia2014
 * @subpackage VigilantMedia2014 2.2
 */

namespace VigilantMedia\WordPress\Themes\VigilantMedia2014;

?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer container" role="contentinfo">

		<?php get_sidebar( 'footer' ); ?>

		<div class="site-info">
			<?php do_action( 'vigilantmedia2014_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', WP_TEXT_DOMAIN ) ); ?>"><?php printf( __( 'Proudly powered by %s', WP_TEXT_DOMAIN ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	<?php wp_footer(); ?>
</body>
</html>