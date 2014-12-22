<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage VigilantMedia2014
 * @subpackage VigilantMedia2014 2.1
 */

namespace VigilantMedia\WordPress\Themes\VigilantMedia2014;
?>
<div class="col-md-4">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div role="complementary">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- #secondary-sidebar -->
	<?php endif; ?>
</div><!-- #secondary -->
