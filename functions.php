<?php
	require "widget-social.php";
	require "widget-address.php";

	add_action( 'after_setup_theme', 'symmetri_setup' );

	function symmetri_setup() {

		// Project main CSS
		wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.css', null, '1.0', 'all' );

		// Project fonts
		wp_enqueue_style( 'Lato', '//fonts.googleapis.com/css?family=Lato:100,300,400,700' );

		// Project fonts
		wp_enqueue_style( 'Playfair Display', '//fonts.googleapis.com/css?family=Lato|Playfair+Display:400,700,700i,900' );

		// Script used for layout
		// TODO: Replace with CDN link.
		wp_enqueue_script( 'isotope-layout', get_stylesheet_directory_uri() . '/js/isotope.js', array('jquery'), '3.0.2', true );

		// Script used for initializing isotope-layout.
		wp_enqueue_script('isotope_init', get_stylesheet_directory_uri() . '/js/isotope_init.js', array('isotope'), '', true);

		// Website main navigation
		register_nav_menu( 'mainmenu', 'Website main navigation' );


		// Adds Featured Image Option
		add_theme_support( 'post-thumbnails', array( 'post', 'symmetri_cpt_gallery' ) );

		// Since value 'true' is not added, this is set to soft crop mode
		add_image_size( 'album-cover', 300, 9999 );
	}

	// Register sidebar
	register_sidebar( array(

		'name' 			=> __( 'Contact Information', 'contact-container' ),
		'id'	 		=> 'contact-container',
		'description' 	=> __( 'A container for contact information', 'contact-container' ),
		'before_widget' => '<address class="contact-information">',
		'after_widget' 	=> '</address>'

	) ) ;

	// Preps theme for localization
	load_theme_textdomain( 'symmetri', templatepath.'/languages' );

?>
