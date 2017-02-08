<?php

	require "widget-social.php";
	require "widget-address.php";
	require "theme-settings.php";

/*------------------------------------------------------------------------------
  START WITH REMOVING UNNECCESSARY CODE
------------------------------------------------------------------------------*/

	/**
	 * Removes unneccessary code.
	 */
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'feed_links', 2 );


	add_filter('comment_form_default_fields','remove_comment_url');

	/**
	 * Removes URL from comment field.
	 */
	function remove_comment_url($fields) {
		unset($fields['url']);
		return $fields;
	}

/*------------------------------------------------------------------------------
  GENERAL SETUP FOR THEME 'SYMMETRI'
------------------------------------------------------------------------------*/

	add_action( 'after_setup_theme', 'symmetri_setup' );

	/**
	 * Setup of theme 'Symmetri' with fonts, css, scripts,
	 * custom menus and custom image sizes.
	 */
	function symmetri_setup() {

		// Project main CSS
		wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.css', null, '1.0', 'all' );

		// Project fonts
		wp_enqueue_style( 'Lato', '//fonts.googleapis.com/css?family=Lato:100,300,400,700' );

		// Project fonts
		wp_enqueue_style( 'Playfair Display', '//fonts.googleapis.com/css?family=Lato|Playfair+Display:400,700,700i,900' );

		// Script used for layout
		wp_enqueue_script( 'masonry', '//unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js' );

		wp_enqueue_script( 'masonry_init', get_template_directory_uri() . '/js/masonry_init.js', array('masonry'), '', true );

		// Website main navigation
		register_nav_menu( 'mainmenu', 'Website main navigation' );

		// Adds Featured Image Option
		add_theme_support( 'post-thumbnails', array( 'post', 'symmetri_cpt_gallery' ) );

		// Since value 'true' is not added, this is set to soft crop mode
		add_image_size( 'album-cover', 300, 9999 );
	}

/*------------------------------------------------------------------------------
  CUSTOMIZE DASHBOARD IN EDITOR MODE
------------------------------------------------------------------------------*/

	add_action( 'wp_dashboard_setup', 'symmetri_customize_dashboard_boxes' );

	/**
	 * Removes the widgets 'Quick Draft', 'At a Glance',
	 * and 'Wordpress News' from Dashboard. Adds a custom made widget
	 * with useful quick links.
	 *
	 */
	function symmetri_customize_dashboard_boxes() {
		global $wp_meta_boxes;

		// Removes 'Quick Draft' from dashboard
		unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );

		// Removes 'At a Glance' from Dashboard
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);

		// Removes 'Wordpress News' from Dashboard
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);

		// Adds the custom made dashboard widget 'Quick Links'
		wp_add_dashboard_widget('symmetri_dashboard', 'Quick Links', 'symmetri_dashwidget', null, null);
	}

	/**
	 * Custom Dashboard widget with useful quick links
	 */
	function symmetri_dashwidget() { ?>
		<ul>

			<li><a href="post-new.php?post_type=symmetri_cpt_gallery"><?php _e( 'Add new work item (image gallery)', 'symmetri' ); ?></a></li>

			<li><a href="edit.php?post_type=symmetri_cpt_gallery"><?php _e( 'See all work items (shown on front page)', 'symmetri' ); ?></a></li>

			<li><a href="post-new.php"><?php _e( 'Add new blog post (for category "Work in progress")', 'symmetri' ); ?></a></li>

			<li><a href="edit.php?post_type=page"><?php _e( 'Edit pages (i.e. About, Contact)', 'symmetri' ); ?></a></li>


		</ul>

		<?php
	}

/*------------------------------------------------------------------------------
  REGISTER SIDEBAR USED FOR CONTACT INFORMATION
------------------------------------------------------------------------------*/

	register_sidebar( array(

		'name' 			=> __( 'Contact Information', 'contact-container' ),
		'id'	 		=> 'contact-container',
		'description' 	=> __( 'A container for contact information', 'contact-container' ),
		'before_widget' => '<address class="contact-information">',
		'after_widget' 	=> '</address>'

	) ) ;

/*------------------------------------------------------------------------------
  PREPARE FOR LOCALIZATION
------------------------------------------------------------------------------*/

	load_theme_textdomain( 'symmetri', templatepath.'/languages' );


/*------------------------------------------------------------------------------
  CUSTOM FUNCTIONS
------------------------------------------------------------------------------*/

	/**
	 * A function that retrieves current page
	 * @return int Return current page as a variable ($paged)
	 */
	function getCurrentPage() {

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		return $paged;
	}
?>
