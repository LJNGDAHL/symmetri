<?php
/**
 * Template part for fixed head (animates down when scrolling)
 * Used in header.php
 *
 * @package Symmetri
 */
?>
<div class="fixed-head js-menu" hidden id="menu">
	<a class="menu-link" href="#navigation"><?php _e( 'Menu', 'symmetri' ); ?></a>
	<div class="main-logo">
		<div class="main-title">
			<a href="<?php bloginfo( 'wpurl' );?>">
				<svg class="lens-logo">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#logo"></use>
				</svg>
			</a>
		</div>
	</div>
</div>
