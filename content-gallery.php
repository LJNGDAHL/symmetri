<?php
/**
* The template used for displaying gallery images. Used on single.php.
*
* @package Symmetri
*/

	$gallery_images = CFS() -> get ( 'gallery_images' );

	if ( $gallery_images ) {

	// This loops all the images in the gallery.
	foreach ( $gallery_images as $image ) {

			echo '<img class="full-width-img" src="'.$image["image"].'"/>';

		}
	}

?>
