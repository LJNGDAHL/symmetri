<?php
/**
* The page for setting up Google Analytics
*
* If the user has added a GA Tracking Id,
* the script for using Google Analytics gets added in header.php
*
* @package Symmetri
*/

	add_action( 'admin_menu', 'setup_theme_admin_menus' );

	function setup_theme_admin_menus() {
		$menu_name = _x( 'Analytics' , 'symmetri' );
		$page_title = _x( 'Theme Settings', 'symmetri' ); // text domain

		add_menu_page( $page_title, $menu_name, 'manage_options', 'symmetri_settings', 'symmetri_settings_page', 'dashicons-chart-line', 20  );
	}

	function symmetri_settings_page() { ?>

		<div class="wrap">
			<h1><?php _e( 'Theme settings', 'symmetri'); ?></h1>

			<?php
				$gaid = '';

				if ( isset( $_POST['submit'] ) ) :
					$new_gaid = esc_attr($_POST['gaid']);
					update_option( 'symmetri-gaid', $new_gaid ); ?>
					<div id="settings-error-settings_updated" class="updated settings-error notice is-dismissable">
						<p><strong><?php _e( 'Changes saved.' , 'symmetri' ) ?></strong></p>
						<button type="button" class="notice-dismiss"></button>
					</div>

					<?php
				endif;
				$gaid = get_option('symmetri-gaid');
			?>

			<form method="post">
				<h2><?php _e( 'Google Analytics Tracking Code', 'symmetri' ) ?></h2>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row">
								<label for="gaid"><?php _e( 'GA Tracking ID', 'symmetri' ) ?></label>
							</th>
							<td>
								<input type="text" name="gaid" id="gaid" value="<?php echo $gaid; ?>">
							</td>
						</tr>
					</tbody>
				</table>
				<p class="submit">
					<input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e( 'Save changes', 'symmetri' ); ?>">
				</p>
			</form>
		</div>

		<?php
	}
?>
