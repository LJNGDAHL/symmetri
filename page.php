<?php
/**
* The template for displaying all pages
*
* @package Johan_Alfredsson_Photography
*/

get_header(); ?>
<?php if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		echo '<h1>'; the_title(); echo '</h1>';
		the_content();
	endwhile;

else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
<?php get_footer(); ?>
