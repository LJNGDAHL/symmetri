<?php
/**
* Template Name: Archive
*
* The template for displaying archive pages
* @package Symmetri
*
*/
get_header(); ?>

<main class="page-main">

	<?php get_template_part( 'content', 'archive' ); ?>

	<div class="month-container">
		<h3 class="center page-sub-title uppercase"><?php _e( 'Show posts by month', 'symmetri' ); ?></h3>
		<select class="archive-dropdown" name=\"archive-dropdown\" onChange='document.location.href=this.options[this.selectedIndex].value;'>
			<option value=\"\">
				<?php _e('Select Month', 'symmetri'); ?>
			</option>
		<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
		</select>
	</div>

	<div class="category-container">
		<h3 class="center page-sub-title uppercase"><?php _e( 'All categories', 'symmetri' ); ?></h3>
		<ul class="category-list">
			<?php wp_list_categories('title_li=') ?>
		</ul>
	</div>

</main>

<?php get_footer(); ?>
