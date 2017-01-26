<?php
/**
* The template used for displaying page content on 'frontpage.php'
*
* @package Symmetri
*/
?>
<article class="flex-item">
	<a class="img-link" href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'full-width-img' ) ); ?>
	</a>
</article>
