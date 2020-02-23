<?php include("classes/headerClass.php") ?>
<?php
$header_instance = new Header(get_bloginfo('name'), get_bloginfo('description'));
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
    <header>
        <div class="header-auth-container">
            <?php if (is_user_logged_in()) { ?>
                <a class="header-auth-avatar-link" href="<?php echo get_author_posts_url(get_current_user_id()); ?>"><?php echo get_avatar(get_current_user_id(), 24); ?></a>
                <a class="header-auth-name-link" href="<?php echo get_author_posts_url(get_current_user_id()); ?>">
                    <p class="header-auth-name"><?php echo wp_get_current_user()->display_name ?></p>
                </a>
                <a class="header-auth-logout-link" href="<?php echo wp_logout_url(); ?>">
                    <p class="header-auth-logout">Logout</p>
                </a>
            <?php } else { ?>
                <a class="header-auth-login-link" href="<?php echo wp_login_url(); ?>">
                    <p class="header-auth-login">Login</p>
                </a>
                <a class="header-auth-register-link" href="<?php echo wp_registration_url(); ?>">
                    <p class="header-auth-register">Sign Up</p>
                </a>
            <?php } ?>
        </div>
        <div class="header-container">
            <h1 class="header-title"><?php echo $header_instance->getTitle(); ?></h1>
            <h2 class="header-description"><?php echo $header_instance->getDescription(); ?></h2>
            <i class="las la-angle-double-down" onclick="Header.toggleNavBar()"></i>
        </div>
        <?php include("components/navbar.php") ?>
    </header>