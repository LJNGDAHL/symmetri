<?php
/**
* The template used for displaying gallery images. Used on single.php.
*
* @package Symmetri
*/

	$gallery_images = CFS() -> get ( 'gallery_images' );

	if ( $gallery_images ) :

	// Loop through the images in the gallery.
	// TODO: Replace with foreach if your plan fails.
	for ( $i = 0; $i < $gallery_images[$i]; $i++ ) :

		$id = $gallery_images[$i]['image'];
		$src = wp_get_attachment_image_src( $id, 'full' );
		$srcset = wp_get_attachment_image_srcset( $id, 'full' );
		$sizes = wp_get_attachment_image_sizes( $id, 'full' );
		$alt = get_post_meta( $id, '_wp_attachment_image_alt', true);
		?>

		<img class="full-width-img" src="<?php echo esc_attr( $src[0] );?>"
			srcset="<?php echo esc_attr( $srcset ); ?>"
			sizes="<?php echo esc_attr( $sizes );?>"
			alt="<?php echo esc_attr( $alt );?>" />

		<?php

	endfor;

endif;

?>
