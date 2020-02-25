<?php get_header(); ?>
<div class="page-main-container">
    <div class="main-posts-container">
        <div class="main-header-container">
            <h2 class="main-header-title"><?php single_cat_title(); ?></h2>
            <div class="main-header-description"><?php echo category_description(); ?></div>
        </div>
        <?php
        while (have_posts()) {
            the_post(); ?>
            <div class="page-post-container">
                <div class="page-page-post-container">
                    <h2 class="page-post-title"><?php the_title() ?></h2>
                    <div class="sub-post-categories-and-tags">
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
            <div class="page-post-content"><?php the_content() ?></div>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>