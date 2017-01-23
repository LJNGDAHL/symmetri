<?php

	$gallery_images = CFS() -> get ( 'gallery_images' );

	if ( $gallery_images ) {

	// This loops all the images in the gallery.
	foreach ( $gallery_images as $image ) {

			echo '<img class="wp-post-image" src="'.$image["image"].'"/>';

		}
	}

?>
