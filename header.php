<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title><?php echo get_bloginfo( 'name' ); echo ' '; echo get_bloginfo( 'description'); ?></title>
		<link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="img/favicons/manifest.json">
		<link rel="mask-icon" href="img/favicons/safari-pinned-tab.svg">
		<meta name="theme-color" content="#f8f8f8">

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
		<a class="menu-link" href="#navigation">Menu</a>
		<nav class="main-navigation" id="navigation">
			<a href="#body" class="exit-menu" aria-label="Exit icon">
				<?php get_template_part( 'img/exit', 'icon' ); ?>
			</a>
			<?php wp_nav_menu( array ('theme_location' => 'mainmenu') ); ?>
			<div class="logotype-container">
				<a href="#body">
					<?php get_template_part( 'img/logo' ); ?>
				</a>
			</div>
		</nav>
		<div class="logo">
			<div class="main-title">
				<a href="<?php bloginfo( 'wpurl' );?>">
					<?php get_template_part( 'img/lens' ); ?>
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
