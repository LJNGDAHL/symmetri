<?php
/**
 * Template for displaying search forms
 *
 * @package Symmetri
 */
// TODO: Check that required field is filled.
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form center" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<div class="flex-container">

		<label class="hidden" for="<?php echo $unique_id; ?>">
			<?php _e( 'Search', 'symmetri' ) ?>
		</label>

		<input type="search" id="<?php echo $unique_id; ?>" class="search-field flex-item" placeholder="<?php echo esc_attr_x( 'Enter search term', 'placeholder', 'symmetri' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required/>

		<button type="submit" class="button search-button center flex-item">
			<?php _e( 'Search', 'symmetri' ); ?>
		</button>

	</div>

</form>
