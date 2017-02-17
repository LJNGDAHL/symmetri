<?php
/**
* The template used for displaying gallery images
* Used on single.php
*
* @package Symmetri
*/

	$gallery_images = CFS() -> get ( 'gallery_images' );
?>

<div class="grid js-grid">
	<div class="grid-sizer"></div>

	<?php

		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();

				if( '' !== get_post()->post_content ) : ?>
					<div class="grid-item grid-item--3-col grid-item-content js-grid-item">
						<h2 class="grid-item-title uppercase"><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
				<?php endif;

				if ( has_post_thumbnail() ) : ?>
					<div class="grid-item grid-item--3-col js-grid-item">
						<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'full-width-img js-img' ) ); ?>
					</div>
				<?php endif;

					if ( $gallery_images ) :

						// Loop through the images in the gallery.
						for ( $i = 0; $i < $gallery_images[$i]; $i++ ) :

							$id = $gallery_images[$i]['image'];
							$src = wp_get_attachment_image_src( $id, 'full' );
							$srcset = wp_get_attachment_image_srcset( $id, 'full' );
							$sizes = wp_get_attachment_image_sizes( $id, 'full' );
							$alt = get_post_meta( $id, '_wp_attachment_image_alt', true);

							?>

							<div class="grid-item grid-item--3-col js-grid-item">
								<img class="full-width-img js-img" src="<?php echo esc_attr( $src[0] );?>"
									srcset="<?php echo esc_attr( $srcset ); ?>"
									sizes="<?php echo esc_attr( $sizes );?>"
									alt="<?php echo esc_attr( $alt );?>" />
							</div>

						<?php endfor;

				endif;

			endwhile;

		endif;
	?>

</div>
