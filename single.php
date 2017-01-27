<?php
/**
* The template for displaying all single posts
* @package Symmetri
*/
	get_header();
?>
<main class="grid">
	<div class="grid-sizer"></div>

	<?php

		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();

				if( '' !== get_post()->post_content ) : ?>

					<div class="grid-item grid-item--3-col grid-item-content">
						<h2 class="grid-item-title uppercase"><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>

				<?php endif;

				if ( has_post_thumbnail() ) : ?>

				<div class="grid-item grid-item--3-col">

					<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'full-width-img' ) ); ?>
				</div>

				<?php endif;

				// Check if custom page type for the gallery is used.
				if ( is_singular( 'symmetri_cpt_gallery' ) ) :

					get_template_part( 'content', 'gallery' );

				endif;

			endwhile;

		endif;
	?>

</main>

<?php get_footer(); ?>
