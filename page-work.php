<?php
/**
 * Template Name: Portfolio
 * Shows all posts of the type Portfolio.
 */
get_header();
	echo 'page-work.php';
?>
<h1>Alla mina projekt</h1>

<?php

$portfolio = new WP_Query( array(
	'post_type' 		=> 'wpaj_cpt_gallery',
	'post_status'		=> 'publish',
	'order_by'			=> 'title',
	'order'				=> DESC
	)
);

if ( $portfolio -> have_posts() ) {

	while ( $portfolio -> have_posts() ) {

		$portfolio -> the_post();

		echo '<h2>';
		the_title();
		echo '</h2>';

		the_post_thumbnail( 'blooper' );

		// $thumb_id = get_post_thumbnail_id(); // Bildens id
		// $thumb_url = wp_get_attachment_image_src( $thumb_id, 'blooper');

		$bildurl = get_the_post_thumbnail_url();
		echo $bildurl; ?>

		<img src="<?php echo $bildurl; ?>">

		<div style="
			background-image:url(<?php echo $bildurl;?>);
			background-size: cover;
			width: 200px;
			height: 200px">
		</div>


		<?php
		// get_categories(); // Funkar bara för förinställda taxonomier

		$terms = wp_get_post_terms( get_the_ID(), 'fed16_projekttyp' );

		foreach ( $terms as $term ) {

			echo $term -> name . '<br>';

			// Restore original Post Data
			wp_reset_postdata();
		}
		// echo '<pre>'; var_dump($terms); echo '</pre>';
	}

} else {
	echo 'Det finns inga inlägg upplagda.';
}

get_footer();

?>
