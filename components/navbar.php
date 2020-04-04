<div class="navbar-main-container">
    <div class="navbar-section-text-container">
        <div class="navbar-section-text-sub-container">
            <h4 class="navbar-section-text">Pages</h4>
        </div>
    </div>
    <div class="navbar-pages-container">
        <?php echo wp_list_pages(array('title_li' => '')) ?>
    </div>
    <div class="navbar-section-text-container">
        <div class="navbar-section-text-sub-container">
            <h4 class="navbar-section-text">Categories</h4>
        </div>
    </div>
    <?php wp_nav_menu(array(
        'theme_location' => 'header-menu',
        /*'container_id' => 'navbar-menu-container',*/
        'menu_id' => 'navbar-menu-ul'
    )); ?>
</div>