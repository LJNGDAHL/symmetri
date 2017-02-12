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
		<?php
			get_template_part('template-parts/main', 'navigation');
			get_template_part('template-parts/mast', 'head');
			get_template_part('template-parts/fixed', 'head');
		?>
