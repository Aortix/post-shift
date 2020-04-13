<?php
function display_all_pages()
{ ?>
    <div class="navbar-menu-ul">
        <?php wp_list_pages(array('title_li' => '')); ?>
    </div>
<?php }

function display_all_categories()
{ ?>
    <div class="navbar-menu-ul">
        <?php wp_list_categories(array('title_li' => '')); ?>
    </div>
<?php }
?>

<div class="navbar-main-container">
    <div class="navbar-section-text-container">
        <div class="navbar-section-text-sub-container">
            <h4 class="navbar-section-text"><?php esc_html_e("Pages", "post-shift") ?></h4>
        </div>
    </div>
    <?php wp_nav_menu(array(
        'theme_location' => 'pages-menu',
        'menu_class' => 'navbar-menu-ul',
        'fallback_cb' => 'display_all_pages'
    )); ?>
    <div class="navbar-section-text-container">
        <div class="navbar-section-text-sub-container">
            <h4 class="navbar-section-text"><?php esc_html_e("Categories", "post-shift") ?></h4>
        </div>
    </div>
    <?php wp_nav_menu(array(
        'theme_location' => 'categories-menu',
        'menu_class' => 'navbar-menu-ul',
        'fallback_cb' => 'display_all_categories'
    )); ?>
</div>