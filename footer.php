<?php
/**
* The template for displaying the footer
*
* @package Symmetri
*/


	if ( !isset( $_COOKIE['notification-dismissed'] ) ):

		get_template_part( 'template-parts/cookie', 'notification' );

	endif; ?>

	<div class="hidden">
		<?php get_template_part( 'img/lens' ); ?>
	</div>

	<?php wp_footer();

?>
</body>
</html>
