<?php
/**
* The template for displaying the header
* Displays all of the <head> section and everything up until <body>
*
* @package Symmetri
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title><?php echo get_bloginfo( 'name' ); echo ' '; echo get_bloginfo( 'description'); ?></title>

		<?php if ( ! is_admin() ):
			get_template_part( 'template-parts/opengraph', 'meta' );
			get_template_part( 'template-parts/google', 'analytics' );
 			wp_head();
		endif; ?>

	</head>

	<body id="body" <?php body_class(); ?>>

		<a class="main-content-link" href="#main-content"><?php _e( 'Skip to main content', 'symmetri' ); ?></a>

		<?php
			get_template_part( 'template-parts/fixed', 'head' );
			get_template_part( 'template-parts/main', 'navigation' );
			get_template_part( 'template-parts/mast', 'head' );
		?>
