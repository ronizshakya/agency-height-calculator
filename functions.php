<?php
function agencyheight_enqueue()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'agencyheight_enqueue');


/* Calculator Functions */
// require_once(get_stylesheet_directory() . '/includes/calculator/calculator-functions.php');
