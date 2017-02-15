<?php
/**
* Symmetri theme functions and definitions
*
* @package Symmetri
*/

	require 'widget-social.php';
	require 'widget-address.php';
	require 'theme-settings.php';
	require 'metabox-opengraph.php';

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

	add_filter('tiny_mce_before_init', 'symmetri_remove_tiny_mce_formats' );

	/*
	 * Modify TinyMCE editor to remove unused text formats.
	 */
	function symmetri_remove_tiny_mce_formats($init) {
		$init['block_formats'] = 'Heading 2=h2;Heading 3=h3;Paragraph=p;';
		return $init;
	}


/*------------------------------------------------------------------------------
  SETUP OF SCRIPTS
------------------------------------------------------------------------------*/

	add_action( 'wp_enqueue_scripts', 'symmetri_init_scripts' );

	/**
	 * Handles queueing of scripts, stylesheet and fonts.
	 */
	function symmetri_init_scripts() {

		// Project fonts
		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:100,300,400,700|Playfair+Display:400,700');

		if ( ! is_admin() ):

			// Project main CSS
			wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.css', null, '1.0', 'all' );

			// Handles grid layout
			wp_enqueue_script( 'masonry', '//unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', '', '4.1.1', true  );

			// Handles cookie notification, grid setup and fixed menu
			wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', '', null, true );

		endif;

	}

/*------------------------------------------------------------------------------
  GENERAL SETUP FOR THEME 'SYMMETRI'
------------------------------------------------------------------------------*/

	add_action( 'after_setup_theme', 'symmetri_setup' );

	/**
	 * Setup of theme 'Symmetri' with
	 * custom menus and custom image sizes.
	 */
	function symmetri_setup() {

		// Website main navigation
		register_nav_menu( 'mainmenu', 'Website main navigation' );

		// Adds Featured Image Option
		add_theme_support( 'post-thumbnails', array( 'post', 'symmetri_cpt_gallery', 'page' ) );

		// Since value 'true' is not added, this is set to soft crop mode
		add_image_size( 'blogpost-cover', 400, 9999 );

		// Custom TinyMCE editor stylesheets
		add_editor_style('/css/editor-style.css');

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

	load_theme_textdomain( 'symmetri', 'templatepath'.'/languages' );

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
