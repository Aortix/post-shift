<?php get_header(); ?>
<?php $current_author = esc_html(get_query_var('author')); ?>

<div class="main-container">
    <div class="main-posts-container">
        <div class="author-container">
            <div class="author-information-and-avatar">
                <img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('user_email', $current_author), ['size' => '160'])) ?>" alt="user_avatar"></img>
                <div class="author-information">
                    <p><?php echo esc_html(get_the_author_meta('user_nicename', $current_author)); ?></p>
                    <p><?php echo esc_html(get_the_author_meta('first_name', $current_author)) ?> <?php echo esc_html(get_the_author_meta('last_name', $current_author)) ?></p>
                    <p><?php echo esc_html(get_the_author_meta('user_url', $current_author)) ?></p>
                </div>
            </div>
            <?php if (!empty(esc_html(get_the_author_meta('description', $current_author)))) { ?>
                <p class="author-description"><?php echo esc_html(get_the_author_meta('description', $current_author)) ?></p>
            <?php } else { ?>
                <p class="author-description" style="text-align: center;"><?php esc_html_e("No description to display.", "post-shift") ?></p>
            <?php } ?>
        </div>
        <h5 class="author-posts-title"><?php esc_html_e("Author Posts", "post-shift") ?></h5>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('components/content');
            } ?>
            <div class="nav-previous alignleft"><?php next_posts_link('Older posts'); ?></div>
            <div class="nav-next alignright"><?php previous_posts_link('Newer posts'); ?></div>
        <?php } else { ?>
            <p class="main-no-posts-title"><?php esc_html_e("No posts to display.", "post-shift") ?></p>
        <?php } ?>
        <div style="clear: both;"></div>
    </div>
    <div class="right-sidebar-wrapper">
        <?php get_sidebar('Right Sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>