<?php
/**
* Template Name: Blog
* Shows all posts of the type Blog.
* @package Symmetri
*/

	get_header();
?>
<main class="page-main">
<?php

	// This gets the title and content of the page.
	if ( have_posts() ) :

		while ( have_posts() ) : the_post();

			get_template_part( 'content', 'page' );

		endwhile;

	else: ?>

		<p><?php 'Sorry, no posts matched your criteria.'; ?></p>

	<?php endif;

	// This is used for being able to loop out all the posts in the category
	// 'Work in progress'
	$the_query = new WP_Query( array(
		'post_status'		=> 'publish',
		'category_name'		=> 'Work in progress'

		)
	);

	// Start of loop
	if ( $the_query -> have_posts() ) :

		while ( $the_query -> have_posts() ) :

			$the_query -> the_post(); ?>

			<article class="blog-post">
				<h3 class="center page-sub-title uppercase"><?php the_title(); ?></h3>

				<?php if ( has_post_thumbnail() ) : ?>

					<?php the_post_thumbnail( 'album-cover', array( 'class' => 'align-left' ) ); ?>

				<?php endif; ?>

				<p class="blog-post-date">Published: <?php the_date(); ?></p>
				<?php the_content(); ?>
			</article>

			<?php

		endwhile;
	endif; ?>

</main>

<?php get_footer(); ?>
