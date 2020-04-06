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
                                <h2 class="page-post-title"><?php esc_attr(the_title()); ?></h2>
                            </div>
                            <p class="sub-post-author">By <?php esc_attr(the_author()); ?></p>
                        </div>
                    </div>
                    <div class="page-post-content">
                        <?php esc_attr(the_content()); ?>
                        <div style="clear: both;"></div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="main-no-posts-title">No page content to display.</p>
            <?php } ?>
            <?php comments_template(); ?>
        </div>
    </div>
    <div class="right-sidebar-wrapper">
        <?php get_sidebar('Right Sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>