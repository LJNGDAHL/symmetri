<?php
/**
* The main template file
*
* @package Johan_Alfredsson_Photography
*/

get_header(); ?>
	<!-- TODO: Remove once finished with structure -->
	<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				if ( has_post_thumbnail() ) {
					echo '<a href="'; the_permalink(); echo '">';
					the_post_thumbnail('large');
					echo '</a>';
				}
			}
		}
	?>
</main>

<?php get_footer(); ?>
