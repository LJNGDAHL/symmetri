<?php
/**
* The template used for displaying page content in page.php
*
* @package Symmetri
*/
?>
<article class="article">
	<h2 class="center page-main-title uppercase"><?php the_title(); ?></h2>
	<div class="breadcrumb"><?php echo breadcrumb(); ?></div>
	<?php if ( is_page( 'work-in-progress' ) ) : ?>
		<div class="intro-text">
			<?php the_content(); ?>
		</div>
		<?php

	else:

		the_content();

	endif; ?>

</article>
