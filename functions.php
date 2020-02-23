<?php
function wp_variety_shopping_scripts()
{
    wp_enqueue_style('my-theme', get_stylesheet_uri(), NULL, microtime());
    wp_enqueue_style('my-header', get_template_directory_uri() . '/css/header.css', NULL, microtime());
    wp_enqueue_style('my-footer', get_template_directory_uri() . '/css/footer.css', NULL, microtime());
    wp_enqueue_style('my-navbar', get_template_directory_uri() . '/css/navbar.css', NULL, microtime());
    wp_enqueue_style('my-category', get_template_directory_uri() . '/css/category.css', NULL, microtime());
    wp_register_script('my-script', get_template_directory_uri() . '/js/header.js', array(), true);
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
    register_nav_menu('header-menu', __('Header Menu'));
}

function redirectSubsToFrontEnd()
{
    $currentUser = wp_get_current_user();

    if (count($currentUser->roles) == 1 and $currentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

function removeSubsAdminBar()
{
    $currentUser = wp_get_current_user();

    if (count($currentUser->roles) == 1 and $currentUser->roles[0] == 'subscriber') {
        show_admin_bar(false);
    }
}

add_action('wp_enqueue_scripts', 'wp_variety_shopping_scripts');
add_action('widgets_init', 'register_sidebar_init');
add_action('init', 'wp_custom_nav_menu');
add_action('admin_init', 'redirectSubsToFrontEnd');
add_action('wp_loaded', 'removeSubsAdminBar');

class ps_cover_widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'ps-cover-widget',
            'pscw',
            array(
                'classname' => 'pscw-container',
                'description' => 'pscw widget creation description.'
            )
        );
    }

    public function widget($args, $instance)
    {
        //define variables
        $card_title = $instance['card_title'];
        $card_link = $instance['card_link'];
        $card_image = $instance['card_image'];

        //output code
        echo $args['before_widget'];
?>

        <a href="<?php echo $card_link ?>">
            <div class="cta">
                <div style="position: relative;">
                    <img src="<?php echo $card_image ?>" alt="<?php echo $card_title ?>" style="width: 230px; height: 230px; filter: blur(2px);" />
                    <h5 style="margin: 0px; font-size: 30px; font-family: Helvetica, sans-serif; color: white; position: absolute; bottom: 15px; left: 8px;"><?php echo $card_title ?></h5>
                </div>
            </div>
        </a>

    <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $card_title = !empty($instance['card_title']) ? $instance['card_title'] : 'Your card title here';
        $card_link = !empty($instance['card_link']) ? $instance['card_link'] : 'Your card URL here';
        $card_image = !empty($instance['card_image']) ? $instance['card_image'] : 'Your card image link here';
    ?>

        <p>
            <label for="<?php echo $this->get_field_id('card_title'); ?>">Text in the call to action box:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('card_title'); ?>" name="<?php echo $this->get_field_name('card_title'); ?>" value="<?php echo esc_attr($card_title); ?>" /></p>

        <p>
            <label for="<?php echo $this->get_field_id('card_link'); ?>">Your URL:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('card_link'); ?>" name="<?php echo $this->get_field_name('card_link'); ?>" value="<?php echo esc_attr($card_link); ?>" /></p>

        <p>
            <label for="<?php echo $this->get_field_id('card_image'); ?>">Your image link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('card_image'); ?>" name="<?php echo $this->get_field_name('card_image'); ?>" value="<?php echo esc_attr($card_image); ?>" /></p>
<?php }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['card_title'] = strip_tags($new_instance['card_title']);
        $instance['card_link'] = strip_tags($new_instance['card_link']);
        $instance['card_image'] = strip_tags($new_instance['card_image']);
        return $instance;
    }
}

function registerPSCWWidget()
{
    register_widget('ps_cover_widget');
}

add_action('widgets_init', 'registerPSCWWidget');
