<?php
	add_action( 'after_setup_theme', 'ljngdahl_wpaj_setup' );

	function ljngdahl_wpaj_setup() {

		// Project main CSS
		wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.css', null, '1.0', 'all' );

		// Project fonts
		wp_enqueue_style( 'Lato', '//fonts.googleapis.com/css?family=Lato:100,300,400' );

		// Website main navigation
		register_nav_menu( 'mainmenu', 'Website main navigation' );

		add_theme_support( 'post-thumbnails', array( 'post', 'wpaj_cpt_gallery' ) );

		// Since value 'true' is not added, this is set to soft crop mode
		add_image_size( 'album-cover', 500, 500 );
	}

	// Preps theme for localization
	load_theme_textdomain( 'wpaj', templatepath.'/languages' );
?>
