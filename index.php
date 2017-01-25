<?php
/**
* The main template file
*
* @package Johan_Alfredsson_Photography
*/

	// FIXME: What code is needed in this file now that we have 'front-page.php'?
	get_header();

	get_template_part( 'content', 'work' );

	get_footer();

?>
