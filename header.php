<?php include("classes/headerClass.php") ?>
<?php
$header_instance = new Header(esc_attr(get_bloginfo('name')), esc_attr(get_bloginfo('description')));
?>
<?php
global $wp;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variety-Shopping</title>
    <?php wp_head() ?>
</head>

<body onload="Header.transitionForDownArrow()">
    <header class="header-main-container">
        <div class="header-auth-container">
            <?php if (is_user_logged_in()) { ?>
                <div class="header-logged-in-information">
                    <a class="header-auth-avatar-link" href="<?php echo esc_url(get_author_posts_url(get_current_user_id())); ?>"><img src="<?php echo esc_url(get_avatar_url(get_current_user_id(), ['size' => '24'])); ?>" alt="header_user_avatar"></img></a>
                    <a class="header-auth-name-link" href="<?php echo esc_url(get_author_posts_url(get_current_user_id())); ?>">
                        <p class="header-auth-name"><?php echo esc_attr(wp_get_current_user()->display_name); ?></p>
                    </a>
                </div>
                <div class="header-menu-container">
                    <i class="las la-bars" onclick="Header.toggleMenu()"></i>
                    <div class="header-page-links">
                        <?php echo wp_list_pages(array('title_li' => '')) ?>
                        <a class="header-auth-logout-link" href="<?php echo esc_url(wp_logout_url()); ?>">
                            <p class="header-auth-logout">Logout</p>
                        </a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="header-auth-links">
                    <a class="header-auth-login-link" href="<?php echo esc_url(wp_login_url()); ?>">
                        <p class="header-auth-login">Login</p>
                    </a>
                    <a class="header-auth-register-link" href="<?php echo esc_url(wp_registration_url()); ?>">
                        <p class="header-auth-register">Sign Up</p>
                    </a>
                </div>
                <div class="header-menu-container">
                    <i class="las la-bars" onclick="Header.toggleMenu()"></i>
                    <div class="header-page-links">
                        <?php echo wp_list_pages(array('title_li' => '')) ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="header-container">
            <a style="text-decoration: none; color: inherit; " href="<?php echo esc_url(get_home_url()); ?>">
                <h1 class="header-title"><?php echo esc_attr($header_instance->getTitle()); ?></h1>
            </a>
            <h2 class="header-description"><?php echo esc_attr($header_instance->getDescription()); ?></h2>
            <i class="las la-angle-double-down" onclick="Header.toggleNavBar()"></i>
        </div>
        <?php include("components/navbar.php") ?>
    </header>