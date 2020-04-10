<?php
if (!isset($content_width)) {
    $content_width = 640;
}

function wp_variety_shopping_scripts()
{
    wp_enqueue_style('my-theme', get_stylesheet_uri(), NULL, microtime());
    wp_enqueue_style('my-header', get_template_directory_uri() . '/css/header.css', NULL, microtime());
    wp_enqueue_style('my-footer', get_template_directory_uri() . '/css/footer.css', NULL, microtime());
    wp_enqueue_style('my-navbar', get_template_directory_uri() . '/css/navbar.css', NULL, microtime());
    wp_enqueue_style('my-author', get_template_directory_uri() . '/css/author.css', NULL, microtime());
    wp_enqueue_style('my-comments', get_template_directory_uri() . '/css/comments.css', NULL, microtime());
    wp_enqueue_style('my-page', get_template_directory_uri() . '/css/page.css', NULL, microtime());
    wp_enqueue_style('my-widgets', get_template_directory_uri() . '/css/widgets.css', NULL, microtime());
    wp_register_script('my-script', get_template_directory_uri() . '/js/header.js', array(), microtime());
    wp_enqueue_script('my-script');
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Lato|Poppins|Quicksand', false);
    wp_enqueue_style('line-awesome', '//maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css', false);
}

function register_sidebar_init()
{
    register_sidebar(array(
        'name'          => __('Right Sidebar', 'post-shift'),
        'id'            => 'right-sidebar',
        'description' => 'sidebar placed on the right side of the website.',
        'class' => 'right-sidebar-container',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}

function wp_custom_nav_menu()
{
    register_nav_menu('header-menu', __('Header Menu', 'post-shift'));
}

function redirectSubsToFrontEnd()
{
    $currentUser = wp_get_current_user();

    if (count($currentUser->roles) == 1 and $currentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

function wpse_theme_setup()
{
    add_theme_support('title-tag');
}

function themename_custom_logo_setup()
{
    $defaults = array(
        'height'      => 80,
        'width'       => 80,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}

$args = array(
    'default-color' => 'ffffff'
);

function cd_add_editor_styles()
{
    add_editor_style(get_stylesheet_uri());
}

function my_theme_load_theme_textdomain()
{
    load_theme_textdomain('post-shift', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'my_theme_load_theme_textdomain');

add_action('after_setup_theme', 'themename_custom_logo_setup');
add_action('init', 'cd_add_editor_styles');
add_theme_support('custom-background', $args);

add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');

add_action('after_setup_theme', 'wpse_theme_setup');

add_action('wp_enqueue_scripts', 'wp_variety_shopping_scripts');
add_action('widgets_init', 'register_sidebar_init');
add_action('init', 'wp_custom_nav_menu');
add_action('admin_init', 'redirectSubsToFrontEnd');
