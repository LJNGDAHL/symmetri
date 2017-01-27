<?php
/**
* The template for displaying all single posts
* @package Symmetri
*/
	get_header();
?>
<main class="grid">
<?php

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

		if( '' !== get_post()->post_content ) :

			echo '<div class="grid-item grid-item-content">';
			the_title();
			the_content();
			echo '</div>';

		endif;


		if ( has_post_thumbnail() ) : ?>

		<div class="grid-item">

			<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'full-width-img' ) ); ?>
		</div>

		<?php endif;

		// Check if custom page type for the gallery is used.
		if ( is_singular( 'symmetri_cpt_gallery' ) ) :

			get_template_part( 'content', 'gallery' );

		endif;

	endwhile;

endif; ?>

</main>

<?php get_footer(); ?>
