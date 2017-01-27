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

	// This is used for being able to loop out gallery images.
	$work = new WP_Query( array(

		'post_type' 		=> 'symmetri_cpt_gallery',
		'post_status'		=> 'publish',
		'order_by'			=> 'title',
		'order'				=> DESC

		)
	);
?>

<main class="grid">
<?php
	// Start of loop
	if ( $work -> have_posts() ) :

		while ( $work -> have_posts() ) :

			$work -> the_post();

			if ( has_post_thumbnail() ) :

				?>

				<article class="grid-item">
					<a class="img-link" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'full-width-img full-width-img-link' ) ); ?>
					</a>
				</article>

				<?php
			endif;

		endwhile;

	endif;
?>
</main>

<?php
	get_footer();
?>
