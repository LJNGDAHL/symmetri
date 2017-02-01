<?php
/**
* The template for displaying 404 pages (not found)
*
* @package Symmetri
*/
get_header(); ?>

<main class="page-main">
	<h1 class="center page-main-title uppercase"><?php _e( 'Oops!', 'symmetri' ); ?></h1>
	<p class="intro-text center"><?php _e( 'The page you are looking for is not found. Would you like to search for something else instead?', 'symmetri' ); ?></p>
	<div class="search-container">
		<?php get_search_form();  ?>
	</div>
</main>

<?php get_footer(); ?>
