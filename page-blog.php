<?php
/**
* Template Name: Blog
* Shows all posts of the type Blog
*
* @package Symmetri
*/
	get_header();

	// Get current page
	$paged = getCurrentPage();

	// Used in $the_query that loops out posts from 'Work in progress'
	$args = array(
		'post_status'		=> 'publish',
		'category_name'		=> 'Work in progress',
		'paged'				=> $paged
	);

/*------------------------------------------------------------------------------
	GET PAGE TITLE AND PAGE MAIN CONTENT
------------------------------------------------------------------------------*/
?>
<main class="page-main">
<?php
		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'page' );

			endwhile;

		else: ?>

			<p><?php _e( 'Sorry, no posts matched your criteria.', 'symmetri' ); ?></p>

		<?php endif;

/*------------------------------------------------------------------------------
	START OF LOOP THAT PRINTS ALL POST IN THE CATEGORY 'WORK IN PROGRESS'
------------------------------------------------------------------------------*/

		$the_query = new WP_Query( $args );

		if ( $the_query -> have_posts() ) :

			while ( $the_query -> have_posts() ) :

				$the_query -> the_post(); ?>

				<article class="border-separator">
					<h3 class="center page-sub-title uppercase" id="post-<?php the_ID(); ?>"><?php the_title(); ?></h3>

					<?php if ( has_post_thumbnail() ) :
						the_post_thumbnail( 'blogpost-cover', array( 'class' => 'blog-img' ) );
					endif; ?>
					<?php the_excerpt(); ?>
					<a class="text-link" href="<?php the_permalink(); ?>">
						<?php _e( 'Read post', 'symmetri' ); ?>
					</a>
				</article>

			<?php endwhile;

/*------------------------------------------------------------------------------
	START OF CUSTOM PAGINATION
------------------------------------------------------------------------------*/

			if ($the_query->max_num_pages > 1) :

				$orig_query = $wp_query; // fix for pagination to work
				$wp_query = $the_query; ?>

				<nav class="pagination">
					<?php
						echo get_next_posts_link();
						echo get_previous_posts_link();
					?>
				</nav>

				<?php $wp_query = $orig_query; // fix for pagination to work

			endif;

		endif; wp_reset_postdata(); ?>

	<div class="search-container">
		<?php get_search_form();  ?>
	</div>
</main>

<?php get_footer(); ?>
