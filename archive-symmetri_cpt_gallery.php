<?php
/**
* The archive page for posts published in 'Work' (CPT)
*
* @package Symmetri
*
*/
get_header(); ?>

<?php the_archive_title( '<h1 class="archive-title uppercase center">', '</h1>'); ?>

	<main class="grid js-grid" id="main-content">

			<?php if ( have_posts()) : ?>

				<?php while ( have_posts() ) : the_post();

					if ( has_post_thumbnail() ) : ?>

					<div class="grid-item js-grid-item">
						<a class="img-link" href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'full-width-img full-width-img-link js-img' ) ); ?>
						</a>
					</div>

					<?php endif;

				endwhile; ?>

		<?php else: ?>

			<p><?php _e( 'Oops! This archive is empty.', 'symmetri' ); ?></p>

		<?php endif; ?>

	</main>

	<div class="contact-front">
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>
