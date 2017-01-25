<?php
/**
* The template for displaying all pages
*
* @package Johan_Alfredsson_Photography
*/

	get_header();

	if ( have_posts() ) :

		while ( have_posts() ) : the_post();

			get_template_part( 'content', 'page' );

		endwhile;

	else: ?>

		<p><?php 'Sorry, no posts matched your criteria.'; ?></p>

	<?php endif;

	// On Contact Page, include sidebar with contact form.
	if ( is_page( 'contact' ) ) :

		dynamic_sidebar( 'contact-container');

	endif;

	get_footer();
?>
