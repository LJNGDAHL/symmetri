<?php
/**
* The template for displaying all pages
*
* @package Johan_Alfredsson_Photography
*/

echo 'page.php'; // TODO: Remove once finished with structure.
get_header(); ?>

<main>
	<?php if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			echo '<h1>'; the_title(); echo '</h1>';
			the_content();
		endwhile;

	else: ?>
	<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
