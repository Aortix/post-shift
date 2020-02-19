<?php
function wpdocs_variety_shopping_scripts()
{
    wp_enqueue_style('my-theme', get_stylesheet_uri(), NULL, microtime());
    wp_enqueue_style('my-header', get_template_directory_uri() . '/css/header.css', NULL, microtime());
    wp_enqueue_style('my-footer', get_template_directory_uri() . '/css/footer.css', NULL, microtime());
    wp_enqueue_script('my-script', get_template_directory_uri() . '/js/header.js', array(), true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Lato|Poppins|Quicksand', false);
    wp_enqueue_style('line-awesome', '//maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css', false);
}

function remove_admin_login_header()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('wp_enqueue_scripts', 'wpdocs_variety_shopping_scripts');
add_action('get_header', 'remove_admin_login_header');
