<?php
/**
* Template Name: Archive
* The template for displaying archive pages
*/

echo 'archive.php'; // TODO: Remove once finished with structure.
get_header();
?>

<?php wp_get_archives('type=yearly'); ?>

<?php get_footer(); ?>
