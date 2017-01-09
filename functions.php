<?php

function wpaj_theme_styles() {

    wp_enqueue_style('normalize_css', get_template_directory_uri() . '/css/normalize.css');

    wp_enqueue_style('fonts', 'url.goes.here');

    wp_enqueue_style('main.css', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'wpaj_theme_styles');

?>
