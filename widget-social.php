<?php
/**
* Plugin Name: Social Media Widget for the Wordpress Theme Symmetri
*
* Theme URI: https://github.com/LJNGDAHL/symmetri
* Author: Katarina Ljungdahl
* Author URI: https://github.com/LJNGDAHL
**/

	class SocialMediaLinks extends WP_Widget {

		public function __construct() {
			$id = "social_symmetri";
			$name = _x( 'Social Media Links', 'symmetri' );;
			$desc = _x('Used for linking social media.', 'symmetri');

			parent::__construct($id, $name, $desc);
		}

		public function form($instance) {

			$instagramTitle = $instance['instagram'];
			$instagramId = esc_attr($this->get_field_id('instagram'));
			$instagramName = $this->get_field_name('instagram');

			$facebookTitle = $instance['facebook'];
			$facebookId = esc_attr($this->get_field_id('facebook'));
			$facebookName = $this->get_field_name('facebook');

			$twitterTitle = $instance['twitter'];
			$twitterId = esc_attr($this->get_field_id('twitter'));
			$twitterName = $this->get_field_name('twitter');
			?>
			<p>
				<label for="<?php echo $instagramId; ?>"><?php _e( 'Instagram', 'symmetri' ) ?>:</label><br>
				<input type="text" id="<?php echo $instagramId; ?>" name="<?php echo $instagramName; ?>" value="<?php echo $instagramTitle; ?>"><br>

				<label for="<?php echo $facebookId; ?>"><?php _e( 'Facebook', 'symmetri' ) ?>:
				</label><br>
				<input type="text" id="<?php echo $facebookId; ?>" name="<?php echo $facebookName; ?>" value="<?php echo $facebookTitle; ?>"><br>

				<label for="<?php echo $twitterId; ?>"><?php _e( 'Twitter', 'symmetri' ) ?>:
				</label><br>
				<input type="text" id="<?php echo $twitterId; ?>" name="<?php echo $twitterName; ?>" value="<?php echo $twitterTitle; ?>"><br>
			</p>

			<?php
		}

		public function update($new_instance, $old_instance) {

			$instance = array();

			if ( ! empty ( $new_instance['instagram'] ) ) {
				$instance['instagram'] = $new_instance['instagram'];
			}

			if ( ! empty ( $new_instance['facebook'] ) ) {
				$instance['facebook'] = $new_instance['facebook'];
			}

			if ( ! empty ( $new_instance['twitter'] ) ) {
				$instance['twitter'] = $new_instance['twitter'];
			}

			return $instance;
		}

		// Setup to show widget in frontend.
		public function widget($args, $instance) {

			if ( ! empty ( $instance['instagram'] ) ) : ?>
				<a class="social-link" href="<?php echo $instance['instagram']; ?>">Instagram</a>
			<?php endif;

			if ( ! empty ( $instance['facebook'] ) ) : ?>
				<a class="social-link" href="<?php echo $instance['facebook']; ?>">Facebook</a>
			<?php endif;

			if ( ! empty ( $instance['twitter'] ) ): ?>
				<a class="social-link" href="<?php echo $instance['twitter']; ?>">Twitter</a>
			<?php endif;

		}
	}

	add_action( 'widgets_init', 'register_socialmedialinks' );

	function register_socialmedialinks() {
		register_widget( 'SocialMediaLinks' );
	}

?>
