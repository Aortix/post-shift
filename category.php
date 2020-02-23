<?php get_header(); ?>
<div class="category-container">
    <div class="category-posts-container">
        <?php
        $current_url = home_url(add_query_arg(array(), $wp->request));
        $part1Cut = strpos($current_url, get_bloginfo('name'));
        $part1 = substr($current_url, $part1Cut, strlen($current_url));
        while ($part1 != false) {
            echo $part1;
            $part1Cut = strpos($part1, "/");
            $part1 = substr($part1, $part1Cut + 1, strlen($part1));
        }
        ?>
        <div class="category-main-category-container">
            <h2 class="category-main-category-title"><?php echo single_cat_title() ?></h2>
            <div class="category-main-category-description"><?php echo category_description() ?></div>
        </div>
        <?php
        while (have_posts()) {
            the_post(); ?>
            <div class="category-post-metadata-container">
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_avatar(get_the_author_meta('user_email')) ?></a>
                <div class="category-post-metadata-no-avatar-container">
                    <a href="<?php echo get_permalink() ?>" class="category-post-title"><?php the_title() ?></a>
                    <p class="category-post-author">By <?php the_author(); ?></p>
                    <div class="category-categories-and-tags">
                        <?php $categories = get_the_category(get_the_ID()); ?>
                        <?php foreach ($categories as $category) { ?>
                            <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                        <?php } ?>
                        <?php $tags = get_the_tags(get_the_ID()); ?>
                        <?php if (is_array($tags) || is_object($tags)) { ?>
                            <?php foreach ($tags as $tag) { ?>
                                <a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <a href="<?php echo get_permalink() ?>"><button class="category-view-post-button">View Post</button></a>
            <div class="category-post-content"><?php the_content() ?></div>
        <?php } ?>
    </div>
    <div class="category-sidebar">
        <?php get_sidebar('Right Sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>