<?php include("classes/categoryClass.php"); ?>
<?php get_header(); ?>
<div class="main-container">
    <div class="main-posts-container">
        <?php $categoryInstance = new Category();
        //Home page link 
        ?>
        <a class="main-home-page-link" href="<?php echo get_home_url() ?>"><?php echo $categoryInstance->getDomainName($wp); ?></a>
        <i class="las la-arrow-right"></i>

        <?php //Category links
        $categories = $categoryInstance->getCategories($wp);
        foreach ($categories as $cat => $cat_value) { ?>
            <a class="main-directories-links" href="<?php echo $cat_value ?>"><?php echo $cat ?></a>
            <i class="las la-arrow-right"></i>
        <?php }

        //Current category link 
        ?>
        <a class="main-current-directory-link" href="<?php echo get_category_link(get_cat_ID(single_cat_title('', false))); ?>"><?php ucfirst(single_cat_title()); ?></a>

        <?php //Subcategory links if they exist 
        $subcategories = $categoryInstance->getSubCategories();
        if (count($subcategories) > 0) { ?>
            <i class="las la-arrow-right"></i>
        <?php }
        foreach ($subcategories as $sub => $categories) { ?>
            <a class="main-sub-directories-links" href="<?php echo get_category_link($categories->term_id); ?>"><?php echo ucfirst($categories->name) ?></a>
            <?php if (count($subcategories) != $sub + 1) { ?>
                <i class="las la-grip-lines-vertical"></i>
        <?php }
        }

        //Start of standard view 
        ?>
        <div class="main-header-container">
            <h2 class="main-header-title"><?php single_cat_title(); ?></h2>
            <div class="main-header-description"><?php echo category_description(); ?></div>
        </div>
        <?php
        while (have_posts()) {
            the_post(); ?>
            <div class="main-post-container">
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_avatar(get_the_author_meta('user_email')) ?></a>
                <div class="sub-post-container">
                    <a href="<?php echo get_permalink() ?>" class="sub-post-title"><?php the_title() ?></a>
                    <p class="sub-post-author">By <?php the_author(); ?></p>
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
            <a href="<?php echo get_permalink() ?>"><button class="main-view-post-button">View Post</button></a>
            <div class="main-post-content"><?php the_content() ?></div>
        <?php } ?>
    </div>
    <div class="right-sidebar-wrapper">
        <?php get_sidebar('Right Sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>