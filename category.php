<?php
/**
* The archive page for categories
*
* @package Symmetri
*
*/
get_header(); ?>
<main class="page-main">

	<?php
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

	<div class="category-container border-top">
		<h3 class="center page-sub-title uppercase"><?php _e( 'All categories', 'symmetri' ); ?></h3>
		<ul class="category-list">
			<?php wp_list_categories('title_li=') ?>
		</ul>
	</div>

</main>

<?php get_footer(); ?>
