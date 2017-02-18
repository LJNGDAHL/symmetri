<?php
/**
* The archive page for categories
*
* @package Symmetri
*
*/
get_header(); ?>
<main class="page-main" id="main-content">

	<?php get_template_part( 'content', 'archive' ); ?>

	<div class="category-container border-top">
		<h3 class="center page-sub-title uppercase"><?php _e( 'All categories', 'symmetri' ); ?></h3>
		<ul class="category-list">
			<?php wp_list_categories('title_li=') ?>
		</ul>
	</div>

</main>

<?php get_footer(); ?>
