<?php
/**
* The front page template file
*
* If the user has selected a static page for their homepage, this is what will
* appear.
*
* @package Johan_Alfredsson_Photography
*/
	get_header();

	// This is used for being able to loop out gallery images.
	$work = new WP_Query( array(

		'post_type' 		=> 'wpaj_cpt_gallery',
		'post_status'		=> 'publish',
		'order_by'			=> 'title',
		'order'				=> ASC

		)
	);
?>

<main class="flex-container">
<?php
	// Start of loop
	if ( $work -> have_posts() ) :

		while ( $work -> have_posts() ) :

			$work -> the_post();

			if ( has_post_thumbnail() ) :

				get_template_part( 'content', 'work' );

			endif;

		endwhile;

	endif;
?>
</main>

<?php
	get_footer();
?>
