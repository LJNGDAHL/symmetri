<?php
/**
* The template for displaying all single posts
* @package Johan_Alfredsson_Photography
*/
	get_header();
?>

<?php

if(have_posts()) {
	while(have_posts()) {
		the_post();

		if( has_post_thumbnail() ) {
			the_post_thumbnail('full');
		}

		$gallery_images = CFS()->get('gallery_images');
			foreach ($gallery_images as $image) {
				// The class "wp-post-image" is currently styled in _base.scss
				echo '<img class="wp-post-image" src="'.$image["image"].'"/>';
		}

	}
}

get_footer(); ?>
