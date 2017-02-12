<?php
/**
* Outputs the single post content
* Used on single.php
*
* @package Symmetri
*/
?>
<main class="page-main">
	<p class="pre-page-main-title center"><?php the_date(); ?></p>
	<h1 class="center page-main-title uppercase"><?php the_title(); ?></h1>

	<?php

		if ( has_post_thumbnail() ) :
			the_post_thumbnail( 'post-thumbnail', array( 'class' => 'full-width-img' ) );
		endif;

		the_content();

		// If comments are open or there is at least one comment, get comments.php
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>

</main>
