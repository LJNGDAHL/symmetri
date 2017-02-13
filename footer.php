<?php
/**
* The template for displaying the footer
*
* @package Symmetri
*/


if ( !isset( $_COOKIE['notification-dismissed'] ) ):
	get_template_part( 'template-parts/cookie', 'notification' );
endif;

get_template_part( 'img/lens' );

wp_footer();
?>
</body>
</html>
