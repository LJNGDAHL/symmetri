<?php
	echo 'This is: index.php'; // TODO: Remove once finished with structure.
	get_header();
?>
<main>
	<h1>
		<a href="<?php bloginfo( 'wpurl' );?>">
			<?php echo get_bloginfo( 'name' ); ?>
		</a>
	</h1>

	<!-- TODO: Remove once finished with structure -->
	<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				if ( has_post_thumbnail() ) {
					the_post_thumbnail('large');
				}
			}
		}
	?>
</main>

<?php get_footer(); ?>
