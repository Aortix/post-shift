<?php get_header(); ?>
<div class="main-container">
    <div class="main-posts-container">
        <div class="main-header-container">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post(); ?>
                    <div class="page-post-container">
                        <a class="main-avatar-per-post" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('user_email'))); ?>" alt="index_user_avatar"></img></a>
                        <div>
                            <div class="page-page-post-container">
                                <h2 class="page-post-title"><?php sprintf(__('%s', 'post-shift'), the_title()); ?></h2>
                            </div>
                            <p class="sub-post-author">By <?php sprintf(esc_html__('$s', 'post-shift'), the_author()); ?></p>
                        </div>
                    </div>
                    <div class="page-post-content">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail();
                        } ?>
                        <?php the_content(); ?>
                        <?php wp_link_pages(); ?>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="main-no-posts-title"><?php _e('No page content to display.', 'post-shift'); ?></p>
            <?php } ?>
            <?php if (comments_open() || get_comments_number()) :
                comments_template();
            endif; ?>
        </div>
    </div>
    <div class="right-sidebar-wrapper">
        <?php get_sidebar('Right Sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>