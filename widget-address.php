<?php
/**
* Plugin Name: Contact Information Widget for the Johan Alfredsson Photography Theme
* Theme URI: http://www.alfredssonjohan.com/
* Author: Katarina Ljungdahl
* Author URI: https://github.com/LJNGDAHL
**/

	class ContactInformation extends WP_Widget {

		public function __construct() {
			$id = "contactinformation_wpaj";
			$name = "Contact Information";
			$desc = "Used for adding information about name, email address and phone number";

			parent::__construct($id, $name, $desc);
		}

		public function form($instance) {

			$photographerTitle = $instance['photographer'];
			$photographerId = esc_attr($this->get_field_id('photographer'));
			$photographerName = $this->get_field_name('photographer');

			$phoneTitle = $instance['phone'];
			$phoneId = esc_attr($this->get_field_id('phone'));
			$phoneName = $this->get_field_name('phone');

			$emailTitle = $instance['email'];
			$emailId = esc_attr($this->get_field_id('email'));
			$emailName = $this->get_field_name('email');

			?>
			<p>
				<label for="<?php echo $photographerId; ?>">
					Name:
				</label><br>
				<input type="text"
				id="<?php echo $photographerId; ?>"
				name="<?php echo $photographerName; ?>"
				value="<?php echo $photographerTitle; ?>">
				<br>

				<label for="<?php echo $phoneId; ?>">
					Phone Number:
				</label><br>
				<input type="tel"
				id="<?php echo $phoneId; ?>"
				name="<?php echo $phoneName; ?>"
				value="<?php echo $phoneTitle; ?>">
				<br>

				<label for="<?php echo $emailId; ?>">
					Email address:
				</label><br>
				<input type="email"
				id="<?php echo $emailId; ?>"
				name="<?php echo $emailName; ?>"
				value="<?php echo $emailTitle; ?>">
				<br>
			</p>

			<?php
		}

		public function update($new_instance, $old_instance) {

			$instance = array();

			if ( ! empty ( $new_instance['photographer'] ) ) {
				$instance['photographer'] = $new_instance['photographer'];
			}

			if ( ! empty ( $new_instance['phone'] ) ) {
				$instance['phone'] = $new_instance['phone'];
			}

			if ( ! empty ( $new_instance['email'] ) ) {
				$instance['email'] = $new_instance['email'];
			}

			return $instance;
		}

		// Setup to show widget in frontend.
		public function widget($args, $instance) {

			echo $args['before_widget'];

			if ( ! empty ( $instance['photographer'] ) ) : ?>
				<p class="address-information photographer-name">
					<?php echo $instance['photographer']; ?>
				</p>
			<?php endif;

			if ( ! empty ( $instance['phone'] ) ) : ?>

				<p class="address-information photographer-phone">Phone:
					<a href="tel:<?php echo str_replace(' ', '', $instance['phone']); ?>"><?php echo $instance['phone']; ?>
					</a>
				</p>

			<?php endif;

			if ( ! empty ( $instance['email'] ) ): ?>

				<p class="address-information photographer-email">Email:
					<a href="mailto:<?php echo $instance['email']; ?>">
						<?php echo $instance['email']; ?>
					</a>
				</p>

			<?php endif;

			echo $args['after_widget'];
		}
	}

	add_action( 'widgets_init', 'register_contactinformation' );

	function register_contactinformation() {
		register_widget( 'ContactInformation' );
	}

?>
