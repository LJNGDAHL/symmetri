<?php
/**
* The template used for displaying page content in page.php
*
* @package Symmetri
*/
?>
<article class="article">
	<h1 class="center page-main-title uppercase"><?php the_title(); ?></h1>
	<?php if ( has_post_thumbnail() && is_page( 'about' ) ) :
		the_post_thumbnail( 'post-thumbnail', array( 'class' => 'full-width-img' ) );
	endif;
	the_content(); ?>
</article>
