<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title><?php echo get_bloginfo( 'name' ); echo ' '; echo get_bloginfo( 'description'); ?></title>

		<?php wp_head(); ?>

		<?php if ( ! empty ( get_option( 'symmetri-gaid' ) ) ) : ?>
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

				ga('create', '<?php echo get_option('symmetri-gaid', true); ?>', 'auto');
				ga('send', 'pageview');
			</script>
		<?php endif; ?>
	</head>
	<body id="body" <?php body_class(); ?>>

<!-- MAIN NAVIGATION STARTS HERE ---------------------------------------------->

		<nav class="main-navigation" id="navigation">
			<a href="#menu" class="exit-menu" aria-label="Exit icon">
				<?php get_template_part( 'img/exit', 'icon' ); ?>
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

<!-- MAST-HEAD STARTS HERE ---------------------------------------------------->

		<div class="mast-head js-mast-head">
			<a class="menu-link" href="#navigation"><?php _e( 'Menu', 'symmetri' ); ?></a>
			<div class="main-logo">
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
			</div>
		</div>

<!-- FIXED-HEAD STARTS HERE --------------------------------------------------->

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
