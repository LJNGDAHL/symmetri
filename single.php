<?php
/**
* The template for displaying all single posts
* @package Symmetri
*/
	get_header();
?>
<main class="flex-container">
<?php

echo 'single';

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

		if ( has_post_thumbnail() ) :

			the_post_thumbnail( 'post-thumbnail', array( 'class' => 'full-width-img' ) );

		endif;

		// Check if custom page type for the gallery is used.
		if ( is_singular( 'symmetri_cpt_gallery' ) ) :

			get_template_part( 'content', 'gallery' );

		endif;

	endwhile;

endif; ?>

</main>

<?php get_footer(); ?>
