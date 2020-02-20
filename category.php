<?php get_header(); ?>
<div class="category-container">
    <h2>This is a page, not a post</h2>
    <div class="category-posts-container">
        <?php
        while (have_posts()) {
            the_post(); ?>
            <h2 class="category-post-title"><?php the_title() ?></h2>
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
            <div class="category-post-content"><?php the_content() ?></div>
        <?php } ?>
    </div>
    <div>
    </div>
</div>
<?php get_footer(); ?>