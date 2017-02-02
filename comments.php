<?php
/**
 * The template for displaying comments.
 * Used on single.php.
 * @package Symmetri
 */

// Check if current post is protected with password.
if ( post_password_required() ) :
	return;
endif;
?>

<section id="comments" class="comments-container">

	<?php if ( have_comments() ) : ?>
		<h2 class="comment-title center">
			<?php echo get_comments_number() . " ";
				if (get_comments_number() == 1):
					_e( 'Comment', 'symmetri' );
				else:
					_e( 'Comments', 'symmetri' );
				endif; ?>
		</h2>
	<?php endif; ?>

	<ol class="comment-list">
		<?php // Print ordered list with comments
			wp_list_comments( array(
				'style'			=> 'ol',
				'short_ping' 	=> true,
			) );
		?>
	</ol>

	<?php
	// Add comment navigation if needed.
	// TODO: This needs styling.
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav class="comment-navigation">
		<div class="nav-links">
			<div class="nav-previous"><?php previous_comments_link(); ?></div>
			<div class="nav-next"><?php next_comments_link(); ?></div>
		</div>
	</nav>
	<?php endif; ?>

</section>
