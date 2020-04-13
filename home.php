<?php get_header(); ?>
<div class="main-container">
    <div class="main-posts-container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('components/content');
            } ?>
            <div class="nav-previous alignleft"><?php next_posts_link('Older Posts'); ?></div>
            <div class="nav-next alignright"><?php previous_posts_link('Newer Posts'); ?></div>
        <?php } else { ?>
            <p class="main-no-posts-title"><?php esc_html_e("No posts to display.", "post-shift") ?></p>
        <?php } ?>
    </div>
    <div class="right-sidebar-wrapper">
        <?php get_sidebar('Right Sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>