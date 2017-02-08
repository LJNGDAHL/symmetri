<?php
/**
* The front page template file
*
* If the user has selected a static page for their homepage, this is what will
* appear.
*
* @package Symmetri
*/
get_header();

$showMore = __( 'Show More', 'symmetri' ); // Used for pagination links
$goBack = __( 'Go Back', 'symmetri' ); // Used for pagination links


// Check page number
if ( get_query_var('paged') ) {

	$paged = get_query_var('paged');

} elseif ( get_query_var('page') ) {

	$paged = get_query_var('page');

} else {

$paged = 1;
}

// Arguments used for the query
$args =  array(

	'post_type' 		=> 'symmetri_cpt_gallery',
	'post_status'		=> 'publish',
	'order_by'			=> 'menu_order',
	'paged'				=> $paged,
	'order'				=> ASC
);

$the_query = new WP_Query( $args );

	if ( $the_query -> have_posts() ) : ?>

		<main class="grid">

			<?php while ( $the_query -> have_posts() ) : $the_query -> the_post();

				if ( has_post_thumbnail() ) : ?>

					<div class="grid-item">
						<a class="img-link" href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'full-width-img full-width-img-link' ) ); ?>
						</a>
					</div>

				<?php endif;

			endwhile; ?>

		</main>

		<?php if ($the_query->max_num_pages > 1) : // Custom pagination
			$orig_query = $wp_query; // fix for pagination to work
			$wp_query = $the_query; ?>

			<nav class="pagination">
				<?php
					echo get_next_posts_link( $showMore, $the_query->max_num_pages );
					echo get_previous_posts_link( $goBack );
				?>
			</nav>

		<?php $wp_query = $orig_query; // fix for pagination to work

		endif;

	endif;

	wp_reset_postdata(); ?>

<?php get_footer(); ?>
