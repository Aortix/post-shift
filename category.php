<?php include("classes/categoryClass.php"); ?>
<?php get_header(); ?>
<div class="main-container">
    <div class="main-posts-container">
        <?php $categoryInstance = new Category();
        //Home page link 
        ?>
        <a class="main-home-page-link" href="<?php echo esc_url(get_home_url()) ?>"><?php echo esc_attr($categoryInstance->getDomainName($wp)); ?></a>
        <i class="las la-arrow-right"></i>

        <?php //Category links
        $categories = $categoryInstance->getCategories($wp);
        foreach ($categories as $cat => $cat_value) { ?>
            <a class="main-directories-links" href="<?php echo esc_url($cat_value) ?>"><?php echo esc_attr($cat); ?></a>
            <i class="las la-arrow-right"></i>
        <?php }

        //Current category link 
        ?>
        <a class="main-current-directory-link" href="<?php echo esc_url(get_category_link(get_cat_ID(single_cat_title('', false)))); ?>"><?php ucfirst(esc_attr(single_cat_title())); ?></a>

        <?php //Subcategory links if they exist 
        $subcategories = $categoryInstance->getSubCategories();
        if (count($subcategories) > 0) { ?>
            <i class="las la-arrow-right"></i>
        <?php }
        foreach ($subcategories as $sub => $categories) { ?>
            <a class="main-sub-directories-links" href="<?php echo esc_url(get_category_link($categories->term_id)); ?>"><?php echo ucfirst(esc_attr($categories->name)); ?></a>
            <?php if (count($subcategories) != $sub + 1) { ?>
                <i class="las la-grip-lines-vertical"></i>
        <?php }
        }

        //Start of standard view 
        ?>
        <div class="main-header-container">
            <h2 class="main-header-title"><?php esc_attr(single_cat_title()); ?></h2>
            <div class="main-header-description"><?php echo category_description(); ?></div>
        </div>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>
                <div class="main-post-container">
                    <a class="main-avatar-per-post" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('user_email'))); ?>" alt="user_post_avatar"></img></a>
                    <div class="sub-post-container">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="sub-post-title"><?php esc_attr(the_title()); ?></a>
                        <p class="sub-post-author">By <?php esc_attr(the_author()); ?></p>
                        <div class="sub-post-categories-and-tags">
                            <?php $categories = get_the_category(get_the_ID()); ?>
                            <?php foreach ($categories as $category) { ?>
                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_attr($category->name); ?></a>
                            <?php } ?>
                            <?php $tags = get_the_tags(get_the_ID()); ?>
                            <?php if (is_array($tags) || is_object($tags)) { ?>
                                <?php foreach ($tags as $tag) { ?>
                                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_attr($tag->name); ?></a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <a href="<?php echo esc_url(get_permalink()); ?>"><button class="main-view-post-button">View Post</button></a>
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail();
                } ?>
                <div class="main-post-content">
                    <?php esc_attr(the_content()); ?>
                    <div style="clear: both;"></div>
                </div>
            <?php } ?>
            <div class="nav-previous alignleft"><?php next_posts_link('Older Posts'); ?></div>
            <div class="nav-next alignright"><?php previous_posts_link('Newer Posts'); ?></div>
        <?php } else { ?>
            <p class="main-no-posts-title">No posts to display.</p>
        <?php } ?>
        <div style="clear: both;"></div>
    </div>
    <div class="right-sidebar-wrapper">
        <?php get_sidebar('Right Sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>