<?php
global $wp;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (is_singular()) wp_enqueue_script('comment-reply');
    wp_head() ?>
</head>

<body <?php body_class(); ?> onload="Header.transitionForDownArrow()">
    <header class="header-main-container">
        <div class="header-auth-container">
            <?php if (is_user_logged_in()) { ?>
                <div class="header-logged-in-information">
                    <a class="header-auth-avatar-link" href="<?php echo esc_url(get_author_posts_url(get_current_user_id())); ?>"><img src="<?php echo esc_url(get_avatar_url(get_current_user_id(), array('size' => '24'))); ?>" alt="header_user_avatar"></img></a>
                    <a class="header-auth-name-link" href="<?php echo esc_url(get_author_posts_url(get_current_user_id())); ?>">
                        <p class="header-auth-name"><?php echo esc_html(wp_get_current_user()->display_name); ?></p>
                    </a>
                </div>
                <div class="header-menu-container">
                    <i class="las la-bars" onclick="Header.toggleMenu()"></i>
                    <div class="header-page-links">
                        <a class="header-auth-logout-link" href="<?php echo esc_url(wp_logout_url()); ?>">
                            <p class="header-auth-logout"><?php esc_html_e('Logout', 'post-shift') ?></p>
                        </a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="header-auth-links">
                    <a class="header-auth-login-link" href="<?php echo esc_url(wp_login_url()); ?>">
                        <p class="header-auth-login"><?php esc_html_e('Login', 'post-shift') ?></p>
                    </a>
                    <a class="header-auth-register-link" href="<?php echo esc_url(wp_registration_url()); ?>">
                        <p class="header-auth-register"><?php esc_html_e('Sign Up', 'post-shift') ?></p>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="header-container">
            <div style="text-decoration: none; color: inherit; display: flex; align-items: center; justify-content: center; " href="<?php echo esc_url(get_home_url()); ?>">
                <?php if (function_exists('the_custom_logo')) { ?>
                    <div>
                        <?php the_custom_logo(); ?>
                    </div>
                <?php } ?>
                <a href="<?php echo esc_url(home_url()); ?>" style="color: inherit;">
                    <h1 class="header-title"><?php echo esc_html(get_bloginfo('name')); ?></h1>
                </a>
            </div>
            <h2 class="header-description"><?php echo esc_html(get_bloginfo('description')); ?></h2>
            <i class="las la-angle-double-down" onclick="Header.toggleNavBar()"></i>
        </div>
        <?php get_template_part('components/navbar') ?>
    </header>