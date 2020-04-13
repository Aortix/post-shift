<?php get_header(); ?>
<div class="main-container">
    <div class="main-posts-container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('components/content');
            } ?>
        <?php } else { ?>
            <p class="main-no-posts-title"><?php esc_html_e('No posts to display.', 'post-shift'); ?></p>
        <?php } ?>
        <?php if (comments_open() || get_comments_number()) :
            comments_template();
        endif; ?>
    </div>
    <div class="right-sidebar-wrapper">
        <?php get_sidebar('Right Sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>