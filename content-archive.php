<?php
/**
 * The template for looping out main content on archive pages.
 * Used on archive.php
 *
 * @package Symmetri
 */

	the_archive_title( '<h1 class="archive-title uppercase center">', '</h1>');
	the_archive_description( '<div class="archive-description">', '</div>' );
?>

<?php if ( have_posts()) : ?>

	<ul class="archive-list">

		<?php while ( have_posts() ) : the_post(); ?>

			<li><a href="<?php the_permalink(); ?>"?><?php the_title(); ?></a></li>

		<?php endwhile; ?>

	</ul>

<?php else: ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.', 'symmetri' ); ?></p>

<?php endif; ?>
