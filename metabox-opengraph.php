<?php
/**
* A metabox for adding Open Graph info
*
* @package Symmetri
*/

add_action( 'admin_init', 'symmetri_add_metabox' );

function symmetri_add_metabox() {
	$id = 'symmetri_post_metabox';
	$title = __( 'Open Graph Info', 'symmetri' );
	$function = 'symmetri_render_metabox';
	$screen = array( 'symmetri_cpt_gallery', 'post', 'page' );
	$placement = 'side';
	$prio = 'high';

	add_meta_box($id, $title, $function, $screen, $placement, $prio);
}

function symmetri_render_metabox() {
	global $post;

	$openGraphTitle = get_post_meta( $post->ID, 'title', true );
	$openGraphDesc = get_post_meta( $post->ID, 'desc', true );

	?>
	<label for='title'><?php _e( 'Open Graph Title', 'symmetri' ); ?></label>
	<input type='text' name='title' id='title' value='<?php echo $openGraphTitle; ?>'><br><br>

	<label for='desc'><?php _e( 'Open Graph Description', 'symmetri' ); ?></label><br>
	<textarea name="desc" rows="3" cols="19" id="desc" value='<?php echo $openGraphDesc; ?>'><?php echo $openGraphDesc; ?></textarea>
	<?php
}

add_action( 'save_post', 'symmetri_save_metabox' );

function symmetri_save_metabox() {
	global $post;

	update_post_meta( $post->ID, 'title', $_POST['title'] );
	update_post_meta( $post->ID, 'desc', $_POST['desc'] );
}
