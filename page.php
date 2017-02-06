<?php
/**
* The template for displaying all pages
*
* @package Symmetri
*/

	get_header();
?>

<main class="page-main">

<?php if ( have_posts() ) :

		while ( have_posts() ) : the_post();

			get_template_part( 'content', 'page' );

		endwhile;

	else: ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.', 'symmetri' ); ?></p>

	<?php endif;

	// On Contact Page, include sidebar with contact form.
	if ( is_page( 'contact' ) ) : ?>

		<?php get_sidebar(); ?>

	<?php endif;
?>
</main>

<?php get_footer(); ?>
