<?php
// This is used for being able to loop out gallery images.
$work = new WP_Query( array(
	'post_type' 		=> 'wpaj_cpt_gallery',
	'post_status'		=> 'publish',
	'order_by'			=> 'title',
	'order'				=> ASC
	)
); ?>

<main class="flex-container">

<?php
// Start of loop
if ( $work -> have_posts() ) {

	while ( $work -> have_posts() ) {

		$work -> the_post(); ?>


		<?php if ( has_post_thumbnail() ) {
		?>
		<article class="flex-item">
			<a class="img-link" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</article>
		<?php
		}
	}
 }
 ?>
 </main>
