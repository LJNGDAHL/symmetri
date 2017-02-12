<?php
/**
* The template for displaying single posts
*
* @package Symmetri
*/
get_header();

/**
* If post is a part of the CPT 'Workspace'
* an image gallery will be printed according to content-gallery.php
*/
if ( is_singular( 'symmetri_cpt_gallery' ) ) : ?>

	<?php get_template_part ( 'content', 'gallery' ); ?>

	<div class="contact-gallery">
		<?php get_sidebar();  ?>
	</div>

<?php else: ?>

	<?php

		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'single' );

			endwhile; ?>

		<?php endif ?>

<?php endif; ?>

<?php get_footer(); ?>
