<div class="navbar-main-container">
    <div class="navbar-section-text-container">
        <div class="navbar-section-text-sub-container">
            <h4 class="navbar-section-text"><?php _e("Pages", "post-shift") ?></h4>
        </div>
    </div>
    <div class="navbar-pages-container">
        <?php echo wp_list_pages(array('title_li' => '')) ?>
    </div>
    <div class="navbar-section-text-container">
        <div class="navbar-section-text-sub-container">
            <h4 class="navbar-section-text"><?php _e("Categories", "post-shift") ?></h4>
        </div>
    </div>
    <?php wp_nav_menu(array(
        'theme_location' => 'header-menu',
        'menu_id' => 'navbar-menu-ul'
    )); ?>
</div>