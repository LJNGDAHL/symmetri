<?php
/**
 * The template for displaying posts with excerpts
 * Used in Search Results
 *
 * @package Symmetri
 */

?>

<article class="border-separator">

	<?php the_title( sprintf( '<h2 class="center page-sub-title uppercase"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	<?php if ( '' !== get_post()->post_content ) : ?>

			<?php the_excerpt(); ?>

	<?php else: ?>

		<p class="center"><?php _e( 'No description available. Visit page for more information.', 'symmetri' )?></p>

	<?php endif; ?>

</article>
