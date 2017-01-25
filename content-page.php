<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Johan_Alfredsson_Photography
 */
?>
<article class="article">
	<h2 class="center page-title uppercase"><?php the_title(); ?></h2>
	<?php if ( is_page( 'work-in-progress' ) ) : ?>
		<div class="intro-text">
			<?php the_content(); ?>
		</div>
		<?php

	else:

		the_content();

	endif; ?>

</article>
