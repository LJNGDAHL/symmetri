<?php
/**
 * Template part for master head
 * Used in header.php
 *
 * @package Symmetri
 */
?>
<div class="mast-head js-mast-head">
	<a class="menu-link" href="#navigation"><?php _e( 'Menu', 'symmetri' ); ?></a>
	<div class="main-logo">
		<?php if ( is_front_page() || is_singular( 'symmetri_cpt_gallery' ) ) : ?>
		<h1 class="main-title">
			<a href="<?php bloginfo( 'wpurl' );?>">
				<svg class="lens-logo">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#logo"></use>
				</svg>
				<span class="photographer-container">
					<span class="photographer-name">
						<?php echo get_bloginfo( 'name' ); ?>
					</span>
					<span class="photographer-title">
						<?php echo get_bloginfo( 'description' ); ?>
					</span>
				</span>
			</a>
		</h1>
		<?php else: ?>
		<div class="main-title">
			<a href="<?php bloginfo( 'wpurl' );?>">
				<svg class="lens-logo">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#logo"></use>
				</svg>
				<span class="photographer-container">
					<span class="photographer-name">
						<?php echo get_bloginfo( 'name' ); ?>
					</span>
					<span class="photographer-title">
						<?php echo get_bloginfo( 'description' ); ?>
					</span>
				</span>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>
