<?php
/**
 * Template part for main navigation (animates down) when targeted
 * Used in header.php
 *
 * @package Symmetri
 */
?>
<nav class="main-navigation" id="navigation">
	<a href="#menu" class="exit-menu" aria-label="Exit icon">
		<?php get_template_part( '/img/exit', 'icon' ); ?>
	</a>
	<?php wp_nav_menu( array ('theme_location' => 'mainmenu') ); ?>
	<div class="logo-navigation">
		<a href="#body" class="logo-navigation-name">
			<svg class="lens-logo">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#logo"></use>
			</svg>
			<span class="photographer-name">
				<?php echo get_bloginfo( 'name' ); ?>
			</span>
			<span class="photographer-title">
				<?php echo get_bloginfo( 'description' ); ?>
			</span>
		</a>
	</div>
</nav>
