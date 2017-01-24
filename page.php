<?php
/**
* The template for displaying all pages
*
* @package Johan_Alfredsson_Photography
*/

get_header(); ?>

<?php
	// Start of the loop.
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); ?>
			<article class="main-article">
				<h2 class="center"><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</article>
			<?php
		}
	}

	// On Contact Page, include sidebar with contact form.
	if ( is_page( 'contact' ) ) {
		dynamic_sidebar( 'socialmedialinks');
	}
?>

<?php get_footer(); ?>
