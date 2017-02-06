<?php
/**
* Template Name: Archive
* The template for displaying archive pages
* @package Symmetri
*
*/
get_header(); ?>

<main class="page-main">

	<?php
		the_archive_title( '<h1 class="page-main-title uppercase center">', '</h1>');
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

	<div class="month-container">
		<h3 class="center page-sub-title uppercase"><?php _e( 'Archives by Month', 'symmetri' ); ?></h3>
		<select class="archive-dropdown" name=\"archive-dropdown\" onChange='document.location.href=this.options[this.selectedIndex].value;'>
			<option value=\"\">
				<?php _e('Select Month', 'symmetri'); ?>
			</option>
		<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
		</select>
	</div>

	<div class="category-container">
		<!--TODO: Remove repeating "Categories" -->
		<h3 class="center page-sub-title uppercase"><?php _e( 'All categories', 'symmetri' ); ?></h3>
		<?php wp_list_categories() ?>
	</div>
</main>
<?php get_footer(); ?>
