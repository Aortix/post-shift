<?php get_header(); ?>
<div class="main-container">
    <div class="main-posts-container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>
                <div class="main-post-container">
                    <a class="main-avatar-per-post" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('user_email'))); ?>" alt="user_post_avatar"></img></a>
                    <div class="sub-post-container">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="sub-post-title"><?php esc_html(the_title()); ?></a>
                        <p class="sub-post-author"><?php echo esc_html__('By', 'post-shift') . esc_html(get_the_author()); ?></p>
                        <div class="sub-post-categories-and-tags">
                            <?php $categories = get_the_category(get_the_ID()); ?>
                            <?php foreach ($categories as $category) { ?>
                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a>
                            <?php } ?>
                            <?php $tags = get_the_tags(get_the_ID()); ?>
                            <?php if (is_array($tags) || is_object($tags)) { ?>
                                <?php foreach ($tags as $singleTag) { ?>
                                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($singleTag->name); ?></a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <a href="<?php echo esc_url(get_permalink()); ?>"><button class="main-view-post-button"><?php esc_html_e('View Post', 'post-shift'); ?></button></a>
                <div class="main-post-content">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    } ?>
                    <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                    <div style="clear: both;"></div>
                </div>
            <?php } ?>
            <div class="nav-previous alignleft"><?php next_posts_link('Older posts'); ?></div>
            <div class="nav-next alignright"><?php previous_posts_link('Newer posts'); ?></div>
        <?php } else { ?>
            <p class="main-no-posts-title"><?php esc_html_e('No posts to display.', 'post-shift'); ?></p>
        <?php } ?>
        <div style="clear: both;"></div>
    </div>
    <div class="right-sidebar-wrapper">
        <?php get_sidebar('Right Sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>