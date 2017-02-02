<?php
/**
* The template used for displaying page content in page.php
*
* @package Symmetri
*/
?>
<article class="article">
	<h1 class="center page-main-title uppercase"><?php the_title(); ?></h1>
	<div class="breadcrumb"><?php echo breadcrumb(); ?></div>
	<?php the_content(); ?>
</article>
