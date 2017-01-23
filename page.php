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
?>
<?php get_footer(); ?>
