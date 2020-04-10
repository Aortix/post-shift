<?php get_header(); ?>
<?php
function startsWith($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

$current_url = esc_url(home_url(add_query_arg(array(), $wp->request)));
$index = strpos($current_url, esc_html(get_bloginfo('name')));
while ($index != false) {
    if (startsWith(substr($current_url, $index + 1, strlen($current_url)), "page")) {
        $current_url = substr($current_url, 0, strpos($current_url, "/"));
        break;
    }
    $current_url = substr($current_url, $index + 1, strlen($current_url));
    $index = strpos($current_url, "/");
}
$user_of_page = get_user_by("slug", $current_url); ?>

<div class="main-container">
    <div class="main-posts-container">
        <div class="author-container">
            <div class="author-information-and-avatar">
                <img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('user_email'), ['size' => '160'])) ?>" alt="user_avatar"></img>
                <div class="author-information">
                    <p><?php printf(esc_html__('%s', 'post-shift'), $user_of_page->user_nicename) ?></p>
                    <p><?php printf(esc_html__('%s', 'post-shift'), $user_of_page->first_name) ?> <?php printf(esc_html__('%s', 'post-shift'), $user_of_page->last_name) ?></p>
                    <p><?php printf(esc_html__('%s', 'post-shift'), $user_of_page->user_url) ?></p>
                </div>
            </div>
            <?php if (!empty(esc_html($user_of_page->description))) { ?>
                <p class="author-description"><?php printf(esc_html__('%s', 'post-shift'), $user_of_page->description) ?></p>
            <?php } else { ?>
                <p class="author-description" style="text-align: center;"><?php _e("No description to display.", "post-shift") ?></p>
            <?php } ?>
        </div>
        <h5 class="author-posts-title"><?php _e("Author Posts", "post-shift") ?></h5>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>
                <div class="main-post-container">
                    <a class="main-avatar-per-post" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('user_email'))); ?>" alt="user_post_avatar"></img></a>
                    <div class="sub-post-container">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="sub-post-title"><?php printf(__('%s', 'post-shift'), the_title()); ?></a>
                        <p class="sub-post-author">By <?php printf(esc_html__('%s', 'post-shift'), get_the_author()); ?></p>
                        <div class="sub-post-categories-and-tags">
                            <?php $categories = get_the_category(get_the_ID()); ?>
                            <?php foreach ($categories as $category) { ?>
                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php printf(esc_html__('%s', 'post-shift'), $category->name); ?></a>
                            <?php } ?>
                            <?php $tags = get_the_tags(get_the_ID()); ?>
                            <?php if (is_array($tags) || is_object($tags)) { ?>
                                <?php foreach ($tags as $tag) { ?>
                                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php printf(esc_html__('%s', 'post-shift'), $tag->name); ?></a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <a href="<?php echo esc_url(get_permalink()); ?>"><button class="main-view-post-button"><?php _e("View Post", "post-shift") ?></button></a>
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
            <p class="main-no-posts-title"><?php _e("No posts to display.", "post-shift") ?></p>
        <?php } ?>
        <div style="clear: both;"></div>
    </div>
    <div class="right-sidebar-wrapper">
        <?php get_sidebar('Right Sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>