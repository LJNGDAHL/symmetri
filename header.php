<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title><?php echo get_bloginfo( 'name' ); ?></title>
		<link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="img/favicons/manifest.json">
		<link rel="mask-icon" href="img/favicons/safari-pinned-tab.svg">
		<meta name="theme-color" content="#f8f8f8">
		<?php wp_head(); ?>
	</head>
	<body id="body" <?php body_class(); ?>>
		<a class="menu-link" href="#navigation">Menu</a>
		<!-- TODO: Decide which menu link to use.  -->
		<!-- <a href="#navigation" aria-label="Menu icon">
			Insert get template part here
		</a> -->
		<nav class="main-navigation" id="navigation">
			<a href="#body" class="exit-menu" aria-label="Exit icon">
				<?php get_template_part( 'img/exit', 'icon' ); ?>
			</a>
			<?php wp_nav_menu(array('theme_location' => 'mainmenu')); ?>

			<div class="logotype-container">
				<?php get_template_part( 'img/logo' ); ?>
			</div>
		</nav>
		<div class="logo">
			<h1 class="main-title">
				<a href="<?php bloginfo( 'wpurl' );?>">
					<?php get_template_part( 'img/lens' ); ?><br>
					<div class="photographer-container">
						<!-- TODO: Check if this is okay, or if this needs to be put away. -->
						<span class="photographer-name">Johan Alfredsson</span><br>
						<span class="photographer-title">Photography</span>
					</div>
				</a>
			</h1>
		</div>
