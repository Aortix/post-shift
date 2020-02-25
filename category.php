<?php get_header(); ?>
<div class="main-container">
    <div class="main-posts-container">
        <?php
        //Get current page url, retrieve each section of the url as a string, and create links to those individual sections
        $current_url = home_url(add_query_arg(array(), $wp->request));
        $part1Cut = strpos($current_url, get_bloginfo('name'));
        $part1 = substr($current_url, $part1Cut, strlen($current_url));

        //Home page link 
        ?>
        <a class="main-home-page-link" href="<?php echo get_home_url() ?>"><?php echo ucfirst(substr($part1, 0, strpos($part1, "/"))); ?></a>
        <i class="las la-arrow-right"></i>

        <?php
        $part1 = substr($part1, strpos($part1, "/") + 1, strlen($part1));
        $count = 1;
        while ($part1Cut != false) {
            $part1Cut = strpos($part1, "/");
            $partToEcho = substr($part1, 0, $part1Cut);
            if ($partToEcho != "category" and $partToEcho != "author") {
                $cat_id = get_cat_ID($partToEcho);
                $cat_link = get_category_link($cat_id);
                //Primary category links 
        ?>
                <a class="main-directories-links" href="<?php echo $cat_link ?>"><?php echo ucfirst($partToEcho) ?></a>
                <?php if ($count != 1) { ?>
                    <i class="las la-arrow-right"></i>
        <?php }
                $count++;
            }
            $part1 = substr($part1, $part1Cut + 1, strlen($part1));
        } ?>
        <a class="main-current-directory-link" href="<?php echo get_category_link(get_cat_ID(single_cat_title('', false))); ?>"><?php ucfirst(single_cat_title()); ?></a>

        <?php
        //Getting the sub-categories of the primary category
        $parent_term_id = get_cat_ID(single_cat_title('', false));
        $taxonomies = array(
            'category',
        );
        $args = array(
            'parent'         => $parent_term_id,
        );
        $terms = get_terms($taxonomies, $args);
        if (count($terms) > 0) { ?>
            <i class="las la-arrow-right"></i>
        <?php }
        foreach ($terms as $key => $term) { ?>
            <a class="main-sub-directories-links" href="<?php echo get_category_link($term->term_id); ?>"><?php echo ucfirst($term->name) ?></a>
            <?php if ($key != count($terms) - 1) { ?>
                <i class="las la-grip-lines-vertical"></i>
        <?php }
        } ?>
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