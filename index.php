<?php
/**
* The main template file, only used as a fallback.
*
* @package Symmetri
*/
	// If Index.php is not front page, redirect to $home.
	if ( ! is_front_page() ) :

		$home = get_home_url();
		wp_redirect( $home );
		exit;

	else:

		get_header();

		get_template_part( 'content', 'work' );

		get_footer();

	endif;
?>
