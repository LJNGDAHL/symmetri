<?php
/**
* A metabox for adding rating on work items.
*
* @package Symmetri
*/

add_action( 'admin_init', 'symmetri_add_metabox' );

function symmetri_add_metabox() {
	$id = 'symmetri_post_metabox';
	$title = __( 'Rating', 'symmetri' );
	$function = 'symmetri_render_metabox';
	$screen = 'symmetri_cpt_gallery';
	$placement = 'side';
	$prio = 'high';

	add_meta_box($id, $title, $function, $screen, $placement, $prio);
}

function symmetri_render_metabox() {
	global $post;

	$rating = get_post_meta($post->ID, 'rating', true);

	?>
	<label for='rating'><?php _e( 'Rating on Work Item', 'symmetri' ); ?></label>
	<input type='number' name='rating' id='rating'
		value='<?php echo $rating; ?>'>
	<?php
}

add_action( 'save_post', 'symmetri_save_metabox' );
function symmetri_save_metabox() {
	global $post;

	update_post_meta($post->ID, 'rating', $_POST['rating']);
}
