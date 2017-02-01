<?php
/**
 * Template Name: Search
 * The template for displaying Search Results pages.
 *
 * @package Symmetri
 */

	global $wp_query;
	$total_results = $wp_query->found_posts;
	get_header();
?>
 <main class="page-main">
	<?php if ( have_posts() ) : ?>

	<h1 class="center page-main-title uppercase">
		<span class="pre-page-main-title">
			<?php _e( 'You searched for:', 'symmetri' ); ?>
		</span><br>
		<?php echo get_search_query(); ?>
	</h1>

	<?php else : ?>

	<h1 class="center page-main-title uppercase">
		<?php _e( 'Nothing Found', 'symmetri' ); ?>
	</h1>

	<?php endif; ?>

	<div class="search-container">
		<?php get_search_form();  ?>

		<?php if ( have_posts() ) : ?>
			<p class="center">
				<?php
					_e( 'Total number of search results: ', 'symmetri' ); ?>
					<?php echo $total_results; ?>
			</p>
		<?php endif; ?>
	</div>

	<?php if ( have_posts() ) :

		while ( have_posts() ) :

			the_post();
			get_template_part( 'content', 'excerpt' );

		endwhile;

	else : ?>

		<p><?php _e( 'Nothing matched your search terms. Please try again with another search term.', 'symmetri' ); ?></p>

	<?php endif; ?>
 </main>
 <?php get_footer(); ?>
