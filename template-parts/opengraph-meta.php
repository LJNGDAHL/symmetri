<?php
/**
 * Template part for displaying Open Graph information
 * Used in header.php
 *
 * @package Symmetri
 */

if ( have_posts() ) :

	while ( have_posts() ) : the_post();

		$defaultTitle = get_bloginfo( 'name' ) . ' ' . get_bloginfo( 'description');
		$defaultDesc = __('A website for ') . get_bloginfo( 'name' );
		$ogTitle = get_post_meta( get_the_ID(), 'title', true );
		$ogDesc = get_post_meta( get_the_ID(), 'desc', true );

		has_post_thumbnail() ? $ogImg = get_the_post_thumbnail_url() : $ogImg = '';
		?>

		<meta property="og:title" content="<?php echo $ogTitle ? $ogTitle : $defaultTitle; ?>"/>
		<meta property="og:description" content="<?php echo $ogDesc ? $ogDesc : $defaultDesc; ?>"/>
		<?php if ($ogImg): ?>
			<meta property="og:image" content="<?php echo $ogImg; ?>" />
			<meta property="og:image:type" content="image/jpeg" />
		<?php endif; ?>

	<?php endwhile;

endif; ?>
