<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title><?php echo get_bloginfo( 'name' ); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<a href="#navigation" id="menu-link">Menu</a>
		<nav class="main-navigation" id="navigation">
			<a href="#menu-link" class="exit-menu">Exit</p>
			<?php wp_nav_menu(array('theme_location' => 'mainmenu')); ?>
		</nav>

		<main id="main" class="site-main" role="main">
			<div class="logo">
				<h1>
					<a href="<?php bloginfo( 'wpurl' );?>">
						<span class="photographer-name">Johan Alfredsson</span><br>
						<span class="photographer-title">Photographer</span>
					</a>
				</h1>
			</div>
